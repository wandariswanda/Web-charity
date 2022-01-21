<?php

namespace App\Controllers;
use App\Models\Auth_model;

class Auth extends BaseController
{
    public function __construct(){
        $this->session = \Config\Services::session();
	}

    public function index(){
        return view('auth/signin');
    }

    public function signin()
    {
        $post = $this->request->getPost();
        
        $AuthModel = new Auth_model;
        $arrUser = [ "username" => $post['username'] ];
        $getUser = $AuthModel->getUser($arrUser);

        if(!$getUser){
            session()->setFlashData("error", 'Username tidak ditemukan');
            return redirect()->to(base_url('/'));
        }else{
            $password = hash('sha256', $post['password']);

            if($getUser['password'] != $password){
                session()->setFlashData("error", 'Password yang kamu masukan salah');
                return redirect()->to(base_url('/'));
            }else{
                $session = \Config\Services::session(); 
                $arrSessionUser = [
                    'user_id' => $getUser['user'],
                    // 'name' => $getUser['name'],
                    'email' => $getUser['email'],
                    'username' => $getUser['username'],
                    'access_group_id' => $getUser['access_group_id'],
                ];

                $session->set("metaUser", $arrSessionUser);

                return redirect()->to(base_url('/dashboard'));
            }
        }
    }

    public function logout(){
        print_r("hai"); die();
        $this->session->destroy();
        return redirect()->to(base_url('/'));
    }
}
