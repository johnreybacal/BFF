<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "includes/head.php"; ?>
    <link href="<?php echo base_url('css/pao.css'); ?>" rel="stylesheet">
  </head>

  <body>

    <?php include "includes/nav.php"; ?>
    <div class="container" style = "margin-top:56px">
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


    </div> <!-- /container -->
      <?php include "includes/footer.php"; ?>      

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?php include "includes/js.php"; ?>
  </body>
</html>
