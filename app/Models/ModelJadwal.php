<?php

namespace App\Models;

use CodeIgniter\Model;
use Codeigniter\HTTP\RequestInterface;

class ModelJadwal extends Model
{

    protected $db;
    protected $request;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }

    protected $table      = 'jadwal';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id', 'batas_skripsi', 'batas_bimbingan', 'batas_proposal'];


    public function getJadwal()
    {
        return $this->get();
    }




    public function insert_jadwal($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->get();
    }



    public function updatejadwal($id, $data)
    {

        if (empty($id) || empty($data)) {
            return false;
        }


        return $this->where('id', $id)->set($data)->update();
    }


    public function deleteJadwal($id)
    {

        if (empty($id)) {
            return false;
        }


        return $this->where('userid', $id)->delete();
    }
}
