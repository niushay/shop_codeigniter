<?php


class Food_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function createFood($data)
	{
		$this->db->insert('foods', $data);
	}

	public function get_foods()
	{
		$this->db->order_by('created_at', 'desc');
		$foods = $this -> db -> get('foods');

		return $foods -> result_array();
	}

	public function searchFood()
	{
		$data = array(
			'title' => $this -> input -> post('title_search'),
			'category_id' => $this -> input -> post('category_search'),
			'type_id' => $this -> input -> post('type_search'),
			'cooking_method' => $this -> input -> post('method_search'),
		);

		$this->db->select('*');
		$this->db->from('foods');
		$this->db->like('title', $data['title']);

		if($data['category_id'] != ''){
			$this->db->where('category_id', $data['category_id']);
		}
		if($data['type_id'] != ''){
			$this->db->where('type_id', $data['type_id']);
		}

		if($data['cooking_method'] != ''){
			$this->db->where('cooking_method', $data['cooking_method']);
		}

		$query = $this->db->get()->result_array();

		return $query;
	}
}
