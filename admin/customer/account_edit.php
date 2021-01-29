<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="<?php echo '#'.$ID.'modaledit' ?>">
  Update 
</button>

<div class="modal fade" id="<?php echo $ID.'modaledit' ?>" tabindex="-1" role="dialog" aria-labelledby="accountModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="accountModalLabel">Update</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="account_edit_process.php?ID=<?php echo $ID ?>" method="post">
			<div class="modal-body">
				<input type="hidden" name="id" value="<?php echo $ID ?>">	
				<div class="form-group">
				    <label for="name_<?php echo $ID ?>"> Name </label>
				    <span id="error_name"></span>
				    <input type="text" name="name" class="form-control" id="name_<?php echo $ID ?>" placeholder="Enter your name" value="<?php echo $name ?>">
				</div>
				<?php if($_SESSION['level'] == 3) { ?> 
					<div class="form-group">
					    <label for="username_<?php echo $ID ?>"> Username </label>
					    <span id="error_username<?php echo $ID ?>"></span>
					    <input type="text" name="username" class="form-control" id="username_<?php echo $ID ?>" placeholder="Enter your username" value="<?php echo $username ?>">
					</div>
					<div class="form-group">
					    <label for="password_<?php echo $ID ?>"> Password </label><span id="error_password<?php echo $ID ?>"></span>
					    <input type="password" name="password" class="form-control" id="password_<?php echo $ID ?>" placeholder="Enter your password" value="<?php echo $password ?>">
				    	<input type="button" id="hideButton<?php echo $ID ?>" onclick="hide<?php echo $ID ?>()" value="Hide">
					</div>
				<?php } ?>
				<div class="form-group">
					<label for="date_of_birth">Date of birth</label>
					<input type="date" name="date_of_birth" id="date_of_birth_<?php echo $ID ?>" value="<?php echo $date_of_birth ?>">
				</div>
				<div class="form-group">
					<label>Gender</label>					
				    <div class="custom-control custom-radio">
						<input type="radio" id="male_<?php echo $ID ?>" name="gender" class="custom-control-input"  value="0" <?php if($gender == 1) echo "checked" ?>>
						<label class="custom-control-label" for="male_<?php echo $ID ?>">Male</label>
					</div>
				    <div class="custom-control custom-radio">
						<input type="radio" id="female_<?php echo $ID ?>" name="gender" class="custom-control-input"  value="1" <?php if($gender == 0) echo "checked" ?>>
						<label class="custom-control-label" for="female_<?php echo $ID ?>"> Female</label>
					</div>
				</div>
				<div class="form-group">
					<label for="number_phone_<?php echo $ID ?>">Number Phone</label>
					<span id="error_number_phone<?php echo $ID ?>"></span>
					<input type="text" name="number_phone" id="number_phone_<?php echo $ID ?>" class="form-control" placeholder="Enter number phone" value="<?php echo $number_phone ?>">
				</div>
				<div class="form-group">
					<label for="email_<?php echo $ID ?>">Email</label><span id="error_email<?php echo $ID ?>"></span>
					<input type="text" name="email" id="email_<?php echo $ID ?>" class="form-control" placeholder="Enter email" value="<?php echo $email ?>">
				</div>
				<div class="form-group">
					<label for="address_<?php echo $ID ?>">Address</label><br>
					<textarea id="address_<?php echo $ID ?>" cols="30" rows="10" name="address"><?php echo $address ?></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button class="btn btn-primary" onclick="return check<?php echo $ID ?>()">Update</button>
			</div>
		</form>
    </div>
  </div>
</div>
<script>
	function hide<?php echo $ID ?>() {
		let password_input = document.getElementById('password_<?php echo $ID ?>');
		let hideButton = document.getElementById('hideButton<?php echo $ID ?>');
		if(password_input.type == "password") {
			password_input.type = "text";
			hideButton.value = "Unhide";
		}
		else {
			password_input.type = "password";
			hideButton.value = "Hide";
		}
	}
</script>
<script>
function check<?php echo $ID ?>() {
	var check = true;
	var name = document.getElementById('name_<?php echo $ID ?>').value;
	var username = document.getElementById('username_<?php echo $ID ?>').value;
	var pass = document.getElementById('password_<?php echo $ID ?>').value;
	var email = document.getElementById('email_<?php echo $ID ?>').value;
	var number_phone = document.getElementById('number_phone_<?php echo $ID ?>').value;
	var regex_name =/^(?:[A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪ][a-zàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,6}\s?)+$/;
	var regex_password = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
	var regex_email =  /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var regex_number_phone = /(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]‌​)\s*)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)([2-9]1[02-9]‌​|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})\s*(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+)\s*)?$/;
	if(name == '' || !regex_name.test(name)) {
		check = false;
		if(name == '')
		document.getElementById('error_name<?php echo $ID ?>').innerHTML = "<br>[Name can't be empty]";
		else document.getElementById('error_name<?php echo $ID ?>').innerHTML = "<br>[Name wrong]";
	}
	if(username=='') {
		document.getElementById('error_username<?php echo $ID ?>').innerHTML = "<br>[Username can't be empty and no white space]";
	}
	if(!regex_password.test(pass)) {
		check=false;
		document.getElementById('error_password<?php echo $ID ?>').innerHTML = "<br>[Password can't be empty, minimum eight characters, at least one letter and one number]";
	}
	if(email == '' || !regex_email.test(email)) {
		check = false;
		document.getElementById('error_email<?php echo $ID ?>').innerHTML = "<br>[Email doesn't match or wrong]";
	}
	if(!check) {
		return check;
		alert("Done!");
	}
}
</script>