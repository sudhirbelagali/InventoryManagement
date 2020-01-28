<?php 	
require_once 'core.php';
if($_POST) {	
    $productid = $_POST['productid'];
    $productDescription = $_POST['productDescription'];
    $sql = "INSERT INTO productDescription(descriptionid, productid, productDescription) VALUES (DEFAULT, '$productid', '$productDescription')";
    if ($connect->query($sql) === TRUE) {
		echo "<script>alert('Successfully Added!');</script>";
		header("Refresh:0; url=/inventory/dashboard.php", true, 30);
	} else {
		echo "<script>alert('Error while adding the product!');</script>";
		header("Refresh:0; url=/inventory/dashboard.php", true, 30);
	}
	$connect->close();

}

?>