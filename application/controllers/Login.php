<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function proses()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->m_user->cek_login($username);
        $get_user = $user->num_rows();

        if ($get_user == 1) {

            echo "User Terdaftar";

        } else {

            $this->session->set_flashdata('eror_no_user', 'eror_no_user');
            redirect('Login/index');
            
        }

    }
}
