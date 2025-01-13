<?php

namespace App\Models;

use CodeIgniter\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi'; // Nama tabel
    protected $primaryKey = 'IdLokasi'; // Kolom Primary Key
    protected $allowedFields = ['IdLokasi', 'NamaLokasi']; // Kolom yang dapat diisi
}
