<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('m_dashboard');
		if ($this->session->userdata('is_login') == FALSE) {

			redirect('/loginpasien', 'refresh');
		}
	}

	public function index()
	{
		$nik = $this->session->nik;
		if ($this->session->role == 'pasien' && !empty($this->m_dashboard->detaildb($nik)->status)) {
			# code...

			$nik = $this->session->nik;

			$data['no_rmk'] = $this->m_dashboard->detaildb($nik)->no_rmk;
			$data['nama_pasien'] = $this->m_dashboard->detaildb($nik)->nama_pasien;
			$data['jenis_pasien'] = $this->m_dashboard->detaildb($nik)->jenis_pasien;
			$data['tgl_tujuan'] = $this->m_dashboard->detaildb($nik)->tgl_tujuan;
			$data['nama_poli'] = $this->m_dashboard->detaildb($nik)->nama_poli;
			$data['kode_booking'] = $this->m_dashboard->detaildb($nik)->kode_booking;
			$data['alasan_tolak'] = $this->m_dashboard->detaildb($nik)->alasan_tolak;
			$data['status'] = $this->m_dashboard->detaildb($nik)->status;
			$data['id_verif'] = $this->m_dashboard->detaildb($nik)->id_verif;

			if (date('Y-m-d') > $this->m_dashboard->detaildb($nik)->tgl_tujuan) {

				redirect('tujuan/prabi');
			}
		}
		$this->load->view('template/t_header');
		if ($this->session->role == 'pasien' && !empty($this->m_dashboard->detaildb($nik)->status)) {
			$this->load->view('template/t_sidebar', $data);
			$this->load->view('content/v_dashboard', $data);
		} else {
			$this->load->view('template/t_sidebar');
			$this->load->view('content/v_dashboard');
		}
		$this->load->view('template/t_footer');
	}
}
