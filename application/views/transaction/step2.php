<center>
<form method = "POST" action = "<?php echo base_url('BFF/transact_loc/'); ?>">
	<h3>Step 2: Location</h3>
	<input type = "radio" name = "address" value = "0" required />Deliver to my address<br />
	<input type = "radio" name = "address" value = "1" required />I'll pick it up myself<br />
	<input type = "radio" name = "address" value = "2" required />Deliver to a different address
	<input type = "submit" value = "Next" />
</form>
</center>
<hr />