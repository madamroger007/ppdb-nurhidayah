<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Jenssegers\ImageHash\ImageHash;
use Jenssegers\ImageHash\Implementations\PerceptualHash;

class PendaftaranController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_lengkap'       => 'required|string|max:255',
            'tempat_lahir'       => 'required|string|max:100',
            'tanggal_lahir'      => 'required|date',
            'jenis_kelamin'      => 'required|string',
            'agama'              => 'required|string|max:50',
            'alamat'             => 'required|string|max:255',
            'nik'                 => 'required|string|max:20|unique:pendaftar,nik',
            'scan_akta_kelahiran' => 'required|image|max:2048',
            'scan_kk'             => 'required|image|max:2048',
            'foto_latar'         => 'required|image|max:2048',
            'nama_ayah'          => 'required|string|max:255',
            'pekerjaan_ayah'     => 'required|string|max:100',
            'nama_ibu'           => 'required|string|max:255',
            'pekerjaan_ibu'      => 'required|string|max:100',
            'no_hp'              => 'required|string|max:20',
            'email'               => 'nullable|email|max:255|unique:pendaftar,email',
        ]);

        // === Simpan dan cek duplikat akta ===
        $aktaFile = $request->file('scan_akta_kelahiran');
        $aktaPath = $aktaFile->store('uploads/akta', 'public');
        $aktaFullPath = storage_path('app/public/' . $aktaPath);
        if ($this->isDuplicateImage($aktaFullPath, 'scan_akta_kelahiran')) {
            Storage::disk('public')->delete($aktaPath);
            return response()->json([
                'message' => 'Scan Akta Kelahiran sudah pernah diunggah (terdeteksi duplikat).'
            ], 422);
        }

        // === Simpan dan cek duplikat KK ===
        $kkFile = $request->file('scan_kk');
        $kkPath = $kkFile->store('uploads/kk', 'public');
        $kkFullPath = storage_path('app/public/' . $kkPath);
        if ($this->isDuplicateImage($kkFullPath, 'scan_kk')) {
            Storage::disk('public')->delete($kkPath);
            return response()->json([
                'message' => 'Scan Kartu Keluarga sudah pernah diunggah (terdeteksi duplikat).'
            ], 422);
        }

        // === Simpan dan cek duplikat Foto ===
        $fotoFile = $request->file('foto_latar');
        $fotoPath = $fotoFile->store('uploads/foto', 'public');
        $fotoFullPath = storage_path('app/public/' . $fotoPath);
        if ($this->isDuplicateImage($fotoFullPath, 'foto_latar')) {
            Storage::disk('public')->delete($fotoPath);
            return response()->json([
                'message' => 'Foto Latar Biru sudah pernah diunggah (terdeteksi duplikat).'
            ], 422);
        }

        // Simpan data ke database
        Pendaftar::create([
            'nama'                => $validated['nama_lengkap'],
            'email'               => $validated['email'],
            'no_hp'               => $validated['no_hp'],
            'tempat_lahir'       => $validated['tempat_lahir'],
            'tgl_lahir'           => $validated['tanggal_lahir'],
            'jenis_kelamin'       => $validated['jenis_kelamin'],
            'agama'               => $validated['agama'],
            'alamat'              => $validated['alamat'],
            'NIK'                 => $validated['nik'],
            'scan_akta_kelahiran' => $aktaPath,
            'scan_kk'             => $kkPath,
            'foto_latar'          => $fotoPath,
            'nama_ayah'           => $validated['nama_ayah'],
            'pekerjaan_ayah'      => $validated['pekerjaan_ayah'],
            'nama_ibu'            => $validated['nama_ibu'],
            'pekerjaan_ibu'       => $validated['pekerjaan_ibu'],
            'verifikasi_data'     => false,
        ]);



        return response()->json(['message' => 'Pendaftaran berhasil dikirim!'], 200);
    }

    /**
     * Mengecek apakah gambar duplikat menggunakan pHash.
     *
     * @param string $newFilePath Path file gambar yang diupload
     * @param string $column Kolom di database (ex: 'scan_akta_kelahiran')
     * @return bool True jika duplikat
     */
    protected function isDuplicateImage(string $newFilePath, string $column): bool
    {
        $hasher = new ImageHash(new PerceptualHash());
        $newHash = $hasher->hash($newFilePath);

        $existingData = Pendaftar::whereNotNull($column)->get();

        foreach ($existingData as $row) {
            $existingPath = storage_path('app/public/' . $row->{$column});
            if (!file_exists($existingPath)) continue;

            $existingHash = $hasher->hash($existingPath);
            if ($hasher->distance($newHash, $existingHash) < 5) {
                return true;
            }
        }

        return false;
    }
}
