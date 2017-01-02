<?php  $this->load->view('helper/sidebar'); ?> 
<?php
//p($offers); exit;

foreach(@$offermaps as $val) {
    $day_array[] = $val->om_day;
    $start_array[] = $val->om_start_time;
    $end_array[] = $val->om_end_time;
    $startopt_array[] = $val->om_start_timeopt;
    $endopt_array[] = $val->om_end_timeopt;
}
@$combined_start = array_combine($day_array, $start_array);
@$combined_end = array_combine($day_array, $end_array);
@$combined_startopt = array_combine($day_array, $startopt_array);
@$combined_endopt = array_combine($day_array, $endopt_array);
?>  
<div class="col-lg-10 col-lg-push-2">
    <div id="basicExample">
            <div class="row" >
                <div class="page_contant">
                    <form action="" method="post" id="offerForm" enctype="multipart/form-data">
                    <div class="col-lg-12">
                        <div class="page_name">
                           <h2>Update Deals</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can update Deal!
                                    <a href="<?php echo base_url();?>admin/offer/viewoffers/<?php echo $this->uri->segment(4);?>"><button type="button" style="float:right;">CANCEL</button></a></p>
                                <p><strong>Outlet Title : <?php echo @$resdetail->r_res_name;?></strong></p>
                            </div>
                        </div>








                     


                        <div class="page_box">
                            <div class="sep_box">
                                <div class="col-lg-12">                                 
                                    <div class="row">
                                        <div class="sep_box">
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Retailer Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <select name="s_admin_id" id="s_admin_id" >
                                                                <option value="">-- Retailer Name --</option>
                                                                <?php foreach($vieww as $val) {


                                                                 ?>
                                                                <option <?php if($vendor->s_admin_id==$val->s_admin_id){ echo "selected"; } ?> value="<?php echo $val->s_admin_id; ?>"><?php echo $val->s_username; ?></option>
                                                                <?php } ?>                                                          
                                                            </select>
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 

                                   <div class="col-lg-12">                                 
                                    <div class="row">
                                        <div class="sep_box">
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Deal Type <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <select name="offertype_id" id="offertype_id" >
                                                                <option value="">-- Select Deal Type --</option>
                                                                <?php foreach($offers as $val) {


                                                                 ?>
                                                                <option <?php if($offer->offertype_id==$val->offertype_id){ echo "selected"; } ?> value="<?php echo $val->offertype_id; ?>"><?php echo $val->offer_title; ?></option>
                                                                <?php } ?>                                                          
                                                            </select>
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                             <div class="col-lg-12">                                 
                                    <div class="row">
                                        <div class="sep_box">
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Category Type <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <select name="s_admin_id" id="s_admin_id" >
                                                                <option value="">--Select Category--</option>
                                                                <?php foreach($vieww as $val) {


                                                                 ?>
                                                                <option <?php if($vendor->s_admin_id==$val->s_admin_id){ echo "selected"; } ?> value="<?php echo $val->s_admin_id; ?>"><?php echo $val->s_username; ?></option>
                                                                <?php } ?>                                                          
                                                            </select>
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>






                                <div class="col-lg-12">                                 
                                    <div class="row">
                                        <div class="sep_box">
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Deal Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <input type="text" name="o_name" value="<?php echo $offer->o_name; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                               

                                <div class="col-lg-12">                                 
                                    <div class="row">
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text" >Valid From <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" value="<?php echo $offer->o_start_date;?>" name="o_start_date" class="date start" />
                                                        </div>
                                                    </div>                                           
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text" >Valid To <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" value="<?php echo $offer->o_end_date;?>" name="o_end_date" class="date end" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">                                 
                                    <div class="row">
                                        <div class="sep_box">
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Category Type <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <select name="category" id="category">
                                                                <option value="">-- Select Category Type --</option>
                                                                <?php foreach($category as $val) { ?>
                                                                <option <?php if($offer->t_category==$val->categorydeal_id){ echo "selected"; } ?> value="<?php echo $val->categorydeal_id; ?>"><?php echo $val->categorydeal_name; ?></option>
                                                                <?php } ?>                                                          
                                                            </select>
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>     



                                <!-- <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                           
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Heading <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            
                                                            <input type="text" name="Heading" placeholder="05% Exclusive Cashback Offer" value="<?php echo "sdf".$offer->Heading;?>"/>
                                                            
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>                                        
                                        </div>                                  
                                    </div>
                                </div>   -->


                                <div class="newdays">
                                <!-- <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                           
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Tagline <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            
                                                            <input type="text" name="Tagline"  placeholder=" Buy Any Personal Care Appliances Get 10%" value="<?php echo $offer->Tagline;?>"/>
                                                            
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>                                        
                                        </div>                                  
                                    </div>
                                </div>  -->
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                           
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Cost In Popcoins <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            
                                                            <input type="text" name="cosinpopcoins" value="<?php echo $offer->cosinpopcoins;?>" placeholder="Enter Popcoins Point"/>
                                                            
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>                                        
                                        </div>                                  
                                    </div>
                                </div> 

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                           
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >COMMISSION<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            
                                                            <input type="text" name="commission" value="<?php echo $offer->commission;?>" placeholder=""/>
                                                            
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>                                        
                                        </div>                                  
                                    </div>
                                </div>  

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                           
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >No of User (s) <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <select name="o_numusers">
                                                                <option value="">-- Select User --</option>
                                                                <?php for($i=1; $i<=15; $i++ ){ ?>
                                                                    <option  <?php if($offer->o_numusers==$i) echo "selected"; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                    <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>                                        
                                        </div>                                  
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                           
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >No of Voucher (s) <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <select name="o_numvouchers">
                                                                <option value="">-- Select no of voucher (s) --</option>
                                                                <?php for($i=1; $i<=20; $i++ ){ ?>
                                                                    <option   <?php if($offer->o_numvouchers==$i) { echo "selected"; } ?>  value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                    <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>                                        
                                        </div>                                  
                                    </div>
                                </div>
                                <!-- <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                           
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Featured Deal<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <select required="required" class="form-control" name="featured" id="featuredDeal">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>                                        
                                        </div>                                  
                                    </div>
                                </div> -->

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                        
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Menu Image </div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <input type="file" name="o_menu" id="o_menu" />
                                                            <input type="hidden" name="o_menu" value="<?php echo $offer->o_menu;?>" />
                                                            <img src="<?php echo base_url();?>public/offermenu-images/<?php echo $offer->o_menu;?>" width="20%" />
                                                        </div>
                                                    </div>                                      
                                                </div>
                                            </div>                                             
                                        </div>
                                    </div>
                                </div>
                                 
                                
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                        
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Deals Description </div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <textarea name="o_desc" id="o_desc"><?php echo $offer->o_desc;?></textarea>
                                                        </div>
                                                    </div>                                      
                                                </div>
                                            </div>                                             
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                        
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text"> Terms & Conditions </div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <textarea name="o_termsconditions" id="o_termsconditions"><?php echo $offer->o_termsconditions;?></textarea>
                                                        </div>
                                                    </div>                                      
                                                </div>
                                            </div>                                             
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                           
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-12">
                                                        <div class="tbl_input">
                                                            <input type="submit" name="submit" value="Submit" />
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
                </form>

            </div>
        </div>
    </div>
</div>

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
              "o_pay_options[]" : "required",
              o_numusers : "required",
              "map_id[]" : "required",
              comp_ad_id1 : "required",
              comp_ad_id2 : "required",
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
              "o_pay_options[]" : "This field is required!",
              o_numusers : "This field is required!",
              "map_id[]" : "This field is required!",
              comp_ad_id1 : "This field is required!",
              comp_ad_id2 : "This field is required!",
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
    $('#basicExample .time').timepicker({
    'showDuration': true,
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
    $("input[name=o_isVoucher]").click(function(){
        if($("input[name=o_isVoucher]:checked").val()==1) {
            $("#vouchercode_div").show();
        } else {
            $("#vouchercode_div").hide();
        }
    });
});

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
    $(document).on('click','#checkall',function(){
        if($('#checkall').prop('checked')==true) {
            $('.check').prop('checked',true);
        } else {
            $('.check').prop('checked',false);
        } 
    });
});
</script>  