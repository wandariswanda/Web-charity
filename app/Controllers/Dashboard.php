<?php

namespace App\Controllers;
// use App\Models\Auth_model;
// $session = \Config\Services::session(); 

class Dashboard extends BaseController
{
  public function __construct(){
    $this->session = \Config\Services::session();
    $metaUser = $this->session->get('metaUser1');
    if(empty($metaUser)){
      // echo "masuk sini"; die();
      return redirect()->to(base_url('/auth/logout'));
    }
    // $session = $this->session;
    // $session = \Config\Services::session(); 
  }

  public function index(){
    
    // $session = \Config\Services::session(); 
    // $this->session->destroy();
    // print_r($this->session->get());
    $data['web_title']     = "Dashboard";
		$data['content']       = "test/test_view";
		return view('layout', $data);
  }
}