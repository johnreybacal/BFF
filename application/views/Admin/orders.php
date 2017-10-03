<!DOCTYPE html>
<html>
<head>
	<title>BFF - Admin</title>
</head>
<body>
	<a href = "<?php echo base_url('Admin/Dashboard'); ?>">go back</a>
	<h1>Orders</h1>
	<table cellpadding="6" cellspacing="1" style = "border:solid thin pink;">
		<thead>
			<tr>
				<td>Transaction ID</td>
				<td>Client ID</td>
				<td>Cart</td>
				<td>Date</td>
				<td>Bill</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($ord as $row): ?>
			<tr>
				<td><?php echo $row['order_id']; ?></td>
				<td><?php echo $row['client_id']; ?></td>
				<td>
					<table cellpadding="6" cellspacing="1" style = "border:solid thin pink;">
						<?php $json = json_decode($row['cart'], true); ?>
						<?php foreach($json as $key => $val): ?>
							<tr>
							<?php foreach($val as $v): ?>
								<td><?php echo $v ?></td>
							<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
					</table>
				</td>
				<td><?php echo $row['date']; ?></td>
				<td><?php echo $row['total_bill']; ?></td>
				<td>
					<a href = "<?php echo base_url('Admin/saveTransaction/'.$row['order_id']); ?>">Finish</a>&nbsp|&nbsp<a href = "<?php echo base_url('Admin/cancelOrder/'.$row['order_id']); ?>">Cancel</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>		
	</table>
</body>
</html>