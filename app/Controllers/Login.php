<?php

namespace App\Controllers;

use App\Models\ModelUser;

class Login extends BaseController
{
    protected $UserModel;
    protected $session;

    public function __construct()
    {
        $this->UserModel = new ModelUser();
        $this->session = \config\Services::session();
    }

    public function index(): string
    {
        return view('login');
    }


    public function login()
    {

        $userid = $this->request->getPost('userid');
        $password = $this->request->getPost('password');

        $cek_login = $this->UserModel->cekuserid($userid);
        if ($cek_login->getNumRows() > 0) {
            $user = $cek_login->getRowArray();
            $pw_valid = $user['password'];
            if ($password == $pw_valid) {
                $newSession = [
                    'id' => $user['id'],
                    'userid' => $user['id']
                ];
                session()->set($newSession);
                session()->setFlashdata('success', 'Selamat Anda Berhasil Login');
                return redirect()->to(base_url('/cekrole'));
            } else {
                session()->setFlashdata('error', 'Username atau Password salah');
                return redirect()->to(base_url('login'));
            }
        } else {
            session()->setFlashdata('error', 'Username atau Password salah');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        // Hapus semua data sesi dan redirect ke halaman login
        $this->session->destroy();
        return redirect()->to(base_url('login/'));
    }
}
