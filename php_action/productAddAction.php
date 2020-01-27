<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
    $productName = $_POST['productName'];
    $sql = "INSERT INTO product(productid, productName) VALUES (DEFAULT, '$productName')";
    

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