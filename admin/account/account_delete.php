<div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="accountModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="accountModalLabel">Delete</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="account_delete_process.php" method="post" id="delete-form">
			<div class="modal-body">
				<input type="hidden" name="ID" id="ID">
				Are you sure you want to delete this account?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">No</button>
			<button type="submit" class="btn btn-primary">Yes</button>
			</div>
		</form>
<!-- id="delete-form" -->
    </div>
  </div>
</div>
<script>
	$(document).ready(function() {
		$(".btn-delete").click(function() {
			$.ajax({
				url: 'account_info.php',
				type: 'get',
				dataType: 'json',
				data: {
					ID: $(this).data('id')
				},
			})
			.done(function(response) {
				let this_form = $("#modaldelete");
				$.each(response,function(index, val) {
					this_form.find(`#${index}`).val(val);
				});
			});
		});
	});
	// function check_delete() {
	// $.ajax({
	// 	url: 'account_check_email.php',
	// 	dataType: 'html',
	// 	data: {ID: $("#ID").val()},
	// })
	// .done(function(response) {
	// 	if(response != 0) {
	// 		$('#error_email').html("<br>[Email already exists]");
			
	// 	} 
	// });
// }
</script>
