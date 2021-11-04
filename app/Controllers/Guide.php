<?php

namespace App\Controllers;

class Guide extends BaseController
{
    protected $viewPath = "guide";

    public function process()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("process");
        return $this->run();
        //return view('welcome_message');
    }

    public function floor()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("floor");
        return $this->run();
        //return view('welcome_message');
    }

    public function convenience()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("convenience");
        return $this->run();
        //return view('welcome_message');
    }

    public function location()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("location");
        return $this->run();
        //return view('welcome_message');
    }
}