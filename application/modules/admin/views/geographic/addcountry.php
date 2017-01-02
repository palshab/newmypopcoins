<div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <!-- <form action="" method="post" enctype="multipart/form-data" > -->
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Add Country</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can add country.</p>
                           
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
                                                        <div class="tbl_text">Country Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                              <input  type="text" name="couname"  id="couname" onblur="checkname();" />
                                                        </div>

                                                         <input id="submitBtn" type="submit" name="submit" value="Submit" class="btn_button sub_btn" />
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



                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl">
                                        <thead>
                                           <tr>
                                            <th>S:NO</th>
                                            <th>Country Name</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <?php $i=0; foreach ($vieww as $key => $value) {
                                          $i++;
                                        ?>
                                       
                                        <tr>
                                            <td><?php echo $i ;?></td>
                                            <td><?php echo $value->name ;?></td>
                                            <td><a href="<?php echo base_url()?>admin/geographic/countryupdate/<?php echo $value->conid?>" ><i class="fa fa-pencil"></a></i>
                                            <a href="<?php echo base_url()?>admin/geographic/countrydelete/<?php echo $value->conid?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/geographic/countrystatus/<?php echo $value->conid.'/'.$value->counstatus; ?>"><?php if($value->counstatus=='D') { ?><span style="color: red;">Inactive</span><?php }else { ?>Active<?php } ?></a>

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
   
    </script>