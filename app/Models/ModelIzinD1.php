<?php

namespace App\Models;

use CodeIgniter\Model;
use Codeigniter\HTTP\RequestInterface;

class ModelIzinD1 extends Model
{

    protected $db;
    protected $request;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }

    protected $table      = 'izin_proposaldosen';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id', 'userid', 'nama', 'status', 'udosen'];


    public function getizin()
    {
        return $this->get();
    }

    public function cekuserid($userid)
    {
        return $this->where('userid', $userid)
            ->get();
    }



    public function insert_izin($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->get();
    }

    public function getByUserId($userid)
    {
        return $this->where('userid', $userid)->get();
    }
}
