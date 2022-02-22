<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_admin extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}
	public function inqadmin()
	{
		$query = $this->db->query('SELECT * from admin');

		return $query->result();
	}
	public function insadmin($username, $password, $nama_admin)
	{

		//insert new data
		$data = array(
			'username' => $username,
			'password' => $password,
			'nama_admin' => $nama_admin
		);

		if ($this->db->insert('admin', $data)) {
			return true;
		}
	}
	public function updadmin($id_admin, $username, $nama_admin)
	{
		$data = array(
			'id_admin' => $id_admin,
			'username' => $username,
			'nama_admin' => $nama_admin
		);

		if ($this->db->update('admin', $data, array('id_admin' => $id_admin))) {
			return true;
		}
	}
	public function detailadmin($id_admin)
	{
		$query = $this->db->query('SELECT * FROM admin
									WHERE admin.id_admin="' . $id_admin . '"');

		$res = $query->row();
		return $res;
	}

	public function deladmin($id_admin)
	{
		if ($this->db->delete('admin', 'id_admin="' . $id_admin . '"')) {
			return true;
		}
	}
}
