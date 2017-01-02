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
                            <h2>Manage Type of Deals </h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can view list of vender Type of Deals </p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                    <div style="text-align:right;">
                                        <a href="<?php echo base_url();?>admin/offer/add_commision"><button>ADD Commission</button></a>
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

                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl" id="example">
                                        <thead>
                                            <tr>
                                                <th bgcolor='red'>S.No.</th>
                                                <th bgcolor='red'>Commission%</th>
                                               
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
                                            <td><?php echo $value->commission_per; ?></td>
                                            
                                            <td><a href="<?php echo base_url()?>admin/offer/deletecommission/<?php echo $value->commission_id?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a><a href="<?php echo base_url()?>admin/offer/updatecommission/<?php echo $value->commission_id?>" ><i class="fa fa-pencil"></a></i>
                                           <!-- <a href="<?php //echo base_url()?>admin/vendor/updatecommission/<?php //echo $value->s_admin_id?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a>
                                            <a href="<?php //echo base_url(); ?>admin/vendor/statusvendor/<?php //echo $value->s_admin_id.'/'.$value->status; ?>"><?php //echo $value->status; ?></a> -->

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