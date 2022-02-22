<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
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
		$this->load->model('m_admin');
		if ($this->session->userdata('is_login') == FALSE) {

			redirect('/loginadmin', 'refresh');
		} elseif ($this->session->role == 'pasien') {
			redirect('dashboard');
		}
	}
	public function index()
	{

		$data['recs'] = $this->m_admin->inqadmin();
		$data['page'] = "admin";
		$data['treeview'] = "master";

		//load template
		$this->load->view('template/t_header');
		$this->load->view('template/t_sidebar', $data);
		$this->load->view('content/admin/v_idxadmin', $data);
		$this->load->view('template/t_footer');
	}
	public function addnew()
	{

		//load template
		$this->load->view('template/t_header');
		$this->load->view('template/t_sidebar');
		$this->load->view('content/admin/v_addadmin');
		$this->load->view('template/t_footer');
	}
	public function procadd()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$nama_admin = $this->input->post('nama_admin');

		$this->db->trans_start();
		$this->m_admin->insadmin($username, $password, $nama_admin);
		$this->db->trans_complete();

		redirect('admin');
	}
	public function update()
	{

		$id_admin = $this->uri->segment('3');

		$data['id_admin'] = $this->m_admin->detailadmin($id_admin)->id_admin;
		$data['username'] = $this->m_admin->detailadmin($id_admin)->username;
		$data['nama_admin'] = $this->m_admin->detailadmin($id_admin)->nama_admin;


		//load template
		$this->load->view('template/t_header');
		$this->load->view('template/t_sidebar');
		$this->load->view('content/admin/v_updadmin', $data);
		$this->load->view('template/t_footer');
	}
	public function procupd()
	{

		$id_admin = $this->input->post('id_admin');
		$username = $this->input->post('username');
		$nama_admin = $this->input->post('nama_admin');


		$this->db->trans_start();
		$this->m_admin->updadmin($id_admin, $username, $nama_admin);
		$this->db->trans_complete();

		redirect('admin');
	}
	public function delete()
	{

		$id_admin = $this->uri->segment("3");
		$this->m_admin->deladmin($id_admin);

		redirect('admin');
	}
}
