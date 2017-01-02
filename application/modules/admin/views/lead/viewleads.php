<!DOCTYPE html>
<html>
<body>
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
    <script>
    function changeStatus(status,id,email) {
       
        //alert(status); return false;

        if(status=="2") {
            alert("Are you sure you want to reject this lead?");
            $.ajax({
            url: '<?php echo base_url(); ?>admin/lead/change_status',
            type: 'POST',
            data: {'status':status,'id':id,'email':email},
            success: function(data){
                $("#status_msg_"+id).html("Updated successfully!");
                $("#status_msg_"+id).css("color","green");
            }
            });
        } else if(status=="1") {
            alert("Are you sure you want to approve this lead this lead?");
            $.ajax({
            url: '<?php echo base_url(); ?>admin/lead/change_status',
            type: 'POST',
            data: {'status':status,'id':id,'email':email},
            success: function(data){
                $("#status_msg_"+id).html("Updated successfully!");
                $("#status_msg_"+id).css("color","green");
            }
            });
        } else {
            $.ajax({
            url: '<?php echo base_url(); ?>admin/lead/change_status',
            type: 'POST',
            data: {'status':status,'id':id,'email':email},
            success: function(data){
                $("#status_msg_"+id).html("Updated successfully!");
                $("#status_msg_"+id).css("color","green");
            }
            });
        }
    }
    </script>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>  
        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Manage Leads</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can view list of leads!
                                </p>
                                <p>
                                <div class='flashmsg'>
                                    <?php echo validation_errors(); ?> 
                                    <?php
                                      if($this->session->flashdata('message')){
                                        echo $this->session->flashdata('message'); 
                                      }
                                    ?>
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                    $('#example').DataTable();
                                    } );
                                </script>
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
                                                <th bgcolor='red'>Email ID</th> 
                                                <th bgcolor='red'>Contact Number</th> 
                                                <th bgcolor='red'>Company Name</th>
                                                <!-- <th bgcolor='red'>Cancelled Cheque</th> 
                                                <th bgcolor='red'>PAN Card</th> 
                                                <th bgcolor='red'>TIN Copy</th>  --> 
                                                <th bgcolor='red'>Assign Lead</th>
                                                                                                
                                                <th bgcolor='red'>Action</th>                                          
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=0;
                                            foreach ($vieww as $value) {
                                            $i++;
                                       
                                            $parameter = array(
                                                        'act_mode' => 'fetchemployeelead', 
                                                        'v_id' => $value->s_admin_id,
                                                        'v_status' => '',
                                                        'v_mobile' => '',
                                                        'v_email' => '',
                                                        'v_pwd' => '',
                                                        'tin_no' => '',
                                                        'tax_no' => '',
                                                        'bank_name' => '',
                                                        'bank_addr' => '',
                                                        'ifsc_code' => '',
                                                        'bene_accno' => '',
                                                        'param1' => '',
                                                        'param2' => ''
                                                      );
                                            $leads = $this->supper_admin->call_procedure('proc_vendor', $parameter);


                                        ?>
                                        <tr id="tablerow_<?php echo  $value->s_admin_id; ?>">

                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value->s_username; ?></td>
                                            <td><?php echo $value->s_loginemail; ?></td>
                                            <td><?php echo $value->contact_no; ?></td>
                                            <td><?php echo $value->company_name; ?></td>
                                            <!-- <td><?php if($value->can_cheque_copy!="") { echo '<a href="'.base_url().'public/leaddocuments/'.$value->can_cheque_copy.'" target="blank">Click here</a>'; } ?></td>
                                            <td><?php if($value->pan_card_copy!="") { echo '<a href="'.base_url().'public/leaddocuments/'.$value->pan_card_copy.'" target="blank">Click here</a>'; } ?></td>
                                            <td><?php if($value->tin_copy!="") { echo '<a href="'.base_url().'public/leaddocuments/'.$value->tin_copy.'" target="blank">Click here</a>'; } ?></td> -->

                                           

                                            <td>
                                           
 <select name="assignlead"   id="assignlead_<?php echo $value->s_admin_id; ?>">
                                                  <option value="">Select</option>
                                                  <?php 
                                               foreach ($vieww1 as $key => $value2) {
                                                   
                                               
                                               ?>   
                                                <option value="<?php echo $value2->s_admin_id.'_'.$value2->l_id ; ?>"><?php echo $value2->s_username.'('.$value2->retailer_codeid.')'; ?></option>
                                               
                                                <?php } ?>

                                                </select>


                                               <button onclick="assignemployee('<?php echo $value->s_admin_id; ?>')" type="button">Assign</button></td>
                                            </td>



                                          
                                                

                                            <?php
                                            
                                            if($this->session->userdata('popcoin_login')->s_admin_id==1)
                                            {

                                            ?>    

                                            <td>


                                            <a href="<?php echo base_url()?>admin/lead/updatelead/<?php echo $value->s_admin_id?>" ><i class="fa fa-pencil"></a></i>
                                            <a href="<?php echo base_url()?>admin/lead/deletelead/<?php echo $value->s_admin_id?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a>
                                            <?php /* ?> <a href="<?php echo base_url(); ?>admin/lead/statuslead/<?php echo $value->s_admin_id.'/'.$value->s_userstatus; ?>" <?php if($value->s_userstatus=='1') { ?> onclick="return confirm('Are you sure you want to disapprove this lead?')" <?php } else { ?> onclick="return confirm('Are you sure you want to approve this lead?')" <?php } ?>>
                                                <?php if($value->s_userstatus=='1') echo 'Approved'; else echo 'Disapproved'; ?>
                                            </a> <?php */ ?>
                                            </td>


                                            <?php }else{ ?>

                                                <td>
                                                   <select id="lead_status_<?php echo $value->s_admin_id?>" onchange="return changeStatus(this.value,'<?php echo $value->s_admin_id?>','<?php echo $value->s_loginemail?>');" class="form-control">
                                                    <option value="0" <?php if($value->s_isAdminStatus=="0") echo "selected";?>>Pending</option>
                                                    <option value="1" <?php if($value->s_isAdminStatus=="1") echo "selected";?>>Approved</option>
                                                    <option value="2" <?php if($value->s_isAdminStatus=="2") echo "selected";?>>Rejected</option>
                                                </select>
                                                </select>


                                          

                                                <?php } ?>

                                                <div id="status_msg_<?php echo $value->s_admin_id?>"></div></td>
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
    
function assignemployee(ids)
{   


    
  var empid =   $("#assignlead_"+ids).val();
 //alert(empid); return false;    
//leadid = [];
 






 
 
  
  var leadid = empid.split('_');
  // alert(leadid);






  $.ajax({
    url: '<?php echo base_url(); ?>admin/lead/assignlead',
    type: 'POST',
    data: {'mapid': leadid[1],'leadid': ids,'submit':'submit'},
    success: function(data){
       // alert(data);
          $('#tablerow_'+ids).remove();
            $(".flashmsg").html("You Information is saved");
       
       
    }
    });  




}


</script>