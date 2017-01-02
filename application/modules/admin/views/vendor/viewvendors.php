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
                            <h2>View Vendor</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can view list of vendors!</p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                    <div style="text-align:right;">
                                        <a href="<?php echo base_url();?>admin/adminvender/addvendor"><button>ADD VENDOR</button></a>
                                    </div>
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
                                </div>

                            </div>
                        </div>
                        
                        <div class="page_box1">
                        <div class="col-md-12">
                         <div class="row">
                          <div class="retailersmain">
                           <h4>Retailers</h4>
                          </div>
                         </div>
                        </div>
                        <div class="col-md-12">
                           <div class="retailerid">
                           <?php
                           foreach ($vieww as $key => $value) {
                               # code...
                         
                           ?>


                          <div class="col-md-3">
                          <div class="retaileroptic">
                          <?php 
                            if($value->profile_pic!='')
                            {
                          ?>
                          <a href="<?php echo base_url()?>admin/adminvender/updatevendor/<?php echo $value->s_admin_id?>" >
                              
                            <img src="<?php echo base_url(); ?>assets/images/<?php  echo $value->profile_pic; ?>">
                              
                          </a>
                          
                          <?php }else{ ?>
                            <img src="http://192.168.1.30/mypopcoins/assets/images/retailer.jpg">
                            <?php } ?>
                          </div>
                          <div class="retailertext">
                           <div class="r-main">
                           <span class="r-id">Retailer Id :<?php echo $value->retailer_uniqueid; ?></span>
                           
                           </div>
                           <div class="r-main-n">
                           <span class="r-name">Retailer Name :<?php echo $value->s_username; ?></span>
                          
                           </div>
                          </div>
                          </div>
                              <?php } ?>
                          
                          
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