<?php 	
require_once 'core.php';
if($_POST) {	
    $productid = $_POST['productid'];
    $productDescription = $_POST['productDescription'];
    $sql = "INSERT INTO productDescription(descriptionid, productid, productDescription) VALUES (DEFAULT, '$productid', '$productDescription')";
    if ($connect->query($sql) === TRUE) {
		echo "<p>Product Description added successfully</p>";
	} else {
		echo "Error: " . $Query . "<br>" . $conn->error;
	}
	$connect->close();
	echo " you will be redirected to dashboard page in 3 seconds....";
    header( "Refresh:3; url=/inventory/dashboard.php", true, 303);

}

?>