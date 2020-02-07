<?php 	
require_once 'core.php';
$sql = "SELECT product.productid, product.productName, productDescription.productDescription 
FROM product INNER JOIN productDescription ON product.productid = productDescription.productid";				

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 
 while($row = $result->fetch_array()) {
 	$productId = $row[0];

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editProductModalBtn" data-target="#editProductModal" onclick="editProduct('.$row[0].')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeProductModal" id="removeProductModalBtn" onclick="removeProduct('.$row[0].')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';


 	$output['data'][] = array( 		
 		$row[0], 
		$row[1],
		$row[2],
		$button
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);