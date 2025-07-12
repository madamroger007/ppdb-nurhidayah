<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftar';

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'NIK',
        'scan_akta_kelahiran',
        'scan_kk',
        'foto_latar',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'verifikasi_data',
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
        'verifikasi_data' => 'boolean',
    ];
}
