<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $session = session();
        $userModel = new User();

        $validationRules = [
            'nik' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
        }

        $nik = $this->request->getPost('nik');
        $password = $this->request->getPost('password');

        // Hardcode login untuk NIK 0071 dan password admin
        if ($nik === '0071' && $password === 'admin') {
            $session->set([
                'isLoggedIn' => true,
                'nik' => $nik,
            ]);

            return redirect()->to('/lokasi');
        }

        // Validasi login dengan database
        $user = $userModel->findUserByNik($nik);

        if (!$user) {
            $session->setFlashdata('error', 'NIK tidak ditemukan.');
            return redirect()->back()->withInput();
        }

        if ($user->password !== $password) {
            $session->setFlashdata('error', 'Password salah.');
            return redirect()->back()->withInput();
        }

        $session->set([
            'isLoggedIn' => true,
            'nik' => $user->nik,
        ]);

        return redirect()->to('/lokasi');
    }
    public function logout()
    {
        $session = session();
        $session->destroy(); // Hapus semua data sesi

        return redirect()->to('/')->with('success', 'Anda telah logout.');
    }

}
