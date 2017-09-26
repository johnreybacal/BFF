<center>
<form method = "POST" action = "<?php echo base_url('BFF/transact_pay/'); ?>">
    <h3>Step 3: Payment</h3>
    <div id = "lol">
    <h5>Your bill is: <strong><?php echo $bill; ?> Pesos</strong></h5>        
    <h6>Shipping fee is: <strong><?php echo $ship; ?> Pesos</strong></h6>        
    <h5>Your reference code will be: <?php echo md5('0001'.$this->cart->total_items().$this->cart->total()) ?></h5>
    </div>
    <input type = "radio" name = "payment" value = "0" required />Cash on delivery/pickup<br />  
    <input type = "radio" name = "payment" value = "1" required />Credit/Debit card:<br />
    PIN: <input type = "text" name = "card-details" /><br />
    <hr />
    <input type = "submit" value = "Finish Transaction" />
</form>
</center>
<hr />