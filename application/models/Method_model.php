<?php


class Method_model extends CI_Model
{
	public function __construct()
	{
		$this -> load -> database();
	}

	public function get_methods()
	{
		$this -> db -> order_by('title');
		$methods = $this -> db -> get('methods');

		return $methods -> result_array();
	}
}
