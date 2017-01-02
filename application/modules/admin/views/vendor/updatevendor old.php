<!DOCTYPE html>
<html>

<body>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <form action="" id="vendorForm" method="post" enctype="multipart/form-data" >
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Update Vendor</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can update vendor details!
                                    <a href="<?php echo base_url();?>admin/vendor/viewvendors"><button type="button" style="float:right;">CANCEL</button></a></p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">
                                <div class="col-lg-12">
                                    <div class="row">

                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Vendor Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="s_username" id="s_username" value="<?php echo $vieww->s_username; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Email ID <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" value="<?php echo $vieww->s_loginemail; ?>" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>

                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Contact Number <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="s_mobileno" id="s_mobileno" value="<?php echo $vieww->s_mobileno; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">TIN Number</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" name="s_tin_number" id="s_tin_number"  value="<?php echo $vieww->s_tin_number; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">TAX Number</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="s_Taxnumber" id="s_Taxnumber" value="<?php echo $vieww->s_Taxnumber; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">IFSC Code</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" name="s_IfsoCode" id="s_IfsoCode" value="<?php echo $vieww->s_IfsoCode; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  

                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Bank Name</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" name="s_Bankname" id="s_Bankname" value="<?php echo $vieww->s_Bankname; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Bank Address</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <textarea type="text" name="s_Bankaddress" id="s_Bankaddress"><?php echo $vieww->s_Bankaddress; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  

                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Beneficiary Account Number</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" name="s_Beneficeryac_no" id="s_Beneficeryac_no" value="<?php echo $vieww->s_Beneficeryac_no; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
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
    $("#vendorForm").validate({
          // Specify the validation rules
          rules: {
              s_username : "required",
              s_mobileno :  {required:true, number:true}
          },
          
          messages: {
              s_username : "Please enter vendor name!",
              s_mobileno : {required:"Please enter contact number!", number:"Numbers only!"}
          },
          
          submitHandler: function(form) {
            form.submit();
          }
      });
   });
</script>