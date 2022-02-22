<?php

class LoginAdmin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login_admin');
    }

    function index()
    {
        $this->load->view('v_login');
    }

    function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => md5($password)
        );
        $cek = $this->m_login_admin->cek_login("admin", $where);
        if ($cek->num_rows() > 0) {

            $value = $cek->row();
            // $data_session = array(
            //     'nama' => $username,
            //     'role' => "admin",
            //     'data' => $data,
            //     'is_login' => true
            // );

            $data_session['nama'] = $value->nama_admin;
            $data_session['id_admin'] = $value->id_admin;
            $data_session['username'] = $username;
            $data_session['role'] = $value->role;
            $data_session['is_login'] = TRUE;

            $this->session->set_userdata($data_session);

            redirect('dashboard');
        } else {
            echo "<script>alert('Username atau Password Anda salah!');</script>";
            // redirect('loginpasien');
            $hallogin = base_url('loginadmin');
            echo "<script>location='" . $hallogin . "';</script>";
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('loginadmin');
    }
}
