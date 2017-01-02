



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
                            <h2>All Receipts</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can see the list of Receipts!</p>
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
                                                <th bgcolor='red'>S.No.</th>
                                                <th bgcolor='red'>Receipt ID</th>
                                                <th bgcolor='red'>Store ID</th>
                                                <th bgcolor='red'>Deal ID</th>
                                                <th bgcolor='red'>User ID</th>
                                                <th bgcolor='red'>User Type</th>
                                                <th bgcolor='red'>Pay Type</th>
                                                <th bgcolor='red'>Tax Type</th>
                                                <th bgcolor='red'>Total Amt</th>
                                                <th bgcolor='red'>Pay Amt</th>
                                                <th bgcolor='red'>Process Amt.</th>
                                                <th bgcolor='red'>Status</th>
                                                                                     
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=0;
                                            foreach ($view as $value) {
                                            $i++;
                                           
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value->receipts_id; ?></td>
                                           
                                            <td><?php echo $value->store_id; ?></td> 
                                            <td><?php echo $value->deal_id; ?></td>
                                            <td><?php echo $value->user_id; ?></td>
                                            <td><?php echo $value->user_type;//$value->user_uid; ?></td> 
                                            <td><?php echo $value->pay_type; ?></td>
                                            <td><?php echo $value->tax_type; ?></td>
                                            <td><?php echo $value->tax_amt; ?></td> 
                                            <td><?php echo $value->total_amt; ?></td>
                                           
                                            <td><?php echo $value->pay_amt; ?></td> 
                                            <td><?php echo $value->process_amt; ?></td>
                                            <td><?php echo $value->tr_status; ?></td>
                                            
                                  
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

<script type="text/javascript">
function schange(ids) {
  var st=$('#status'+ids).val();
  //alert(st);
  $.ajax({
    url:'<?php echo base_url()?>admin/receipts/updatereceipts',
    type:'post',
    data:{'uid':ids,'ust':st},
    success: function(data){
      $('#msg'+ids).html('Successfully Updated!').css('color','green');
    }

  });
}

function showdealdetailstr(id)
{
  
  $('.dealdetailstr').closest('tr').addClass('str');
  $('#sho_'+id).closest('tr').removeClass('str');

}
</script>

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