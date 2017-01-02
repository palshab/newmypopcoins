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
                            <h2>Manage Ram</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can see the list of ram!<a href="<?php echo base_url();?>admin/master/addram" style="float:right;"><button>ADD RAM</button></a></p>
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
                                                <th bgcolor='red'>Ram ID</th>
                                                <th bgcolor='red'>Contact Number</th>
                                                <th bgcolor='red'>Email ID</th>
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
                                            <td><?php echo $value->name; ?></td>
                                            <td><?php echo $value->ramempid; ?></td>
                                            <td><?php echo $value->contactno; ?></td>
                                            <td><?php echo $value->officialid; ?></td> 

                                            <td><!-- <a href="<?php //echo base_url()?>admin/retailer/assignstore/<?php //echo $value->s_admin_id?>"><!-- <button type="button">Assign Store</button></a> -->
                                            <a href="<?php echo base_url()?>admin/master/updateram/<?php echo $value->ramid?>" ><i class="fa fa-pencil"></i></a>
                                            <a href="<?php echo base_url()?>admin/master/deleteram/<?php echo $value->ramid?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/master/statusram/<?php echo $value->ramid.'/'.$value->t_status; ?>"><?php if($value->t_status==1) echo 'Active'; else echo '<span style="color:red;">Inactive</span>'; ?></a>

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