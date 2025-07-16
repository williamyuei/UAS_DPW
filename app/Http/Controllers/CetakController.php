<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use App\Models\Pinjam_Header_Anggota;

class CetakController extends Controller
{
    public function anggota(Request $request)
    {
        $anggota = Anggota::all();
        $view = view('Laporan.Cetak.anggota', compact('anggota'));

        if ($request->has('output') && $request->output === 'printer') {
            $pdf = PDF::loadHTML($view->render());
            $pdf->setPaper('a4', 'portrait');
            $pdf->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultMediaType' => 'print',
                'defaultFont' => 'serif',
                'dpi' => 120,
                'fontHeightRatio' => 1.1
            ]);
            return $pdf->download('laporan-anggota.pdf');
        }

        return $view;
    }

    public function buku(Request $request)
    {
        $buku = Buku::all();
        $view = view('Laporan.Cetak.buku', compact('buku'));

        if ($request->has('output') && $request->output === 'printer') {
            $pdf = PDF::loadHTML($view->render());
            $pdf->setPaper('a4', 'portrait');
            $pdf->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultMediaType' => 'print',
                'defaultFont' => 'serif',
                'dpi' => 120,
                'fontHeightRatio' => 1.1
            ]);
            return $pdf->download('laporan-buku.pdf');
        }

        return $view;
    }

    public function peminjaman(Request $request)
    {
        $peminjaman = Pinjam_Header_Anggota::with('anggota')->get();
        $view = view('Laporan.Cetak.peminjaman', compact('peminjaman'));

        if ($request->has('output') && $request->output === 'printer') {
            $pdf = PDF::loadHTML($view->render());
            $pdf->setPaper('a4', 'portrait');
            $pdf->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultMediaType' => 'print',
                'defaultFont' => 'serif',
                'dpi' => 120,
                'fontHeightRatio' => 1.1
            ]);
            return $pdf->download('laporan-peminjaman.pdf');
        }

        return $view;
    }

    public function cetakMultiple(Request $request)
    {
        try {
            $output = $request->output ?? 'layar';
            $reports = [];

            // Initialize data variables
            $anggota = collect();
            $buku = collect();
            $peminjaman = collect();

            // Prepare data for reports
            if ($request->has('lap_anggota')) {
                $anggota = Anggota::all();
                $reports[] = 'anggota';
            }

            if ($request->has('lap_buku')) {
                $buku = Buku::all();
                $reports[] = 'buku';
            }

            if ($request->has('lap_pinjam')) {
                $peminjaman = Pinjam_Header_Anggota::with('anggota')->get();
                $reports[] = 'peminjaman';
            }

            if (empty($reports)) {
                return redirect()->back()->with('error', 'Pilih minimal satu laporan untuk dicetak');
            }

            // Generate complete HTML for PDF
            $html = '<!DOCTYPE html><html><head>';
            $html .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
            $html .= '<style>';
            $html .= 'body { font-family: DejaVu Sans, sans-serif; } ';
            $html .= 'table { width: 100%; border-collapse: collapse; margin-bottom: 20px; } ';
            $html .= 'th, td { border: 1px solid #ddd; padding: 8px; text-align: left; } ';
            $html .= 'th { background-color: #f2f2f2; } ';
            $html .= '.report-title { text-align: center; margin-bottom: 20px; } ';
            $html .= '.report-date { margin-bottom: 20px; } ';
            $html .= '.page-break { page-break-after: always; } ';
            $html .= '</style></head><body>';

            // Add each report to the HTML
            foreach ($reports as $report) {
                switch ($report) {
                    case 'anggota':
                        $html .= view('Laporan.Cetak.anggota', compact('anggota'))->render();
                        break;
                    case 'buku':
                        $html .= view('Laporan.Cetak.buku', compact('buku'))->render();
                        break;
                    case 'peminjaman':
                        $html .= view('Laporan.Cetak.peminjaman', compact('peminjaman'))->render();
                        break;
                }

                // Add page break except after the last report
                if ($report !== last($reports)) {
                    $html .= '<div class="page-break"></div>';
                }
            }

            $html .= '</body></html>';

            // Configure PDF options
            $pdf = PDF::loadHTML($html, 'UTF-8');
            $pdf->setPaper('a4', 'portrait');
            $pdf->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultMediaType' => 'print',
                'defaultFont' => 'dejavu sans',
                'dpi' => 96,
                'fontHeightRatio' => 1.1,
                'isPhpEnabled' => true,
                'isFontSubsettingEnabled' => true
            ]);

            // Return the PDF
            $filename = 'laporan-perpustakaan-' . date('Y-m-d') . '.pdf';

            if ($output === 'printer') {
                return $pdf->download($filename);
            } else {
                return $pdf->stream($filename);
            }

        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('PDF Generation Error: ' . $e->getMessage());
            Log::error($e->getTraceAsString());

            // Return a user-friendly error message
            return redirect()->back()->with('error', 'Terjadi kesalahan saat membuat laporan. ' .
                ($e->getMessage() ?: 'Silakan coba lagi nanti.'));
        }
    }
}
