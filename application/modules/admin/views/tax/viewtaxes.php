



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
                            <h2>Manage Taxes</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                            <!--     <p> In this section, admin can see list of all taxes!<a href="<?php echo base_url();?>admin/tax/addtax" style="float:right;"><button>ADD TAX</button></a></p> -->
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
                                                <th bgcolor='red'>Tax Name</th>
                                                <th bgcolor='red'>Tax Value (In %)</th>
                                                <th bgcolor='red'>Action</th>                                             
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=0; 
                                            foreach ($vieww as $value) {
                                            $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value->commision_title; ?></td>
                                            <td><?php echo $value->commission_per; ?></td>                                        
                                            <td>
                                            <a href="<?php echo base_url()?>admin/tax/updatetax/<?php echo $value->commission_id?>" ><i class="fa fa-pencil"></i></a>
                                           <!-- <a href="<?php //echo base_url()?>admin/tax/deletetax/<?php //echo $value->commission_id?>" <!-- onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a> 
                                            <a href="<?php //echo base_url(); ?> <!-- admin/tax/statustax/<?php //echo $value->commission_id.'/'.$value->status; ?>"><?php //if($value->status==1) echo 'Active'; else echo '<span style="color:red;">Inactive</span>'; ?> <!--</a> -->
                                            <?php if($value->status=='1') echo 'Active'; else echo '<span style="color:red;">Inactive</span>'; ?>
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