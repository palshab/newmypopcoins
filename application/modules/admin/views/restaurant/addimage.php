<!DOCTYPE html>
<html>

<body>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <form action="" id="locForm" method="post" enctype="multipart/form-data" >
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Add Image</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can add image of a Store!
                                <a href="<?php echo base_url();?>admin/restaurant/viewimages/<?php echo $this->uri->segment(4); ?>"><button type="button" style="float:right;">CANCEL</button></a>
                              </p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">
                                <div class="col-lg-12">
                                    <div class="row">

                                        <div class="sep_box">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Image Type <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select type="text" name="r_img_type" id="r_img_type">
                                                                <option value="">-- Select Image Type --</option>
                                                                <option value="1">Store Image</option>
                                                               <!--  <option value="2">Menu Image</option> -->
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Image <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="file" name="r_img_name" id="r_img_name" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </div>                                       
                                        <div class="sep_box">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="submit" name="submit" value="Submit" />
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
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
   
</html>

<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#locForm").validate({
          // Specify the validation rules
          rules: {
              r_img_type : "required",
              r_img_name : "required"
          },
          
          messages: {
              r_img_type : "This field is compulsory!",
              r_img_name : "This field is compulsory!"
          },
          
          submitHandler: function(form) {
            form.submit();
          }
      });
   });
</script>