 

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
            cbcheck         : "required"
        },
        // Specify the validation error messages
        messages: {
            cattype         : "This field is required!",
            category_name   : "This field is required!",
            cat_description : "This field is required!",
            meta_title      : "This field is required!",
            meta_desc       : "This field is required!",
            meta_keywords   : "This field is required!",
            cat_level       : "This field is required!",
            cbcheck         : "This field is required!"
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
</script>
 <div class="col-lg-10 col-lg-push-2">
           





            <div class="row" >
                <!-- <form action="" method="post" enctype="multipart/form-data" > -->
            <div class="page_contant">
            <form action="" method="post" enctype="multipart/form-data" id="addCont">

                    <div class="col-lg-12">
                        <div class="page_name">
                           <h2>Add Category</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can view all order details!</p>
                            </div>
                        </div>
                        <div class="page_box" style="">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                 
                                <div class="row">
                                        <div class="sep_box">


                                           <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text" >Category Select <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                <div class="tbl_input">
                                                  <select name="newcattype" id="typeid" onchange="contentdata();">
                                                  <option> Select Category Type </option>
                                                  <?php   foreach ($type as $key => $value) {
                                                      # code...
                                                    
                                                  ?>
                                                          
                                                          <option value="<?php echo $value->type_id; ?>"><?php echo $value->type_title; ?></option>
                                                   <?php } ?>       


                                                    </select>

                                                </div>
                                        </div>
                                          </div>
                                      </div>

                                   
                                            
                                          
                                        </div>


                                </div>


                                    <div class="row category"  style="display:none">
                                        <div class="sep_box">


                                           <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Category Select <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                <div class="tbl_input">
                                                  <select name="cattype" class="cattype" id="typeid" onchange="categoryvalue();">
                                                            <option value="">Select Type</option>
                                                            <option value="parent">Parent Category</option>
                                                          <option value="child">Child Category</option>
                                                    </select>

                                                </div>
                                        </div>
                                          </div>
                                      </div>

                                    <div class="col-lg-6" id="childid" style='display:none'>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">Parent Category <span style="color:red;font-weight: bold;">*</span></div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input">
                                        <select name="parent_category" id="parent_category" onclick="viewshort();">
                                        <option value="">Select Parent Category</option>
                                        <?php 
                                         foreach ($parentCatdata as $Catdata){  ?>   
                                         <option value="<?php echo $Catdata->catid.'-'.$Catdata->catlevel; ?>"><?php echo $Catdata->catname; ?></option>    
                                        <?php } ?>
                                        </select></div>
                                    </div>
                                </div>
                            </div>  
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text"> Category Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <input id="category_name" name="category_name" type="text" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Description<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         <textarea name="cat_description" id="cat_description"></textarea>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Category Url <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <input id="category_url" type="text" name="category_url" style="text-transform:lowercase;" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Meta Title <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input id="meta_title" type="text"  name="meta_title"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                     


                              <div class="sep_box">
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Meta Tag Description <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         <input id="meta_desc" type="text" name="meta_desc"/>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Meta Tag Keyword <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input id="meta_keywords" type="text" name="meta_keywords" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Cat Image </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input id="cat_ban2" type="file" name="cat_logo"/>
                                                        </div>
                                                    </div>
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







                                    </div>

                                    <div class="row spacategory"  style="display:none">
                                        
                                        <div class="sep_box">
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Description<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         <textarea name="cat_descriptions" id="cat_descriptions"></textarea>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Spa Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <input id="category_url" type="text" name="category_urll" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Meta Title <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input id="meta_title" type="text"  name="meta_titlee"/>
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


         <script type="text/javascript">
    function categoryvalue(){
        var id=$('.cattype').val();
            //alert(id);
           
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

function contentdata()
{
    var typevalue =  $("#typeid").val();
    if(typevalue==1)
    {
        //categoryvalue();
        $(".category").css({
            display: 'block'
            
        });
         $(".spacategory").css({
            display: 'none'
            
        });
    }else{

        $(".category").css({
            display: 'none'
            
        });
         $(".spacategory").css({
            display: 'block'
            
        });

    }

}


    </script>