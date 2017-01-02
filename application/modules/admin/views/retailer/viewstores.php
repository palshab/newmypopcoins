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
                            <h2>Manage Stores</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can see the list of stores!
                                    <?php if($this->session->userdata('popcoin_login')->s_usertype==2) { ?>
                                    <a href="<?php echo base_url();?>admin/retailer/addstore" style="float:right;"><button>ADD STORE</button></a>
                                    <?php } ?>
                                </p>
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
                                                <th bgcolor='red'>Enrollment Date</th>
                                                <th bgcolor='red'>Store ID</th>
                                                <th bgcolor='red'>Store Name</th>
                                                <th bgcolor='red'>Store Location</th>
                                                <th bgcolor='red'>Category</th>
                                                <th bgcolor='red'>Manager Name</th>  
                                                <th bgcolor='red'>Contact Number</th>
                                                <th bgcolor='red'>Email ID</th> 
                                                <th bgcolor='red'>Training Date</th>   
                                                <th bgcolor='red'>Status</th>
                                                <?php if($this->session->userdata('popcoin_login')->s_usertype==2) { ?><th bgcolor='red'>Action</th><?php } ?>                                             
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=0;
                                            foreach ($vieww as $value) {
                                            $i++;
                                            $parameter = array(
                                                          'act_mode' => 'viewmanagers', 
                                                          'v_id' => $value->store_id,
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
                                            $managers = $this->supper_admin->call_procedure('proc_vendor', $parameter);
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($value->s_createdon));?></td>
                                            <td><?php echo $value->s_storeunid; ?></td>
                                            <td><?php echo $value->s_name; ?></td> 
                                            <td><?php echo $value->s_storeaddress; ?></td> 
                                            <td><?php echo $value->categorydeal_name; ?></td> 
                                            <td><?php $j=0; if(count($managers)>0) { foreach($managers as $val) {
                                                echo $val->s_username; $j++; if($j!=count($managers)) echo ', ';
                                            }} else echo "<span style='color:red;'>Not Assigned</span>"; ?></td>
                                            <td><?php echo $value->s_contactno; ?></td> 
                                            <td><?php echo $value->s_emailid; ?></td> 
                                            <td><?php echo $value->s_traningdate; ?></td> 
                                            <td><?php if($value->s_status==1) echo '<span style="color:green;">Active</span>'; else echo '<span style="color:red;">Inactive</span>';?></td>                                        
                                            <?php if($this->session->userdata('popcoin_login')->s_usertype==2) { ?><td>
                                            <a href="<?php echo base_url()?>admin/retailer/updatestore/<?php echo $value->store_id?>" ><i class="fa fa-pencil"></i></a>
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