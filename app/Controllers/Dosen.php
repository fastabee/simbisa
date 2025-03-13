<?php

namespace App\Controllers;

use App\Models\ModelPedoman;

use App\Models\ModelDosen;
use App\Models\ModelPengdul;
use App\Models\ModelPresensi;
use App\Models\ModelUser;
use App\Models\ModelIzinD1;

use App\Models\ModelMahasiswa;
use App\Models\ModelProposal;
use App\Models\ModelAdmin;



class Dosen extends BaseController
{

    protected $ProposalModel;
    protected $AdminModel;
    protected $PedomanModel;
    protected $D1;
    protected $PresensiModel;

    protected $PengdulModel;

    protected $DosenModel;
    protected $UserModel;

    protected $MahasiswaModel;


    public function __construct()
    {
        $this->PedomanModel = new ModelPedoman();
        $this->DosenModel = new ModelDosen();
        $this->UserModel = new ModelUser();
        $this->MahasiswaModel = new ModelMahasiswa();
        $this->PengdulModel = new ModelPengdul();
        $this->PresensiModel = new ModelPresensi();
        $this->D1 = new ModelIzinD1();
        $this->ProposalModel = new ModelProposal();
        $this->AdminModel = new ModelAdmin();
    }

    public function index()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $data = array(
            'body' => 'Admin/dosen/list',
            'data' => $this->DosenModel->getdosen(),
            'dataku' => $dataku,
        );

        return view('template', $data);
    }

    public function input()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $data = array(
            'body'  => 'Admin/dosen/form',
            'dataku' => $dataku,
        );

        return view('template', $data);
    }


    public function insert()

    {

        $userid = $this->request->getPost('userid');
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');


        $data = array(
            'userid' => $userid,
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email

        );

        $data2 = array(
            'userid' => $userid,
            'password' => $password,
            'role' => 'dosen',
        );

        if ($this->UserModel->insert_user($data2) && $this->DosenModel->insert_dosen($data)) {

            session()->setFlashdata('success', 'Berhasil Menambahkan Data');

            return redirect()->to(base_url() . 'dosen/list');
        } else {

            session()->setFlashdata('error', 'Gagal Menambahkan Data');

            return redirect()->to(base_url() . 'input/dosen');
        }
    }

    public function edit($userid)
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $data = array(
            'body' => 'Admin/dosen/form_edit',
            'data' => $this->UserModel->getByUserId($userid)->getRow(),
            'data2' => $this->DosenModel->getByUserId($userid)->getRow(),
            'dataku' => $dataku,
        );
        return view('template', $data);
    }

    public function update($userid)
    {

        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');

        // Data untuk update
        $data = [

            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'jenis_kelamin' => $this->request->getPost('gender')
        ];

        $data2 = [

            'password' => $password
        ];

        // Update database
        $result = $this->DosenModel->updateDosen($userid, $data);
        $result2 = $this->UserModel->updateUser($userid, $data2);



        if ($result && $result2) {
            session()->setFlashdata('success', 'Data Berhasil Diubah');
            return redirect()->to(base_url() . 'dosen/list');
        } else {
            return redirect()->to(base_url('dosen/edit/' . $userid))->with('error', 'Data Update Failed');
        }
    }

    public function update2($userid)
    {

        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');

        // Data untuk update
        $data = [

            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'jenis_kelamin' => $this->request->getPost('gender')
        ];

        $data2 = [

            'password' => $password
        ];

        // Update database
        $result = $this->DosenModel->updateDosen($userid, $data);
        $result2 = $this->UserModel->updateUser($userid, $data2);



        if ($result && $result2) {
            session()->setFlashdata('success', 'Data Berhasil Diubah');
            return redirect()->to(base_url() . 'profil/dosen');
        } else {
            return redirect()->to(base_url('profil/dosen'))->with('error', 'Data Update Failed');
        }
    }


    public function delete($userid)
    {
        $this->DosenModel->deleteDosen($userid);
        $this->UserModel->deleteUser($userid);
        return redirect()->to(base_url('dosen/list'))->with('success', 'Data berhasil dihapus');
    }










    //halaman role dosen
    // info bimbingan 1
    public function infoBimbingan1()
    {
        $id = session('id');
        $user = $this->UserModel->getById($id)->getRow();
        $mahasiswa = $this->MahasiswaModel->getByU1($user->userid);

        $dataku = $this->DosenModel->getByUserId($user->userid)->getRow();
        $data = array(
            'body' => 'Dosen/infobimbingan/infobimbingan1',
            'data' => $mahasiswa,
            'dataku' => $dataku
        );
        return view('templateD', $data);
    }



    public function acc_judul($userid)
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->DosenModel->getByUserId($user->userid)->getRow();
        $data = array(
            'data' => $this->PengdulModel->getByUserId($userid),
            'body' => 'Dosen/infobimbingan/persetujuan_judul',
            'dataku' => $dataku
        );

        return view('templateD', $data);
    }

    //terima judul
    public function terimajudul($id)
    {
        // Ambil data berdasarkan ID
        $datapengdul = $this->PengdulModel->getById($id)->getRow();
        if (!$datapengdul) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $userid = $datapengdul->userid;
        $judul = $datapengdul->judul;

        // Update status di tabel pengajuan_judul
        $updateStatus = ['status' => 'Diterima'];
        $result1 = $this->PengdulModel->update($id, $updateStatus);

        // Update judul_skripsi di tabel data_mahasiswa
        $updateJudul = ['judul_skripsi' => $judul];
        $result2 = $this->MahasiswaModel->updateMahasiswa($userid, $updateJudul);

        if ($result1 && $result2) {
            return redirect()->to(base_url('bimbingan1'))->with('sukses', 'Berhasil Update Data');
        } else {
            return redirect()->to(base_url('acc/judul/') . $userid)->with('error', 'Gagal Update Data');
        }
    }

    public function tolakjudul($id)
    {
        $datapengdul = $this->PengdulModel->getById($id)->getRow();
        $userid = $datapengdul->userid;
        $this->PengdulModel->delete($id);
        return redirect()->to(base_url('acc/judul/') . $userid)->with('sukses', 'Berhasil Hapus Data');
    }


    public function infoBimbingan2()
    {
        $id = session('id');
        $user = $this->UserModel->getById($id)->getRow();
        $mahasiswa = $this->MahasiswaModel->getByU2($user->userid);

        $dataku = $this->DosenModel->getByUserId($user->userid)->getRow();
        $data = array(
            'body' => 'Dosen/infobimbingan/infobimbingan2',
            'data' => $mahasiswa,
            'dataku' => $dataku
        );
        return view('templateD', $data);
    }

    public function emailnya()
    {
        $email = \Config\Services::email();

        $email->setFrom('simbisa@gmail.com', 'Fasta');
        $email->setTo('zizicomel02@gmail.com');
        $email->setSubject('Administrasi Simbisa');
        $email->setMessage('Testing d the email class.');

        try {
            if ($email->send()) {
                echo 'Email has been sent.';
            } else {
                throw new \Exception($email->printDebugger(['headers']));
            }
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    //presensi
    public function presensi()
    {
        $id = session('id');
        $user = $this->UserModel->getById($id)->getRow();
        $userid = $user->userid;

        $dataku = $this->DosenModel->getByUserId($user->userid)->getRow();
        $data = array(
            'body' => 'Dosen/Presensi/list',
            'data' => $this->MahasiswaModel->getByU1OrU2($userid),
            'userid' => $userid,
            'dataku' => $dataku
        );
        return view('templateD', $data);
    }

    public function presensi_detail($userid)
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $mahasiswa = $this->MahasiswaModel->getByUserId($userid)->getRow();
        $dosenid = session('id');
        $userdosen = $this->UserModel->getById($dosenid)->getRow();
        $udosen = $userdosen->userid;
        $nama = $mahasiswa->nama;
        $data = array(
            'body' => 'Dosen/Presensi/detail',
            'data' => $this->PresensiModel->getByUserIdAndUDosen($userid, $udosen),
            'userid' => $userid,
            'nama' => $nama,
            'dataku' => $dataku
        );
        return view('templateD', $data);
    }

    public function input_presensi()
    {
        $dosenid = session('id');
        $userdosen = $this->UserModel->getById($dosenid)->getRow();
        $udosen = $userdosen->userid;
        $userid = $this->request->getPost('userid');
        $tanggal = $this->request->getPost('tanggal');
        $catatan = $this->request->getPost('catatan');
        $mahasiswa = $this->MahasiswaModel->getByUserId($userid)->getRow();
        $email = $mahasiswa->email;
        $nama = $mahasiswa->nama;
        $data = array(
            'userid' => $userid,
            'tanggal' => $tanggal,
            'catatan' => $catatan,
            'nama' => $nama,
            'udosen' => $udosen,
        );
        $result = $this->PresensiModel->insert_presensi($data);
        if ($result) {
            $emailke = \Config\Services::email();

            $emailke->setFrom('simbisa@gmail.com', 'Administrasi Simbisa');
            $emailke->setTo($email);
            $emailke->setSubject('Catatan Revisi');
            $emailke->setMessage($catatan);

            try {
                if ($emailke->send()) {
                    session()->setFlashdata('sukses', 'Berhasil Menambahkan Data');

                    return redirect()->to(base_url() . 'presensi/detail/' . $userid);
                } else {
                    throw new \Exception($emailke->printDebugger(['headers']));
                }
            } catch (\Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }


    public function izin_proposaldosen()
    {
        $dosenid = session('id');
        $userdosen = $this->UserModel->getById($dosenid)->getRow();
        $udosen = $userdosen->userid;
        $mahasiswa = $this->MahasiswaModel->getByU1($udosen);
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->DosenModel->getByUserId($user->userid)->getRow();
        $data = array(
            'body' => 'Dosen/Izin/proposal',
            'mahasiswa' => $mahasiswa,
            'dataku' => $dataku,
        );
        return view('templateD', $data);
    }

    public function gas_proposal($userid)
    {
        $data = array(
            'i1' => 'disetujui',
        );
        $result = $this->MahasiswaModel->updateMahasiswa($userid, $data);
        if ($result) {
            return redirect()->to(base_url() . 'proposal/izin');
        }
    }



    public function izin_skripsidosen()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->DosenModel->getByUserId($user->userid)->getRow();
        $dosenid = session('id');
        $userdosen = $this->UserModel->getById($dosenid)->getRow();
        $udosen = $userdosen->userid;
        $mahasiswa = $this->MahasiswaModel->getByU1($udosen);
        $data = array(
            'body' => 'Dosen/Izin/skripsi',
            'mahasiswa' => $mahasiswa,
            'dataku' => $dataku,
        );
        return view('templateD', $data);
    }

    public function gas_skripsi($userid)
    {
        $data = array(
            'i2' => 'disetujui',
        );
        $result = $this->MahasiswaModel->updateMahasiswa($userid, $data);
        if ($result) {
            return redirect()->to(base_url() . 'skripsi/izin');
        }
    }
}
