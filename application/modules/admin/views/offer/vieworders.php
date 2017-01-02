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
                            <h2>Manage Orders</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can view list of orders!</p>
                            </div>
                        </div>

                        <div class="page_box">
                            <div class="col-lg-12">
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
                                <div class="gridview">
                                    <table class="grid_tbl" id="example">
                                        <thead>
                                            <tr>
                                                <th bgcolor='red'>S.No.</th>
                                                <th bgcolor='red'>Order Number</th>
                                                <th bgcolor='red'>Customer Name</th>
                                                <th bgcolor='red'>Customer Email</th>
                                                <th bgcolor='red'>Outlet</th>
                                                <th bgcolor='red'>Price (Rs.)</th>
                                                <th bgcolor='red'>Order Date</th>
                                                <th bgcolor='red'>Payment Option</th>
                                                <th bgcolor='red'>Payment Status</th>
                                                <th bgcolor='red'>Order Status</th> 
                                                <th bgcolor='red'>Booking Date</th> 
                                                <th bgcolor='red'>Booking Timing</th> 
                                                <th bgcolor='red'>No of guests</th>   
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
                                            <td><?php echo $value->t_FName.' '.$value->t_LName; ?></td>
                                            <td><?php echo $value->t_Email; ?></td>
                                            <td><?php echo $value->r_res_name; ?></td>
                                            <td><?php echo $value->order_total; ?></td>
                                            <td><?php echo $value->order_createdon; ?></td>
                                            <td><?php echo '<span style="color:green;font-weight:bold">'.@$value->payment_mode.'</span>'; ?></td>
                                            <td><?php if($value->payment_status=='success') { 
                                                echo '<span style="color:green;font-weight:bold">'.ucfirst($value->payment_status).'</span>'; 
                                            } else { 
                                                echo '<span style="color:red;font-weight:bold">'.ucfirst($value->payment_status).'</span>'; 
                                            } ?></td>
                                            <td><?php echo $value->o_status; ?></td>
                                            <td><?php echo $value->booking_date; ?></td>
                                            <td><?php echo $value->booking_time; ?></td>
                                            <td><?php echo $value->no_of_guest; ?></td>
                                            <td><a href="<?php echo base_url()?>admin/order/vieworderdetails/<?php echo $value->order_id?>" ><i class="fa fa-eye"></i> View</a>
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