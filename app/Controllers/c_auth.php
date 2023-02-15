<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\m_user;

class c_auth extends BaseController
{

    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $model = new m_user();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->findByUsername($username);

        if (!$user) {
            return redirect()->to('/')->with('error', 'Username atau Password salah');
        }

        // if (!$model->verifyPassword($password, $user['password'])) {
        //     return redirect()->to('/')->with('error', 'Username atau Password salah');
        // }

        session()->set('user_name', $user['username']);
        session()->set('isLoggedIn', true);
        return redirect()->to('/home');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}