<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
        public function __construct()
        {
                parent::__construct();
        }

 public function index()
 
    {

        $data['title']="HALAMAN LOGIN";
               $this->load->view('template/header');
               $this->load->view('auth',$data);

    }

function logout(){
    $this->session->sess_destroy();
    redirect(base_url('auth'));
}

}