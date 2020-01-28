$(document).ready(function() {
	// order date picker
	$("#startDate").datepicker();
	// order date picker
	$("#endDate").datepicker();

	$("#submitTransferForm").unbind('submit').bind('submit', function() {
		
		var startDate = $("#startDate").val();
		var endDate = $("#endDate").val();

		if(startDate == "") {
			if(startDate == "") {
				$("#startDate").closest('.form-group').addClass('has-error');
				$("#startDate").after('<p class="text-danger">The Start Date is required</p>');
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();
			}
		} else {
			$(".form-group").removeClass('has-error');
			$(".text-danger").remove();


		} // /else

		return true;
	});

});