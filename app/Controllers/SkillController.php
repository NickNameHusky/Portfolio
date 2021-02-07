<?php

namespace App\Controllers;

use App\Models\SkillModel;
use Config\Validation;

class SkillController extends BaseController
{
    protected $SkillModel;
    public function __construct()
    {
        $this->SkillModel = new SkillModel();
    }
    public function index()
    {
        $id = user()->id;
        $skill = $this->SkillModel->get_skill($id);
        $data = [
            'skill' => $skill
        ];

        return view('admin/skill/index', $data);
    }
    public function create()
    {
        return view('admin/skill/create');
    }
    public function save()
    {
        $a = 1;
        $data = [
            'nameskill' => $this->request->getPost('namaskill'),
            'percentage' => $this->request->getPost('percentage'),
            'id' => $a
        ];

        /* 
        Membuat variabel simpan yang isinya merupakan memanggil function 
        insert_product dan membawa parameter data 
        */
        $simpan = $this->SkillModel->insert($data);
        if ($simpan) {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Created Skill successfully');
            // Redirect halaman ke product
            return redirect()->to(base_url('/skill'));
        }
    }
    public function edit($id)
    {
        // Memanggil function getProduct($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
        $data['skill'] = $this->SkillModel->getskill($id);
        // Mengirim data ke dalam view
        return view('admin/skill/edit', $data);
    }
    //--------------------------------------------------------------------
    public function update($id)
    {
        // Mengambil value dari form dengan method POST
        $name = $this->request->getPost('namaskill');
        $perc = $this->request->getPost('percentage');

        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'nameskill' => $name,
            'percentage' => $perc
        ];

        /* 
        Membuat variabel ubah yang isinya merupakan memanggil function 
        update_product dan membawa parameter data beserta id
        */
        $ubah = $this->SkillModel->update_skill($data, $id);

        // Jika berhasil melakukan ubah
        if ($ubah) {
            // Deklarasikan session flashdata dengan tipe info
            session()->setFlashdata('info', 'Updated skill successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('/skill'));
        }
    }
    public function delete($id)
    {
        // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
        $hapus = $this->SkillModel->delete_skill($id);

        // Jika berhasil melakukan hapus
        if ($hapus) {
            // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Deleted product successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('/skill'));
        }
    }
}
