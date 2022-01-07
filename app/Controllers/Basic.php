<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Basic extends BaseController
{
    public function index()
    {
        $data['web_title']     = "Dashboard";
		$data['content']       = "test/test_view";
        $this->load->view('layout',$data);
    }
}
