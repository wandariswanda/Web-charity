<?php

namespace App\Controllers;
use App\Models\Basic_model;

class Dashboard extends BaseController
{
  public function __construct(){
    $this->session = \Config\Services::session();
    $metaUser = $this->session->get('metaUser');

    $this->uuid = service('uuid')->uuid4();
    if(empty($metaUser)){
      redirect('auth/logout');
      // return redirect()->to(base_url('auth/logout'));
    }
  }

  // public function index(){
  //   $data['web_title']     = "Dashboard";
	// 	$data['content']       = "test/test_view";
	// 	return view('layout', $data);
  // }

  // Basic
  public function index(){
    $BasicModel = new Basic_model;
    $getAll = $BasicModel->getAll();

    $data = [
      "web_title" => "Basic",
      "content"   => "basic/index",
      "data"      => $getAll
    ];

		return view('layout', $data);
  }

  public function add(){
    $data = [
      "web_title" => "Basic",
      "content"   => "basic/add",
      "previous_link" => "basic"
    ];

		return view('layout', $data);
  }

  public function createBasic(){
    $post = $this->request->getPost();

    $BasicModel = new Basic_model;
    $param = [
      "id"   => $this->uuid->toString(),
      "name" => $post["name"]
    ];

    $BasicModel->createBasic($param);

    session()->setFlashData("error", 'Create basic success');
    return redirect()->to(base_url('/basic/v/add'));
  }

  public function getBasicById($id){
    // print_r("masa masuk sini"); die();
    $BasicModel = new Basic_model;
    $basicInfo = $BasicModel->getBasicById(["id" => $id]);

    $data = [
      "web_title" => "Basic",
      "content"   => "basic/edit",
      "previous_link" => "basic",
      "data_basic" => $basicInfo
    ];

		return view('layout', $data);
  }

  public function updateBasic($id){
    $post = $this->request->getPost();

    $BasicModel = new Basic_model;
    $param = [
      "id"   => $id,
      "name" => $post["name"]
    ];

    $BasicModel->updateBasic($param);

    session()->setFlashData("error", 'Update basic success');
    return redirect()->to(base_url('/basic'));
  }

  public function deleteBasic($id){
    $BasicModel = new Basic_model;
    $param = [ "id" => $id ];

    $BasicModel->deleteBasic($param);
    
    session()->setFlashData("error", 'Delete success');
    return redirect()->to(base_url('/basic'));
  }
}