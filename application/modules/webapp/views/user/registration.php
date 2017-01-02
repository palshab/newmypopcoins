<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Registration</title>
<!-- <link href="css/style.css" type="text/css" rel="stylesheet" /> -->

<link href="<?php echo base_url() ?>assets/user_css/style.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>  
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.validate.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">

<style type="text/css">
	
body{
	width:100%;
	height:auto;
	float:left;
	background:url(<?php echo base_url(); ?>public/user_img/bg-image1.jpg) no-repeat center;
	background-size:cover;
	padding:0px;
	margin:0px;
	font-size:14px;
	font-weight:normal;
	font-family: 'Open Sans', Arial, sans-serif !important;
	
	
}



</style>


<script language='javascript'>
  
  // When the browser is ready...
  $(document).ready(function() {
  
  // Setup form validation on the #register-form element
    $("#form").validate({
        // Specify the validation rules
        rules: {
            name : "required",
         email:{
                required: true,
                email: true
            },
             password: {
                required: true,
                minlength: 5
            },
             phone:{
             	required:true,
             	number:true
             }
            
        },
        // Specify the validation error messages
        messages: {
            name : "Name is required",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Please enter a valid email address",
            phone: {
            	required: "Please Provide phone number",
            	number: "please provide numbers"
            /*agree: "Please accept our policy"*/
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>




</head>






<body>

<div class="header-top">
<div class="wrapper">
<div class="header-center">
<a href=""><img src="<?php echo base_url() ?>public/user_img/logoNew (1).png" alt="" /></a>


</div>
<div class="clear"></div>




</div>
</div>
<div class="wrapper">
<div class="registration">
<div class="register_form">
<form action="" id="form"  name="form" method="post" enctype="multipart/form-data">
<h2>Registration</h2>
<div class="main_form">
<label>Name <span style="color:red; font-weight:bold;">*</span></label>
<input value="" type="" name="u_name" placeholder="Name" id="u_name"  />
</div>
<div class="main_form">
<label>Email Address <span style="color:red; font-weight:bold;">*</span></label>
<input value="" type="email" name="u_email" placeholder="Email Address" id="u_email" /></div>
<div class="main_form">
<label>Password <span style="color:red; font-weight:bold;">*</span></label>
<input value="" type="" name="password"  placeholder="Password" id="password" /></div>
<div class="main_form">
<label>Mobile Number <span style="color:red; font-weight:bold;">*</span></label>
<input value="" type="" name="phone" placeholder="Mobile Number" id="phone" /></div>
<div class="main_form">
<label>Image <span style="color:red; font-weight:bold;">*</span></label>
<input value="" name="image" id="image" type="file"  /></div>
<div class="main_form">
<input type="submit" name="submit" onclick="return validateForm()" value="Register Now" class="submit_btn">
</div>


</form>

</div>



</div>


</div>









</body>
</html>


<script type="text/javascript">

function validateForm()
{



var name = $("#u_name").val();
var email = $("#u_email").val();
var password = $("#password").val();
var phone = $("#phone").val();
var image = $("#image").val();
//$("#returnmessage").empty(); 

if (name=='' || email=='' || password=='' || phone=='' || image=='') {
alert("Please Fill Required Fields");

return false;
} else {

	


}


}



</script>
