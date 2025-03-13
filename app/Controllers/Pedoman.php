<?php

namespace App\Controllers;

use App\Models\ModelPedoman;
use App\Models\ModelUser;
use App\Models\ModelAdmin;

class Pedoman extends BaseController
{

    protected $PedomanModel;
    protected $UserModel;
    protected $AdminModel;

    public function __construct()
    {
        $this->PedomanModel = new ModelPedoman();
        $this->UserModel = new ModelUser();
        $this->AdminModel = new ModelAdmin();
    }

    public function index()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $data = array(
            'body' => 'Admin/pedoman/list',
            'data' => $this->PedomanModel->getpedoman(),
            'dataku' => $dataku
        );

        return view('template', $data);
    }

    public function input()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $data = array(
            'body'  => 'Admin/pedoman/form',
            'dataku' => $dataku
        );

        return view('template', $data);
    }


    public function insert()

    {

        $nama = $this->request->getPost('nama');


        $lampiran = $this->request->getFile('filenya');

        $lampiranPath = '';

        if ($lampiran->isValid() && !$lampiran->hasMoved()) {

            $lampiranPath = $lampiran->getName();

            $lampiran->move(ROOTPATH . 'public/file_pedoman/');
        }





        $data = array(
            'nama' => $nama,
            'filenya' => $lampiranPath

        );

        if ($this->PedomanModel->insert_pedoman($data)) {

            session()->setFlashdata('success', 'Berhasil Menambahkan Data');

            return redirect()->to(base_url() . 'pedoman');
        } else {

            session()->setFlashdata('error', 'Gagal Menambahkan Data');

            return redirect()->to(base_url() . 'pedoman/input');
        }
    }

    public function edit($id)

    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $data = array(
            'body' => 'Admin/pedoman/form_edit',
            'data' => $this->PedomanModel->getById($id)->getRow(),
            'dataku' => $dataku

        );
        return view('template', $data);
    }

    public function update($id)
    {
        $nama = $this->request->getPost('nama');
        $filenya = $this->request->getFile('filenya');

        $existingData = $this->PedomanModel->getById($id)->getRow();




        if ($filenya->isValid() && !$filenya->hasMoved()) {
            $newFileName = $filenya->getName();
            $filenya->move(ROOTPATH . 'public/file_pedoman/', $newFileName);
        } else {
            $newFileName = $existingData->filenya;
        }

        // Data untuk update
        $data = [
            'nama' => $nama,
            'filenya' => $newFileName
        ];

        // Update database
        $result = $this->PedomanModel->update($id, $data);

        if ($result) {
            return redirect()->to(base_url('pedoman'))->with('success', 'Data Updated Successfully');
        } else {
            return redirect()->to(base_url('pedoman/edit/' . $id))->with('error', 'Data Update Failed');
        }
    }


    public function delete($id)
    {
        $this->PedomanModel->delete($id);
        return redirect()->to(base_url('pedoman'))->with('success', 'Data berhasil dihapus');
    }
}
