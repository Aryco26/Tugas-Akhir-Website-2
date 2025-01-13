<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            'nik' => 'admin',
            'password'    => password_hash('admin', PASSWORD_DEFAULT)
        ];
        $this->db->table('user')->insert($data);
    }
}
