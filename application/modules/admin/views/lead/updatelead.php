<!DOCTYPE html>
<html>
<body>
    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <form action="" id="leadForm" method="post" enctype="multipart/form-data" >
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Add Lead</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can add lead!
                                    <a href="<?php echo base_url();?>admin/lead/viewleads"><button type="button" style="float:right;">CANCEL</button></a></p>
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
                                                        <div class="tbl_text">Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="s_username" id="s_username" value="<?php echo $vieww->s_username;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Contact Number <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="contact_no" id="contact_no" value="<?php echo $vieww->contact_no;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                       
                                        </div> 
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Company Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="company_name" id="company_name" value="<?php echo $vieww->company_name;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Email Address <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="s_loginemail" id="s_loginemail" value="<?php echo $vieww->s_loginemail;?>" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                       
                                        </div> 
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">PAN Number </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="pan_card_no" id="pan_card_no" value="<?php echo $vieww->pan_card_no;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">TIN Number Address </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="tin_no" id="tin_no" value="<?php echo $vieww->tin_no;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                       
                                        </div> 
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Company Address <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="Company_Address" id="Company_Address" value="<?php echo $vieww->Company_Address;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">PIN Code <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="pincode" id="pincode" value="<?php echo $vieww->pincode;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                       
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Company Website </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="company_website" id="company_website" value="<?php echo $vieww->company_website;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Account Holder Name </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="accholder_name" id="accholder_name" value="<?php echo $vieww->accholder_name;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                       
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Account Number </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="acc_number" id="acc_number" value="<?php echo $vieww->acc_number;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Bank Name </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="bank_name" id="bank_name" value="<?php echo $vieww->bank_name;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                       
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Bank Branch </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="bank_branch" id="bank_branch" value="<?php echo $vieww->bank_branch;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">IFSC Code </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="ifsc_code" id="ifsc_code" value="<?php echo $vieww->ifsc_code;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                       
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Cancelled Cheque Copy </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="file" name="can_cheque_copy" id="can_cheque_copy" />
                                                            <input type="hidden" name="can_cheque_copy1" value="<?php echo $vieww->can_cheque_copy;?>" />
                                                            <?php if($vieww->can_cheque_copy!="") {?>
                                                            <img src="<?php echo base_url();?>public/leaddocuments/<?php echo $vieww->can_cheque_copy;?>" />
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">PAN Card Copy </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="file" name="pan_card_copy" id="pan_card_copy" />
                                                            <input type="hidden" name="pan_card_copy1" value="<?php echo $vieww->pan_card_copy;?>" />
                                                            <?php if($vieww->pan_card_copy!="") {?>
                                                            <img src="<?php echo base_url();?>public/leaddocuments/<?php echo $vieww->pan_card_copy;?>" />
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                       
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">TIN Copy </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="file" name="tin_copy" id="tin_copy" />
                                                            <input type="hidden" name="tin_copy1" value="<?php echo $vieww->tin_copy;?>" />
                                                            <?php if($vieww->tin_copy!="") {?>
                                                            <img src="<?php echo base_url();?>public/leaddocuments/<?php echo $vieww->tin_copy;?>" />
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-12">
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
    $("#leadForm").validate({
          // Specify the validation rules
          rules: {
              s_username : "required",
              contact_no : {required:true, number:true},
              company_name :  "required",
              Company_Address : "required",
              pincode : {required:true, number:true},
              acc_number : "number"
          },
          
          messages: {
              s_username : "This field is required!",
              contact_no : {required:"This field is required!", number:"Numbers only!"},
              company_name :  "This field is required!",
              Company_Address : "This field is required!",
              pincode : {required:"This field is required!", number:"Numbers only!"},
              acc_number : "Numbers only!"
          },
          
          submitHandler: function(form) {
            form.submit();
          }
      });
   });
</script>