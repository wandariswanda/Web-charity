<?php

namespace App\Controllers;
use App\Models\Auth_model;

class Auth extends BaseController
{
    public function __construct(){
        // $this->load->library('session');
        // $request = \Config\Services::request();
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
        // print_r("<pre>");
        // print_r($getUser); 
        // print_r("</pre>");die();

        if(!$getUser){
            session()->setFlashData("error", 'Username tidak ditemukan');
            return redirect()->to(base_url('/'));
        }else{
            // $password = "96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e";
            $password = hash('sha256', $post['password']);

            if($getUser['password'] != $password){
                // print_r("pass nggak cocok bun"); die();
                // return redirect()->to(base_url('/dashboard'));
                session()->setFlashData("error", 'Password yang kamu masukan salah');
                return redirect()->to(base_url('/'));
		        // return redirect()->to(base_url('/'));
            }else{
                $session = \Config\Services::session(); 
                $arrSessionUser = [
                    'user_id' => $getUser['user'],
                    // 'name' => $getUser['name'],
                    'email' => $getUser['email'],
                    'username' => $getUser['username'],
                    'access_group_id' => $getUser['access_group_id'],
                ];
                // print_r($password); die();

                // $session->destroy();
                $session->set("metaUser", $arrSessionUser);
                // print_r($session->get());
                

                // $session->setFlashdata('error', 'value');
				

				// return $this->session->set_userdata('meta_user', $arrSessionUser);
                // redirect('/dashboard');
                return redirect()->to(base_url('/dashboard'));
                
            }
            
        }

        // print_r("<pre>");
        // print_r($getUser); 
        // print_r("</pre>");die();
        // $hai = strlen('70462398-e995-4f73-858f-954a542a5927');
        // print_r($hai); die();
        // return view('auth/signin');
    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to(base_url('/'));
    }
}
