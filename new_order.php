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
	<script src="./js/order.js"></script>

</head>
<body>
	<div class="overlay"><div class="loader"></div></div>
	<div class="container" style="margin-top: 5px">
		<?php include_once("./templates/navbar.php"); ?>
<br>
		<div class="row">
			<div class="col-md-12">
				<div class="card" style="box-shadow: 0 0 25px 0 LightGray;">
				  <h4 class="card-header">Make a New Order </h4>
				  <div class="card-body">
				  	<form onsubmit="return false">
					  	<div class="form-group row">
					  		<label class="col-sm-3 col-form-label" align="right">Order Date :</label>
					  		<input type="text" name="" class="form-control col-sm-6" readonly value="<?php echo date('Y-m-d'); ?>">
					  	</div>
					  	<div class="form-group row">
					  		<label class="col-sm-3 col-form-label" align="right">Customer Name :</label>
					  		<input type="text" required name="" class="form-control col-sm-6" placeholder="Customer Name">
					  	</div>
					  	<div class="card" style="box-shadow: 0 0 50px 0 LightGray;">
					  		<div class="card-body">
					  			<h4>Make a Order List</h4>
					  			<table align="center" style="width: 800px;">
					  				<thead>
					  					<tr>
					  						<th style="text-align: center;">#</th>
					  						<th style="text-align: center;">Item Name</th>
					  						<th style="text-align: center;">Total Quantity</th>
					  						<th style="text-align: center;">Quantity</th>
					  						<th style="text-align: center;">Price</th>
					  						<th style="text-align: left;">Total</th>
					  					</tr>
					  				</thead>
		<tbody id="invoice_item">
			<!--<tr>
				<td><b id="number">1</b></td>
				<td>
					<select class="form-control form-control-sm" name="pid[]">
						<option>Washing Machine</option>
					</select>
				</td>
				<td><input type="text" name="tqty[]" class="form-control form-control-sm" readonly></td>
				<td><input type="text" name="qty[]" class="form-control form-control-sm" required></td>
				<td><input type="text" name="price[]" class="form-control form-control-sm" readonly></td>
				<td>Tk. 35000/=</td>
			</tr>-->
		</tbody>
					  			</table><!--Table Ends-->
  			<center style="padding: 10px;">
  				<button id="add" class="btn btn-success" style="width:150px">Add Item</button>
  				<button id="remove" class="btn btn-danger" style="width:150px">Remove Item</button>
  			</center>
					  		</div><!--Inner Card-Body Ends-->
					  	</div><!--Inner Card Ends--><br>
					  	<div class="form-group row">
					  		<label class="col-sm-3 col-form-label" align="right">SubTotal :</label>
					  		<input type="text" required name="sub_total" id="sub_total" class="form-control col-sm-6">
					  	</div>
					  	<div class="form-group row">
					  		<label class="col-sm-3 col-form-label" align="right">GST (18%) :</label>
					  		<input type="text" required name="gst" id="gst" class="form-control col-sm-6">
					  	</div>
					  	<div class="form-group row">
					  		<label class="col-sm-3 col-form-label" align="right">Discount :</label>
					  		<input type="text" required name="discount" id="discount" class="form-control col-sm-6">
					  	</div>
					  	<div class="form-group row">
					  		<label class="col-sm-3 col-form-label" align="right">Net Total :</label>
					  		<input type="text" required name="net_total" id="net_total" class="form-control col-sm-6">
					  	</div>
					  	<div class="form-group row">
					  		<label class="col-sm-3 col-form-label" align="right">Paid :</label>
					  		<input type="text" required name="paid" id="paid" class="form-control col-sm-6">
					  	</div>
					  	<div class="form-group row">
					  		<label class="col-sm-3 col-form-label" align="right">Due :</label>
					  		<input type="text" required name="due" id="due" class="form-control col-sm-6">
					  	</div>
					  	<div class="form-group row">
					  		<label class="col-sm-3 col-form-label" align="right">Payment Method :</label>
					  		<select required name="payment_type" id="payment_type" class="form-control col-sm-6">
					  			<option value="">Select a Payment Method</option>
					  			<option value="cash">Cash</option>
					  			<option value="card">Card</option>
					  			<option value="check">Check</option>
					  			<option value="bkash">Bkash</option>
					  		</select>
					  	</div>
					  	<center>
					  		<input type="submit" id="order_form" style="width:150px;" class="btn btn-info" value="Order">
					  		<input type="submit" id="print_invoice" style="width:150px;" class="btn btn-success d-none" value="Order">
					  	</center>
				  	</form>
				  </div><!--outer Card-Body Ends-->
				</div><!--outer Card Ends-->
			</div>

		</div>
	<?php
		include_once("./templates/update_brands.php");
	?>
		
	</div><!-- Main Container close-->
</body>
</html>