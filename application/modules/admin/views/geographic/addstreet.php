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
                            <h2>Add Location</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can add location!</p>
                           
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
                                                        <div class="tbl_text">Country<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="countryid" id="countryid" onchange="selectstates();">
                <option value="">-- Select Country --</option>
                <?php foreach ($country as $key => $value) { ?>
                    <option value="<?php echo $value->conid; ?>"><?php echo $value->name; ?></option>
                <?php } ?>
                </select>
                                                        </div>

                                                      
                                                  

                                                    </div>


                                                </div>
                                            </div>
                                            
                                          
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">State<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <select id="stateid" name="stateid" value="stateid" onchange="selectcities();">
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
                                                        <div class="tbl_text">City <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select id="cityid" name="cityid">
                                                             <option value="">-- Select City --</option>
                                                            </select>
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
                                                          <input  type="text" name="streetname"  id="streetname" onblur="checkname();" />
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
                                <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl">
                                        <thead>
                                          <tr>
                                            <th>S:NO</th>
                                            <th>City Name</th>
                                            <th>Location</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=0;
                                    if(!empty($vieww))
                                           {
                                            if(@$_GET['page'])
                                            {
                                              $page = $_GET['page']-1; 
                                              $i=$page*50; 
                                            }
                                          } 
                                     foreach ($vieww as $key => $value) {
                                          $i++;
                                        ?>
                                       
                                        <tr>
                                            <td><?php echo $i ;?></td>
                                            <td><?php echo $value->cityname ;?></td>
                                            <td><?php echo $value->location ;?></td>
                                            <td><a href="<?php echo base_url()?>admin/geographic/streetupdate/<?php echo $value->streetid?>" ><i class="fa fa-pencil"></a></i>
                                            <a href="<?php echo base_url()?>admin/geographic/streetdelete/<?php echo $value->streetid?>" onclick="return confirm('Are you sure to delete street?');"><i class="fa fa-trash fa-lg"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/geographic/streetstatus/<?php echo $value->streetid.'/'.$value->sstatus; ?>"><?php if($value->sstatus=='1') { ?>Active<?php }else { ?><span style="color: red;">Inactive</span><?php } ?></a>

                                            </td>
                                        </tr>
                                        <?php } ?>
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