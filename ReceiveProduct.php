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




			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		

	</div> <!-- /col-md-12 -->
	<table class="table" id="manageProductsTable">
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

				</table>
				<!-- /table -->
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

<!-- edit categories brand -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Received Product</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
	      	</div>
	      	<div class="div-result">

				    <div role="tabpanel" class="tab-pane" id="productInfo">
				    	<form class="form-horizontal" id="editProductForm" action="php_action/editReceivedProduct.php" method="POST">
				    	<br />

				    	<div id="edit-product-messages"></div>

						<div class="form-group">
			        	<label for="editReceiveId" class="col-sm-3 control-label">Receive ID: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editReceiveId" placeholder="Receive Id" name="editReceiveId" autocomplete="off">
						    </div>
				        </div> <!-- /form-group-->	 


				    	<div class="form-group">
			        	<label for="editProductId" class="col-sm-3 control-label">Product ID: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" readonly class="form-control" id="editProductId" placeholder="Product ID" name="editProductId" autocomplete="off">
						    </div>
				        </div> <!-- /form-group-->	    

						<div class="form-group">
			        	<label for="editProductDescription" class="col-sm-3 control-label">Product Description: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editProductDescription" placeholder="Product Description" name="editProductDescription" autocomplete="off">
						    </div>
				        </div> <!-- /form-group-->	 

				        <div class="form-group">
			        	<label for="editQuantity" class="col-sm-3 control-label">Quantity : </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editQuantity" placeholder="Quantity" name="editQuantity" autocomplete="off">
						    </div>
				        </div> <!-- /form-group-->	   

				        <div class="form-group">
			        	<label for="editRate" class="col-sm-3 control-label">Rate: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editRate" placeholder="Rate" name="editRate" autocomplete="off">
						    </div>
				        </div> <!-- /form-group-->	 

				        <div class="form-group">
			        	<label for="editCost" class="col-sm-3 control-label">Cost : </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editCost" placeholder="Cost" name="editCost" autocomplete="off">
						    </div>
				        </div> <!-- /form-group-->	

						<div class="form-group">
			        	<label for="editSupplierDetails" class="col-sm-3 control-label">Supplier Details : </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
							<textarea name="editSupplierDetails" id="editSupplierDetails" cols="30" rows="10"></textarea>
						    </div>
				        </div> <!-- /form-group-->	

						<div class="form-group">
			        	<label for="editDateOfReceipt" class="col-sm-3 control-label">Date of Receipt : </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editDateOfReceipt" placeholder="Date of Receipt" name="editDateOfReceipt" autocomplete="off">
						    </div>
				        </div> <!-- /form-group-->

						<div class="form-group">
			        	<label for="editReceiptNumber" class="col-sm-3 control-label">Receipt Number: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editReceiptNumber" placeholder="Receipt Number" name="editReceiptNumber" autocomplete="off">
						    </div>
				        </div> <!-- /form-group-->

						<div class="form-group">
			        	<label for="editReferenceNumber" class="col-sm-3 control-label">Reference Number: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editReferenceNumber" placeholder="Reference Number" name="editReferenceNumber" autocomplete="off">
						    </div>
				        </div> <!-- /form-group-->

						<div class="form-group">
			        	<label for="editTypeOfProduct" class="col-sm-3 control-label">Type of the product</label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
									<select class="form-control" name="editTypeOfProduct" id="editTypeOfProduct">
									<option selected>Consumable</option>
									<option>Non Consumable</option>
									</select>
						    </div>
				        </div> <!-- /form-group-->

						<div class="form-group">
			        	<label for="editRemarks" class="col-sm-3 control-label">Remarks : </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editRemarks" placeholder="Remarks" name="editRemarks" autocomplete="off">
						    </div>
				        </div> <!-- /form-group-->

			    	    <div class="modal-footer editProductFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				        <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
				     	</div> <!-- /modal-footer -->				     
			       		</form> <!-- /.form -->				     	
				    	<!-- /product info -->
					</div>
				</div>
	      </div> <!-- /modal-body -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeProductModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Product</h4>
      </div>
      <div class="modal-body">

      	<div class="removeProductMessages"></div>

        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->


<script src="custom/js/receiveProduct.js"></script>

<?php require_once 'includes/footer.php'; ?>