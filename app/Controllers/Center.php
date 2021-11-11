<?php

namespace App\Controllers;

class Center extends BaseController
{
    protected $viewPath = "center";

    public function specializedCenter()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("specializedCenter");
        return $this->run();
        //return view('welcome_message');
    }

    public function specializedInfo()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("specializedInfo");
        return $this->run();
        //return view('welcome_message');
    }

    public function specializedDoctors()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("specializedDoctors");
        return $this->run();
        //return view('welcome_message');
    }

    public function centerDoctor()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("centerDoctor");
        return $this->run();
        //return view('welcome_message');
    }
}