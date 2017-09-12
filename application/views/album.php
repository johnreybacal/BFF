<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "includes/head.php"; ?>
    <?php include "includes/head.php"; ?>
    <link href="<?php echo base_url('css/album.css'); ?>" rel="stylesheet">
  </head>

  <body>

    <div class="collapse bg-inverse" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 py-4">
            <h4 class="text-white">About</h4>
            <p class="text-muted">Brighten Flowers & Fruits is a sole proprietorship business established on November 23, 2000 owned and managed by Benita “Nenette” Manalo Amante as the general manager.The shop is located at 1758 Singalong cor. Julio Nakpil St. Malate, Manila.</p>
          </div>
          <div class="col-sm-4 py-4">
            <h4 class="text-white">Contact</h4>
            <ul class="list-unstyled">
              <li><a href="http://www.twitter.com" class="text-white">Follow on Twitter</a></li>
              <li><a href="http://www.facebook.com" class="text-white">Like on Facebook</a></li>
              <li><a href="http://www.gmail.com" class="text-white">Email me</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-inverse bg-inverse">
      <div class="container d-flex justify-content-between">
        <a href="#" class="navbar-brand">Album</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>

    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">Featured Albums</h1>
        <p class="lead text-muted">Featured flowers, events, and decorations</p>
        <p>
          <a href="<?php echo base_url('BFF/Login/'); ?>" class="btn btn-primary">Sign in!</a>
          <a href="<?php echo base_url('BFF/Home/'); ?>" class="btn btn-secondary">Go to Home</a>
        </p>
      </div>
    </section>

    <div class="album text-muted">
    
      <div class="container">
        <div class="row">
          <div class="card">
            <img src="<?php echo base_url('css/img/slide3.jpg'); ?>" alt="Card image cap">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card">
            <img src="<?php echo base_url('css/img/slide3.jpg'); ?>" alt="Card image cap">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card">
            <img src="<?php echo base_url('css/img/slide3.jpg'); ?>" alt="Card image cap">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>

          <div class="card">
            <img src="<?php echo base_url('css/img/slide3.jpg'); ?>" alt="Card image cap">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card">
            <img src="<?php echo base_url('css/img/slide3.jpg'); ?>" alt="Card image cap">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card">
            <img src="<?php echo base_url('css/img/slide3.jpg'); ?>" alt="Card image cap">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>

          <div class="card">
            <img src="<?php echo base_url('css/img/slide3.jpg'); ?>" alt="Card image cap">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card">
            <img src="<?php echo base_url('css/img/slide3.jpg'); ?>" alt="Card image cap">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card">
            <img src="<?php echo base_url('css/img/slide3.jpg'); ?>" alt="Card image cap">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
        </div>

      </div>
    </div>

    <?php include "includes/footer.php"; ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script>
      $(function () {
        Holder.addTheme("thumb", { background: "#55595c", foreground: "#eceeef", text: "Thumbnail" });
      });
    </script>
    <?php include "includes/js.php"; ?>
  </body>
</html>
