<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <a class="navbar-brand" href="./" alt="My Super Shop" title="My Super Shop" ><img src="images/logo.png" height="50px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" style="font-size: 16px">
      <li class="nav-item active">
        <a class="nav-link" href="./dashboard.php"><i class="fa fa-home">&nbsp;</i>Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Users</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Manage
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="./manage_categories.php">Manage Categories</a>
          <a class="dropdown-item" href="./manage_brands.php">Manage Brands</a>
          <a class="dropdown-item" href="manage_products.php">Manage Products</a>
        </div>
      </li>
      
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Order
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="new_order.php">New Order</a>
          <a class="dropdown-item" href="#">Manage Orders</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>&nbsp;
  <?php if (isset($_SESSION["userid"])) {?>
    <a href="logout.php" class="btn btn-warning"><i class="fa fa-user">&nbsp;</i>Logout</a>
  <?php }else{?>
    <a href="register.php" class="btn btn-info"><i class="fa fa-user">&nbsp;</i>Signup Now</a>
  <?php } ?>
  
</nav>