<?php

namespace App\Models;

use CodeIgniter\Model;
use Codeigniter\HTTP\RequestInterface;

class ModelPresensi extends Model
{

    protected $db;
    protected $request;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }

    protected $table      = 'presensi';
    protected $primaryKey = 'userid';
    protected $returnType = 'object';
    protected $allowedFields = ['userid', 'nama', 'tanggal', 'catatan', 'udosen'];


    public function getpresensi()
    {
        return $this->get();
    }

    public function cekuserid($userid)
    {
        return $this->where('userid', $userid)
            ->get();
    }

    public function countByUserId($userid)
    {
        return $this->where('userid', $userid)->countAllResults();
    }



    public function insert_presensi($data)
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

    public function getByUserIdAndUDosen($userid, $udosen)
    {
        return $this->where('userid', $userid)
            ->where('udosen', $udosen)
            ->get();
    }


    public function getByUDosen($userid)
    {
        return $this->where('udosen', $userid)->get();
    }
}
