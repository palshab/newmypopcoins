<?php
//p($view); exit;
/*$newvalue = array();

foreach ($view as $key => $value1) {
     
     $newvalue = array_push($value1->user_id, $newvalue);
}
print_r($newvalue);
exit;*/
?>


<!DOCTYPE html>
<html>
<body>
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Manage Team Lead Manager</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can see the list of Team Lead Manager!</p>
                                <p style="color:green;text-align:center;">
                                    <?php echo validation_errors(); ?> 
                                    <?php
                                      if($this->session->flashdata('message')){
                                        echo $this->session->flashdata('message'); 
                                      }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl" id="example">
                                        <thead>
                                            <tr>
                                                <th bgcolor='red'>S.No.</th>
                                                <th bgcolor='red'>Name</th>
                                                <th bgcolor='red'>Employee ID</th>
                                                <th bgcolor='red'>Email ID</th>
                                                <th bgcolor='red'>Contact Number</th>
                                                <th bgcolor='red'>Lead Manager</th>
                                                <th bgcolor='red'>Transfer Task</th>
                                                <th bgcolor='red'>Ram</th>                                           
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=0;
                                            foreach ($view as $value) {
                                            $i++;
                                           
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value->s_username; ?></td>
                                            <td><?php echo $value->retailer_codeid; ?></td>
                                            <td><?php echo $value->s_loginemail; ?></td>
                                            <td><?php echo $value->contact_no; ?></td> 
                                            <td>
                                  <a href="<?php echo base_url()?>admin/leadmanage/viewleadm/<?php echo $value->s_admin_id?>" ><i class="fa fa-street-view" style="font-size: 30px;"></i></a>




                                  


                                           </td>

                                           <?php 
                                           if($value->user_id!=$value->tl_leaveid)
                                           {
                                          
                                            ?>
                                           <td>

                                             <a href="<?php echo base_url()?>admin/leadmanage/transferm/<?php echo $value->s_admin_id?>" ><i class="fa fa-share" aria-hidden="true"></i></a>


                                           </td>
                                           

                                            <td>
                            <select id="ram" name="ram" onchange="">
                                                
                            <option value="0">----Select Ram ---------</option>
                                               <?php 
                                               foreach ($ram as $key => $value1) {
                                                   
                                               
                                               ?>     
                                                <option value="<?php echo $value1->ramid ; ?>"><?php echo $value1->name ; ?></option>
                                               
                                                <?php } ?>
                                                </select>

                        <span id="ramassignmsg" style="color:green"></span>
                        <button onclick="assignram(<?php echo  $value->s_admin_id; ?>)">Assign</button>

                                            </td>



                                            <?php } ?>
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
</body>  
</html>
<script type="text/javascript">
    

    function assignram(id)
{
   
  var ramid =   $("#ram").val();
  //var empid =   $("#assignlead").val();
  //alert(ramid); return false;

  $.ajax({
    url: '<?php echo base_url(); ?>admin/lead/assigntoram',
    type: 'POST',
    data: {'submit':'submit','ramid': ramid,'leadid':id},
    success: function(data){
       
      // alert(data);
       if(data!='')
       {
            //$('#tablerow_'+id).remove();
            $("#ramassignmsg").html("Ram Assign Successfully");
       }
       
    }
    });  

   


}


</script>>