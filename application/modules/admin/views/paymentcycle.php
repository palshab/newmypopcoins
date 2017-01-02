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
                            <h2>Payment Cycle Details</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p>In this section, you can see the list of payment cycle details!</p>
                                <p style="color:red;text-align:center;">
                                    <?php echo validation_errors(); ?> 
                                   
                                </p>
                                <p style="color:green;text-align:center;">                                   
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
                                    <form action="<?php echo base_url('admin/tax/paymentcycle'); ?>" method="post">
                <div class="col-lg-2"><input type="text" name="payname" placeholder="Payment Cycle Name" class="form-control"></div>
                 <div class="col-lg-2"><input type="text" name="paydate" placeholder="Payment Cycle Date" class="form-control"></div>
                  <div class="col-lg-2"><input type="text" name="fdate" placeholder="Transfer From Date" class="form-control"></div>
                   <div class="col-lg-2"><input type="text" name="edate" placeholder="Transfer To Date" class="form-control"></div>
                <div class="col-lg-2"><input type="submit" name="paysubmit" class="form-control btn-primary"></div>
            </form>
                                </div></div></div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl" id="example">
                                        <thead>
                                            <tr>                                               
                                                <th bgcolor='red'>Payment Cycle Name</th>
                                                <th bgcolor='red'>Payment Cycle Date</th>
                                                <th bgcolor='red'>Transfer From Date</th>
                                                <th bgcolor='red'>Transfer To Date</th>
                                                <th bgcolor='red'>Action</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($vieww as $value) { ?>
                                        <tr>                                       
                                            <td><?php echo $value->cycle_title; ?></td>
                                            <td><?php echo $value->pay_cycledate; ?></td>
                                            <td><?php echo $value->fromdate; ?></td>
                                            <td><?php echo $value->todate; ?></td> 
                                            <td>
                                                 <a href="<?php echo base_url()?>admin/tax/paymentcycledelete/<?php echo $value->cycle_id?>"  onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash"></i></a>
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