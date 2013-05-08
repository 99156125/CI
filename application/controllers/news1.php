<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class news extends CI_Controller {

//		public function index()
//	{
//		$this->load->view('news','insert');
//	}
public function insert(){
$A= array('I' => 'my');
$this->load->view('0410.html', $A);
}
	
	//fuction add 去echo'A'會印出'a'
	/*public function add(){
	$B = array('A'=>'a');
	$this->load->view('0410add.html', $B);
	}*/
	
	
	public function add2($x=null){
	$C['x'] =$x;
	$this->load->view('0410add.html', $C);
	}
	public function delete($d){
	$D[] = array('A','B','C');
	$D['d'] =$d;
	}
	public function edit($blog_id, $title, $comment){		
	echo "edit:".$blog_id.$title.$comment;
	}
	
	
	
}



?>