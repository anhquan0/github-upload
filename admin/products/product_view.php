<?php
	include('../connect.php');
	$image_folder = '../product_images/';
	if(isset($_GET['search'])) $search = $_GET['search'];
	else $search = "";
	$sql = "select products.*, producers.name as Producer_Name, category.name  as Category_Name from products inner join producers on producers.ID = products.producer_ID inner join category on products.category_ID = category.ID where products.name like '%$search%' or producers.name like '%$search%'";
	//$sql ="select * from product";

	$result = mysqli_query($connect, $sql);
	$total_product = mysqli_num_rows($result);
	$amount_product_page = 5;
	$total_page = ceil($total_product / $amount_product_page);
	if(isset($_GET['page'])) {
		$page = $_GET['page'];	
	}
	else $page = 1;
	//$amount_product_page = ($total_product < $amount_product_page)? $total_page: $amount_product_page;

	$skip = ($page - 1)* $amount_product_page;
	$sql = "$sql limit $amount_product_page offset $skip";
	// $sql = "$sql where products.name like '%$search%'";

	$result = mysqli_query($connect, $sql);

?>

<h1>
	Total: <?php echo $total_product ?>
</h1>

<?php for($i = 1; $i <= $total_page; $i++) { ?>
	<a href="?page=<?php echo $i ?>&&search=<?php echo $search ?>" class="btn btn-light"><?php echo $i ?></a>
<?php } ?>

<br>

<?php include('product_insert.php') ?>
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Photo</th>
			<!-- <th>Release Date</th> -->
			<th>Price</th>
			<th>Description</th>
			<th>Producer</th>
			<th>Category</th>
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
					$photo = $image_folder.$each['photo'];
					// $release_date = $each['release_date'];
					$price = $each['price'];
					$description = $each['description'];
					$category = $each['Category_Name'];
					$producer = $each['Producer_Name'];
				?>
				<td><?php echo $ID ?></td>
				<td><?php echo $name ?></td>
				<td><img class="detailed_product_photo" src="../img/<?php echo $photo ?>"></td>
				<!-- <td><?php echo $release_date ?></td> -->
				<td><?php echo $price ?></td>
				<td><?php echo $description ?></td>
				<td><?php echo $producer ?></td>
				<td><?php echo $category ?></td>
				<td><?php include('product_edit.php') ?></td>
				<td><?php include('product_delete.php') ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>