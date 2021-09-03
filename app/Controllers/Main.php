<?php

namespace App\Controllers;

class Main extends BaseController
{
    protected $viewPath = "main";

	public function index()
	{
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
	    $this->setView("main");
	    return $this->run();
		//return view('welcome_message');
	}

}

