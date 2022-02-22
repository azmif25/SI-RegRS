<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_batal extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_current_rpage($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('pembatalan');
        $this->db->join('tujuan_berobat', 'tujuan_berobat.id_tujuan = pembatalan.id_tujuan');
        $this->db->join('pasien', 'pasien.nik = tujuan_berobat.nik');
        $this->db->join('poli', 'poli.id_poli = tujuan_berobat.id_poli');
        $this->db->order_by('tgl_tujuan', 'desc');
        $query = $this->db->get();
        $rows = $query->result();

        if ($query->num_rows() > 0) {
            foreach ($rows as $row) {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    public function get_rtotal()
    {
        return $this->db->count_all('pembatalan');
    }

    public function inqpembatalan($daritgl, $ketgl)
    {
        $query = $this->db->query("SELECT * from pembatalan INNER JOIN tujuan_berobat ON tujuan_berobat.id_tujuan = pembatalan.id_tujuan
                                    INNER JOIN pasien ON pasien.nik = tujuan_berobat.nik INNER JOIN poli ON poli.id_poli = tujuan_berobat.id_poli 
                                    WHERE tujuan_berobat.tgl_tujuan BETWEEN '$daritgl' AND '$ketgl' ORDER BY tujuan_berobat.tgl_tujuan DESC");

        return $query->result();
    }

    public function detail($nik)
    {
        $query = $this->db->query('SELECT * FROM tujuan_berobat INNER JOIN pasien ON tujuan_berobat.nik = pasien.nik INNER JOIN rekam_medis ON rekam_medis.no_rmk = pasien.no_rmk
		INNER JOIN poli ON tujuan_berobat.id_poli = poli.id_poli  INNER JOIN verifikasi_rawat ON tujuan_berobat.id_verif = verifikasi_rawat.id_verif
									WHERE pasien.nik=' . $nik . '');

        $res = $query->row();
        return $res;
    }

    public function inspembatalan($alasan_batal, $id_tujuan, $id_verif)
    {
        //insert new data
        $data = array(
            'alasan_batal' => $alasan_batal,
            'id_tujuan' => $id_tujuan
        );

        if ($this->db->insert('pembatalan', $data) && $this->db->delete('verifikasi_rawat', 'id_verif="' . $id_verif . '"')) {
            return true;
        }
    }
}
