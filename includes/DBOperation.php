<?php
/**
* 
*/
class DBOperation
{
	private $con;
	function __construct()
	{
		include_once("../database/db.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function addEmployee($fullname,$email,$password,$phone,$photo,$employeefrom){
		$status = 1;
		$pre_stmt = $this->con->prepare("INSERT INTO `employee`(`fullname`, `email`, `password`, `phone`, `photo`, `employeefrom`) VALUES (?,?,?,?,?,?)");
		
		$pre_stmt->bind_param("ssssss",$fullname,$email,$password,$phone,$photo,$employeefrom);
		$result = $pre_stmt->execute() or die($this->con->error);
		if ($result) {
			return true;
		}else{
			return false;
		}
	}

	//To get all Record
	public function getAllRecord($table){
		$pre_stmt = $this->con->prepare("SELECT * FROM ".$table);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		$rows = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}else{
			return "NO_DATA";
		}
	}

	//To Add New Brand
	public function addBrand($brand_name){
		$status = 1;
		$pre_stmt = $this->con->prepare("INSERT INTO `brands`(`brand_name`, `status`) VALUES (?,?)");
		
		$pre_stmt->bind_param("si",$brand_name,$status);
		$result = $pre_stmt->execute() or die($this->con->error);
		if ($result) {
			return "BRAND_ADDED";
		}else{
			return 0;
		}
	}


	//To Add New Product
	public function addProduct($cid,$bid,$pro_name,$price,$stock,$date){
		$status = 1;
		$pre_stmt = $this->con->prepare("INSERT INTO `products`(`cid`, `bid`, `product_name`, `product_price`, `product_stock`, `added_date`, `p_status`) VALUES (?,?,?,?,?,?,?)");
		
		$pre_stmt->bind_param("iisdisi",$cid,$bid,$pro_name,$price,$stock,$date,$status);
		$result = $pre_stmt->execute() or die($this->con->error);
		if ($result) {
			return "NEW_PRODUCT_ADDED";
		}else{
			return 0;
		}
	}


}

//$opr = new DBOperation();
//echo $opr->addCategory(0,"Software");
//echo "<pre>";
//print_r($opr->getAllRecord("categories"));
?>