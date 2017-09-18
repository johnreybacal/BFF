<div class="container">
  <form class="form-signin" method = "POST" action = "<?php echo base_url('BFF/Login/'); ?>">
    <h4 class="form-signin-heading">Brighten flowers & fruits <br/><br/><b>Sign in</b></h4>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name = "email" class="form-control" placeholder="Email address" required>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name = "password" class="form-control" placeholder="Password" required>

    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" name = "submit" type="submit">Sign in</button>
    <a href="<?php echo base_url('BFF/Home/'); ?>">Back to home </a>
  </form>
</div> <!-- /container -->