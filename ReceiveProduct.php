<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Product</li>
		</ol>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Product</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
				<div class="remove-messages"></div>
				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Receive Product </button>
				</div> <!-- /div-action -->		

				<table class="table" id="manageProductTable">
				<thead>
						<tr>							
							<th>Receive Id</th>
							<th>Product ID</th>
							<th>Description ID</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Total Cost</th>
							<th>Supplied Details</th>
							<th>Date of Receipt</th>
							<th>Receipt Number</th>
							<th>Reference Number</th>
							<th>Type</th>
							<th>Remarks</th>
							<th style="width:15%;">Options</th>
						</tr>
				</thead>

				<?php 
				$sql = "SELECT * FROM `receivedProducts`";				
				$result = $connect->query($sql);				
				$output = array('data' => array());				
				if($result->num_rows > 0) { 
				 while($row = $result->fetch_array()) {
					 ?>
					 <tr>
					 <td id="<?php echo $row['receiveId']?>"><?php echo $row['receiveId']?></td>
					 <td><?php echo $row['productid']?></td>
					 <td><?php echo $row['productDescription']?></td>
					 <td><?php echo $row['quantity']?></td>
					 <td><?php echo $row['rate']?></td>
					 <td><?php echo $row['cost']?></td>
					 <td><?php echo $row['SupplierDetails']?></td>
					 <td><?php echo $row['dateofreceipt']?></td>
					 <td><?php echo $row['receiptnumber']?></td>
					 <td><?php echo $row['referencenumber']?></td>
					 <td><?php echo $row['type']?></td>
					 <td><?php echo $row['remarks']?></td>
					 <td> 
					 <div class="btn-group">
					 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Action <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu">
						<li><a type="button" data-toggle="modal" id="editProductModalBtn" data-target="#editProductModal" onclick="editProduct(<?php echo $row['productid']?>)"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
						<li><a type="button" data-toggle="modal" data-target="#removeProductModal" id="removeProductModalBtn" onclick="removeProduct(<?php echo $row['productid']?>)"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
					  </ul>
					</div></td>
					 </tr>	
	
				<?php } // /while 				
				}// if num_rows				
		
				?>
				</table>
				<!-- /table -->


			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		

	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitProductForm" action="php_action/ReceiveProductAction.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Product</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-product-messages"></div>
	        <div class="form-group">
	        	<label for="productName" class="col-sm-3 control-label">Product Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">

					<?php
						echo "<select class='form-control' id='productName' name='productName'>";
						$sql = "SELECT * FROM product";
						$result = $connect->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<option value='" . $row['productid'] . "'>" . $row['productName'] . "</option>";
						}
						}
						echo "</select>";
						?>
				    </div>
	        </div> <!-- /form-group-->	    

			<div class="form-group">
	        	<label for="productDescription" class="col-sm-3 control-label">Product Description: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
					<?php
						echo "<select class='form-control' id='productDescription' name='productDescription'>";
						$sql = "SELECT * FROM productDescription";
						$result = $connect->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<option value='" . $row['descriptionid'] . "'>" . $row['productDescription'] . "</option>";
						}
						}
						echo "</select>";
						?>
				      
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group">
	        	<label for="quantity" class="col-sm-3 control-label">Quantity: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 

	        <div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Rate: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="rate" placeholder="Rate" name="rate" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	     	    

			   <div class="form-group">
	        	<label for="totalrate" class="col-sm-3 control-label">Total Cost: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="rate" placeholder="Total Cost" name="cost" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        

			<div class="form-group">
	        	<label for="supplier" class="col-sm-3 control-label">Supplier Details: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
					<textarea rows="4" cols="3" class="form-control" id="supplier" name="SupplierDetails"></textarea>
		    </div>
	        </div> <!-- /form-group-->	 

			<div class="form-group">
	        	<label for="startDate" class="col-sm-3 control-label">Date of Receipt: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="startDate" placeholder="Date of Receipt" name="dateofreceipt" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="ReceiptNumber" class="col-sm-3 control-label">ReceiptNumber: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="ReceiptNumber" placeholder="Receipt Number" name="receiptnumber" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="ReferenceNumber" class="col-sm-3 control-label">Reference Number: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="ReferenceNumber" placeholder="Reference Number" name="referencenumber" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="type" class="col-sm-3 control-label">Type of the product: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
					<select class="form-control" name="type" id="type">
					<option selected>Consumable</option>
					<option>Non Consumable</option>
					</select>
				    </div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="Remarks" class="col-sm-3 control-label">Remarks: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="Remarks" placeholder="Remarks" name="remarks" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 

<script src="custom/js/report.js"></script>

<?php require_once 'includes/footer.php'; ?>