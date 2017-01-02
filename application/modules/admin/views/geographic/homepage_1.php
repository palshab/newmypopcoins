 <!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> -->
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>  
  <script src="<?php echo base_url()?>assets/js/jquery-1.9.1.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.validate.min.js"></script>
  
  <!-- jQuery Form Validation code -->
  <style>
    input.error{border:1px solid red!important;}
    select.error{border:1px solid red!important;}
    textarea.error{border:1px solid red!important;}
    .error{border:1px solid red;}
    label.error{border:0px solid red!important; color:red; font-weight: normal; display:inline; }
  </style>

  <script language='javascript'>
  
  // When the browser is ready...
  $(document).ready(function() {
  
  // Setup form validation on the #register-form element
    $("#addCont").validate({
       
        // Specify the validation rules
        rules: {
            cattype         : "required",
            category_name   : "required",
            cat_description : "required",
            category_url    : "required",
            meta_title      : "required",
            meta_desc       : "required",
            meta_keywords   : "required",
            cat_level       : "required",
            cbcheck         : "required",
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
            cattype         : "Choose Category type",
            category_name   : "Category Name is required",
            cat_description : "Category Description is required",
            meta_title      : "Meta title is required",
            meta_desc       : "Meta Description is required",
            meta_keywords   : "Meta Keywords is required",
            cat_level       : "Choose Sort Order",
            cbcheck         : "Required",
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
          <?php 

$attributes = array('class' => 'form', 'id' => 'myform');


echo form_open_multipart('admin/product/bannerupload',$attributes);?>

                    <div class="col-lg-12">
                        <div class="page_name">
                           <h2>Home page Banner</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this Section Admin can Add  Home page Banner.</p>
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
                                                        <div class="tbl_text">Banner Image<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                <div class="tbl_input">
                                                <input type="file" name="file"  class="file">

                                                </div>
                                        </div>
                                          </div>
                                      </div>

                                    <div class="col-lg-6" id="childid">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">Image URL<span style="color:red;font-weight: bold;">*</span></div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input">
                                        <input type="url" name="imgurl" class="file_ad" accept="image/*"></div>
                                        <input type="hidden" name="type" value="banner" >
                                    </div>
                                </div>
                            </div>  
                                            
                          


                             <div class="sep_box">
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
                                                            <input type="submit" name="submit" class="submitBtn act_bt" value="Submit">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>  


                                          <?php  ?>

                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl">
                                        <thead>


                                            <tr>
                                                <th bgcolor='red'>S.NO.</th>
                                                <th>banner image </th>
                                                <th>Image URL</th>
                                                <th>Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 1;
                                                foreach ($banner as $key => $value) {
                                                
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><img height="60" width="60"   src="<?php echo base_url(); ?>assets/images/<?php echo $value->t_imgname; ?>"></td>
                                                <td><?php echo $value->t_path; ?></td>
                                                <td>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                     <a href="<?php  echo base_url(); ?>admin/product/bannerupdate/<?php echo $value->id; ?>/hobanner" class="edit" title="Edit"><i class="fa fa-pencil"></i></a> 

                                                     <a class="delete" href="<?php echo base_url(); ?>admin/product/bannerdelete/<?php echo $value->id; ?>" title="Delete"><i class="fa fa-trash fa-lg"></i></a> 
                                                </td>
                                                
                                            </tr>
                                            <?php $i++; } ?>
                                            
                                           

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
                    </form>
                </div>
            </div>
        </div>
        </div>


         <script type="text/javascript">
    function categoryvalue(){
        var id=$('#typeid').val();
        
        if($.trim(id) == 'parent'){
            $('#parentid').show();
            $('#parentvieww').show();
            $('#childid').hide();
             $('#childvi').hide();
             $('#cat_image1').show();
             $('#cat_image2').show();
        }
        else{
           // alert('hi');
            $('#childid').show();
            $('#parentvieww').hide();
            $('#parentid').hide();
            $('#cat_image1').hide();
            $('#cat_image2').hide();
        }
    }

   function viewshort(){
    var catids=$('#parent_category').val();
    $('#childvi').show();
    //alert(catids);
      $.ajax({
        url: '<?php echo base_url()?>admin/category/catviewlevel',
        type: 'POST',
        //dataType: 'json',
        data: {'catids': catids},
        success: function(data){
            $('#test').empty();
            
            $('#test').html(data);
        }
    });
   }



    </script>