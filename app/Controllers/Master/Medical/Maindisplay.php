<?php

namespace App\Controllers\Master\Medical;
use App\Controllers\Master\MasterController;
use App\Libraries\Uploader;

class Maindisplay extends MasterController
{
    protected $models = array('DepartmentsModel');
    protected $viewPath = "medical/maindisplay";


    public function index()
    {
        $dep_lang = $this->getGet("dep_lang");
        if(!$dep_lang)$dep_lang = "kor";
        $validate = $this->validate([
            'isSave' => [
                'rules'=>'required',
                'errors'=> ['required'=>'OO을 선택해 주세요.'],
            ],
        ]);

        if(!$validate) {    //-- Form 출력
            $this->model->orderBy("dep_title_".$dep_lang);
            $data['department_list'] = $this->model->get()->getResultArray();

            $this->model->orderBy("dep_main_display_".$dep_lang);
            $this->model->where("dep_main_display_".$dep_lang.">0");
            $data['main_list'] = $this->model->get()->getResultArray();

            $data['group_title'] = "메인노출";
            $data['dep_lang'] = $dep_lang;

            $this->setView("sort", $data);
            return $this->run();
        }else{
            $info = $this->getPost();
            $dep_lang = $info['dep_lang'];

            $this->DepartmentsModel->set('dep_main_display_'.$dep_lang,'dep_main_display_'.$dep_lang.'+99',false);
            $this->DepartmentsModel->where('dep_main_display_'.$dep_lang.'>0');
            $this->DepartmentsModel->update();

            foreach($info['dep_main_display'] as $key=>$idx){
                $this->DepartmentsModel->set('dep_main_display_'.$dep_lang,$key+1);
                $this->DepartmentsModel->where('dep_idx',$idx);
                $this->DepartmentsModel->update();
            }


            $this->DepartmentsModel->set('dep_main_display_'.$dep_lang,0);
            $this->DepartmentsModel->where('dep_main_display_'.$dep_lang.'>99');
            $this->DepartmentsModel->update();
            $this->session->setFlashdata('messageFlag', 'edit');
            alert("");
        }
    }


}
