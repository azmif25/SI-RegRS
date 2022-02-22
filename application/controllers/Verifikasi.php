<?php
defined('BASEPATH') or exit('No direct script access allowed');

class verifikasi extends CI_Controller
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
        $this->load->helper('url', 'download');
        $this->load->model('m_verifikasi');
        $this->load->model('m_tujuan');
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
        $total = $this->m_verifikasi->get_total();

        if ($total > 0) {
            // get current page records
            $params['results'] = $this->m_verifikasi->get_current_page($limit_page, $page * $limit_page);

            $config['base_url'] = base_url() . 'verifikasi/index';
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
        // $data['recs'] = $this->m_verifikasi->inqverifikasi();

        //load template
        $this->load->view('template/t_header');
        $this->load->view('template/t_sidebar');
        $this->load->view('content/verifikasi/v_idxverifikasi', $params);
        $this->load->view('template/t_footer');
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['results'] = $this->m_verifikasi->get_verifikasi_keyword($keyword);

        //load template
        $this->load->view('template/t_header');
        $this->load->view('template/t_sidebar');
        $this->load->view('content/verifikasi/v_idxverifikasi', $data);
        $this->load->view('template/t_footer');
    }
    public function showed()
    {
        $keyword = $this->input->post('tanggal');
        $data['results'] = $this->m_verifikasi->get_verifikasi_keywordsh($keyword);

        //load template
        $this->load->view('template/t_header');
        $this->load->view('template/t_sidebar');
        $this->load->view('content/verifikasi/v_idxverifikasi', $data);
        $this->load->view('template/t_footer');
    }
    public function rekap()
    {
        //set params
        $params = array();
        //set records per page
        $limit_page = 6;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total = $this->m_verifikasi->get_rtotal();

        if ($total > 0) {
            // get current page records
            $params['results'] = $this->m_verifikasi->get_current_rpage($limit_page, $page * $limit_page);

            $config['base_url'] = base_url() . 'verifikasi/rekap';
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

        // $data['recs'] = $this->m_verifikasi->inqrverifikasi();

        //load template
        $this->load->view('template/t_header');
        $this->load->view('template/t_sidebar');
        $this->load->view('content/verifikasi/v_idxrverifikasi', $params);
        $this->load->view('template/t_footer');
    }

    public function cetak()
    {
        $daritgl = $this->input->post('dari_tanggal');
        $ketgl = $this->input->post('ke_tanggal');
        $data['recs'] = $this->m_verifikasi->inqrverifikasi($daritgl, $ketgl);

        //load template
        $this->load->view('content/verifikasi/v_ctkverifikasi', $data);
    }

    public function detail()
    {

        $id_tujuan = $this->uri->segment('3');

        $data['id_tujuan'] = $this->m_verifikasi->detailverifikasi($id_tujuan)->id_tujuan;
        $data['no_rmk'] = $this->m_verifikasi->detailverifikasi($id_tujuan)->no_rmk;
        $data['nama_pasien'] = $this->m_verifikasi->detailverifikasi($id_tujuan)->nama_pasien;
        $data['jenis_pasien'] = $this->m_verifikasi->detailverifikasi($id_tujuan)->jenis_pasien;
        $data['bukti'] = $this->m_verifikasi->detailverifikasi($id_tujuan)->bukti;
        $data['tgl_tujuan'] = $this->m_verifikasi->detailverifikasi($id_tujuan)->tgl_tujuan;
        $data['nama_poli'] = $this->m_verifikasi->detailverifikasi($id_tujuan)->nama_poli;
        $data['kode_booking'] = $this->m_verifikasi->detailverifikasi($id_tujuan)->kode_booking;
        $data['no_bpjs'] = $this->m_verifikasi->detailverifikasi($id_tujuan)->no_bpjs;

        //load template
        $this->load->view('template/t_header');
        $this->load->view('template/t_sidebar');
        $this->load->view('content/verifikasi/v_dtlverifikasi', $data);
        $this->load->view('template/t_footer');
    }
    public function addnew()
    {

        //load template
        $this->load->view('template/t_header');
        $this->load->view('template/t_sidebar');
        $this->load->view('content/verifikasi/v_addverifikasi');
        $this->load->view('template/t_footer');
    }
    public function setaktif()
    {

        $pertemuanid = $this->uri->segment('3');
        $this->m_verifikasi->setverifikasi($pertemuanid);

        redirect('verifikasi');
    }

    public function procaddverif()
    {
        $id_verif = $this->input->post('id_verif');
        $status = $this->input->post('status');
        $alasan_tolak = $this->input->post('alasan_tolak');
        $kode_booking = $this->input->post('kode_booking');
        $id_admin = $this->input->post('id_admin');

        $this->db->trans_start();
        $this->m_verifikasi->insverif($id_verif, $status, $alasan_tolak, $kode_booking, $id_admin);
        $this->db->trans_complete();

        redirect('verifikasi');
    }
    public function download_foto()
    {
        // $nama_file = $this->input->post('nama_file');
        $nama_file = $this->uri->segment('3');
        $path = file_get_contents(base_url() . "bukti/" . $nama_file);
        // force_download(base_url('assets/logo_ulin6.png'), NULL);
        // force_download(base_url('assets') . $nama_file, NULL);
        force_download($nama_file, $path);
    }
    public function delete()
    {

        $id_verif = $this->uri->segment('3');

        $this->m_tujuan->deltujuan($id_verif);
        $this->m_verifikasi->delverifikasi($id_verif);

        redirect('tujuan/rrujukan');
    }
}
