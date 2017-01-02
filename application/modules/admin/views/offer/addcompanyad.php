<!DOCTYPE html>
<html>

<body>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <form action="" id="compForm" method="post" enctype="multipart/form-data" >
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Add Comapny Ad</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can add company ad!
                                <a href="<?php echo base_url();?>admin/offer/viewcompanyads/"><button type="button" style="float:right;">CANCEL</button></a>
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
                                                        <div class="tbl_text">Company Title </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" name="comp_title" id="comp_title" /> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Description </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <textarea name="comp_desc"></textarea>
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
    $("#compForm").validate({
          // Specify the validation rules
          rules: {
              comp_title : "required",
              comp_desc : "required"
          },
          
          messages: {
              comp_title : "This field is compulsory!",
              comp_desc : "This field is compulsory!"
          },
          
          submitHandler: function(form) {
            form.submit();
          }
      });
   });
</script>