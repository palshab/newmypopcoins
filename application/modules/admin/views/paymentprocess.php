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
                            <h2>Payment</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p>In this section, you can see the list of payment !</p>
                                <p style="color:red;text-align:center;">
                                    <?php echo validation_errors(); ?> 
                                   
                                </p>
                                <p style="color:green;text-align:center;">                                   
                                    <?php
                                      if($this->session->flashdata('message')){
                                        echo $this->session->flashdata('message'); 
                                      }
                                      $txn_id=$this->uri->segment(4);
                                    ?>
                                </p>
                            </div>
                        </div>
                          <div class="page_box">
                            <div class="col-lg-12">
                        <form action="<?php echo base_url('admin/receipts/paymentgateway1'); ?>" method="post">
                            <input type="text" name="txn_id" value="<?php echo $txn_id; ?>" readonly class="form-control">
                               <!--  <div class="sep_box">
                                   
                <div class="col-lg-6"><input type="text" name="payname" placeholder="Payment Cycle Name" class="form-control"></div>
                <div class="col-lg-6"><input type="text" name="paydate" placeholder="Payment Cycle Date" class="form-control"></div>
            </div>
              <div class="sep_box">
                                   
                <div class="col-lg-6"><input type="text" name="payname" placeholder="Payment Cycle Name" class="form-control"></div>
                <div class="col-lg-6"><input type="text" name="paydate" placeholder="Payment Cycle Date" class="form-control"></div>
            </div>
              <div class="sep_box">
                                   
                <div class="col-lg-6"><input type="text" name="payname" placeholder="Payment Cycle Name" class="form-control"></div>
                <div class="col-lg-6"><input type="text" name="paydate" placeholder="Payment Cycle Date" class="form-control"></div>
            </div> -->
                 <div class="sep_box">
                <div class="col-lg-2"><input type="submit" name="paysubmit" value="Payment" class="form-control btn-primary"></div>  </div>
            </form>
                                </div></div>

                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>  
</html>