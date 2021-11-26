<?php

namespace App\Controllers;

class Mrequest extends BaseController
{
    protected $viewPath = "mrequest";

    public function inquiry()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("inquiry");
        return $this->run();
        //return view('welcome_message');
    }

    public function reviewInquiry()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("reviewInquiry");
        return $this->run();
        //return view('welcome_message');
    }
}
