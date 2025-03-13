<?php

namespace App\Controllers;

use App\Models\ModelMahasiswa;
use App\Models\ModelDosen;
use App\Models\ModelAdmin;
use App\Models\ModelUser;

class Pembagian extends BaseController
{

    protected $MahasiswaModel;
    protected $UserModel;
    protected $DosenModel;
    protected $AdminModel;
    public function __construct()
    {
        $this->MahasiswaModel = new ModelMahasiswa();
        $this->DosenModel = new ModelDosen();
        $this->AdminModel = new ModelAdmin();
        $this->UserModel = new ModelUser();
    }



    public function index()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $data = array(
            'body' => 'Admin/pembagian/list',
            'data' => $this->MahasiswaModel->getMahasiswa(),
            'dataku' => $dataku
        );

        return view('template', $data);
    }

    public function edit($userid)
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $data = array(
            'body' => 'Admin/pembagian/form_edit',
            'data' => $this->MahasiswaModel->getByUserId($userid)->getRow(),
            'dosen' => $this->DosenModel->getdosen(),
            'dataku' => $dataku
        );
        return view('template', $data);
    }


    public function update()
    {
        $userid = $this->request->getPost('userid');
        $pembimbing1 = $this->request->getPost('dosen');
        $pembimbing2 = $this->request->getPost('dosen2');
        $user1 = $this->request->getPost('u1');
        $user2 = $this->request->getPost('u2');


        $data = array(
            'pembimbing_1' => $pembimbing1,
            'pembimbing_2' => $pembimbing2,
            'u1' => $user1,
            'u2' => $user2
        );

        $result = $this->MahasiswaModel->updateMahasiswa($userid, $data);

        if ($result) {
            return redirect()->to(base_url() . 'pembagian/list');
        }
    }
}
