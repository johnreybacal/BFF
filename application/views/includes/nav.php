<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url('BFF/Home/'); ?>">Brighten Flowers & Fruits</a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="active">
            <a class="nav-link custom-active" href="<?php echo base_url('BFF/Home/'); ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('BFF/Order/'); ?>">Place an Order</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Products and Services
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="navbar-item"><a class="nav-link" href="<?php echo base_url('BFF/Products_and_Services/'); ?>">All</a></li>
              <li class="navbar-item"><a class="nav-link" href="<?php echo base_url('BFF/Products_and_Services/Weddings'); ?>">Weddings</a></li>
              <li class="navbar-item"><a class="nav-link" href="<?php echo base_url('BFF/Products_and_Services/Inaugurals'); ?>">Inaugurals</a></li>
              <li class="navbar-item"><a class="nav-link" href="<?php echo base_url('BFF/Products_and_Services/Bouquet'); ?>">Bouquet</a></li>
              <li class="navbar-item"><a class="nav-link" href="<?php echo base_url('BFF/Products_and_Services/Vase'); ?>">Vase</a></li>
              <li class="navbar-item"><a class="nav-link" href="<?php echo base_url('BFF/Products_and_Services/Sympathy'); ?>">Sympathy</a></li>
              <li class="navbar-item"><a class="nav-link" href="<?php echo base_url('BFF/Products_and_Services/Fruits_with_Balloons_and_Decor'); ?>">Fruits with Balloons & Decor</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('BFF/AboutUs/'); ?>">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('BFF/ContactUs/'); ?>">Contact Us</a>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('BFF/Signup/'); ?>"><span class="glyphycion glyphycion-user"></span> Sign Up</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('BFF/Login/'); ?>"><span class="glyphicon glyphicon-user"></span> Login</a></li>
        </ul>
      </div>
    </nav>