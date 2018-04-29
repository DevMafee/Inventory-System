<?php
include_once("./database/constants.php");
if (isset($_SESSION["userid"])) {
	header("location:".DOMAIN."/dashboard.php");
}
?>
<?php include_once("./templates/header.php"); ?>
<body>
	<div class="overlay"><div class="loader"></div></div>
	<div class="container" style="margin-top: 5px">
		<?php //include_once("./templates/navbar_index.php"); ?>
<br>
		<div style="width: 25rem;text-align: center;" class="mx-auto">
			<?php if(isset($_GET["msg"]) AND !empty($_GET["msg"])){?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <?php echo $_GET["msg"];?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<?php } ?>
		</div>
		<div class="card mx-auto" style="width: 100%; max-width: 350px;">
		  
		  <img class="card-img-top" src="./images/login.png" alt="Inventory System">

		  <div class="card-body">
		    <p class="card-text">
		    	<form id="login_form" onsubmit="return false">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" name="log_email" id="log_email" placeholder="Enter email" autofocus>
				    <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" name="log_password" id="log_password" placeholder="Password">
				    <small id="p_error" class="form-text text-muted"></small>
				  </div>
				  <div class="form-check">
				    <input type="checkbox" class="form-check-input" id="exampleCheck1">
				    <label class="form-check-label" for="exampleCheck1">Check me out</label>
				  </div>
				  <button type="submit" class="btn btn-primary">Login Now</button>&nbsp; &nbsp;<a href="./register.php" class="btn btn-success">Register new user</a>
				</form>
		    </p>
		    
		  </div>
		  <div class="card-footer"><a href="#">Forgot Password?</a></div>
		</div>


	</div><!-- Main Container close-->
</body>
</html>