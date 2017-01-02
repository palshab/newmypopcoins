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
                            <h2>Manage Product</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can view list of products!</p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                    <div style="text-align:right;">
                                        <a href="<?php echo base_url();?>admin/product/uploadproducts/<?php echo $this->uri->segment(4);?>"><button>ADD PRODUCTS (CSV)</button></a>&nbsp;&nbsp;<a href="<?php echo base_url();?>admin/product/addproduct/<?php echo $this->uri->segment(4);?>"><button>ADD PRODUCT</button></a>&nbsp;&nbsp;
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
                                                <th bgcolor='red'>Outlet</th>
                                                <th bgcolor='red'>Category</th>
                                                <th bgcolor='red'>Product Name</th>
                                                <th bgcolor='red'>Price</th>
                                                <th bgcolor='red'>Type</th>
                                                <th bgcolor='red'>Image</th>
                                                <th bgcolor='red'>Map Attributes</th>
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
                                            <td><?php echo $value->cat_name; ?></td>
                                            <td><?php echo $value->pro_name; ?></td>
                                            <td><?php echo $value->pro_price; ?></td>
                                            <td><?php if($value->pro_type==1) echo "<div style='width: 30px;background-color: green;height: 20px;'></div>"; else echo "<div style='width: 30px;background-color: red;height: 20px;'></div>"; ?></td>                                            
                                            <td><?php if($value->pro_image!="") echo '<img src="'.base_url().'public/pro-images/'.$value->pro_image.'" width="50px"/>'; ?></td>
                                            <td><a href="<?php echo base_url()?>admin/product/viewattributes/<?php echo $value->pro_id;?>" ><button type="button"><i class="fa fa-eye"></i> View</button></a></td>
                                            <td><a href="<?php echo base_url()?>admin/product/updateproduct/<?php echo $value->pro_id?>/<?php echo $this->uri->segment(4);?>" ><i class="fa fa-pencil"></a></i>
                                            <a href="<?php echo base_url()?>admin/product/deleteproduct/<?php echo $value->pro_id;?>/<?php echo $this->uri->segment(4);?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/product/statusproduct/<?php echo $value->pro_id.'/'.$value->pro_status; ?>/<?php echo $this->uri->segment(4);?>"><?php if($value->pro_status=='1') echo 'Active'; else echo 'Inactive'; ?></a>

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