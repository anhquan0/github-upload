<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="<?php echo '#'.$ID.'modaldetail' ?>">
  	Detail
</button>

<div class="modal fade" id="<?php echo $ID.'modaldetail' ?>" tabindex="-1" role="dialog" aria-labelledby="billModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h2 class="modal-title" id="billModalLabel">
				Bill Detail
			</h2>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<table class="table table-hover table-bordered">
				<thead>
					<th>No.</th>
					<th>Product Name</th>
					<th>Amount</th>
					<th>Price</th>
				</thead>
				<?php
					$total_money = 0;
					$no = 0;
					$sql1 = "select bill_detail.*, products.name as product_name from bill_detail inner join bill on bill_detail.bill_ID = bill.ID inner join products on products.ID = bill_detail.product_ID where bill_ID = '$ID'";
					$result1 = mysqli_query($connect, $sql1);
				?>
				<tbody>
					<?php foreach ($result1 as $each): ?>
						<tr>
							<td>
								<?php echo ++$no ?>
							</td>
							<td>
								<?php echo $each['product_name'] ?>
							</td>
							<td>
								<?php echo $each['amount'] ?>
							</td>
							<td>
								<?php echo $each['price']*$each['amount'] ?>
							</td>
						</tr>
					<?php 
						$total_money += $each['price']*$each['amount'];
						endforeach
					?>
					<tr>
						<td colspan="3"><h3>Total:</h3></td>
						<td><h3><?php echo $total_money ?></h3></td>
					</tr>
				</tbody>
			</table>
		</div>
<!-- 		<div class="modal-footer">
			<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
		</div> -->
    </div>
  </div>
</div>
