$(document).ready(function(){
	var DOMAIN = "http://localhost/inv";

	//Manage Category
	manageCategory(1);
	function manageCategory(pn){
		$.ajax({
			url		: DOMAIN+"/includes/process.php",
			method	: "POST",
			data	: {manageCategory:1,pageno:pn},
			success	: function(data){
				$("#get_category").html(data);
			}
		})
	}

	$("body").delegate(".page-link","click",function(){
		var pn = $(this).attr("pn");
		manageCategory(pn);
	})

	//Delete Category
	$("body").delegate(".del_cat","click",function(){
		var did = $(this).attr("did");
		if (confirm("Delete! Are you Sure?")) {
			$.ajax({
				url		: DOMAIN+"/includes/process.php",
				method	: "POST",
				data	: {deleteCategory:1,id:did},
				success	: function(data){
					if (data == "DEPENDENT_CATEGORY") {
						alert("You Can not Delete this Category, Because this category has Sub Category.");
					}else if (data == "CATEGORY_DELETED") {
						alert("Category Deleted successfully.");
						manageCategory(1);
					}else if (data == "DELETED") {
						alert("Deleted successfully.");
					}else{
						alert(data);
					}
				}
			})
		}else{
			alert("No");
		}
	})

	//Fetch Category
	fetch_employee();
	function fetch_employee(){
		$.ajax({
			url		: DOMAIN+"/includes/employee_process.php",
			method	: "POST",
			data	: {getEmployee:1},
			success	: function(data) {
				$("#get_employee").html(data);
			}
		})
	}

	//Fetch Brand
	fetch_brand();
	function fetch_brand(){
		$.ajax({
			url		: DOMAIN+"/includes/process.php",
			method	: "POST",
			data	: {getBrand:1},
			success	: function(data) {
				var choose = "<option value=''>Choose a Brand</option>";
				$("#select_brand").html(choose+data);
			}
		})
	}


	//Update Category
	$("body").delegate(".edit_cat","click",function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url		: DOMAIN+"/includes/process.php",
			method	: "POST",
			dataType: "json",
			data 	: {updateCategory:1,id:eid},
			success : function(data){
				console.log(data);
				$("#cid").val(data["cid"]);
				$("#update_category").val(data["category_name"]);
				$("#parent_cat").val(data["parent_cat"]);
			}
		})
	})

	$("#update_category_form").on("submit",function(){
		if ($("#update_category").val() == "") {
			$("#update_category").addClass("border-danger");
			$("#cat_error").html("<span class='text-danger'>Please enter a Category Name.</span>");
		}else{
			$.ajax({
				url		: DOMAIN+"/includes/process.php",
				method	: "POST",
				data	: $("#update_category_form").serialize(),
				success	: function(data){
					if (data == "UPDATED") {
						alert("Category Has been Updated Successfully.");
						window.location.href = "";
					}
					else{
						alert("Category Can not Update Right Now. Try Later!");
					}
				}
			})
		}
	})


	//---------------------Brands-------------------------//

	//Manage Brands
	manageBrand(1);
	function manageBrand(pn){
		$.ajax({
			url		: DOMAIN+"/includes/process.php",
			method	: "POST",
			data	: {manageBrand:1,pageno:pn},
			success	: function(data){
				$("#get_brand").html(data);
			}
		})
	}

	$("body").delegate(".page-link","click",function(){
		var pn = $(this).attr("pn");
		manageBrand(pn);
	})

	//Delete Brand
	$("body").delegate(".del_brand","click",function(){
		var did = $(this).attr("did");
		if (confirm("Delete! Are you Sure?")) {
			$.ajax({
				url		: DOMAIN+"/includes/process.php",
				method	: "POST",
				data	: {deleteBrand:1,id:did},
				success	: function(data){
					if (data == "DELETED") {
						alert("Brand Has Been Deleted successfully.");
						manageBrand(1);
					}else{
						alert(data);
					}
				}
			})
		}else{
			alert("No");
		}
	})

	//Update Brand
	$("body").delegate(".edit_brand","click",function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url		: DOMAIN+"/includes/process.php",
			method	: "POST",
			dataType: "json",
			data 	: {updateBrand:1,id:eid},
			success : function(data){
				console.log(data);
				$("#bid").val(data["bid"]);
				$("#update_brand").val(data["brand_name"]);
			}
		})
	})

	$("#update_brand_form").on("submit",function(){
		if ($("#update_brand").val() == "") {
			$("#update_brand").addClass("border-danger");
			$("#cat_error").html("<span class='text-danger'>Please enter a Brand Name.</span>");
		}else{
			$.ajax({
				url		: DOMAIN+"/includes/process.php",
				method	: "POST",
				data	: $("#update_brand_form").serialize(),
				success	: function(data){
					if (data == "UPDATED") {
						alert("Brand Has been Updated Successfully.");
						window.location.href = "";
					}
					else{
						alert("Brand Can not Update Right Now. Try Later!");
					}
				}
			})
		}
	})


	//----------------Products---------------------//

	//Manage Products
	manageProducts(1);
	function manageProducts(pn){
		$.ajax({
			url		: DOMAIN+"/includes/process.php",
			method	: "POST",
			data	: {manageProducts:1,pageno:pn},
			success	: function(data){
				$("#get_products").html(data);
			}
		})
	}

	$("body").delegate(".page-link","click",function(){
		var pn = $(this).attr("pn");
		manageProducts(pn);
	})

	//Delete Products
	$("body").delegate(".del_product","click",function(){
		var did = $(this).attr("did");
		if (confirm("Delete! Are you Sure?")) {
			$.ajax({
				url		: DOMAIN+"/includes/process.php",
				method	: "POST",
				data	: {deleteProduct:1,id:did},
				success	: function(data){
					if (data == "DELETED") {
						alert("Product Has Been Deleted successfully.");
						manageProducts(1);
					}else{
						alert(data);
					}
				}
			})
		}else{
			alert("No");
		}
	})

	//Update Products
	$("body").delegate(".edit_product","click",function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url		: DOMAIN+"/includes/process.php",
			method	: "POST",
			dataType: "json",
			data 	: {updateProduct:1,id:eid},
			success : function(data){
				console.log(data);
				$("#pid").val(data["pid"]);
				$("#update_product").val(data["product_name"]);
				$("#select_cat").val(data["cid"]);
				$("#select_brand").val(data["bid"]);
				$("#product_price").val(data["product_price"]);
				$("#product_qty").val(data["product_stock"]);
			}
		})
	})

	$("#update_product_form").on("submit",function(){
		if ($("#update_product").val() == "") {
			$("#update_product").addClass("border-danger");
			$("#p_error").html("<span class='text-danger'>Please enter a Product Name.</span>");
		}else{
			$.ajax({
				url		: DOMAIN+"/includes/process.php",
				method	: "POST",
				data	: $("#update_product_form").serialize(),
				success	: function(data){
					if (data == "UPDATED") {
						alert("Product Has been Updated Successfully.");
						window.location.href = "";
					}
					else{
						alert("Product Can not Update Right Now. Try Later!");
					}
				}
			})
		}
	})

})