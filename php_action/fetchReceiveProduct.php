<?php 	
require_once 'core.php';
$sql = "SELECT * FROM `receivedProducts`";				

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
	    <li><a type="button" data-toggle="modal" id="editProductModalBtn" data-target="#editProductModal" onclick="editProduct('.$row['productid'].')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeProductModal" id="removeProductModalBtn" onclick="removeProduct('.$row['productid'].')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';


 	$output['data'][] = array( 		
		$row['receiveId'], 
		$row['productid'],
		$row['productDescription'],
		$row['quantity'],
		$row['rate'],
		$row['cost'],
		$row['SupplierDetails'],
		$row['dateofreceipt'],
		$row['receiptnumber'],
		$row['referencenumber'],
		$row['type'],
		$row['remarks'],
		$button
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);