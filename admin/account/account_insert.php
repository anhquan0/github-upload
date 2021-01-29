<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  	New Account
</button>

<div class="modal fade" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">New Account</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
 		<form action="account_insert_process.php" id="insert_form">
			<div class="modal-body">
				<div class="form-group">
					<label for="name0">Name</label><span id="error_name"></span>
					<input type="text" name="name" class="form-control" id = "name0" placeholder="Enter full name">
				    <label for="username0">Username</label><span id="error_username"></span>
				    <input type="text" name="username" class="form-control" id="username0" placeholder="Enter username">
				    <label for="password0">Password</label><span id="error_password"></span>
				    <input type="password" name="password" class="form-control" id="password0" placeholder="Enter password">
				    <br>
				    <label for="repassword0">Re Password</label><span id="error_repassword"></span>	
				    <input type="password" name="repassword" class="form-control" id="repassword0" placeholder="Re-Enter password">
				    		    
				    <label>Level</label>
				    <div class="custom-control custom-radio">
						<input type="radio" id="level20" name="level" class="custom-control-input"  value="2" checked>
						<label class="custom-control-label" for="level20">Admin</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="level30" name="level" class="custom-control-input"
						value="3">
						<label class="custom-control-label" for="level30">Super Admin</label>
					</div>
					<label for="date_of_birth0">Date of birth</label>
					<input type="date" name="date_of_birth" id="date_of_birth0"><br>
					<label>Gender</label>					
				    <div class="custom-control custom-radio">
						<input type="radio" id="male0" name="gender" class="custom-control-input"  value="0" checked>
						<label class="custom-control-label" for="male0">Male</label>
					</div>
				    <div class="custom-control custom-radio">
						<input type="radio" id="female0" name="gender" class="custom-control-input"  value="1">
						<label class="custom-control-label" for="female0">Female</label>
					</div>
					
					<label for="number_phone0">Number Phone</label>
					<span id="error_number_phone"></span>
					<input type="text" name="number_phone" id="number_phone0" class="form-control" placeholder="Enter number phone">
					
					<label for="email0">Email</label><span id="error_email"></span>
					<input type="text" name="email" id="email0" class="form-control" placeholder="Enter email">
				<div class="form-group">
					<label for="address0">Address</label><br>
					<textarea id="address0" class="form-control" cols="30" rows="10" name="address"></textarea>
				</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" onclick="return check()">Save</button>
			</div>
		</form>
    </div>
  </div>
</div>

<script>
function check() {
	var check_error = 0;
	var name = document.getElementById('name0').value;
	var username = document.getElementById('username0').value;
	var p = document.getElementById('password0').value;
	var rp = document.getElementById('repassword0').value;
	var email = document.getElementById('email0').value;
	var number_phone = document.getElementById('number_phone0').value;
	var regex_name =/^(?:[A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪ][a-zàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,6}\s?)+$/;
	var regex_password = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
	var regex_email =  /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(name == '' || !regex_name.test(name)) {
		check_error++;
		if(name == '')
		document.getElementById('error_name').innerHTML = "<br>[Name can't be empty]";
		else document.getElementById('error_name').innerHTML = "<br>[Name wrong]";
	}
	if (username=='') {
		document.getElementById('error_username').innerHTML = "<br>[Username can't be empty and no white space]";
	}
	if(!regex_password.test(p)) {
		check_error++;
		document.getElementById('error_password').innerHTML = "<br>[Password can't be empty, minimum eight characters, at least one letter, one number";
	}
	if(!regex_password.test(rp)) {
		check_error++;
		document.getElementById('error_repassword').innerHTML = "<br>[Password can't be empty, minimum eight characters, at least one letter, one number and one special character]";
	}
	if(p != rp) {
		check_error++;
		document.getElementById('error_repassword').innerHTML = "<br>[Password doesn't match]";
	}
	if(number_phone == '') document.getElementById('error_number_phone').innerHTML = "<br>[Number phone doesn't match]";
	if(!regex_email.test(email)) {
		check_error++;
		document.getElementById('error_email').innerHTML = "<br>[Email doesn't match]";
	}
	 check_error += check_username();
	 check_error += check_email();
	 check_error += check_number_phone();
	if(check_error!=0){
		return false;
	}
	else return true;
}

function check_username() {
	var feedback = 0;
	$.ajax({
		url: 'account_check_username.php',
		dataType: 'html',
		data: {username: $("#username0").val()},
	})
	.done(function(response) {
		if(response != 0) {
			$('#error_username').html("<br>[Username already exists]");
			// $('#error_username').html(response);
			feedback = response;
		} 
	});
	return feedback;
}

function check_email() {
	var feedback = 0;
	$.ajax({
		url: 'account_check_email.php',
		dataType: 'html',
		data: {
			email: $("#email0").val()},
	})
	.done(function(response) {
		if(response != 0) {
			$('#error_email').html("<br>[Email already exists]");
			
		} 
		feedback = response;
	return feedback;
	});
}
function check_number_phone() {
	var feedback = 0;
	$.ajax({
		url: 'account_check_number_phone.php',
		dataType: 'html',
		data: {number_phone: $("#number_phone0").val()},
	})
	.done(function(response) {
		if(response != 0) {
			$('#error_number_phone').html("<br>[Number phone already exists]");
		} 
		feedback = response;

	});
	return 	feedback;	
}

</script>
