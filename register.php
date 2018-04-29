<?php include_once("./templates/header.php"); ?>
<body>
	<div class="overlay"><div class="loader"></div></div>
	<div class="container" style="margin-top: 5px">
		<?php include_once("./templates/navbar_index.php"); ?>
<br>
		<div class="card mx-auto" style="width: 25rem;">
		  <img class="card-img-top" src="./images/signup.png" alt="Inventory System">
		  <div class="card-body">
		    <h5 class="card-title">Signup for a New Account</h5>
		    <p class="card-text">
		    	<form id="register_form" onsubmit="return false" autocomplete="off">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Full Name <span style="color: red;">*</span></label>
				    <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Your Full Name" autofocus>
				    <small id="u_error" class="form-text text-muted"></small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address <span style="color: red;">*</span></label>
				    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Your email">
				    <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password <span style="color: red;">*</span></label>
				    <input type="password" name="password1" class="form-control" id="password1" placeholder="Password">
				    <small id="p1_error" class="form-text text-muted"></small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Re-Password <span style="color: red;">*</span></label>
				    <input type="password" name="password2" class="form-control" id="password2" placeholder="Re enter Password">
				    <small id="p2_error" class="form-text text-muted"></small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">User Types <span style="color: red;">*</span></label>
				    <select class="form-control" name="usertype" id="usertype">
				    	<option value="">Choose User type</option>
				    	<option value="1">Admin</option>
				    	<option value="0">Other</option>
				    </select>
				    <small id="t_error" class="form-text text-muted"></small>
				  </div>
				  <button type="submit" class="btn btn-primary"><i class="fa fa-check-square" aria-hidden="true">&nbsp;</i>Register Now</button>
				</form>
		    </p>
		    
		  </div>
		  <div class="card-footer"><a href="./">Already have an account? Login here</a></div>
		</div>


	</div><!-- Main Container close-->
</body>
</html>