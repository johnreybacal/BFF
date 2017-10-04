<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
<link rel="icon" type="icon/image" href="<?php echo base_url('css/favicon.png'); ?>">
</head>
<body>
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
		
				<div class="col-md-10" style="border: 3px solid blue;">
					<div class="table-responsive">						
						<table class="table">
						    <thead>
						      <tr>
						        <th>#</th>
						        <th>Firstname</th>
						        <th>Lastname</th>						        
						        <th>Address</th>
						        <th>Email</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <td>1</td>
						        <td>Anna</td>
						        <td>Pitt</td>						        
						        <td>New York</td>
						        <td>randomemail@yahoo.com</td>
						      </tr>
						    </tbody>
						    <tbody>
						      <tr>
						        <td>2</td>
						        <td>John</td>
						        <td>Doe</td>						        
						        <td>Nyork</td>
						        <td>sena@yahoo.com</td>
						      </tr>
						    </tbody>
						    <tbody>
						      <tr>
						        <td>3</td>
						        <td>Sue</td>
						        <td>Puth</td>						        
						        <td>AHHH Alabang Alabang Alabang</td>
						        <td>forn@yahoo.com</td>
						      </tr>
						    </tbody>
						    <tbody>
						      <tr>
						        <td>4</td>
						        <td>Baka!</td>
						        <td>Yamete</td>						        
						        <td>Saitama Japan</td>
						        <td>baca@yahoo.com</td>
						      </tr>
						    </tbody>

						  </table>
					</div>
				</div>
		</div>
</div>
</body>
</html>