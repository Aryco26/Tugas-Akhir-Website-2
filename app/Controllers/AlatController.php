<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Alat;

class AlatController extends BaseController
{
    protected $alat;

    public function __construct()
    {
        $this->alat = new Alat();
    }

    // Menampilkan daftar alat
    public function halAlat()
    {
        $data = [
            'judul' => 'Kalibrasi - Daftar Alat',
            'getdata' => $this->alat->findAll(),
        ];

        return view('alat/daftar', $data);
    }

    // Menampilkan form tambah alat
    public function halTambah()
    {
        $data = [
            'judul' => 'Form Tambah Alat',
        ];

        return view('alat/tambah', $data);
    }

    // Menambah alat baru
    public function tambah()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'IdAlat' => [
                'rules'  => 'required|is_unique[alat.IdAlat]',
                'errors' => [
                    'required'  => 'ID Alat harus diisi.',
                    'is_unique' => 'ID Alat sudah terdaftar.',
                ],
            ],
            'NamaAlat' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Alat harus diisi.',
                ],
            ],
            'MerkType' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Merk/Type harus diisi.',
                ],
            ],
            'LokasiFoto' => [
                'rules'  => 'uploaded[LokasiFoto]|is_image[LokasiFoto]|max_size[LokasiFoto,2048]',
                'errors' => [
                    'uploaded' => 'Foto alat harus diunggah.',
                    'is_image' => 'File harus berupa gambar.',
                    'max_size' => 'Ukuran file maksimal 2MB.',
                ],
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }

        // Mengolah file upload
        $fileFoto = $this->request->getFile('LokasiFoto');
        $namaFoto = $fileFoto->getRandomName();
        $fileFoto->move('public/templates/img', $namaFoto);

        $data = [
            'IdAlat'     => $this->request->getPost('IdAlat'),
            'NamaAlat'   => $this->request->getPost('NamaAlat'),
            'MerkType'   => $this->request->getPost('MerkType'),
            'LokasiFoto' => $namaFoto,
            'Fungsi'     => $this->request->getPost('Fungsi'),
            'Pemakai'    => $this->request->getPost('Pemakai'),
            'Lokasi'     => $this->request->getPost('Lokasi'),
            'Status'     => $this->request->getPost('Status'),
        ];

        $this->alat->insert($data);
        return redirect()->to('/alat/daftar')->with('berhasil', 'Alat berhasil ditambahkan.');
    }

    // Menampilkan form edit alat
    public function halEdit($IdAlat)
    {
        $alat = $this->alat->find($IdAlat);

        if (!$alat) {
            return redirect()->to('/alat/daftar')->with('gagal', "Alat dengan ID $IdAlat tidak ditemukan.");
        }

        $data = [
            'judul' => 'Form Edit Alat',
            'alat'  => $alat,
        ];

        return view('alat/edit', $data);
    }

    // Mengupdate data alat
    public function update()
    {
        $IdAlat = $this->request->getPost('IdAlat');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'NamaAlat' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Alat harus diisi.',
                ],
            ],
            'MerkType' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Merk/Type harus diisi.',
                ],
            ],
            'LokasiFoto' => [
                'rules'  => 'if_exist|is_image[LokasiFoto]|max_size[LokasiFoto,2048]',
                'errors' => [
                    'is_image' => 'File harus berupa gambar.',
                    'max_size' => 'Ukuran file maksimal 2MB.',
                ],
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }

        // Mengolah file upload
        $fileFoto = $this->request->getFile('LokasiFoto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('public/templates/img', $namaFoto);

            // Hapus foto lama
            if ($this->request->getPost('LokasiFotoLama') && file_exists('public/templates/img/' . $this->request->getPost('LokasiFotoLama'))) {
                unlink('public/templates/img/' . $this->request->getPost('LokasiFotoLama'));
            }
        } else {
            $namaFoto = $this->request->getPost('LokasiFotoLama');
        }

        $data = [
            'NamaAlat'   => $this->request->getPost('NamaAlat'),
            'MerkType'   => $this->request->getPost('MerkType'),
            'LokasiFoto' => $namaFoto,
            'Fungsi'     => $this->request->getPost('Fungsi'),
            'Pemakai'    => $this->request->getPost('Pemakai'),
            'Lokasi'     => $this->request->getPost('Lokasi'),
            'Status'     => $this->request->getPost('Status'),
        ];

        $this->alat->update($IdAlat, $data);
        return redirect()->to('/alat/daftar')->with('berhasil', 'Data alat berhasil diperbarui.');
    }

    // Menghapus alat
    public function hapusAlat($IdAlat)
    {
        $alat = $this->alat->find($IdAlat);

        if (!$alat) {
            return redirect()->to('/alat/daftar')->with('gagal', "Alat dengan ID $IdAlat tidak ditemukan.");
        }

        if ($alat['LokasiFoto'] && file_exists('public/templates/img/' . $alat['LokasiFoto'])) {
            unlink('public/templates/img/' . $alat['LokasiFoto']);
        }

        $this->alat->delete($IdAlat);
        return redirect()->to('/alat/daftar')->with('berhasil', 'Alat berhasil dihapus.');
    }
}
