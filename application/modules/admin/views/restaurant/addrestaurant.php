<!DOCTYPE html>
<html>

<body>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Add Store</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can add Store!
                                    <a href="<?php echo base_url();?>admin/restaurant/viewrestaurants"><button type="button" style="float:right;">CANCEL</button></a></p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">
                                <div class="col-lg-12">
                                    <div class='flashmsg'>
                                        <?php echo validation_errors(); ?> 
                                        <?php
                                          if($this->session->flashdata('message')){
                                            echo $this->session->flashdata('message'); 
                                          }
                                        ?>
                                    </div>
                                    <div class="row">
                                        
                                        <form action="" id="resForm" method="post" enctype="multipart/form-data" >
                                       
                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Store Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <input id="r_res_name" type="text" name="r_res_name" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>

                                           


                                         <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Email Id <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <input id="emailid" style="text-transform:lowercase;" type="text" name="emailid" />
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>    




                                         <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">User Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <input id="username" style="text-transform:lowercase;" type="text" name="username" />
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>    



                                        <div class="sep_box">
                                            <div class="col-lg-5">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Store Start Time <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <input id="username" style="text-transform:lowercase;" type="text" name="username" />
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  


                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Store End Time <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <input id="username" style="text-transform:lowercase;" type="text" name="username" />
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>    



                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Password <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <input id="password" style="text-transform:lowercase;" type="text" name="password" />
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>



                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">TIN No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                        Collected 
                                                            <input id="tinno" style="text-transform:lowercase;" type="checkbox" name="tinno" />


                                                        Not Collected
                                                            <input id="tinno" style="text-transform:lowercase;" type="checkbox" name="tinno" />     
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>


                                         <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Service Tax No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                        Collected 
                                                            <input id="checkbox" style="text-transform:lowercase;" type="checkbox" name="servicetaxno" />

                                                        Not Collected    
                                                            <input id="checkbox" style="text-transform:lowercase;" type="checkbox" name="servicetaxno" />
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>


                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">PAN Card No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <input id="pancardno" style="text-transform:lowercase;" type="text" name="pancardno" />
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>

                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Visiting Card<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                        Collected
                                                            <input id="visitingcard" style="text-transform:lowercase;" type="checkbox" name="visitingcard" />


                                                        Not Collected
                                                            <input id="visitingcard" style="text-transform:lowercase;" type="checkbox" name="visitingcard" />    
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>


                                         <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Sample Bill Copy<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                        Collected
                                                            <input id="samplebillcopy" style="text-transform:lowercase;" type="checkbox" name="samplebillcopy" />
                                                          Not Collected
                                                            <input id="samplebillcopy" style="text-transform:lowercase;" type="checkbox" name="samplebillcopy" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>

                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Bank Details<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            Account Holder Name

                                                            <input id="bankdetails" style="text-transform:lowercase;" type="text" name="bankdetails" />


                                                            Account Number
                                                            <input id="bankdetails" style="text-transform:lowercase;" type="text" name="bankdetails" />

                                                            IFSC Code
                                                            <input id="bankdetails" style="text-transform:lowercase;" type="text" name="bankdetails" />
                                                         

                                                            Branch n Bank Name

                                                            <input id="bankdetails" style="text-transform:lowercase;" type="text" name="bankdetails" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>

                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Date of Agreement <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <input id="r_res_slug" style="text-transform:lowercase;" type="text" name="dateofagrement" />
                                                            <p style="color:red;">(No special characters allowed)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>
                                      
                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Select Store Manager<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                           <select name="manager">
                                                <option value="0">Select Manager</option>
                                               <?php 
                                               foreach ($manager as $key => $value) {
                                                   # code...
                                               
                                               ?>
                                                <option value="<?php echo $value->s_admin_id; ?>"><?php echo $value->s_username; ?></option>
                                               <?php } ?>
                                                        </div>
                                                        </select>
                                                        </div>
                                                        </div>
                                                        </div>






                                                    </div>

                                               </select>





                                        <div class="sep_box">
                                                                                  
                                        </div> 
                                       
                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Training Date<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <input id="traingdate" style="text-transform:lowercase;" type="text" name="traingdate" />
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>


                                         <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Training Given to Name & No<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            Collected
                                                            <input id="visitingcard" style="text-transform:lowercase;" type="checkbox" name="visitingcard" />


                                                        Not Collected
                                                            <input id="visitingcard" style="text-transform:lowercase;" type="checkbox" name="visitingcard" />  
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>



                                          <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Cashback Percentage<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <input id="cashbackper" style="text-transform:lowercase;" type="text" name="cashbackper" />
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>


                                       <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Deal Commission<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <input id="dealcommison" style="text-transform:lowercase;" type="text" name="dealcommison" />
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>

                                         <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Store Picture/Company Logo<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <input id="file" style="text-transform:lowercase;" type="text" name="storepic" />
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>




                                <div class="sep_box">
                                  <div class="col-lg-12">
                                    <div class="row">
                                    <a href="javascript:void(0);" class="add_row" title="Add row"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Add Row</a>
                                    <table class="grid_tbl" style="margin-top:25px;">
                                    <thead>
                                        <tr>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Street</th>
                                            <th>Address</th>
                                            <th>PIN</th>
                                            <th>Contact</th>
                                            <th>Contact (optional)</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                        </tr>
                                    </thead>
                                    <tbody class="append"> 
                                    <tr class="append_wrapper">
                                        <td><select type="text" name="country_id[]" id="country_id">
                                                <option value="">-- Select Country --</option>
                                                <?php foreach($countries as $val) { ?>
                                                <option value="<?php echo $val->conid;?>"><?php echo $val->name;?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td><select type="text" name="state_id[]" id="state_id">
                                                <option value="">-- Select State --</option>
                                            </select>
                                        </td>
                                        <td><select type="text" name="city_id[]" id="city_id">
                                                <option value="">-- Select City --</option>
                                            </select>
                                        </td> 
                                        <td><select type="text" name="street_id[]" id="street_id">
                                                <option value="">-- Select Street --</option>
                                            </select>
                                        </td> 
                                        <td><textarea type="text" name="res_address[]" id="res_address"></textarea></td>
                                        <td><input type="text" name="res_pin[]" id="res_pin" /></td>
                                        <td><input type="text" name="res_contact[]" id="res_contact" /></td>
                                        <td><input type="text" name="res_contact2[]" id="res_contact2" /></td>
                                        <td><input type="text" name="res_latitude[]" id="res_latitude" /></td>
                                        <td><input type="text" name="res_longitude[]" id="res_longitude" /></td>
                                    </tr>                
                                    </tbody>
                                    </table>
                                    </div>
                                  </div>
                                </div>
                                      
                                       
                                       
                                                                
                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                           <input type="submit" name="submit" value="Submit" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>                          
                                        </form>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
   
</html>

<style type="text/css">
input[type="text"]{vertical-align:top; width: 90% !important;}
.field_wrapper div{ margin-bottom:10px;}
.add_button{ line-height: 38px; margin-left:10px;}
.remove_button{ line-height: 38px; margin-left:10px;}
</style>

<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script>CKEDITOR.replace('r_res_desc');</script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#resForm").validate({
          // Specify the validation rules
          rules: {
                r_maintype_id : "required",
              "category_id[]" : "required",
              r_vendor_id : "required",
              r_res_name : "required",
              r_res_slug : "required",
              r_menu_image : "required",
              r_res_desc : "required",
              "r_img_name[]" : "required",
              r_costfor_id : "required",
              r_cost_price : { required: true, number: true },
              "country_id[]" : "required",
              "state_id[]" : "required",
              "city_id[]" : "required",
              "street_id[]" : "required",
              "res_address[]" : "required",
              "res_pin[]" : "required",
              "res_contact[]" : "required"
          },
          
          messages: {
                r_maintype_id : "Please select type!",
              "category_id[]" : "Please select category!",
              r_vendor_id : "Please select vendor!",
              r_res_name : "Please enter restaurant name!",
              r_res_slug : "Please enter restaurant URL!",
              "r_menu_image[]" : "Please upload restaurant menu image!",
              r_res_desc : "Please enter restaurant description!",
              "r_img_name[]" : "Please upload restaurant image(s)!",
              r_costfor_id : "Please select cost for!",
              r_cost_price : { required: "Please enter cost for price!", number: "Numbers only!" },
              "country_id[]" : "Please select country!",
              "state_id[]" : "Please select state!",
              "city_id[]" : "Please select city!",
              "street_id[]" : "Please select street!",
              "res_address[]" : "Please enter address!",
              "res_pin[]" : "Please enter pin code!",
              "res_contact[]" : "Please enter contact detail!"
          },
          
          submitHandler: function(form) {
            form.submit();
          }
      });
   });
</script>

<script type="text/javascript">      
    $(document).ready(function(){
      var maxField = 1000; //Input fields increment limitation
      var addButton = $('.add_button'); //Add button selector
      var wrapper = $('.field_wrapper'); //Input field wrapper
      var fieldHTML = '<div class="tbl_input"><input type="file" name="r_img_name[]" /><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-minus fa-lg" aria-hidden="true"></i></a></div>'; //New input field html 
      var x = 1; //Initial field counter is 1
     
      $(addButton).click(function(){ 

      //Once add button is clicked
        if(x < maxField){
          
         //Check maximum number of input fields
          x++; //Increment field counter
          $(wrapper).append(fieldHTML); // Add field html
        }
      });
      $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
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
<script type="text/javascript">
  $(document).ready(function() {
        $( "#r_maintype_id" ).change(function() {
              var r_maintype_id = $("#r_maintype_id").val();
              $.ajax({
              url: '<?php echo base_url(); ?>admin/restaurant/appendcategories',
              type: 'POST',
              data: {'r_maintype_id':r_maintype_id},
              success: function(data){
                    $('#category_id').html(data);  
              }
              });
      });
  });
</script>
<script type="text/javascript">      
    $(document).ready(function(){
      var maxField = 1000; //Input fields increment limitation
      var addButton = $('.add_row'); //Add button selector
      var wrapper = $('.append_wrapper'); //Input field wrapper
      var x = 1; //Initial field counter is 1
     
      $(addButton).click(function(){ 
        if(x < maxField){
            x++; 
            $(".append_wrapper").clone().removeClass("append_wrapper").appendTo(".append");
        }
      });
      $(wrapper).on('click', '.remove_row', function(e){ //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
      });
    });
</script>