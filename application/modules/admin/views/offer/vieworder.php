<?php 

//p($user); exit;
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
                            <h2>All Order List</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can see the list of Order!</p>
                                
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl" id="example">
                                        <thead>
                                            <tr>
                                                <th bgcolor='red'>S.No.</th>
                                                <th bgcolor='red'>Order No.</th>
                                                <th bgcolor='red'>Deal Coupon Code</th>
                                                <th bgcolor='red'>Store Coupon Code</th>
                                                <th bgcolor='red'>User</th>
                                                <th bgcolor='red'>Order Total</th>
                                                <!-- <th bgcolor='red'>Payment Mode</th>
                                                <th bgcolor='red'>Payment Status</th> -->
                                                <th bgcolor='red'>Status</th>
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
                                            <td><?php echo $value->order_number; ?></td>
                                            <td><?php echo $value->dealcoupan_code; ?></td>
                                            <td><?php echo $value->storecoupan_code; ?></td>
                                            <td><?php echo $value->t_FName; ?></td>
                                            <!-- <td><?php echo $value->order_total; ?></td>
                                            <td><?php echo $value->payment_mode; ?></td>  -->
                                            <td><?php echo $value->payment_status; ?></td> 
                                            <td>Active</td>
                                            <td><select><option>Active</option>
                                            <option>Used</option>
                                        <option>Reject</option></select></td>
                                            
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