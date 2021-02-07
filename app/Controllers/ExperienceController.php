<?php

namespace App\Controllers;

use App\Models\ExperienceModel;
use Config\Validation;

class ExperienceController extends BaseController
{
    protected $ExperienceModel;
    public function __construct()
    {
        $this->ExperienceModel = new ExperienceModel();
    }
    public function index()
    {
        $id = user()->id;
        $experience = $this->ExperienceModel->get_experience($id);
        $data = [
            'experience' => $experience
        ];

        return view('admin/experience/index', $data);
    }
    public function create()
    {
        return view('admin/experience/create');
    }
    public function save()
    {
        $a = 1;
        $data = [
            'company' => $this->request->getPost('company'),
            'position' => $this->request->getPost('position'),
            'year' => $this->request->getPost('year'),
            'jobdesk' => $this->request->getPost('jobdesk'),
            'id' => $a
        ];

        /* 
        Membuat variabel simpan yang isinya merupakan memanggil function 
        insert_product dan membawa parameter data 
        */
        $simpan = $this->ExperienceModel->insert($data);
        if ($simpan) {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Created Skill successfully');
            // Redirect halaman ke product
            return redirect()->to(base_url('/experience'));
        }
    }
    public function edit($id)
    {
        // Memanggil function getProduct($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
        $data['experience'] = $this->ExperienceModel->getexperience($id);
        // Mengirim data ke dalam view
        return view('admin/experience/edit', $data);
    }
    //--------------------------------------------------------------------
    public function update($id)
    {
        // Mengambil value dari form dengan method POST

        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'company' => $this->request->getPost('company'),
            'position' => $this->request->getPost('position'),
            'year' => $this->request->getPost('year'),
            'jobdesk' => $this->request->getPost('jobdesk')

        ];

        /* 
        Membuat variabel ubah yang isinya merupakan memanggil function 
        update_product dan membawa parameter data beserta id
        */
        $ubah = $this->ExperienceModel->update_experience($data, $id);

        // Jika berhasil melakukan ubah
        if ($ubah) {
            // Deklarasikan session flashdata dengan tipe info
            session()->setFlashdata('info', 'Updated experience successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('/experience'));
        }
    }
    public function delete($id)
    {
        // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
        $hapus = $this->ExperienceModel->delete_experience($id);

        // Jika berhasil melakukan hapus
        if ($hapus) {
            // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Deleted experience successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('/experience'));
        }
    }
}
