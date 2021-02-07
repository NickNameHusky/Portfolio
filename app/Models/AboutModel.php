<?php

namespace App\Models;

use CodeIgniter\Model;

helper('auth');
class AboutModel extends Model
{
    protected $table = 'about';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'birthday', 'address', 'quote', 'slug', 'about_me', 'foto', 'email', 'password'];
    public function GetSampul($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
    public function cek_id($slug)
    {
        return $this->where('slug', $slug)->get();
    }
    public function ckid($id)
    {
        return $this->where(['id' => $id])->first();
    }
}
