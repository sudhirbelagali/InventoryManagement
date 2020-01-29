<?php 	
require_once 'core.php';
$valid['success'] = array('success' => false, 'messages' => array());
if($_POST) {
	$editReceiveId=$_POST['editReceiveId'];
	$editProductId = $_POST['editProductId'];
	$editProductDescription = $_POST['editProductDescription'];
	$editQuantity = $_POST['editQuantity'];
	$editRate = $_POST['editRate'];
	$editCost = $_POST['editCost'];
	$editSupplierDetails = $_POST['editSupplierDetails'];
	$editDateOfReceipt = $_POST['editDateOfReceipt'];
	$editReceiptNumber = $_POST['editReceiptNumber'];
	$editReferenceNumber = $_POST['editReferenceNumber'];
	$editTypeOfProduct = $_POST['editTypeOfProduct'];
	$editRemarks = $_POST['editRemarks'];
				
	$sql = "UPDATE receivedProducts SET receiveId = $editReceiveId,	productid = $editProductId,
	productDescription='$editProductDescription', quantity = '$editQuantity', rate = '$editRate',
	cost = '$editCost', SupplierDetails = '$editSupplierDetails', dateofreceipt = '$editDateOfReceipt',
	receiptnumber = '$editReceiptNumber', referencenumber = '$editReferenceNumber',
	type = '$editTypeOfProduct', remarks = '$editRemarks' WHERE productid = $editProductId;";

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
 

