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
                            <h2>Deals</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can view deals!</p>
                           
                                  <?php echo validation_errors(); ?> 
                                  <?php  echo $this->session->flashdata('message'); ?>

                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                 <form action="#" method="POST" id="addCont">
                                    <div class="row">
                                        <div class="sep_box">
                                            
                                            
                                          
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Ram<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <select id="storeid" name="storeid" value="" >
                                                             <option value="">-- Select Ram --</option>
                                                             </select>
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
                                                        <input id="submitBtn" type="button" name="submit" value="Submit" onclick="return dealssss()" class="btn_button sub_btn" />
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
                                                <!-- <th bgcolor='red'>S.No.</th>
                                                <th bgcolor='red'>Deal ID</th>
                                                <th bgcolor='red'>Retailer ID</th>
                                                <th bgcolor='red'>Deal Image</th>
                                                <th bgcolor='red'>Category</th>
                                                <th bgcolor='red'>Store Name</th>
                                                <th bgcolor='red'>Type Of Deal</th>
                                                <th bgcolor="red">From Date</th>
                                                <th bgcolor="red">To Date</th> -->
                                                <th bgcolor='red'>S.No.</th>
                                                <th bgcolor='red'>Name</th>
                                                <th bgcolor='red'>Email ID</th> 
                                                <th bgcolor='red'>Contact Number</th> 
                                                <th bgcolor='red'>Company Name</th>
                                                <th bgcolor='red'>PAN Card</th> 
                                            </tr>
                                        </thead>
                                        <tbody id="tabl_datassss">
                                        <?php $i=0;
                                    if(!empty($ramretailer))
                                           {
                                            if(@$_GET['page'])
                                            {
                                              $page = $_GET['page']-1; 
                                              $i=$page*50; 
                                            }
                                          } 
                                     foreach ($ramretailer as $value) {
                                         $i++;
                                        ?>
                                       
                                        <tr id="tabl_data"><td><?php echo $i; ?></td>
                                             <td><?php echo $value->s_username; ?></td>
                                             <td><?php echo $value->s_loginemail; ?></td>
                                            <td><?php echo $value->contact_no; ?></td>
                                            <td><?php echo $value->company_name; ?></td>
                                            <td><?php echo  $value->pan_card_value; ?></td>                
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


function selectstores(){
    var retailerid=$('#retailerid').val();
    $.ajax({
    url: '<?php echo base_url()?>admin/offer/fetchstore',
    type: 'POST',
    
    data: {'retailerid': retailerid},
    success: function(data){
    var  option_brand = '<option value="">Select Store</option>';
    $('#storeid').empty();
    $("#storeid").append(option_brand+data);
    }
    });
}

function dealssss() {
    var retailerid = $('#retailerid').val();
    var storeid = $('#storeid').val();


 $.ajax({
    url: '<?php echo base_url(); ?>admin/offer/deal',
    type: 'POST',
    data: {'retailerid': retailerid,
            'storeid': storeid},
    success: function(data){
    
        $('#tabl_datassss').html(data);
      
    }
    });  
 

    
}


</script>