var manageCategoriesTable;

$(document).ready(function () {
	$("#editDateOfReceipt").datepicker();
	// order date picker
	$("#startDate").datepicker();

	// active top navbar categories
	$('#navCategories').addClass('active');

	manageCategoriesTable = $('#manageProductsTable').DataTable({
		'ajax': 'php_action/fetchReceiveProduct.php',
		'order': []
	}); // manage categories Data Table
});
function editProduct(productId = null) {

	if (productId) {
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
			url: 'php_action/fetchSelectedReceivedProduct.php',
			type: 'post',
			data: { productId: productId },
			dataType: 'json',
			success: function (response) {
				// alert(response.product_image);
				// modal spinner
				$('.div-loading').addClass('div-hide');
				// modal div
				$('.div-result').removeClass('div-hide');

				// product id 
				$(".editProductFooter").append('<input type="hidden" name="productId" id="productId" value="' + response.productid + '" />');
				$(".editProductPhotoFooter").append('<input type="hidden" name="productId" id="productId" value="' + response.productid + '" />');

				// product name
				$("#editReceiveId").val(response.receiveId);
				console.log(response);
				$("#editProductId").val(response.productid);
				$("#editProductDescription").val(response.productDescription);

				$("#editQuantity").val(response.quantity);
				$("#editRate").val(response.rate);
				$("#editCost").val(response.cost);
				$("#editSupplierDetails").val(response.SupplierDetails);
				$("#editDateOfReceipt").val(response.dateofreceipt);
				$("#editReceiptNumber").val(response.receiptnumber);
				$("#editReferenceNumber").val(response.referencenumber);
				$("#editTypeOfProduct").val(response.type);
				$("#editRemarks").val(response.remarks);

				// update the product data function
				$("#editProductForm").unbind('submit').bind('submit', function () {

					// form validation
					var productid = $("#editProductId").val();
					var productName = $("#editProductName").val();


					if (productid) {
						// submit loading button
						$("#editProductBtn").button('loading');

						var form = $(this);
						var formData = new FormData(this);

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: formData,
							dataType: 'json',
							cache: false,
							contentType: false,
							processData: false,
							success: function (response) {
								console.log(response);
								if (response.success == true) {
									// submit loading button
									$("#editProductBtn").button('reset');

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({ scrollTop: '0' }, 100);

									// shows a successful message after operation
									$('#edit-product-messages').html('<div class="alert alert-success">' +
										'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
										'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
										'</div>');
										manageCategoriesTable.ajax.reload(null, true);
									// remove the mesages
									$(".alert-success").delay(500).show(10, function () {
										$(this).delay(3000).hide(10, function () {
											$(this).remove();
										});
									}); // /.alert

									// reload the manage student table
									//	manageProductTable.ajax.reload(null, true);

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
function removeProduct(productId = null) {
	if (productId) {
		// remove product button clicked
		$("#removeProductBtn").unbind('click').bind('click', function () {
			// loading remove button
			$("#removeProductBtn").button('loading');
			$.ajax({
				url: 'php_action/removeReceivedProduct.php',
				type: 'post',
				data: { productId: productId },
				dataType: 'json',
				success: function (response) {
					// loading remove button
					$("#removeProductBtn").button('reset');
					if (response.success == true) {
						// remove product modal
						$("#removeProductModal").modal('hide');

						// update the product table
						//manageProductTable.ajax.reload(null, false);

						// remove success messages
						$(".remove-messages").html('<div class="alert alert-success">' +
							'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
							'</div>');
							manageCategoriesTable.ajax.reload(null, true);
						// remove the mesages
						$(".alert-success").delay(500).show(10, function () {
							$(this).delay(3000).hide(10, function () {
								$(this).remove();
							});
						}); // /.alert
					} else {

						// remove success messages
						$(".removeProductMessages").html('<div class="alert alert-success">' +
							'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
							'</div>');
							manageCategoriesTable.ajax.reload(null,true);
						// remove the mesages
						$(".alert-success").delay(500).show(10, function () {
							$(this).delay(3000).hide(10, function () {
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