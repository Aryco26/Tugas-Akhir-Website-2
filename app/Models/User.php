<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'nik';
    protected $allowedFields = ['password'];
    protected $returnType = 'object';

    /**
     * Cari pengguna berdasarkan NIK
     *
     * @param string $nik
     * @return object|null
     */
    public function findUserByNik($nik)
    {
        return $this->where('nik', $nik)->first();
    }
}
