<!DOCTYPE html>
<html>
<head>
	<title>BFF - Admin</title>
	<script src = "<?php echo base_url('js/jquery.min.js'); ?>"></script>
</head>
<body>
	<a href = "<?php echo base_url('Admin/Dashboard'); ?>">go back</a>
	<p>will use client 0001 for now</p>
	Deliver to:<select>
		<option value="0">Pickup</option>
		<option value="200">Manila</option>
		<option value="300">Pasig</option>
		<option value="400">Marikina</option>		
	</select>
	<?php $pnsCounter = 0; ?>
	<table cellpadding="6" cellspacing="1" style = "border:solid thin pink;">
		<thead><tr><th>id</th><th>name</th><th>quantity</th></tr></thead>
		<tbody>
			<?php foreach($PnS as $items): ?>
			<tr>
			    <td id = "<?php echo $pnsCounter; ?>"><?php echo $items['id']; ?></td>
			    <td><?php echo $items['name']; ?></td>			    
			    <td><input type = "number" min = "0" id = "q-<?php echo $pnsCounter; ?>" /></td>      
			</tr>
			<?php $pnsCounter++; ?>			
			<?php endforeach; ?>
		</tbody>
	</table>
	<button id = "ok">see report</button>
	<table id = "result" cellpadding="6" cellspacing="1" style = "border:solid thin pink;"></table>
	<button id = "log">Log</button>
	<script>
		function logtransaction(save){
			var sf = $('select').val();
			var x = <?php echo $pnsCounter; ?>;
			var str = '';
			var ok = false;
			for(var i = 0; i < x; i++){
				if($('#q-' + i).val() && $('#q-' + i).val() > 0){
					str += '"' + $('#' + i).html() + '":"' + $('#q-' + i).val() + '",';
					ok = true;
				}
			}
			str = '{' + str.substring(0, str.length - 1) + '}';
			if(ok){
				$.ajax({
					url: "<?php echo base_url('Admin/makeCart'); ?>",		
					type: 'POST',
					contentType: 'application/json',
					data: str + '|' + sf,
					dataType: 'json'
				});
				$.ajax({
					url: "<?php echo base_url('Admin/displayCart'); ?>",
					success: function(data){
						$('#result').html(data);
					}
				});
				if(save){
					$.ajax({
						url: "<?php echo base_url('Admin/logTrans'); ?>",		
						type: 'POST',
						contentType: 'application/json',
						data: str,
						dataType: 'json'
					});
				}
			}else{
				alert("Can't log an empty cart");
			}
		}
		
		$('#ok').click(function(){
			logtransaction(false);
		});

		$('#log').click(function(){
			logtransaction(true);
		});
		// function
	</script>
</body>
</html>