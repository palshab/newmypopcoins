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
            couname : "required",
            coucode : "required",
           /* email:{
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            agree: "required"*/
        },
        
        // Specify the validation error messages
        messages: {
            couname: "Country name required",
            coucode: "Country code required",
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
<?php //p($data); die; ?>
<div class="wrapper"><div class="col-lg-10 col-lg-push-2">
 <div class="row">
  <div class="page_contant">
    <div class="col-lg-12">
    <div class="page_name">
    <h2>Modify Country</h2>
    </div>
        <div class="page_box">
            <div class="sep_box">
        <div class="col-lg-12">
        <div style="text-align:right;">
            <a href="<?php echo base_url();?>admin/geographic/viewcountry"><button>CANCEL</button></a>
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
        <form action="" id="addCont" method="post" enctype="multipart/form-data" >
        <div class="sep_box">
        <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-2">
                <div class="tbl_text">Country Name <span style="color:red;font-weight: bold;">*</span></div>
            </div>
            <div class="col-lg-8">
                <div class="tbl_input"><input  type="text" name="couname" value="<?php echo $data->r_costfor_title ?>" id="couname"/></div>
            </div>
        </div>
        </div>

        <div class="col-lg-8">&nbsp;</div>    
        
        </div>
        <div class="sep_box">
        <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-7">
                <div class="submit_tbl">
                    <input id="Submit1" type="submit" name="submit" value="Submit" class="btn_button sub_btn" />
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