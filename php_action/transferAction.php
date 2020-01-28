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
if ($connect->query($sql) === TRUE) {
	echo "<p>New Transaction added successfully</p>";
} else {
	echo "Error: " . $Query . "<br>" . $conn->error;
}
$connect->close();
echo "<p>you will be redirected to dashboard page in 3 seconds....</p>";
header( "Refresh:3; url=/inventory/dashboard.php", true, 303);
}