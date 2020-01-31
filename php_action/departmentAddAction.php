<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
    $departmentName = $_POST['departmentName'];
    $sql = "INSERT INTO department(departmentId, departmentName) VALUES (DEFAULT, '$departmentName')";
    

    // if ($connect->query($sql) === TRUE) {
	// 	echo "<p>New Department added successfully</p>";
	// } else {
	// 	echo "Error: " . $Query . "<br>" . $conn->error;
	// }
	// $connect->close();
	// echo "Your add has been submited, you will be redirected to dashboard page in 3 seconds....";
    // header( "Refresh:3; url=/inventory/dashboard.php", true, 303);

	
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
?>