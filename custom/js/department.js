var manageCategoriesTable;

$(document).ready(function() {
	// active top navbar categories
	$('#navCategories').addClass('active');	

	manageCategoriesTable = $('#manageCategoriesTable').DataTable({
		'ajax' : 'php_action/fetchDepartment.php',
		'order': []
	}); // manage categories Data Table

	// on click on submit categories form modal
	$('#addProductModalBtn').unbind('click').bind('click', function() {
		// reset the form text
		$("#submitProductForm")[0].reset();
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// submit categories form function
		$('#submitProductForm').unbind('submit').bind('submit', function() {

			var categoriesName = $("#departmentName").val();
			// var categoriesName =  document.getElementById("#departmentNameId").innerHTML;
			console.log(categoriesName);			

			if(categoriesName == "") {
				$("#departmentName").after('<p class="text-danger">Department Name field is required</p>');
				$('#departmentName').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#departmentName").find('.text-danger').remove();
				// success out for form 
				$("#departmentName").closest('.form-group').addClass('has-success');	  	
			}
			console.log(categoriesName);
			


			if(categoriesName) {
				var form = $(this);
				// button loading
				$("#createProductBtn").button('loading');

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success:function(response) {
						// button loading
						$("#createProductBtn").button('reset');

						if(response.success == true) {
							// reload the manage member table 
							manageCategoriesTable.ajax.reload(null, false);						

	  	  			// reset the form text
							$("#submitProductForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');
	  	  			
	  	  			$('#add-product-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
						}  // if

					} // /success
				}); // /ajax	
			} // if

			return false;
		}); // submit categories form function
	}); // /on click on submit categories form modal	

}); // /document

function editDepartment(productId = null) {
	if(productId) {
		$("#productId").remove();		
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		// modal spinner
		$('.div-loading').removeClass('div-hide');
		// modal div
		$('.div-result').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedDepartment.php',
			type: 'post',
			data: {productId: productId},
			dataType: 'json',
			success:function(response) {
				console.log("in the edit");
						
			// alert(response.product_image);
				// modal spinner
				$('.div-loading').addClass('div-hide');
				// modal div
				$('.div-result').removeClass('div-hide');				

				// product id 
				$(".editProductFooter").append('<input type="hidden" name="productId" id="productId" value="'+response.productid+'" />');				
				$(".editProductPhotoFooter").append('<input type="hidden" name="productId" id="productId" value="'+response.productid+'" />');				
				
				// product name
                $("#editDepartmentName").val(response.departmentName);
                $("#editDepartmentId").val(response.departmentId);
                
				// update the product data function
				$("#editProductForm").unbind('submit').bind('submit', function() {

					// form validation
					var productid = $("#editDepartmentId").val();
					var productName = $("#editDepartmentName").val();
								

					if(productName == "") {
						$("#editDepartmentName").after('<p class="text-danger">Product Name field is required</p>');
						$('#editDepartmentName').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editDepartmentName").find('.text-danger').remove();
						// success out for form 
						$("#editDepartmentName").closest('.form-group').addClass('has-success');	  	
					}	// /else


					if(productName) {
						// submit loading button
						$("#editProductBtn").button('loading');

						var form = $(this);
						var formData = new FormData(this);

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: formData,
							dataType: 'json',
							cache: false,
							contentType: false,
							processData: false,
							success:function(response) {
								console.log(response);
								if(response.success == true) {
									// submit loading button
									$("#editProductBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
									$('#edit-product-messages').html('<div class="alert alert-success">'+
				            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');

									// remove the mesages
				          $(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

				        //   reload the manage student table
						manageCategoriesTable.ajax.reload(null, true);

									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');

								} // /if response.success
								
							} // /success function
						}); // /ajax function
					}	 // /if validation is ok 					

					return false;
				}); // update the product data function


            }
        });
				
	} else {
		alert('error please refresh the page');
	}
} // /edit product function

// remove product 
function removeDepartment(productId = null) {
	if(productId) {
		// remove product button clicked
		$("#removeProductBtn").unbind('click').bind('click', function() {
			// loading remove button
			$("#removeProductBtn").button('loading');
			$.ajax({
				url: 'php_action/removeDepartment.php',
				type: 'post',
				data: {productId: productId},
				dataType: 'json',
				success:function(response) {
					// loading remove button
					$("#removeProductBtn").button('reset');
					if(response.success == true) {
						// remove product modal
						$("#removeProductModal").modal('hide');
						
						// reload the manage member table 						
						manageCategoriesTable.ajax.reload(null, false);	

						// update the product table
						//manageProductTable.ajax.reload(null, false);

						// remove success messages
						$(".remove-messages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					} else {

						// remove success messages
						$(".removeProductMessages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert

					} // /error
				} // /success function
			}); // /ajax fucntion to remove the product
			return false;
		}); // /remove product btn clicked
	} // /if productid
} // /remove product function