<?php

namespace App\Models;

use CodeIgniter\Model;
use Codeigniter\HTTP\RequestInterface;

class ModelProposal extends Model
{

    protected $db;
    protected $request;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }

    protected $table      = 'proposal';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id', 'userid', 'nama',  'judul', 'ringkasan', 'file', 'status'];


    public function getproposal()
    {
        return $this->get();
    }

    public function cekuserid($userid)
    {
        return $this->where('userid', $userid)
            ->get();
    }

    public function updateProposal($userid, $data)
    {

        if (empty($userid) || empty($data)) {
            return false;
        }


        return $this->db->table('proposal')->where('userid', $userid)->update($data);
    }



    public function insert_proposal($data)
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

    public function updateMahasiswa($userid, $data)
    {

        if (empty($userid) || empty($data)) {
            return false;
        }


        return $this->db->table('proposal')->where('userid', $userid)->update($data);
    }

    public function countAllProposals()
    {
        return $this->countAll();
    }
}
