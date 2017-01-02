<?php  $this->load->view('helper/sidebar'); ?> 
 
<div class="col-lg-10 col-lg-push-2">
    <div id="basicExample">
            <div class="row" >
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                           <h2>Add Store</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, retailer can add store!
                                    <a href="<?php echo base_url();?>admin/restaurant/viewstores/<?php echo $this->uri->segment(4);?>"><button type="button" style="float:right;">CANCEL</button></a></p>
                            </div>
                        </div>

                        <form action="" id="storeForm" method="post" enctype="multipart/form-data">            
                        <div class="page_box" id="storediv">
                            <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                         <div class="tbl_text">Store Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                             <input id="r_res_name" type="text" name="storename" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Select Country <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="storecountryid" id="storecountryid" onchange="storeselectstates();">
                                                              <option value="">select Country</option>
                                                             <?php foreach ($vieww as $key => $value) { ?>
                                                          <option value="<?php echo $value->conid; ?>"><?php echo $value->name; ?></option>
                                                           <?php } ?>
                                                               </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">State Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <select id="storestateid" name="storestateid" value="storestateid">
                                                             <option value="">Select State</option>
                                                             </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                                <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">City Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <input  type="text" name="storecityname"  id="cityname" onblur="checkname();" />
                                                        </div>

                                                      
                                                  

                                                    </div>


                                                </div>
                                            </div>
                                            
                                             
                                            </div>


                                            <div class="sep_box">
                                       
                                                <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Address <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <textarea name="storeaddress"></textarea>  
                                                        </div>

                                                      
                                                  

                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                         <div class="tbl_text">Store Manager <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="managerid">
                                                                    <?php 
                                               foreach ($manager as $key => $value) {
                                                   # code...
                                               
                                               ?>
                                                <option value="<?php echo $value->s_admin_id; ?>"><?php echo $value->s_username; ?></option>
 <?php } ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             
                                            
                                         

                                            </div>


                                            <div class="sep_box">
                                       
                                                 <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Contact Number <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                               <input id="contactno" style="text-transform:lowercase;" type="text" name="contactno" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                             

                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Email id <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">


                                             <input id="emailid" style="text-transform:lowercase;" type="text" name="emailid" />            
                                                            <!-- Collected 
                                                            <input id="tinno" style="text-transform:lowercase;" type="radio" name="stinno" /> -->


                                                     <!--    Not Collected
                                                            <input id="tinno" style="text-transform:lowercase;" type="radio" name="stinno" /> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            



                                            </div>

                                            <div class="sep_box">
                                       

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Service Tax No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                             Collected 
                                                            <input id="checkbox" value="callected" style="text-transform:lowercase;" type="radio" name="sservicetaxno" />

                                                            Not Collected    
                                                            <input id="checkbox" value="notcallected" style="text-transform:lowercase;" type="radio" name="sservicetaxno" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             

                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">PAN Card No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input id="pancardno" style="text-transform:lowercase;" type="text" name="spancardno" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            </div>

                                            <div class="sep_box">
                                       

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Visiting Card<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         Collected
                                                            <input id="visitingcard" style="text-transform:lowercase;" type="radio" name="visitingcard" value="collected" />


                                                        Not Collected
                                                            <input id="visitingcard" style="text-transform:lowercase;" type="radio" name="visitingcard" value="notcollected" />  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             

                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Sample Bill Copy<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         Collected
                                                            <input id="samplebillcopy"  value="collected" style="text-transform:lowercase;" type="checkbox" name="samplebillcopy" />
                                                          Not Collected
                                                            <input id="samplebillcopy" value="notcollected" style="text-transform:lowercase;" type="checkbox" name="samplebillcopy" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            </div>

                                             <div class="sep_box">
                                        <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Tin No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            Collected 
                                                            <input id="tinno" value="collected" style="text-transform:lowercase;" 
                                                            type="radio" name="stinno" /> 

                                                               Not Collected
                                                            <input id="tinno" value="notcollected" style="text-transform:lowercase;" type="radio" name="stinno" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Date of Agreement <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">

                                                             <input type="text" name="dateofagrement" class="date start" />

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            </div>

                                               <div class="sep_box">
                                       

                                            
                                             

                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Categorys    <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">

                                                             <select name="categoryid">
                                                                 <?php 
                                                                 foreach ($category as $key => $value) {
                                                                     # code...
                                                                 

                                                                 ?>
                                                                    <option value="<?php echo $value->categorydeal_id ;?>"><?php echo $value->categorydeal_name; ?></option>
                                                                 <?php } ?>
                                                             </select>

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            </div>
                                           

                                           


                                            <div class="sep_box">
                                       

                                          
                                             


                                             <div id="store_msg"></div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                    
                                                           <input id="submitBtn" type="submit"  name="submit" value="Submit" class="retailer_btn"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  

                                            </div>



                           
                                

                               
                                           

                                            </form>                    


                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.timepicker.css" />
<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-datepicker.standalone.css" />

<script type="text/javascript">
    $('.time').timepicker({
    'showDuration': true,
    'timeFormat': 'H:i:s'
    });

    $('.date').datepicker({
    'format': 'yyyy-mm-dd',
    'autoclose': true,
    todayBtn: "linked",
    todayHighlight: true
    });
</script>   



<script type="text/javascript">
    function selectstates(){
     var countryid=$('#countryid').val();


     $.ajax({
        url: '<?php echo base_url()?>admin/geographic/countrystate',
        type: 'POST',
        //dataType: 'json',
        data: {'countryid': countryid},
        success: function(data){
      //alert(data); 

        var  option_brand = '<option value="">Select State</option>';
        $('#stateid').empty();
        $("#stateid").append(option_brand+data);
           
         }
  });
    
   }

    function storeselectstates(){
     var countryid=$('#storecountryid').val();
     //alert(countryid); return false;

     $.ajax({
        url: '<?php echo base_url()?>admin/geographic/countrystate',
        type: 'POST',
        //dataType: 'json',
        data: {'countryid': countryid},
        success: function(data){
      //alert(data); 

        var  option_brand = '<option value="">Select State</option>';
        $('#storestateid').empty();
        $("#storestateid").append(option_brand+data);
           
         }
  });
    
   }

</script>

<script type="text/javascript">
  $(document).ready(function() {
        $( "#state_id" ).change(function() {
              var state_id = $("#state_id").val();
              $.ajax({
              url: '<?php echo base_url(); ?>admin/restaurant/appendcities',
              type: 'POST',
              data: {'state_id':state_id},
              success: function(data){
                    $('#city_id').html(data);  
              }
              });
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
        $( "#country_id" ).change(function() {
              var country_id = $("#country_id").val();
              $.ajax({
              url: '<?php echo base_url(); ?>admin/restaurant/appendstates',
              type: 'POST',
              data: {'country_id':country_id},
              success: function(data){
                    $('#state_id').html(data);  
              }
              });
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
        $( "#city_id" ).change(function() {
              var city_id = $("#city_id").val();
              $.ajax({
              url: '<?php echo base_url(); ?>admin/restaurant/appendstreets',
              type: 'POST',
              data: {'city_id':city_id},
              success: function(data){
                    $('#street_id').html(data);  
              }
              });
      });
  });
</script>

 <script>
$(document).ready(function(){
    $(".add_btn a").click(function(){
        $("#storediv").toggle();
        $("#storelistingdiv").css('display', 'none');

         $(".active_color").removeClass('active_color');
         $("#addstorehead").addClass('active_color');
         $("#addstorelist").removeClass('active_color');

    });
});

$(document).ready(function(){
    $("#storeForm").validate({
          // Specify the validation rules
          rules: {
              
            storename : "required",
            storecountryid :  "required",
            storestateid:  "required",
            storecityname :  "required",
            storeaddress :  "required",
            managerid :  "required",
            emailid :  "required",
            contactno :  "required",
            dateofagrement :  "required",
            categoryid : "required",
            

          },
          
          messages: {
            
            storename : "Plese Enter Store Name !",
            storecountryid :  "Plese Select country !",
            storestateid:  "Plese select state !",
            storecityname :  "Plese Enter city  !",
            storeaddress :  "Plese Enter Address  !",
            managerid :  "Plese Select  manager Name !",
            emailid :  "Plese Enter email id !",
            contactno :  "Plese Enter contact no  !",
            dateofagrement :  "Plese Enter aggrement date!",
            categoryid : "Plese Select category!"
          },
          
          submitHandler: function(form) {
            var formData = new FormData($("#storeForm")[0]);

           
            $.ajax({
            url: '<?php echo base_url(); ?>admin/restaurant/addstore',
            type: 'POST',
            cache: false,
            data: formData,
            async: false,
            processData: false,
            contentType: false,
            beforeSend: function () {
            $("#store_msg").html("Saving, please wait....");
            $('#store_msg').css('color','green');
            },
            success: function(data){ 
                alert(data); 
            }
            });
          }
      });
   });
</script>