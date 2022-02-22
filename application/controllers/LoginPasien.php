<?php

class LoginPasien extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login_pasien');
    }

    function index()
    {
        $this->load->view('v_login_pasien');
    }

    function aksi_login()
    {
        $no_rmk = $this->input->post('no_rmk');
        $nik = $this->input->post('nik');
        $where = array(
            'no_rmk' => $no_rmk,
            'nik' => $nik
        );
        $cek = $this->m_login_pasien->cek_login("pasien", $where);
        $status = $this->m_login_pasien->status($no_rmk, $nik)->row()->status;
        $id_tujuan = $this->m_login_pasien->status($no_rmk, $nik)->row()->id_tujuan;
        $id_verif = $this->m_login_pasien->status($no_rmk, $nik)->row()->id_verif;
        $no_bpjs = $this->m_login_pasien->rekam_medis($no_rmk, $nik)->row()->no_bpjs;
        $aktivasi = $this->m_login_pasien->aktivasi($no_rmk, $nik)->row()->keterangan;

        if ($aktivasi == "Teraktivasi" && $cek->num_rows() > 0) {

            $value = $cek->row();

            $data_session['no_rmk'] = $no_rmk;
            $data_session['nik'] = $nik;
            $data_session['role'] = "pasien";
            $data_session['data'] = $value->nama_pasien;
            $data_session['status'] = $status;
            $data_session['id_tujuan'] = $id_tujuan;
            $data_session['id_verif'] = $id_verif;
            $data_session['no_bpjs'] = $no_bpjs;

            $data_session['is_login'] = true;

            $this->session->set_userdata($data_session);

            redirect('dashboard');
        } else {
            echo "<script>alert('No. RMK atau NIK Anda salah! atau Akun anda Belum Teraktivasi');</script>";
            // redirect('loginpasien');
            $hallogin = base_url('loginpasien');
            echo "<script>location='" . $hallogin . "';</script>";
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('loginpasien');
    }
}
