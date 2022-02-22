<?php
defined('BASEPATH') or exit('No direct script access allowed');

class informasi extends CI_Controller
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
        if ($this->session->userdata('is_login') == FALSE) {

            redirect('/loginadmin', 'refresh');
        } elseif ($this->session->role != 'pasien') {
            redirect('dashboard');
        }
    }

    public function fasilitas()
    {

        // $data['recs'] = $this->m_poli->inqpoli();
        $params['page'] = "informasi/fasilitas";
        $params['treeview'] = "master";

        //load template
        $this->load->view('template/t_header');
        $this->load->view('template/t_sidebar');
        $this->load->view('content/informasi/v_idxfasilitas');
        $this->load->view('template/t_footer');
    }

    public function prosedur()
    {

        // $data['recs'] = $this->m_poli->inqpoli();
        $params['page'] = "informasi/prosedur";
        $params['treeview'] = "master";

        //load template
        $this->load->view('template/t_header');
        $this->load->view('template/t_sidebar');
        $this->load->view('content/informasi/v_idxprosedur');
        $this->load->view('template/t_footer');
    }

    public function kojad()
    {

        // $data['recs'] = $this->m_poli->inqpoli();
        $params['page'] = "informasi/kojad";
        $params['treeview'] = "master";

        //load template
        $this->load->view('template/t_header');
        $this->load->view('template/t_sidebar');
        $this->load->view('content/informasi/v_idxkojad');
        $this->load->view('template/t_footer');
    }

    public function poli()
    {

        // $data['recs'] = $this->m_poli->inqpoli();
        $params['page'] = "informasi/poli";
        $params['treeview'] = "master";

        //load template
        $this->load->view('template/t_header');
        $this->load->view('template/t_sidebar');
        $this->load->view('content/informasi/v_idxpoli');
        $this->load->view('template/t_footer');
    }
}
