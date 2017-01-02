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
    $("#addCon1t").validate({
        // Specify the validation rules
        rules: {
            attname : "required",
            attcolor : "required",
            attrname : "required",
            attrtext : "required"
        },
        // Specify the validation error messages
        messages: {
            attcolor : "Color is required",
            attrname : "Attribute value is required",
            attrtext : "Attribute text is required"
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>


<div class="wrapper">
<?php $this->load->view('helper/sidebar')?> 
  <script src="<?php echo admin_url();?>js/jscolor.js"></script>
<div class="col-lg-10 col-lg-push-2">
 <div class="row">
  <div class="page_contant">
    <div class="col-lg-12">
    <div class="page_name">
    
    <h2>Edit Attribute Map</h2>
    </div>
        <div class="page_box">
        <div style="text-align:right;">
            <a href="<?php echo base_url();?>admin/attribute/viewattributemap"><button>CANCEL</button></a>
        </div>
         <div class='flashmsg'>
            <?php echo validation_errors(); ?>
            <?php
              if($this->session->flashdata('message')){
                echo $this->session->flashdata('message'); 
              }
            ?>
        </div>
        <form action="" id="addCont" method="post" enctype="multipart/form-data" >
        <div class="sep_box">
        <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-2">
                <div class="tbl_text">Attribute Name <span style="color:red;font-weight: bold;">*</span></div>
            </div>
            <div class="col-lg-8">
                <div class="tbl_input"><input  type="text" name="attrname" value="<?php echo $vieww->attname ?>" id="attrname" readonly/></div>
            </div>
        </div>
        </div>
        <?php if($vieww->attname=='Color'){ ?>
        <div class="col-lg-8">&nbsp;</div>

        <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-2">
               <div class="tbl_text">Choose color</div>
            </div>
            <div class="col-lg-8">
                <div class="tbl_input"><input type="text" class="jscolor" name="attcolor"  id="attcolor"  /></div>
            </div>
        </div>
        </div>
        <?php }?>
        </div>

        <div class="sep_box">
        <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-2">
                <div class="tbl_text">Attribute Value <span style="color:red;font-weight: bold;">*</span></div>
            </div>
            <div class="col-lg-8">
                <div class="tbl_input"><input  type="text" name="attrname" value="<?php echo $vieww->attvalue ?>" id="attrname"/></div>
            </div>
        </div>
        </div>

        <div class="col-lg-8">&nbsp;</div>
        <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-2">
                <div class="tbl_text">Attribute Text <span style="color:red;font-weight: bold;">*</span></div>
            </div>
            <div class="col-lg-8">
                <div class="tbl_input"><input  type="text" name="attrtext" value="<?php echo $vieww->attmapname ?>" id="attrtext"/></div>
            </div>
        </div>
        </div>
       
        </div>
        <div class="sep_box">
        <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
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