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
                            <h2>Manage Order Details</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p>Order Number : <?php echo $order->order_number; ?></p>
                                <p>Customer Name : <?php echo $order->t_FName.' '.$order->t_LName; ?></p>
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
                                                <th bgcolor='red'>Offer Title</th>
                                                <th bgcolor='red'>Quantity</th>
                                                <th bgcolor='red'>Price</th>                                             
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=0;
                                            foreach ($vieww as $value) {
                                            $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value->o_name; ?></td>
                                            <td><?php echo $value->offer_qty; ?></td>
                                            <td><?php echo $value->offer_price; ?></td>
                                            
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