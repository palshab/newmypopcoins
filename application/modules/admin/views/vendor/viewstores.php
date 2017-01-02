<?php 
//P($vieww); 


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
                            <h2>Manage Stores</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can see the list of stores!
                                
                                    <a href="<?php echo base_url();?>admin/adminvender/viewretailerlist" style="float:right;"><button>Retailer list</button></a>
                                   
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
                                                <th bgcolor='red'>Store ID</th>
                                                <th bgcolor='red'>Store Name</th>
                                                <th bgcolor='red'>Location</th>
                                                <th bgcolor='red'>Category</th>
                                                <th bgcolor='red'>Store Manager</th>
                                                <th bgcolor='red'>Phone No.</th>
                                                <th bgcolor='red'>Email ID</th>
                                                <th bgcolor='red'>Document Received Date</th>
                                                <th bgcolor='red'>Agreement Sign Date</th> 
                                                <th bgcolor='red'>Training Date</th>   
                                                <th bgcolor='red'>Name of the Trainee</th>
                                                <th bgcolor='red'>Cash Back</th>
                                                <th bgcolor='red'>Deal Commission</th>
                                                                                            
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=0;
                                            foreach ($vieww as $value) {
                                            $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value->s_storeunid?></td>
                                            <td><?php echo $value->s_name?></td>
                                            <td><?php echo $value->s_location; ?></td>
                                            <td><?php echo $value->categorydeal_name; ?></td> 
                                            <td><?php echo $value->s_username; ?></td> 
                                            <td><?php echo $value->s_contactno; ?></td> 
                                            <td><?php echo $value->s_emailid; ?></td> 
                                            <td><?php echo $value->document_rec_date; ?></td> 
                                            <td><?php echo $value->aggre_sing_date; ?></td>
                                            <td><?php echo $value->s_traningdate; ?></td>  
                                            <td><?php echo $value->s_traninggivename; ?></td>
                                            <td><?php echo $value->s_cashbackper; ?></td>
                                            <td><?php echo $value->s_dealcommision; ?></td>
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