<?php

namespace App\Models;

use CodeIgniter\Model;

class Petugas extends Model
{
    protected $table            = 'petugas';
    protected $primaryKey       = 'IdPetugas';
    protected $allowedFields    = ['IdPetugas',	'NamaPetugas'];
}
