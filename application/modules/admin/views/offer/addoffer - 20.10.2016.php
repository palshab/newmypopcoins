<?php  $this->load->view('helper/sidebar'); ?>   
<div class="col-lg-10 col-lg-push-2">
    <div id="basicExample">
            <div class="row" >
                <div class="page_contant">
                    <form action="" method="post" id="offerForm" enctype="multipart/form-data">
                    <div class="col-lg-12">
                        <div class="page_name">
                           <h2>Add Offer</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can add offer!
                                    <a href="<?php echo base_url();?>admin/restaurant/viewrestaurants"><button type="button" style="float:right;">CANCEL</button></a></p>
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
                                                        <div class="tbl_text" >Offer Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <input type="text" name="o_name" value="" />
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
                                                        <div class="tbl_text" >Offer Type <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <select name="offertype_id" id="offertype_id" onchange="return selectResdetails();">
                                                                <option value="">-- Select Offer Type --</option>
                                                                <?php foreach($offers as $val) { ?>
                                                                <option value="<?php echo $val->offertype_id; ?>"><?php echo $val->offer_title; ?></option>
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
                                            <div id="restaurant_div"></div>
                                        </div>
                                    </div>
                                </div>

                                <div id="showhide_div" style="display:none;">
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
                                                            <input type="text" name="o_start_date" class="date start" />
                                                        </div>
                                                    </div>                                           
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text" >Valid To <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="tbl_input">
                                                            <input type="text" name="o_end_date" class="date end" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="tbl_input">                                    
                                                            <button type="button" onclick="return generatedays()">Generate</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="newdays"></div>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                           
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Payment Options <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <input type="checkbox" name="o_pay_options[]" value="1" /> Pay Online
                                                            <input type="checkbox" name="o_pay_options[]" value="2" /> Pay at Outlet
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
                                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
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
                                            <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text" >Company AdvertisementI <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select name="comp_ad_id1" id="comp_ad_id1">
                                                                <option value="">-- Select Company --</option>
                                                                <?php foreach($compads as $val) {?>
                                                                <option value="<?php echo $val->comp_ad_id;?>"><?php echo $val->comp_title;?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>                                      
                                                </div>
                                            </div>  
                                            <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text" >Display Percentage I <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="comp1_percent" id="comp1_percent" />
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
                                                        <div class="tbl_text" >Company AdvertisementII <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select name="comp_ad_id2" id="comp_ad_id2">
                                                                <option value="">-- Select Company --</option>
                                                                <?php foreach($compads as $val) {?>
                                                                <option value="<?php echo $val->comp_ad_id;?>"><?php echo $val->comp_title;?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>                                      
                                                </div>
                                            </div>  
                                            <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text" >Display Percentage II <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="comp2_percent" id="comp2_percent" />
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
                                                        <div class="tbl_text" >Offer Description </div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <textarea name="o_desc" id="o_desc"></textarea>
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
                                                            <textarea name="o_termsconditions" id="o_termsconditions"></textarea>
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
              "product_id[]" : "required",
              o_price :  {required:true, number:true},
              o_start_date : "required",
              o_end_date : "required",
              "o_pay_options[]" : "required",
              o_numusers : "required",
              "map_id[]" : "required",
              comp_ad_id1 : "required",
              comp_ad_id2 : "required",
              comp1_percent : {required:true, number:true},
              comp2_percent : {required:true, number:true}
          },
          
          messages: {
              o_name : "This field is required!",
              offertype_id : "This field is required!",
              type_id : "This field is required!",
              restaurant_id : "This field is required!",
              "product_id[]" : "This field is required!",
              o_price : { required:"This field is required!", number:"Numbers only!" },
              o_start_date : "This field is required!",
              o_end_date : "This field is required!",
              "o_pay_options[]" : "This field is required!",
              o_numusers : "This field is required!",
              "map_id[]" : "This field is required!",
              comp_ad_id1 : "This field is required!",
              comp_ad_id2 : "This field is required!",
              comp1_percent : {required:"This field is required!", number:"Numbers only!"},
              comp2_percent : {required:"This field is required!", number:"Numbers only!"}
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
    'timeFormat': 'h:i A'
    });

    $('#basicExample .date').datepicker({
    'format': 'yyyy-mm-dd',
    'autoclose': true
    });

    var basicExampleEl = document.getElementById('basicExample');
    var datepair = new Datepair(basicExampleEl);
</script>          

<script type="text/javascript">

function generatecode(elem)
{
    if($('.vouchercodecheckbox').prop('checked')==true) {
        $.ajax({
        url: '<?php echo base_url() ?>admin/offer/generatevoucher',
        type:'POST',
        data : {'newvalue':'hello'},
        success:function(data)
        {
        $('.vouchercode').val(data);
        }
        });
    } else {
        $('.vouchercode').val('');
    } 
}

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
    var dayscount = datediff(sdate,edate);
    dayscount = dayscount+1;
    var html = '<div class="col-lg-10"><div class="row"><div class="sep_box"><div class="col-lg-2"></div><div class="col-lg-1"><div class="tbl_input"><input type="checkbox" class="checkall" /></div></div><div class="col-lg-3"><div class="tbl_input">Date</div></div><div class="col-lg-3"><div class="tbl_input">Start Time</div></div><div class="col-lg-3"><div class="tbl_input">End Time</div></div></div></div></div>';
    for(var i=1; i<=dayscount;i++)
    {
        html += '<div class="col-lg-10"><div class="row"><div class="sep_box"><div class="col-lg-2"></div><div class="col-lg-1"><div class="tbl_input"><input type="checkbox" name="map_id[]" class="check" value="'+i+'" /></div></div><div class="col-lg-3"><div class="tbl_input"><input type="text" name="om_date_'+i+'" readonly value="'+sdate+'"></div></div><div class="col-lg-3"><div class="tbl_input"><input type="text" class="time start" name="om_start_time_'+i+'" /></div></div><div class="col-lg-3"><div class="tbl_input"><input type="text" name="om_end_time_'+i+'" class="time end" /></div></div></div></div></div>';
        var dmy = sdate.split("-");
        var joindate = new Date(parseInt(dmy[0], 10),parseInt(dmy[1], 10)-1,parseInt(dmy[2], 10));
        joindate.setDate(joindate.getDate() + 1);
        sdate = joindate.getFullYear() + "-" + ("0" + (joindate.getMonth() + 1)).slice(-2) + "-" + 
        ("0" + joindate.getDate()).slice(-2);
    }
    $('.newdays').html(html);
    $('#basicExample .time').timepicker({
    'showDuration': true,
    'timeFormat': 'h:i A'
    });

    $('#basicExample .date').datepicker({
    'format': 'yyyy-mm-dd',
    'autoclose': true
    });
    var basicExampleEl = document.getElementById('basicExample');
    var datepair = new Datepair(basicExampleEl);

    return false;
}

function selectResdetails() {
    var offertype_id = $("#offertype_id").val();
    if(offertype_id=="") {
        $('#restaurant_div').html("");  
        $('#showhide_div').hide(); 
    } else {
        $.ajax({
        url: '<?php echo base_url(); ?>admin/offer/fetchrestaurants',
        type: 'POST',
        data: {'offertype_id':offertype_id},
        success: function(data){
            $('#restaurant_div').html(data); 
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
</script>
<script>
$(document).ready(function() {
    $(".checkall").click(function(){
        if($('.checkall').prop('checked')==true) {
            $('.check').prop('checked',true);
        } else {
            $('.check').prop('checked',false);
        } 
    });
});
</script>   