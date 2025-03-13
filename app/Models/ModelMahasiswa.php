<?php

namespace App\Models;

use CodeIgniter\Model;
use Codeigniter\HTTP\RequestInterface;

class ModelMahasiswa extends Model
{

    protected $db;
    protected $request;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }

    protected $table      = 'data_mahasiswa';
    protected $primaryKey = 'userid';
    protected $returnType = 'object';
    protected $allowedFields = ['userid', 'email', 'nama', ' alamat', 'jenis_kelamin', 'pembimbin_1', 'pembimbin_2',  'judul_skripsi',  'jurusan'];


    public function getMahasiswa()
    {
        return $this->get();
    }

    public function cekuserid($userid)
    {
        return $this->where('userid', $userid)
            ->get();
    }


    public function insert_mahasiswa($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->get();
    }

    public function updateMahasiswa($userid, $data)
    {

        if (empty($userid) || empty($data)) {
            return false;
        }


        return $this->db->table('data_mahasiswa')->where('userid', $userid)->update($data);
    }

    public function getByUserId($userid)
    {
        return $this->where(['userid' => $userid])->get();
    }

    public function getByU1($userid)
    {
        return $this->where(['u1' => $userid])->get();
    }

    public function getByU2($userid)
    {
        return $this->where(['u2' => $userid])->get();
    }

    public function deleteMahasiswa($userid)
    {

        if (empty($userid)) {
            return false;
        }
        return $this->where('userid', $userid)->delete();
    }

    public function getByU1OrU2($userid)
    {
        return $this->where('u1', $userid)
            ->orWhere('u2', $userid)
            ->get();
    }

    public function countAllMahasiswa()
    {
        return $this->countAll();
    }
}
