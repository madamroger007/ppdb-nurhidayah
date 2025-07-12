<?php

namespace App\Filament\Resources\LaporanResource\Pages;

use App\Filament\Resources\LaporanResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListLaporans extends ListRecords
{
    protected static string $resource = LaporanResource::class;
     protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->where('verifikasi_data', true);
    }

    protected function getHeaderActions(): array
    {
        return [
       //     Actions\CreateAction::make(),
        ];
    }


}
