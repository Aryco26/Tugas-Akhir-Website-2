<?php

namespace App\Models;

use CodeIgniter\Model;

class Alat extends Model
{
    protected $table            = 'alat';
    protected $primaryKey       = 'IdAlat';
    protected $allowedFields    = ['IdAlat', 'NamaAlat', 'MerkType', 'LokasiFoto', 'Fungsi', 'Pemakai', 'Lokasi', 'Status'];


}
