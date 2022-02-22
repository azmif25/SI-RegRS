<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pembatalan extends CI_Controller
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
        $this->load->model('m_batal');
        $this->load->model('m_dashboard');
        if ($this->session->userdata('is_login') == FALSE) {

            redirect('/loginpasien', 'refresh');
        }
    }
    public function index()
    {

        // $data['recs'] = $this->m_tujuan->inqtujuan();
        $nik = $this->session->nik;
        if ($this->session->role == 'pasien') {
            $data['id_tujuan'] = $this->m_dashboard->detaildb($nik)->id_tujuan;
            $data['id_verif'] = $this->m_dashboard->detaildb($nik)->id_verif;
            $data['status'] = $this->m_dashboard->detaildb($nik)->status;
            //load template
            $this->load->view('template/t_header');
            $this->load->view('template/t_sidebar', $data);
            $this->load->view('content/pembatalan/v_idxpembatalan', $data);
            $this->load->view('template/t_footer');
        } else {
            redirect('dashboard');
        }
    }

    public function rekap()
    {
        if ($this->session->role != 'pasien') {
            //set params
            $params = array();
            //set records per page
            $limit_page = 6;
            $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
            $total = $this->m_batal->get_rtotal();

            if ($total > 0) {
                // get current page records
                $params['results'] = $this->m_batal->get_current_rpage($limit_page, $page * $limit_page);

                $config['base_url'] = base_url() . 'pembatalan/rekap';
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
            $this->load->view('content/pembatalan/v_idxrpembatalan', $params);
            $this->load->view('template/t_footer');
        } else {
            redirect('dashboard');
        }
    }
    public function procadd()
    {
        //tampung data dari form
        // $no_rmk = $this->session->no_rmk;

        if ($this->session->role == 'pasien') {
            $alasan_batal = $this->input->post('alasan_batal');
            $id_tujuan = $this->input->post('id_tujuan');
            $id_verif = $this->input->post('id_verif');

            $this->db->trans_start();
            $this->m_batal->inspembatalan($alasan_batal, $id_tujuan, $id_verif);
            $this->db->trans_complete();

            redirect('dashboard');
        } else {
            redirect('dashboard');
        }
    }

    public function cetak()
    {
        if ($this->session->role != 'pasien') {

            $daritgl = $this->input->post('dari_tanggal');
            $ketgl = $this->input->post('ke_tanggal');
            $data['recs'] = $this->m_batal->inqpembatalan($daritgl, $ketgl);

            //load template
            $this->load->view('content/pembatalan/v_ctkpembatalan', $data);
        } else {
            redirect('dashboard');
        }
    }
}
