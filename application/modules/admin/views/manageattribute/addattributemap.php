     <!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> -->
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>  
  <script src="<?php echo base_url()?>assets/js/jquery-1.9.1.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.validate.min.js"></script>
  
  <!-- jQuery Form Validation code -->
  <style>
    input.error{border:1px solid red;}
    label.error{border:0px solid red; color:red; font-weight: normal; display:inline; }
  </style>
<style type="text/css">
input[type="text"]{vertical-align:top; width: 90% !important;}
.field_wrapper div{ margin-bottom:10px;}
.add_button{ line-height: 38px; margin-left:10px;}
.remove_button{ line-height: 38px; margin-left:10px;}
</style>
  <script language='javascript'>
  
  // When the browser is ready...
  $(document).ready(function() {
  
  // Setup form validation on the #register-form element
    $("#addCont").validate({
        // Specify the validation rules
        rules: {
            attname : "required",
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
            attname : "Attribute name is required",
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
           
                     <div class="col-lg-12">
                        <div class="page_name">
                           <h2>Add Attribute Map</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this Section Admin can Add Attribute Map.</p>
                            </div>
                        </div>
                         <form action="" id="addCont" method="post" enctype="multipart/form-data" >
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                 
                                    <div class="row">
                                        <div class="sep_box">


                                           <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Attribute<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                <div class="tbl_input">
                                                <select name="attnameid" id="attnameid">
                                                 <option value="">Select Attribute</option>
                                                 <?php foreach ($vieww as $key => $value) {
               
                                                      ?>
                                                      <option value="<?php echo $value->id ?>"><?php echo $value->attname ?></option>
                                               <?php }?>
                                                 </select>

                                                </div>
                                        </div>
                                          </div>
                                      </div>

                          </div>
                          <div class="sep_box">


                           <div id="attBox" style='border-bottom:1px solid green; padding-bottom:5px;float:left;width:100%'>


                              <div class="repAttr">
                                         
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                         <div class="tbl_text">Attribute Value<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8 field_wrapper">
                                                        <div class="tbl_input">
                                                          <input id="attnametext" type="text" name="attnametext[]" /><a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa fa-plus fa-lg" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                             <input id="submitBtn" type="submit" name="submit" value="Submit" class="btn_button sub_btn" />
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
        </div>


    <script type="text/javascript">
      
    $(document).ready(function(){
  var maxField = 1000; //Input fields increment limitation
  var addButton = $('.add_button'); //Add button selector
  var wrapper = $('.field_wrapper'); //Input field wrapper
  var fieldHTML = '<div class="tbl_input"><input id="attnametext" type="text" name="attnametext[]" /><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-minus fa-lg" aria-hidden="true"></i></a></div>'; //New input field html 
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