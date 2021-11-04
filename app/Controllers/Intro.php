<?php

namespace App\Controllers;

class Intro extends BaseController
{
    protected $viewPath = "intro";

    public function greeting()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("greeting");
        return $this->run();
        //return view('welcome_message');
    }

    public function purpose()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("purpose");
        return $this->run();
        //return view('welcome_message');
    }

    public function vision()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("vision");
        return $this->run();
        //return view('welcome_message');
    }

    public function history()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("history");
        return $this->run();
        //return view('welcome_message');
    }

    public function imc()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("imc");
        return $this->run();
        //return view('welcome_message');
    }


}