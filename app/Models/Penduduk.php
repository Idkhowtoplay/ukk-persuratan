<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    protected $table = 'penduduk';
    protected $fillable = [ 'nama', 'jenis_kelamin', 'no_kk', 'nik', 'tanggal_lahir', 'tempat_lahir', 'agama', 'rt', 'rw', 'alamat_spesifik', 'status_perkawinan', 'status_pendidikan'];

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id');
    }
}
