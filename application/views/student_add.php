<?php 

echo form_open('student/create');
echo "<TABLE BORDER='0'";
// an array of the fields in the student table
$field_array = array('ID','NAME');
foreach($field_array as $field)
{
  
  echo '<p>' . $field.': ';
  echo form_input(array('name' => $field)) . '</p>';
}

// not setting the value attribute omits the submit from the $_POST array
echo form_submit('', 'add'); 

echo form_close();
?>