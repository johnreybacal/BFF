<!DOCTYPE html>
<html>
<head>
	<title>BFF - Admin</title>
</head>
<body>
	<a href = "<?php echo base_url('Admin/Dashboard'); ?>">go back</a>
	<h1>Inventory</h1>
	<table cellpadding="6" cellspacing="1" style = "border:solid thin pink;">
		<thead>
			<tr>
				<td>Inventory ID</td>
				<td>Name</td>
				<td>Quantity</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($inv as $row): ?>
			<tr>
				<td><?php echo $row['inv_id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['quantity']; ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>		
	</table>
</body>
</html>