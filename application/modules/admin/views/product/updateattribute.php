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
                            <h2>Update Product Attribute</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can update product attribute!
                                <a href="<?php echo base_url();?>admin/product/viewattributes/<?php echo $this->uri->segment(5);?>"><button type="button" style="float:right;">CANCEL</button></a>
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
                                                        <div class="tbl_text">Attribute </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select name="pam_attr">
                                                                <option value="">-- Select Attribute --</option>
                                                                <option value="1" <?php if($vieww->pam_attr=="1") echo "selected";?>>Small</option>
                                                                <option value="2" <?php if($vieww->pam_attr=="2") echo "selected";?>>Large</option>
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
                                                        <div class="tbl_text">Price </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="pam_price" value="<?php echo $vieww->pam_price; ?>" />
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
              pam_attr : "required",
              pam_price : { required: true, number: true }
          },
          
          messages: {
              pam_attr : "This field is compulsory!",
              pam_price : { required: "This field is compulsory!", number: "Numbers only!" }
          },
          
          submitHandler: function(form) {
            form.submit();
          }
      });
   });
</script>