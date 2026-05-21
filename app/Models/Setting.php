<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'type'];

    /**
     * Get a setting value by key.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        $setting = Cache::rememberForever("setting.$key", function () use ($key) {
            return self::where('key', $key)->first();
        });

        if (!$setting) {
            return $default;
        }

        return self::castValue($setting->value, $setting->type);
    }

    /**
     * Set a setting value by key.
     *
     * @param string $key
     * @param mixed $value
     * @param string|null $type
     * @return void
     */
    public static function set($key, $value, $type = null)
    {
        $setting = self::updateOrCreate(
            ['key' => $key],
            [
                'value' => (string) $value,
                'type' => $type ?? self::guessType($value)
            ]
        );

        Cache::forget("setting.$key");
    }

    /**
     * Cast the value based on the type.
     */
    protected static function castValue($value, $type)
    {
        return match ($type) {
            'boolean' => (bool) $value,
            'integer' => (int) $value,
            'float' => (float) $value,
            'json' => json_decode($value, true),
            default => $value,
        };
    }

    /**
     * Guess the type of a value.
     */
    protected static function guessType($value)
    {
        if (is_bool($value)) return 'boolean';
        if (is_int($value)) return 'integer';
        if (is_float($value)) return 'float';
        if (is_array($value) || is_object($value)) return 'json';
        return 'string';
    }
}
