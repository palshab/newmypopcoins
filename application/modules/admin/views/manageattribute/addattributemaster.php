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
            //attrid : "required",
            //catidd : "required",
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
            attrid : "Attribute required",
            catidd : "Category required",
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
                           <h2>Add Attribute Master</h2>
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
                                                <select name="attrid" id="attrid" onchange="selectvalue();">
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




                         <div class="col-lg-6" style="display:none" id="attvalue">
        <div class="row">
            <div class="col-lg-2">
                <div class="tbl_text">Attribute Value <span style="color:red;font-weight: bold;">*</span></div>
            </div>
            <div class="col-lg-8">
                <div class="tbl_input"><select id="attvalueid" name="attvalueid[]" multiple >
                <option value="">Select</option></select></div>
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
                                                         <div class="tbl_text">Category <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8 field_wrapper">
                                                        <div class="tbl_input">
                                                          <select name="catidd" id="catidd">
                                                              <?php
                                                              foreach ($parentCatdata as $key => $value) {
                                                                  # code...
                                                              

                                                              ?>
                                                              <option value="<?php echo $value->catid; ?>"><?php echo $value->catname; ?></option>
                                                              <?php } ?>
                                                          </select>
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
   function selectvalue(){
    var attrid=$('#attrid').val();
    if(attrid==0){
        $('#attvalue').hide();
    }else{
        $('#attvalue').show();
    }
     
    $.ajax({
        url: '<?php echo base_url()?>admin/attribute/attributevalue',
        type: 'POST',
        //dataType: 'json',
        data: {'attrid': attrid},
        success: function(data){
            var  option_brand = '<option value="">Select Attribute value</option>';
            $('#attvalueid').empty();
            $("#attvalueid").append(option_brand+data);
        }
    });
    
   }
   function childcategory(){
    var catid=$('#mcatidd').val();
    if(mcatidd==0){
        $('#childcat').hide();
    }else{
        $('#childcat').show();
    }
     
    $.ajax({
        url: '<?php echo base_url()?>admin/attribute/catvalue',
        type: 'POST',
        //dataType: 'json',
        data: {'catid': catid},
        success: function(data){
             
            var  option_brand = '<option value="">Select Category</option>';
            $('#catidd').empty();
            $("#catidd").append(option_brand+data);
        }
    });
    
   }

   

 </script>