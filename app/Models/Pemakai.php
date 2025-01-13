<?php
namespace App\Models;

use CodeIgniter\Model;

class Pemakai extends Model
{
    protected $table            = 'pemakai';
    protected $primaryKey       = 'IdPemakai';
    protected $allowedFields    = ['IdPemakai', 'NamaPemakai'];
    protected $useTimestamps    = false; // Set true jika tabel memiliki kolom created_at/updated_at
}

