<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ExportLaporanController extends Controller
{
    public function export($year)
    {
        $pendaftar = Pendaftar::whereYear('created_at', $year)
            ->where('verifikasi_data', true) // ✅ hanya yang tervalidasi
            ->get();

        $pdf = Pdf::loadView('exports.laporan', [
            'pendaftar' => $pendaftar,
            'year' => $year,
        ])->setPaper('a4', 'landscape');

        return $pdf->download("laporan-pendaftar-tervalidasi-{$year}.pdf");
    }
}
