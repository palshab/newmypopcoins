<!DOCTYPE html>
<html>

<body>
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar');?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Manage Locations</h2>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                    <div style="text-align:right;">
                                        <a href="<?php echo base_url();?>admin/restaurant/addlocation/<?php echo $this->uri->segment(4); ?>"><button>ADD LOCATION</button></a>&nbsp;&nbsp;
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
                                                <th bgcolor='red'>Outlet Name</th>
                                                <th bgcolor='red'>Country</th>
                                                <th bgcolor='red'>State</th>
                                                <th bgcolor='red'>City</th>
                                                <th bgcolor='red'>Address</th>
                                                <th bgcolor='red'>Latitude</th>
                                                <th bgcolor='red'>Longitude</th>
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
                                            <td><?php echo $value->r_res_name; ?></td>
                                            <td><?php echo $value->name; ?></td>
                                            <td><?php echo $value->statename; ?></td>
                                            <td><?php echo $value->cityname; ?></td>
                                            <td><?php echo $value->res_address; ?></td>
                                            <td><?php echo $value->res_latitude; ?></td>
                                            <td><?php echo $value->res_longitude; ?></td>
                                            <td><a href="<?php echo base_url()?>admin/restaurant/updatelocation/<?php echo $value->loc_id?>/<?php echo $this->uri->segment(4); ?>" ><i class="fa fa-pencil"></a></i>
                                            <a href="<?php echo base_url()?>admin/restaurant/deletelocation/<?php echo $value->loc_id?>/<?php echo $this->uri->segment(4); ?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/restaurant/statuslocation/<?php echo $value->loc_id.'/'.$value->loc_status.'/'.$this->uri->segment(4); ?>"><?php if($value->loc_status==1) echo 'Active'; else echo 'Inactve'; ?></a>

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