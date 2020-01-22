<?php 	
require_once 'core.php';
if($_POST) {	
    $productName = $_POST['productName'];
    $sql = "INSERT INTO product(productid, productName) VALUES (DEFAULT, '$productName')";
    

    if ($connect->query($sql) === TRUE) {
		echo "<p>New Product added successfully</p>";
	} else {
		echo "Error: " . $Query . "<br>" . $conn->error;
	}
	$connect->close();
	echo " you will be redirected to dashboard page in 3 seconds....";
    header( "Refresh:3; url=/inventory/dashboard.php", true, 303);

}

?>