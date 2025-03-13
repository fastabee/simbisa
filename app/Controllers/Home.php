<?php

namespace App\Controllers;

use App\Models\ModelMahasiswa;
use App\Models\ModelUser;
use App\Models\ModelAdmin;
use App\Models\ModelDosen;
use App\Models\ModelProposal;
use App\Models\ModelSkripsi;
use App\Models\ModelJadwal;
use App\Models\ModelPresensi;
use App\Models\ModelLink;

class Home extends BaseController
{
    protected $UserModel;
    protected $LinkModel;

    protected $MahasiswaModel;
    protected $AdminModel;
    protected $DosenModel;
    protected $JadwalModel;

    protected $ProposalModel;
    protected $SkripsiModel;
    protected $PresensiModel;



    public function __construct()
    {
        $this->MahasiswaModel = new ModelMahasiswa();
        $this->UserModel = new ModelUser();
        $this->AdminModel = new ModelAdmin();
        $this->DosenModel = new ModelDosen();
        $this->ProposalModel = new ModelProposal();
        $this->SkripsiModel = new ModelSkripsi();
        $this->JadwalModel = new ModelJadwal();
        $this->PresensiModel = new ModelPresensi();
        $this->LinkModel = new ModelLink();
    }

    public function awal()
    {
        return view('Reset/awal');
    }

    public function akhir()
    {
        $userid = $this->request->getPost('userid');


        $user = $this->MahasiswaModel->getByUserId($userid)->getRow();

        if (!$user) {

            $user = $this->DosenModel->getByUserId($userid)->getRow();
        }

        if (!$user) {

            $user = $this->AdminModel->getByUserId($userid)->getRow();
        }

        $email  = $user->email;
        $link = base_url('setel/password/') . $userid;

        $emailke = \Config\Services::email();

        $emailke->setFrom('fastabikul87@gmail.com', 'Administrasi Simbisa');
        $emailke->setTo($email);
        $emailke->setSubject('Reset Password');
        $emailke->setMessage($link);

        try {
            if ($emailke->send()) {
                session()->setFlashdata('sukses', 'Berhasil Menambahkan Data');
                echo "email terkirim";
            } else {
                throw new \Exception($emailke->printDebugger(['headers']));
            }
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function gantipw() {}

    public function cekrole()
    {
        if (session()->has('id')) {
            $user1 = $this->UserModel->getById(session('id'))->getRow();


            if ($user1->role == 'mahasiswa') {
                return redirect()->to(base_url('dashboard/mahasiswa'));
            } elseif ($user1->role == 'dosen') {
                return redirect()->to(base_url('dashboard/dosen'));
            } elseif ($user1->role == 'admin') {
                return redirect()->to(base_url('dashboard'));
            }
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function setelpw($userid)
    {
        $user = $userid;
        $data = array(
            'data' => $user
        );
        return view('Reset/akhir', $data);
    }

    public function setpw()
    {
        $userid = $this->request->getPost('userid');
        $password = $this->request->getPost('password');

        $data = array(
            'password' => $password
        );

        $result = $this->UserModel->updateUser($userid, $data);
        if ($result) {
            return redirect()->to(base_url('login'));
        }
    }

    public function index()
    {

        $user = $this->UserModel->getById(session('id'))->getRow();
        $admin = $this->AdminModel->getByUserId($user->userid)->getRow();
        $data = array(
            'body' => 'Admin/dashboard',
            'dataku' => $admin,
            'maha' => $this->MahasiswaModel->countAllMahasiswa(),
            'topro' => $this->ProposalModel->countAllProposals(),
            'tosi' => $this->SkripsiModel->countAllSkripsi(),
            'siprov' => $this->SkripsiModel->countApprovedSkripsi()
        );

        return view('template', $data);
    }


    public function indexM()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->MahasiswaModel->getByUserId($user->userid)->getRow();
        $jadwal = $this->JadwalModel->getById(1)->getRow();
        $prensensi = $this->PresensiModel->countByUserId($user->userid);
        $data = array(
            'body' => 'Mahasiswa/dashboard',
            'dataku' => $dataku,
            'jadwal' => $jadwal,
            'presensi' => $prensensi
        );
        return view('templateM', $data);
    }

    public function jadwal()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $jadwal = $this->JadwalModel->getJadwal();
        $data = array(
            'body' => 'Admin/jadwal',
            'dataku' => $dataku,
            'data' => $this->LinkModel->getLink(),
            'data2' => $jadwal
        );
        return view('template', $data);
    }

    public function jadwalm()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->MahasiswaModel->getByUserId($user->userid)->getRow();
        $jadwal = $this->JadwalModel->getJadwal();
        $data = array(
            'body' => 'Mahasiswa/jadwal',
            'dataku' => $dataku,
            'data' => $this->LinkModel->getLink(),
            'data2' => $jadwal
        );
        return view('templateM', $data);
    }

    public function gome()
    {
        return view('gome.php');
    }

    public function jadwalD()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->DosenModel->getByUserId($user->userid)->getRow();
        $jadwal = $this->JadwalModel->getJadwal();
        $data = array(
            'body' => 'Dosen/jadwal',
            'dataku' => $dataku,
            'data' => $this->LinkModel->getLink(),
            'data2' => $jadwal
        );
        return view('templateD', $data);
    }

    public function updatejadwal()
    {
        $data = array(
            'batas_bimbingan' => $this->request->getPost('batas_bimbingan'),
            'batas_skripsi' => $this->request->getPost('batas_skripsi'),
            'batas_proposal' => $this->request->getPost('batas_proposal'),
        );

        $result = $this->JadwalModel->update(1, $data);
        if ($result) {
            return redirect()->to(base_url('jadwal'));
        }
    }

    public function updatelink()
    {
        $data = array(
            'ig' => $this->request->getPost('ig'),
            'fb' => $this->request->getPost('fb'),
            'web' => $this->request->getPost('web'),
        );

        $result = $this->LinkModel->updatelink(1, $data);
        if ($result) {
            return redirect()->to(base_url('jadwal'));
        }
    }



    public function indexD()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $dataku = $this->DosenModel->getByUserId($user->userid)->getRow();
        $id = 1;
        $jadwal = $this->JadwalModel->getById($id)->getRow();
        $data = array(
            'body' => 'Dosen/dashboard',
            'dataku' => $dataku,
            'jadwal' => $jadwal

        );
        return view('templateD', $data);
    }

    public function ProfilAdmin()
    {

        $user = $this->UserModel->getById(session('id'))->getRow();

        $dataku = $this->AdminModel->getByUserId($user->userid)->getRow();
        $userid = $user->userid;
        $data = array(
            'data2' => $this->AdminModel->getByUserId($userid)->getRow(),
            'data' => $user,
            'body' => 'Admin/profil',
            'dataku' => $dataku
        );
        return view('template', $data);
    }

    public function ProfilDosen()
    {

        $user = $this->UserModel->getById(session('id'))->getRow();
        $userid = $user->userid;

        $dataku = $this->DosenModel->getByUserId($user->userid)->getRow();
        $data = array(
            'data2' => $this->DosenModel->getByUserId($userid)->getRow(),
            'data' => $user,
            'body' => 'Dosen/profil',
            'dataku' => $dataku
        );
        return view('templateD', $data);
    }

    public function ProfilMahasiswa()
    {
        $user = $this->UserModel->getById(session('id'))->getRow();
        $userid = $user->userid;

        $dataku = $this->MahasiswaModel->getByUserId($user->userid)->getRow();
        $data = array(
            'data2' => $this->MahasiswaModel->getByUserId($userid)->getRow(),
            'data' => $user,
            'body' => 'Mahasiswa/profil',
            'dataku' => $dataku
        );
        return view('templateM', $data);
    }

    public function updateAdmin()
    {
        try {
            $nama = $this->request->getPost('nama');
            $alamat = $this->request->getPost('alamat');
            $userid = $this->request->getPost('userid');
            $password = $this->request->getPost('password');
            $email = $this->request->getPost('email');

            if (!$userid) {
                return redirect()->to(base_url('profil/admin'))->with('error', 'User ID tidak ditemukan');
            }

            $data21 = [
                'nama' => $nama,
                'email' => $email,
                'alamat' => $alamat,
                'jenis_kelamin' => $this->request->getPost('gender'),
            ];

            $data2 = ['password' => $password];

            // Update database dengan exception handling
            try {
                $result = $this->AdminModel->updateAdmin($userid, $data21);
                $result2 = $this->UserModel->updateUser($userid, $data2);

                if ($result && $result2) {
                    session()->setFlashdata('success', 'Data Berhasil Diubah');
                    return redirect()->to(base_url('profil/admin'));
                } else {
                    return redirect()->to(base_url('profil/admin'))->with('error', 'Data gagal diperbarui');
                }
            } catch (\Exception $e) {
                log_message('error', 'Error saat update admin: ' . $e->getMessage());
                return redirect()->to(base_url('profil/admin'))->with('error', 'Terjadi kesalahan saat memperbarui data.');
            }
        } catch (\Exception $e) {
            log_message('error', 'Error di updateAdmin(): ' . $e->getMessage());
            return redirect()->to(base_url('profil/admin'))->with('error', 'Terjadi kesalahan sistem.');
        }
    }

    public function ig()
    {
        $link = $this->LinkModel->getById(1)->getRow();
        $ig = $link->ig;
        $data = array(
            'ig' => $ig
        );
        return view('ig', $data);
    }



    public function fb()
    {
        $link = $this->LinkModel->getById(1)->getRow();
        $fb = $link->fb;
        $data = array(
            'fb' => $fb
        );
        return view('fb', $data);
    }


    public function web()
    {
        $link = $this->LinkModel->getById(1)->getRow();
        $web = $link->web;
        $data = array(
            'web' => $web
        );
        return view('web', $data);
    }
}
