<?php

namespace App\Filament\Resources\DataPendaftaranResource\Pages;

use App\Filament\Resources\DataPendaftaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataPendaftaran extends EditRecord
{
    protected static string $resource = DataPendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    public function getTitle(): string
    {
        return 'Cek Data Pendaftar';
    }
    public function getBreadcrumb(): string
    {
        return 'Cek';
    }
}
