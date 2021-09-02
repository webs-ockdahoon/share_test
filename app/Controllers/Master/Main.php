<?php

namespace App\Controllers\Master;

class Main extends MasterController
{
    protected $viewPath = "main";

	public function index()
	{
	    $this->setView("main");
	    return $this->run();
		//return view('welcome_message');
	}
}
