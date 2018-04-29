<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
	header("location:".DOMAIN."/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory System</title>
	<!-- Latest compiled and minified JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="./css/style.css" rel="stylesheet">
	<script src="./js/manage.js"></script>
</head>
<body>
	<div class="container" style="margin-top: 5px">
		<?php include_once("./templates/navbar.php"); ?>
<br>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-hover table-bordered">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Product</th>
				      <th scope="col">Category</th>
				      <th scope="col">Brand</th>
				      <th scope="col">Price</th>
				      <th scope="col">Stock</th>
				      <th scope="col">Added Date</th>
				      <th scope="col">Status</th>
				      <th scope="col">Actions</th>
				    </tr>
				  </thead>
				  <tbody id="get_products">

				    <!--<tr>
				      <th scope="row">1</th>
				      <td>Electronics</td>
				      <td>Root</td>
				      <td><a href="#" class="btn btn-success btn-sm" >Active</a></td>
				      <td>
				      		<a href="#" class="btn btn-danger btn-sm">Delete</a>
				      		<a href="#" class="btn btn-info btn-sm">Edit</a>
				      </td>
				    </tr>-->
				    
				  </tbody>
				</table>
			</div>

		</div>
		<?php
			include_once("./templates/update_products.php");
		?>
		
	</div><!-- Main Container close-->
</body>
</html>