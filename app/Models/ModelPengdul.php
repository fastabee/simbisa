<?php

namespace App\Models;

use CodeIgniter\Model;
use Codeigniter\HTTP\RequestInterface;

class ModelPengdul extends Model
{

    protected $db;
    protected $request;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }

    protected $table      = 'pengajuan_judul';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id', 'userid', 'nama', 'tanggal', 'judul', 'status'];


    public function getpengajuan()
    {
        return $this->get();
    }

    public function cekuserid($userid)
    {
        return $this->where('userid', $userid)
            ->get();
    }



    public function insert_pengajuan($data)
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

    public function countPendingByUserId2($userid)
    {
        return $this->where('userid', $userid)
            ->where('status', 'Diterima')
            ->countAllResults();
    }
}
