<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
	header("location:".DOMAIN."/index.php");
}
?>
<?php include_once("./templates/header.php"); ?>
<body>
	<div class="container" style="margin-top: 5px">
		<?php include_once("./templates/navbar.php"); ?>
<br>
<?php
if (isset($_GET['msg']) && isset($_GET['action'])) {
	if ($_GET['action'] == 'success') {
		?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Success!</strong> <?php echo $_GET['msg'];?>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<?php
	}else{
		?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong>Warning!</strong> <?php echo $_GET['msg'];?>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<?php
	}
}

?>
		<div class="row">
			<div class="col-md-2">
				<div class="card" style="width: 100%;">
				  <img class="card-img-top mx-auto img-thumbnail" style="width: 60%" src="./images/<?php echo $_SESSION['photo'];?>" alt="Md Salman Sajib">
				  <div class="card-body">
				    <p class="card-title"><i class="fa fa-user">&nbsp;</i> <?php echo $_SESSION['username'];?></p>
				    <p class="card-text">User: <?php echo $_SESSION['usertype'];?></p>
				    <p class="card-text">Last Login:<br> <?php echo $_SESSION['last_login'];?></p>
				    <a href="#" class="btn btn-info"><i class="fa fa-pencil-square-o">&nbsp;</i>Edit Profile</a>
				  </div>
				</div>
			</div>
<style type="text/css">
	table tbody tr{
		height: 10px;
		line-height: 10px;
		padding: 0 0 0 0;
	}
	.table td, .table th{
		padding: 2px;
    	vertical-align: middle;
    	border-top: 1px solid #dee2e6;
	}
</style>
			<div class="col-md-10">
				<div class="alert alert-primary" style="width: 100%; height: 100%;">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
							  <div class="card-header row">
							    <div class="col-md-8">All Clients</div>
							    <div class="col-md-4"><input type="text" name="client_search" class="form-control" id="client_search" placeholder="Client Search"></div>
							  </div>
							  <div class="card-body" style="height:300px;width:100%;border:1px solid #ccc;overflow:auto;">
							    <table class="table table-hover">
								  <thead class="thead-dark">
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Name</th>
								      <th scope="col">Phone</th>
								      <th scope="col">Bill Info</th>
								      <th scope="col">Status</th>
								      <th scope="col">Action</th>
								    </tr>
								  </thead>
								  <tbody>

								    <tr>
								      <td>IM5214</th>
								      <td>Md Abul Khan</td>
								      <td>01711000011</td>
								      <td>500 .BDT</td>
								      <td><label class="alert alert-success">Paid (02-02-2018)</label></td>
								      <td><a href="#" class="btn btn-info">View Details</a></td>
								    </tr>
								    <tr>
								      <td>IM5214</th>
								      <td>Md Abul Khan</td>
								      <td>01711000011</td>
								      <td>500 .BDT</td>
								      <td><label class="alert alert-danger">Unpaid (02-01-2018)</label></td>
								      <td><a href="#" class="btn btn-info">View Details</a></td>
								    </tr>

								  </tbody>
								</table>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-4">
				<div class="card">
				  <div class="card-header" style="background-color: #00ACED; color: white;">
				    Employee Settings
				  </div>
				  <div class="card-body">
				    <h5 class="card-title">Employee</h5>
				    <p class="card-text">Here you can add, Edit or delete Employees.</p>
				    <a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-info"><i class="fa fa-plus">&nbsp;</i>Add</a> <a href="manage_employee.php" class="btn btn-success"><i class="fa fa-gear">&nbsp;</i>Manage</a>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
				  <div class="card-header" style="background-color: #3B5998; color: white;">
				    Clients Settings
				  </div>
				  <div class="card-body">
				    <h5 class="card-title">Keep update your clients.</h5>
				    <p class="card-text">Here you can add, Edit, delete, make payment Clients.</p>
				    <a href="#" data-toggle="modal" data-target="#form_brand" class="btn btn-info"><i class="fa fa-plus">&nbsp;</i>Add</a> <a href="manage_brands.php" class="btn btn-success"><i class="fa fa-gear">&nbsp;</i>Manage</a>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
				  <div class="card-header" style="background-color: #C92228; color: white;">
				    Packages Settings
				  </div>
				  <div class="card-body">
				    <h5 class="card-title">Packages</h5>
				    <p class="card-text">Here you can add, Edit or delete Packages.</p>
				    <a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-info"><i class="fa fa-plus">&nbsp;</i>Add</a> <a href="manage_products.php" class="btn btn-success"><i class="fa fa-gear">&nbsp;</i>Manage</a>
				  </div>
				</div>
			</div>
		</div>

		<?php
			//category modal
			include_once("./templates/employee.php");

			//brand modal
			include_once("./templates/clients.php");

			//products modal
			include_once("./templates/products.php");


		?>


	</div><!-- Main Container close-->
</body>
</html>