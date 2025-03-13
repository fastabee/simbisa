<?php

namespace App\Models;

use CodeIgniter\Model;
use Codeigniter\HTTP\RequestInterface;

class ModelDosen extends Model
{

    protected $db;
    protected $request;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }

    protected $table      = 'data_dosen';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id', 'userid', 'nama', 'alamat', 'email', 'jenis_kelamin'];


    public function getdosen()
    {
        return $this->get();
    }

    public function cekuserid($userid)
    {
        return $this->where('userid', $userid)
            ->get();
    }



    public function insert_dosen($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->get();
    }

    public function getByUserId($userid)
    {
        return $this->where(['userid' => $userid])->get();
    }


    public function updateDosen($userid, $data)
    {

        if (empty($userid) || empty($data)) {
            return false;
        }


        return $this->where('userid', $userid)->set($data)->update();
    }

    public function deleteDosen($userid)
    {

        if (empty($userid)) {
            return false;
        }
        return $this->where('userid', $userid)->delete();
    }
}
