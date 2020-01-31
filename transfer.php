<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Stock Transfer</li>
		</ol>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i>Move Stocks</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Transfer Product</button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageCategoriesTable">
					<thead>
						<tr>							
							<th>Transfer ID</th>
							<th>Product ID</th>
							<th>Product Description</th>
							<th>Department</th>
							<th>Quantity</th>
							<th>Date</th>
							<th>Remarks</th>							
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>


			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		

	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitProductForm" action="php_action/transferAction.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Transfer Product</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-product-messages"></div>

	        <div class="form-group">
	        	<label for="product" class="col-sm-3 control-label">Select Product</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
                    <?php
                    echo "<select id='product' name='product'>";
                    $sql = "SELECT * FROM product";
                    $result = $connect->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['productid'] . "'>" .$row['productName'] . "</option>";
                        }
                    }
                    echo "</select>";
                    ?>
				    </div>
	        </div> <!-- /form-group-->	     

             <div class="form-group">
	        	<label for="productDescription" class="col-sm-3 control-label">Product Description</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
                    <?php
                    echo "<select id='productDescription' name='productDescription'>";
                    $sql = "SELECT * FROM productDescription";
                    $result = $connect->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['descriptionid'] . "'>" .$row['productDescription'] . "</option>";
                    }
                    }
                    echo "</select>";
                    ?>
				    </div>
	        </div> <!-- /form-group-->	        

            <div class="form-group">
	        	<label for="department" class="col-sm-3 control-label">Transfer to </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
                    <?php
                    echo "<select id='department' name='department'>";
                    $sql = "SELECT * FROM department";
                    $result = $connect->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['departmentId'] . "'>" . $row['departmentName'] . "</option>";
                    }
                    }
                    echo "</select>";
                    ?>
				    </div>
	        </div> <!-- /form-group-->	  

			<div class="form-group">
	        	<label for="availablequantity" class="col-sm-3 control-label">Available Quantity: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
					<?php
                    $sql = "SELECT quantity FROM receivedProducts where productid=1 and productDescription=1";
					$result = $connect->query($sql);
                    if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {  
						$availableQuantity = $row['quantity'];
						}
					}?>
					<input type="text" name="availablequantity" readonly value="<?php echo $availableQuantity ?>" id="availablequantity">
                </div>
	        </div> <!-- /form-group-->	      


            <div class="form-group">
	        	<label for="quantity" class="col-sm-3 control-label">Quantity: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
                    <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" id="quantity">
				    </div>
	        </div> <!-- /form-group-->	      

            <div class="form-group">
	        	<label for="startDate" class="col-sm-3 control-label">Date: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
                    <input type="text" name="date" id="startDate" class="form-controls">
				    </div>
	        </div> <!-- /form-group-->	    

            <div class="form-group">
	        	<label for="remarks" class="col-sm-3 control-label">Remarks: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
                    <textarea name="remarks" id="remarks" cols="30" rows="5"></textarea>
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
<div class="modal fade" id="editDepartmentModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Department</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
	      	</div>

	      	<div class="div-result">

				    <div role="tabpanel" class="tab-pane" id="productInfo">
				    	<form class="form-horizontal" id="editProductForm" action="php_action/editTransfer.php" method="POST">				    
				    	<br />

				    	<div id="edit-product-messages"></div>

						<div class="form-group">
						<label for="transferId" class="col-sm-3 control-label">Transfer ID </label>
						<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="transferId" name="transferId" autocomplete="off">
							</div>
						</div> <!-- /form-group-->	    	

						<div class="form-group">
						<label for="productId" class="col-sm-3 control-label">Product ID </label>
						<label class="col-sm-1 control-label">: </label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="productId" name="productId" autocomplete="off">
							</div>
						</div> <!-- /form-group-->	        

						<div class="form-group">
			        	<label for="descriptionId" class="col-sm-3 control-label">Product Description </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" placeholder="Product Description" id="descriptionId" name="descriptionId" autocomplete="off">
						    </div>
				        </div> <!-- /form-group-->	  	

						<div class="form-group">
			        	<label for="departmentId" class="col-sm-3 control-label">Department </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" placeholder="Department" id="departmentId" name="departmentId" autocomplete="off">
						    </div>
				        </div> <!-- /form-group-->

						<div class="form-group">
			        	<label for="editQuantity" class="col-sm-3 control-label">Quantity </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" placeholder="Quantity" id="editQuantity" name="editQuantity" autocomplete="off">
						    </div>
				        </div> <!-- /form-group-->

						<div class="form-group">
			        	<label for="date" class="col-sm-3 control-label">Date</label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" placeholder="Quantity" id="date" name="date" autocomplete="off">
						    </div>
				        </div> <!-- /form-group-->

						<div class="form-group">
			        	<label for="editRemarks" class="col-sm-3 control-label">Remarks</label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" placeholder="Remarks" id="editRemarks" name="editRemarks" autocomplete="off">
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
<div class="modal fade" tabindex="-1" role="dialog" id="removeDepartmentModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Product</h4>
      </div>
      <div class="modal-body">

	  <div class="remove-messages"></div>

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


<script src="custom/js/transfer.js"></script>
<?php require_once 'includes/footer.php'; ?>