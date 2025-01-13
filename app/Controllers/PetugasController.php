<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Petugas;

class PetugasController extends BaseController
{
    protected $petugasModel;

    public function __construct()
    {
        $this->petugasModel = new Petugas();
    }

    // Menampilkan daftar petugas
    public function index()
    {
        $data = [
            'judul' => 'Daftar Petugas',
            'petugas' => $this->petugasModel->findAll(),
        ];

        return view('petugas/index', $data);
    }

    // Form untuk menambahkan petugas
    public function halTambah()
    {
        $data = [
            'judul' => 'Tambah Petugas',
        ];

        return view('petugas/tambah', $data);
    }

    // Menyimpan data petugas baru
    public function tambah()
    {
        $validationRules = [
            'IdPetugas' => [
                'rules' => 'required|is_unique[petugas.IdPetugas]',
                'errors' => [
                    'required' => 'ID Petugas harus diisi.',
                    'is_unique' => 'ID Petugas sudah terdaftar.',
                ],
            ],
            'NamaPetugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Petugas harus diisi.',
                ],
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'IdPetugas' => esc($this->request->getPost('IdPetugas')),
            'NamaPetugas' => esc($this->request->getPost('NamaPetugas')),
        ];

        $this->petugasModel->insert($data);

        return redirect()->to('/petugas')->with('berhasil', 'Data petugas berhasil ditambahkan.');
    }

    // Form untuk mengedit petugas
    public function edit($id)
    {
        $petugas = $this->petugasModel->find($id);

        if (!$petugas) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Petugas dengan ID $id tidak ditemukan.");
        }

        $data = [
            'judul' => 'Edit Petugas',
            'petugas' => $petugas,
        ];

        return view('petugas/edit', $data);
    }

    // Menyimpan perubahan petugas
    public function update($id)
    {
        $petugas = $this->petugasModel->find($id);

        if (!$petugas) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Petugas dengan ID $id tidak ditemukan.");
        }

        $validationRules = [
            'NamaPetugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Petugas harus diisi.',
                ],
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'NamaPetugas' => esc($this->request->getPost('NamaPetugas')),
        ];

        $this->petugasModel->update($id, $data);

        return redirect()->to('/petugas')->with('berhasil', 'Data petugas berhasil diperbarui.');
    }

    // Menghapus petugas
    public function delete($id)
    {
        $petugas = $this->petugasModel->find($id);

        if (!$petugas) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Petugas dengan ID $id tidak ditemukan.");
        }

        $this->petugasModel->delete($id);

        return redirect()->to('/petugas')->with('berhasil', 'Data petugas berhasil dihapus.');
    }

}
