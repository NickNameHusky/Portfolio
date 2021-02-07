<?php

namespace App\Models;

use CodeIgniter\Model;

class SkillModel extends Model
{
    protected $table = 'skill';
    protected $useTimestamps = true;
    protected $allowedFields = ['nameskill', 'percentage', 'id', 'created_at', 'updated_at'];
    public function getskill($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_skill' => $id])->first();
    }
    public function update_skill($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_skill' => $id]);
    }
    public function delete_skill($id)
    {
        return $this->db->table($this->table)->delete(['id_skill' => $id]);
    }
    public function get_skill($id)
    {
        return $this->where('id', $id)->get()->getResultArray();
    }
}
