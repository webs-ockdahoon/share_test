<?php

namespace App\Controllers\Master\Config;
use App\Controllers\Master\MasterController;
use App\Libraries\Uploader;

class Config extends MasterController
{
    protected $models = array('ConfigModel');
    protected $viewPath = "config";

    public function index()
    {
        // 기본 업체 정보 수정으로 이동
        return redirect()->to($this->cont_url."/company");
    }

    public function company()
    {
        $group = "company";

        if($this->method=="post") {
            $info = $this->getPost();
            $data = array();
            $data["group"] = $group;
            $data["info"] = $info;
            $this->model->edit($data);
            $this->session->setFlashdata('messageFlag', 'edit');
            return redirect()->to($this->cont_url."/".$group);
        }else{
            $data = $this->model->getConfig($group);
            $this->setView($group, $data);
            return $this->run();
        }

    }



    public function site()
    {
        $group = "site";

        if($this->method=="post") {
            $info = $this->getPost();
            $data = array();
            $data["group"] = $group;
            $data["info"] = $info;

            $this->model->edit($data);
            $this->session->setFlashdata('messageFlag', 'edit');
            return redirect()->to($this->cont_url."/".$group);
        }else{
            $data = $this->model->getConfig($group);

            $this->setView($group, $data);
            return $this->run();
        }

    }



}