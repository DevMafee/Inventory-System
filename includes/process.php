<?php

include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");
include_once("manage.php");

//Codes for registration
if (isset($_POST["username"]) AND isset($_POST["email"])) {
	$user = new User();
	$result = $user->createUserAccount($_POST["username"], $_POST["email"], $_POST["password1"], $_POST["usertype"]);
	echo $result;
	exit();
}

//Codes for Login
if (isset($_POST["log_email"]) AND isset($_POST["log_password"])) {
	$user = new User();
	$result = $user->userLogin($_POST["log_email"], $_POST["log_password"]);
	echo $result;
	exit();
}

//To get Category
if (isset($_POST["getCategory"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("categories");
	foreach ($rows as $row) {
		echo "<option value='".$row["cid"]."'>".$row["category_name"]."</option>";
	}
	exit();
}



//To get Brands
if (isset($_POST["getBrand"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("brands");
	foreach ($rows as $row) {
		echo "<option value='".$row["bid"]."'>".$row["brand_name"]."</option>";
	}
	exit();
}

//Add Category
if (isset($_POST["category_name"]) AND isset($_POST["parent_cat"])) {
	$obj = new DBOperation();
	$result = $obj->addCategory($_POST["parent_cat"],$_POST["category_name"]);
	echo $result;
	exit();
}

//Add New Brand
if (isset($_POST["brand_name"])) {
	$obj = new DBOperation();
	$result = $obj->addBrand($_POST["brand_name"]);
	echo $result;
	exit();
}


//Add New Product
if (isset($_POST["added_date"]) AND isset($_POST["product_name"])) {
	$obj = new DBOperation();
	$result = $obj->addProduct($_POST["select_cat"],$_POST["select_brand"],$_POST["product_name"],$_POST["product_price"],$_POST["product_qty"],$_POST["added_date"]);
	echo $result;
	exit();
}

//manage Category
if (isset($_POST["manageCategory"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("categories",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = ($_POST["pageno"] -1) * 10;
		foreach ($rows as $row) {
			?>
				<tr>
			      <th scope="row"><?php echo ++$n;?></th>
			      <td><?php echo $row["category"];?></td>
			      <td><?php echo $row["parent"];?></td>
			      <td><a href="#" class="btn btn-success btn-sm" >Active</a></td>
			      <td>
			      	<a href="#" did="<?php echo $row['cid']; ?>" class="btn btn-danger btn-sm del_cat">Delete</a>
			      	<a href="#" eid="<?php echo $row['cid']; ?>" data-toggle="modal" data-target="#update_form_category" class="btn btn-info btn-sm edit_cat">Edit</a>
			      </td>
			    </tr>
			<?php
		}?>
					<tr>
						<td colspan="5"><?php echo $pagination;?></td>
					</tr>
		<?php
		exit();
	}
}

// Delete Category
if (isset($_POST["deleteCategory"])) {
	$m = new Manage();
	$result = $m->deleteRecord("categories","cid",$_POST["id"]);
	echo $result;
}


//Update Category
if (isset($_POST["updateCategory"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("categories","cid",$_POST["id"]);
	echo json_encode($result);
	exit();
}

//Update Record After Getting Data
if (isset($_POST["update_category"])) {
	$m = new Manage();
	$id = $_POST["cid"];
	$name = $_POST["update_category"];
	$parent = $_POST["parent_cat"];
	$result = $m->update_record("categories",["cid"=>$id],["parent_cat"=>$parent,"category_name"=>$name,"status"=>1]);
	echo $result;
}



////-----------------Brands-------------------///

//manage Brands
if (isset($_POST["manageBrand"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("brands",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = ($_POST["pageno"] -1) * 10;
		foreach ($rows as $row) {
			?>
				<tr>
			      <th scope="row"><?php echo ++$n;?></th>
			      <td><?php echo $row["brand_name"];?></td>
			      <td><a href="#" class="btn btn-success btn-sm" >Active</a></td>
			      <td>
			      	<a href="#" did="<?php echo $row['bid']; ?>" class="btn btn-danger btn-sm del_brand">Delete</a>
			      	<a href="#" eid="<?php echo $row['bid']; ?>" data-toggle="modal" data-target="#update_form_category" class="btn btn-info btn-sm edit_brand">Edit</a>
			      </td>
			    </tr>
			<?php
		}?>
					<tr>
						<td colspan="5"><?php echo $pagination;?></td>
					</tr>
		<?php
		exit();
	}
}

// Delete Brands
if (isset($_POST["deleteBrand"])) {
	$m = new Manage();
	$result = $m->deleteRecord("brands","bid",$_POST["id"]);
	echo $result;
}


//Update Brands
if (isset($_POST["updateBrand"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("brands","bid",$_POST["id"]);
	echo json_encode($result);
	exit();
}

//Update Record After Getting Data
if (isset($_POST["update_brand"])) {
	$m = new Manage();
	$id = $_POST["bid"];
	$name = $_POST["update_brand"];
	$result = $m->update_record("brands",["bid"=>$id],["brand_name"=>$name,"status"=>1]);
	echo $result;
}

////-----------------Products-------------------///

//manage Products
if (isset($_POST["manageProducts"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("products",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = ($_POST["pageno"] -1) * 10;
		foreach ($rows as $row) {
			?>
				<tr>
			      <th scope="row"><?php echo ++$n;?></th>
			      <td><?php echo $row["product_name"];?></td>
			      <td><?php echo $row["category_name"];?></td>
			      <td><?php echo $row["brand_name"];?></td>
			      <td><?php echo $row["product_price"];?></td>
			      <td><?php echo $row["product_stock"];?></td>
			      <td><?php echo $row["added_date"];?></td>
			      <td><a href="#" class="btn btn-success btn-sm" >Active</a></td>
			      <td>
			      	<a href="#" did="<?php echo $row['pid']; ?>" class="btn btn-danger btn-sm del_product">Delete</a>
			      	<a href="#" eid="<?php echo $row['pid']; ?>" data-toggle="modal" data-target="#form_products" class="btn btn-info btn-sm edit_product">Edit</a>
			      </td>
			    </tr>
			<?php
		}?>
					<tr>
						<td colspan="9"><?php echo $pagination;?></td>
					</tr>
		<?php
		exit();
	}
}

// Delete Products
if (isset($_POST["deleteProduct"])) {
	$m = new Manage();
	$result = $m->deleteRecord("products","pid",$_POST["id"]);
	echo $result;
}


//Update Products
if (isset($_POST["updateProduct"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("products","pid",$_POST["id"]);
	echo json_encode($result);
	exit();
}

//Update Record After Getting Data
if (isset($_POST["update_product"])) {
	$m = new Manage();
	$id = $_POST["pid"];
	$category = $_POST["select_cat"];
	$brand = $_POST["select_brand"];
	$name = $_POST["update_product"];
	$price = $_POST["product_price"];
	$stock = $_POST["product_qty"];
	$date = $_POST["added_date"];
	$result = $m->update_record("products",["pid"=>$id],["cid"=>$category,"bid"=>$brand,"product_name"=>$name,"product_price"=>$price,"product_stock"=>$stock,"added_date"=>$date]);
	echo $result;
}


//------------Order Processing----//
if (isset($_POST["getNewOrderItem"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("products");
	?>
	<tr>
		<td><b class="number">1</b></td>
		<td>
			<select class="form-control form-control-sm pid" name="pid[]">
				<option value="">Choose Product</option>
			<?php
				foreach ($rows as $row) {
			?>
					<option value="<?php echo $row['pid'];?>"><?php echo $row['product_name'];?></option>
			<?php
				}
			?>
			</select>
		</td>
		<td><input type="text" name="tqty[]" class="form-control form-control-sm tqty" readonly></td>
		<td><input type="text" name="qty[]" class="form-control form-control-sm qty" required></td>
		<td><input type="text" name="price[]" class="form-control form-control-sm price" readonly></td>
		<input type="hidden" name="pro_name[]" class="form-control form-control-sm pro_name">
		<td>Tk. <span class="amt">0</span>/=</td>
	</tr>
		<?php
		exit();
	}


	//------------Get Price And Qty of one row-------//
	if (isset($_POST["getPriceAndQty"])) {
		$m = new Manage();
		$result = $m->getSingleRecord("products","pid",$_POST["id"]);
		echo json_encode($result);
		exit();
	}
?>