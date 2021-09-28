<?php

namespace App\Controllers;

class Main extends BaseController
{
    protected $viewPath = "main";

    public function index()
    {
        $this->setView("main");
        return $this->run();
        //return view('welcome_message');
    }

}