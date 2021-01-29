<button type="button" class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#'.$ID.'modaldelete' ?>">
  	Delete
</button>

<div class="modal fade" id="<?php echo $ID.'modaldelete' ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Delete</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="producer_delete_process.php?ID=<?php echo $ID ?>" method="post">
			<div class="modal-body">
				<div class="form-group">
					Are you sure you want to delete this producer?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">No</button>
				<button class="btn btn-danger">Yes</button>
			</div>
		</form>
    </div>
  </div>
</div>