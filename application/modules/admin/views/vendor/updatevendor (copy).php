
<?php 
//pend($storedtl);

?>
<script language='javascript'>
  
  // When the browser is ready...
  $(document).ready(function() {
  
  // Setup form validation on the #register-form element
    $("#addCont").validate({
        // Specify the validation rules
        rules: {
            statename : "required",
            statecode : "required",
            countryid : "required",
           /* email:{
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            agree: "required" */
        },
        // Specify the validation error messages
        messages: {
            statename: "State name required",
            statecode: "State code required",
            countryid: "Country Id required"
            /*password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Please enter a valid email address",
            agree: "Please accept our policy"*/
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
<!DOCTYPE html>

<html>

<body>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <form action="" id="vendorForm" method="post" enctype="multipart/form-data" >
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Edit Retailer</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can edit retailer!
                                    <a href="<?php echo base_url();?>admin/adminvender/viewretailerlist"><button type="button" style="float:right;">CANCEL</button></a></p>
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
                                                        <div class="tbl_text">Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="s_username" value="<?php echo $vieww->s_username; ?>" id="s_username" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                              <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Email ID <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input id="s_loginemail" value="<?php echo $vieww->s_loginemail; ?>" type="text" name="s_loginemail" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                    </div>

                            <div class="sep_box">
                                            
                                         


                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Alternate Email Id</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input id="Alternateemailid"  value="<?php echo $vieww->alertnatemail_id; ?>" type="text" name="Alternateemailid" />
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
                                                           <select name="countryid" id="countryid" onchange="selectstates();">
                                                             <option value="">select Country</option>
                                                             <?php foreach ($vieww1 as $key => $value) { 
                                                             ?>
                                                            <option <?php if($vieww->country_id==$value->conid){ echo "selected"; } ?> value="<?php echo $value->conid; ?>"><?php echo $value->name; ?></option>
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
                                                          <select id="stateid" name="stateid" value="stateid">
                                                             <option value="">Select State</option>
                                                             <?php
                                                             foreach ($state as $key => $statevalue) {
                                                      

                                                             ?>
                                                             <option <?php if($statevalue->stateid==$vieww->state_id){ echo "selected"; } ?>  value="<?php echo $statevalue->stateid; ?>">
                                                             <?php echo $statevalue->statename; ?></option>

                                                             <?php  } ?>
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
                                                          <input  type="text" value="<?php echo $vieww->city_id; ?>"  name="cityname"  id="cityname"  />
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Pincode <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" value="<?php echo $vieww->pincode; ?>" name="pincode"  id="pincode" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Contact Number <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" value="<?php echo $vieww->contact_no; ?>"   name="s_mobileno" id="s_mobileno" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                
                                            </div>
                                             



                                            <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Company Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" name="companyname" 
                                                           value="<?php echo $vieww->company_name; ?>" id="companyname" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Store Type <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="storetype">
                                                               
                                                               <?php 
                                                               foreach ($storetype as $key => $value) {
                                                                
                                                               
                                                               ?>


                                                               <option value="<?php echo $value->store_id; ?>"><?php echo $value->store_name; ?></option>
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
                                                        <div class="tbl_text">Owner Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" name="owndername" value="<?php echo $vieww->ownder_name; ?>" id="owndername" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Store Number<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                              <input type="text" name="storename" value="<?php echo $vieww->store_name; ?>" id="storename" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                
                                            </div>


                                              <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Company Address<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" name="companyaddress" value="<?php echo $vieww->Company_Address; ?>" id="companyaddress" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">PAN Card No</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                              <input type="radio" <?php if($vieww->pan_card_no=="Collected"){ echo "checked"; } ?> name="pancard" value="Collected" id="pancard" >Collected Check Box
                                                               <input type="radio" <?php if($vieww->pan_card_no=="NotCollected"){ echo "checked"; } ?> name="pancard" value="NotCollected" id="pancard" >Not Collected 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                
                                            </div>



                                            


                                            <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Service Tax No</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                             <input type="radio" <?php if($vieww->service_tax_no=="Collected"){ echo "checked"; } ?>  name="servicetax" value="Collected" id="servicetax">Collected 
                                                               <input type="radio" <?php if($vieww->service_tax_no=="NotCollected"){ echo "checked"; } ?> name="servicetax" value="NotCollected" id="servicetax" >Not Collected 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Visiting Card</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                              <input type="radio" <?php if($vieww->visiting_card=="Collected"){ echo "checked"; } ?> name="visitingcard" value="Collected" id="visitingcard" >Collected 
                                                               <input type="radio" <?php if($vieww->visiting_card=="NotCollected"){ echo "checked"; } ?> name="visitingcard" value="NotCollected" id="visitingcard" >Not Collected 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="sep_box">

                                            <fieldset>
                                        <legend>Bank Details</legend>
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        
                                                        <div class="tbl_text">
                                                         Account Holder Name
                                                        <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">

                                                             <input type="text" value="<?php echo $vieww->account_h_name; ?>" name="accountholder"  id="accountholder">


                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Account Number<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        


                                                            
                                                          <input type="text" value="<?php echo $vieww->account_h_number; ?>" name="accountnumber" id="accountnumber">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                             <div class="sep_box">
                                           
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">IFSC code<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         
                                                            
                                                            <input type="text" value="<?php echo $vieww->ifsc_code; ?>" name="ifscode" id="ifscode"> 
                                                         

                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Bank Name and Branch Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         
                                                            
                                                         <input type="text" value="<?php echo $vieww->branch_name.'/'.$vieww->bank_details; ?>" name="barnchname" id="barnchname">
                                                         

                                                          

                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            </div>
                                             
                                            </fieldset>



                                            </div>

                                            


                                            <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Document Received Date<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                               <input type="text" value="<?php echo $vieww->document_rec_date; ?>"  name="docrecdate" class="date start" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Retailer Enrollment Date
                                                        <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                              <input type="text" name="retailerrenroldate" 
                                                              value="<?php echo $vieww->ratiler_enrol_date; ?>" id="retailerrenroldate" class="date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Agreement Signed Date<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                             <input type="text" class="date" name="agrementsigndate" 
                                                             value="<?php echo $vieww->aggre_sing_date; ?>" id="agrementsigndate">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             
                                            </div>

                                           

                                             <div class="sep_box">
                                       

                                           

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Retailer Password <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="password" name="s_loginpassword" id="s_loginpassword" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Profile Pic</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="file" name="fileToUpload" id="fileToUpload">
                                                           <img height="50px;" withd="50px;" src="<?php echo  base_url(); ?>assets/images/<?php echo $vieww->profile_pic;  ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             
                                            </div>



                                             <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input id="submitBtn" type="submit" name="retailersubmit" value="Submit" class="btn_button sub_btn"/>
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
  $(document).ready(function(){
    $("#vendorForm").validate({
          // Specify the validation rules
          rules: {
              retailer_type: "required",
              s_username : "required",
              outlet_name : "required",
              //managers_name: "required",
              //brand_name: "required",
              //monthly_billing : "required",
              //acc_h_name : "required",
              //p_card_number : "required",
              //s_IfsoCode : "required",
              //pday_week : "required",
              //s_Beneficeryac_no : "required",
              //s_Bankname : "required",
              //s_Bankaddress : "required",
              //weekly_of : "required",
              //n_billing_month : "required",
              //s_tin_number : "required",
              //s_Taxnumber : "required",
            //pincode : {required:true,number:true},
              s_loginemail : {required:true, email:true},
              s_mobileno :  {required:true, number:true},
              //co_no_outlet : {required:true,number:true},
              s_loginpassword : "required"
          },
          
          messages: {
            retailer_type : "Please enter Type name!",
              s_username : "Please enter vendor name!",
              outlet_name : "please enter outletname!",
              //managers_name : "please enter manager name!",
              //brand_name : "please enter brand name!",
              //monthly_billing : "please enter monthly billing!",
              //acc_h_name : "please enter Account Holders name!",
              //p_card_number : "please enter pan card number!",
              //s_IfsoCode : "please enter valid Code!",
              //pday_week : "please enter Peek Days of the Week!",
              //s_Beneficeryac_no : "please enter Beneficiary Account Number!",
              //s_Bankname : "please enter bank name!",
              //s_Bankaddress : "please enter bank Address!",
              //weekly_of : "please enter weekly off!",
              //n_billing_month : "please enter Number of Billings Per Month!",
              //s_tin_number : "please enter valid TIN Number!",
              //s_Taxnumber : "please enter valid TAX Number!",
              //pincode : {required:"please enter pincode", number:"Numbers only"},
              s_loginemail : {required:"Please enter email ID!", email:"Please enter valid email ID!"},
              s_mobileno : {required:"Please enter contact number!", number:"Numbers only!"},
              //co_no_outlet : {required:"please enter contect outlet Numbers",number:"Numbers only!"},
              s_loginpassword : "Please enter vendor password!"
              
          },
          
          submitHandler: function(form) {
            form.submit();
          }
      });
   });

function checkname(){
     var name=$('#couname').val();
      $.ajax({
        url: '<?php echo base_url()?>admin/geographic/checkname',
        type: 'POST',
        dataType: 'json',
        data: {'name': name},
        success: function(data){

        if(data[0].count > 0){
          $('#submitBtn').prop('disabled', 'disabled');
          alert("Data Already Existed");
        }else{
          $('#submitBtn').removeAttr('disabled');
        }      
         }
  });
    
   }
   




    function selectstates(){
     var countryid=$('#countryid').val();
     $.ajax({
        url: '<?php echo base_url()?>admin/geographic/countrystate',
        type: 'POST',
        //dataType: 'json',
        data: {'countryid': countryid},
        success: function(data){
        var  option_brand = '<option value="">Select State</option>';
        $('#stateid').empty();
        $("#stateid").append(option_brand+data);
           
         }
  });
    
   }
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
        var  option_brand = '<option value="">Select State</option>';
        $('#stateid').empty();
        $("#stateid").append(option_brand+data);
           
         }
  });
    
   }
</script>

<!-- <script type="text/javascript">      
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
</script> -->

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


<script type="text/javascript">
    $("#selecctall").click(function () {
      $('.chkApp').each(function() { //loop through each checkbox
        $(this).prop('checked',$('#selecctall').prop("checked"));  //select all checkboxes with class "checkbox1"               
      });
    });

$('.storeupdate').click(function(){
  var sub=false;
    $('.chkApp').each(function() { 
          if(this.checked)
           sub=true;
        });
if(sub==true)
  $('#vendorForm').submit();
else
  alert('Please select atleast one');
return false;
});
</script>