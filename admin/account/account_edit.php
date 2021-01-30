<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="accountModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="accountModalLabel">Update</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="account_edit_process.php" method="post" id="edit-form">
			<div class="modal-body">
				<input type="hidden" name="ID" id="ID"> 
				<div class="form-group">
				    <label for="name"> Name </label>
				    <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
				</div>
				<div class="form-group">
				    <label for="username"> Username </label>
				    <span id="error_username_edit"></span>
				    <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
				</div>
				<div class="form-group">
				    <label for="password"> Password </label>
				    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
				    <button id="btn-toggle-password" type="button" data-attr='0'>
				    	Show
				    </button>
				</div>
				<div class="form-group">
				    <label>Level</label>
				    <div class="custom-control custom-radio">
				    	<input type="radio" id="admin" name="level" class="custom-control-input"  value="2">
				    	<label class="custom-control-label" for="admin">Admin</label>
				    </div>
				    <div class="custom-control custom-radio">
				    	<input type="radio" id="superadmin" name="level" class="custom-control-input"  value="3">
				    	<label class="custom-control-label" for="superadmin">Super Admin</label>
				    </div>
				</div>
				<div class="form-group">
					<label for="date_of_birth">Date of birth</label>
					<input type="date" name="date_of_birth" id="date_of_birth">
				</div>
				<div class="form-group">
					<label>Gender</label>					
				    <div class="custom-control custom-radio">
						<input type="radio" id="male" name="gender" class="custom-control-input"  value="0">
						<label class="custom-control-label" for="male">Male</label>
					</div>
				    <div class="custom-control custom-radio">
						<input type="radio" id="female" name="gender" class="custom-control-input"  value="1">
						<label class="custom-control-label" for="female"> Female</label>
					</div>
				</div>
				<div class="form-group">
					<label for="number_phone">Number Phone</label>
					<span id="error_number_phone_edit"></span>
					<input type="text" name="number_phone" id="number_phone" class="form-control" placeholder="Enter number phone">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<span id="error_email_edit"></span>
					<input type="text" name="email" id="email" class="form-control" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="address">Address</label><br>
					<textarea id="address" class="form-control" cols="30" rows="10" name="address"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button class="btn btn-primary"">Update</button>
<!--  id="edit-form"	 onclick="return check_edit() -->			
			</div>
		</form>
    </div>
  </div>
</div>
<script>
var check = 0;
	$(document).ready(function() {
		$("#btn-toggle-password").click(function() {
			let this_btn = $(this);
			if(this_btn.data('attr') == 0){
				this_btn.parent().find('#password').attr('type', 'text');
				this_btn.text('Hide');
				this_btn.data('attr',1);
			}
			else{
				this_btn.parent().find('#password').attr('type', 'password');
				this_btn.text('Show');
				this_btn.data('attr',0);
			}
		});
		$(".btn-edit").click(function() {
			$.ajax({
				url: 'account_info.php',
				type: 'GET',
				dataType: 'json',
				data: {
					ID: $(this).data('id')
				},
			})
			.done(function(response) {
				let this_form = $("#modaledit");
				$.each(response,function(index, val) {
					this_form.find(`#${index}`).val(val);
				});
				this_form.find(`input[name='level'][value='${response.level}']`).attr('checked', true);
				this_form.find(`input[name='gender'][value='${response.gender}']`).attr('checked', true);
			});
		});
	});
// function check_username_edit() {
// 	$.ajax({
// 		url: 'account_check_username.php',
// 		dataType: 'html',
// 		data: {
// 			username: $("#username").val(),
// 			ID: $("#ID").val()
// 		},
// 	})
// 	.done(function(response) {
// 		if(response != 0) {
// 			$('#error_username_edit').html("<br>Username already exists");
// 			check++;
// 			alert(check);
// 		} 
// 	});
// }
// function check_email_edit() {
// 	$.ajax({
// 		url: 'account_check_email.php',
// 		dataType: 'html',
// 		data: {
// 			email: $("#email").val(),
// 			ID: $("#ID").val(),
// 		},
// 	})
// 	.done(function(response) {
// 		if(response != 0) {
// 			$('#error_email_edit').html("<br>Email already exists");
// 			check++;
// 		}
// 	});
// }
// function check_number_phone_edit() {
// 	$.ajax({
// 		url: 'account_check_number_phone.php',
// 		dataType: 'html',
// 		data: {
// 			number_phone: $("#number_phone").val(),
// 			ID: $("#ID").val()
// 		},
// 	})
// 	.done(function(response) {
// 		if(response != 0) {
// 			$('#error_number_phone_edit').html("<br>Number phone already exists");
// 			check++;
// 		}
// 	});
// }
// function check_edit() {
	
// 	check_username_edit();
// 	check_email_edit();
// 	check_number_phone_edit();
// 	alert(check);
// 	if(check != 0) {
// 		return false;
// 	}
// 	else return true;
// } 
</script>
