<?php

namespace App\Controllers;

class c_mahasiswa extends BaseController
{
    protected $model;
    
    public function __construct()
    {
        $this->model = new \App\Models\m_mahasiswa();
    }

    public function display()
    {
        $data =  [
            'name' => 'Ari Maulana Hardan',
            'title' => 'Mahasiswa'
        ];
        return view('Home', $data);
    }

    public function view_mahasiswa_display()
    {
        $model = new \App\Models\m_mahasiswa();
        $data = [
            'mahasiswa' => $model->getAll(),
            'title' => 'Data Mahasiswa'
        ];
        return view('v_mahasiswa', $data);
    }

    public function detail($nim)
    {
        $model = new \App\Models\m_mahasiswa();
        $data = [
            'mahasiswa' => $model->getMahasiswa($nim),
            'title' => 'Detail Mahasiswa'
        ];
        return view('v_mahasiswa_detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Mahasiswa'
        ];
        return view('v_mahasiswa_create', $data);
    }

    public function store(){
        if (!$this->validate([
            'nim' => [
                'label' => 'NIM',
                'rules' => 'required|numeric|min_length[9]|max_length[9]|is_unique[mahasiswa.nim]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berupa angka',
                    'min_length' => '{field} harus berjumlah 9 karakter',
                    'max_length' => '{field} harus berjumlah 9 karakter'
                ]
            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'umur' => [
                'label' => 'Umur',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berupa angka'
                ]
            ]
        ])) {
            return view('v_mahasiswa_create', [
                'errors' => $this->validator->getErrors(),
                'title' => 'Store Mahasiswa Error !'
            ]);
        }
            $data = [
                'nim' => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
                'umur' => $this->request->getPost('umur')
            ];

        $this->model->mahasiswa_store($data);
        return redirect()->to('/mahasiswa');
    }


}
