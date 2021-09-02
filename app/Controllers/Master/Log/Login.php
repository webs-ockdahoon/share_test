<?php

namespace App\Controllers\Master\log;
use App\Controllers\Master\MasterController;

class Login extends MasterController
{
    protected $models = array('LogLoginModel');
    protected $viewPath = "log/login";

    public function index()
    {
        /**
         * 검색 기능 구현 시작
         */
        if($this->sch_obj[1])$this->model->like("lol_mem_id",$this->sch_obj[1],'both');
        if($this->sch_obj[2])$this->model->like("lol_created_ip",$this->sch_obj[2],'both');
        if($this->sch_obj[3])$this->model->where("lol_created_at>=",$this->sch_obj[3] . " 00:00:00");
        if($this->sch_obj[4])$this->model->where("lol_created_at<=",$this->sch_obj[4] . " 23:59:59");
        /* 검색 기능 구현 끝 */

        $data = $this->model->getPager();

        $this->setView("list",$data);
        return $this->run();
    }

}
