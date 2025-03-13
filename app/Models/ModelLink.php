<?php

namespace App\Models;

use CodeIgniter\Model;
use Codeigniter\HTTP\RequestInterface;

class ModelLink extends Model
{

    protected $db;
    protected $request;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }

    protected $table      = 'link';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id', 'ig', 'fb', 'web'];


    public function getLink()
    {
        return $this->get();
    }




    public function insert_linkl($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->get();
    }




    public function updatelink($id, $data)
    {

        if (empty($id) || empty($data)) {
            return false;
        }


        return $this->where('id', $id)->set($data)->update();
    }


    public function deletelink($id)
    {

        if (empty($id)) {
            return false;
        }


        return $this->where('id', $id)->delete();
    }
}
