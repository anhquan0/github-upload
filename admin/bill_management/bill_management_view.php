<?php
	include('../connect.php');
	$sql = "select bill.*, account.name as account_name from bill inner join account on account.ID = bill.account_ID order by status asc";
	$result = mysqli_query($connect, $sql);
?>
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Buyer's Name</th>
			<th>Receiver's Name</th>
			<th>Receiver Adrress</th>
			<th>Receiver Number Phone</th>
			<th>Status</th>
			<th>Transaction Time</sth>
			<th>Detail</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($result as $each): ?>
			<tr>
				<?php
					$ID = $each['ID'];
					$status = "";
					$status_color = "";
					if($each['status'] == 1) { 
						$status = "<p>Waiting for confirmation</p>";
						$status_color = "waiting";
					}
					else if($each['status'] == 2) {
						$status = "<p>Success</p>";
						$status_color = "success";
					}
					else {
						$status = "<p>Failure</p>";
						$status_color = "failure";
					}
				?>
				<td><?php echo $each['ID'] ?></td>
				<td><?php echo $each['account_name'] ?></td>
				<td><?php echo $each['receiver_name'] ?></td>
				<td><?php echo $each['receiver_address'] ?></td>
				<td><?php echo $each['receiver_number'] ?></td>
				<td class="<?php echo $status_color ?>">
					<table class="<?php echo $status_color ?>">
						<tr>
							<td colspan="2"><?php echo $status ?></td>
						</tr>
						<?php if($each['status'] == 1) {?>
						<tr>
							<td>
								<td colspan="2"><a href="bill_amount_product_accept.php?ID=<?php echo $ID ?>" class="btn btn-primary" >Accept</a></td>
							</td>
							<td>
								<td colspan="2"><a href="bill_amount_product_cancel.php?ID=<?php echo $ID ?>" class="btn btn-primary" >Cancel</a></td>
							</td>
						</tr>
						<?php } ?>					
					</table>
				</td>
				<td><?php echo $each['transaction_time'] ?></td>
				<td><?php include('bill_management_detail.php') ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
