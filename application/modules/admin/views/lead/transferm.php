 
<?php
//p($leaveid);  exit;

?>
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
                           <h2>Transfer Task </h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this Section Admin can Transfer Task  .</p>
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
                                                        <div class="tbl_text">Assign To <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                <div class="tbl_input">
                                                <select name="leaveid">
                                                    <?php 
                                                    foreach ($view as  $value) {
                                                     
                                             
                                                     ?>
                                                     <option 
                                                     <?php if($value->user_id==$leaveid){ echo 'style="display:none"'; } ?> value="<?php echo $value->user_id ?>"><?php echo $value->s_username; ?></option>
                                                     <?php } ?>
                                                </select>

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


                                          <?php  ?>

                       


                                    </div>

                                </div>


                            </div>
                        </div>

                        
                    </div>
                    </form>

                    <?php



                    ?>

                    <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl" id="example">
                                        <thead>
                                            <tr>
                                              
                                                <th bgcolor='red'>Assign To</th>
                                                                                           
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=0;
                                            foreach ($view as $value1) {
                                            $i++;
                                           
                                            if($value1->tl_leaveid==$leaveid)
                                            {
                                              
                                        ?>
                                        <tr>

                                            <td><?php echo $value1->s_username; ?></td>
                              



                                         
                                        </tr>
                                    <?php } } //exit; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
        </div>
   