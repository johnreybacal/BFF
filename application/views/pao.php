<br />
<br />
<center>
<h1>Ordering Process:</h1>
<h3>Step 1: Fill your cart</h3>
<table cellpadding="6" cellspacing="1" border="solid thin black">
<thead><tr><th>id</th><th>name</th><th>price</th><th>quantity</th><th>Action</th></tr></thead>
<tbody>
<?php foreach($PnS as $items): ?>
  <tr>
    <td><?php echo $items['id'] ?></td>
    <td><?php echo $items['name'] ?></td>
    <td><?php echo $items['price'] ?></td>
    <td><input type = "number" min = "1" id = "<?php echo $items['id'] ?>" /></td>
    <td>
      <button class = "addToCart" data-id = "<?php echo $items['id'] ?>" data-name = "<?php echo $items['name'] ?>" data-price = "<?php echo $items['price'] ?>">Add to cart</button>
    </td>    
  </tr>
<?php endforeach; ?>
</tbody>
</table>
<hr />
<h4>Your Cart</h4>
<a href = "<?php echo base_url('BFF/emptyCart/'); ?>">Empty cart</a>
<table id = "cart" cellpadding="6" cellspacing="1" border="solid thin black">
<thead>
  <tr><th>id</th><th>name</th><th>price</th><th>quantity</th><th>total price</th><th>Action</th></tr>
</thead>
<tbody>
<?php foreach($this->cart->contents() as $items): ?>
  <tr>        
    <td><?php echo $items['id'] ?></td>
    <td><?php echo $items['name'] ?></td>
    <td><?php echo $items['price'] ?></td>
    <td><?php echo $items['qty'] ?></td>
    <td><?php echo $items['price'] * $items['qty'] ?></td>
    <td>
      <a href = "<?php echo base_url('BFF/removeFromCart/'.$items['rowid']); ?>">Remove from cart</a>
    </td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>
<hr />
<h3>Step 2: Location</h3>
<form method = "POST">
  <input type = "radio" name = "address" />Deliver to my address<br />
  <input type = "radio" name = "address" />I'll pick it up myself<br />
  <input type = "radio" name = "address" />Deliver to a different address:
  <input type = "text" name = "diffAddress" />
  <hr />
  <h3>Step 3: Payment</h3>
  <div id = "lol">
  <h5>Your bill is: <strong><?php echo $this->cart->total(); ?> Pesos</strong></h5>
  <h5>Your reference code will be: <?php echo md5(str_shuffle('0001'.$this->cart->total_items().$this->cart->total())) ?></h5>
  </div>
  <input type = "radio" name = "payment" />Cash on delivery/pickup<br />  
  <input type = "radio" name = "payment" />Credit/Debit card:<br />
  PIN: <input type = "text" name = "cardDetails" /><br />
  <hr />
  <input type = "submit" value = "Finish Transaction" />
</form>
</center>
<script>
  $('.addToCart').click(function(){    
    var id = $(this).data('id');
    var name = $(this).data('name');
    var price = $(this).data('price');
    var quantity = $('#' + id).val();    
    if(quantity != '' && quantity > 0){
      $.ajax({
        url: "<?php echo base_url('BFF/addToCart/'); ?>"+id+"/"+name+"/"+quantity+"/"+price,
        success: function(data){
          alert(quantity + " " + name + "(s) added to cart");
          $('#cart').html(data);
        }
      });      
      $.ajax({
        url: "<?php echo base_url('BFF/getRefCode/'); ?>",
        success: function(data){
          $('#lol').html(data);
        }
      });

    }else{
      alert("Invalid quantity");
    }    
    $('#' + id).val('');
  });
</script>
<!-- <div class="container" style = "margin-top:56px">
  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills float-right">
        <li class="nav-item">
          <p><a class="btn btn-bg btn-primary" href="<?php echo base_url('BFF/Products_and_Services/')?>" role="button">Continue shopping</a></p>
        </li>
      </ul>
    </nav>
    <h3 class="text-success">Brighten Flowers & Fruits</h3>
  </div>

  <div class="jumbotron">
    <h3 class="display-5 text-danger">There are no items in the cart.</h3>
  </div>

  <div class="row marketing">
    <div class="col-lg-6">
      <h4>Subheading</h4>
      <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

      <h4>Subheading</h4>
      <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
    </div>

    <div class="col-lg-6">
      <h4>Subheading</h4>
      <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

      <h4>Subheading</h4>
      <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
  </div>


</div-->