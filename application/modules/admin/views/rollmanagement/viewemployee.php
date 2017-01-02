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
                            <h2>Manage Manager</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can see the list of Manager!<a href="<?php echo base_url();?>admin/login/addemployee" style="float:right;margin-left: 10px;"><button>ADD Employee</button></a><a href="<?php echo base_url();?>admin/login/viewleadteamleader" style="float:right;"><button>Manage TL Manager</button></a></p>
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
                                                <th bgcolor='red'>Designation</th>
                                                <th bgcolor='red'>Employee ID</th>
                                                <th bgcolor='red'>Email ID</th>
                                                <th bgcolor='red'>Contact Number</th>
                                               <!--  <th bgcolor='red'>Assigned Stores</th> -->
                                                <th bgcolor='red'>Action</th>                                             
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=0;
                                            foreach ($vieww as $value) {
                                            $i++;
                                            $parameter = array(
                                                        'act_mode' => 'fetchmgrstores', 
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
                                            $stores = $this->supper_admin->call_procedure('proc_vendor', $parameter);
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value->s_username; ?></td>
                                            <td>Operation Head</td>
                                            <td><?php echo $value->retailer_codeid; ?></td>
                                            <td><?php echo $value->s_loginemail; ?></td>
                                            <td><?php echo $value->contact_no; ?></td> 

                                            <td><!-- <a href="<?php //echo base_url()?>admin/retailer/assignstore/<?php //echo $value->s_admin_id?>"><!-- <button type="button">Assign Store</button></a> -->
                                            <a href="<?php echo base_url()?>admin/login/updateemployee/<?php echo $value->s_admin_id?>" ><i class="fa fa-pencil"></i></a>
                                            <a href="<?php echo base_url()?>admin/login/deleteemployee/<?php echo $value->s_admin_id?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/login/statusemployee/<?php echo $value->s_admin_id.'/'.$value->s_userstatus; ?>"><?php if($value->s_userstatus==1) echo 'Active'; else echo '<span style="color:red;">Inactive</span>'; ?></a>
                                            <?php
                                            if($value->active=='')
                                            {

                                            ?>

                                            <button id="leadheadbutton<?php echo $value->s_admin_id; ?>" onclick="leadheadactive('<?php echo $value->s_admin_id; ?>')" type="button">Assign</button>
                                             <i class="fa fa-check" style="display:none" id="rightarrow<?php echo $value->s_admin_id; ?>" aria-hidden="true" ></i>
                                            <?php }else{ ?>


                                                &nbsp;<i class="fa fa-check" aria-hidden="true" ></i>

                                                <?php } ?>

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
</body>  
</html>


<script type="text/javascript">
  
function leadheadactive(ids)
{

   
 $.ajax({
    url: '<?php echo base_url(); ?>admin/manager/leadheadactive',
    type: 'POST',
    data: {'leadheadid':ids},
    success: function(data){
       $("#leadheadbutton"+ids).remove();
       $("#rightarrow"+ids).css('display', 'block');
       
    }
    });  

}

</script>>