<!DOCTYPE html>
<html>
<head>
	<title>BFF - Admin</title>
</head>
<body>
	<h1>Dashboard</h1>
	<ul>
		<li><a href = "<?php echo base_url('Admin/Clients'); ?>">List of Clients</a></li>
		<li><a href = "<?php echo base_url('Admin/Inventory'); ?>">Inventory report</a></li>
		<li><a href = "<?php echo base_url('Admin/Orders'); ?>">List of Orders</a></li>
		<li><a href = "<?php echo base_url('Admin/Transactions'); ?>">List of Transactions</a></li>
		<li><a href = "<?php echo base_url('Admin/Log_Transaction'); ?>">Log a transaction</a>&nbsp(for transactions that are not done on the website)</li>
	</ul>
</body>
</html>