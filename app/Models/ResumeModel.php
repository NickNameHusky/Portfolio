<?php

namespace App\Models;

use CodeIgniter\Model;

class ResumeModel extends Model
{
    protected $about, $education, $experience, $portfolio, $skill;

    public function __construct()
    {

        parent::__construct();
        $db      = \Config\Database::connect();

        //mengisi variable global dengan data
        //untuk meload tabel
        $this->about = $db->table('about');
        $this->education = $db->table('education');
        $this->experience = $db->table('experience');
        $this->portfolio = $db->table('portfolio');
        $this->skill = $db->table('skill');
    }
    public function getid($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_skill' => $id])->first();
    }
    public function get_id($slug = false)
    {
        return $this->about->where('id', $slug)->get();
    }
    public function get_about($id)
    {
        return $this->about->where('id', $id)->get()->getRowArray();
    }
    public function get_education($id)
    {
        return $this->education->where('id', $id)->get()->getResultArray();
    }
    public function get_experience($id)
    {
        return $this->experience->where('id', $id)->get()->getResultArray();
    }
    public function get_portfolio($id)
    {
        return $this->portfolio->where('id', $id)->get()->getResultArray();
    }
    public function get_skill($id)
    {
        return $this->skill->where('id', $id)->get()->getResultArray();
    }
}
