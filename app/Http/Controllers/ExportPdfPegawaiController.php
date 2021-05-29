<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use PDF;

class ExportPdfPegawaiController extends Controller
{

    public function __invoke(Request $request)
    {
        // return view('pegawai.exportpdf', [
        //     'pegawai' => Pegawai::all(),
        // ]);
        // $pdf = PDF::loadview('index')->setPaper('A4','potrait');
        // return $pdf->stream();
        $pdf = PDF::loadview('pegawai.exportpdf', [
            'pegawai' => Pegawai::all(),
        ])->setPaper('F4', 'landscape');
        return $pdf->stream();
    }
}
