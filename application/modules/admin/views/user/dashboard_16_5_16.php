     <div class="wrapper">
       <?php $this->load->view('helper/nav')?> 

 <div class="col-lg-10 col-lg-push-2">
        <div class="row">

            <div class="page_contant">
                <div class="col-lg-12">
                    <div class="page_name">
                        <h2>Dashboard</h2>
                    </div>
                    <div class="page_box">
                    <div class="sep_box">
                    
                    <div class="col-lg-12">
                       <div class="right_main">
                        <div class="col-lg-3">
                            <div class="dash_box dash_box_2 d_box d_box_2 dash_box_3 dash_box_003">
                                <h2>Total Orders of the Day</h2>
                                <div class="dash_b_t dash_b_t1"><?php echo $result['orderCount']->total; ?></div>
                                <div class="das_box">
                                <a href="<?php echo base_url();?>admin/login/dashboardview/ordercount" class="vd-btn">View Detail</a></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="dash_box dash_box_2 d_box d_box_2 dash_box_3 dash_box_003">
                                 <h2>Total Sales of Day</h2>
                                <div class="dash_b_t dash_b_t1">
                                  <span class="das_i1"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                  <span class="das_i2"><?php echo $result['pricofday']->total; ?></span></div>
                                <div class="das_box">
                                <a href="<?php echo base_url();?>admin/login/dashboardview/pricofday" class="vd-btn">View Detail</a></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="dash_box dash_box_2 d_box d_box_2 dash_box_3 dash_box_003">
                                 <h2>Total Sales Of Month</h2>



                                <div class="dash_b_t dash_b_t1"> <span class="das_i1"><i class="fa fa-inr" aria-hidden="true"></i></span><span class="das_i2"><?php echo $result['totalofmonth']->total; ?></span>
                            </div>
                                <div class="das_box">
                                <a href="<?php echo base_url();?>admin/login/dashboardview/total_ofmonth" class="vd-btn">View Detail</a></div> 
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <div class="dash_box dash_box_2 d_box d_box_2 dash_box_3 dash_box_003">
                                 <h2>Order Of Month</h2>
                                <div class="dash_b_t dash_b_t1"><?php echo $result['orderofmonth']->total; ?></div>
                                <div class="das_box">
                                <a href="<?php echo base_url();?>admin/login/dashboardview/order_ofmonth" class="vd-btn">View Detail</a></div>

                            </div>
                        </div>
                        </div> 
                        </div>
                        
                        
                        <div class="col-lg-12">
                        <div class="left_border">
                        <div class="col-lg-4">
                            <div class="dash_box dash_box_2 dash_box_3 dash_box_04">
                                 <h2>Pending Order</h2>
                                <div class="dash_b_t"><?php echo $result['pendingorder']->total; ?></div>
                                <a href="<?php echo base_url();?>admin/login/dashboardview/pending_order" class="vd-btn">View Detail</a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="dash_box dash_box_2 dash_box_3 dash_box_04">
                                 <h2>Dispatch Order</h2>
                                <div class="dash_b_t"><?php echo $result['dispatchorder']->total; ?></div>
                                <a href="<?php echo base_url();?>admin/login/dashboardview/dispatch_order" class="vd-btn">View Detail</a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="dash_box dash_box_2 dash_box_3 dash_box_04">
                                 <h2>Pending Payment</h2>
                                <div class="dash_b_t"><?php echo $result['pendingpaymentss']->total; ?></div>
                                <a href="<?php echo base_url();?>admin/login/dashboardview/pending_paymentof" class="vd-btn">View Detail</a>
                                

                            </div>
                        </div>
                        </div>
                        </div>
                      
                        
                      
                        <div class="col-lg-12 marg-top">
                        <div class="col-lg-3">
                            <div class="dash_box dash_box_2 dash_box_4 dash_box_5">
                               <h2>Total Manufacturers</h2>
                                <div class="dash_b_t"><?php echo $result['manuCount']->total; ?></div>
                                <a href="<?php echo base_url();?>admin/vendor/viewvendor" class="vd-btn">View Detail</a>
                            </div>
                        </div>
                         <div class="col-lg-3">
                            <div class="dash_box dash_box_1 dash_box_4 dash_box_5">
                               <h2>Total Retailers</h2>
                                <div class="dash_b_t"><?php echo $result['retailCount']->total; ?></div>
                                <a href="<?php echo base_url();?>admin/vendor/viewvendorretail" class="vd-btn">View Detail</a>
                            </div>
                        </div>
                         <div class="col-lg-3">
                            <div class="dash_box dash_box_2 dash_box_4 dash_box_5">
                                 <h2>Total Brands</h2>
                                <div class="dash_b_t"><?php echo $result['brandCount']->total; ?></div>
                                <a href="<?php echo base_url();?>admin/category/viewbrand" class="vd-btn">View Detail</a>
                            </div>
                        </div>

                         <div class="col-lg-3">
                            <div class="dash_box dash_box_2 dash_box_4 dash_box_5">
                                 <h2>Product Live</h2>
                                <div class="dash_b_t"><?php echo $result['productlive']->total; ?></div>
                                <a href="<?php echo base_url();?>admin/product/approveproduct" class="vd-btn">View Detail</a>
                            </div>   
                        </div>
                        <div class="col-lg-3 marg-top">
                            <div class="dash_box dash_box_2 dash_box_5 dash_box_4">
                                 <h2>Brand Live</h2>
                                <div class="dash_b_t"><?php echo $result['brnadlive']->total; ?></div>
                                <a href="<?php echo base_url();?>admin/category/viewbrand/1" class="vd-btn">View Detail</a>
                            </div>
                        </div>
                        </div>
                        
                    
                     
                      

  <!-- ---------------   CHART LIBRARY --------------  -->
 <!--<div class="sep_box">

<div class="col-lg-6">
    <h2>All Registered Members</h2>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data    = google.visualization.arrayToDataTable([
                          ['Bizzgain.com' , 'Registered Members'],
                          ['Manufacturers', <?php echo $result['manuCount']->total; ?>],
                          ['Retailers'    , <?php echo $result['retailCount']->total; ?>],
                          ['Consumers'    , <?php echo $result['consumerCount']->total; ?>]
                       ]);

        var options = { title: 'All Bizzgain Members' };

        var chart   = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

    </script>

    <div id="piechart" style="width: 400px; height: 400px;"></div>

</div>


<div class="col-lg-6">
 <h2>All Orders</h2>
    <script type="text/javascript">
      //google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChartOrders);
      function drawChartOrders() {

        var data2   = google.visualization.arrayToDataTable([
                          ['Bizzgain.com' , 'Orders Status'],
                          ['Online'       , <?php echo $result['orderCountOnline']->total; ?>],
                          ['COD'          , <?php echo $result['orderCountCod']->total; ?>],
                          ['CHEQUE'       , <?php echo $result['orderCountCheque']->total; ?>],
                          ['CREDIT'       , <?php echo $result['orderCountCredit']->total; ?>]
                      ]);

        var options2 = {
                          title : 'All Bizgain Orders'
                       };

        var chart2   = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart2.draw(data2, options2);
      }

    </script>

    <div id="piechart2" style="width: 400px; height: 400px;">asfd</div>

  </div>   

  </div>-->
  <!-- -------------- CHART LIBRARY --------------  -->
                       
                       
                        <div class="col-lg-12">
                        <div class="sep_box">
                            <div class="col-lg-6">
                                <div class="dash_tbl_d">
                                <h2>Recent Order</h2>
                                <table><tr><th>S.No.</th><th>Order ID</th><th>E-mail Address</th><th>Order Total</th></tr>
                                <?php
                                    $i=0;
                                    foreach($result['ordersTotal'] as $k=>$v){
                                    $i++;
                                ?>   
                                    <tr><td><?=$i?></td><td><a href="<?php echo base_url();?>admin/order/allorderdetail/<?=$v->OrderId?>/<?=$v->OrderNumber?>"><?=$v->OrderNumber?></a></td><td><?=$v->Email?></td><td><?=$v->TotalAmt?></td></tr>
                                <?php
                                    }
                                    $i=0;
                                ?>   
                                </table>
                                    <div class="v_all"><a href="<?php echo base_url();?>admin/order/allorder">View All</a></div>
                                </div>
                            </div>
                                <div class="col-lg-6">
                                <div class="dash_tbl_d">
                                    <h2>Recent Manufacturers</h2>
                                    <table>
                                    <tr><th>S.No.</th><th>Order ID</th><th>E-mail Address</th><th>Status</th></tr>
                                    <?php
                                        $i=0;
                                        foreach($result['manuTotal'] as $k=>$v){
                                        $i++;
                                    ?>
                                        <tr><td><?=$i?></td>
                                        <td><a href="<?php echo base_url();?>admin/vendor/vendorupdate/<?=$v->id?>/<?=$v->OrderNumber?>"><?=$v->vendorcode?></a></td>
                                        <td><?=$v->compemailid?></td><td><?=$v->contactnumber?></td></tr>
                                    <?php
                                        }
                                        $i=0;
                                    ?>
                                    </table>
                                    <div class="v_all"><a href="<?php echo base_url();?>admin/vendor/viewvendor">View All</a></div>
                                </div>
                            </div>
                          </div>
                        </div>
                         
                         <div class="col-lg-12">
                         <div class="sep_box">
                        <div class="col-lg-3">
                            <div class="dash_box dash_box_1 dash_box_2 dash_box_3">
                                <h2>Order - COD</h2>
                                 <div class="dash_b_t"><?php echo $result['orderCountCod']->total; ?></div>
                                <a href="<?php echo base_url();?>admin/order/codorder" class="vd-btn">View Detail</a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="dash_box dash_box_2 dash_box_3">
                                <h2>Order - CHEQUE</h2>
                                 <div class="dash_b_t"><?php echo $result['orderCountCheque']->total; ?></div>
                                <a href="<?php echo base_url();?>admin/order/chequeorder" class="vd-btn">View Detail</a>
                            </div>
                        </div>
                         <div class="col-lg-3">
                            <div class="dash_box dash_box_1 dash_box_2 dash_box_3">
                                <h2>Order - ONLINE</h2>
                                 <div class="dash_b_t"><?php echo $result['orderCountOnline']->total; ?></div>
                                <a href="<?php echo base_url();?>admin/order/onlineorder" class="vd-btn">View Detail</a>
                            </div>
                        </div>
                         <div class="col-lg-3">
                            <div class="dash_box dash_box_2 dash_box_3">
                                <h2>Order - CREDIT</h2>
                                 <div class="dash_b_t"><?php echo $result['orderCountCredit']->total; ?></div>
                                <a href="<?php echo base_url();?>admin/order/creditorder" class="vd-btn">View Detail</a>
                            </div>
                        </div>
                    </div>
                    </div>
                  </div>
                   
                </div>
            </div>
        </div>
    </div>
    </div>