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
                            <h2>All Transactions</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can see the list of transactions!</p>
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
                        <form action="" method="get" id="filterForm">
                        <div class="page_box">
                            <div class="sep_box">
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-lg-3">
                                                <select name="store_id" class="form-control">
                                                    <option value="">-- Select Store --</option>
                                                    <?php foreach($stores as $val) {?>
                                                    <option value="<?php echo $val->store_id;?>" <?php if($this->input->get('store_id')==$val->store_id) echo "selected";?>><?php echo $val->s_name;?></option>
                                                    <?php } ?>
                                                </select>
                                        </div>
                                        <div class="col-lg-2">
                                               <input type="text" id="month" name="month" class="monthPicker form-control" value="<?php if($this->input->get('month')!="") echo $this->input->get('month'); else echo date("m-Y");?>" readonly/>
                                        </div>                                        
                                        <div class="col-lg-2">
                                            <div class="submit_tbl">
                                                <input type="submit" value="Search" name="filter" class="btn_button sub_btn" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                       <!--  <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl" id="example">
                                        <thead>
                                            <tr>
                                                <th bgcolor='red'>S.No.</th>
                                                <th bgcolor='red'>TXN ID</th>
                                                <th bgcolor='red'>Receipts</th>
                                                <th bgcolor='red'>Order No</th>
                                                <th bgcolor='red'>Deal Coupan</th>
                                                <th bgcolor='red'>Store Coupan</th>
                                                <th bgcolor='red'>Store Name</th>                                               
                                                <th bgcolor='red'>User Name</th>
                                                <th bgcolor='red'>User Type</th>
                                                <th bgcolor='red'>Pay Type</th>
                                                <th bgcolor='red'>Pay Amt</th>
                                                <th bgcolor='red'>Process Amt</th>                                              
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
                                            <td><?php echo $value->txn_id; ?></td>
                                            <td><?php if($value->receipts_id!=0){ echo 'Receipts'; }//echo $value->receipts_id; ?></td>                                           
                                            <td><?php echo $value->order_number; ?></td> 
                                            <td><?php echo $value->dealcoupan_code; ?></td>
                                            <td><?php echo $value->storecoupan_code; ?></td>
                                            <td><?php echo $value->s_name; ?></td>
                                            <td><?php echo /*$value->user_id.*/$value->name; ?></td> 
                                            <td><?php echo $value->user_type; ?></td>
                                            <td><?php echo $value->pay_type; ?></td>
                                            <td><?php echo $value->pay_amt; ?></td>
                                           <td><?php echo $value->process_amt; ?></td>
                                            <td><?php echo $value->tr_status; ?></td>
                                        </tr>
                                    <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> -->

                        
                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl">
                                        <thead>
                                            <tr>
                                                <th bgcolor='red'>TXN ID</th>
                                                <th bgcolor='red'>Store Name</th>
                                                <th bgcolor='red'>Pay Amt Date</th>
                                                <th bgcolor='red'>From Date</th>
                                                <th bgcolor='red'>To Date</th>
                                                <th bgcolor='red'>Payment Date</th>
                                                <th bgcolor='red'>Pay Type</th>
                                                <th bgcolor='red'>Pay Amount</th> 
                                                <th bgcolor='red'>Due Amount</th>  
                                                <th bgcolor='red'>Action</th>                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  foreach ($amountdetails as $amount) { if($amount->curr_status==1){ ?>
                                        <tr>
                                            <td><a href="<?php echo base_url();?>admin/tax/viewpaymentdetails/<?php echo $amount->txn_id; ?>"><?php echo $amount->txn_id; ?></a></td>
                                            <td><?php echo $amount->t_createdon; ?></td>
                                            <td><?php echo $amount->s_name; ?></td>
                                            <td><?php echo $amount->from_date; ?></td>
                                            <td><?php echo $amount->to_date; ?></td>
                                            <td><?php echo $amount->pay_date; ?></td>
                                            <td><?php echo $amount->pay_type; ?></td>
                                            <td><?php echo $amount->pay_amt; ?></td>
                                            <td><?php if($amount->remaining_amt=='0') {  echo ' Success</td><td>'; }
                                                else { 
                                             if($amount->pay_amt>=0){ if($this->session->userdata('popcoin_login')->s_admin_id!=1){ ?>
                                                <form action="" method="post">
                                                <input type="text" class="form-control" name="payment" id="payment_<?php echo $amount->t_id; ?>" value="<?php if($amount->remaining_amt=="") echo $amount->pay_amt; else echo $amount->remaining_amt; ?>" size="10">
                                                <input type="hidden" name="t_id" value="<?php echo $amount->t_id; ?>">
                                                <input type="hidden" name="pay_amt" value="<?php echo $amount->pay_amt; ?>">
                                                <input type="hidden" name="txn_id" value="<?php echo $amount->txn_id; ?>">
                                            </td>
                                            <td>
                                                <input type="submit" name="save_data" value="Pay" class="form-control" onclick="return fieldValidate('<?php echo $amount->t_id; ?>');" />
                                                </form>
                                                <?php  } else { echo '</td><td>'; } } else{ if($this->session->userdata('popcoin_login')->s_admin_id==1) { ?> 
                                                <form action="" method="post">
                                                <input type="text" class="form-control" name="payment" id="payment_<?php echo $amount->t_id; ?>" value="<?php if($amount->remaining_amt=="") echo $amount->pay_amt; else echo $amount->remaining_amt; ?>" size="10">
                                                <input type="hidden" name="t_id" value="<?php echo $amount->t_id; ?>">
                                                <input type="hidden" name="pay_amt" value="<?php echo $amount->pay_amt; ?>">
                                                <input type="hidden" name="txn_id" value="<?php echo $amount->txn_id; ?>">
                                            </td>
                                            <td>
                                                <input type="submit" name="save_data" value="Pay" class="form-control" onclick="return fieldValidate('<?php echo $amount->t_id; ?>');" />
                                                </form>
                                                <?php } else { echo '</td><td>'; }} }  ?>
                                                <a href="<?php echo base_url()?>admin/tax/paymentprocessallview/<?php echo $amount->txn_id; ?>"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <?php } } ?>
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

<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#filterForm").validate({
          rules: {            
              month : "required",
              store_id : "required"          
          },
          messages: {
              month : "This field is required!",
              store_id : "This field is required!"           
          },
          submitHandler: function(form) {
            form.submit();
          }
      });
   });
</script>
<script type="text/javascript">
function fieldValidate(value) {
    if(value=="") {
        alert("Please input an amount!"); return false;
    } else {
        return true;
    }
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

  <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>-->
    <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css">
<script type="text/javascript">
$(document).ready(function()
{   
    $(".monthPicker").datepicker({
        dateFormat: 'm-yy',
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,

        onClose: function(dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).val($.datepicker.formatDate('m-yy', new Date(year, month, 1)));
        }
    });

    $(".monthPicker").focus(function () {
        $(".ui-datepicker-calendar").hide();
        $("#ui-datepicker-div").position({
            my: "center top",
            at: "center bottom",
            of: $(this)
        });
    });
});
</script>
<!-- 
<label for="month">Month: </label>
<input type="text" id="month" name="month" class="monthPicker" /> -->