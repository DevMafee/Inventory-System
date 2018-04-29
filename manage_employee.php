<?php
include_once("./database/constants.php");
$con = mysqli_connect(HOST,USER,PASS,DB);
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
	<title>ISP Solution</title>
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
				      <th scope="col">Name</th>
				      <th scope="col">Phone</th>
				      <th scope="col">Status</th>
				      <th scope="col">Actions</th>
				    </tr>
				  </thead>
				  <tbody>
<?php
$select_query=mysqli_query($con,"SELECT * FROM employee");

while ($row = mysqli_fetch_assoc($select_query)) {
	?>
					<tr>
				      <th scope="row"><?php echo $row['id'];?></th>
				      <td><?php echo $row['fullname'];?></td>
				      <td><?php echo $row['phone'];?></td>
				      <td><a href="#" class="btn btn-success btn-sm" >Active</a></td>
				      <td>
				      		<a href="#" class="btn btn-danger btn-sm">Delete</a>
				      		<a href="#" class="btn btn-warning btn-sm">Edit</a>
				      		<a href="#" class="btn btn-info btn-sm">View</a>
				      </td>
				    </tr>
	<?php
}

?>
				    <!-- <tr>
				      <th scope="row">1</th>
				      <td>Electronics</td>
				      <td>Root</td>
				      <td><a href="#" class="btn btn-success btn-sm" >Active</a></td>
				      <td>
				      		<a href="#" class="btn btn-danger btn-sm">Delete</a>
				      		<a href="#" class="btn btn-info btn-sm">Edit</a>
				      </td>
				    </tr> -->
				    
				  </tbody>
				</table>
			</div>

		</div>
		<?php
			include_once("./templates/update_category.php");
		?>
		
	</div><!-- Main Container close-->
</body>
</html>