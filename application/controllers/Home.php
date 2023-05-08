<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('SecurityModel', 'MejaModel', 'GeneralModel', 'MenuModel'));
        // var_dump($this->session->userdata());
        // $this->SecurityModel->roleOnlyGuard('admin');
    }

    public function index()
    {
        if (!empty($this->session->userdata('login'))) {
            if ($this->session->userdata('login')['nama_role'] == 'Customer') {
                $data = [
                    'page' => 'customer/dashboard'
                ];
                $this->load->view('template/index2', $data);
            } else {
                redirect(base_url($this->session->userdata('login')['nama_controller']));
            };
        } else {
            $data = [
                'page' => 'login',
                'title' => 'Login'
            ];
            $this->load->view('template/index_auth', $data);
        }
    }

    public function register()
    {
        if (!empty($this->session->userdata('login'))) {
            if ($this->session->userdata('login')['nama_role'] == 'Customer') {
                $data = [
                    'page' => 'customer/dashboard',
                ];
                $this->load->view('template/index2', $data);
            } else {
                redirect(base_url($this->session->userdata('login')['nama_controller']));
            };
        } else {
            $data = [
                'page' => 'register',
                'title' => 'Register',
            ];
            $this->load->view('template/index_auth', $data);
        }
    }
}
