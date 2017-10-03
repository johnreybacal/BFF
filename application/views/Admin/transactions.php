<!DOCTYPE html>
<html>
<head>
	<title>BFF - Admin</title>
</head>
<body>
	<a href = "<?php echo base_url('Admin/Dashboard'); ?>">go back</a>
	<h1>Transactions</h1>
	<table cellpadding="6" cellspacing="1" style = "border:solid thin pink;">
		<thead>
			<tr>
				<td>Transaction ID</td>
				<td>Client ID</td>
				<td>Cart</td>
				<td>Date</td>
				<td>Bill</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($trans as $row): ?>
			<tr>
				<td><?php echo $row['trans_id']; ?></td>
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
			</tr>
			<?php endforeach; ?>
		</tbody>		
	</table>
</body>
</html>