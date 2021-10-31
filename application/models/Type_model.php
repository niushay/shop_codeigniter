<?php


class Type_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_types()
	{
		$this->db->order_by('title');
		$types = $this->db->get('types');

		return $types -> result_array();
	}

}
