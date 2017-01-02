<!DOCTYPE html>
<html>

<body>
<?php 




foreach($mappedcats as $val) { 
    $cat_array[] = $val->category_id; 
} 
foreach($mappedattrs as $val) { 
    //$attr_main_array[] = $val->r_mainattr_id; 
    $attr_sub_array[] = $val->r_subattr_id; 
} 
//$combined_array = array_combine($attr_main_array, $attr_sub_array);
?>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Update Store</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can update Store!
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
                                                            <input id="r_res_name" type="text" name="r_res_name" value="<?php echo $vieww->r_res_name;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>
                                       
                                                                       
                                        
                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Store  Description <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <textarea id="r_res_desc" type="text" name="r_res_desc"><?php echo $vieww->r_res_desc;?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>
                                        <?php /* ?> <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Restaurant Image (s) <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9 field_wrapper">
                                                        <div class="tbl_input">
                                                            <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa fa-plus fa-lg" aria-hidden="true"></i></a>
                                                            <?php foreach($mappedimages as $val) { ?>
                                                                <input type="file" name="r_img_name[]" />
                                                                <input type="hidden" name="r_img_name1[]" value="<?php echo $val->r_img_name; ?>" />
                                                                <img src="<?php echo base_url();?>public/res-images/<?php echo $val->r_img_name; ?>" width="20%"/>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>  <?php */ ?>
                                       

                                        
                                        
                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">SEO Title </div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <input id="r_meta_title" type="text" name="r_meta_title" value="<?php echo $vieww->r_meta_title;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">SEO Description </div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <textarea id="r_meta_desc" type="text" name="r_meta_desc"><?php echo $vieww->r_meta_desc;?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">SEO Keywords </div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <input id="r_meta_keywords" type="text" name="r_meta_keywords" value="<?php echo $vieww->r_meta_keywords;?>" />
                                                        </div>
                                                    </div>
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
              "category_id[]" : "required",
              r_res_name : "required",
              r_res_desc : "required",
              r_costfor_id : "required",
              r_cost_price : { required: true, number: true }
          },
          
          messages: {
              "category_id[]" : "Please select category!",
              r_res_name : "Please enter restaurant name!",
              r_res_desc : "Please enter restaurant description!",
              r_costfor_id : "Please select cost for!",
              r_cost_price : { required: "Please enter cost for price!", number: "Numbers only!" }
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