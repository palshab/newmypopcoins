<script language='javascript'>
  
  // When the browser is ready...
  $(document).ready(function() {
  
  // Setup form validation on the #register-form element
    $("#addCont").validate({
        // Specify the validation rules
        rules: {
            stateid : "required",
            cityid : "required",
            countryid : "required",
            streetname : "required"
        },
        // Specify the validation error messages
        messages: {
            stateid: "State name required",
            cityid: "State code required",
            countryid: "Country Id required",
            streetname: "Street name is required"
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
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Update Location</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can update Location!</p>
                           
                                  <?php echo validation_errors(); ?> 
                                  <?php  echo $this->session->flashdata('message'); ?>

                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                 <form action="" method="POST" id="addCont">
                                    <div class="row">
                                        
                                     <div class="sep_box">
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">City <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" readonly value="<?php echo $vieww->cityname;?>" />
                                                        </div>
                                                    </div>                                                    
                                                  

                                                    </div>


                                                </div>

                                            
                                          
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Location <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <input  type="text" name="streetname" value="<?php echo $vieww->location;?>" id="streetname" onblur="checkname();" />
                                                        </div>                                                     
                                                  

                                                    </div>


                                                </div>
                                            </div>


                                        </div>

                                        <div class="sep_box">                                           
                                          
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="tbl_input">
                                                        <input id="submitBtn" type="submit" name="submit" value="Submit" class="btn_button sub_btn" />
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
                </div>
            </div>
        </div>

<script type="text/javascript">
function checkname(){
    var name=$('#couname').val();
    $.ajax({
    url: '<?php echo base_url()?>admin/geographic/checkname',
    type: 'POST',
    dataType: 'json',
    data: {'name': name},
    success: function(data){

    if(data[0].count > 0){
    $('#submitBtn').prop('disabled', 'disabled');
    alert("Data Already Existed");
    }else{
    $('#submitBtn').removeAttr('disabled');
    }      
    }
    });
}

function selectstates(){
    var countryid=$('#countryid').val();
    $.ajax({
    url: '<?php echo base_url()?>admin/geographic/countrystate',
    type: 'POST',
    //dataType: 'json',
    data: {'countryid': countryid},
    success: function(data){
    var  option_brand = '<option value="">Select State</option>';
    $('#stateid').empty();
    $("#stateid").append(option_brand+data);
    }
    });
}

function selectcities(){
    var stateid=$('#stateid').val();
    $.ajax({
    url: '<?php echo base_url()?>admin/geographic/countrycity',
    type: 'POST',
    data: {'stateid': stateid},
    success: function(data){
    var  option_brand = '<option value="">Select City</option>';
    $('#cityid').empty();
    $("#cityid").append(option_brand+data);
    }
    });
}
</script>