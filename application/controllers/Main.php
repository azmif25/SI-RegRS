<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('siswa_model');
    }

    public function index()
    {
        $data['siswa'] = $this->siswa_model->view_row();
        $this->load->view('preview', $data);
    }

    public function cetak()
    {
        ob_start();
        $data['siswa'] = $this->siswa_model->view_row();
        $this->load->view('print', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require './assets/html2pdf/autoload.php';

        $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Siswa.pdf', 'D');
    }
}
