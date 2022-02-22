<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_poli extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_current_page($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->order_by('nama_poli', 'asc');
		$query = $this->db->get('poli');
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
		return $this->db->count_all('poli');
	}

	public function get_poli_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('poli');
		$this->db->like('nama_poli', $keyword);
		return $this->db->get()->result();
	}

	public function inqpoli()
	{
		$query = $this->db->query('SELECT * from poli ORDER BY nama_poli ASC');

		return $query->result();
	}

	public function inspoli($nama_poli)
	{

		//insert new data
		$data = array(
			'nama_poli' => $nama_poli
		);

		if ($this->db->insert('poli', $data)) {
			return true;
		}
	}


	public function updpoli($id_poli, $nama_poli)
	{
		$data = array(
			'id_poli' => $id_poli,
			'nama_poli' => $nama_poli
		);

		if ($this->db->update('poli', $data, array('id_poli' => $id_poli))) {
			return true;
		}
	}
	public function detailpoli($id_poli)
	{
		$query = $this->db->query('SELECT * FROM poli
									WHERE poli.id_poli="' . $id_poli . '"');

		$res = $query->row();
		return $res;
	}

	public function delpoli($id_poli)
	{
		if ($this->db->delete('poli', 'id_poli="' . $id_poli . '"')) {
			return true;
		}
	}
}
