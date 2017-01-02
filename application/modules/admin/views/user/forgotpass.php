<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
.loginPageMain {
    background: url("<?php echo base_url() ?>public/img/footer-bg.jpg") center no-repeat;
    background-size: 100% 100%;
    background-attachment: fixed;
    height: 100vh;
}
.loginForm {
    height: 340px;
    background-color: rgba(255, 255, 255, 0.13);
}
.loginForm, .loginForm_new {
    width: 460px;
    box-shadow: 0 0 0px #dea568;
    bottom: 0;
    border-radius: 10px;
    padding: 0px 30px 30px 30px;
    margin: auto;
    left: 0;
    top: 0;
    position: absolute;
    right: 0;
    border: solid 1px rgba(113, 113, 113, 0.13);
}
</style>    
    <title></title>
    <link rel='shortcut icon' href="<?php echo base_url();?>assets/fevicon.png"/>
    <link href="<?php echo base_url()?>assets/webapp/css/bizzgain4.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/webapp/css/pages.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/webapp/css/bootstrap.min.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
    <link href="fontawsome/css/font-awesome.min.css" rel="stylesheet" />
 
</head>
<body>


  <div class="loginPageMain">
	  <div class="loginForm">
           		 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        			<img src="<?php echo base_url()?>assets/webapp/img/logoNew.png" class="adminLogo">
        			
            	
                                <div class="form-group">
                                <form action="" method="post">
                                <label style="font-weight:normal;">E-mail:</label>
                                <input  type="text" placeholder="Enter your Email" class="form-control space2" name="email" />
                                  <br>                            
                                <input type="submit" name="submit" value="Send" class="submitBtn_new button" >
                                  
                                <div><?php echo validation_errors();?>
                                </div>
                                </form>
                            	</div>
            </div>

        </div>
    </div>


        
</body>
</html>