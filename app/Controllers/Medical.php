<?php

namespace App\Controllers;

class Medical extends BaseController
{
    protected $viewPath = "medical";

    public function departments()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("departments");
        return $this->run();
        //return view('welcome_message');
    }

    public function departmentInfo()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("departmentInfo");
        return $this->run();
        //return view('welcome_message');
    }

    public function departmentDoctors()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("departmentDoctors");
        return $this->run();
        //return view('welcome_message');
    }

    public function doctor()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("doctor");
        return $this->run();
        //return view('welcome_message');
    }
}