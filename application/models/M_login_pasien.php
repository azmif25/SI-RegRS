<?php

class M_login_pasien extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function status($no_rmk, $nik)
    {
        $query = $this->db->query('SELECT * FROM tujuan_berobat INNER JOIN pasien ON tujuan_berobat.nik = pasien.nik
                                INNER JOIN poli ON tujuan_berobat.id_poli = poli.id_poli  INNER JOIN verifikasi_rawat 
                                ON tujuan_berobat.id_verif = verifikasi_rawat.id_verif INNER JOIN rekam_medis ON pasien.no_rmk = rekam_medis.no_rmk
        						WHERE pasien.no_rmk = ' . $no_rmk . ' AND pasien.nik = ' . $nik . '');
        // $res = $query->row();
        return $query;
    }

    public function aktivasi($no_rmk, $nik)
    {
        return $this->db->query('SELECT * FROM pasien INNER JOIN aktivasi_pasien ON aktivasi_pasien.id_aktivasi = pasien.id_aktivasi
                                WHERE pasien.no_rmk = ' . $no_rmk . ' AND pasien.nik = ' . $nik . '');
    }

    public function rekam_medis($no_rmk, $nik)
    {
        $query = $this->db->query("SELECT * FROM pasien INNER JOIN rekam_medis ON rekam_medis.no_rmk = pasien.no_rmk
                                    WHERE pasien.no_rmk = " . $no_rmk . " AND pasien.nik = " . $nik . "");

        return $query;
    }
}
