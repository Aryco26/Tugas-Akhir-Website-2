<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pemakai;

class PemakaiController extends BaseController
{
    protected $pemakai;

    public function __construct()
    {
        $this->pemakai = new Pemakai();
    }

    // Tampilkan semua data
    public function index()
    {
        $data = [
            'judul' => 'Daftar Pemakai',
            'getdata' => $this->pemakai->findAll(),
        ];

        return view('pemakai/pemakai', $data);
    }

    public function halTambah()
    {
        $data = ['judul' => 'Tambah Pemakai'];
        return view('pemakai/Tambah', $data);
    }

    // Tambah data
    public function tambahPemakai()
    {
        $validationRules = [
            'IdPemakai' => [
                'rules'  => 'required|is_unique[pemakai.IdPemakai]',
                'errors' => [
                    'required'  => 'ID Pemakai harus diisi.',
                    'is_unique' => 'ID Pemakai sudah terdaftar.',
                ],
            ],
            'NamaPemakai' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Pemakai harus diisi.',
                ],
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        } 

        // Simpan data ke database
        $this->pemakai->insert([
            'IdPemakai'   => $this->request->getPost('IdPemakai'),
            'NamaPemakai' => $this->request->getPost('NamaPemakai'),
        ]);

        return redirect()->to('/pemakai/pemakai')->with('berhasil', 'Data berhasil ditambahkan.');
    }



    public function halEdit($id)
    {
        $pemakai = $this->pemakai->find($id);
        if (!$pemakai) {
            session()->setFlashdata('error', 'Data tidak ditemukan.');
            return redirect()->to('/pemakai/pemakai');
        }

        $data = [
            'judul' => 'Edit Pemakai',
            'pemakai' => $pemakai,
        ];
        return view('pemakai/edit', $data);
    }

    // Edit data
    public function edit($id)
    {
        $pemakai = $this->pemakai->find($id);
        if (!$pemakai) {
            session()->setFlashdata('error', 'Data tidak ditemukan.');
            return redirect()->to('/pemakai/pemakai');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'NamaPemakai' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Pemakai harus diisi',
                ],
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }

        $this->pemakai->update($id, [
            'NamaPemakai' => $this->request->getPost('NamaPemakai'),
        ]);

        session()->setFlashdata('berhasil', 'Pemakai berhasil diperbarui.');
        return redirect()->to('/pemakai/pemakai');
    }

    // Hapus data
    public function hapus($id)
    {
        $pemakai = $this->pemakai->find($id);
        if (!$pemakai) {
            session()->setFlashdata('error', 'Data tidak ditemukan.');
            return redirect()->to('/pemakai/pemakai');
        }

        $this->pemakai->delete($id);
        session()->setFlashdata('berhasil', 'Pemakai berhasil dihapus.');
        return redirect()->to('/pemakai/pemakai');
    }
}
