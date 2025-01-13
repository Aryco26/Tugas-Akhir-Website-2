<?php

namespace App\Models;

use CodeIgniter\Model;

class Vendor extends Model
{
    protected $table            = 'vendor';
    protected $primaryKey       = 'IdVendor';
       protected $allowedFields    = [	'IdVendor',	'NamaVendor',	'Alamat', 'Kota',	'Telpon',	'Fax',	'Email'	,'ContactPerson'	
    ];
}
