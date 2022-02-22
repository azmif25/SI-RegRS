<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tujuan extends CI_Controller
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
		$this->load->model('m_tujuan');
		$this->load->model('m_pasien');
		$this->load->model('m_poli');
		$this->load->model('m_verifikasi');
		$this->load->model('m_dashboard');
		if ($this->session->userdata('is_login') == FALSE) {

			redirect('/loginpasien', 'refresh');
		}
	}
	public function index()
	{

		if ($this->session->role == 'pasien') {
			// $data['recs'] = $this->m_tujuan->inqtujuan();

			// Menampilkan Semua Data Poli
			$data['polirecs'] = $this->m_poli->inqpoli();

			//load template
			$this->load->view('template/t_header');
			$this->load->view('template/t_sidebar');
			$this->load->view('content/tujuan/v_idxtujuan', $data);
			$this->load->view('template/t_footer');
		} else {
			redirect('dashboard');
		}
	}

	public function ubah()
	{
		// Menampilkan Semua Data Poli
		$data['polirecs'] = $this->m_poli->inqpoli();
		$nik = $this->session->nik;
		$id_tujuan = $this->m_dashboard->detaildb($nik)->id_tujuan;

		$data['id_tujuan'] = $this->m_tujuan->detailtujuan($id_tujuan)->id_tujuan;
		$data['bukti'] = $this->m_tujuan->detailtujuan($id_tujuan)->bukti;
		$data['tgl_tujuan'] = $this->m_tujuan->detailtujuan($id_tujuan)->tgl_tujuan;
		$data['id_poli'] = $this->m_tujuan->detailtujuan($id_tujuan)->id_poli;
		$data['nama_poli'] = $this->m_tujuan->detailtujuan($id_tujuan)->nama_poli;


		//load template
		$this->load->view('template/t_header');
		$this->load->view('template/t_sidebar');
		$this->load->view('content/tujuan/v_ubahtujuan', $data);
		$this->load->view('template/t_footer');
	}

	public function praru()
	{
		$nik = $this->session->nik;
		$id_verif = $this->m_dashboard->detaildb($nik)->id_verif;
		$id_tujuan = $this->m_dashboard->detaildb($nik)->id_tujuan;

		$this->m_tujuan->deltujuan($id_tujuan);
		$this->m_verifikasi->delverifikasi($id_verif);

		redirect('tujuan');
	}

	public function prabi()
	{
		$nik = $this->session->nik;
		$id_verif = $this->m_dashboard->detaildb($nik)->id_verif;
		// $id_tujuan = $this->m_dashboard->detaildb($nik)->id_tujuan;

		// $this->m_tujuan->deltujuan($id_tujuan);
		$this->m_verifikasi->delverifikasi($id_verif);

		redirect('dashboard');
	}

	public function rrujukan()
	{
		if ($this->session->role != 'pasien') {
			//set params
			$params = array();
			//set records per page
			$limit_page = 5;
			$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
			$total = $this->m_tujuan->get_total();

			if ($total > 0) {
				// get current page records
				$params['results'] = $this->m_tujuan->get_current_page($limit_page, $page * $limit_page);

				$config['base_url'] = base_url() . 'tujuan/rrujukan';
				$config['total_rows'] = $total;
				$config['per_page'] = $limit_page;
				$config['uri_segment'] = 3;

				//paging configuration
				$config['num_links'] = 2;
				$config['use_page_numbers'] = TRUE;
				$config['reuse_query_string'] = TRUE;

				//bootstrap pagination 
				$config['full_tag_open'] = '<ul class="pagination">';
				$config['full_tag_close'] = '</ul>';
				$config['first_link'] = '&laquo; First';
				$config['first_tag_open'] = '<li>';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = 'Last &raquo';
				$config['last_tag_open'] = '<li>';
				$config['last_tag_close'] = '</li>';
				$config['next_link'] = 'Next';
				$config['next_tag_open'] = '<li>';
				$config['next_tag_close'] = '<li>';
				$config['prev_link'] = 'Prev';
				$config['prev_tag_open'] = '<li>';
				$config['prev_tag_close'] = '<li>';
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';

				$this->pagination->initialize($config);

				// build paging links
				$params['links'] = $this->pagination->create_links();
			}

			// $data['recs'] = $this->m_tujuan->inqrrujukan();

			// Menampilkan Semua Data Poli
			// $data['polirecs'] = $this->m_poli->inqpoli();

			//load template
			$this->load->view('template/t_header');
			$this->load->view('template/t_sidebar');
			$this->load->view('content/tujuan/v_idxrrujukan', $params);
			$this->load->view('template/t_footer');
		} else {
			redirect('dashboard');
		}
	}

	public function cetak()
	{
		if ($this->session->role != 'pasien') {

			$daritgl = $this->input->post('dari_tanggal');
			$ketgl = $this->input->post('ke_tanggal');

			$data['recs'] = $this->m_tujuan->inqrrujukan($daritgl, $ketgl);

			//load template
			$this->load->view('content/tujuan/v_ctktujuan', $data);
		} else {
			redirect('dashboard');
		}
	}

	public function addnew()
	{

		//Menampilkan Semua Data Pasien 
		$data['pasienrecs'] = $this->m_pasien->inqpasien();

		// Menampilkan Semua Data Poli
		$data['polirecs'] = $this->m_poli->inqpoli();

		//load template
		$this->load->view('template/t_header');
		$this->load->view('template/t_sidebar');
		$this->load->view('content/tujuan/v_addtujuan', $data);
		$this->load->view('template/t_footer');
	}
	public function procadd()
	{
		$config['upload_path']         = './bukti/';  // folder upload 
		$config['allowed_types']        = 'jpg|png|jpeg'; // jenis file
		$config['max_size']             = 5000;
		$config['max_width']            = 4000;
		$config['max_height']           = 4000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('bukti')) //sesuai dengan name pada form 
		{
			echo 'anda gagal upload';
		} else {
			//tampung data dari form
			$nik = $this->input->post('nik');
			$file = $this->upload->data();
			$bukti = $file['file_name'];
			$tgl_tujuan = $this->input->post('tgl_tujuan');
			$id_poli = $this->input->post('id_poli');
			$id_verif = $this->input->post('id_verif');

			$this->db->trans_start();
			$this->m_tujuan->instujuan($nik, $bukti, $tgl_tujuan, $id_poli, $id_verif);
			$this->db->trans_complete();

			redirect('dashboard');
		}
	}
	public function detail()
	{

		$id_tujuan = $this->uri->segment('3');

		$data['id_tujuan'] = $this->m_tujuan->detailtujuan($id_tujuan)->id_tujuan;
		$data['no_rmk'] = $this->m_tujuan->detailtujuan($id_tujuan)->no_rmk;
		$data['nik'] =  $this->m_tujuan->detailtujuan($id_tujuan)->nik;
		$data['no_bpjs'] =  $this->m_tujuan->detailtujuan($id_tujuan)->no_bpjs;
		$data['nama_pasien'] = $this->m_tujuan->detailtujuan($id_tujuan)->nama_pasien;
		$data['jenis_pasien'] = $this->m_tujuan->detailtujuan($id_tujuan)->jenis_pasien;
		$data['bukti'] = $this->m_tujuan->detailtujuan($id_tujuan)->bukti;
		$data['tgl_tujuan'] = $this->m_tujuan->detailtujuan($id_tujuan)->tgl_tujuan;
		$data['nama_poli'] = $this->m_tujuan->detailtujuan($id_tujuan)->nama_poli;
		// $data['kode_booking'] = $this->m_tujuan->detailtujuan($id_tujuan)->kode_booking;
		// $data['status'] = $this->m_tujuan->detailtujuan($id_tujuan)->status;
		// $data['alasan_tolak'] = $this->m_tujuan->detailtujuan($id_tujuan)->alasan_tolak;
		$data['nik'] = $this->m_tujuan->detailtujuan($id_tujuan)->nik;
		$data['telepon'] = $this->m_tujuan->detailtujuan($id_tujuan)->telepon;


		//load template
		$this->load->view('template/t_header');
		$this->load->view('template/t_sidebar');
		$this->load->view('content/tujuan/v_dtltujuan', $data);
		$this->load->view('template/t_footer');
	}
	public function update()
	{

		// Menampilkan Semua Data Poli
		$data['polirecs'] = $this->m_poli->inqpoli();

		$id_tujuan = $this->uri->segment('3');

		$data['id_tujuan'] = $this->m_tujuan->detailtujuan($id_tujuan)->id_tujuan;
		$data['bukti'] = $this->m_tujuan->detailtujuan($id_tujuan)->bukti;
		$data['tgl_tujuan'] = $this->m_tujuan->detailtujuan($id_tujuan)->tgl_tujuan;
		$data['id_poli'] = $this->m_tujuan->detailtujuan($id_tujuan)->id_poli;
		$data['nama_poli'] = $this->m_tujuan->detailtujuan($id_tujuan)->nama_poli;


		//load template
		$this->load->view('template/t_header');
		$this->load->view('template/t_sidebar');
		$this->load->view('content/tujuan/v_updtujuan', $data);
		$this->load->view('template/t_footer');
	}
	public function procupd()
	{

		$config['upload_path']         = './bukti/';  // folder upload 
		$config['allowed_types']        = 'jpg|png|jpeg'; // jenis file
		$config['max_size']             = 5000;
		$config['max_width']            = 4000;
		$config['max_height']           = 4000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('bukti')) //sesuai dengan name pada form 
		{
			echo 'anda gagal upload';
		} else {
			//tampung data dari form
			$id_tujuan = $this->input->post('id_tujuan');
			$file = $this->upload->data();
			$bukti = $file['file_name'];
			$tgl_tujuan = $this->input->post('tgl_tujuan');
			$id_poli = $this->input->post('id_poli');

			$this->db->trans_start();
			$this->m_tujuan->updtujuan($id_tujuan, $bukti, $tgl_tujuan, $id_poli);
			$this->db->trans_complete();

			redirect('tujuan/rrujukan');
		}
	}
	public function delete()
	{

		$id_tujuan = $this->uri->segment('3');

		$this->m_tujuan->deltujuan($id_tujuan);
		// $this->m_verifikasi->delverifikasi($id_verif);

		redirect('tujuan/rrujukan');
	}

	public function lakukan_download()
	{
		// Download Bukti
		$this->load->helper('download');

		$bukti = $this->uri->segment('3');
		$lokasi = base_url('bukti');

		force_download($lokasi . '/' . $bukti, null);
	}
}
