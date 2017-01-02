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
                            <h2>Manage Company Ads</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can view list of compny ads!</p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                    <div style="text-align:right;">
                                        <a href="<?php echo base_url();?>admin/offer/addcompanyad"><button>ADD COMPANY</button></a>&nbsp;&nbsp;
                                        <button onclick="goBack()" style="float:right;">BACK</button>
                                        <script>
                                        function goBack() {
                                            window.history.back();
                                        }
                                        </script>
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
                                                <th bgcolor='red'>Company Title</th>
                                                <th bgcolor='red'>Description</th>
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
                                            <td><?php echo $value->comp_title; ?></td>
                                            <td><?php echo $value->comp_desc; ?></td>                                          
                                            <td><a href="<?php echo base_url()?>admin/offer/updatecompanyad/<?php echo $value->comp_ad_id; ?>" ><i class="fa fa-pencil"></a></i>
                                            <a href="<?php echo base_url()?>admin/offer/deletecompanyad/<?php echo $value->comp_ad_id;?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/offer/statuscompanyad/<?php echo $value->comp_ad_id.'/'.$value->comp_status; ?>"><?php if($value->comp_status=='1') echo 'Active'; else echo 'Inactive'; ?></a>
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