<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book_model extends CI_Model
{

	var $table = 'user';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


public function get_all_books()
{
$this->db->from('user');
$query=$this->db->get();
return $query->result();
}


	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_user',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function book_add($data)
	{
		return $this->db->insert('user', $data);
	}

	public function book_update($id_user, $data)
	{
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $data);
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete($this->table);
	}


}
