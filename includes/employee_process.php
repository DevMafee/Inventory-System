<?php

include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");
include_once("manage.php");

//To get Employee
if (isset($_POST["getEmployee"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("employee");
	foreach ($rows as $row) {
		?>
		<tr>
	      <th scope="row"><?php echo $row["id"];?></th>
	      <td><?php echo $row["fullname"];?></td>
	      <td><?php echo $row["phone"];?></td>
	      <td><a href="#" class="btn btn-success btn-sm" >Active</a></td>
	      <td>
	      		<a href="#" class="btn btn-danger btn-sm">Delete</a>
	      		<a href="#" class="btn btn-info btn-sm">Edit</a>
	      </td>
	    </tr>
	<?PHP
	}
	exit();
}


//Add Employee
if (isset($_POST["addemployee"])) {

	$pass_hash = password_hash($_POST["password"],PASSWORD_BCRYPT,["cost"=>8]);

	$filename = $_FILES['photo']['name'];
	$img_type = pathinfo($filename, PATHINFO_EXTENSION);
	$photo ="employee-".uniqid().".".$img_type;
	$photo_temp = $_FILES['photo']['tmp_name'];
	if (move_uploaded_file($photo_temp, "../images/".$photo)) {
		$obj = new DBOperation();
		$result = $obj->addEmployee($_POST["fullname"],$_POST["email"],$pass_hash,$_POST["phone"],$photo,$_POST['employeefrom']);
		$msg = 'Employee Has Been Added.';
		$action = 'success';
		header("location:../dashboard.php?msg=$msg&action=$action");
		exit();
	}else{
		$msg = 'Employee can not be added This time.';
		$action = 'fail';
		header("location:../dashboard.php?msg=$msg&action=$action");
		exit();
	}

	
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







?>