<div class="container">
  <form class="form-signin" method = "POST" action = "<?php echo base_url('BFF/Signup/'); ?>">
    <h4 class="form-signin-heading"><strong>Brighten Flowers & Fruits</strong> <br/><br/>Sign up</h4>
    <label for="inputFirst" class="sr-only">First name</label>
    <input type="text" id="inputEmail" name = "fname" class="form-control" placeholder="First name" required autofocus>

    <label for="inputLast" class="sr-only">Last name</label>
    <input type="text" id="inputEmail" name = "lname" class="form-control" placeholder="Last name" required>
  
    <label for="inputLast" class="sr-only">Address</label>
    <input type="text" id="inputAddress" name = "addr" class="form-control" placeholder="Address" required>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name = "email" class="form-control" placeholder="Email address" required>

    <label for="inputContact" class="sr-only">Contact number</label>
    <input type="text" id="inputEmail" name = "contact" class="form-control" placeholder="Contact number" required>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name = "password" class="form-control" placeholder="Password" required>

    <button class="btn btn-lg btn-primary btn-block" name = "submit" type="submit">Create account!</button>
    <a href="<?php echo base_url('BFF/Home/'); ?>">Back to home </a>
  </form>

</div> <!-- /container -->