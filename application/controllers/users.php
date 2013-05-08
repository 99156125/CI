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
		$this->data["content"] =   $this->load->view("users/index" , $data  ,true  );

		$this->load->view("layout/index" , $this->data );
	}

	public function add (){
		$this->data["content"] =   $this->load->view("users/add" , null ,true  );
		$this->load->view("layout/index" , $this->data );
	}

	public function create(){
		$data = $this->input->post();
		$this->load->model('User_model' , 'user');
		$res = $this->user->create($data);
		
		if ($res) {
			redirect("users/index");
		}

	}
	
	public function delete (){
		$this->data["content"] =   $this->load->view("users/delete" , null ,true  );
		$this->load->view("layout/index" , $this->data );
		$query = $this->db->get('users');
	}
/* 	
	public function cut(){
	//列表 刪除
	$data = $this->input->post();
	$this->load->model('User_model' , 'user');
	$this->db->where(array('name' => $data));
    $this->db->delete('users'); 
  
	if ($res) {
			redirect("users/index");
		}
	} */
	
		
/* 	public function edit (){
		$this->data["content"] =   $this->load->view("users/edit" , null ,true  );
		$this->load->view("layout/index" , $this->data );
	}
	
	public function update(){
		$data = $this->input->post();
		$this->load->model('User_model' , 'user');
		$res = $this->user->update($data);
		if ($res) {
			redirect("users/index");
		}

	} */
	

}