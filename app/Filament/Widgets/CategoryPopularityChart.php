<?php

namespace App\Filament\Widgets;

use App\Models\ActionLog;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class CategoryPopularityChart extends ChartWidget
{
    protected ?string $heading = 'Category Clicks (Top 5)';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        $data = ActionLog::where('action_type', 'category_click')
            ->selectRaw('target_id, count(*) as count')
            ->groupBy('target_id')
            ->orderByDesc('count')
            ->limit(5)
            ->get();

        $labels = [];
        $counts = [];

        foreach ($data as $item) {
            $category = DB::table('mcategories')->where('id', $item->target_id)->first();
            $labels[] = $category ? $category->name : 'Unknown';
            $counts[] = $item->count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Clicks',
                    'data' => $counts,
                    'backgroundColor' => [
                        '#2e7d32', '#1b5e20', '#43a047', '#66bb6a', '#81c784'
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
