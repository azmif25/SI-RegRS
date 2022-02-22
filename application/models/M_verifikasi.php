<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_verifikasi extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function get_current_page($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('verifikasi_rawat');
        $this->db->join('tujuan_berobat', 'tujuan_berobat.id_verif = verifikasi_rawat.id_verif');
        $this->db->join('pasien', 'pasien.nik = tujuan_berobat.nik');
        $this->db->join('poli', 'poli.id_poli = tujuan_berobat.id_poli');
        $this->db->order_by('verifikasi_rawat.status', 'desc');
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
        return $this->db->count_all('verifikasi_rawat');
    }
    public function get_current_rpage($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('verifikasi_rawat');
        $this->db->join('tujuan_berobat', 'tujuan_berobat.id_verif = verifikasi_rawat.id_verif');
        $this->db->join('admin', 'admin.id_admin = verifikasi_rawat.id_admin');
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
        return $this->db->count_all('verifikasi_rawat');
    }
    public function inqrverifikasi($daritgl, $ketgl)
    {
        $query = $this->db->query("SELECT * from verifikasi_rawat INNER JOIN tujuan_berobat ON verifikasi_rawat.id_verif = tujuan_berobat.id_verif 
        INNER JOIN pasien ON tujuan_berobat.nik = pasien.nik INNER JOIN poli ON tujuan_berobat.id_poli = poli.id_poli INNER JOIN admin ON admin.id_admin = verifikasi_rawat.id_admin
        WHERE tujuan_berobat.tgl_tujuan BETWEEN '$daritgl' AND '$ketgl' ORDER BY tujuan_berobat.tgl_tujuan DESC");

        return $query->result();
    }

    public function get_verifikasi_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('verifikasi_rawat');
        $this->db->join('tujuan_berobat', 'tujuan_berobat.id_verif = verifikasi_rawat.id_verif');
        $this->db->join('pasien', 'pasien.nik = tujuan_berobat.nik');
        $this->db->join('poli', 'poli.id_poli = tujuan_berobat.id_poli');
        $this->db->like('no_rmk', $keyword);
        return $this->db->get()->result();
    }

    public function get_verifikasi_keywordsh($keyword)
    {
        $this->db->select('*');
        $this->db->from('verifikasi_rawat');
        $this->db->join('tujuan_berobat', 'tujuan_berobat.id_verif = verifikasi_rawat.id_verif');
        $this->db->join('pasien', 'pasien.nik = tujuan_berobat.nik');
        $this->db->join('poli', 'poli.id_poli = tujuan_berobat.id_poli');
        $this->db->like('tujuan_berobat.tgl_tujuan', $keyword);
        return $this->db->get()->result();
    }

    public function insverif($id_verif, $status, $alasan_tolak, $kode_booking, $id_admin)
    {
        $data = array(
            'status' => $status,
            'alasan_tolak' => $alasan_tolak,
            'kode_booking' => $kode_booking,
            'id_admin' => $id_admin
        );

        if ($this->db->update('verifikasi_rawat', $data, array('id_verif' => $id_verif))) {
            return true;
        }
    }
    public function detailverifikasi($id_tujuan)
    {
        $query = $this->db->query("SELECT * FROM tujuan_berobat INNER JOIN pasien ON tujuan_berobat.nik = pasien.nik INNER JOIN rekam_medis ON rekam_medis.no_rmk = pasien.no_rmk
		INNER JOIN poli ON tujuan_berobat.id_poli = poli.id_poli  INNER JOIN verifikasi_rawat ON tujuan_berobat.id_verif = verifikasi_rawat.id_verif
									WHERE id_tujuan='" . $id_tujuan . "'");

        $res = $query->row();
        return $res;
    }

    public function delverifikasi($id_verif)
    {
        if ($this->db->delete('verifikasi_rawat', 'id_verif="' . $id_verif . '"')) {
            return true;
        }
    }
}
