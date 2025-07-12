<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataPendaftaranResource\Pages;
use App\Mail\VerifikasiDataMail;
use App\Models\Pendaftar;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Illuminate\Database\Eloquent\Collection;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\HtmlString;


class DataPendaftaranResource extends Resource
{
    protected static ?string $pluralLabel = 'Data Pendaftaran';

    protected static ?string $model = Pendaftar::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->label('Nama Pendaftar')->disabled(),
                TextInput::make('tempat_lahir')->label('Tempat Lahir Pendaftar')->disabled(),
                TextInput::make('email')->label('Email Pendaftar')->disabled(),
                TextInput::make('no_hp')->label('No. Telepon Pendaftar')->disabled(),
                TextInput::make('tgl_lahir')->label('Tanggal Lahir Pendaftar')->disabled(),
                TextInput::make('jenis_kelamin')->label('Jenis Kelamin Pendaftar')->disabled(),
                TextInput::make('agama')->label('Agama Pendaftar')->disabled(),
                TextInput::make('alamat')->label('Alamat Pendaftar')->disabled(),
                TextInput::make('NIK')->label('NIK Pendaftar')->disabled(),

                // ✅ Gambar Akta: ditampilkan dan bisa diklik
                Placeholder::make('scan_akta_kelahiran')
                    ->label('Scan Akta Kelahiran')
                    ->content(fn($record) => $record->scan_akta_kelahiran
                        ? new HtmlString('<a href="' . asset('storage/' . $record->scan_akta_kelahiran) . '" target="_blank"><img src="' . asset('storage/' . $record->scan_akta_kelahiran) . '" height="100"/></a>')
                        : 'Tidak ada file')
                    ->extraAttributes(['class' => 'filament-forms-html']),

                // ✅ Gambar KK
                Placeholder::make('scan_kk')
                    ->label('Scan Kartu Keluarga')
                    ->content(fn($record) => $record->scan_kk
                        ? new HtmlString('<a href="' . asset('storage/' . $record->scan_kk) . '" target="_blank"><img src="' . asset('storage/' . $record->scan_kk) . '" height="100"/></a>')
                        : 'Tidak ada file')
                    ->extraAttributes(['class' => 'filament-forms-html']),

                // ✅ Gambar Foto
                Placeholder::make('foto_latar')
                    ->label('Foto Latar Pendaftar')
                    ->content(fn($record) => $record->foto_latar
                        ? new HtmlString('<a href="' . asset('storage/' . $record->foto_latar) . '" target="_blank"><img src="' . asset('storage/' . $record->foto_latar) . '" height="100"/></a>')
                        : 'Tidak ada file')
                    ->extraAttributes(['class' => 'filament-forms-html']),

                TextInput::make('nama_ayah')->label('Nama Ayah Pendaftar')->disabled(),
                TextInput::make('pekerjaan_ayah')->label('Pekerjaan Ayah Pendaftar')->disabled(),
                TextInput::make('nama_ibu')->label('Nama Ibu Pendaftar')->disabled(),
                TextInput::make('pekerjaan_ibu')->label('Pekerjaan Ibu Pendaftar')->disabled(),

                // ✅ Select untuk verifikasi
                Select::make('verifikasi_data')
                    ->label('Status Verifikasi')
                    ->options([
                        true => 'Lolos Verifikasi',
                        false => 'Tidak Lolos Verifikasi',
                    ])
                    ->required()
                    ->native(false),
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
                    ->label('Tahun Pendaftaran')
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
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Cek Data'),
                Tables\Actions\DeleteAction::make()->label('Hapus Data'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('kirimEmail')
                        ->label('Kirim Email Verifikasi')
                        ->icon('heroicon-o-envelope')
                        ->action(function (Collection $records) {
                            foreach ($records as $record) {
                                if ($record->email) {
                                    Mail::to($record->email)->send(
                                        new VerifikasiDataMail(
                                            nama: $record->nama,
                                            verifikasi: $record->verifikasi_data
                                        )
                                    );
                                }
                            }
                        })
                        ->requiresConfirmation()
                        ->color('primary')
                        ->deselectRecordsAfterCompletion(),
                ])->label('Select Actions'),
            ])
        ;
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
            'index' => Pages\ListDataPendaftarans::route('/'),
            'create' => Pages\CreateDataPendaftaran::route('/create'),
            'edit' => Pages\EditDataPendaftaran::route('/{record}/edit'),
        ];
    }
}
