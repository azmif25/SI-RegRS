<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_pasien extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_current_page($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('nama_pasien', 'asc');
        $query = $this->db->get('pasien');
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
        return $this->db->count_all('pasien');
    }


    public function get_pasien_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->like('nama_pasien', $keyword);
        $this->db->or_like('no_rmk', $keyword);
        return $this->db->get()->result();
    }

    public function view_row()
    {
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->join('rekam_medis', 'rekam_medis.no_rmk = pasien.no_rmk');
        return $this->db->get()->result();
    }

    public function inqpasien()
    {
        $query = $this->db->query('SELECT * from pasien INNER JOIN rekam_medis ON pasien.no_rmk = rekam_medis.no_rmk');

        return $query->result();
    }
    public function detail($no_rmk)
    {
        $query = $this->db->query('SELECT * from pasien INNER JOIN rekam_medis ON pasien.no_rmk = rekam_medis.no_rmk where pasien.no_rmk = "' . $no_rmk . '"');

        $res = $query->row();
        return $res;
    }

    public function inspasien($no_rmk, $nik, $nama_pasien, $jk, $tempat_lahir, $tanggal_lahir, $alamat, $agama, $telepon, $email, $id_aktivasi, $id_admin)
    {

        //insert new data
        $data = array(
            'no_rmk' => $no_rmk,
            'nik' => $nik,
            'nama_pasien' => $nama_pasien,
            'jk' => $jk,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'agama' => $agama,
            'telepon' => $telepon,
            'email' => $email,
            'id_aktivasi' => $id_aktivasi
        );

        $dataaktivasi = array(
            'id_aktivasi' => $id_aktivasi,
            'keterangan' => 'Belum Teraktivasi',
            'id_admin' => $id_admin
        );

        if ($this->db->insert('aktivasi_pasien', $dataaktivasi)) {
            $this->db->insert('pasien', $data);
            return true;
        }
    }

    public function insrekmed($no_rmk, $no_bpjs, $jenis_pasien)
    {
        $data = array(
            'no_rmk' => $no_rmk,
            'no_bpjs' => $no_bpjs,
            'jenis_pasien' => $jenis_pasien
        );

        if ($this->db->insert('rekam_medis', $data)) {
            return true;
        }
    }

    public function aktpasien($no_rmk, $nik)
    {

        //insert new data
        $data = array(
            'no_rmk' => $no_rmk,
            'nik' => $nik,
            'status_aktivasi' => "Teraktivasi"
        );

        if ($this->db->update('pasien', $data, array('no_rmk' => $no_rmk))) {
            return true;
        }
    }

    public function updpasien($no_rmk, $nik, $nama_pasien, $jk, $tempat_lahir, $tanggal_lahir, $alamat, $agama, $telepon, $email, $no_bpjs, $jenis_pasien)
    {
        $data = array(
            'no_rmk' => $no_rmk,
            'nik' => $nik,
            'nama_pasien' => $nama_pasien,
            'jk' => $jk,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'agama' => $agama,
            'telepon' => $telepon,
            'email' => $email
        );

        $datarmk = array(
            'no_rmk' => $no_rmk,
            'jenis_pasien' => $jenis_pasien,
            'no_bpjs' => $no_bpjs
        );

        if ($this->db->update('pasien', $data, array('no_rmk' => $no_rmk)) && $this->db->update('rekam_medis', $datarmk, array('no_rmk' => $no_rmk))) {
            return true;
        }
    }

    public function delrekmed($no_rmk)
    {
        if ($this->db->delete('rekam_medis', 'no_rmk ="' . $no_rmk . '"')) {
            return true;
        }
    }

    public function delpasien($no_rmk)
    {
        if ($this->db->delete('pasien', 'no_rmk ="' . $no_rmk . '"')) {
            return true;
        }
    }
    public function setmahasiwa($nim)
    {
        $this->db->query('update mahasiswa set nim,namamahasiwa,fotomahasiwa where nim = ' . $nim);

        return true;
    }
}
