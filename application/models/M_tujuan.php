<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_tujuan extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function inqtujuan()
	{
		$query = $this->db->query('SELECT * FROM tujuan_berobat INNER JOIN pasien ON tujuan_berobat.no_rmk = pasien.no_rmk
									INNER JOIN poli ON tujuan_berobat.id_poli = poli.id_poli INNER JOIN verifikasi_rawat ON verifikasi_rawat.id_verif = tujuan_berobat.id_verif
									ORDER BY verifikasi_rawat.status = "Menunggu" DESC, tujuan_berobat.tgl_tujuan ASC');

		return $query->result();
	}

	public function get_current_page($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->order_by('tujuan_berobat.tgl_tujuan', 'desc');
		$this->db->select('*');
		$this->db->from('tujuan_berobat');
		$this->db->join('pasien', 'pasien.nik = tujuan_berobat.nik');
		$this->db->join('poli', 'poli.id_poli = tujuan_berobat.id_poli');
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
		return $this->db->count_all('tujuan_berobat');
	}
	public function inqrrujukan($daritgl, $ketgl)
	{
		$query = $this->db->query("SELECT * FROM tujuan_berobat INNER JOIN pasien ON tujuan_berobat.nik = pasien.nik 
									INNER JOIN rekam_medis ON rekam_medis.no_rmk = pasien.no_rmk INNER JOIN poli ON 
									tujuan_berobat.id_poli = poli.id_poli WHERE tujuan_berobat.tgl_tujuan BETWEEN '$daritgl' AND '$ketgl'
									 ORDER BY tujuan_berobat.tgl_tujuan DESC");

		return $query->result();
	}

	public function instujuan($nik, $bukti, $tgl_tujuan, $id_poli, $id_verif)
	{
		$data = array(
			'nik' => $nik,
			'bukti' => $bukti,
			'tgl_tujuan' => date('Y-m-d', strtotime($tgl_tujuan)),
			'id_poli' => $id_poli,
			'id_verif' => $id_verif

		);

		$dataverif = array(
			'id_verif' => $id_verif
		);

		if ($this->db->insert('verifikasi_rawat', $dataverif)) {
			$this->db->insert('tujuan_berobat', $data);
			return true;
		}
	}

	public function updtujuan($id_tujuan, $bukti, $tgl_tujuan, $id_poli)
	{
		$data = array(
			'id_tujuan' => $id_tujuan,
			'bukti' => $bukti,
			'id_poli' => $id_poli,
			'tgl_tujuan' => date('Y-m-d', strtotime($tgl_tujuan)),

		);

		if ($this->db->update('tujuan_berobat', $data, array('id_tujuan' => $id_tujuan))) {
			return true;
		}
	}
	public function detailtujuan($id_tujuan)
	{
		$query = $this->db->query("SELECT * FROM tujuan_berobat INNER JOIN pasien ON tujuan_berobat.nik = pasien.nik INNER JOIN rekam_medis ON rekam_medis.no_rmk = pasien.no_rmk
		INNER JOIN poli ON tujuan_berobat.id_poli = poli.id_poli  INNER JOIN aktivasi_pasien ON aktivasi_pasien.id_aktivasi = pasien.id_aktivasi
									WHERE id_tujuan='" . $id_tujuan . "'");

		$res = $query->row();
		return $res;
	}

	public function deltujuan($id_tujuan)
	{
		if ($this->db->delete('tujuan_berobat', 'id_tujuan="' . $id_tujuan . '"')) {
			return true;
		}
	}
}
