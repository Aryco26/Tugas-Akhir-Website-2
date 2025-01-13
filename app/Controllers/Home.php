<?php

namespace App\Controllers;

use App\Models\Lokasi;

class Home extends BaseController
{
    protected $lokasi;

    public function __construct()
    {
        $this->lokasi = new Lokasi();
    }

    // Menampilkan daftar lokasi
    public function halLokasi()
    {
        $data = [
            'judul' => 'Kalibrasi - Lokasi Alat',
            'getdata' => $this->lokasi->findAll(), // Mengambil semua data lokasi
        ];

        return view('lokasi/lokasi', $data);
    }

    // Menampilkan form tambah lokasi
    public function halTambah()
    {
        $data = [
            'judul' => 'Form Tambah Lokasi',
        ];

        return view('lokasi/Tambah', $data);
    }

    public function tambah()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'IdLokasi' => [
                'rules'  => 'required|is_unique[lokasi.IdLokasi]',
                'errors' => [
                    'required'   => 'ID Lokasi harus diisi',
                    'is_unique'  => 'ID Lokasi sudah terdaftar',
                ],
            ],
            'NamaLokasi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Lokasi harus diisi',
                ],
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Kembalikan ke halaman sebelumnya jika validasi gagal
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }

        // Menyimpan data ke database
        $data = [
            'IdLokasi'   => $this->request->getPost('IdLokasi'),
            'NamaLokasi' => $this->request->getPost('NamaLokasi'),
        ];
        $this->lokasi->insert($data);

        // Redirect ke halaman daftar lokasi dengan pesan sukses
        return redirect()->to('/lokasi')->with('berhasil', 'Data lokasi berhasil ditambahkan');
    }


    public function halEdit($IdLokasi)
    {
        $lokasi = $this->lokasi->find($IdLokasi);
    
        // Jika data lokasi tidak ditemukan
        if (!$lokasi) {
            return redirect()->to('/lokasi/lokasi')->with('gagal', "Lokasi dengan ID $IdLokasi tidak ditemukan");
        }
    
        $data = [
            'judul' => 'Form Edit Lokasi',
            'lokasi' => $lokasi,
        ];
    
        return view('lokasi/halEdit', $data);
    }

    public function update()
    {
        $IdLokasi = $this->request->getPost('IdLokasi');

        // Validasi data input
        if (!$this->validate([
            'NamaLokasi' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => 'Nama Lokasi harus diisi',
                ],
            ],
        ])) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        // Update data lokasi
        $this->lokasi->update($IdLokasi, [
            'NamaLokasi' => esc($this->request->getPost('NamaLokasi')),
        ]);

        return redirect()->to('/lokasi')->with('berhasil', 'Data lokasi berhasil diperbarui');
    }


    // Menghapus lokasi
    public function hapusLokasi($IdLokasi)
    {
        // Periksa apakah data lokasi ada
        if (!$this->lokasi->find($IdLokasi)) {
            return redirect()->to('/lokasi')->with('gagal', "Lokasi dengan ID $IdLokasi tidak ditemukan");
        }

        $this->lokasi->delete($IdLokasi);
        return redirect()->to('/lokasi')->with('berhasil', 'Lokasi berhasil dihapus');
    }
}
