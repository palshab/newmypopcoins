<!DOCTYPE html>
<html>
<head>

    <title></title>
    <link rel='shortcut icon' href="fevicon.png" />
    <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/fontawsome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/css/StyleSheet.css" rel="stylesheet" />

    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/JavaScript.js"></script>

    <link href="http://192.168.1.30/bizzgainlive/assets/js/select/dist/css/select2.min.css" rel="stylesheet" />
    <script src="http://192.168.1.30/bizzgainlive/assets/js/select/dist/js/select2.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.css">
    <script src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".menu-sm").click(function () {
                $(".left_nav").toggleClass("active_mm");
            });
        });
    </script>

</head>
<body>
    <div class="wrapper">
        <div class="col-lg-12">
            <div class="row">
                <div class="top_header">
                    <div class="col-lg-4">
                        <span class="menu-sm hidden-lg"> <i class="fa fa-align-justify menu-sm-b"></i></span>
                        <a href="<?php echo base_url() ?>admin/login/dashboard" class="logo_admin">
                            
                                <img src="<?php echo base_url()?>assets/webapp/img/logoNew.png" class="adminLogo">
                        </a>
                    </div>
                    <div class="col-lg-8">

                    <?php
                    if($this->session->userdata('popcoin_login')->s_admin_id==1)
                    {
                    ?>

                        <a class="user" href="<?php echo base_url() ?>admin/login/logout" style="color: #444;font-size: 13px;padding: 20px 0px;float: right;text-decoration:none;margin-left:30px;">
                            <i class="fa fa-user" style="margin-right:5px;"></i>Logout
                        </a>
                    <?php }else{ ?>

                        <a class="user" href="<?php echo base_url() ?>" style="color: #444;font-size: 13px;padding: 20px 0px;float: right;text-decoration:none;margin-left:30px;">
                            <i class="fa fa-user" style="margin-right:5px;"></i>Logout
                        </a>


                        <?php } ?>

                        <a href="<?php echo base_url(); ?>admin/retailer/changepassword" style="color: #444;font-size: 13px;padding: 20px 0px;float: right;text-decoration:none;"><i class="fa fa-key"></i> Change Password</a>

                    </div>
                </div>
            </div>
        </div>
    </div>