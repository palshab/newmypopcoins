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
                                <p> In this section, you can see the list of Lead Manager!</p>
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
                                                 <th bgcolor='red'>Action</th>                                         
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
                                  <a href="<?php echo base_url()?>admin/lead/viewmanagerlead/<?php echo $value->s_admin_id?>" ><i class="fa fa-street-view" style="font-size: 30px;"></i></a>
                                          


                                           </td>

                                           <td>
                                               

                                             <a href="<?php echo base_url()?>admin/leadmanage/transferm/<?php echo $value->s_admin_id?>" ><i class="fa fa-share" aria-hidden="true"></i></a>


                                           </td>




                                           <!--  <td> -->
                                           <!--  <a href="<?php echo base_url()?>admin/login/updateemployee/<?php echo $value->s_admin_id?>" ><i class="fa fa-pencil"></i></a>
                                            <a href="<?php echo base_url()?>admin/login/deleteemployee/<?php echo $value->s_admin_id?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a> -->
                                            <?php /*if($value->pid==''){ echo '<span style="color:red;">Inactive</span>'; }else{?>
                                            <a href="<?php echo base_url(); ?>admin/login/statusemployee/<?php echo $value->s_admin_id.'/'.$value->s_userstatus; ?>"><?php if($value->s_userstatus==1) echo 'Active'; else echo '<span style="color:red;">Inactive</span>'; ?></a><?php }*/ ?>

                                            <!-- </td> -->
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