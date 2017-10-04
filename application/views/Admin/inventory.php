<!DOCTYPE html>
<html>
<head>
	<title>BFF - Admin</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
<link rel="icon" type="icon/image" href="<?php echo base_url('css/favicon.png'); ?>">
</head>
<body>
	<!-- <a href = "<?php echo base_url('Admin/Dashboard'); ?>">go back</a>
	<h1>Inventory</h1> -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 title">
				<h4 class="text-center">🌹 Brighten & Flowers Sales and Inventory System</h4>				
			</div>
			<div class="col-md-2" style="border: 1px solid black;">
				<ul class="nav nav-pills nav-stacked">
					<li><a href = "<?php echo base_url('Admin/Clients'); ?>"><span class="glyphicon glyphicon-chevron-right"></span>List of Clients</a></li>
					<li><a href = "<?php echo base_url('Admin/Inventory'); ?>"><span class="glyphicon glyphicon-chevron-right"></span>Inventory report</a></li>
					<li><a href = "<?php echo base_url('Admin/Orders'); ?>"><span class="glyphicon glyphicon-chevron-right"></span>List of Orders</a></li>
					<li><a href = "<?php echo base_url('Admin/Transactions'); ?>"><span class="glyphicon glyphicon-chevron-right"></span>List of Transactions</a></li>
					<li><a href = "<?php echo base_url('Admin/Log_Transaction'); ?>"><span class="glyphicon glyphicon-chevron-right"></span>Log a transaction</a>&nbsp(for transactions that are not done on the website)</li>
				</ul>
			</div>
			<div class="col-md-10" style="border: 5px solid red;">
				<h1 class="text-center">Dashboard</h1>
				
			</div>
		<!-- Sample Value -->
				<div class="col-md-10" style="border: 3px solid blue;">
					<div class="table-responsive">
	<table class = "table">
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
	</div>
	</div>
		</div>
</div>
</body>
</html>