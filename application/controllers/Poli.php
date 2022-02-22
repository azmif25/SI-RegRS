<?php
defined('BASEPATH') or exit('No direct script access allowed');

class poli extends CI_Controller
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
		$this->load->helper("url");
		$this->load->library("pagination");
		$this->load->model('m_poli');
		if ($this->session->userdata('is_login') == FALSE) {

			redirect('/loginadmin', 'refresh');
		} elseif ($this->session->role == 'pasien') {
			redirect('dashboard');
		}
	}

	public function index()
	{
		//set params
		$params = array();
		//set records per page
		$limit_page = 6;
		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
		$total = $this->m_poli->get_total();

		if ($total > 0) {
			// get current page records
			$params['results'] = $this->m_poli->get_current_page($limit_page, $page * $limit_page);

			$config['base_url'] = base_url() . 'poli/index';
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

		// $data['recs'] = $this->m_poli->inqpoli();
		$params['page'] = "poli";
		$params['treeview'] = "master";

		//load template
		$this->load->view('template/t_header');
		$this->load->view('template/t_sidebar');
		$this->load->view('content/poli/v_idxpoli', $params);
		$this->load->view('template/t_footer');
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['results'] = $this->m_poli->get_poli_keyword($keyword);

		//load template
		$this->load->view('template/t_header');
		$this->load->view('template/t_sidebar');
		$this->load->view('content/poli/v_idxpoli', $data);
		$this->load->view('template/t_footer');
	}

	public function addnew()
	{
		//load template
		$this->load->view('template/t_header');
		$this->load->view('template/t_sidebar');
		$this->load->view('content/poli/v_addpoli');
		$this->load->view('template/t_footer');
	}
	public function procadd()
	{
		$nama_poli = $this->input->post('nama_poli');
		$this->db->trans_start();
		$this->m_poli->inspoli($nama_poli);
		$this->db->trans_complete();

		redirect('poli');
	}
	public function update()
	{

		$id_poli = $this->uri->segment('3');

		$data['id_poli'] = $this->m_poli->detailpoli($id_poli)->id_poli;
		$data['nama_poli'] = $this->m_poli->detailpoli($id_poli)->nama_poli;

		//load template
		$this->load->view('template/t_header');
		$this->load->view('template/t_sidebar');
		$this->load->view('content/poli/v_updpoli', $data);
		$this->load->view('template/t_footer');
	}
	public function procupd()
	{
		$id_poli = $this->input->post('id_poli');
		$nama_poli = $this->input->post('nama_poli');


		$this->db->trans_start();
		$this->m_poli->updpoli($id_poli, $nama_poli);
		$this->db->trans_complete();

		redirect('poli');
	}
	public function delete()
	{

		$id_poli = $this->uri->segment("3");
		$this->m_poli->delpoli($id_poli);

		redirect('poli');
	}
}
