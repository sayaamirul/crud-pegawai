<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PegawaiExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function collection()
    {
        return Pegawai::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Golongan',
            'Nama',
            'Email',
            'Nip',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Alamat',
            'No Telp',
            'created_at',
            'Update_at',

        ];
    }
}
