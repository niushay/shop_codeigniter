<?php

class Food extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('upload' );
	}

	public function index()
	{
		$data['title'] = 'index';
		$data['categories'] = $this -> category_model -> get_categories();
		$data['types'] = $this -> type_model -> get_types();
		$data['methods'] = $this -> method_model -> get_methods();
		$data['foods'] = $this -> food_model -> get_foods();

		$this->load->view('templates/header', $data);
		$this->load->view('foods/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function store()
	{
		$data['title'] = 'Create food';

//		Validation
		$this -> form_validation->set_rules('title', 'Title', 'required');
		$this -> form_validation->set_rules('writer', 'writer', 'required');
		$this -> form_validation->set_rules('calorie', 'Calorie', 'required');
		$this -> form_validation->set_rules('cooking_time', 'Cooking Time', 'required');
		$this -> form_validation->set_rules('preparation_time', 'Preparation Time', 'required');

//		If input data are validated insert them
		if ($this->form_validation->run() === false){
			$this->load->view('templates/header', $data);
			$this->load->view('foods/index', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$insert_data = array(
				'title' => $_POST['title'],
				'writer' => $_POST['writer'],
				'calorie' => $_POST['calorie'],
				'cooking_time' => $_POST['cooking_time'],
				'preparation_time' => $_POST['preparation_time'],
				'number_of_persons' => $_POST['numberOfPerson'],
				'instructions' => $_POST['instructions'],
				'category_id' => $_POST['category'],
				'type_id' => $_POST['type'],
				'cooking_method' => $_POST['cooking_method'],
				'image_url' => $this->upload_image()
			);

			$this->food_model->createFood($insert_data);

			//Return Response
			print_r(array(
				'status' => 1,
				'message' => 'Data has been inserted successfully'
			));
			return;
		}
		print_r(array(
			'status' => 0,
			'message' => 'Data inserted unsuccessfully!'
		));
		return;
	}

	function upload_image()
	{
		if(isset($_FILES["userfile"]["name"]))
		{
			$config['upload_path'] = './assets/images/foods';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('userfile'))
			{
				echo $this->upload->display_errors();
				$post_image = 'noimage.jpg';
			}
			else
			{
				$this->upload->data();
				$post_image = $_FILES["userfile"]["name"];
			}
			return $post_image;
		}
	}

	public function searchFood()
	{
		$food = $this->food_model->searchFood();
		$this->output->set_content_type('application/json');
		echo json_encode($food);
		return;
	}

	public function foodsList()
	{
		$foods = $this->food_model->get_foods();
		$this->output->set_content_type('application/json');
		echo json_encode($foods);

		return;
	}
}
