<?php

namespace App\Models;

use CodeIgniter\Model as CodeIgniterModel;

class m_mahasiswa extends CodeIgniterModel
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'nim';

    public function getAll()
    {

        $sql = "SELECT * FROM mahasiswa";

        // eksekusi sql di atas
        $db = db_connect();
        $data = $db->query("SELECT * FROM {$this->table}");

        // return by array
        return $data->getResultArray();
    }
    
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function mahasiswa_store($data)
    {
        return $this->db->query("INSERT INTO {$this->table} (nim, nama, umur) VALUES ('{$data['nim']}', '{$data['nama']}', '{$data['umur']}')");
    }

    public function getMahasiswa ($nim)
    {
        return $this->db->query("SELECT * FROM {$this->table} WHERE nim = '{$nim}'")->getRowArray();
    }
}
