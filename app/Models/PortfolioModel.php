<?php

namespace App\Models;

use CodeIgniter\Model;


class PortfolioModel extends Model
{
    protected $table = 'portfolio';
    protected $useTimestamps = true;
    protected $allowedFields = ['thumbnail', 'link', 'id', 'created_at', 'updated_at'];
    public function getportfolio($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_portfolio' => $id])->first();
    }
    public function update_portfolio($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_portfolio' => $id]);
    }
    public function delete_portfolio($id)
    {
        return $this->db->table($this->table)->delete(['id_portfolio' => $id]);
    }
    public function get_portfolio($id)
    {
        return $this->where('id', $id)->get()->getResultArray();
    }
}
