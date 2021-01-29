<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="<?php echo '#'.$ID.'modaledit' ?>">
  	Update
</button>

<div class="modal fade" id="<?php echo $ID.'modaledit' ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel"><?php echo $name ?>'s Update</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="producer_edit_process.php?ID=<?php echo $ID ?>" method="post">
			<div class="modal-body">
				<div class="form-group">
				    <label for="name<?php echo $ID ?>"> Name</label>
				    <input type="text" name="name" class="form-control" id="name<?php echo $ID ?>" placeholder="Enter producer name" value="<?php echo $name ?>">
				  </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button class="btn btn-primary">Update</button>
			</div>
		</form>
    </div>
  </div>
</div>