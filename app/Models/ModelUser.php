<?php

namespace App\Models;

use CodeIgniter\Model;
use Codeigniter\HTTP\RequestInterface;

class ModelUser extends Model
{

    protected $db;
    protected $request;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }

    protected $table      = 'user';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id', 'userid', 'password'];


    public function getUser()
    {
        return $this->get();
    }

    public function cekuserid($userid)
    {
        return $this->where('userid', $userid)
            ->get();
    }


    public function insert_user($data)
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


    public function updateUser($userid, $data)
    {

        if (empty($userid) || empty($data)) {
            return false;
        }


        return $this->where('userid', $userid)->set($data)->update();
    }


    public function deleteUser($userid)
    {
        // Pastikan userid tidak kosong
        if (empty($userid)) {
            return false;
        }

        // Hapus data user berdasarkan userid
        return $this->where('userid', $userid)->delete();
    }
}
