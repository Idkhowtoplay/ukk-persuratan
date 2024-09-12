<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Penduduk;

class ValidPenduduk implements Rule
{
    protected $nik;
    protected $rt;
    protected $rw;

    public function __construct($nik, $rt, $rw)
    {
        $this->nik = $nik;
        $this->rt = $rt;
        $this->rw = $rw;
    }

    public function passes($attribute, $value)
    {
        return Penduduk::where('nama', $value)
            ->where('nik', $this->nik)
            ->where('rt', $this->rt)
            ->where('rw', $this->rw)
            ->exists();
    }

    public function message()
    {
        return 'Data penduduk tidak valid.';
    }
}
