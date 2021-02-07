<?php

namespace App\Models;

use CodeIgniter\Model;

class ExperienceModel extends Model
{
    protected $table = 'experience';
    protected $useTimestamps = true;
    protected $allowedFields = ['company', 'year', 'jobdesk', 'position', 'id', 'created_at', 'updated_at'];
    public function getexperience($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_experience' => $id])->first();
    }
    public function update_experience($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_experience' => $id]);
    }
    public function delete_experience($id)
    {
        return $this->db->table($this->table)->delete(['id_experience' => $id]);
    }
    public function get_experience($id)
    {
        return $this->where('id', $id)->get()->getResultArray();
    }
}
