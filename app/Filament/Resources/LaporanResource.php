<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanResource\Pages;
use App\Models\Pendaftar;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LaporanResource extends Resource
{
    protected static ?string $pluralLabel = 'Laporan';
    protected static ?string $model = Pendaftar::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama Pendaftar'),
                TextColumn::make('tempat_lahir')->label('Tempat Lahir Pendaftar'),
                TextColumn::make('email')->label('Email Pendaftar'),
                TextColumn::make('no_hp')->label('No. Telepon Pendaftar'),
                TextColumn::make('tgl_lahir')->label('Tanggal Lahir Pendaftar'),
                TextColumn::make('jenis_kelamin')->label('Jenis Kelamin Pendaftar'),
                TextColumn::make('agama')->label('Agama Pendaftar'),
                TextColumn::make('alamat')->label('Alamat Pendaftar'),
                TextColumn::make('NIK')->label('NIK Pendaftar'),
                ImageColumn::make('scan_akta_kelahiran')
                    ->label('Scan Akta Kelahiran')
                    ->url(fn($record) => asset('storage/' . $record->scan_akta_kelahiran))
                    ->circular(),
                ImageColumn::make('scan_kk')
                    ->label('Scan Kartu Keluarga')
                    ->url(fn($record) => asset('storage/' . $record->scan_kk))
                    ->circular(),
                ImageColumn::make('foto_latar')
                    ->label('Foto Latar Pendaftar')
                    ->url(fn($record) => asset('storage/' . $record->foto_latar))
                    ->circular(),
                TextColumn::make('nama_ayah')->label('Nama Ayah Pendaftar'),
                TextColumn::make('pekerjaan_ayah')->label('Pekerjaan Ayah Pendaftar'),
                TextColumn::make('nama_ibu')->label('Nama Ibu Pendaftar'),
                TextColumn::make('pekerjaan_ibu')->label('Pekerjaan Ibu Pendaftar'),
                TextColumn::make('verifikasi_data')
                    ->label('Verifikasi Data Pendaftar')
                    ->formatStateUsing(fn($state) => $state ? 'Verified' : 'Not Verified'),
                TextColumn::make('created_at')->dateTime()->label('Tanggal Pendaftaran'),
                TextColumn::make('updated_at')->dateTime()->label('Tanggal Update'),

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('created_at')
                    ->label('Laporan Berdasarkan Tahun Pendaftaran')
                    ->options(
                        fn() => Pendaftar::selectRaw('YEAR(created_at) as year')
                            ->distinct()
                            ->orderBy('year', 'desc')
                            ->pluck('year', 'year')
                            ->toArray()
                    )
                    ->query(function ($query, array $data) {
                        return $query->when($data['value'] ?? null, function ($query, $year) {
                            $query->whereYear('created_at', $year);
                        });
                    }),

            ])->headerActions([
                Action::make('ExportPDF')
                    ->label('Export PDF Berdasarkan Tahun')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->form([
                        Select::make('year')
                            ->label('Tahun Pendaftaran')
                            ->options(
                                fn() => Pendaftar::selectRaw('YEAR(created_at) as year')
                                    ->distinct()
                                    ->orderBy('year', 'desc')
                                    ->pluck('year', 'year')
                                    ->toArray()
                            )
                            ->required()
                    ])
                    ->action(function (array $data) {
                        return redirect()->route('laporan.export', ['year' => $data['year']]);
                    })
                    ->color('success')
            ])
            ->actions([
                //  Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporans::route('/'),
            'create' => Pages\CreateLaporan::route('/create'),
            //'edit' => Pages\EditLaporan::route('/{record}/edit'),
        ];
    }
}
