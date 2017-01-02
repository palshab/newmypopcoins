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
                            <h2>Add Employee</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can add Employee!
                                    <!-- <a href="<?php echo base_url();?>admin/retailer/viewmanagers"><button type="button" style="float:right;">CANCEL</button></a> --></p>
                                    <p><div class='flashmsg'>
                                        <?php echo validation_errors(); ?> 
                                        <?php
                                          if($this->session->flashdata('message')){
                                            echo $this->session->flashdata('message'); 
                                          }
                                        ?>
                                    </div></p>
                            </div>
                        </div>
                            <form action="" id="mgrForm" method="post" enctype="multipart/form-data" >
                            <div class="page_box"> 

                                     <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Employee<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select name="employeetypeid">
                                                            <?php
                                                            foreach ($vieww as $key => $value) {
                                                                # code...
                                                         

                                                            ?>
                                                                <option value="<?php echo $value->n_Id;  ?>">
                                                                <?php echo $value->t_typeName;  ?></option>
                                                            <?php } ?>

                                                           </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 



                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="s_username" id="s_username" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Employee ID <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input id="empid" type="text" name="empid" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Alternate Email ID </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input id="alertnatemail_id" type="text" name="s_loginemail" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Password <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" name="s_loginpassword" id="s_loginpassword" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sep_box">                                        
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Contact No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="contact_no" id="contact_no" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="sep_box">                                        
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Country </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select name="country_id" id="country_id" onchange="return selectstates();">
                                                                <option value="">-- Select Country --</option>
                                                                <?php foreach($countries as $val) { ?>
                                                                <option value="<?php echo $val->conid;?>"><?php echo $val->name;?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sep_box">                                        
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">State </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select name="state_id" id="state_id" onchange="return selectcities();">
                                                                <option value="">-- Select State --</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sep_box">                                        
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">City </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select name="city_id" id="city_id">
                                                                <option value="">-- Select City --</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                       <!--  <div class="sep_box">                                        
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Address</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <textarea type="text" name="location" id="location"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!--<div class="sep_box">                                        
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">PIN code </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="pincode" id="pincode" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
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
$("#mgrForm").validate({
      rules: {
        s_username: "required",
        branchname : "required",
        s_loginemail: "required",
        s_loginpassword: "required",
        empid: "required",
        contact_no: {required:true, number:true},
        pincode: "number" 
      },
      messages: {
        s_username: "This field is required!",
        branchname: "This field is required!",
        s_loginemail: "This field is required!",
        s_loginpassword: "This field is required!",
        empid: "This field is required!",
        contact_no: {required:"This field is required!", number:"Numbers only!"},
        pincode: "Numbers only!"
      },
      submitHandler: function(form) {
        form.submit();
      }
  });
});
function selectstates(){
    var countryid=$('#country_id').val();
    $.ajax({
    url: '<?php echo base_url()?>admin/geographic/countrystate',
    type: 'POST',
    data: {'countryid': countryid},
    success: function(data){
        var option_brand = '<option value="">-- Select State --</option>';
        $('#state_id').empty();
        $("#state_id").append(option_brand+data);
    }
    });
}
function selectcities(){
    var stateid=$('#state_id').val();
    $.ajax({
    url: '<?php echo base_url()?>admin/geographic/countrycity',
    type: 'POST',
    data: {'stateid': stateid},
    success: function(data){
        var option_brand = '<option value="">-- Select City --</option>';
        $('#city_id').empty();
        $("#city_id").append(option_brand+data);
    }
    });
}
</script>