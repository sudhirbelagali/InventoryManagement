<?php 
error_reporting(E_ALL);
require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("m/d/Y");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("m/d/Y");
	
	$sql = "SELECT * FROM receivedProducts WHERE dateofreceipt >= '$start_date' AND dateofreceipt <= '$end_date'";
	
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Product ID</th>
			<th>Product Description</th>
			<th>Quantity</th>
			<th>Rate</th>
			<th>Cost</th>
			<th>Supplier Details</th>
			<th>Date of Receipt</th>
			<th>Receipt Number</th>
			<th>Reference Number</th>
			<th>Product Type</th>
			<th>Remarks</th>
		</tr>
		<tr>';
	
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['productid'].'</center></td>
				<td><center>'.$result['productDescription'].'</center></td>
				<td><center>'.$result['quantity'].'</center></td>
				<td><center>'.$result['rate'].'</center></td>
				<td><center>'.$result['cost'].'</center></td>
				<td><center>'.$result['SupplierDetails'].'</center></td>
				<td><center>'.$result['dateofreceipt'].'</center></td>
				<td><center>'.$result['receiptnumber'].'</center></td>
				<td><center>'.$result['referencenumber'].'</center></td>
				<td><center>'.$result['type'].'</center></td>
				<td><center>'.$result['remarks'].'</center></td>

			</tr>';	
		}
		$table .= '
		</tr>
	</table>
	';	

	echo $table;

}

?>