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
	echo "<p>New Transaction added successfully</p>";
} else {
	echo "Error: " . $Query . "<br>" . $conn->error;
}
$connect->close();
echo "<p>you will be redirected to dashboard page in 3 seconds....</p>";
header( "Refresh:3; url=/inventory/dashboard.php", true, 303);
}