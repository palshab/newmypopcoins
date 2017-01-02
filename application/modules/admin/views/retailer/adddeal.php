<?php  $this->load->view('helper/sidebar'); ?> 
 
<div class="col-lg-10 col-lg-push-2">
    <div id="basicExample">
            <div class="row" >
                <div class="page_contant">
                    <form action="" method="post" id="offerForm" enctype="multipart/form-data">
                    <div class="col-lg-12">
                        <div class="page_name">
                           <h2>Add Deal</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can add deal!
                                    <a href="<?php echo base_url();?>admin/retailer/viewdeals/<?php echo $this->uri->segment(4);?>"><button type="button" style="float:right;">CANCEL</button></a></p>
                            </div>
                        </div>

                        <div class="page_box">
                            <div class="sep_box">

                                <input type="hidden" name="retailer_id" id="retailer_id" value="<?php echo $this->session->userdata('popcoin_login')->s_admin_id; ?>" />
                                <div class="col-lg-12">                                 
                                    <div class="row">
                                        <div class="sep_box">
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Select Store<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <select name="s_admin_id" id="s_admin_id" onchange="return selectResdetails();">
                                                                <option value="">-- Select Store --</option>
                                                                <?php foreach($vieww as $val) { ?>
                                                                <option value="<?php echo $val->store_id; ?>"><?php echo $val->s_name; ?></option>
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
                                                            <select name="offertype_id" id="offertype_id" onchange="return selectResdetails();">
                                                                <option value="">-- Select Deal Type --</option>
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
                                                                <option value="<?php echo $val->categorydeal_id; ?>"><?php echo $val->categorydeal_name; ?></option>
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
                                                        <div class="tbl_text"> Tagline </div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <input type="text" name="tagline" id="tagline" value="" />
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
                                                        <div class="tbl_text" >Cost In Popcoins <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            
                                                            <input type="text" name="cosinpopcoins" value="" placeholder="Enter Popcoins Point"/>
                                                            
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
                                                            
                                                            <input type="text" name="commission" value="" placeholder=""/>
                                                            
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>                                        
                                        </div>                                  
                                    </div>
                                </div>  


                                <div id="showhide_div">
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
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="o_end_date" class="date end" />
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
                                                            <input type="radio" name="o_offer_type" value="1" /> Fully
                                                            <input type="radio" name="o_offer_type" value="2" /> Partially
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>                                        
                                        </div>                                  
                                    </div>
                                </div>  

                               


                                <div class="timediv" style="display:none;">
                                <div class="col-lg-12">                                 
                                    <div class="row">
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text" >Start Time <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="o_start_time" autocomplete="off" class="time start ui-timepicker-input" />
                                                        </div>
                                                    </div>                                           
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text" >End Time <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="o_end_time" autocomplete="off" class="time start ui-timepicker-input" />
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
                                                        <div class="tbl_text" >Start Time (Slot 2 optional) </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="o_start_timeopt" autocomplete="off" class="time start ui-timepicker-input" />
                                                        </div>
                                                    </div>                                           
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text" >End Time (Slot 2 optional) </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="o_end_timeopt" autocomplete="off" class="time start ui-timepicker-input" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="newdays"></div>

                               <!--  <div class="col-lg-12">
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
                                </div>   -->
                                <!-- <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                           
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Provide Food Delivery <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <input type="radio" name="o_fooddelivery" value="1" /> Yes
                                                            <input type="radio" name="o_fooddelivery" value="0" /> No
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
                                <!-- <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                        
                                            <div class="col-lg-4">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text" >Advertisement Name I <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="comp_ad_name1" id="comp_ad_name1" />
                                                        </div>
                                                    </div>                                      
                                                </div>
                                            </div>  
                                            <div class="col-lg-4">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text" >URL <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="company_ad_url1" id="company_ad_url1" />
                                                        </div>
                                                    </div>                                      
                                                </div>
                                            </div> 
                                            <div class="col-lg-4">
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
                                </div> -->
                                <!-- <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                        
                                            <div class="col-lg-4">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text" >Advertisement Name II <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="comp_ad_name2" id="comp_ad_name2" />
                                                        </div>
                                                    </div>                                      
                                                </div>
                                            </div>  
                                            <div class="col-lg-4">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text" >URL <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="company_ad_url2" id="company_ad_url2" />
                                                        </div>
                                                    </div>                                      
                                                </div>
                                            </div>  
                                            <div class="col-lg-4">
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
                                </div> -->
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                        
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Product Image </div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <input type="file" name="o_menu" id="o_menu" />
                                                        </div>
                                                    </div>                                      
                                                </div>
                                            </div>                                             
                                        </div>
                                    </div>
                                </div>
                               <!--  <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                           
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Need to generate voucher? <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <input type="radio" name="o_isVoucher" value="1" /> Yes
                                                            <input type="radio" name="o_isVoucher" value="0" /> No
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>                                        
                                        </div>                                  
                                    </div>
                                </div>   -->
                              <!--   <div id="vouchercode_div" style="display:none;"> -->
                                <!-- <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                           
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Voucher code prefix <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <input type="text" name="o_voucherPrefix" />                                                           
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>                                        
                                        </div>                                  
                                    </div>
                                </div>   -->
                                <!-- <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                           
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Voucher code suffix </div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <input type="text" name="o_voucherSuffix" />
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>                                        
                                        </div>                                  
                                    </div>
                                </div>   -->
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                        
                                            <div class="col-lg-12">
                                                <div class="row ">
                                                    <div class="col-lg-2">
                                                        <div class="tbl_text" >Deal Description </div>
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


           // alert(data); return false;
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



  function retailerstore(){
     var retailerid = $('#retailer_id').val();
     $.ajax({
        url: '<?php echo base_url(); ?>admin/offer/retailerstore',
        type: 'POST',
       
        data: {'retailerid': retailerid},
        success: function(data){
      //alert(data); return false;
            var  option_brand = '<option value="">Select Store</option>';
            $('#s_admin_id').empty();
            $("#s_admin_id").append(option_brand+data);
           
         }
  });
    
   }
</script>   


