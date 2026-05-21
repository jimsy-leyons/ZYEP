<?php

namespace App\Filament\Pages\Auth;

use App\Models\User;
use App\Services\OTPService;
use Filament\Auth\Pages\Login;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Filament\Actions\Action;
use Filament\Auth\Http\Responses\Contracts\LoginResponse;
use Illuminate\Support\Facades\Auth;
use Filament\Facades\Filament;
use Filament\Models\Contracts\FilamentUser;

class PhoneLogin extends Login
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getPhoneFormComponent(),
                $this->getOtpFormComponent(),
                $this->getRememberFormComponent(),
            ]);
    }

    protected function getPhoneFormComponent(): \Filament\Schemas\Components\Component
    {
        return TextInput::make('phone')
            ->label('Phone Number')
            ->tel()
            ->required()
            ->autocomplete()
            ->autofocus()
            ->suffixAction(
                Action::make('sendOtp')
                    ->icon('heroicon-m-paper-airplane')
                    ->action(function (OTPService $service) {
                        $phone = $this->data['phone'] ?? null;
                        if (!$phone) {
                            Notification::make()->title('Phone number required')->danger()->send();
                            return;
                        }
                        $service->sendOTP($phone);
                        Notification::make()->title('OTP Sent!')->success()->send();
                    })
            );
    }

    protected function getOtpFormComponent(): \Filament\Schemas\Components\Component
    {
        return TextInput::make('otp')
            ->label('OTP')
            ->password()
            ->required()
            ->minLength(6)
            ->maxLength(6);
    }

    public function authenticate(): ?LoginResponse
    {
        try {
            $this->rateLimit(5);
        } catch (\DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException $exception) {
            $this->getRateLimitedNotification($exception)?->send();
            return null;
        }

        $data = $this->form->getState();
        $service = app(OTPService::class);

        if (!$service->verifyOTP($data['phone'], $data['otp'])) {
            $this->addError('data.otp', 'Invalid or expired OTP.');
            return null;
        }

        $user = User::where('phone', $data['phone'])->first();

        if (!$user) {
            $this->addError('data.phone', 'User not found.');
            return null;
        }

        Auth::login($user, $data['remember'] ?? false);

        if (! ($user instanceof FilamentUser) || ! $user->canAccessPanel(Filament::getCurrentOrDefaultPanel())) {
            Auth::logout();
            $this->addError('data.phone', 'Unauthorized access.');
            return null;
        }

        session()->regenerate();

        return app(LoginResponse::class);
    }
}
