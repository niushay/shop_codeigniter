<?php


class Category_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_categories()
	{
		$this->db->order_by('title');
		$categories = $this->db->get('categories');

		return $categories -> result_array();
	}

	public function get_category_by_id($category_id)
	{
		$this->db->select('title');
		$this->db->from('categories');
		$this->db->where('id', $category_id);
		$query = $this->db->get()->result_array();

		return $query[0]['title'];
	}

}
