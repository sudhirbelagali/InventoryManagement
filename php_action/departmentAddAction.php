<?php 	

require_once 'core.php';

if($_POST) {	
    $departmentName = $_POST['departmentName'];
    $sql = "INSERT INTO department(departmentId, departmentName) VALUES (DEFAULT, '$departmentName')";
    

    if ($connect->query($sql) === TRUE) {
		echo "<p>New Department added successfully</p>";
	} else {
		echo "Error: " . $Query . "<br>" . $conn->error;
	}
	$connect->close();
	echo "Your add has been submited, you will be redirected to dashboard page in 3 seconds....";
    header( "Refresh:3; url=/inventory/dashboard.php", true, 303);

}

?>