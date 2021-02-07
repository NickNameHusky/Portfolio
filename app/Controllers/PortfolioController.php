<?php

namespace App\Controllers;

use App\Models\PortfolioModel;
use Config\Validation;

class PortfolioController extends BaseController
{
    protected $PortfolioModel;
    public function __construct()
    {
        $this->PortfolioModel = new PortfolioModel();
    }
    public function index()
    {
        $id = user()->id;
        $portfolio = $this->PortfolioModel->get_portfolio($id);
        $data = [
            'portfolio' => $portfolio
        ];

        return view('admin/portfolio/index', $data);
    }
    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('admin/portfolio/create', $data);
    }
    public function save()
    {

        if (!$this->validate([

            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,/image/png]',

            ]
        ])) {
            // $validation = \config\Services::validation();
            // return redirect()->to(base_url('/komik/create'))->withInput()->with('validation', $validation);
            return redirect()->to(base_url('/portfolio/create'))->withInput();
        }
        //upload gambar(ambil gambar)
        $filegambar = $this->request->getFile('foto');
        //membuat gambar default
        if ($filegambar->getError() == 4) {
            $a = 'default.jpg';
        } else {
            //ambil nama gambar
            // $a = $filegambar->getName();
            //nama random
            $a = $filegambar->getRandomName();
            //memindahkan gambar
            $filegambar->move('img', $a);
        }
        $d = 1;

        $data = [
            'link' => $this->request->getVar('link'),
            'id' => $d,
            'thumbnail' => $a,
        ];
        $simpan = $this->PortfolioModel->insert($data);
        if ($simpan) {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Created Skill successfully');
            // Redirect halaman ke product
            return redirect()->to(base_url('/portfolio'));
        }
    }
    public function edit($id)
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        // Memanggil function getProduct($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
        $data['portfolio'] = $this->PortfolioModel->getportfolio($id);
        // Mengirim data ke dalam view
        return view('admin/portfolio/edit', $data);
    }
    //--------------------------------------------------------------------
    public function update($id)
    {

        $filegambar = $this->request->getFile('foto');
        //membuat gambar default
        if ($filegambar->getError() == 4) {
            $a = $this->request->getVar('sampullama');
        } else {
            //ambil nama gambar
            // $a = $filegambar->getName();
            //nama random
            $a = $filegambar->getRandomName();
            //memindahkan gambar
            $filegambar->move('img', $a);

            //hapus file lama
            $portfolio = $this->PortfolioModel->getportfolio($id);
            if ($portfolio['thumbnail'] != 'default.jpg') {
                unlink('img/' . $portfolio['thumbnail']);
            }
        }


        // Mengambil value dari form dengan method POST

        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'link' => $this->request->getVar('link'),
            'thumbnail' => $a,

        ];

        /* 
        Membuat variabel ubah yang isinya merupakan memanggil function 
        update_product dan membawa parameter data beserta id
        */
        $ubah = $this->PortfolioModel->update_portfolio($data, $id);

        // Jika berhasil melakukan ubah
        if ($ubah) {
            // Deklarasikan session flashdata dengan tipe info
            session()->setFlashdata('info', 'Updated portfolio successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('/portfolio'));
        }
    }
    public function delete($id)
    {
        // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
        $portfolio = $this->PortfolioModel->getportfolio($id);
        if ($portfolio['thumbnail'] != 'default.jpg') {
            unlink('img/' . $portfolio['thumbnail']);
        }
        $hapus = $this->PortfolioModel->delete_portfolio($id);

        // Jika berhasil melakukan hapus
        if ($hapus) {
            // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Deleted portfolio successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('/portfolio'));
        }
    }
}
