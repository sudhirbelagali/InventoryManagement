<?php 	
require_once 'core.php';
$valid['success'] = array('success' => false, 'messages' => array());
$productId = $_POST['productId'];

if($productId) { 

 $sql = "DELETE from transfers WHERE transferId = $productId";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed the ".$productId;		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while removing the Department ".$productId;
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST