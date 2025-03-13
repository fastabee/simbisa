<?php

namespace App\Models;

use CodeIgniter\Model;
use Codeigniter\HTTP\RequestInterface;

class ModelSkripsi extends Model
{

    protected $db;
    protected $request;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }

    protected $table      = 'skripsi';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id', 'userid', 'nama',  'judul', 'ringkasan', 'file', 'status'];


    public function getskripsi()
    {
        return $this->get();
    }

    public function cekuserid($userid)
    {
        return $this->where('userid', $userid)
            ->get();
    }

    public function updateSkripsi($userid, $data)
    {

        if (empty($userid) || empty($data)) {
            return false;
        }


        return $this->db->table('skripsi')->where('userid', $userid)->update($data);
    }



    public function insert_skripsi($data)
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

    public function countPendingByUserId($userid)
    {
        return $this->where('userid', $userid)
            ->where('status', 'menunggu')
            ->countAllResults();
    }

    public function countApprovedSkripsi()
    {
        return $this->where('status', 'disetujui')->countAllResults();
    }




    public function countAllSkripsi()
    {
        return $this->countAll();
    }
}
