<?php

namespace App\Filament\Resources\DataPendaftaranResource\Pages;

use App\Filament\Resources\DataPendaftaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataPendaftarans extends ListRecords
{
    protected static string $resource = DataPendaftaranResource::class;
    // ✅ Ini adalah cara paling efektif untuk menyembunyikan tombol "New"
    protected static bool $canCreate = false;

    protected function getHeaderActions(): array
    {
        return [
        //    Actions\CreateAction::make(),
        ];
    }
}
