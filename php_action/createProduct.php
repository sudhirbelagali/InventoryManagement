<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
	$productName = $_POST['productName'];
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
				
$sql = "INSERT INTO product(productid, productName, productDescription, quantity, rate, cost, SupplierDetails, dateofreceipt, receiptnumber, referencenumber, type, remarks) VALUES (DEFAULT, '$productName', '$productDescription','$quantity', '$rate', '$cost', '$SupplierDetails', '$dateofreceipt','$receiptnumber','$referencenumber','$typeofproduct','$remarks')";
if($connect->query($sql) === TRUE) {

$valid['success'] = true;
$valid['messages'] = "Successfully Added";
exit(0);   
} else {
$valid['success'] = false;
$valid['messages'] = "Error while adding the product";
}
$connect->close();
echo json_encode($valid); 
header("Refresh: 5;url=/inventory/dashboard.php");
} // /if $_POST
