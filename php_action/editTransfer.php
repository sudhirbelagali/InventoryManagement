<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$transferId = $_POST['transferId'];
	$productId = $_POST['productId']; 
	$descriptionId = $_POST['descriptionId'];
	$departmentId = $_POST['departmentId'];
	$quantity = $_POST['editQuantity'];
	$date = $_POST['date'];
	$remarks = $_POST['editRemarks'];
				
	$sql = "UPDATE transfers SET productid = $productId,
								productDescription = '$descriptionId',
								department = $departmentId,
								quantity = '$quantity',
								dated = '$date',
								remarks = '$remarks'
								WHERE transferId = $transferId ";

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
 
