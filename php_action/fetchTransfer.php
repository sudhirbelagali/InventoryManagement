<?php 	

require_once 'core.php';

$sql = "SELECT * FROM transfers";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 while($row = $result->fetch_array()) {

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editDepartmentModalBtn" data-target="#editDepartmentModal" onclick="editDepartment('.$row[0].')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeDepartmentModal" id="removeDepartmentModalBtn" onclick="removeDepartment('.$row[0].')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
		$row[0],
		$row[1],
		$row[2],
		$row[3],
		$row[4],
		$row[5],
		$row[6],
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);