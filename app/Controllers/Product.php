<?php

namespace App\Controllers;

class Product extends BaseController
{
    protected $viewPath = "product";

	public function index()
	{
	    $this->setView("list");
	    return $this->run();
	}

    public function detail()
    {
        $this->setView("detail");
        return $this->run();
    }
}
