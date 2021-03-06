<?php
	include('../connect.php');
	if(isset($_GET['search'])) $search = $_GET['search'];
	else $search = "";
	$sql = "select * from account where name like '%$search%' and (level = 2 or level = 3) ORDER BY level DESC";
	
	$result = mysqli_query($connect, $sql);
	$total_account = mysqli_num_rows($result);
	$amount_account_page = 3;
	$total_page = ceil($total_account / $amount_account_page);
	if(isset($_GET['page'])) {
		$page = $_GET['page'];	
	}
	else $page = 1;

	//$amount_account_page = ($total_account < $amount_account_page)? $total_page: $amount_account_page;
	$skip = ($page - 1)* $amount_account_page;
	$sql = "$sql limit $amount_account_page offset $skip";
	// $sql = "$sql where products.name like '%$search%'";

	$result = mysqli_query($connect, $sql);

?>
	<h1>
		Total: <?php echo $total_account ?>
	</h1>
<?php for($i = 1; $i <= $total_page; $i++) { ?>
	<a href="?page=<?php echo $i ?>&&search=<?php echo $search ?>" class="btn btn-light"><?php echo $i ?></a>
<?php }
	// $result = mysqli_query($connect, $sql);
?>
<br>
<?php
	include('account_insert.php'); 
?>
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Username</th>
			<th>Level</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($result as $each): ?>
			<tr>
				<?php 
					$name = $each['name'];
					$ID = $each['ID']; 
					$username = $each['username'];
					$password = $each['password'];
					$level = $each['level'];
					$date_of_birth = $each['date_of_birth'];
					$gender = $each['gender'];
					$number_phone = $each['number_phone'];
					$email = $each['email'];
					$address = $each['address'];
				?>
				<td><?php echo $each['ID'] ?></td>
				<td><?php echo $each['name'] ?></td>
				<td><?php echo $each['username'] ?></td>
				<td>
				<?php  
					if($level == 3) echo "Super Admin";
					else echo "Admin";
				?>					
				</td>

				<td>
					<button type="button" class="btn btn-secondary btn-edit" data-toggle="modal" data-target="#modaledit" data-id='<?php echo $each['ID'] ?>'>
					  Update 
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modaldelete" data-id='<?php echo $each['ID'] ?>'>
					  Delete
					</button>
				</td>
		<?php endforeach ?>
	</tbody>
</table>
<?php include('account_edit.php') ?>
<?php include('account_delete.php') ?>