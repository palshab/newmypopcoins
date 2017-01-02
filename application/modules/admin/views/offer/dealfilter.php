<!-- for select2 js --> 
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" /> <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script> <!-- for select2 js -->
<script language='javascript'>
  
  // When the browser is ready...
  $(function(){
    $("#retailerid").select2({
        placeholder: "Select Company",
        allowClear: true
    });
});
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
                                                        <div class="tbl_text">Retailer<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="retailerid" id="retailerid" onchange="selectstores();">
                <option value="">-- Select Retailer --</option>
                <?php foreach ($retailer as $key => $value) { ?>
                    <option value="<?php echo $value->s_admin_id; ?>"><?php echo $value->s_username; ?></option>
                <?php } ?>
                </select>
                                                        </div>

                                                      
                                                  

                                                    </div>


                                                </div>
                                            </div>
                                            
                                          
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Store<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <select id="storeid" name="storeid" value="" >
                                                             <option value="">-- Select Store --</option>
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
                                                <th bgcolor='red'>S.No.</th>
                                                <th bgcolor='red'>Deal ID</th>
                                                <th bgcolor='red'>Retailer ID</th>
                                                <th bgcolor='red'>Deal Image</th>
                                                <th bgcolor='red'>Category</th>
                                                <th bgcolor='red'>Store Name</th>
                                                <th bgcolor='red'>Type Of Deal</th>
                                                <th bgcolor="red">From Date</th>
                                                <th bgcolor="red">To Date</th>                                            
                                            </tr>
                                        </thead>
                                        <tbody id="tabl_datassss">
                                        <?php $i=0;
                                    if(!empty($vieww))
                                           {
                                            if(@$_GET['page'])
                                            {
                                              $page = $_GET['page']-1; 
                                              $i=$page*50; 
                                            }
                                          } 
                                    // foreach ($vieww as $value) {
                                      //    $i++;
                                        ?>
                                       
                                       <!--  <tr id="tabl_data"><td><?php echo $i; ?></td>
                                             <td><a href="#"><?php echo $value->deal_id; ?></a></td>
                                             <td><?php echo $value->retailer_codeid; ?></td>
                                             <td><img width="50px;" height="50px;" src="<?php echo base_url().'public/offermenu-images/'.$value->o_menu; ?>"></td>                                           
                                            <td><?php echo $value->categorydeal_name; ?></td>
                                            <td><?php echo $value->s_name; ?></td>
                                            <td><?php echo $value->offer_title; ?></td>                
                                            <td><?php echo $value->o_start_date; ?></td>
                                            <td><?php echo $value->o_end_date; ?></td>
                                        </tr> -->
                                        <?php //} ?>

                                         
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
    //dataType: 'json',
    data: {'retailerid': retailerid},
    success: function(data){
    var  option_brand = '<option value="0">All Store</option>';
    $('#storeid').empty();
    $("#storeid").append(option_brand+data);
    }
    });
}

function dealssss() {
    var retailerid = $('#retailerid').val();
    var storeid = $('#storeid').val();

//alert(storeid); return false;
 $.ajax({
    url: '<?php echo base_url(); ?>admin/offer/deal',
    type: 'POST',
    data: {'retailerid': retailerid,
            'storeid': storeid},
    success: function(data){
        //alert(data); return false;
        $('#tabl_datassss').html(data);
        //alert(data); return false;
    }
    });  
 

    
}


</script>