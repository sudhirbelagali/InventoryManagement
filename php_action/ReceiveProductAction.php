<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
	$productid= $_POST['productName'];
	//$productName = $_POST['productName'];
	$productDescription = $_POST['productDescription'];
	$quantity = $_POST['quantity'];
	$rate = $_POST['rate'];
	$cost = $_POST['cost'];
	$SupplierDetails = $_POST['SupplierDetails'];
	$dateofreceipt = $_POST['dateofreceipt'];
	$receiptnumber = $_POST['receiptnumber'];
	$referencenumber = $_POST['referencenumber'];
	$typeofproduct = $_POST['type'];
	$remarks = $_POST['remarks'];
				
$sql = "INSERT INTO receivedProducts(receiveId, productid, productDescription, quantity, rate, cost, SupplierDetails, dateofreceipt, receiptnumber, referencenumber, type, remarks) VALUES (DEFAULT, '$productid', $productDescription,'$quantity', '$rate', '$cost', '$SupplierDetails', '$dateofreceipt','$receiptnumber','$referencenumber','$typeofproduct','$remarks')";
if ($connect->query($sql) === TRUE) {
	echo "<script>alert('Successfully Added!');</script>";
	header("Refresh:0; url=/inventory/ReceiveProduct.php", true, 30);
	header("Refresh:0");
} else {
	echo "<script>alert('Error while adding the product!');</script>";
	header("Refresh:0; url=/inventory/ReceiveProduct.php", true, 30);
	header("Refresh:0");
}

$connect->close();
}