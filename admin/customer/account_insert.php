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
 		<form action="account_insert_process.php" method="post">
			<div class="modal-body">
				<div class="form-group">
					<label for="name">Name</label><span id="error_name"></span>
					<input type="text" name="name" class="form-control" id = "name" placeholder="Enter full name">
				    <label for="username">Username</label><span id="error_username"></span>
				    <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
				    <label for="password">Password</label><span id="error_password"></span>
				    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
				    <br>
				    <label for="repassword">Re Password</label><span id="error_repassword"></span>	
				    <input type="password" name="repassword" class="form-control" id="repassword" placeholder="Re-Enter password">
					<label for="date_of_birth">Date of birth</label>
					<input type="date" name="date_of_birth" id="date_of_birth"><br>
					<label>Gender</label>					
				    <div class="custom-control custom-radio">
						<input type="radio" id="male" name="gender" class="custom-control-input"  value="0" checked>
						<label class="custom-control-label" for="male">Male</label>
					</div>
				    <div class="custom-control custom-radio">
						<input type="radio" id="female" name="gender" class="custom-control-input"  value="1">
						<label class="custom-control-label" for="female">Female</label>
					</div>
					
					<label for="number_phone">Number Phone</label>
					<input type="text" name="number_phone" id="number_phone" class="form-control" placeholder="Enter number phone">
					
					<label for="email">Email</label><span id="error_email"></span>
					<input type="text" name="email" id="email" class="form-control" placeholder="Enter email">
					<label for="address">Address</label>
					<textarea id="address" cols="30" rows="10" name="address"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button class="btn btn-primary" onclick="return check()">Save</button>
			</div>
		</form>
    </div>
  </div>
</div>
<script>
function check() {
	var check = true;
	var name = document.getElementById('name').value;
	var username = document.getElementById('username').value;
	var p = document.getElementById('password').value;
	var rp = document.getElementById('repassword').value;
	var email = document.getElementById('email').value;

	var number_phone = document.getElementById('number_phone').value;
	var regex_name =/^(?:[A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪ][a-zàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,6}\s?)+$/;
	var regex_password = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
	var regex_email =  /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(name == '' || !regex_name.test(name)) {
		check = false;
		if(name == '')
		document.getElementById('error_name').innerHTML = "[Name can't be empty]";
		else document.getElementById('error_name').innerHTML = "[Name wrong]";
	}
	if (username=='') {
		document.getElementById('error_username').innerHTML = "[Username can't be empty and no white space]";
	}
	if(!regex_password.test(p)) {
		check=false;
		document.getElementById('error_password').innerHTML = "[Password can't be empty, minimum eight characters, at least one letter, one number and one special character]";
	}
	if(!regex_password.test(rp)) {
		check=false;
		document.getElementById('error_repassword').innerHTML = "[Password can't be empty, minimum eight characters, at least one letter, one number and one special character]";
	}
	if(p != rp) {
		check = false;
		document.getElementById('error_repassword').innerHTML = "[Password doesn't match]";
	}
	if(email == '' || !regex_email.test(email)) {
		check = false;
		document.getElementById('error_email').innerHTML = "[Email doesn't match]";
	}
	if(!check) {
		return check;
	}
}
</script>
