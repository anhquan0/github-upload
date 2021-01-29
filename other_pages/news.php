<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div class="overall">
	<?php include('../front_page/header.php') ?>
	<div class="middle">
		<div class="middle_inner">
			<?php 
				// $title = $_POST['title'];
				// $content = $_POST['content'];

				include '../admin/connect.php';
				$tim_kiem = '';
				if (isset($_GET['tim_kiem'])) {
					$tim_kiem = $_GET['tim_kiem'];
				}

				$sql = "select *
				from pokemon_controversies
				where title like '%$tim_kiem%' or content like '%$tim_kiem%'";
				$result = mysqli_query($connect,$sql);

				$tong_so_san_pham = mysqli_num_rows($result);
				$so_san_pham_1_trang = 3;
				//tinh so trang can phai hien thi
				$tong_so_trang = ceil($tong_so_san_pham / $so_san_pham_1_trang);

				$trang_hien_tai = 1;
				if (isset($_GET['trang'])) {
					$trang_hien_tai = $_GET['trang'];
				}

				$so_san_pham_can_bo_qua = ($trang_hien_tai - 1) * $so_san_pham_1_trang;

				$sql = "$sql
				limit $so_san_pham_1_trang offset $so_san_pham_can_bo_qua";
				$result = mysqli_query($connect,$sql);
			?>
			<h1>
				<?php echo $tong_so_san_pham ?> san pham
			</h1>
			<p>
				<?php for ($i=1; $i <= $tong_so_trang ; $i++) { ?>
					<a href="?trang=<?php echo($i) ?>&tim_kiem=<?php echo $tim_kiem ?>">
						<?php echo $i ?>
					</a>
				<?php } ?>
			</p>
			<p>
				<form>
					please search
					<input type="search" name="tim_kiem" value="<?php echo $tim_kiem ?>" placeholder="Search..." size="50">
					<button><i class="fas fa-search"></i></button>
				</form>
			</p>
			<table width="100%">
				<tr>
					<th>Title</th>
					<th>Content</th>
				</tr>
				<?php foreach ($result as $each) { ?>
				<tr>
					<td>
						<?php echo $each['title'] ?>
					</td>
					<td>
						<?php echo $each['content'] ?>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
	<?php include('../front_page/footer.php') ?>
</div>
</body>
</html>