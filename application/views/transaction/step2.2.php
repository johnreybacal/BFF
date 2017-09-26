<center>
<form method = "POST" action = "<?php echo base_url('BFF/transact_exloc/'); ?>">
	<h3>Step 2: Location</h3>
	<text>I'm in:</text><br />
	<input type = "radio" name = "ship_address" value = "200" required />Manila - shipping fee - 200 pesos<br />
	<input type = "radio" name = "ship_address" value = "300" required />Pasig - shipping fee - 300 pesos<br />
	<input type = "radio" name = "ship_address" value = "400" required />Marikina - shipping fee - 400 pesos<br />
	<input type = "text" name = "exact_address" placeholder = "exact address" required />
	<input type = "submit" value = "Next" />
</form>
</center>
<hr />