<div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <!-- <form action="" method="post" enctype="multipart/form-data" > -->
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Add Deal Status</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this Section Admin can Add Deal Status .</p>
                           
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
                                                        <div class="tbl_text">Deal Status Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                              <input  type="text" name="statusname"  id="statusname" onblur="checkname();" />
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

                              <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this Section Admin can view All order details.</p>
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
                                            <td><?php echo ucfirst($value->deal_name) ;?></td>
                                            <td><a href="<?php echo base_url()?>admin/master/dealstatusupdate/<?php echo $value->dealstatus_id?>" ><i class="fa fa-pencil"></a></i>
                                            <a href="<?php echo base_url()?>admin/master/dealstatusdelete/<?php echo $value->dealstatus_id?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/master/dealstatuss/<?php echo $value->dealstatus_id.'/'.$value->d_status; ?>"><?php if($value->d_status=='delete') { ?><span class="inactive_cl" style="color:red;">Inactive</span><?php }else { ?>Active<?php } ?></a>

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
        <div class="overlay"></div>
        <div class="inactive_data">
        	<h3>Reason for inactive</h3>
        	<div class="input_data">
        		<textarea></textarea>
        	</div>
        	<div class="input_data">
        		<input type="submit" name="" text="Submit" class="submit">
        		<a href="javascript:void()" class="cancel_b">Cancel</a>
        	</div>
        </div>

          <script type="text/javascript">
   function checkname(){
     var name=$('#statusname').val();
      $.ajax({
        url: '<?php echo base_url()?>admin/master/checkdealstatus',
        type: 'POST',
        dataType: 'json',
        data: {'name': name},
        success: function(data){
          //alert(data);
        if(data[0].count > 0){
          $('#submitBtn').prop('disabled', 'disabled');
          alert("Data Already Existed");
        }else{
          $('#submitBtn').removeAttr('disabled');
        }      
         }
  });
    
   }
   
   $(document).ready(function(){
   	$(".inactive_cl").click(function(){
   		$(".overlay").fadeIn();
   		$(".inactive_data").fadeIn();
   		return false;
   	});
   	$(".cancel_b").click(function(){
    $(".overlay").fadeOut();
   		$(".inactive_data").fadeOut();

   	});
   });
    </script>