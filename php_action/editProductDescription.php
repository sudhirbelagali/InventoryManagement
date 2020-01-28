<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$productId = $_POST['editProductId'];
	//$productName = $_POST['editProductName']; 
	$productDescription = $_POST['editProductDescription'];

				
	$sql = "UPDATE productDescription SET productDescription = '$productDescription' WHERE productid = $productId ";

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
 
