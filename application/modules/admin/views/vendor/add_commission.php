 <?php //p($vieww);die; ?>
 <!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> -->
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>  
  <script src="<?php echo base_url()?>assets/js/jquery-1.9.1.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.validate.min.js"></script>
  
  <!-- jQuery Form Validation code -->
  <style>
    input.error{border:1px solid red;}
    label.error{border:0px solid red; color:red; font-weight: normal; display:inline; }
  </style>

  <script language='javascript'>
  
  // When the browser is ready...
  $(document).ready(function() {
  
  // Setup form validation on the #register-form element
    $("#addCont").validate({
        // Specify the validation rules
        rules: {
            commision : "required",
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
            commision : "Type of Deal name is required",
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

 <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <!-- <form action="" method="post" enctype="multipart/form-data" > -->
            <div class="page_contant">
            <form action="" id="addCont" method="post" enctype="multipart/form-data" >
          <?php 

$attributes = array('class' => 'form', 'id' => 'myform');


?>

                    <div class="col-lg-12">
                        <div class="page_name">
                           <h2>Commission</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this Section Admin can Add Commission .</p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                 
                                    <div class="row">
                                        <div class="sep_box">
                                          <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Retailer Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                <div class="tbl_input">
                                                <select name="retailer_name" id="retailer_name" onchange="selectretelarid();">

                                                            <option value="">Select</option>
                                                              <?php foreach ($vieww as $value){  ?>
                                                                 <option value="<?php echo $value->s_admin_id; ?>"><?php echo $value->s_username; ?></option>                  
                                                              <?php } ?>
                                                            <!-- <option value=""><?php //echo $vieww->categorydeal_name; ?></option> -->
                                                           </select>

                                                </div>
                                        </div>
                                          </div>
                                      </div>

                                      <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Retailer Id<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                <div class="tbl_input">
                                               <!--  <input type="text" name="retailer_id" id="retailer_id" placeholder="commission%"/> -->
                                               <select id="retailer_id" name="retailer_id" value="retailer_id">
                                                             <option value="">Select Retailer</option>
                                                             </select>

                                                </div>
                                        </div>
                                          </div>
                                      </div><br><br><br>

                                           <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Enter The Commission<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                <div class="tbl_input">
                                                <input type="text" name="commision" id="commision" placeholder="commission%"/>

                                                </div>
                                        </div>
                                          </div>
                                      </div> 

                          

                                  <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Enter The Cashback<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                <div class="tbl_input">
                                                <input type="text" name="cashback" id="cashback" placeholder="commission%"/>

                                                </div>
                                        </div>
                                          </div>
                                      </div>

                             <div class="sep_box">
                                          
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text"></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                              <input id="submitBtn" type="submit" name="submit" value="Submit" class="btn_button sub_btn"/>
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
        </div>
   <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>

<script type="text/javascript">
  
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
   




    function selectretelarid(){
     var retailer_name=$('#retailer_name').val();
     $.ajax({
        url: '<?php echo base_url()?>admin/geographic/countrystate',
        type: 'POST',
        //dataType: 'json',
        data: {'retailer_name': retailer_name},
        success: function(data){
        var  option_brand = '<option value="">Select Retailer</option>';
        $('#retailer_id').empty();
        $("#retailer_id").append(option_brand+data);
           
         }
  });
    
   }
</script>