<?php //p($newsview);exit;?>
<div class="wrapper">
<?php  $this->load->view('helper/nav')?> 
<div class="col-lg-10 col-lg-push-2">
        <div class="row">

            <div class="page_contant">
                <div class="col-lg-12">
                    <div class="page_name">
                             
                        <h2>Newsletter Subscribers Listing</h2>
    
                    </div>
                      <div class="page_box">
                        <div class="col-lg-12">
                            <p>  In this Section Admin can view the Newsletter Subscribers Listing.</p>
                        </div>
                    </div>
                    
                    <div class="page_box">
                        <div class="sep_box">
                            <div class="col-lg-12">

                                <div style="text-align:right;">
                                <form method="post" action="">
                                  <input style="background: #1870BB;border: none;color: #fff;padding: 5px 10px;font-size: 13px;" type="submit" value="Download Excel" name="newsexcel">
                                </form>  
                                   <!--  <a href="<?php echo base_url();?>admin/user/add_country"><button>Download Excel</button></a> -->
                                </div>
                                <!--  session flash message  -->
                                <div class='flashmsg'>
                                    <?php echo validation_errors(); ?> 
                                    <?php echo $this->session->flashdata('message'); ?>
                                </div>
                                <table class="grid_tbl">
                                    <thead>
                                        <tr>
                                            <th>S:NO</th>
                                            <th>Email</th>
                                            <th>Date and Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0; foreach ($newsview as $key => $value) { $i++;?>
                                       
                                        <tr>
                                            <td><?php echo $i ;?></td>
                                            <td><?php echo $value->email;?></td>
                                            <td><?php echo $value->createdon; ?></td>
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