<?php

class Student extends CI_Controller {

  function __construct()
  {
    parent::__construct(); 
    $this->load->helper('url');
  }
  
  function index()
  {
    //首頁
    $data['title'] = "Classroom: Home Page";
    $data['headline'] = "Welcome to the Classroom Management System";
    $data['include'] = 'student_index';
    $this->load->view('template', $data);
  }
  

  function add()
  {
  //顯示新增表格
    $this->load->helper('form');
    $data['title'] = "Classroom: Add Student";
    $data['headline'] = "Add a New Student";
    $data['include'] = 'student_add';
    $this->load->view('template', $data);
  }

   function create()
  {
    $this->load->model('MStudent','',TRUE);
    $this->MStudent->addStudent($_POST);
    redirect('student/add','refresh');
  }
  
  function listing()
  {
    $this->load->library('table');
    $this->load->model('MStudent','',TRUE);
    $students_qry = $this->MStudent->listStudents();

    $tmpl = array (
      'table_open' => '<table border="0" cellpadding="3" cellspacing="0">',
      'heading_row_start' => '<tr bgcolor="#66cc44">',
      'row_start' => '<tr bgcolor="#dddddd">' 
      );
    $this->table->set_template($tmpl); 
    $this->table->set_empty("&nbsp;"); 
    $this->table->set_heading('ID', '| Name','');
	
	$data['students_qry'] = $students_qry;
    $table_row = array();
    foreach ($students_qry->result() as $student)
    {
     $table_row = NULL;
	 $table_row[] = $student->id;
     $table_row[] = '| '.$student->name;
	 $table_row[] = '<nobr>' . 
        '| '.anchor('student/edit/' . $student->id, 'edit'). ' | ' .
        anchor('student/delete/' . $student->id, 'delete',
          "onClick=\" return confirm('Are you sure you want to delete ID: $student->id?')\"") .
        '</nobr>'; 
      // replaced above :: $table_row[] = anchor('student/edit/' . $student->id, 'edit');
     $this->table->add_row($table_row);
     
    }   
	             
    // display
    $data['title'] = "Classroom: Student Listing";
    $data['headline'] = "Student Listing";
    $data['include'] = 'student_listing';
	
    //$data['data_table'] = $students_table;
	//$students_table = $this->table->generate();
	
    $this->load->view('template', $data);
  
	
  }
  
  function edit()
  {
    $this->load->helper('form');

    $id = $this->uri->segment(3);
    $this->load->model('MStudent','',TRUE);
    $data['row'] = $this->MStudent->getStudent($id)->result(); 

	
    // display information for the view
    $data['title'] = "Classroom: Edit Student";
    $data['headline'] = "Edit Student Information";
    $data['include'] = 'student_edit'; 

    $this->load->view('template', $data); 
	
	
  }

  function update()
  {
    $this->load->model('MStudent','',TRUE);
    $this->MStudent->updateStudent($_POST['id'], $_POST);
    redirect('student/listing','refresh');
  }
  
  function delete()
  {
    $id = $this->uri->segment(3);
    
    $this->load->model('MStudent','',TRUE);
    $this->MStudent->deleteStudent($id);
    redirect('student/listing','refresh');
  }
  
  
  
}?>