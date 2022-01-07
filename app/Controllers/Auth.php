<?php

namespace App\Controllers;
use App\Models\Auth_model;

class Auth extends BaseController
{
    // public function __construct(){
    //     $this->load->library('session');
	// }

    public function index()
    {
        // print_r("<pre>");
        // print_r($getUser); 
        // print_r("</pre>");die();

        $AuthModel = new Auth_model;
        $arrUser = ["username" =>"superadmin@gmail.com"];
        $getUser = $AuthModel->getUser($arrUser);
        // print_r("<pre>");
        // print_r($getUser['password']); 
        // print_r("</pre>");die();

        if(!$getUser){
            print_r("user tidak ada"); die();
        }else{
            $password = "96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e";
         
            if($getUser['password'] != $password){
                // print_r("pass nggak cocok bun"); die();
                // return redirect()->to(base_url('/dashboard'));
                session()->setFlashData("error", 'hai ganteng');
		        // return redirect()->to(base_url('/'));
            }else{
                $session = \Config\Services::session(); 
                $arrSessionUser = array(
                    'user_id'        => $getUser['user'],
                    // 'name'           => $getUser['name'],
                    'email'          => $getUser['email'],
                    'username'       	=> $getUser['username'],
                    'access_group_id' 	=> $getUser['access_group_id'],
                );

                // $session->destroy();
                // $session->set("metaUser", $arrSessionUser);
                // print_r($session->get());
                

                // $session->setFlashdata('item', 'value');
				

				// return $this->session->set_userdata('meta_user', $arrSessionUser);
            }
            
        }

        // print_r("<pre>");
        // print_r($getUser); 
        // print_r("</pre>");die();
        // $hai = strlen('70462398-e995-4f73-858f-954a542a5927');
        // print_r($hai); die();
        return view('auth/signin');
    }
}
