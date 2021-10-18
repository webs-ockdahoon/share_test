<?php

namespace App\Controllers;

class Intro extends BaseController
{
    protected $viewPath = "intro";

    public function index()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("greeting");
        return $this->run();
        //return view('welcome_message');
    }

}