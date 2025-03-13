<?php

namespace App\Controllers;

use App\Models\ModelUser;
use App\Models\ModelMahasiswa;

class Register extends BaseController
{
    protected $UserModel;
    protected $MahasiswaModel;
    protected $session;

    public function __construct()
    {
        $this->UserModel = new ModelUser();
        $this->session = \config\Services::session();
        $this->MahasiswaModel = new ModelMahasiswa();
    }

    public function index(): string
    {
        return view('register');
    }

    public function insert()
    {

        $userid = $this->request->getPost('userid');
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $jekel = $this->request->getPost('jekel');
        $role = $this->request->getPost('role');


        $data1 = array(
            'userid' => $userid,
            'nama' => $nama,
            'email' => $email,
            'jenis_kelamin' => $jekel
        );

        $data2 = array(
            'userid' => $userid,
            'password' => $password,
            'role' => $role
        );

        if ($this->MahasiswaModel->insert_user($data1) && $this->UserModel->insert_user($data2)) {
            session()->setFlashdata('success', 'Berhasil Menambahkan Data');
            return redirect()->to(base_url() . 'login');
        } else {
            session()->setFlashdata('error', 'Gagal Menambahkan Data');
            return redirect()->to(base_url() . 'register');
        }
    }
}
