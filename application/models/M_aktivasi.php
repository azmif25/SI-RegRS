<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_aktivasi extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function get_current_page($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->join('rekam_medis', 'rekam_medis.no_rmk = pasien.no_rmk');
        $this->db->join('aktivasi_pasien', 'aktivasi_pasien.id_aktivasi = pasien.id_aktivasi');
        $this->db->order_by('aktivasi_pasien.keterangan', 'desc');
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

    public function get_total()
    {
        return $this->db->count_all('aktivasi_pasien');
    }
    public function get_aktivasi_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->join('rekam_medis', 'rekam_medis.no_rmk = pasien.no_rmk');
        $this->db->join('aktivasi_pasien', 'aktivasi_pasien.id_aktivasi = pasien.id_aktivasi');
        $this->db->like('pasien.no_rmk', $keyword);
        return $this->db->get()->result();
    }
    public function get_aktivasi_keywordsh($keyword)
    {
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->join('rekam_medis', 'rekam_medis.no_rmk = pasien.no_rmk');
        $this->db->join('aktivasi_pasien', 'aktivasi_pasien.id_aktivasi = pasien.id_aktivasi');
        $this->db->like('aktivasi_pasien.tgl_insert', $keyword);
        return $this->db->get()->result();
    }
    public function get_current_rpage($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->join('rekam_medis', 'rekam_medis.no_rmk = pasien.no_rmk');
        $this->db->join('aktivasi_pasien', 'aktivasi_pasien.id_aktivasi = pasien.id_aktivasi');
        $this->db->join('admin', 'admin.id_admin = aktivasi_pasien.id_admin');
        $this->db->order_by('nama_pasien', 'asc');
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
        return $this->db->count_all('aktivasi_pasien');
    }
    public function inqraktivasi($daritgl, $ketgl)
    {
        $query = $this->db->query("SELECT * from pasien INNER JOIN rekam_medis ON rekam_medis.no_rmk = pasien.no_rmk
                                    INNER JOIN aktivasi_pasien ON aktivasi_pasien.id_aktivasi = pasien.id_aktivasi INNER JOIN 
                                    admin ON admin.id_admin = aktivasi_pasien.id_admin WHERE aktivasi_pasien.tgl_aktivasi BETWEEN '$daritgl' AND '$ketgl'");

        return $query->result();
    }
    public function updaktivasi($id_aktivasi, $id_admin, $tgl_aktivasi)
    {
        $data = array(
            'id_aktivasi' => $id_aktivasi,
            'id_admin' => $id_admin,
            'tgl_aktivasi' => $tgl_aktivasi,
            'keterangan' => "Teraktivasi"
        );

        if ($this->db->update('aktivasi_pasien', $data, array('id_aktivasi' => $id_aktivasi))) {
            return true;
        }
    }
}
