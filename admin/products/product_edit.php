<button type="button" class="btn btn-primary" data-toggle="modal" data-target="<?php echo "#".$ID.'modalEdit' ?>">
  	Update
</button>

<div class="modal fade" id="<?php echo $ID.'modalEdit' ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="<?php echo $ID.'modalEdit' ?>">Edit</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="product_edit_process.php?ID=<?php echo $ID ?>" method="post"  enctype="multipart/form-data">
			<div class="modal-body">
				<div class="form-group">
					<?php
						$sql1 = "select * from producers";
						$result1 = mysqli_query($connect, $sql1);
						$sql2 = "select * from category";
						$result2 = mysqli_query($connect, $sql2);
					?>
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control" id = "name" placeholder="Enter product name" value="<?php echo $name ?>">
				    <label>Photo</label>
				    <img class="photo" src="../img/<?php echo $photo ?>"><br>
				    <p>If you want to change this photo, choose photo in here</p>
				    <input type="file" name="photo1"><br>	    
					<label for="release_date">Release Date</label>
					<input type="date" name="release_date" id="release_date" value="<?php echo $release_date ?>">
					<br>
					<label for="price">Price</label>
					<input type="text" name="price" id="price" class="form-control" placeholder="Enter product price" value="<?php echo $price ?>">
					<label for="description">Description</label>
					<br>
					<textarea name="description" id="description" rows="10" cols="30" ><?php echo $description ?></textarea>
					<br>
					<label>Producer</label>
					<select name="producer_ID">
					<?php foreach ($result1 as $each): ?>
						<option value="<?php echo $each['ID'] ?>"><?php echo $each['name'] ?></option>
					<?php endforeach ?>
					</select>
					<br>
					<label>Category</label>
					<select name="category_ID">
					<?php foreach ($result2 as $each): ?>
						<option value="<?php echo $each['ID'] ?>"><?php echo $each['name'] ?></option>
					<?php endforeach ?>						
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button class="btn btn-primary">Save</button>
			</div>
		</form>
    </div>
  </div>
</div>