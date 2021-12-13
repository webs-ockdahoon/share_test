<?php

namespace App\Controllers;

class Search extends BaseController
{
    protected $models = array();
    protected $viewPath = "help";

    public function index()
    {
        $info = $this->getPost();

        $data = array();

        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("search" , $data);
        return $this->run();

    }

}