<?php

namespace App\Controllers;

use App\Models\EducationModel;
use Config\Validation;

class EducationController extends BaseController
{
    protected $EducationModel;
    public function __construct()
    {
        $this->EducationModel = new EducationModel();
    }
    public function index()
    {
        $id = user()->id;
        $education = $this->EducationModel->get_education($id);
        $data = [
            'education' => $education
        ];

        return view('admin/education/index', $data);
    }
    public function create()
    {
        return view('admin/education/create');
    }
    public function save()
    {
        $a = 1;
        $data = [
            'school' => $this->request->getPost('school'),
            'year' => $this->request->getPost('year'),
            'major' => $this->request->getPost('major'),
            'history' => $this->request->getPost('history'),
            'id' => $a
        ];

        /* 
        Membuat variabel simpan yang isinya merupakan memanggil function 
        insert_product dan membawa parameter data 
        */
        $simpan = $this->EducationModel->insert($data);
        if ($simpan) {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Created education successfully');
            // Redirect halaman ke product
            return redirect()->to(base_url('/education'));
        }
    }
    public function edit($id)
    {
        // Memanggil function getProduct($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
        $data['education'] = $this->EducationModel->geteducation($id);
        // Mengirim data ke dalam view
        return view('admin/education/edit', $data);
    }
    //--------------------------------------------------------------------
    public function update($id)
    {
        // Mengambil value dari form dengan method POST


        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'school' => $this->request->getPost('school'),
            'year' => $this->request->getPost('year'),
            'major' => $this->request->getPost('major'),
            'history' => $this->request->getPost('history'),
        ];

        /* 
        Membuat variabel ubah yang isinya merupakan memanggil function 
        update_product dan membawa parameter data beserta id
        */
        $ubah = $this->EducationModel->update_education($data, $id);

        // Jika berhasil melakukan ubah
        if ($ubah) {
            // Deklarasikan session flashdata dengan tipe info
            session()->setFlashdata('info', 'Updated education successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('/education'));
        }
    }
    public function delete($id)
    {
        // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
        $hapus = $this->EducationModel->delete_education($id);

        // Jika berhasil melakukan hapus
        if ($hapus) {
            // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Deleted education successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('/education'));
        }
    }
}
