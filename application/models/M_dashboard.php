<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_dashboard extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}
	public function detaildb($nik)
	{
		$query = $this->db->query('SELECT * FROM tujuan_berobat INNER JOIN pasien ON tujuan_berobat.nik = pasien.nik INNER JOIN rekam_medis ON rekam_medis.no_rmk = pasien.no_rmk
		INNER JOIN poli ON tujuan_berobat.id_poli = poli.id_poli  INNER JOIN verifikasi_rawat ON tujuan_berobat.id_verif = verifikasi_rawat.id_verif
									WHERE pasien.nik=' . $nik . '');

		$res = $query->row();
		return $res;
	}
}
