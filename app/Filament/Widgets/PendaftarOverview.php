<?php

namespace App\Filament\Widgets;

use App\Models\Pendaftar;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class PendaftarOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Lulus', Pendaftar::where('verifikasi_data', true)->count())
                ->description('Pendaftar yang lulus verifikasi')
                ->color('success'),

            Card::make('Total Tidak Lulus', Pendaftar::where('verifikasi_data', false)->count())
                ->description('Pendaftar tidak lulus verifikasi')
                ->color('danger'),

            Card::make('Total Tahun Ini', Pendaftar::whereYear('created_at', now()->year)->count())
                ->description('Pendaftar tahun ' . now()->year)
                ->color('primary'),
        ];
    }
}
