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
                            <h2>Manage Lead</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can see the list of Leads!</p>
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
                                                <th bgcolor='red'>Lead Retailer</th>
                                                <!-- <th bgcolor='red'>Action</th> -->                                             
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php //p($view);
                                         $i=0;
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
                                <!--  <a href="<?php echo base_url(); ?>admin/login/statusemployee/<?php echo $value->s_admin_id.'/'.$value->s_userstatus; ?>"  onclick="return confirm('Are you sure to Approve?');"><?php if($value->s_usertype==7) echo 'Not Approved'; else echo '<span style="color:red;">Approved Retailer!</span>'; ?></a> -->
                                <?php if($value->s_usertype==7) { ?> 
                         <a href="javascript:void(0)" id="re<?php echo $value->s_admin_id; ?>" onclick="app('<?php echo $value->s_admin_id; ?>')">Not Approved</a>
                                 <p id="msg<?php echo $value->s_admin_id; ?>"></p>
                                 <?php }else{ echo '<span style="color:green;">Approved Retailer!</span>'; }?>
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
function app(ids)
{

    $.ajax({
    url: '<?php echo base_url(); ?>admin/leadmanage/approveretailer',
    type: 'POST',
    data: {'lid': ids},
    success: function(data){
       // alert(data);
        $('#re'+ids).remove();
       $('#msg'+ids).text('Approved Retailer!').css('color','green');
       
    }
    });  


    
}
</script>