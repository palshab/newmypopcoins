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
                            <h2>Manage Receipts</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can see the list of Pending Receipts!</p>
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
                                                <th bgcolor='red'>Bill No.</th>
                                                <th bgcolor='red'>Bill Amt.</th>
                                                <th bgcolor='red'>Paid By Cash/Card</th>
                                                <th bgcolor='red'>Cashback (%)</th>
                                                <th bgcolor='red'>Cashback Amt.</th>
                                               <!--  <th bgcolor='red'>Approved By</th> -->
                                                <th bgcolor='red'>Status</th>                                          
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=0;
                                            foreach ($view as $value) {
                                        if($this->session->userdata('popcoin_login')->s_admin_id==$value->s_managerid)
                                        {
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
                                            <td><?php echo $value->bill_no; ?></td> 
                                            <td><?php echo $value->bill_amt; ?></td>
                                            <td><?php if($value->paid_by==1){ echo 'Cash/Card'; }else{
                                              echo 'Mypopcoins';
                                            } ?></td>
                                            <td><?php echo $value->cashback_per; ?></td> 
                                            <td><?php echo $value->cashback_amt; ?></td>
                                            <td>
                                            <?php if($value->re_status=='Approved by MPC' || $value->re_status=='Approved by Retailer'){ echo '<span style="color:green">'.$value->re_status.'</span>'; }else{ echo '<span style="color:red">'.$value->re_status.'</span>';}  ?></td>
                                        
                                            
                                  
                                        </tr>

                                         <style>.str{display:none;}</style>
                                        <tr class="dealdetailstr str"  id="sho_<?php echo $i; ?>">
                                            <td colspan="15">
                                                <div class="deal_detail">
                                                    <div class="deal_left"><div class="d_image"><img width="50px;" height="50px;" src="<?php echo base_url().'public/'.$value->bill_img; ?>"></div></div>
                                                    <div class="deal_right">
                                                        <div class="deal_row">
                                                            <div class="deal_d2"><div class="deal_text">Store Name : <span><?php echo $value->s_name; ?></span></div></div>
                                                            
                                                        </div>
                                                

                                                    </div>
                                                    <div class="deal_right">
                                                        <div class="deal_row">
                                                            <div class="deal_d2"><div class="deal_text">Location : <span><?php echo $value->location; ?></span></div></div>
                                                            
                                                        </div>
                                                

                                                    </div>
                                                    <div class="deal_right">
                                                        <div class="deal_row">
                                                            <div class="deal_d2"><div class="deal_text">Date of Purchase : <span><?php echo $value->date_of_purchase; ?></span></div></div>
                                                           
                                                        </div>
                                                

                                                    </div>
                                                     <div class="deal_right">
                                                        <div class="deal_row">
                                                            <div class="deal_d2"><div class="deal_text">Bill No. : <span><?php echo $value->bill_no; ?></span></div></div>
                                                            
                                                        </div>
                                                

                                                    </div>
                                                    <div class="deal_right">
                                                        <div class="deal_row">
                                                            <div class="deal_d2"><div class="deal_text">Bill Amt. : <span><?php echo $value->bill_amt; ?></span></div></div>
                                                           
                                                        </div>
                                                

                                                    </div>

                                                    <div class="deal_right">
                                                        <div class="deal_row">
                                                            <div class="deal_d2"><div class="deal_text">Paid By : <span>

                                                                <?php if($value->paid_by==1){ echo 'Cash/Card'; }else{
                                              echo 'Mypopcoins';
                                            } ?></span></div></div>
                                                           
                                                        </div>
                                                

                                                    </div>

                                                     <div class="deal_right">
                                                        <div class="deal_row">
                                                            <div class="deal_d2"><div class="deal_text">Status : <span>
                    <?php if($value->re_status=='Approved by MPC')
                    { echo ' <span id="sre1'.$value->re_id.'"><button onclick="schange1('.$value->re_id.')">Approved</button></span>'; }
                   else if($value->re_status=='Approved by Retailer')
                    { echo '<span style="color:green">Approved by Retailer</span>'; }
                    else if($value->re_status=='Rejected'){ echo '<span style="color:red">Reason for Rejected</span> : '.$value->status_reason; }

                    else{  

                    ?>
                                                <span id="sre<?php echo $value->re_id; ?>"><select onchange="schange('<?php echo $value->re_id; ?>')" id="status<?php echo $value->re_id; ?>">
                                    <option value="Pending">Pending</option>
                                    <option value="Approved by Retailer">Approved</option>
                                    <option value="Rejected">Rejected</option>
                                  </select></span>

                                  <?php } ?>
                                  <p id="msg1<?php echo $value->re_id; ?>"></p>
                              </span></div></div>

                              <div class="deal_d2" style="display:none;" id="reosanac<?php echo $value->re_id; ?>"><div class="deal_text">Reason for Rejected : <span>
                                <textarea style="margin: 0px; width: 355px; height: 95px;" id="reosan<?php echo $value->re_id; ?>"></textarea>
                                <button onclick="schange('<?php echo $value->re_id; ?>')">Submit</button>
                               

</span></div></div> <p id="msg<?php echo $value->re_id; ?>"></p>
                                                           
                                                        </div>
                                                

                                                    </div>


                                                </div>
                                            </td>
                                            
                                        </tr>

                                    <?php } //else{ echo "Not found record!";}
                                     }?>

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
  if(st=='Rejected')
  {
        $('#reosanac'+ids).css('display','block');
        var sta=$('#reosan'+ids).val();
        if(sta=='')
        {
            $('#reosan'+ids).css('border-color','red');
            return false;
        }
        else
        {
             $.ajax({
                url:'<?php echo base_url()?>admin/receipts/updatereceipts',
                type:'post',
                data:{'uid':ids,'ust':st,'ust1':sta},
                success: function(data){
                  $('#msg'+ids).html(sta+' Successfully Updated!').css('color','green');
                  $('#reosanac'+ids).css('display','none');
                  $('#sre'+ids).css('display','none');
                  $('#reosan'+ids).text(' ');
                }

              });
        }
  }
  else if(st=='Pending')
  {
        $('#msg1'+ids).html('Allready select this pending!').css('color','red');
        $('#reosanac'+ids).css('display','none');
        $('#reosan'+ids).val(' ');
  }
  else
  {
    $('#reosanac'+ids).css('display','none');
    $('#reosan'+ids).val(' ');
    $.ajax({
    url:'<?php echo base_url()?>admin/receipts/updatereceipts',
    type:'post',
    data:{'uid':ids,'ust':st,'ust1':sta},
    success: function(data){
      $('#msg1'+ids).html('Successfully Updated!').css('color','green');
       $('#sre'+ids).css('display','none');
    }

    });
}
}


function schange1(ids) {
  
             $.ajax({
                url:'<?php echo base_url()?>admin/receipts/updatereceipts1',
                type:'post',
                data:{'uid':ids},
                success: function(data){
                   // alert(data);
                  $('#msg'+ids).html(' Successfully Updated!').css('color','green');
                  
                    $('#sre1'+ids).css('display','none');
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