<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users extends CI_Controller {


	public function index($id = null){

		$this->load->model('User_model' , 'user');

		if ($id == null) {
			$data['users'] = $this->user->all() ;
		}else{
			$data['users'] = $this->user->get_user($id) ;
		}

		$data['id'] = $id ;
		$this->data["content"] =   $this->load->view("user/index" , $data  ,true  );

		$this->load->view("layout/index" , $this->data );
	}

	public function add (){
		$this->data["content"] =   $this->load->view("user/add" , null ,true  );
		$this->load->view("layout/index" , $this->data );
	}

	public function create(){
		$data = $this->input->post();
		$this->load->model('User_model' , 'user');
		$res = $this->user->create($data);
		if ($res) {
			redirect("user/index");
		}

	}
}