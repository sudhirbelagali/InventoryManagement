<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Product Description</li>
		</ol>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Product Description</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Product Description </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageProductTable">
				<thead>
						<tr>							
							<th>Product Id</th>
							<th>Product Name</th>
							<th>Product Description</th>
							<th style="width:15%;">Options</th>
						</tr>
				</thead>

				<?php 
				$sql = "SELECT product.productid, product.productName, productDescription.productDescription 
						FROM product INNER JOIN productDescription ON product.productid = productDescription.productid";				
				$result = $connect->query($sql);				
				$output = array('data' => array());				
				if($result->num_rows > 0) { 
				 while($row = $result->fetch_array()) {
					 ?>
					 <tr>
					 <td id="<?php echo $row['productid']?>"><?php echo $row['productid']?></td>
					 <td><?php echo $row['productName']?></td>
					 <td><?php echo $row['productDescription']?></td>
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

    	<form class="form-horizontal" id="submitProductForm" action="php_action/productAddDescriptionAction.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Product Description</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-product-messages"></div>


	        <div class="form-group">
	        	<label for="productid" class="col-sm-3 control-label">Product Name: </label>
	        	<label class="col-sm-1 control-label">: </label>

                <div class="col-sm-8">
                <?php
                require_once 'php_action/db_connect.php'; 
                echo "<select name='productid'>";
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
	        	<label for="productDescription" class="col-sm-3 control-label">Description: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
                    <textarea name="productDescription" id="productDescription" cols="30" rows="10"></textarea>
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
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Product Description</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
	      	</div>
	      	<div class="div-result">

				    <div role="tabpanel" class="tab-pane" id="productInfo">
				    	<form class="form-horizontal" id="editProductForm" action="php_action/editProductDescription.php" method="POST">				    
				    	<br />

				    	<div id="edit-product-messages"></div>

				    	<div class="form-group">
			        	<label for="editProductId" class="col-sm-3 control-label">Product ID: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" readonly class="form-control" id="editProductId" placeholder="Product ID" name="editProductId" autocomplete="off">
						    </div>
				        </div> <!-- /form-group-->	    

				        <div class="form-group">
			        	<label for="editName" class="col-sm-3 control-label">Product Name: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" readonly class="form-control" id="editProductName" placeholder="Product Name" name="editProductName" autocomplete="off">
						    </div>
				        </div> <!-- /form-group-->	      

						<div class="form-group">
			        	<label for="editProductDescription" class="col-sm-3 control-label">Product Description: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editProductDescription" placeholder="Product Description" name="editProductDescription" autocomplete="off">
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


<script src="custom/js/productDescription.js"></script>

<?php require_once 'includes/footer.php'; ?>