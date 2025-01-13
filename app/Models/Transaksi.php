<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi extends Model
{
    protected $table            = 'transaksikalibrasi';
    protected $primaryKey       = 'IdKalibrasi';
    protected $allowedFields    = ['IdKalibrasi',	'TransType',	'Petugas',	'Alat',	'NoSPMB',	'TglSPMB',	'NoSPK',	'TglSPK',	'Vendor',	'TglKalibrasi',	'TglExpire',	'NoDokumen',	'Status'];

}