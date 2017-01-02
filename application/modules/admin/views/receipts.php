<!DOCTYPE html>
<html>
<body>
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>


   <script type="text/javascript">
                                    $(document).ready(function() {
                                    $('#example').DataTable();
                                    } );
                                </script>    



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
                                                <th bgcolor='red'>Bill UID</th>
                                                <th bgcolor='red'>Bill Image</th>
                                                <th bgcolor='red'>Store ID</th>
                                                <th bgcolor='red'>Store Name</th>
                                                <th bgcolor='red'>Location</th>
                                                <th bgcolor='red'>User ID</th>
                                                <th bgcolor='red'>Date & Time of Upload</th>
                                                <th bgcolor='red'>Date of Purchase</th>
                                               <!--  <th bgcolor='red'>Bill No.</th> -->
                                                <th bgcolor='red'>Bill Amt.</th>
                                               <!--  <th bgcolor='red'>Paid By Cash/Card</th> -->
                                                <th bgcolor='red'>Cashback (%)</th>
                                                <th bgcolor='red'>Cashback Amt.</th>
                                               <!--  <th bgcolor='red'>Approved By</th> -->
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
                                            <td><?php echo $value->bill_uid; ?></td>
                                            <td onclick="showdealdetailstr('<?php echo $i; ?>')">
                                                <img width="50px;" height="50px;" src="<?php echo base_url().'public/'.$value->bill_img; ?>">
                                                <?php //echo $value->bill_img; ?>
                                            </td>
                                            <td><?php echo $value->s_storeunid; ?></td> 
                                            <td><?php echo $value->s_name; ?></td>
                                            <td><?php echo $value->location; ?></td>
                                            <td><?php echo $value->t_FName;//$value->user_uid; ?></td> 
                                            <td><?php echo $value->re_createdon; ?></td>
                                            <td><?php echo $value->date_of_purchase; ?></td>
                                           <!--  <td><?php echo $value->bill_no; ?></td>  -->
                                            <td><?php echo $value->bill_amt; ?></td>
                                           <!--  <td><?php if($value->paid_by==1){ echo 'Cash/Card'; }else{
                                              echo 'Mypopcoins';
                                            } ?></td> -->
                                            <td><?php echo $value->cashback_per; ?></td> 
                                            <td><?php echo $value->cashback_amt; ?></td>
                                            <td>
                                            <?php if($value->re_status=='Approved by MPC' || $value->re_status=='Approved by Retailer'){ echo '<span style="color:green">'.$value->re_status.'</span>'; }else{ echo '<span style="color:red">'.$value->re_status.'</span>';}  ?></td>
                                    <!--         <td><?php if($value->re_status!=1){ ?>
                                              <select onchange="schange('<?php echo $value->re_id; ?>')" id="status<?php echo $value->re_id; ?>">
                                    <option <?php if($value->re_status==0){ echo 'selected';}?> value="0">Pending</option>
                                    <option <?php if($value->re_status==1){ echo 'selected';}?> value="1">Approved</option>
                                    <option <?php if($value->re_status==2){ echo 'selected';}?> value="2">Rejected</option>
                                  </select>
                                              <?php }else{ echo '<span style="color:green">Approved</span>';} ?>

                                            <p id="msg<?php echo $value->re_id; ?>"></p></td>  -->
                                  
                                        

                                       <!--  <style>.str{display:none;}</style>
                                        <tr class="dealdetailstr str"  id="sho_<?php //echo $i; ?>">
                                           <!--  <td colspan="15"> 
                                                <div class="deal_detail"> 
                                                    <div class="deal_left"><div class="d_image"><img width="50px;" height="50px;" src="<?php //echo base_url().'public/'.$value->bill_img; ?> <!-- "></div></div>
                                                   
                                                </div>
                                            </td>
                                            
                                        </tr> -->
                                    
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