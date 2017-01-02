<?php //pend($this->session->userdata('popcoin_login')->s_admin_id);?>
<script src="/bundles/jquery?v=kfW4M-Vff3ZjD97RuWz1GA_fVJcerItPq_SGhJXZPBc1"></script>
<title>Register with MyPopCoins</title>
<meta content="Sell your products online and give your business a chance to grow with mypopcoins.com. You all need to do is just sign up now which is free and start selling your products">
<link href="<?php echo base_url();?>assets/webapp/css/loginCSS.css" rel="stylesheet" />
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
<script src="<?php echo base_url();?>assets/webapp/js/Vendor.js"></script>
<script src="<?php echo base_url();?>assets/webapp/js/CommonJs.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $("#leadRegisterForm").validate({
        rules: {
            s_username : "required",
            s_loginemail : "required",
            contact_no : {required:true, number:true},
            s_loginpassword : "required"

        },
        messages: {
            s_username: "This field is required!",
            s_loginemail: "This field is required!",
            contact_no : {required:"This field is required!", number:"Numbers only!"},
            s_loginpassword : "This field is required!"
        },
        submitHandler: function(form) {
            var formData = new FormData($("#leadRegisterForm")[0]);
            $.ajax({
            url: '<?php echo base_url(); ?>webapp/home/addlead',
            type: 'POST',
            cache: false,
            data: formData,
            async: false,
            processData: false,
            contentType: false,
            beforeSend: function () {
            $("#lead_msg").html("Saving, please wait....");
            $('#lead_msg').css('color','green');
            },
            success: function(data){ 
                if(data==1) {
                    window.location = "<?php echo base_url();?>webapp/home/leadregistration";
                } else {
                    $("#lead_msg").html("Lead with this email address already exists!");
                    $('#lead_msg').css('color','red');
                }
            }
            });
          }
    });

  });
</script>
<script type="text/javascript">
  $(document).ready(function(){

    $("#leadLoginForm").validate({
        rules: {
            loginemail : "required",
            loginpwd : "required"
        },
        messages: {
            loginemail: "This field is required!",
            loginpwd: "This field is required!"
        },
        submitHandler: function(form) {
            var formData = new FormData($("#leadLoginForm")[0]);
            $.ajax({
            url: '<?php echo base_url(); ?>webapp/home/login',
            type: 'POST',
            cache: false,
            data: formData,
            async: false,
            processData: false,
            contentType: false,
            success: function(data){ 
                //alert(data);
                if(data==1) {
                    window.location = "<?php echo base_url();?>admin/login/dashboard";
                } else if(data==2) {
                    window.location = "<?php echo base_url();?>webapp/home/leadregistration";
                } else {
                    $("#login_msg").html("Wrong login details!");
                    $('#login_msg').css('color','red');
                }
            }
            });
          }
    });

  });
</script>
<style>
    body {
        background: url(<?php echo base_url();?>assets/webapp/img/banner-new1.jpg) no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    .video {
        width: 31%;
        height: 41%;
        margin: 0 auto;
        
    }

    .h_iframe {
        position: relative;
    }

        .h_iframe .ratio {
            display: block;
            width: 100%;
            height: auto;
        }

        .h_iframe iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

</style>

<script>
    $(document).ready(function () {

        function windowHeight() {
            var wh = $(window).height();
            var ww = $(window).width();
            $('.middle_sec h1 span').html('H-' + wh);
            $('.middle_sec h2 span').html('W-' + ww);
        }
        windowHeight();
        $(window).resize(function () {
            windowHeight();
        });



        $(".formCol_sty input").focus(function () {
            $(this).parent().find("label").animate({ 'left': '0', 'top': '-14px' });
            $(this).parent().find("label").css({ color: "#fff" });
        });

        $(".formCol_sty input").blur(function () {
            var e = $(this);
            "" == e.val() && ($(this).parent().find("label").css({ color: "#aaa" }), e.parent().find("label").animate({ 'left': '5px', 'top': '2px', 'font-size': '12px' }))
        });

    });
</script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
        m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-60622705-1', 'auto');
    ga('send', 'pageview');

</script>


<script>
    var Fcheck = '';

    $(document).ready(function () {
        if (Fcheck == '1') {
            $('#loginmess').html("<span style='color:red'>Invalid Login.</span>");
            setTimeout(function () { $('#loginmess').html(''); }, 6000);
        }
    });
    var Reset = 
    $(document).ready(function () {

        if (Reset == '1') {
            $('#loginmess').html("<span style='color:green'>Password changed successfully.</span>");
            setTimeout(function () { $('#loginmess').html(''); }, 6000);
        }


    });



</script>

<link href="<?php echo base_url();?>assets/webapp/css/validationEngine.jquery.css" rel="stylesheet" />


<div id="spinner">
    <img src="<?php echo base_url();?>assets/webapp/img/loaderLogin.gif" />
</div>

<div class="dv_PartialView">
    <form action="" id="leadLoginForm" method="post"> 
    <script src="<?php echo base_url();?>assets/webapp/js/CommonJs.js"></script>    
    <div class="header">
        <a class="vlogo"><img src="<?php echo base_url();?>assets/webapp/img/logoNew.png" /></a>
        <div class="vlogin">
            <div id="login_msg"></div>
            <div class="formCol_sty">
                <input id="loginemail" name="loginemail" type="text" placeholder="Enter your Email ID" />
            </div>
            <div class="formCol_sty">
                <input id="loginpwd" name="loginpwd" type="password" placeholder="Enter your Password" />
            </div>
            <input type="submit" value="Login" class="submit_btn" />
        </div>            
    </div>
    </form>

    <div class="middle_sec">
        <h1>Become A Partner </h1>
        
        <!-- <img src="<?php echo base_url();?>assets/webapp/img/category_icn.png" /> -->

        <div class="other_info">
            
            <div class="process-login" style="width:100%;">
                
                <div class="orderproces">
                    
                    <div class="procesbox ">
                       

                        <div style="Position: relative; " class="innerbox activenew">
                            <img src="<?php echo base_url();?>assets/webapp/img/register-icons.png">
                           
                            <div class="arrow-down"></div>
                          </div>
                        <p>Register</p>
                        <div class="orderdetailnewprces">



                        </div>

                    </div>
                   
                    <div class="procesbox">
                        

                        <div style="position:relative;" class="innerbox  ">
                            <img src="<?php echo base_url();?>assets/webapp/img/approvel.png">
                            <div class="arrow-down"></div>
                        </div>
                        <p>Documents Approval</p>
                        <div class="orderdetailnewprces">


                        </div>

                    </div>
                    
                    <div class="procesbox">
                        

                        <div style="position:relative;" class="innerbox  activenew ">
                            <img src="<?php echo base_url();?>assets/webapp/img/uploading.png">
                            <div class="arrow-down"></div>
                        </div>
                        <p>Product Uploading</p>
                        <div class="orderdetailnewprces">


                        </div>

                    </div>

                    <div class="procesbox">
                        

                        <div style="position:relative; background-color:none" id="shipshe_1" class="innerbox">
                            <img src="<?php echo base_url();?>assets/webapp/img/sell-icon.png">
                            <div class="arrow-down"></div>
                        </div>
                        <p>Start Selling</p>
                        <div class="orderdetailnewprces">


                            <span class="one1"></span>



                        </div>
                    </div>


                    <div class="clear"></div>

                </div>
            </div>

            
        </div>
    </div>

<form action="" id="leadRegisterForm" method="post">  
        <div class="form_tag">
            <p>Register Now to Grow Your Business </p>
        </div>
        <div class="register_form">
            <div class="formCol_sty">
                <input id="s_username" name="s_username" type="text" placeholder="Name" />
            </div>
            <div class="formCol_sty">
                <input id="s_loginemail" name="s_loginemail" type="text" placeholder="Email" />
            </div>
            <div class="formCol_sty">
                <input id="contact_no" name="contact_no" type="text" placeholder="Mobile Number" />
            </div>
            <div class="formCol_sty">
                <input id="s_loginpassword" name="s_loginpassword" type="password" placeholder="Password" />
            </div>
            <div id="lead_msg"></div>
            <div>
                <input type="submit" value="Register Now" class="submit_btn" />
            </div>

        </div>
</form>

</div>
<div class="overlay"></div>
<div class="popupDiv" id="dv_forgot">

    <div class="heading">
        <h1>Enter Your Email Address</h1>
    </div>
    <a class="closePop">x</a>

    <form class="form" id="frmforgot">
        <div class="formCol">
            <div id="Forgotpasswordmessage"></div>
            <p id="p_msg" class="error" style="font-size:12px"></p>
            <label class="newlabel"> EmailId </label>
            <input id="txtforgot" class="validate[required,custom[email]] " type="text" />
        </div>


        <input type="button" onclick="CheckValidformForgot(); forgotpass(); " class="regBtn" value="Send" />

    </form>
</div>
<div class="popupDiv" id="div_contact">

    <div class="heading">
        <h1>GET IN TOUCH</h1>
    </div>
    <a class="closePop">x</a>
    <center>
        <br />
        <h2 style="font-size: 32px; color: #504e4e;"><span style="padding:25px;"><img src="https://d1e0bm34xw901l.cloudfront.net/phone-39-xxl.png" width="30px" height="30px" align="absmiddle" /></span>  +91 124 411 7674 </h2>
        <br />
        <h2 style="font-size: 29px; color: #5d5d5d;"><span style="padding:25px;"><img src="https://d1e0bm34xw901l.cloudfront.net/mail.png" width="30px" height="30px" align="absmiddle" /></span>  <a href="mailto:Sellers@mypopcoins.com"><i>Sellers@mypopcoins.com</i></a></h2>
    </center>
</div>

<style>
    .popupDiv .formCol {
        width: 100%;
    }

    .newlabel {
        width: 20% !important;
    }

    #txtforgot {
        width: 79%;
    }
</style>

<script>
    function forgotpass() {
        if ($('#txtforgot').val().trim() != '' && $('#txtforgot').val().trim() != null) {
            $.ajax({
                type: "post",
                url: "/VendorRegistration/VenForgotPass/",
                beforeSend: function () { $('#spinner').show(); },
                data: { emailid: $('#txtforgot').val() },
                success: function (data) {

                    $('#Forgotpasswordmessage').html(data);
                    $('#spinner').hide();
                    setTimeout(function () { $('.closePop').click(); }, 4000);
                }

            });
        }
    }
</script>

<script>
    $(document).ready(function () {
        $('.validate[required]').addClass('newbgimg');
    });
</script>

<script src="<?php echo base_url();?>assets/webapp/js/main.js"></script>