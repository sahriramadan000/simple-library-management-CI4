<?php

namespace App\Validation;

use App\Models\PeminjamanBukuModel;

class CustomRules
{
    public function check_date(string $str, string &$error = null, array $data = null): bool
    {
        $tgl_pinjam = new \DateTime($data['tgl_pinjam']);
        $tgl_kembali = new \DateTime($str);

        if ($tgl_kembali <= $tgl_pinjam) {
            $error = 'Tanggal kembali tidak boleh kurang dari atau sama dengan tanggal pinjam.';
            return false;
        }
        return true;
    }
}
