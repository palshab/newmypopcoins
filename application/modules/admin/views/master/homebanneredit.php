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
            attname : "Category name is required",
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
                           <h2>Edit Banner Image </h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this Section Admin can Edit Banner Images  .</p>
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
                                                        <div class="tbl_text">Enter The Title <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                <div class="tbl_input">
                                                <input type="text" name="title" id="title" value="<?php echo $bannerimage->title; ?>" />

                                                </div>
                                        </div>
                                          </div>
                                      </div>

                                         <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Upload The Banner Image <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                <div class="tbl_input">
                                                    <img height="50px;" width="50px;" src="<?php echo base_url(); ?>public/homebanner/<?php echo $bannerimage->banner_image; ?>">
                                                         <input type="hidden" name="o_menu2" value="<?php echo $bannerimage->banner_image; ?>">
                                                         <input type="file" name="banner_image"  
                                                         value="<?php echo $bannerimage->banner_image; ?>" >
                                                

                                                </div>
                                        </div>
                                          </div>
                                      </div>

                          


                             <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                         <div class="tbl_text">Enter The Banner Url <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                               <input type="text" name="banner_url" id="banner_url" value="<?php echo $bannerimage->url; ?>" />                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text"> </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
   