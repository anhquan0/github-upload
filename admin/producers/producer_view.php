<?php
	include('../connect.php');
	if(isset($_GET['search'])) $search	= $_GET['search'];
	else $search = "";
	$sql = "select * from producers where producers.name like '%$search%'";
	$result = mysqli_query($connect, $sql);
	$total_producer = mysqli_num_rows($result);
	$amount_producer_page = 10;
	$total_page = ceil($total_producer/$amount_producer_page);
	if(isset($_GET['page'])) $page = $_GET['page'];
	else $page = 1;

	//$amount_producer_page = ($total_producer < $amount_producer_page)? $total_page: $amount_producer_page;

	$skip = ($page - 1) * $amount_producer_page;
	$sql = "$sql limit $amount_producer_page offset $skip";
	$result = mysqli_query($connect, $sql);
?>
	<h1>
		Total: <?php echo $total_producer ?>
	</h1>

<?php 
	for($i = 1; $i <= $total_page; $i++) {
?>
		<a href="?page=<?php echo $i ?>&&search=<?php echo $search ?>" class="btn btn-light"><?php echo $i ?></a>
<?php } 
	//$result = mysqli_query($connect, $sql);
?>	

<br>
<?php include('producer_insert.php'); ?>

<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($result as $each): ?>
			<tr>
				<?php 
					$ID = $each['ID']; 
					$name = $each['name'];
				?>
				<td><?php echo $each['ID'] ?></td>
				<td><?php echo $each['name'] ?></td>
				<td><?php include('producer_edit.php') ?></td>
				<td><?php include('producer_delete.php') ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>