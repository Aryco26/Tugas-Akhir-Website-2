<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Transaksi;

class TransaksiController extends BaseController
{
    protected $transaksiModel;

    public function __construct()
    {
        $this->transaksiModel = new Transaksi();
    }

    // Menampilkan daftar transaksi
    public function index()
    {
        $data = [
            'judul' => 'Daftar Transaksi Kalibrasi',
            'transaksi' => $this->transaksiModel->findAll(),
        ];

        return view('transaksi/index', $data);
    }

    // Form untuk menambahkan transaksi
    public function create()
    {
        $data = [
            'judul' => 'Tambah Transaksi Kalibrasi',
            'validation' => \Config\Services::validation() // Mengirimkan objek validasi
        ];

        return view('transaksi/create', $data);
    }

    // Menyimpan data transaksi baru
    public function store()
    {
        // Aturan validasi
        $validationRules = [
            'IdKalibrasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom IdKalibrasi harus diisi.'
                ]
            ],
            'TransType' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom TransType harus diisi.'
                ]
            ],
            'Petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Petugas harus diisi.'
                ]
            ],
            'Alat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Alat harus diisi.'
                ]
            ],
            'NoSPMB' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom NoSPMB harus diisi.'
                ]
            ],
            'TglSPMB' => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Kolom TglSPMB harus diisi.',
                    'valid_date' => 'Kolom TglSPMB harus berupa tanggal yang valid.'
                ]
            ],
            'NoSPK' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom NoSPK harus diisi.'
                ]
            ],
            'TglSPK' => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Kolom TglSPK harus diisi.',
                    'valid_date' => 'Kolom TglSPK harus berupa tanggal yang valid.'
                ]
            ],
            'Vendor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Vendor harus diisi.'
                ]
            ],
            'TglKalibrasi' => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Kolom TglKalibrasi harus diisi.',
                    'valid_date' => 'Kolom TglKalibrasi harus berupa tanggal yang valid.'
                ]
            ],
            'TglExpire' => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Kolom TglExpire harus diisi.',
                    'valid_date' => 'Kolom TglExpire harus berupa tanggal yang valid.'
                ]
            ],
            'NoDokumen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom NoDokumen harus diisi.'
                ]
            ],
            'Status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Status harus diisi.'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = [
            'IdKalibrasi' => esc($this->request->getPost('IdKalibrasi')),
            'TransType' => esc($this->request->getPost('TransType')),
            'TransDate' => esc($this->request->getPost('TransDate')),
            'Petugas' => esc($this->request->getPost('Petugas')),
            'Alat' => esc($this->request->getPost('Alat')),
            'NoSPMB' => esc($this->request->getPost('NoSPMB')),
            'TglSPMB' => esc($this->request->getPost('TglSPMB')),
            'NoSPK' => esc($this->request->getPost('NoSPK')),
            'TglSPK' => esc($this->request->getPost('TglSPK')),
            'Vendor' => esc($this->request->getPost('Vendor')),
            'TglKalibrasi' => esc($this->request->getPost('TglKalibrasi')),
            'TglExpire' => esc($this->request->getPost('TglExpire')),
            'NoDokumen' => esc($this->request->getPost('NoDokumen')),
            'Status' => esc($this->request->getPost('Status')),
        ];
        
        $this->transaksiModel->insert($data);
       
    

        return redirect()->to('/transaksi')->with('success', 'Data transaksi berhasil disimpan.');
       
    }

    // Form untuk mengedit transaksi
    public function edit($id)
    {
        $transaksi = $this->transaksiModel->find($id);
        if (!$transaksi) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Transaksi dengan ID $id tidak ditemukan.");
        }

        $data = [
            'judul' => 'Edit Transaksi Kalibrasi',
            'transaksi' => $transaksi,
            'validation' => \Config\Services::validation() // Mengirimkan objek validasi
        ];

        return view('transaksi/edit', $data);
    }

    // Menyimpan perubahan transaksi
    // Menyimpan perubahan transaksi
public function update($id)
{
    // Aturan validasi yang sama dengan store()
    $validationRules = [
        'IdKalibrasi' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom IdKalibrasi harus diisi.'
            ]
        ],
        'TransType' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom TransType harus diisi.'
            ]
        ],
       
        'Petugas' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom Petugas harus diisi.'
            ]
        ],
        'Alat' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom Alat harus diisi.'
            ]
        ],
        'NoSPMB' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom NoSPMB harus diisi.'
            ]
        ],
        'TglSPMB' => [
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Kolom TglSPMB harus diisi.',
                'valid_date' => 'Kolom TglSPMB harus berupa tanggal yang valid.'
            ]
        ],
        'NoSPK' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom NoSPK harus diisi.'
            ]
        ],
        'TglSPK' => [
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Kolom TglSPK harus diisi.',
                'valid_date' => 'Kolom TglSPK harus berupa tanggal yang valid.'
            ]
        ],
        'Vendor' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom Vendor harus diisi.'
            ]
        ],
        'TglKalibrasi' => [
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Kolom TglKalibrasi harus diisi.',
                'valid_date' => 'Kolom TglKalibrasi harus berupa tanggal yang valid.'
            ]
        ],
        'TglExpire' => [
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Kolom TglExpire harus diisi.',
                'valid_date' => 'Kolom TglExpire harus berupa tanggal yang valid.'
            ]
        ],
        'NoDokumen' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom NoDokumen harus diisi.'
            ]
        ],
        'Status' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kolom Status harus diisi.'
            ]
        ]
    ];

    // Melakukan validasi berdasarkan aturan
    if (!$this->validate($validationRules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $data = [
        'IdKalibrasi' => esc($this->request->getPost('IdKalibrasi')),
        'TransType' => esc($this->request->getPost('TransType')),
        'Petugas' => esc($this->request->getPost('Petugas')),
        'Alat' => esc($this->request->getPost('Alat')),
        'NoSPMB' => esc($this->request->getPost('NoSPMB')),
        'TglSPMB' => esc($this->request->getPost('TglSPMB')),
        'NoSPK' => esc($this->request->getPost('NoSPK')),
        'TglSPK' => esc($this->request->getPost('TglSPK')),
        'Vendor' => esc($this->request->getPost('Vendor')),
        'TglKalibrasi' => esc($this->request->getPost('TglKalibrasi')),
        'TglExpire' => esc($this->request->getPost('TglExpire')),
        'NoDokumen' => esc($this->request->getPost('NoDokumen')),
        'Status' => esc($this->request->getPost('Status')),
    ];
    $this->transaksiModel->update($id, $data);  // Memperbarui transaksi

    return redirect()->to('/transaksi')->with('success', 'Data transaksi berhasil diperbarui.');
}


    // Menambahkan method delete pada TransaksiController
    public function delete($id)
    {
        // Mencari transaksi berdasarkan ID
        $transaksi = $this->transaksiModel->find($id);

        // Mengecek apakah transaksi ditemukan
        if (!$transaksi) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Transaksi dengan ID $id tidak ditemukan.");
        }
        // Menghapus data transaksi dari database
        $this->transaksiModel->delete($id);

        // Redirect kembali ke halaman daftar transaksi dengan pesan sukses
        return redirect()->to('/transaksi')->with('success', 'Data transaksi berhasil dihapus.');
}

}
