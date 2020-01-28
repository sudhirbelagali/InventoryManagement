<?php 	

require_once 'core.php';

$productId = $_POST['productId'];

$sql = "SELECT product.productid, product.productName, productDescription.productDescription 
FROM product INNER JOIN productDescription ON product.productid = productDescription.productid
WHERE productDescription.productid = $productId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);