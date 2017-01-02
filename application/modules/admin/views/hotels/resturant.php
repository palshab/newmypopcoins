<!DOCTYPE html>
<html>
<body>
   

    <div class="wrapper">
        <div class="col-lg-2 col-md-2 col-sm-3 left_nav_f">
           
        </div>



        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <form action="" id="resForm" method="post" enctype="multipart/form-data" >
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Add Restaurant</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this Section, admin can add restaurant.</p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                 
                                    <div class="row">
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Vendor Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select name="vendor" class="select" id="vender" >
                                                            <option value="">Select Vendor</option>
                                                            <?php foreach ($vendorlist as $value) 
                                                                  { 
                                                                     ?>
                                                            <option value="<?php echo $value->s_admin_id;  ?>" ><?php echo $value->s_username.' ('.$value->s_loginemail.')';  ?></option>
                                                                 <?php
                                                                  } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Restaurant Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input id="fname" type="text" name="fname" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                        </div>



                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Country <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select name="country" onchange="return statek();" class="select" id="country">
                                                                <option value="">SELECT COUNTRY</option>
                                                                    <?php foreach ($country as $value) { ?>
                                                            <option value="<?php echo $value->a_CountryId; ?>" ><?php echo $value->t_CountryName;  ?></option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">State <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="state" onchange="return cityk();" id="state" class="select">
                                                                <option value="">SELECT STATE</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                     


                                            <div class="sep_box">
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">City <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <select name="city" id="city" onchange="return showAddress() " class="select">
                                                            <option value="">SELECT CITY</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Check In <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <select name="checkin" id="checkin" class="select"  >
                                                            <option value="">SELECT CHECKIN TIME</option>
                                                            <?php 
                                                                for ($i=15; $i<=1440; $i+=15) { 
                                                                    $endTime = strtotime("+".$i." minutes", strtotime('00:00'));
                                                                     $st= date('G:i', $endTime); ?>
                                                                     <option value="<?php echo $st; ?>"  ><?php echo $st; ?> </option>

                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Check Out<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="checkout" id="checkout" class="select">
                                                            <option value="">SELECT CHECKOUT TIME</option>

                                                            <?php 
                                                                for ($i=15; $i<=1440; $i+=15) { 
                                                                     $endTime = strtotime("+".$i." minutes", strtotime('00:00'));
                                                                       $st= date('G:i', $endTime); ?>
                                                                    <option value="<?php echo $st; ?>" ><?php echo $st; ?> </option>

                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                       <div class="sep_box">
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Address: <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <input type="text" placeholder="Land Mark" name="nearby1" id="nearby1" style="margin-bottom:3px;" onblur="fun11()">
          <input type="text" placeholder="Land Mark Address" name="nearbyaddress1" id="nearbyaddress1" onblur="fun12()" style="margin-bottom:3px;">
          <input type="hidden" placeholder="Land Mark Latitude" name="nearbylat1" id="nearbylat1" style="margin-bottom:3px;">
          <input type="hidden" placeholder="Land Mark Address longitude" name="nearbyaddresslon1" id="nearbyaddresslon1" style="margin-bottom:3px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Near By2: <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <input type="text" placeholder="Land Mark" name="nearby2" id="nearby2" style="margin-bottom:3px;" onblur="fun21()">
          <input type="text" placeholder="Land Mark Address" name="nearbyaddress2" id="nearbyaddress2" style="margin-bottom:3px;" onblur="fun22()">
          <input type="hidden" placeholder="Land Mark Latitude" name="nearbylat2" id="nearbylat2" style="margin-bottom:3px;">
          <input type="hidden" placeholder="Land Mark Address longitude" name="nearbyaddresslon2" id="nearbyaddresslon2" style="margin-bottom:3px;">
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Near By3:<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" placeholder="Land Mark" name="nearby3" id="nearby3" style="margin-bottom:3px;" onblur="fun31()">
          <input type="text" placeholder="Land Mark Address" name="nearbyaddress3" id="nearbyaddress3" style="margin-bottom:3px;" onblur="fun32()">
          <input type="hidden" placeholder="Land Mark Latitude" name="nearbylat3" id="nearbylat3" style="margin-bottom:3px;">
          <input type="hidden" placeholder="Land Mark Address longitude" name="nearbyaddresslon3" id="nearbyaddresslon3" style="margin-bottom:3px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="sep_box">
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Restaurants Nearby:<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <textarea name="restaurantsnearby" placeholder="Restaurants Nearby" class="meal"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Terms & Conditions<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <textarea name="termcondition" placeholder="Term & Conditions"  class="term-tex"></textarea>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <input type="submit" name="submit" value="Submit" />
                                                    </div>
                                                    </div>
                                                </div>                                                
                                            </div>

                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>

                        
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
</body>
   
</html>

<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#resForm").validate({
          // Specify the validation rules
          rules: {
              vendor : "required",
              fname : "required"
          },
          
          messages: {
              vendor : "Please select vendor!",
              fname : "Please enter restaurant name!"
          },
          
          submitHandler: function(form) {
            form.submit();
          }
      });
   });
  </script>

<script type="text/javascript">
    function statek(){
        var country_id = $("#country").val();
        $.ajax({
            url : '<?php echo base_url();?>admin/hoteldetails/fetchstate',
            type : 'POST',
            data : {'country_id': country_id},
            success : function(data){
            $('#state').html(data);
            }
        });
    }

    function cityk(){
        var state_id = $("#state").val();        
        $.ajax({
            url : '<?php echo base_url();?>admin/hoteldetails/fetchcity',
            type : 'POST',
            data : {'state_id': state_id},
            success: function(data){
                $('#city').html(data);
            }
        });
    }

</script>
