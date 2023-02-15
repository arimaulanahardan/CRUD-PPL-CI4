<?php

namespace App\Models;

use CodeIgniter\Model;

class m_user extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'admin';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['username', 'password'];
    protected $beforeInsert = ['hashPassword'];

    // public function hashPassword(array $data)
    // {
    //     $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
    //     return $data;
    // }

    //make condision if password wrong from database
    public function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }


    
    public function verifyPassword(string $password, string $hash)
    {
        return password_verify($password, $hash);
    }

    public function findByUsername(string $username)
    {
        return $this->where(['username' => $username])->first();
    }

    
}