<?php 	
require_once 'core.php';
if($_POST) {	
	$productid= $_POST['product'];
    $productDescription = $_POST['productDescription'];
    $department = $_POST['department'];
    $quantity = $_POST['quantity'];
    $dated = $_POST['date'];
	$remarks = $_POST['remarks'];
				
$sql = "INSERT INTO transfers(transferId,productid, productDescription,department, quantity,dated, remarks) VALUES (DEFAULT,$productid, '$productDescription',$department,'$quantity', '$dated','$remarks')";

if($connect->query($sql) === TRUE) {
    $valid['success'] = true;
   $valid['messages'] = "Successfully Added";		
} else {
    $valid['success'] = false;
    $valid['messages'] = "Error while remove the user";
}

$connect->close();

echo json_encode($valid);

} // /if $_POST