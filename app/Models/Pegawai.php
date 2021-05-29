<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nama',
        'nip',
        'golongan_id',
        'jenis_kelamin',
        'email',
        'alamat',
        'no_telp',
        'tempat_lahir',
        'tanggal_lahir',
    ];

    protected $dates = [
        'tanggal_lahir',
    ];

    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }
}
