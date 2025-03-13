<?php

namespace App\Controllers;

use App\Models\ModelPedoman;

use App\Models\ModelDosen;

use App\Models\ModelUser;

use App\Models\ModelMahasiswa;
use App\Models\ModelPengdul;

use App\Models\ModelPresensi;
use App\Models\ModelProposal;
use App\Models\ModelSkripsi;
use App\Models\ModelAdmin;

class Mahasiswa extends BaseController
{

    protected $ProposalModel;
    protected $SkripsiModel;
    protected $PedomanModel;
    protected $PresensiModel;
    protected $DosenModel;
    protected $UserModel;
    protected $MahasiswaModel;
    protected $PengdulModel;
    protected $AdminModel;



    public function __construct()
    {
        $this->PedomanModel = new ModelPedoman();
        $this->DosenModel = new ModelDosen();
        $this->UserModel = new ModelUser();
        $this->MahasiswaModel = new ModelMahasiswa();
        $this->PengdulModel = new ModelPengdul();
        $this->PresensiModel = new ModelPresensi();
        $this->ProposalModel = new ModelProposal();
        $this->SkripsiModel = new ModelSkripsi();
        $this->AdminModel = new ModelAdmin();
    }

    public function index()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $data = array(
            'body' => 'Admin/mahasiswa/list',
            'data' => $this->MahasiswaModel->getMahasiswa(),
            'dataku' => $dataku,
        );

        return view('template', $data);
    }

    public function input()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $data = array(
            'body'  => 'Admin/mahasiswa/form',
            'dataku' => $dataku,
        );

        return view('template', $data);
    }


    public function insert()

    {

        $userid = $this->request->getPost('userid');
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $password = $this->request->getPost('password');
        $jurusan = $this->request->getPost('jurusan');
        $email = $this->request->getPost('email');
        $jekel = $this->request->getPost('gender');


        $data = array(
            'userid' => $userid,
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'jenis_kelamin' => $jekel,
            'jurusan' => $jurusan,

        );

        $data2 = array(
            'userid' => $userid,
            'password' => $password,
            'role' => 'mahasiswa',
        );

        if ($this->UserModel->insert_user($data2) && $this->MahasiswaModel->insert_mahasiswa($data)) {

            session()->setFlashdata('success', 'Berhasil Menambahkan Data');

            return redirect()->to(base_url() . 'mahasiswa/list');
        } else {

            session()->setFlashdata('error', 'Gagal Menambahkan Data');

            return redirect()->to(base_url() . 'input/mahasiswa');
        }
    }

    public function edit($userid)
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $data = array(
            'body' => 'Admin/mahasiswa/form_edit',
            'data' => $this->UserModel->getByUserId($userid)->getRow(),
            'data2' => $this->MahasiswaModel->getByUserId($userid)->getRow(),
            'dataku' => $dataku,
        );
        return view('template', $data);
    }

    public function update($userid)
    {
        if (!$userid) {
            $userid = $this->request->getPost('userid');
        }

        if (!$userid) {
            return redirect()->to(base_url('mahasiswa/list'))->with('error', 'User ID tidak ditemukan');
        }

        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');

        $password = $this->request->getPost('password');
        $jurusan = $this->request->getPost('jurusan');
        $email = $this->request->getPost('email');



        $data21 = array(
            'nama' => $nama,
            'email' => $email,
            'alamat' => $alamat,
            'jenis_kelamin' => $this->request->getPost('gender'),
            'jurusan' => $jurusan,

        );

        $data2 = ['password' => $password];

        // Update database
        $result = $this->MahasiswaModel->updateMahasiswa($userid, $data21);
        $result2 = $this->UserModel->updateUser($userid, $data2);


        if ($result && $result2) {
            session()->setFlashdata('success', 'Data Berhasil Diubah');
            return redirect()->to(base_url('mahasiswa/list'));
        } else {
            return redirect()->to(base_url('edit/mahasiswa/' . $userid))->with('error', 'Data Update Failed');
        }
    }


    public function update2($userid)
    {
        if (!$userid) {
            $userid = $this->request->getPost('userid');
        }

        if (!$userid) {
            return redirect()->to(base_url('mahasiswa/list'))->with('error', 'User ID tidak ditemukan');
        }

        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');

        $password = $this->request->getPost('password');
        $jurusan = $this->request->getPost('jurusan');
        $email = $this->request->getPost('email');



        $data21 = array(
            'nama' => $nama,
            'email' => $email,
            'alamat' => $alamat,
            'jenis_kelamin' => $this->request->getPost('gender'),
            'jurusan' => $jurusan,

        );

        $data2 = ['password' => $password];

        // Update database
        $result = $this->MahasiswaModel->updateMahasiswa($userid, $data21);
        $result2 = $this->UserModel->updateUser($userid, $data2);


        if ($result && $result2) {
            session()->setFlashdata('success', 'Data Berhasil Diubah');
            return redirect()->to(base_url('profil/mahasiswa'));
        } else {
            return redirect()->to(base_url('profil/mahasiswa'))->with('error', 'Data Update Failed');
        }
    }

    public function delete($userid)
    {
        $this->MahasiswaModel->deleteMahasiswa($userid);
        $this->UserModel->deleteUser($userid);
        return redirect()->to(base_url('mahasiswa/list'))->with('success', 'Data berhasil dihapus');
    }

    public function forsempro()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $data = array(
            'data' => $this->ProposalModel->getproposal(),
            'body' => 'Admin/info/proposal',
            'dataku' => $dataku,
        );
        return view('template', $data);
    }

    public function forskripsi()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $data = array(
            'data' => $this->SkripsiModel->getskripsi(),
            'body' => 'Admin/info/skripsi',
            'dataku' => $dataku,
        );
        return view('template', $data);
    }

    public function perizinan()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $data = array(
            'data' => $this->SkripsiModel->getskripsi(),
            'data2' => $this->ProposalModel->getproposal(),
            'body' => 'Admin/info/izin',
            'dataku' => $dataku,
        );
        return view('template', $data);
    }

    public function update_pr($userid)
    {
        $data = array(
            'status' => 'disetujui'
        );
        $result = $this->ProposalModel->updateProposal($userid, $data);
        if ($result) {
            return redirect()->to(base_url('izinsidang'))->with('success', 'Data Berhasil');
        }
    }

    public function update_skr($userid)
    {
        $data = array(
            'status' => 'disetujui'
        );
        $result = $this->SkripsiModel->updateSkripsi($userid, $data);
        if ($result) {
            return redirect()->to(base_url('izinsidang'))->with('success', 'Data Berhasil');
        }
    }





















    //halaman role Mahasiswa
    //buku pedoman

    public function buku_pedoman()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->MahasiswaModel->getByUserId($user->userid)->getRow();
        $data = array(
            'data' => $this->PedomanModel->getpedoman(),
            'body' => 'Mahasiswa/pedoman',
            'dataku' => $dataku
        );

        return view('templateM', $data);
    }


    //info pembimbing

    public function info_pembimbing()
    {

        $user = $this->UserModel->getById(session('id'))->getRow();
        $userid = $this->MahasiswaModel->getByUserId($user->userid)->getRow();

        $dataku = $this->MahasiswaModel->getByUserId($user->userid)->getRow();

        $data = array(
            'data' => $userid,
            'body' => 'Mahasiswa/pembimbing',
            'dataku' => $dataku
        );
        return view('templateM', $data);
    }

    //pengajuan judul
    public function pengajuan_judul()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();

        $pengdul = $this->PengdulModel->getByUserId($user->userid);

        $jumlah = $this->PengdulModel->countPendingByUserId($user->userid);

        $jumlah2 = $this->PengdulModel->countPendingByUserId2($user->userid);
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->MahasiswaModel->getByUserId($user->userid)->getRow();

        $data = array(
            'data' => $pengdul,
            'jumlah' => $jumlah,
            'body' => 'Mahasiswa/pengajuan_judul/pengajuan_judul',
            'jumlah2' => $jumlah2,
            'dataku' => $dataku
        );
        return view('templateM', $data);
    }

    public function ajukan_judul()
    {

        $user = $this->UserModel->getById(session('id'))->getRow();
        $userid = $user->userid;
        $mahasiswa = $this->MahasiswaModel->getByUserId($userid)->getRow();

        $dataku = $this->MahasiswaModel->getByUserId($user->userid)->getRow();

        $data = array(
            'data' => $mahasiswa,
            'body' => 'Mahasiswa/pengajuan_judul/input',
            'dataku' => $dataku
        );
        return view('templateM', $data);
    }

    public function input_judul()
    {
        $userid = $this->request->getPost('userid');
        $judul = $this->request->getPost('judul');
        $tanggal = $this->request->getPost('tanggal');
        $nama = $this->request->getPost('nama');

        $data = array(
            'userid' => $userid,
            'judul' => $judul,
            'tanggal' => $tanggal,
            'nama' => $nama,
            'status' => 'menunggu'
        );
        $result = $this->PengdulModel->insert_pengajuan($data);
        if ($result) {
            return redirect()->to(base_url('pengdul/mahasiswa'))->with('success', ' Behasil Mengajukan Judul');
        } else {
            return redirect()->to(base_url('input/pengdul/mahasiswa'))->with('error', 'Gaagal Uploud Judul');
        }
    }


    public function presensi1()
    {
        $id = session('id');
        $user = $this->UserModel->getById($id)->getRow();
        $userid = $user->userid;
        $mahasiswa = $this->MahasiswaModel->getByUserId($userid)->getRow();
        $udosen = $mahasiswa->u1;

        $dataku = $this->MahasiswaModel->getByUserId($user->userid)->getRow();
        $data = array(
            'data' => $this->PresensiModel->getByUserIdAndUDosen($userid, $udosen),
            'body' => 'Mahasiswa/Presensi/presensi1',
            'dataku' => $dataku
        );
        return view('templateM', $data);
    }
    public function presensi2()
    {
        $id = session('id');
        $user = $this->UserModel->getById($id)->getRow();
        $userid = $user->userid;
        $mahasiswa = $this->MahasiswaModel->getByUserId($userid)->getRow();
        $udosen = $mahasiswa->u2;

        $dataku = $this->MahasiswaModel->getByUserId($user->userid)->getRow();
        $data = array(
            'data' => $this->PresensiModel->getByUserIdAndUDosen($userid, $udosen),
            'body' => 'Mahasiswa/Presensi/presensi1',
            'dataku' => $dataku
        );
        return view('templateM', $data);
    }

    public function ajuproposal()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $userid = $user->userid;

        $dataku = $this->MahasiswaModel->getByUserId($user->userid)->getRow();

        $data = array(
            'body' => 'Mahasiswa/pengajuan_sidang/proposal',
            'mahasiswa' => $this->MahasiswaModel->getByUserId($userid)->getRow(),
            'proposal' => $this->ProposalModel->getByUserId($userid)->getRow(),
            'dataku' => $dataku
        );
        return view('templateM', $data);
    }

    public function tambahaju()
    {
        $userid = $this->request->getPost('userid');
        $nama = $this->request->getPost('nama');
        $judul = $this->request->getPost('judul');
        $ringkasan = $this->request->getPost('ringkasan');
        $file = $this->request->getFile('file');

        $lampiranPath = '';

        if ($file->isValid() && !$file->hasMoved()) {

            $lampiranPath = $file->getName();

            $file->move(ROOTPATH . 'public/file_proposal/');
        }

        $data = array(
            'userid' => $userid,
            'nama' => $nama,
            'judul' => $judul,
            'ringkasan' => $ringkasan,
            'file' => $lampiranPath,
            'status' => 'menunggu'

        );

        if ($this->ProposalModel->insert_proposal($data)) {

            session()->setFlashdata('success', 'Berhasil Menambahkan Data');

            return redirect()->to(base_url() . 'aju/proposal');
        } else {

            session()->setFlashdata('error', 'Gagal Menambahkan Data');

            return redirect()->to(base_url() . 'aju/proposal');
        }
    }


    public function ajuskripsi()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $userid = $user->userid;

        $dataku = $this->MahasiswaModel->getByUserId($user->userid)->getRow();

        $data = array(
            'body' => 'Mahasiswa/pengajuan_sidang/skripsi',
            'mahasiswa' => $this->MahasiswaModel->getByUserId($userid)->getRow(),
            'proposal' => $this->SkripsiModel->getByUserId($userid)->getRow(),
            'dataku' => $dataku,
        );
        return view('templateM', $data);
    }

    public function tambahaju2()
    {
        $userid = $this->request->getPost('userid');
        $nama = $this->request->getPost('nama');
        $judul = $this->request->getPost('judul');
        $ringkasan = $this->request->getPost('ringkasan');
        $file = $this->request->getFile('file');

        $lampiranPath = '';

        if ($file->isValid() && !$file->hasMoved()) {

            $lampiranPath = $file->getName();

            $file->move(ROOTPATH . 'public/file_skripsi/');
        }

        $data = array(
            'userid' => $userid,
            'nama' => $nama,
            'judul' => $judul,
            'ringkasan' => $ringkasan,
            'file' => $lampiranPath,
            'status' => 'menunggu'

        );

        if ($this->SkripsiModel->insert_skripsi($data)) {

            session()->setFlashdata('success', 'Berhasil Menambahkan Data');

            return redirect()->to(base_url() . 'aju/skripsi');
        } else {

            session()->setFlashdata('error', 'Gagal Menambahkan Data');

            return redirect()->to(base_url() . 'aju/skripsi');
        }
    }
}
