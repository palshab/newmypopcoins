<?php if(count(@$maps)>0) { foreach($maps as $val) { 
    $s_dayname[] = $val->s_dayname;
    $s_starttime[] = $val->s_starttime;
    $s_endtime[] = $val->s_endtime;
    $s_secondstarttime[] = $val->s_secondstarttime;
    $s_secondendtime[] = $val->s_secondendtime;
} 
$combined_start = array_combine($s_dayname,$s_starttime);
$combined_end = array_combine($s_dayname,$s_endtime);
$combined_secstart = array_combine($s_dayname,$s_secondstarttime);
$combined_secend = array_combine($s_dayname,$s_secondendtime);
}
?>
<!DOCTYPE html>
<html>
<body>
    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Add Store</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can add store!
                                    <a href="<?php echo base_url();?>admin/retailer/viewstores"><button type="button" style="float:right;">CANCEL</button></a></p>
                                    <p><div class='flashmsg'>
                                        <?php echo validation_errors(); ?> 
                                        <?php
                                          if($this->session->flashdata('message')){
                                            echo $this->session->flashdata('message'); 
                                          }
                                        ?>
                                    </div></p>
                            </div>
                        </div>
                            <form action="" id="mgrForm" method="post" enctype="multipart/form-data" >
                            <div class="page_box" id="storediv">
                                        <div class="sep_box">                                    
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                         <div class="tbl_text">Store Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                             <input id="r_res_name" type="text" name="storename" value="<?php echo @$vieww->s_name;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                         
                                            <div class="col-lg-6">                                             
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Select Country <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="country_id" id="country_id" onchange="selectstates();">
                                                              <option value="">-- Select Country --</option>
                                                             <?php foreach ($countries as $key => $value) { ?>
                                                          <option value="<?php echo $value->conid; ?>" <?php if($value->conid==@$vieww->s_storecountryid) echo "selected";?>><?php echo $value->name; ?></option>
                                                           <?php } ?>
                                                               </select>
                                                        </div>                                                   
                                                    </div>
                                                </div>
                                            </div>   
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Select State <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select id="state_id" name="state_id" onchange="selectcities();">
                                                             <option value="<?php echo @$vieww->s_statenameid; ?>"><?php echo $vieww->statename; ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Select City <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <select id="city_id" name="city_id">
                                                             <option value="<?php echo @$vieww->s_storecity; ?>"><?php echo $vieww->cityname; ?></option>
                                                             </select>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                            </div>                                           
                                        </div>
                                        <div class="sep_box">                                       
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Address <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <textarea name="storeaddress" id="storeaddress"><?php echo @$vieww->s_storeaddress;?></textarea>  
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sep_box">                                       
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Contact Number <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                               <input id="contactno" type="text" name="contactno" value="<?php echo @$vieww->s_contactno; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                        
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Email id <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                            <div class="tbl_input">
                                                                <input id="emailid" style="text-transform:lowercase;" type="text" name="emailid" value="<?php echo @$vieww->s_emailid; ?>" />            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                         
                                        </div>
                                        <div class="sep_box">                                       
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Store No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                                 <input id="storeno" type="text" name="storeno" value="<?php echo @$vieww->s_storeno; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Service Tax No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                             Collected 
                                                            <input id="checkbox" value="1" type="radio" name="sservicetaxno" <?php if($vieww->s_servicetaxno==1) echo "checked";?> />

                                                            Not Collected    
                                                            <input id="checkbox" value="0" type="radio" name="sservicetaxno" <?php if($vieww->s_servicetaxno==0) echo "checked";?> />
                                                        </div>
                                                        <div class="tbl_input" id="service_div" style="display:none;">
                                                            <input type="text" name="s_servicetaxno_val" value="<?php echo $vieww->s_servicetaxno_val;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sep_box"> 
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Company Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input id="s_companyname" value="<?php echo $vieww->s_companyname;?>" type="text" name="s_companyname" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">PAN Card No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input id="pancardno" value="<?php echo $vieww->s_pancardno?>" type="text" name="spancardno" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sep_box">                                      
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Visiting Card<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            Collected
                                                            <input type="radio" name="visitingcard" value="1" <?php if($vieww->s_visitingcard==1) echo "checked";?>/>
                                                            Not Collected
                                                            <input type="radio" name="visitingcard" value="0" <?php if($vieww->s_visitingcard==0) echo "checked";?>/>  
                                                        </div>
                                                        <div class="tbl_input" id="visiting_div" style="display:none;">
                                                            <input type="text" name="s_visitingcard_val" value="<?php echo $vieww->s_visitingcard_val?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Sample Bill Copy<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         Collected
                                                            <input value="1" type="radio" name="samplebillcopy" <?php if($vieww->s_samplecopy==1) echo "checked";?>/>
                                                          Not Collected
                                                            <input value="0" type="radio" name="samplebillcopy" <?php if($vieww->s_samplecopy==0) echo "checked";?>/>
                                                        </div>
                                                        <div class="tbl_input" style="display:none;" id="sample_div">
                                                            <input type="text" name="s_samplecopy_val" value="<?php echo $vieww->s_samplecopy_val?>" />                                                              
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Tin No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            Collected 
                                                            <input value="1" type="radio" name="tinno" <?php if($vieww->s_tinno==1) echo "checked";?>/> 

                                                            Not Collected
                                                            <input value="0" type="radio" name="tinno" <?php if($vieww->s_tinno==0) echo "checked";?>/>
                                                        </div>
                                                        <div class="tbl_input" id="tin_div" style="display:none;">
                                                            <input type="text" name="s_tinno_val" value="<?php echo $vieww->s_tinno_val?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Bank Details<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         Account Holder Name

                                                            <input id="accholder_name" type="text" name="accholder_name" value="<?php echo $vieww->accholder_name?>" />


                                                            Account Number
                                                            <input id="acc_number" type="text" name="acc_number" value="<?php echo $vieww->acc_number?>" />

                                                            IFSC Code
                                                            <input id="ifsc_code" type="text" name="ifsc_code" value="<?php echo $vieww->ifsc_code?>" />
                                                         

                                                            Branch n Bank Name

                                                            <textarea id="bank_name" type="text" name="bank_name"><?php echo $vieww->bank_name?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                   
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Date of Agreement <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">

                                                             <input type="text" name="dateofagrement" class="date start" readonly value="<?php echo $vieww->s_dateaggrement;?>" />

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Category <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">

                                                             <select name="categoryid">
                                                                 <?php foreach ($category as $key => $value) { ?>
                                                                    <option value="<?php echo $value->categorydeal_id ;?>" <?php if($value->categorydeal_id==$vieww->s_categoryid) echo "selected";?>><?php echo $value->categorydeal_name; ?></option>
                                                                 <?php } ?>
                                                             </select>

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                          <div class="col-lg-12"><div class="row"><div class="sep_box"><div class="col-lg-1"></div><div class="col-lg-1"></div><div class="col-lg-2"><div class="tbl_input"><strong>Store Day</strong></div></div><div class="col-lg-2"><div class="tbl_input"><strong>Start Time</strong></div></div><div class="col-lg-2"><div class="tbl_input"><strong>End Time</strong></div></div><div class="col-lg-2"><div class="tbl_input"><strong>Start Time (Slot 2)</strong></div></div><div class="col-lg-2"><div class="tbl_input"><strong>End Time (Slot 2)</strong></div></div></div></div></div>
                                          <?php 

                                            for ($i=0; $i < 7; $i++) { 
                                              
                                                      $day;
                                                        if($i==0){
                                                            $day = 'Monday';
                                                        } else if($i==1) {
                                                            $day = 'Tuesday';
                                                        } else if($i==2) {
                                                            $day = 'Wednesday';
                                                        } else if($i==3) {
                                                            $day = 'Thursday';
                                                        } else if($i==4) {
                                                            $day = 'Friday';
                                                        } else if($i==5) {
                                                            $day = 'Saturday';
                                                        } else if($i==6) {
                                                            $day = 'Sunday';
                                                        }

                                          ?>


                                          <div class="col-lg-12"><div class="row"><div class="sep_box"><div class="col-lg-1"></div><div class="col-lg-1"><div class="tbl_input"><input type="checkbox" name="s_dayname[]" <?php if(@in_array($i,$s_dayname)) echo 'checked';?> class="check" value="<?php echo $i;?>" /></div></div><div class="col-lg-2"><div class="tbl_input"><?php echo $day; ?></div></div><div class="col-lg-2"><div class="tbl_input"><input type="text" class="time start start_time" 
                                          name="s_starttime_<?php echo $i; ?>" value="<?php echo @$combined_start[$i];?>" /></div></div><div class="col-lg-2"><div class="tbl_input"><input type="text" name="s_endtime_<?php echo $i; ?>" value="<?php echo @$combined_end[$i];?>" class="time end end_time" /></div></div><div class="col-lg-2"><div class="tbl_input"><input type="text" class="time start start_timeopt" name="s_secondstarttime_<?php echo $i; ?>" value="<?php echo @$combined_secstart[$i];?>" /></div></div><div class="col-lg-2"><div class="tbl_input"><input type="text" name="s_secondendtime_<?php echo $i; ?>" class="time end end_timeopt" value="<?php echo @$combined_secend[$i];?>" /></div></div></div></div></div>


                                          <?php } ?>

                                            </div>                                        

                                           
                                        <div class="sep_box">                                    
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Training Date<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <input type="text" class="date" name="s_traningdate" value="<?php echo $vieww->s_traningdate;?>" readonly /> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Training Given to Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         <input type="text" name="s_traninggivename" value="<?php echo $vieww->s_traninggivename;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sep_box">                                     
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Training Given to Number<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         <input type="text" name="s_traninggivenno" value="<?php echo $vieww->s_traninggivenno;?>" /> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Cashback Percentage<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         <input type="text" name="s_cashbackper" value="<?php echo $vieww->s_cashbackper;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sep_box">                                      
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Deal Commission<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         <input type="text" name="s_dealcommision" 
                                                         value="<?php echo $vieww->s_dealcommision;?>" > 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Store Picture/Company Logo<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         <input type="file" name="s_storeimg" >
                                                         <input type="hidden" name="s_storeimg1" value="<?php echo $vieww->s_storeimg;?>" >
                                                         <?php if($vieww->s_storeimg) { ?>
                                                            <img src="<?php echo base_url();?>public/storelogo/<?php echo $vieww->s_storeimg;?>" />
                                                         <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sep_box">                                    
                                            <div id="store_msg"></div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                    
                                                           <input id="submitBtn" type="submit"  name="submit" value="Submit" class="retailer_btn"/>
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
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.timepicker.css" />
<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-datepicker.standalone.css" />

<script type="text/javascript">
    $('.time').timepicker({
    'showDuration': true,
    'timeFormat': 'H:i:s'
    });

    $('.date').datepicker({
    'format': 'yyyy-mm-dd',
    'autoclose': true,
    todayBtn: "linked",
    todayHighlight: true
    });
</script> 
<script type="text/javascript">
$(document).ready(function(){
$("#mgrForm").validate({
      rules: {
        storename: "required",
        country_id: "required",
        state_id: "required",
        city_id: "required",
        storeaddress: "required",
        contactno: {required:true, number:true},
        emailid: "required",
        storeno: "required",
        s_companyname: "required",
        dateofagrement: "required",
        categoryid: "required",
        "s_dayname[]": "required",
        s_cashbackper: {required:true, number:true},
        s_dealcommision: {required:true, number:true}
      },
      messages: {
        storename: "This field is required!",
        country_id: "This field is required!",
        state_id: "This field is required!",
        city_id: "This field is required!",
        storeaddress: "This field is required!",
        contactno: {required:"This field is required!", number:"Numbers only!"},
        emailid: "This field is required!",
        storeno: "This field is required!",
        s_companyname: "This field is required!",
        s_companyname: "This field is required!",
        dateofagrement: "This field is required!",
        categoryid: "This field is required!",
        "s_dayname[]": "This field is required!",
        s_cashbackper: {required:"This field is required!", number:"Numbers only!"},
        s_dealcommision: {required:"This field is required!", number:"Numbers only!"}
      },
      submitHandler: function(form) {
        form.submit();
      }
  });
});
function selectstates(){
    var countryid=$('#country_id').val();
    $.ajax({
    url: '<?php echo base_url()?>admin/geographic/countrystate',
    type: 'POST',
    data: {'countryid': countryid},
    success: function(data){
        var option_brand = '<option value="">-- Select State --</option>';
        $('#state_id').empty();
        $("#state_id").append(option_brand+data);
    }
    });
}
function selectcities(){
    var stateid=$('#state_id').val();
    $.ajax({
    url: '<?php echo base_url()?>admin/geographic/countrycity',
    type: 'POST',
    data: {'stateid': stateid},
    success: function(data){
        var option_brand = '<option value="">-- Select City --</option>';
        $('#city_id').empty();
        $("#city_id").append(option_brand+data);
    }
    });
}

$(function(){
    $("input[name=sservicetaxno]").click(function() {     
        var val = $("input[name=sservicetaxno]:checked").val();
        if(val==1) {
            $("#service_div").show();
        } else {
            $("#service_div").hide();
        }
    });
});

$(function(){
    $("input[name=visitingcard]").click(function() {     
        var val = $("input[name=visitingcard]:checked").val();
        if(val==1) {
            $("#visiting_div").show();
        } else {
            $("#visiting_div").hide();
        }
    });
});

$(function(){
    $("input[name=samplebillcopy]").click(function() {     
        var val = $("input[name=samplebillcopy]:checked").val();
        if(val==1) {
            $("#sample_div").show();
        } else {
            $("#sample_div").hide();
        }
    });
});

$(function(){
    $("input[name=tinno]").click(function() {     
        var val = $("input[name=tinno]:checked").val();
        if(val==1) {
            $("#tin_div").show();
        } else {
            $("#tin_div").hide();
        }
    });
});
</script>