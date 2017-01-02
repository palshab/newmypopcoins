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
            statename : "required",
            statecode : "required",
            //countryid : "required",
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
            //countryid: "Country Id required"
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

<div class="wrapper">
<?php  $this->load->view('helper/sidebar')?> 
  <div class="col-lg-10 col-lg-push-2">
        <div class="row">
            <div class="page_contant">
                <div class="col-lg-12">
                    <div class="page_name">
                        <h2>Update State</h2>
                    </div>
                    <div class="page_box">
                               <div class="sep_box">
        <div class="col-lg-12"> 
                    <div style="text-align:right;">
                        <a href="<?php echo base_url();?>admin/geographic/statelist"><button>CANCEL</button></a>
                    </div>
                    <!--  session flash message  -->
                    <div class='flashmsg'>
                        <?php echo validation_errors(); ?> 
                        <?php
                          if($this->session->flashdata('message')){
                            echo $this->session->flashdata('message'); 
                          }
                        ?>
                    </div>
                    </div></div>
                    <form action="" id="addCont" method="post" enctype="multipart/form-data">
                        <div class="sep_box">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="tbl_text">Select Country <span style="color:red;font-weight: bold;">*</span></div>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" name="countryid" id="countryid" value="<?php echo $vieww->name; ?>" readonly/> 
                                    </div>
                                </div>
                            </div>

        <div class="col-lg-8">&nbsp;</div>    
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="tbl_text">State Name <span style="color:red;font-weight: bold;">*</span></div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><input type="text" name="statename" id="statename" value="<?php echo $vieww->statename; ?>" onKeyPress="return ValidateAlpha(event);"/></div>
                                    </div>
                                </div>
                            </div>
                        </div>

        <div class="col-lg-8">&nbsp;</div>    
                        <div class="sep_box">
                            <!-- <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="tbl_text">State Code <span style="color:red;font-weight: bold;">*</span></div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><input type="text" name="statecode" id="statecode" value="<?php echo $vieww->statecode; ?>" onKeyPress="return ValidateAlpha(event);" maxlength="2" /></div>
                                    </div>
                                </div>
                            </div> -->
                        <div class="sep_box">
        <div class="col-lg-8">&nbsp;</div>    

                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <div class="submit_tbl">
                                            <input id="Submit1" name="submit" type="submit" value="Submit" class="btn_button sub_btn" onclick="return validate16();" />
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
    </div>

    <script type="text/javascript">
      function validate16()
{      
    var country_id=document.getElementById('country_id');
    var state_name=document.getElementById('state_name');
    var state_code=document.getElementById('state_code');
    
   
  
if(country_id.value=='')
          {
            
          document.getElementById('country_id').style.border="1px solid red";
          country_id.focus();
          return false; 
          }
          else
          {
          document.getElementById('country_id').style.border="1px solid green";  
          }

if(state_name.value=='')
          {
            
          document.getElementById('state_name').style.border="1px solid red";
          state_name.focus();
          return false; 
          }
          else
          {
          document.getElementById('state_name').style.border="1px solid green";  
          }

if(state_code.value=='')
          {
            
          document.getElementById('state_code').style.border="1px solid red";
          state_code.focus();
          return false; 
          }
          else
          {
          document.getElementById('state_code').style.border="1px solid green";  
          }



                 

        }



function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode;
if (charCode != 46 && charCode > 31 
&& (charCode < 48 || charCode > 57))
return false;

return true;
}
// function ValidateAlpha(evt)
//     {
//         var keyCode = (evt.which) ? evt.which : evt.keyCode
//         if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
//         return false;
//             return true;
//     }
  

    </script>
    