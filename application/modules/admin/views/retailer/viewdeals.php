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
                            <h2>List of Deals</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can view list of Deals!</p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                <div>
                                <form action="" method="post">
                                    <select name="dealcategory">
                                        <?php
                                            foreach ($category as $key => $value) {
                                             
                                          

                                        ?>
                                            <option value="<?php echo $value->categorydeal_id ?>" ><?php echo $value->categorydeal_name ?></option>
                                        <?php } ?>
                                        </select>

                                       <input type="text" name="o_start_date" class="date start" />

                                      

                                        <input type="text" name="o_end_date" class="date end" />

                                        <input type="submit" value="Search" name="Search">
                                        </form>
                                </div>


                                    <div style="text-align:right;">
                                        <a href="<?php echo base_url();?>admin/offer/addoffer"><button>ADD DEAL</button></a>
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
                            	<div class="radio_div">
                                	<div class="radio">
  										                    
                                        <label class="radio-inline"><input type="radio" value="approve" 
                                        onclick="changedealstatus('all')" name="optradio">All</label>
                                        <label class="radio-inline"><input type="radio" value="approve" 
                                        onclick="changedealstatus('approve')" name="optradio">Approve</label>
                                        <label class="radio-inline"><input type="radio" value="ending" 
                                        onclick="changedealstatus('ending')" name="optradio">Ending</label>
                                        <label class="radio-inline"><input type="radio" value="runing" 
                                        onclick="changedealstatus('issue')" name="optradio">Issue</label>
                                        

                                        <label class="radio-inline"><input type="radio" value="runing" 
                                        onclick="changedealstatus('close')" name="optradio">Closed</label>



                                        <label class="radio-inline"><input type="radio" value="rejected" 
                                        onclick="changedealstatus('canceled')" name="optradio">Canceled</label>
                                        
									</div>
                                    
                                    
                                    
                                </div>
                            	</div>
                            </div>
                        
                        

                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview" id="dealfilter">
                                    <table class="grid_tbl" id="example">
                                        <thead>
                                            <tr>
                                                <th bgcolor='red'>S.No.</th>
                                                <th bgcolor='red'>Deal Id</th>
                                                <th bgcolor='red'>Retailer Id</th>
                                                <th bgcolor='red'>Deal Image</th>
                                                <th bgcolor='red'>Category</th>
                                                <th bgcolor='red'>Store Name</th>
                                                <th bgcolor='red'>Type Of Deal</th>
                                                <th bgcolor="red">From  Date</th>
                                                <th bgcolor="red">To Date</th>
                                            
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
                                             <td onclick="showdealdetailstr('<?php echo $i; ?>')"><?php echo $value->deal_id; ?></td>
                                             <td><?php echo $value->deal_id; ?></td>
                                             <td><img width="50px;" height="50px;" src="<?php echo base_url().'public/offermenu-images/'.$value->o_menu; ?>"></td>
                                           
                                            <td><?php echo $value->categorydeal_name; ?></td>
                                            <td><?php echo $value->s_name; ?></td>
                                            <td><?php echo $value->offer_title; ?></td>
                                            
                                            <td><?php echo $value->o_start_date; ?></td>
                                            <td><?php echo $value->o_start_date; ?></td>
                                         
                                            <td><a href="<?php echo base_url()?>admin/offer/updateoffer/<?php echo $value->offer_id?>" ><i class="fa fa-pencil"></a></i>   
                                             <a href="<?php echo base_url()?>admin/offer/deleteoffer/<?php echo $value->offer_id?>/<?php echo $this->uri->segment(4);?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/offer/statusoffer/<?php echo $value->offer_id.'/'.$value->o_status; ?>/<?php echo $this->uri->segment(4);?>"><?php if($value->o_status=='1') echo 'Active'; else echo 'Inactive'; ?></a>
                                            </td>
                                        </tr>
                                        <style>.str{display:none;}</style>
                                        <tr class="dealdetailstr str"  id="sho_<?php echo $i; ?>">
                                            <td colspan="10">
                                                <div class="deal_detail">
                                                    <div class="deal_left"><div class="d_image"><img width="50px;" height="50px;" src="<?php echo base_url().'public/offermenu-images/'.$value->o_menu; ?>"></div></div>
                                                    <div class="deal_right">
                                                        <div class="deal_row">
                                                            <div class="deal_d2"><div class="deal_text">Deal ID : <span><?php echo $value->deal_id; ?></span></div></div>
                                                            <div class="deal_d2"><div class="deal_text">Store ID : <span>MY0265248</span></div></div>
                                                        </div>
                                                        <div class="deal_row">
                                                            <div class="deal_d2"><div class="deal_text">Store Name : <span>Abc Stroe</span></div></div>
                                                            <div class="deal_d2"><div class="deal_text">Company Name : <span><?php echo $value->company_name; ?></span></div></div>
                                                        </div>
                                                        <div class="deal_row"> 
                                                            <div class="deal_d2"><div class="deal_text">Deal Type : <span><?php echo $value->offer_title; ?></span></div></div>
                                                            <div class="deal_d2"><div class="deal_text">Tagline : <span><?php echo $value->Tagline; ?></span></div></div>
                                                        </div>
                                                        <div class="deal_row">
                                                            <div class="deal_d2"><div class="deal_text">Deal Start Date : <span><?php echo $value->om_start_time; ?></span></div></div>
                                                            <div class="deal_d2"><div class="deal_text">Deal End Date : <span><?php echo $value->om_end_time; ?></span></div></div>
                                                        </div>
                                                        <div class="deal_row">
                                                            <div class="deal_d2"><div class="deal_text">Deal Time : <span><?php echo $value->om_start_timeopt; ?></span></div></div>
                                                            <div class="deal_d2"><div class="deal_text">Deal Fully/Partially : <span>Partially</span></div></div>
                                                        </div>
                                                        <div class="deal_row"> 
                                                            <div class="deal_d2"><div class="deal_text">Category : <span><?php echo $value->categorydeal_name; ?></span></div></div>
                                                            <div class="deal_d2"><div class="deal_text">Cost in Popcoins : <span>Rs. 
                                                            <?php echo $value->cosinpopcoins; ?></span></div></div>  
                                                        </div>
                                                        <div class="deal_row">
                                                            <div class="deal_d1"><div class="deal_text">Deal Commission : <span><?php echo $value->commission; ?></span></div></div>
                                                            
                                                        </div>
                                                        <div class="deal_row">
                                                            <div class="deal_d1"> 
                                                            <div class="deal_text">Product description </div>
                                                            <div class="deal_text_b"><!-- Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. -->
                                                                    <?php echo $value->s_name; ?>

                                                            </div></div>
                                                            
                                                        </div>
                                                        <div class="deal_row">
                                                        

                                                        <!-- approvedeal() -->
                                                       
                                                                                                                
                                                        </div>
                                                        
                                                        <div class="deal_row issuediv">
                                                            <input type="hidden"  class="dealid_<?php echo $i; ?>"  name="dealid" value="<?php echo $value->offer_id; ?>">
                                                             <div class="deal_d1"><div class="deal_text" style="padding-bottom:10px;">Reason</div></div>
                                                            <div class="deal_d1"><textarea class="t_area_<?php echo $i; ?>"></textarea>

                                                            <a href="javascript:void();" onclick="issuedealfun(<?php echo $i; ?>)" class="sbt_btn">Submit</a>

                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
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





<script type="text/javascript">
    

function changedealstatus(value)
{
 
 
    
   //var statval =  $("#changestatus"+id).val();

    //alert(statval); 
    $.ajax({
              url: '<?php echo base_url(); ?>admin/offer/showchangestatus',
              type: 'POST',
              data: {'statusvalue':value},
              success: function(data){
                $("#dealfilter").html(data);
                //alert(data); return false;
                //location.reload();
              }
              });


    
}

</script>


<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
<script> CKEDITOR.replace('o_desc'); </script>
<script> CKEDITOR.replace('o_termsconditions'); </script>

<script src="<?php echo base_url();?>assets/js/jquery.timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.timepicker.css" />
<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-datepicker.standalone.css" />
<script src="<?php echo base_url();?>assets/js/datepair.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.datepair.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#offerForm").validate({
          // Specify the validation rules
          rules: {
              o_name : "required",
              offertype_id : "required",
              type_id : "required",
              restaurant_id : "required",
              o_price :  {required:true, number:true},
              o_start_date : "required",
              o_end_date : "required",
              o_offer_type : "required",
              "o_pay_options[]" : "required",
              o_fooddelivery : "required",
              o_numusers : "required",
              o_menu : "required",
              "map_id[]" : "required",
              comp_ad_name1 : "required",
              comp_ad_name2 : "required",
              company_ad_url1 : "required",
              company_ad_url2 : "required",
              comp1_percent : {required:true, number:true},
              comp2_percent : {required:true, number:true},
              o_numvouchers : "required",
              o_isVoucher : "required",
              o_voucherPrefix : "required"
          },
          
          messages: {
              o_name : "This field is required!",
              offertype_id : "This field is required!",
              type_id : "This field is required!",
              restaurant_id : "This field is required!",
              o_price : { required:"This field is required!", number:"Numbers only!" },
              o_start_date : "This field is required!",
              o_end_date : "This field is required!",
              o_offer_type : "This field is required!",
              "o_pay_options[]" : "This field is required!",
              o_fooddelivery : "This field is required!",
              o_numusers : "This field is required!",
              o_menu : "This field is required!",
              "map_id[]" : "This field is required!",
              comp_ad_name1 : "This field is required!",
              comp_ad_name1 : "This field is required!",
              company_ad_url1 : "This field is required!",
              company_ad_url2 : "This field is required!",
              comp1_percent : {required:"This field is required!", number:"Numbers only!"},
              comp2_percent : {required:"This field is required!", number:"Numbers only!"},
              o_numvouchers : "This field is required!",
              o_isVoucher : "This field is required!",
              o_voucherPrefix : "This field is required!"
          },
          
          submitHandler: function(form) {
            form.submit();
          }
      });
   });
</script>

<script type="text/javascript">
 
    $('.date').datepicker({
    'format': 'yyyy-mm-dd',
    'autoclose': true,
    todayBtn: "linked",
    todayHighlight: true
    });

    var basicExampleEl = document.getElementById('basicExample');
    var datepair = new Datepair(basicExampleEl);
</script>          

<script type="text/javascript">

var d = new Date();
var curr_date = d.getDate();
var curr_month = d.getMonth();
var curr_month_plus= curr_month+1; 
var curr_year = d.getFullYear();

function dstrToUTC(ds) {
    var dsarr = ds.split('-');
    var yy = parseInt(dsarr[0],10);
    var mm = parseInt(dsarr[1],10);
    var dd = parseInt(dsarr[2],10);
    return Date.UTC(yy,mm-1,dd,0,0,0); 
}

function datediff(ds1,ds2) {
    var d1 = dstrToUTC(ds1);
    var d2 = dstrToUTC(ds2);
    var oneday = 86400000;
    return (d2-d1) / oneday;    
}

function generatedays()
{
    var sdate = $(".start").val();
    var edate = $(".end").val();
    var html = '<div class="col-lg-12"><div class="row"><div class="sep_box"><div class="col-lg-1"></div><div class="col-lg-1"><div class="tbl_input"><input type="checkbox" id="checkall" name="checkall" /></div></div><div class="col-lg-2"><div class="tbl_input"><strong>Offer Day</strong></div></div><div class="col-lg-2"><div class="tbl_input"><strong>Start Time</strong></div></div><div class="col-lg-2"><div class="tbl_input"><strong>End Time</strong></div></div><div class="col-lg-2"><div class="tbl_input"><strong>Start Time (Slot 2)</strong></div></div><div class="col-lg-2"><div class="tbl_input"><strong>End Time (Slot 2)</strong>&nbsp;&nbsp;<div onclick="return copyAll();"><button type="button">copy first row in all</button></div>&nbsp;</div></div></div></div></div>';
    for(var i=1; i<=7;i++)
    {
        var day;
        if(i==0){
            day = 'Monday';
        } else if(i==1) {
            day = 'Tuesday';
        } else if(i==2) {
            day = 'Wednesday';
        } else if(i==3) {
            day = 'Thursday';
        } else if(i==4) {
            day = 'Friday';
        } else if(i==5) {
            day = 'Saturday';
        } else if(i==6) {
            day = 'Sunday';
        }
        html += '<div class="col-lg-12"><div class="row"><div class="sep_box"><div class="col-lg-1"></div><div class="col-lg-1"><div class="tbl_input"><input type="checkbox" name="map_id[]" class="check" value="'+i+'" /></div></div><div class="col-lg-2"><div class="tbl_input">'+day+'</div></div><div class="col-lg-2"><div class="tbl_input"><input type="text" class="time start start_time" name="om_start_time_'+i+'" id="om_start_time_'+i+'" /></div></div><div class="col-lg-2"><div class="tbl_input"><input type="text" name="om_end_time_'+i+'" id="om_end_time_'+i+'" class="time end end_time" /></div></div><div class="col-lg-2"><div class="tbl_input"><input type="text" class="time start start_timeopt" name="om_start_timeopt_'+i+'" id="om_start_timeopt_'+i+'" /></div></div><div class="col-lg-2"><div class="tbl_input"><input type="text" name="om_end_timeopt_'+i+'" id="om_end_timeopt_'+i+'" class="time end end_timeopt" /></div></div></div></div></div>';
    }
    $('.newdays').html(html);
    $('#basicExample .time').timepicker({
    'showDuration': true,
    /*'timeFormat': 'h:i A'*/
    'timeFormat': 'H:i:s'
    });

    $('#basicExample .date').datepicker({
    'format': 'yyyy-mm-dd',
    'autoclose': true,
    todayBtn: "linked",
    todayHighlight: true
    });
    var basicExampleEl = document.getElementById('basicExample');
    var datepair = new Datepair(basicExampleEl);
    return false;
}

function selectResdetails() {
    var offertype_id = $("#offertype_id").val();
    if(offertype_id=="") {
        $('#price_div').html("");  
        $('#showhide_div').hide(); 
    } else {
        $.ajax({
        url: '<?php echo base_url(); ?>admin/offer/fetchrestaurants',
        type: 'POST',
        data: {'offertype_id':offertype_id},
        success: function(data){
            $('#price_div').html(data); 
            $('#showhide_div').show(); 
        }
        });
    }
}

function selectRes() {
        var type_id = $("#type_id").val();
        $.ajax({
        url: '<?php echo base_url(); ?>admin/offer/fetchresdetails',
        type: 'POST',
        data: {'type_id':type_id},
        success: function(data){
            $('#restaurant_id').html(data); 
        }
        });
}

function selectPro() {
    var offertype_id = $("#offertype_id").val();
    var restaurant_id = $("#restaurant_id").val();
    if(restaurant_id=="" || offertype_id==3) {
        $('#product_div').html("");  
    } else {
        $.ajax({
        url: '<?php echo base_url(); ?>admin/offer/fetchproducts',
        type: 'POST',
        data: {'restaurant_id':restaurant_id},
        success: function(data){
            $('#product_div').html(data);  
        }
        });
    }
}

function copyAll() {
    var start_time = $("#om_start_time_1").val();
    var end_time = $("#om_end_time_1").val();
    var start_timeopt = $("#om_start_timeopt_1").val();
    var end_timeopt = $("#om_end_timeopt_1").val();
    $(".start_time").val(start_time);
    $(".end_time").val(end_time);
    $(".start_timeopt").val(start_timeopt);
    $(".end_timeopt").val(end_timeopt);

}

$(document).ready(function() {
    $("input[name=o_offer_type]").click(function(){
        if($("input[name=o_offer_type]:checked").val()==2) {
            $(".timediv").hide();
            generatedays();
        } else if($("input[name=o_offer_type]:checked").val()==1) {
            $(".newdays").html("");
            $(".timediv").show();
        } else {
            $(".newdays").html("");
            $(".timediv").hide();
        }
    });
});

$(document).ready(function() {
    $("input[name=o_isVoucher]").click(function(){
        if($("input[name=o_isVoucher]:checked").val()==1) {
            $("#vouchercode_div").show();
        } else {
            $("#vouchercode_div").hide();
        }
    });
});

$(document).ready(function() {
    $(document).on('click','#checkall',function(){
        if($('#checkall').prop('checked')==true) {
            $('.check').prop('checked',true);
        } else {
            $('.check').prop('checked',false);
        } 
    });
});


function searchauto(){
    var searchrca=$('#searchrca').val();
    
   
      $.ajax({  
          url: '<?php echo base_url() ?>admin/offer/storename',
          type:'POST',
          data:{'keyword':searchrca}, 
         success: function(data){ 
            alert(data); return false;
      
          
             }
      });

   
  }


function showdealdetailstr(id)
{



  
  $('.dealdetailstr').closest('tr').addClass('str');
  $('#sho_'+id).closest('tr').removeClass('str');





}

</script>   



