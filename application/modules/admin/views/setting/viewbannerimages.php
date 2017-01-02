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
                            <h2>Manage Images</h2>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                    <div style="text-align:right;">
                                        <!-- <a href="<?php echo base_url();?>admin/restaurant/addimage/<?php echo $this->uri->segment(4); ?>"><button>ADD IMAGE</button></a>&nbsp;&nbsp;
                                         --><button onclick="goBack()" style="float:right;">BACK</button>
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
                            <form action="<?php echo base_url() ?>admin/setting/addbannerimages/<?php echo $this->uri->segment(4); ?>" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Add Image <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                              <input  type="file" name="r_img_name"   />
                                                        </div>

                                                         <input id="submitBtn" type="submit" name="submit" value="Submit" class="btn_button sub_btn" />
                                                    </div>
                                                </div>
                                            </div>
                                            
                                          
                                        </div>
                                        
                                     
                                    </div>

                                </div>
                                </form>

                            </div>
                        </div>

                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl" id="example">
                                        <thead>
                                            <tr>
                                                <th bgcolor='red'>S.No.</th>
                                                
                                                
                                                <th bgcolor='red'>Image</th>
                                                <th bgcolor='red'>Action</th>                                             
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=0;
                                            foreach ($data as $value) {
                                            $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            
                                            <td><?php if($value->r_img_name!="") { echo '<img src="'.base_url().'public/listingbanner/'.$value->r_img_name.'" width="50px" />'; } ?></td>
                                            <td>
                                            <a href="<?php echo base_url()?>admin/setting/deletebannerimage/<?php echo $value->r_img_id?>/<?php echo $value->r_img_name?>/<?php echo $this->uri->segment(4); ?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a>
                                            
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