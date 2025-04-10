<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController {
    function __construct() {
        helper('form');
    }

    public function login() {
        if ($this->request->getPost()) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $dataUser = ['username' => 'yunazriel', 'password' => '0192023a7bbd73250516f069df18b500', 'role' => 'admin']; // passw admin123

            if ($username == $dataUser['username']) {
                if (md5($password) == $dataUser['password']) {
                    session()->set([
                        'username' => $dataUser['username'],
                        'role' => $dataUser['role'],
                        'isLoggedIn' => TRUE
                    ]);

                    return redirect()->to(base_url('/'));
                } else {
                    session()->setFlashdata('failed', 'Username & Password Salah');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('failed', 'Username Tidak Ditemukan');
                return redirect()->back();
            }
        } else {
            return view('content/v_login');
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('login');
    }
}
