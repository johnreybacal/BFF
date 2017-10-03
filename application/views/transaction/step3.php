<center>
<form method = "POST" action = "<?php echo base_url('finishOrder/'); ?>">
    <h3>Step 3: Payment</h3>
    <div id = "lol">
    <table cellpadding="6" cellspacing="1" border="solid thin black">
        <tr><td>Cart total</td><td><strong><?php echo $bill; ?> Pesos</strong></td></tr>
        <tr><td>Shipping fee</td><td><strong><?php echo $ship; ?> Pesos</strong></td></tr>
        <tr><td>Total Bill</td><td><strong><?php echo $ship + $bill; ?> Pesos</strong></td></tr>
    </table>    
    <!-- <h5>Your reference code will be: <?php echo md5('0001'.$this->cart->total_items().$this->cart->total()) ?></h5> -->
    </div>
    <input type = "radio" name = "payment" value = "0" required />Cash on delivery/pickup<br />  
    <input type = "radio" name = "payment" value = "1" required />Credit/Debit card:<br />
    PIN: <input type = "text" name = "card-details" /><br />
    <hr />
    <input type = "submit" value = "Finish Transaction" />
</form>
</center>
<hr />