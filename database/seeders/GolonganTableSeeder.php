<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Seeder;

class GolonganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            'Golongan I (Juru)',
            'Golongan Ia: Juru Muda',
            'Golongan Ib: Juru Muda Tingkat I',
            'Golongan Ic: Juru',
            'Golongan 1d: Juru Tingkat 1',
            'Golongan II (Pengatur)',
            'Golongan IIa: Pengatur muda ',
            'Golongan IIb: Pengatur muda tingkat I ',
            'Golongan IIc: Pengatur ',
            'Golongan IId: Pengatur tingkat 1',
            'Golongan III (Penata)',
            'Golongan IIIa: Penata muda ',
            'Golongan IIIb: Penata muda tingkat I ',
            'Golongan IIIc: Penata',
            'Golongan IIId: Penata tingkat 1',
            'Golongan IV (Pembina)',
            'Golongan IVa: Pembina ',
            'Golongan IVb: Pembina tingkat I',
            'Golongan IVc: Pembina utama muda',
            'Golongan IVd Pembina utama madya',
            'Golongan IVe: Pembina utama',
        ];

        foreach ($datas as $data) {
            Golongan::updateOrCreate(['nama' => $data]);
        }
    }
}
