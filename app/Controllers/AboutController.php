<?php

namespace App\Controllers;

use App\Models\AboutModel;
use Config\Validation;

class AboutController extends BaseController
{
    protected $AboutModel;
    public function __construct()
    {
        $this->AboutModel = new AboutModel();
    }
    public function index()
    {

        return view('admin/index');
    }
    public function about()
    {
        $id = user()->id;
        $about = $this->AboutModel->ckid($id);
        $data = [
            'about' => $about
        ];

        return view('admin/about/index', $data);
    }
    public function edit($slug)
    {
        $about =  $this->AboutModel->GetSampul($slug);
        $data = [
            'validation' => \Config\Services::validation(),
            'about' => $about
        ];
        return view('admin/about/edit', $data);
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
            $about = $this->AboutModel->find($id);
            if ($about['foto'] != 'default.jpg') {
                unlink('img/' . $about['foto']);
            }
        }

        $slug = url_title($this->request->getVar('name'), '-', TRUE);
        $this->AboutModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'birthday' => $this->request->getVar('birthday'),
            'slug' => $slug,
            'address' => $this->request->getVar('address'),
            'quote' => $this->request->getVar('quote'),
            'about_me' => $this->request->getVar('about_me'),
            'foto' => $a,

        ]);
        session()->setflashdata('pesan', 'Berhasil Diedit');
        return redirect()->to(base_url('/about'));
    }
}
