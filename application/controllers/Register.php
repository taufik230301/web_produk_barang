<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index()
    {
        $this->load->view('register');
    }

    public function proses()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $re_password = $this->input->post('re_password');
        $id_user_level = 1;
        $id_user = md5($username . $email . $password . rand(1, 99999));

        // echo var_dump($password);
        // echo var_dump($re_password);
        // die();

        if ($password == $re_password) {
            $hasil = $this->m_user->insert_user($id_user, $username, $email, $password, $id_user_level);

            if ($hasil == false) {

                $this->session->set_flashdata('eror_input', 'eror_input');
                redirect('Register/index');

            } else {

                $this->session->set_flashdata('input', 'input');
                redirect('Register/index');

            }
        } else {
            $this->session->set_flashdata('eror_password', 'eror_password');
            redirect('Register/index');
        }
    }

}
