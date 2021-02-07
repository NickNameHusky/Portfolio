<?php

namespace App\Models;

use CodeIgniter\Model;

class EducationModel extends Model
{
    public function __construct()
    {

        parent::__construct();
        $db      = \Config\Database::connect();

        //mengisi variable global dengan data

    }
    protected $table = 'education';
    protected $useTimestamps = true;
    protected $allowedFields = ['school', 'year', 'history', 'major', 'id', 'created_at', 'updated_at'];
    public function geteducation($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_education' => $id])->first();
    }
    public function update_education($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_education' => $id]);
    }
    public function delete_education($id)
    {
        return $this->db->table($this->table)->delete(['id_education' => $id]);
    }
    public function get_education($id)
    {
        return $this->where('id', $id)->get()->getResultArray();
    }
}
