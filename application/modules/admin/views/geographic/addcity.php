<script language='javascript'>
  
  // When the browser is ready...
  $(document).ready(function() {
  
  // Setup form validation on the #register-form element
    $("#addCont").validate({
        // Specify the validation rules
        rules: {
            statename : "required",
            statecode : "required",
            countryid : "required",
           /* email:{
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            agree: "required" */
        },
        // Specify the validation error messages
        messages: {
            statename: "State name required",
            statecode: "State code required",
            countryid: "Country Id required"
            /*password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Please enter a valid email address",
            agree: "Please accept our policy"*/
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
                            <h2>Add City</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can add city.</p>
                           
                                  <?php echo validation_errors(); ?> 
                                  <?php  echo $this->session->flashdata('message'); ?>

                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                 <form action="" method="POST">
                                    <div class="row">
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Select Country <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="countryid" id="countryid" onchange="selectstates();">
                <option value="">select Country</option>
                <?php foreach ($vieww1 as $key => $value) { ?>
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
                                                        <div class="tbl_text">State Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <select id="stateid" name="stateid" value="stateid">
                                                             <option value="">Select State</option>
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
                                                        <div class="tbl_text">City Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <input  type="text" name="cityname"  id="cityname" onblur="checkname();" />
                                                        </div>

                                                      
                                                  

                                                    </div>


                                                </div>
                                            </div>
                                            
                                          
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text"></div>
                                                    </div>
                                                    <div class="col-lg-8">
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
                                </form>





                            </div>

                         
                            <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl">
                                        <thead>
                                          <tr>
                                            <th>S:NO</th>
                                            <th>State Name</th>
                                            <th>City Name</th>
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
                                            <td><?php echo $value->statename ;?></td>
                                            <td><?php echo $value->cityname ;?></td>
                                            <td><a href="<?php echo base_url()?>admin/geographic/cityupdate/<?php echo $value->cityid?>" ><i class="fa fa-pencil"></a></i>
                                            <a href="<?php echo base_url()?>admin/geographic/citydelete/<?php echo $value->cityid?>" onclick="return confirm('Are you sure to delete city?');"><i class="fa fa-trash fa-lg"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/geographic/citystatus/<?php echo $value->cityid.'/'.$value->cstatus; ?>"><?php if($value->cstatus=='D') { ?><span style="color: red;">Inactive</span><?php }else { ?>Active<?php } ?></a>

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
    </script>