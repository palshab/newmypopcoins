
<?php //p($vieww);exit();?>

<!DOCTYPE html>

<html>

<body>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Update Manager</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, Retailer can Edit Manager Details!
                                    <a href="<?php echo base_url();?>admin/vendor/viewvendors"><button type="button" style="float:right;">CANCEL</button></a></p>
                            </div>
                        </div>
                        <form action="" id="vendorForm" method="post" enctype="multipart/form-data" >
                        <div class="page_box">
                        
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Manager Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" value="<?php echo $vieww->s_username; ?>" name="manager_name" id="manager_name" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Email ID <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input id="email_id" readonly type="text" value="<?php echo $vieww->s_loginemail; ?>" name="email_id" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>

                                         
                                       

                                        <div class="sep_box">
                                        
                                              <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Contact No<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" value="<?php echo $vieww->s_mobileno; ?>" name="co_number" id="co_number" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            
                                              
                                              <div class="sep_box">

                                         <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Alternate Numbers </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">  
                                                          <input  type="text" value="<?php echo $vieww->co_no_outlet; ?>" name="a_number"  id="a_number"/>
                                                        </div>

                                                      
                                                  

                                                    </div>


                                                </div>
                                            </div>
                                            
                                                
                                            </div>
                                            
                               

                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input  type="submit" name="submit" value="Submit" />
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
            manager_name: "required",
            email_id: "required",
            r_password: "required",
            co_number: "required",
             
          },
          
          messages: {
             manager_name: "Please Fill Manager Name",
            email_id: "Please Fill Email ID",
            r_password: "Please Fill Password ",
            co_number: "Please Fill Contact Name",
             
          },
          
          submitHandler: function(form) {
            form.submit();
          }
      });
   });


   </script>