<?php

namespace App\Controllers;

use App\Models\ResumeModel;
use Config\Validation;

class ResumeController extends BaseController
{
    protected $ResumeModel;
    public function __construct()
    {
        $this->AboutModel = new \App\Models\AboutModel;
        $this->EducationModel = new \App\Models\EducationModel();
        $this->ExperienceModel = new \App\Models\ExperienceModel();
        $this->PortfolioModel = new \App\Models\PortfolioModel();
        $this->SkillModel = new \App\Models\SkillModel;
        $this->ResumeModel = new ResumeModel();
    }

    public function index($slug)
    {
        $cekid = $this->AboutModel->cek_id($slug);
        if (!empty($cekid->getResult())) {

            //jika data ditemukan maka kita akan ambil id_user nya
            foreach ($cekid->getResult() as $row) {
                $id = $row->id;
                // $this->session->set('id_user',$idnya); //save di session untuk di load jika komentar
            }
            $about = $this->AboutModel->GetSampul($slug);
            $skill = $this->ResumeModel->get_skill($id);
            $education = $this->ResumeModel->get_education($id);
            $experience = $this->ResumeModel->get_experience($id);
            $portfolio = $this->ResumeModel->get_portfolio($id);
            $data = [
                'about' => $about,
                'skill' => $skill,
                'education' => $education,
                'experience' => $experience,
                'portfolio' => $portfolio

            ];
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Portfolio dengan Nama ' . $slug . ' Tidak ada');
        }
        //   return view('komik/detail', $data);
        // $id = $a['id'];
        // $data = array(
        //     // $data['skill'] = $this->SkillModel->getskill($id);
        //     'about' => $this->AboutModel->GetSampul($id),
        //     'education' => $this->EducationModel->findAll(),
        //     'skill' => $this->SkillModel->findAll(),
        //     'experience' => $this->ExperienceModel->findAll(),
        //     'portfolio' => $this->PortfolioModel->findAll(),

        // );
        return view('resume/index', $data);
    }
}
