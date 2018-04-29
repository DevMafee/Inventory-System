$(document).ready(function(){
	var DOMAIN = "http://localhost/inv";
	$("#register_form").on("submit",function(){
		var status = false;
		var name = $("#username");
		var email = $("#email");
		var pass1 = $("#password1");
		var pass2 = $("#password2");
		var type = $("#usertype");
		var n_patt = new RegExp(/^[A-Za-z ]+$/);
		var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
		if (name.val() == "" || name.val().length < 6) {
			name.addClass("border-danger");
			$("#u_error").html("<span class='text-danger'>Please enter your name and name should be more than 6 charecter long.</span>");
			status = false;
		}else{
			name.removeClass("border-danger");
			$("#u_error").html("");
			status = true;
		}
		if (!e_patt.test(email.val())) {
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please enter a Valid Email Address.</span>");
			status = false;
		}else{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}
		if (pass1.val() == "" || pass1.val().length < 8) {
			pass1.addClass("border-danger");
			$("#p1_error").html("<span class='text-danger'>Password required atleast 8 Charecters.</span>");
			status = false;
		}else{
			pass1.removeClass("border-danger");
			$("#p1_error").html("");
			status = true;
		}
		if (pass2.val() == "" || pass2.val().length < 8) {
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Password required atleast 8 Charecters.</span>");
			status = false;
		}else{
			pass2.removeClass("border-danger");
			$("#p2_error").html("");
			status = true;
		}
		if (type.val() == "") {
			type.addClass("border-danger");
			$("#t_error").html("<span class='text-danger'>Please Select an User type.</span>");
			status = false;
		}else{
			type.removeClass("border-danger");
			$("#t_error").html("");
			status = true;
		}
		if ((pass1.val() == pass2.val()) && status == true) {
			$(".overlay").show();
			$.ajax({
				url		: DOMAIN+"/includes/process.php",
				method	: "POST",
				data	: $("#register_form").serialize(),
				success	:function(data){
					if (data == "EMAIL_ALREADY_EXISTS") {
						$(".overlay").hide();
						alert("Your email is already been used!");
					}else if (data == "SOME_ERROR") {
						$(".overlay").hide();
						alert("Something error!");
					}else{
						$(".overlay").hide();
						window.location.href = encodeURI(DOMAIN+"/index.php?msg=You are registered, Now you can Login.");
					}
				}
			})
		}else{
			type.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Password does not match.</span>");
			status = false;
		}

	})

	// Codes for login
	$("#login_form").on("submit",function(){
		var email = $("#log_email");
		var pass = $("#log_password");
		var status = false;
		if (email.val() == "") {
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please Enter a Valid Email Address.</span>");
			status = false;
		}else{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}
		if (pass.val() == "") {
			pass.addClass("border-danger");
			$("#p_error").html("<span class='text-danger'>Please Enter Your Password.</span>");
			status = false;
		}else{
			pass.removeClass("border-danger");
			$("#p_error").html("");
			status = true;
		}
		if (status == true) {
			$(".overlay").show();
			$.ajax({
				url		: DOMAIN+"/includes/process.php",
				method	: "POST",
				data	: $("#login_form").serialize(),
				success	:function(data){
					if (data == "EMAIL_NOT_REGISTERED") {
						$(".overlay").hide();
						email.addClass("border-danger");
						$("#e_error").html("<span class='text-danger'>Your Email is not registered. <a href='register.php'>Register Now</a></span>");
					}else if (data == "PASSWORD_DID_NOT_MATCH") {
						$(".overlay").hide();
						pass.addClass("border-danger");
						$("#p_error").html("<span class='text-danger'>Please enter correct Password.</span>");
					}else{
						$(".overlay").hide();
						console.log(data);
						window.location.href = encodeURI(DOMAIN+"/dashboard.php");
					}
				}
			})
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
				
			}
		})
	}


	// //Codes for adding Employee
	// $("#employee_form").on("submit",function(){
	// 	var fullname = $("#fullname");
	// 	var email = $("#email");
	// 	var password = $("#password");
	// 	var phone = $("#phone");
	// 	var photo = $("#photo");
	// 	var employeefrom = $("#employeefrom");
	// 	var status = true;
	// 	if (fullname.val() == "" || fullname.val().length < 4) {
	// 		fullname.addClass("border-danger");
	// 		$("#fullname_error").html("<span class='text-danger'>Please enter your name and name should be more than 4 charecter long.</span>");
	// 		status = false;
	// 	}else{
	// 		fullname.removeClass("border-danger");
	// 		$("#fullname_error").html("");
	// 		status = true;
	// 	}
	// 	if (email.val() == "" || email.val().length < 6) {
	// 		email.addClass("border-danger");
	// 		$("#email_error").html("<span class='text-danger'>Please enter your Valid email.</span>");
	// 		status = false;
	// 	}else{
	// 		email.removeClass("border-danger");
	// 		$("#email_error").html("");
	// 		status = true;
	// 	}
	// 	if (password.val() == "" || password.val().length < 6) {
	// 		password.addClass("border-danger");
	// 		$("#password_error").html("<span class='text-danger'>Password should not be empty and should at-least 6.</span>");
	// 		status = false;
	// 	}else{
	// 		password.removeClass("border-danger");
	// 		$("#password_error").html("");
	// 		status = true;
	// 	}
	// 	if (phone.val() == "" || phone.val().length < 6) {
	// 		phone.addClass("border-danger");
	// 		$("#phone_error").html("<span class='text-danger'>Please enter a valid phone number.</span>");
	// 		status = false;
	// 	}else{
	// 		phone.removeClass("border-danger");
	// 		$("#phone_error").html("");
	// 		status = true;
	// 	}		
	// 	if (employeefrom.val() == "" || employeefrom.val().length < 4) {
	// 		employeefrom.addClass("border-danger");
	// 		$("#date_error").html("<span class='text-danger'>Please Select a Date.</span>");
	// 		status = false;
	// 	}else{
	// 		employeefrom.removeClass("border-danger");
	// 		$("#date_error").html("");
	// 		status = true;
	// 	}

		
	// 	if (status == true) {
	// 		$.ajax({
	// 		url		: DOMAIN+"/includes/employee_process.php",
	// 		method	: "POST",
	// 		data	: $("#employee_form").serialize(),
	// 		success	: function(data){
	// 				if (data == "EMPLOYEE_ADDED") {
						
	// 					$("#msg").html("<span class='text-success'>Employee Added.</span>");
	// 					$("#employee_form").reset();
	// 					//fetch_employee();
	// 				}else if(data == 'CAN_NOT_ADDED'){
	// 					$("#msg").html("<span class='text-success'>Employee Can Not Added at this time.</span>");
	// 				}
	// 				else{
	// 					console.log(data);
	// 				}
	// 			}
	// 		})
	// 	}

	// })

	//Add New Brand
	$("#brand_form").on("submit",function(){
		if ($("#brand_name").val() == "") {
			$("#brand_name").addClass("border-danger");
			$("#brand_error").html("<span class='text-danger'>Please enter a Brand Name.</span>");
		}else{
			$.ajax({
				url		: DOMAIN+"/includes/process.php",
				method	: "POST",
				data	: $("#brand_form").serialize(),
				success	: function(data){
					if (data == "BRAND_ADDED") {
						$("#brand_name").removeClass("border-danger");
						$("#brand_error").html("<span class='text-success'>New Brand Has been Added.</span>");
						$("#brand_name").val("");
						fetch_brand();
					}else{
						alert(data);
					}
				}
			})
		}
	})


	//Add New Product
	$("#product_form").on("submit",function(){
		$.ajax({
			url		: DOMAIN+"/includes/process.php",
			method	: "POST",
			data	: $("#product_form").serialize(),
			success	: function(data){
				if (data == "NEW_PRODUCT_ADDED") {
					$("#product_name").val("");
					$("#product_qty").val("");
					$("#product_price").val("");
					$("#select_cat").val("");
					$("#select_brand").val("");
					$("#product_success").html("<span class='text-success'>Product Has been Added.</span>");
					
				}else{
					console.log(data);
					alert(data);
				}
			}
		})
	})

})