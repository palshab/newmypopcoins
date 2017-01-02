<?php //pend($amountdetails);?><!DOCTYPE html>
<html>
<body>
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#example').DataTable();
        });
    </script>   
    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>View Payment Details</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can see the detail of payments!
                                    
                                 <button type="button" style="float:right;" onclick="goBack()">BACK</button>
                                <script>
                                function goBack() {
                                    window.history.back();
                                }
                                </script></p>
                                <p style="color:green;text-align:center;">
                                    <?php echo validation_errors(); ?> 
                                    <?php
                                      if($this->session->flashdata('message')){
                                        echo $this->session->flashdata('message'); 
                                      }
                                    ?>
                                </p>
                            </div>
                        </div>
                        
                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl" id="example">
                                        <thead>
                                            <tr>
                                                <th bgcolor='red'>TXN ID</th>
                                                <th bgcolor='red'>Store Name</th>
                                                <th bgcolor='red'>Payment Date</th>
                                                <th bgcolor='red'>Total Amount</th>
                                                <th bgcolor='red'>Paid Amount</th>                                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php for($i=0; $i<count($details); $i++) { ?>
                                        <tr>
                                            <td><?php echo $details[$i]->txn_id; ?></td>
                                            <td><?php echo $details[$i]->s_name; ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($details[$i]->t_createdon)); ?></td>
                                            <td><?php echo $details[$i]->pay_amt; ?></td>
                                            <td><?php if($details[$i]->remaining_amt=="") { if(@$details[$i+1]->remaining_amt=="") echo "<span style='color:red;'>Nothing paid</span>"; else echo $details[$i]->pay_amt-$details[$i+1]->remaining_amt; } else if($details[$i]->remaining_amt==0) { echo "<span style='color:green;'>Completed</span>"; } else { echo $details[$i]->remaining_amt-$details[$i+1]->remaining_amt; } ?></td>                                         
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
        </div>
</body>  
</html>
<style type="text/css">
.deal_detail{
    float:left;
    width:100%;
    height:auto;
    background:#f1f1f1;
    padding:10px 10px;
}
.deal_left{
    float:left;
    width:25%;
}
.d_image{
    float:left;
    width:100%;
    background: #fff;
    padding:6px 6px;
}
.d_image img{
    width:100%;
}
.deal_right{
    float:left;
    width: 75%;
    padding: 0px 20px;
}
.deal_row{
    float:left;
    width:100%;
    padding:7px 0px;
}
.deal_d2
{
    float:left;
    width:50%;
    padding:0px 10px;
}
.deal_d1
{
    float:left;
    width:100%;
    padding:0px 10px;
}
.deal_text
{
    float:left;
    width:100%;
    font-weight:600;
}
.deal_text_b
{
    float:left;
    width:100%;
    font-weight:400;
    padding:8px 0;
}
.deal_text span{
    font-weight:400!important;
    margin-left:15px;
}
.approve_btn
{
    float:right;
    padding:8px 12px;
    background: green;
    color:#fff!important;
}
.issue_btn
{
    float:right;
    padding:8px 12px;
    background: red;
    color:#fff!important;
    margin-left:8px;
}
.t_area{
    float:left;
    width:60%;
}
.sbt_btn{
    float:left;
    padding:12px 15px;
    background: red;
    color:#fff!important;
    margin-left:8px;
}
.issuediv{
    display:none;
}

.d_image img {
    width: 200px;
    height: 252px;
    text-align: center;
}

 </style>