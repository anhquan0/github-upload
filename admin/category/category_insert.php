<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  New category
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">New category</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="category_insert_process.php" method="post">
			<div class="modal-body">
				<div class="form-group">
				    <label for="name"> Name</label>
				    <input type="text" name="name" class="form-control" id="name" placeholder="Enter category name">
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
<script type="text/javascript">
	var check = 0;
	function check() {
		check = (check == 0)? 0: 1;
		check_category();
		alert(check);
		if(check != 0) return false;
		else return true;
	}

	function check_category() {
		$.ajax({
			url: 'category_check_name.php',
			dataType: 'html',
			data: {name: '$("#name")'},
		})
		.done(function(response) {
			if(response != 0) alert("Category already exists");
			check++;
		});
	}
</script>