<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Vendor;

class VendorController extends BaseController
{
    protected $vendor;

    public function __construct()
    {
        $this->vendor = new Vendor();
    }

    // Menampilkan daftar vendor
    public function index()
    {
        $data = [
            'judul' => 'Daftar Vendor',
            'getdata' => $this->vendor->findAll(),
        ];

        return view('vendor/halVendor', $data);
    }

    // Menampilkan form tambah vendor
    public function halTambah()
    {
        $data = [
            'judul' => 'Form Tambah Vendor',
        ];

        return view('vendor/tambah', $data);
    }

    // Menambahkan vendor baru
    public function tambah()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'IdVendor' => [
                'rules' => 'required|is_unique[vendor.IdVendor]',
                'errors' => [
                    'required' => 'ID Vendor harus diisi',
                    'is_unique' => 'ID Vendor sudah terdaftar',
                ],
            ],
            'NamaVendor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Vendor harus diisi',
                ],
            ],
            'Email' => [
                'rules' => 'valid_email',
                'errors' => [
                    'valid_email' => 'Format email tidak valid',
                ],
            ],
            'Telpon' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Nomor telepon hanya boleh berisi angka',
                ],
            ],
            'Fax' => [
                'rules' => 'permit_empty|numeric',
                'errors' => [
                    'numeric' => 'Nomor fax hanya boleh berisi angka',
                ],
            ],
            'Kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota harus diisi',
                ],
            ],
            'Alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                ],
            ],
            'ContactPerson' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Contact Person harus diisi',
                ],
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }

        $this->vendor->insert(
         [
            'IdVendor'      => esc($this->request->getPost('IdVendor')),
            'NamaVendor'    => esc($this->request->getPost('NamaVendor')),
            'Alamat'        => esc($this->request->getPost('Alamat')),
            'Kota'          => esc($this->request->getPost('Kota')),
            'Telpon'        => esc($this->request->getPost('Telpon')),
            'Fax'           => esc($this->request->getPost('Fax')),
            'Email'         => esc($this->request->getPost('Email')),
            'ContactPerson' => esc($this->request->getPost('ContactPerson')),
        ]);

        
            return redirect()->to('/vendor/halVendor')->with('berhasil', 'Data vendor berhasil ditambahkan.');    
    }

    // Menampilkan form edit vendor
    public function halEdit($IdVendor)
    {
        $vendor = $this->vendor->find($IdVendor);

        if (!$vendor) {
            return redirect()->to('/vendor/halVendor')->with('gagal', "Vendor dengan ID $IdVendor tidak ditemukan.");
        }

        $data = [
            'judul' => 'Form Edit Vendor',
            'vendor' => $vendor,
        ];

        return view('vendor/edit', $data);
    }

    // Mengupdate data vendor
    public function update()
    {
        $IdVendor = $this->request->getPost('IdVendor');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'NamaVendor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Vendor harus diisi',
                ],
            ],
            'Email' => [
                'rules' => 'valid_email',
                'errors' => [
                    'valid_email' => 'Format email tidak valid',
                ],
            ],
            'Telpon' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Nomor telepon hanya boleh berisi angka',
                ],
            ],
            'Fax' => [
                'rules' => 'permit_empty|numeric',
                'errors' => [
                    'numeric' => 'Nomor fax hanya boleh berisi angka',
                ],
            ],
            'Kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota harus diisi',
                ],
            ],
            'Alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                ],
            ],
            'ContactPerson' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Contact Person harus diisi',
                ],
            ],
        ]);

        // Cek IDVendor untuk menghindari validasi is_unique pada saat edit
        $validation->setRule('IdVendor', 'IdVendor', 'required');
        
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }

        $this->vendor->update($IdVendor, [
            'NamaVendor'    => esc($this->request->getPost('NamaVendor')),
            'Alamat'        => esc($this->request->getPost('Alamat')),
            'Kota'          => esc($this->request->getPost('Kota')),
            'Telpon'        => esc($this->request->getPost('Telpon')),
            'Fax'           => esc($this->request->getPost('Fax')),
            'Email'         => esc($this->request->getPost('Email')),
            'ContactPerson' => esc($this->request->getPost('ContactPerson')),
        ]);

        return redirect()->to('/vendor/halVendor')->with('berhasil', 'Data vendor berhasil diperbarui.');
    }

    // Menghapus vendor
    public function hapusVendor($IdVendor)
    {
        if (!$this->vendor->find($IdVendor)) {
            return redirect()->to('/vendor/halVendor')->with('gagal', "Vendor dengan ID $IdVendor tidak ditemukan.");
        }

        $this->vendor->delete($IdVendor);
        return redirect()->to('/vendor/halVendor')->with('berhasil', 'Vendor berhasil dihapus.');
    }
}
