<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
        $this->load->library('form_validation');
        
    }

    function index()
    {
        $this->form_validation->set_rules('user', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Halaman Login";
            $this->load->view('template/header', $data);
            $this->load->view('auth');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $user = $this->input->post('user');
        $pass = $this->input->post('password');
        $data = $this->db->get_where('t_user', ['user' => $user])->row_array();

        //jika ada user
        if ($data) {
            if ($data['status'] == 1) {
                if (password_verify($pass, $data['password'])) {
                    $data = [
                        'user' => $data['user'],
                        'id_level' => $data['id_level']
                    ];
                    $this->session->set_userdata($data);
                    if ($data['id_level'] == 20) {
                        redirect('backend');
                    } elseif ($data['id_level'] == 8) {
                        redirect('frontend');
                    } elseif($data['id_level']==7) {
                        redirect('frondosen');
                    }else{
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User belum aktif!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User belum terdaftar!</div>');
            redirect('auth');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
}
