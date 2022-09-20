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

            $user = $user->row_array();

            // echo "Ini Password Dari database";
            // echo var_dump($user['password']);
            // echo "Ini Password Dari Masukan User";
            // echo var_dump($password);
            // die();

            if ($user['password'] == $password) {

                if ($user['id_user_level'] == 1) {
                    
                    redirect('Dashboard/view_admin');
                    
                } else {
                    $this->session->set_flashdata('eror_no_access', 'eror_no_access');
                    redirect('Login/index');
                }

            } else {
                $this->session->set_flashdata('eror_no_password', 'eror_no_password');
                redirect('Login/index');
            }

        } else {

            $this->session->set_flashdata('eror_no_user', 'eror_no_user');
            redirect('Login/index');

        }

    }

    public function log_out()
	{
		
        $this->session->set_flashdata('success_log_out','success_log_out');
            redirect('Login/index');
	}
}
