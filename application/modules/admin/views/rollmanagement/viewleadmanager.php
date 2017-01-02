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
                            <h2>Manage Lead Manager</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can see the list of Lead Manager!<a href="<?php echo base_url();?>admin/login/addemployee" style="float:right;margin-left:10px"><button>ADD Employee</button></a><a href="<?php echo base_url();?>admin/login/viewleadteamleader" style="float:right;margin-left:10px"><button>Manage TL Manager</button></a><a href="<?php echo base_url();?>admin/login/viewemployee" style="float:right;"><button>Manage Manager</button></a></p>
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
                                                <th bgcolor='red'>Assigned Manager</th>
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
                                            <td>Operation Lead Manager</td>
                                            <td><?php echo $value->retailer_codeid; ?></td>
                                            <td><?php echo $value->s_loginemail; ?></td>
                                            <td><?php echo $value->contact_no; ?></td> 
                                            <td>
                                    <?php if($value->pid!=''){ echo '<span style="color:green;">'.$value->uname.' ('.$value->ucode.')</span>'; }else{?>
                                       <p id="ss<?php echo $value->s_admin_id; ?>"> <select id="manage<?php echo $value->s_admin_id; ?>"><option value="">Select Manager</option>
                                                <?php foreach ($assignm as $key => $val) {
                                                    echo '<option value="'.$val->s_admin_id.'_'.$val->pid.'_'.$val->s_username.'_'.$val->retailer_codeid.'">'.$val->s_username.' ('.$val->retailer_codeid.')</option>';
                                            }?>
                                        </select>
                                               <button onclick="assign('<?php echo $value->s_admin_id; ?>')" type="button">Assign</button></p>
                                               <p id="msg<?php echo $value->s_admin_id; ?>"></p>
                                               <?php } ?>
                                           </td>
                                            <td>
                                            <a href="<?php echo base_url()?>admin/login/updateemployee/<?php echo $value->s_admin_id?>" ><i class="fa fa-pencil"></i></a>
                                            <a href="<?php echo base_url()?>admin/login/deleteemployee/<?php echo $value->s_admin_id?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a>
                                            <?php if($value->pid==''){ echo '<span style="color:red;">Inactive</span>'; }else{?>
                                            <a href="<?php echo base_url(); ?>admin/login/statusemployee/<?php echo $value->s_admin_id.'/'.$value->s_userstatus; ?>"><?php if($value->s_userstatus==1) echo 'Active'; else echo '<span style="color:red;">Inactive</span>'; ?></a><?php } ?>

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
function assign(ids)
{
    var m=$('#manage'+ids).val();
    var a=m.split("_");
    var uid=a[0];
    var pid=a[1];
    var n=a[2];
    var c=a[3];
    //alert(pid+'**'+uid);
    if(m=='')
    {
        $('#msg'+ids).text('select manager!').css('color','red');
        return false;
    }
    else
    {
        $.ajax({
    url: '<?php echo base_url(); ?>admin/manager/leadteamleaderassign',
    type: 'POST',
    data: {'parentid':pid,'leadtlid': ids,'level':2},
    success: function(data){
        $('#ss'+ids).text(n+' ('+c+')').css('color','green');
       $('#msg'+ids).text('Assigned Manager!').css('color','green');
       
    }
    });  


    }
    
}
</script>