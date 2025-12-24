<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'user_id',
        'jabatan_id',
        'unit_kerja_id',
        'nip',
        'nama_lengkap',
        'status',
        'telepon',
        'alamat'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
