<?php

namespace App\Controllers;
// use App\Models\Auth_model;
// $session = \Config\Services::session(); 

class Dashboard extends BaseController
{
  public function __construct(){
    $this->session = \Config\Services::session();
    // $session = $this->session;
    // $session = \Config\Services::session(); 
  }
  public function index(){
    
    // $session = \Config\Services::session(); 
    // $this->session->destroy();
    print_r($this->session->get());
  }
}