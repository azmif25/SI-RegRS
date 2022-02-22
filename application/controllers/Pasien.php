<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pasien extends CI_Controller
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
        $this->load->model('m_pasien');
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
        $limit_page = 5;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total = $this->m_pasien->get_total();

        if ($total > 0) {
            // get current page records
            $params['results'] = $this->m_pasien->get_current_page($limit_page, $page * $limit_page);

            $config['base_url'] = base_url() . '/index.php/pasien/index';
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

        // $data['recs'] = $this->m_pasien->inqpasien();
        $data['page'] = "pasien";
        $data['treeview'] = "master";

        //load template
        $this->load->view('template/t_header');
        $this->load->view('template/t_sidebar', $params);
        $this->load->view('content/pasien/v_idxpasien', $params);
        $this->load->view('template/t_footer');
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['results'] = $this->m_pasien->get_pasien_keyword($keyword);

        //load template
        $this->load->view('template/t_header');
        $this->load->view('template/t_sidebar');
        $this->load->view('content/pasien/v_idxpasien', $data);
        $this->load->view('template/t_footer');
    }

    public function cetak()
    {

        $data['recs'] = $this->m_pasien->inqpasien();
        $data['page'] = "pasien";
        $data['treeview'] = "master";

        //load template
        $this->load->view('content/pasien/v_ctkpasien', $data);
    }

    public function detail()
    {

        $no_rmk = $this->uri->segment('3');

        $data['no_rmk'] = $this->m_pasien->detail($no_rmk)->no_rmk;
        $data['nik'] = $this->m_pasien->detail($no_rmk)->nik;
        $data['nama_pasien'] = $this->m_pasien->detail($no_rmk)->nama_pasien;
        $data['jk'] = $this->m_pasien->detail($no_rmk)->jk;
        $data['tempat_lahir'] = $this->m_pasien->detail($no_rmk)->tempat_lahir;
        $data['tanggal_lahir'] = $this->m_pasien->detail($no_rmk)->tanggal_lahir;
        $data['alamat'] = $this->m_pasien->detail($no_rmk)->alamat;
        $data['agama'] = $this->m_pasien->detail($no_rmk)->agama;
        $data['telepon'] = $this->m_pasien->detail($no_rmk)->telepon;
        $data['email'] = $this->m_pasien->detail($no_rmk)->email;
        $data['no_bpjs'] = $this->m_pasien->detail($no_rmk)->no_bpjs;
        $data['jenis_pasien'] = $this->m_pasien->detail($no_rmk)->jenis_pasien;

        //load template
        $this->load->view('template/t_header');
        $this->load->view('template/t_sidebar');
        $this->load->view('content/pasien/v_dtlpasien', $data);
        $this->load->view('template/t_footer');
    }
    public function addnew()
    {
        //load template
        $this->load->view('template/t_header');
        $this->load->view('template/t_sidebar');
        $this->load->view('content/pasien/v_addpasien');
        $this->load->view('template/t_footer');
    }
    public function update()
    {

        $no_rmk = $this->uri->segment('3');

        $data['no_rmk'] = $this->m_pasien->detail($no_rmk)->no_rmk;
        $data['nik'] = $this->m_pasien->detail($no_rmk)->nik;
        $data['nama_pasien'] = $this->m_pasien->detail($no_rmk)->nama_pasien;
        $data['jk'] = $this->m_pasien->detail($no_rmk)->jk;
        $data['tempat_lahir'] = $this->m_pasien->detail($no_rmk)->tempat_lahir;
        $data['tanggal_lahir'] = $this->m_pasien->detail($no_rmk)->tanggal_lahir;
        $data['alamat'] = $this->m_pasien->detail($no_rmk)->alamat;
        $data['agama'] = $this->m_pasien->detail($no_rmk)->agama;
        $data['telepon'] = $this->m_pasien->detail($no_rmk)->telepon;
        $data['email'] = $this->m_pasien->detail($no_rmk)->email;
        $data['no_bpjs'] = $this->m_pasien->detail($no_rmk)->no_bpjs;
        $data['jenis_pasien'] = $this->m_pasien->detail($no_rmk)->jenis_pasien;

        // mengambil semua data yang ada di tabel kd_prodi
        // $data['prodirecs'] = $this->m_kdprodi->inqkdprodi();

        //load template
        $this->load->view('template/t_header');
        $this->load->view('template/t_sidebar');
        $this->load->view('content/pasien/v_updpasien', $data);
        $this->load->view('template/t_footer');
    }
    public function procupd()
    {

        $no_rmk = $this->input->post('no_rmk');
        $nik = $this->input->post('nik');
        $nama_pasien = $this->input->post('nama_pasien');
        $jk = $this->input->post('jk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $alamat = $this->input->post('alamat');
        $agama = $this->input->post('agama');
        $telepon = $this->input->post('telepon');
        $email = $this->input->post('email');
        $no_bpjs = $this->input->post('no_bpjs');
        $jenis_pasien = $this->input->post('jenis_pasien');

        $this->db->trans_start();
        $this->m_pasien->updpasien($no_rmk, $nik, $nama_pasien, $jk, $tempat_lahir, $tanggal_lahir, $alamat, $agama, $telepon, $email, $no_bpjs, $jenis_pasien);
        $this->db->trans_complete();

        redirect('pasien');
    }
    public function delete()
    {

        $no_rmk = $this->uri->segment('3');
        $this->m_pasien->delrekmed($no_rmk);
        $this->m_pasien->delpasien($no_rmk);

        redirect('pasien');
    }
    public function procadd()
    {

        $no_rmk = $this->input->post('no_rmk');
        $no_bpjs = $this->input->post('no_bpjs');
        $jenis_pasien = $this->input->post('jenis_pasien');
        $nik = $this->input->post('nik');
        $nama_pasien = $this->input->post('nama_pasien');
        $jk = $this->input->post('jk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $alamat = $this->input->post('alamat');
        $agama = $this->input->post('agama');
        $telepon = $this->input->post('telepon');
        $email = $this->input->post('email');
        $id_aktivasi = $this->input->post('id_aktivasi');
        $id_admin = $this->input->post('id_admin');

        $this->db->trans_start();
        $this->m_pasien->insrekmed($no_rmk, $no_bpjs, $jenis_pasien);
        $this->m_pasien->inspasien($no_rmk, $nik, $nama_pasien, $jk, $tempat_lahir, $tanggal_lahir, $alamat, $agama, $telepon, $email, $id_aktivasi, $id_admin);
        $this->db->trans_complete();

        redirect('pasien');
    }

    public function aktivasi()
    {
        $no_rmk = $this->input->post('no_rmk');
        $nik = $this->input->post('nik');

        $this->db->trans_start();
        $this->m_pasien->aktpasien($no_rmk, $nik);
        $this->db->trans_complete();

        redirect('pasien');
    }
}
