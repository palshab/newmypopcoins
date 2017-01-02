<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url();?>assets/css/reset.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/style.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/half-slider.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.datetimepicker.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>  
    <script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $("#otpInfo").validate({
        // Specify the validation rules
        rules: {
            otp : "required"
        },
        
        // Specify the validation error messages
        messages: {
            otp: "This field is required!"
        },
        
        submitHandler: function(form) {
            var otp = $('#otp').val();
            $.ajax({
                url: '<?php echo base_url(); ?>webapp/home/checkotp',
                type: 'POST',
                data: {'otp':otp},
                success:function(response){
                    if(response==1){
                        $(".tab_left").removeClass('disabled');
                        $("#stepZeroTag").addClass('disabled');
                        $(".contant_tab").hide();
                        $("#stepFirst").show();
                        $(".tab_left").removeClass("active_t");
                        $("#stepFirstTag").addClass("active_t");                    
                    } else {
                        $('#otp_msg').html("Wrong OTP.");
                        $('#otp_msg').css('color','red');
                    }
                }
            });
          }
    });

  });

$(document).ready(function(){
    $("#resend_otp").click(function(){
        $.ajax({
            url: '<?php echo base_url(); ?>webapp/home/resendotp',
            type: 'POST',
            data: {'otp':'otp'},
            success:function(response){
                $("#otp_value").val(response);
            }
        });
    });
});
</script>
<script type="text/javascript">
  $(document).ready(function(){

    $("#companyInfo").validate({
        // Specify the validation rules
        rules: {
            company_name : "required",
            s_username : "required",
            contact_no : {required:true, number:true},
            Company_Address : "required",
            pincode : {required:true, number:true}
        },
        
        // Specify the validation error messages
        messages: {
            company_name: "This field is required!",
            s_username: "This field is required!",
            contact_no : {required:"This field is required!", number:"Numbers only!"},
            Company_Address : "This field is required!",
            pincode : {required:"This field is required!", number:"Numbers only!"}
        },
        
        submitHandler: function(form) {
            var formData = new FormData($("#companyInfo")[0]);
            $.ajax({
            url: '<?php echo base_url(); ?>webapp/home/updatecompanyinfo',
            type: 'POST',
            cache: false,
            data: formData,
            async: false,
            processData: false,
            contentType: false,
            beforeSend: function () {
            $("#company_msg").html("Saving, please wait....");
            $('#company_msg').css('color','green');
            },
            success: function(data){ 
                if(data==1){
                    $('#company_msg').html("Saved.");
                    $('#company_msg').css('color','green');
                    /*$("#stepFirstTag").addClass('disabled');
                    $("#stepSecondTag").removeClass('disabled');*/
                    $(".contant_tab").hide();
                    $("#stepSecond").show();
                    $(".tab_left").removeClass("active_t");
                    $("#stepSecondTag").addClass("active_t");                    
                } 
            }
            });
          }
    });

  });
</script>
<script type="text/javascript">
  $(document).ready(function(){

    $("#bankInfo").validate({
        // Specify the validation rules
        rules: {
            company_website : "required",
            acc_number : "number"
        },
        
        // Specify the validation error messages
        messages: {
            company_website: "This field is required!",
            acc_number : "Numbers only!"
        },
        
        submitHandler: function(form) {
            var formData = new FormData($("#bankInfo")[0]);
            $.ajax({
            url: '<?php echo base_url(); ?>webapp/home/updatebankinfo',
            type: 'POST',
            cache: false,
            data: formData,
            async: false,
            processData: false,
            contentType: false,
            beforeSend: function () {
            $("#bank_msg").html("Saving, please wait....");
            $('#bank_msg').css('color','green');
            },
            success: function(data){ 
                if(data==1){
                    $('#bank_msg').html("Saved.");
                    $('#bank_msg').css('color','green');
                    /*$("#stepSecondTag").addClass('disabled');
                    $("#stepThirdTag").removeClass('disabled');*/
                    $(".contant_tab").hide();
                    $("#stepThird").show();
                    $(".tab_left").removeClass("active_t");
                    $("#stepThirdTag").addClass("active_t");
                } 
            }
            });
          }
    });

  });
  
  function acceptTerms()
  {
    var terms_conditions = $('#terms_conditions').val();
    if(terms_conditions=="") {
        alert("Please accept terms and conditions!"); 
        return false;
    } else {
        /*$("#stepThirdTag").addClass('disabled');
        $("#stepFourthTag").removeClass('disabled');*/
        $(".contant_tab").hide();
        $("#stepFourth").show();
        $(".tab_left").removeClass("active_t");
        $("#stepFourthTag").addClass("active_t");       
    }
  }
</script>
<style>
.progressbar2{display:none;}
.progressbar3{display:none;}
.progressbar4{display:none;}
.progressbar5{display:none;}
.roomdetails{display:none;}
.propertyphoto{display:none;}
.hotelfaci{display:none;}
.hotelfaci1{display:none;}
.preview{display:none;}
.preview1{display:none;}
.info1{display:none;}
.roomdetails{display:none;}
.roomdetailsadd{display:none;}
.propertyphoto1{display:none;}
.info1{display:none;}
.pro{display:none;}
.roomdetails1{display:none;}
a.disabled {
pointer-events: none;
cursor: default;
}
</style>
</head>
<body class="pro_rg_page">
    <div class="col-lg-3 left_s">
        <div class="logo_pro">
            <img src="<?php echo base_url();?>assets/webapp/img/logoNew.png" width="80%" />
        </div>
        <div class="row">
            <div class="left_tab">
                <a href="#" class="tab_left active_t info" data-div="stepZero" id="stepZeroTag">OTP Confirmation<span>OTP</span></a>
                <a href="#" class="tab_left info disabled" data-div="stepFirst" id="stepFirstTag">Lead Details<span>Lead Details</span></a>
                <a href="#" class="tab_left info disabled" data-div="stepSecond" id="stepSecondTag">Bank Details<span>Bank Details</span></a>
                <a href="#" class="tab_left info disabled" data-div="stepThird" id="stepThirdTag">Agreement<span>Agreement</span></a>
                <a href="#" class="tab_left info disabled" data-div="stepFourth" id="stepFourthTag">Welcome<span>Welcome</span></a>
                <a href="<?php echo base_url();?>webapp/home/logout" class="tab_left">Logout</a>
            </div>
        </div>
    </div>  
    <div class="col-lg-9 cont_bg"> 

        <!-- <div style="width:100%" class="prog_bar">
        <div style="width:20%;" class="progressbar1">Progress Bar (25%)</div>
        <div style="width:40%;" class="progressbar2">Progress Bar (50%)</div>
        <div style="width:60%;" class="progressbar3">Progress Bar (75%)</div>
        <div style="width:80%;" class="progressbar4">Progress Bar (100%)</div>
        </div>  --> 

        <div class="contant_tab" style="display:block;" id="stepZero">
            <h2>OTP</h2>
            <p>We have sent an OTP in your resgistered contact number. Please check and enter OTP.</p>
            <div class="contant_text">
                <form id="otpInfo" action="" method="post">
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">OTP: </div></div>
                    <div class="col-lg-2">
                        <div class="text_box">
                            <input id="otp" name="otp" type="text" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="text_box">
                            <input type="text" id="otp_value" value="<?php echo $this->session->userdata('lead_otp');?>" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="text_box">
                            <input type="button" id="resend_otp" value="Resend OTP"  />
                        </div>
                    </div>
                </div>
                <div id="otp_msg"></div>
                <div class="tr_div">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-5">
                    <div class="text_box">
                        <input type="submit" value="Confirm" />
                    </div>
                    </div>
                </div>                    
                </form>
            </div>
        </div>            

        <div class="contant_tab" style="display:none;" id="stepFirst">
            <h2>Company Information</h2>
            <div class="contant_text">
                <form id="companyInfo" action="" method="post" enctype="multipart/form-data">
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">Company Name:<span style="color:red">*</span> </div></div>
                    <div class="col-lg-5"><div class="text_box">                   
                    <input id="company_name" name="company_name" value="<?php echo $vieww->company_name;?>" type="text">
                    </div></div>
                </div>
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">Name:<span style="color:red">*</span> </div></div>
                    <div class="col-lg-5"><div class="text_box">
                     <input id="s_username" name="s_username" value="<?php echo $vieww->s_username;?>" type="text">
                    </div></div>
                </div>
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">Email Address:<span style="color:red">*</span> </div></div>
                    <div class="col-lg-5"><div class="text_box">
                     <input id="s_loginemail" name="s_loginemail" readonly="readonly" type="text" value="<?php echo $this->session->userdata('popcoin_login')->s_loginemail;?>">
                    </div></div>
                </div>
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">Contact Number:<span style="color:red">*</span> </div></div>
                    <div class="col-lg-5"><div class="text_box">
                     <input id="contact_no" name="contact_no" value="<?php echo $vieww->contact_no;?>" type="text">
                    </div></div>
                </div>
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">Address:<span style="color:red">*</span> </div></div>
                    <div class="col-lg-5"><div class="text_box">
                     <textarea id="Company_Address" name="Company_Address"><?php echo $vieww->Company_Address;?></textarea>
                    </div></div>
                </div>
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">PIN Code:<span style="color:red">*</span> </div></div>
                    <div class="col-lg-5"><div class="text_box">
                     <input id="pincode" name="pincode" type="text" value="<?php echo $vieww->pincode;?>">
                    </div></div>
                </div>
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">PAN Number:</div></div>
                    <div class="col-lg-5"><div class="text_box">
                     <input id="pan_card_no" name="pan_card_no" value="<?php echo $vieww->pan_card_no;?>" type="text">
                    </div></div>
                </div>
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">TIN Number:</div></div>
                    <div class="col-lg-5"><div class="text_box">
                     <input id="tin_no" name="tin_no" value="<?php echo $vieww->tin_no;?>" type="text">
                    </div></div>
                </div>
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">Cancelled Cheque Copy:</div></div>
                    <div class="col-lg-5"><div class="text_box">
                     <input type="file" name="can_cheque_copy" id="can_cheque_copy" />
                     <input type="hidden" name="can_cheque_copy1" value="<?php echo $vieww->can_cheque_copy;?>" />
                    </div></div>
                </div>
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">PAN Card Copy:</div></div>
                    <div class="col-lg-5"><div class="text_box">
                     <input type="file" name="pan_card_copy" id="pan_card_copy" />
                     <input type="hidden" name="pan_card_copy1" value="<?php echo $vieww->pan_card_copy;?>" />
                    </div></div>
                </div>
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">TIN Copy:</div></div>
                    <div class="col-lg-5"><div class="text_box">
                     <input type="file" name="tin_copy" id="tin_copy" />
                     <input type="hidden" name="tin_copy1" value="<?php echo $vieww->tin_copy;?>" />
                    </div></div>
                </div>
                <div id="company_msg"></div>
                <div class="tr_div">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-5">
                    <div class="text_box">
                        <input type="submit" value="Save & Continue" />
                    </div>
                    </div>
                </div>                    
                </form>
            </div>
        </div>  

        <div class="contant_tab" style="display:none;" id="stepSecond">
            <h2>Bank Information</h2>
            <div class="contant_text">
                <form id="bankInfo" action="" method="post">
               <!--  <div class="tr_div">
                    <div class="col-lg-3"><div class="text">Company Website:<span style="color:red">*</span> </div></div>
                    <div class="col-lg-5"><div class="text_box">                   
                    <input id="company_website" name="company_website" value="<?php echo $vieww->company_website;?>" type="text">
                    </div></div>
                </div> -->
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">Account Holder Name: </div></div>
                    <div class="col-lg-5"><div class="text_box">
                     <input id="accholder_name" name="accholder_name" type="text" value="<?php echo $vieww->accholder_name;?>" />
                    </div></div>
                </div>
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">Account Number: </div></div>
                    <div class="col-lg-5"><div class="text_box">
                     <input id="acc_number" name="acc_number" type="text" value="<?php echo $vieww->acc_number;?>" />
                    </div></div>
                </div>
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">Bank Name: </div></div>
                    <div class="col-lg-5"><div class="text_box">
                     <input id="bank_name" name="bank_name" type="text" value="<?php echo $vieww->bank_name;?>" />
                    </div></div>
                </div>
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">Bank Branch: </div></div>
                    <div class="col-lg-5"><div class="text_box">
                     <textarea id="bank_branch" name="bank_branch"><?php echo $vieww->bank_branch;?></textarea>
                    </div></div>
                </div>
                <div class="tr_div">
                    <div class="col-lg-3"><div class="text">IFSC Code: </div></div>
                    <div class="col-lg-5"><div class="text_box">
                     <input id="ifsc_code" name="ifsc_code" type="text" value="<?php echo $vieww->ifsc_code;?>">
                    </div></div>
                </div>
                <div id="bank_msg"></div>
                <div class="tr_div">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-5">
                    <div class="text_box">
                        <input type="submit" value="Save & Continue" />
                    </div>
                    </div>
                </div>                    
                </form>
            </div>
        </div>  

        <div class="contant_tab" style="display:none;" id="stepThird">
            <div class="contant_text">                
                <h2>Terms & Conditions</h2>
                <p style="text-align:justify;">This Agreement (the “Agreement”) is an electronic document in terms of the Information Technology Act, 2000 (“IT Act,2000”) and Rules made thereunder and the amended provisions pertaining to electronic documents / records in various statutes as amended by the Information Technology Act, 2000. This Agreement is computer generated and does not require any physical, electronic or digital signature.</p>
                <p style="text-align:justify;">As contemplated under the provisions of Rule 3(1) of the Information Technology (Intermediaries Guidelines) Rules, 2011, this Agreement is in consonance with the aforesaid provisions in publishing the rules and regulations, privacy policy and terms of use for the access of the Website mypopcoins.com.</p>
                <div class="tr_div">
                    <div class="col-lg-8"><div class="text_box">
                     <input id="terms_conditions" type="checkbox" value="1"> Please accept terms & conditions.
                    </div></div>
                </div>
                <div class="tr_div">
                    <div class="col-lg-8">
                    <div class="text_box">
                        <input type="button" value="Accept" onclick="return acceptTerms();">
                    </div>
                    </div>
                </div> 
            </div>
        </div>  

        <div class="contant_tab" style="display:none;" id="stepFourth">
            <span id="msg"> Thank you for registering with us!</span>
        </div>            

       
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".tab_left").click(function () {
                var sh = $(this).attr("data-div");
                $(".contant_tab").hide();
                $("#"+sh).show();
                $(".tab_left").removeClass("active_t");
                $("#"+sh+"Tag").addClass("active_t");
            });
        });

        function statek(){
           
        var countryId = $("#country").val();
    //var countryId = $(".country"+getid).val();
       //alert(countryId);
        $(".loading").css('display', 'inline-block');
        $.ajax({
                url:      'http://192.168.1.30/bnbnation/bnbnation/PropertyRegistration/getstate/',
                type:     'POST',
                dataType: 'json',
                data:     {'countryId': countryId},
                success: function(data){
                   //alert(data);
                    $('#state').empty();
                    if(data !=0){
                        $('#state').empty();
                        var firstOption = '<option value="">SELECT STATE</option>';
                        $('#state').html(firstOption);
                        $.each(data, function(index, value) {
                            
                            
                        var SelectData  = "<option value='"+value.a_StateId+"'>"+value.t_StateName+"</option>";
                        //alert(SelectData); return false;
                        $('#state').append(SelectData);
                        });
                        $(".loading").css('display', 'none');
                    }
                    if(data ==0){
                        var selectData = '<option value="0">SELECT STATE</option>';
                        $('#state').append(selectData);
                        $(".loading").css('display', 'none');
                    }
                }
            });

    }
function cityk(){
        var stateId = $("#state").val();
        //var countryId = $(".country"+getid).val();
        
        $(".loading").css('display', 'inline-block');
        $.ajax({
                url:      'http://192.168.1.30/bnbnation/bnbnation/PropertyRegistration/getcity/',
                type:     'POST',
                dataType: 'json',
                data:     {'stateId': stateId},
                success: function(data){
                    
                    $('#city').empty();
                    if(data !=0){
                        $('#city').empty();
                        var firstOption = '<option value="">SELECT CITY</option>';
                        $('#city').html(firstOption);
                        $.each(data, function(index, value) {
                            
                            
                        var SelectData  = "<option value='"+value.a_CityId+"'>"+value.t_CityName+"</option>";
                        $('#city').append(SelectData);
                        });
                        $(".loading").css('display', 'none');
                    }
                    if(data ==0){
                        var selectData = '<option value="0">SELECT CITY</option>';
                        $('#city').append(selectData);
                        $(".loading").css('display', 'none');
                    }
                }
            });

    }
function showAddress() {
            //debugger;
            var state = $("#state option:selected").text();
            var city = $("#city option:selected").text();

            var address = city + ", " + state + ", India";
            //alert(address);

            var map = new GMap2(document.getElementById("map"));
            
            map.addControl(new GSmallMapControl());
            map.addControl(new GMapTypeControl());
            if (geocoder) {
                geocoder.getLatLng(
                  address,
                  function (point) {
                      if (!point) {
                          alert(address + " not found");
                      } else {
                          document.getElementById("lat").value = point.lat().toFixed(5);
                          document.getElementById("lng").value = point.lng().toFixed(5);
                          map.clearOverlays()
                          map.setCenter(point, 13);

                          var marker = new GMarker(point, {
                              draggable: true,
                          });
                          map.addOverlay(marker);
                          GEvent.addListener(marker, "dragend", function () {
                              var pt = marker.getPoint();
                              map.panTo(pt);
                              document.getElementById("lat").value = pt.lat().toFixed(5);
                              document.getElementById("lng").value = pt.lng().toFixed(5);
                          });

                          debugger;
                        //  setupLocationMarker(map, marker.getPoint());
                          GEvent.addListener(map, "moveend", function () {
                              map.clearOverlays();
                              var center = map.getCenter();
                              var marker = new GMarker(center, { draggable: true });
                              map.addOverlay(marker);
                              document.getElementById("lat").value = center.lat().toFixed(5);
                              document.getElementById("lng").value = center.lng().toFixed(5);

                              GEvent.addListener(marker, "dragend", function () {
                                  var pt = marker.getPoint();
                                  map.panTo(pt);
                                  document.getElementById("lat").value = pt.lat().toFixed(5);
                                  document.getElementById("lng").value = pt.lng().toFixed(5);
                              });

                              GEvent.addListener(marker, "click", function () {
                                  var pt = marker.getPoint();
                                  map.panTo(pt);
                                  document.getElementById("lat").value = pt.lat().toFixed(5);
                                  document.getElementById("lng").value = pt.lng().toFixed(5);
                                  $("#info").text(address);
                              });
                              
                          });

                      }
                  }
                );
            }
        }
    </script>
</body>
</html>