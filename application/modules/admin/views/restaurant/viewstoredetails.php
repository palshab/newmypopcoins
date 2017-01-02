
<?php
/*foreach(@$storemaping as $val) {




    $day_array[] = $val->s_dayname;
    $start_array[] = $val->s_starttime;
    $end_array[] = $val->s_endtime;
    $startopt_array[] = $val->s_secondstarttime;
    $endopt_array[] = $val->s_secondendtime;
}
@$combined_start = array_combine($day_array, $start_array);
@$combined_end = array_combine($day_array, $end_array);
@$combined_startopt = array_combine($day_array, $startopt_array);
@$combined_endopt = array_combine($day_array, $endopt_array);*/
?>


<!DOCTYPE html>
<html>
<style type="text/css">
.top{
  padding-top: 10px;
}
</style>
<body>
    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>View Store</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can view store details!
                                    </p>
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
                                                          <div class="top"><?php echo $vieww->s_name ; ?></div>
                                                            <!--  <input id="r_res_name" type="text" name="storename" value="<?php echo $vieww->s_name;?>" /> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                         
                                            <!-- <div class="col-lg-6">                                             
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Select Country <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="country_id" id="country_id" onchange="selectstates();">
                                                              <option value="">-- Select Country --</option>
                                                             <?php foreach ($countries as $key => $value) { ?>
                                                          <option <?php if($vieww->s_storecountryid==$value->conid){ echo "selected"; }  ?> value="<?php echo $value->conid; ?>"><?php echo $value->name; ?></option>
                                                           <?php } ?>
                                                               </select>
                                                        </div>                                                   
                                                    </div>
                                                </div>
                                            </div>    -->

                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">State <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->statename; ?>
                                                          </div>
                                                            <!-- <select id="state_id" name="state_id" onchange="selectcities();">
                                                            
                                                             <?php foreach ($state as $key => $value) {
                                                                 # code...
                                                              ?>
                        
                        <option <?php if($value->stateid==$vieww->state_id){ echo "selected"; } ?>  value="<?php echo $value->stateid; ?>">
                                                             <?php echo $value->statename; ?></option>
                                                              <?php } ?>
                                                            </select> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="sep_box">
                                           
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">City <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->cityname; ?>
                                                          </div>
                                                          <!-- <select id="city_id" name="city_id">
                                                              <?php foreach ($city as $key => $value1) {
                                                               
                                                              ?>
                        <option value="<?php echo $value1->cityid ?>"><?php echo $value1->cityname; ?></option>
                                                              <?php } ?>
                                                             </select> -->
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                            </div>   

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Location <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->location; ?>
                                                          </div>
                                                          <!-- <select id="location_id" name="location_id">
                                                              <?php foreach ($location as $key => $value2) {
                                                               
                                                              ?>
                        <option value="<?php echo $value2->streetid ?>"><?php echo $value2->location; ?></option>
                                                              <?php } ?>
                                                             </select> -->
                                                        </div>

                                                      
                                                  

                                                    </div>


                                                </div>
                                            </div>


                                        </div>
                                        <div class="sep_box">                                       
                                            

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Date of Agreement </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->s_dateaggrement; ?>
                                                          </div>
                                                            <!--  <input type="text" value="<?php echo $vieww->s_dateaggrement; ?>" name="dateofagrement" class="date start" /> -->

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Address <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->s_storeaddress; ?>
                                                          </div>
                                                          <!-- <textarea name="storeaddress"><?php echo $vieww->s_storeaddress;?></textarea> -->  
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                            </div>



                                            <!-- <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                         <div class="tbl_text">Store Manager <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="managerid">
                                                            <?php foreach ($manager as $key => $value) {?>
                                                                <option value="<?php echo $value->s_admin_id; ?>"><?php echo $value->s_username; ?></option>
                                                                <?php } ?>
                                                          </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="sep_box">                                       
                                            <!-- <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Contact Number <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                               <input id="contactno" style="text-transform:lowercase;" type="text" name="contactno" value="<?php echo $vieww->s_contactno;?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  -->

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Store Contact No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->s_storeno; ?>
                                                          </div>
                                                                <!--  <input id="storeno" style="text-transform:lowercase;" type="text" name="storeno" value="<?php echo $vieww->s_storeno;?>" /> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Store Type <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->store_type; ?>
                                                          </div>
                                                          <!--  <select name="storetype" class="selectpicker" data-live-search="true">
                                                               
                                                               <?php 
                                                               foreach ($storetype as $key => $value) {
                                                                
                                                               
                                                               ?>


                                                               <option <?php if($value->store_id==$vieww->s_storetypeid){ echo "selected"; } ?>  value="<?php echo $value->store_id; ?>"><?php echo $value->store_type; ?></option>
                                                               <?php } ?>
                                                           </select> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                             <!-- <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Email id <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                            <div class="tbl_input">
                                                                <input id="emailid" style="text-transform:lowercase;" type="text" name="emailid" value="<?php echo $vieww->s_emailid;?>" readonly />            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  -->                                        
                                        </div>
                                        <div class="sep_box">
                                       
                                              <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Service Tax No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php if($vieww->s_servicetaxno=="1"){  echo $vieww->s_service_value; } else { echo "Not Collected"; } ?>
                                                          </div>
                                                             <!-- Collected 
                                                            <input id="checkbox" value="1" style="text-transform:lowercase;" 
                                                            type="radio" name="sservicetaxno" <?php if($vieww->s_servicetaxno=='1') { echo "checked"; } ?> />

                                                            Not Collected    
                                                            <input id="checkbox" value="0" style="text-transform:lowercase;" 
                                                            type="radio" name="sservicetaxno" <?php if($vieww->s_servicetaxno=='0') { echo "checked"; } ?> /> -->



                                                        </div>
                                                        <!-- <div class="tbl_input" id="service_div" style="display:none;">
                                                            <input type="text" value="<?php echo $vieww->s_service_value;?>" name="s_servicetaxno_val" />
                                                        </div> -->
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
                                                          <div class="top"><?php if($vieww->s_samplecopy=="1"){  echo "Collected"; } else { echo "Not Collected"; } ?>
                                                          </div>
                                                         <!-- Collected
                                                            <input id="samplebillcopy"  value="1" 
                                                            style="text-transform:lowercase;" type="radio" 
                                                            name="samplebillcopy" <?php if($vieww->s_samplecopy=='1') { echo "checked"; } ?> />
                                                          Not Collected
                                                            <input id="samplebillcopy" value="0" style="text-transform:lowercase;" 
                                                            type="radio" name="samplebillcopy" <?php if($vieww->s_samplecopy=='0') 
                                                            { echo "checked"; } ?> /> -->
                                                        </div>

                                                        <!-- <div class="tbl_input" id="sample_bill_copy" style="display:none;">
                                                            <input type="text" value="<?php echo $vieww->s_samplecopy_value;?>" name="samplebillcopyvalue" />
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                             


                                            </div>
                                       
                                        <div class="sep_box">                                      
                                            <!-- <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Visiting Card<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         Collected
                                                            <input id="visitingcard"
                                                            <?php if($vieww->s_visitingcard=='1') { echo "checked"; } ?>
                                                             style="text-transform:lowercase;" type="radio" name="visitingcard" value="1" />


                                                        Not Collected
                                                            <input id="visitingcard"
                                                            <?php if($vieww->s_visitingcard=='0') { echo "checked"; } ?>
                                                             style="text-transform:lowercase;" type="radio" name="visitingcard" value="0" />  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  --> 

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Tin No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php if($vieww->s_tinno=="1"){  echo $vieww->s_tinno_value; } else { echo "Not Collected"; } ?>
                                                          </div>
                                                            <!-- Collected 
                                                            <input id="tinno" value="1" 
                                                             style="text-transform:lowercase;" 
                                                            type="radio" name="stinno" <?php if($vieww->s_tinno=='1') { echo "checked"; } ?> /> 

                                                               Not Collected
                                                            <input id="tinno" <?php if($vieww->s_tinno=='0') 
                                                            { echo "checked"; } ?> value="0" style="text-transform:lowercase;" type="radio" name="stinno" /> -->
                                                        </div>

                                                         <!-- <div class="tbl_input" id="tin_div" style="display:none;">
                                                            <input type="text" value="<?php echo $vieww->s_tinno_value;?>" name="tinnovalue" />
                                                        </div> -->
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
                                                          <div class="top"><?php echo $vieww->s_pancardno; ?>
                                                          </div>
                                                           <!-- <input id="pancardno" value="<?php echo $vieww->s_pancardno;?>"  type="text" name="spancardno" /> -->
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
                                                          <div class="top"><?php echo $vieww->s_dealcommision; ?>
                                                          </div>
                                                         <!-- <input type="text" name="s_dealcommision" value="<?php echo $vieww->s_dealcommision; ?>">  -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Cashback Percentage</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input"> 
                                                          <div class="top"><?php echo $vieww->s_cashbackper; ?>
                                                          </div>
                                                         <!-- <input type="text" name="s_cashbackper" value="<?php echo $vieww->s_cashbackper; ?>"> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                            
                                        </div>

                                        <div class="sep_box">  
                                          <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Store Picture/Company Logo<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <img height="50px;" width="50px;" src="<?php echo base_url(); ?>public/<?php echo $vieww->s_storeimg; ?>">
                                                         <!-- <input type="hidden" name="s_storeimg" value="<?php echo $vieww->s_storeimg; ?>">
                                                         <input type="file" name="o_menu2"  
                                                         value="<?php echo $vieww->s_storeimg; ?>" > -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>   

                                        <!-- <fieldset>
                                            <legend>Ram</legend>
                                            
                                             <div class="sep_box">



                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Select Ram<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                       
                                                        
                                                            <select  name="ramname">
                                                                
                                                                <option value="0">Select Ram</option>
                                                                <option value="1">ram1 </option>
                                                                <option value="2">ram2 </option>
                                                                <option value="3">ram3 </option>
                                                                <option value="4">ram4 </option>
                                                            </select>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">RAM Employee ID<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                       <input type="text" name="ramemployeeid" value="" id="ramemployid">  
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>



                                            <div class="sep_box">



                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text"> Branch Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                       
                                                        
                                                            <input type="text" name="rambranckbankname" value="" id="accountholders"> 
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Official ID<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                             <input type="text" name="ramofficialid" value="" id="officialid"> 
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            </div>
                                              <div class="sep_box">

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Contact No<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="ramcontactno" value="" id="ramcontno"> 
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                           


                                            
                                            



                                            </div>
                                            </fieldset> -->




                                        <div class="sep_box">


                                            <fieldset>
                                        <legend>Bank Details</legend>
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        
                                                        <div class="tbl_text">
                                                          Account Holder Name
                                                        <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->accholder_name; ?>
                                                          </div>
                                                            
                                                             <!--  <input id="accholdername" style="text-transform:lowercase;" type="text" value="<?php echo  $vieww->accholder_name; ?>" name="accholdername" /> -->


                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Account Number<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <div class="top"><?php echo $vieww->acc_number; ?>
                                                          </div>


                                                            
                                                           <!--  <input id="acc_number" style="text-transform:lowercase;" type="text" value="<?php echo  $vieww->acc_number?>" name="acc_number" /> -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                             <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">IFSC Code<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->ifsc_code; ?>
                                                          </div>

                                                            <!-- <input value="<?php echo  $vieww->ifsc_code; ?>" id="ifsc_code" style="text-transform:lowercase;" type="text" name="ifsc_code" /> -->
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Bank Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         <div class="top"><?php echo $vieww->bank_name; ?>
                                                          </div> 
                                                            
                                                          <!-- <input id="bank_name" style="text-transform:lowercase;" type="text" name="bank_name" value="<?php echo  $vieww->bank_name ?>" /> -->
                                                         

                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="sep_box">
                                            
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Branch Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         <div class="top"><?php echo $vieww->branch_name; ?>
                                                          </div> 
                                                            
                                                          <!-- <input id="branch_name" style="text-transform:lowercase;" type="text" name="branch_name" value="<?php echo  $vieww->branch_name ?>" /> -->
                                                         

                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                             
                                            </fieldset>



                                        </div>

                                        <div class="sep_box">
                                            
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Category <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->categorydeal_name; ?>
                                                          </div>

                                                             <!-- <select name="categoryid">
                                                                 <?php 
                                                                 foreach ($category as $key => $value) {
                                                                     # code...
                                                                 

                                                                 ?>
                                                                    <option <?php if($vieww->s_categoryid==$value->categorydeal_id){ echo "selected"; } ?> value="<?php echo $value->categorydeal_id ;?>"><?php echo $value->categorydeal_name; ?></option>
                                                                 <?php } ?>
                                                             </select> -->

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                          <div class="col-lg-12"><div class="row"><div class="sep_box"><div class="col-lg-2"><strong>S.No.</strong></div><div class="col-lg-2"><div class="tbl_input"><strong>Store Day</strong></div></div><div class="col-lg-2"><div class="tbl_input"><strong>Start Time</strong></div></div><div class="col-lg-2"><div class="tbl_input"><strong>End Time</strong></div></div><div class="col-lg-2"><div class="tbl_input"><strong>Start Time (Slot 2)</strong></div></div><div class="col-lg-2"><div class="tbl_input"><strong>End Time (Slot 2)</strong></div></div></div></div></div>
                                          <?php 
                                          $c = 0;
                                        
                                         foreach ($mappings as $key => $value) { 
                                          $c++;
                                              # code...                                          
          
                                               
                                                        if($value->s_dayname==0){
                                                            $day = 'Monday';
                                                        } else if($value->s_dayname==1) {
                                                            $day = 'Tuesday';
                                                        } else if($value->s_dayname==2) {
                                                            $day = 'Wednesday';
                                                        } else if($value->s_dayname==3) {
                                                            $day = 'Thursday';
                                                        } else if($value->s_dayname==4) {
                                                            $day = 'Friday';
                                                        } else if($value->s_dayname==5) {
                                                            $day = 'Saturday';
                                                        } else if($value->s_dayname==6) {
                                                            $day = 'Sunday';
                                                        }

                                          ?>                                      
                                         <div class="col-lg-12"><div class="row"><div class="sep_box"><div class="col-lg-2"><?php echo $c;?></div><div class="col-lg-2"><div class="tbl_input"></div><?php echo $day; ?></div>

                                         <div class="col-lg-2"><div class="tbl_input">
                                          <div class="top"><?php echo $value->s_starttime; ?>
                                                          </div>
                                          <!-- <input type="text" class="time start start_time" 
                                          name="s_starttime_<?php echo $i; ?>" id="s_starttime_<?php echo $i; ?>" 
                                          value="<?php echo @$combined_start[$i];?>" /> -->
                                        </div></div>
                                          <div class="col-lg-2"><div class="tbl_input">
                                            <div class="top"><?php echo $value->s_endtime; ?>
                                                          </div>
                                            <!-- <input type="text" name="s_endtime_<?php echo $i; ?>" id="s_endtime_<?php echo $i; ?>" class="time end end_time" value="<?php echo @$combined_end[$i];?>" /> -->
                                          </div></div>
                                          <div class="col-lg-2"><div class="tbl_input">
                                          <div class="top"><?php echo $value->s_secondstarttime; ?>
                                                          </div>
                                          <!-- <input type="text" class="time start start_timeopt" 
                                          name="s_secondstarttime_<?php echo $i; ?>" id="s_secondstarttime_<?php echo $i; ?>" value="<?php echo @$combined_startopt[$i];?>" /> -->
                                        </div></div>
                                          <div class="col-lg-2"><div class="tbl_input">
                                          <div class="top"><?php echo $value->s_secondendtime; ?>
                                                          </div>
                                          <!-- <input type="text" name="s_secondendtime_<?php echo $i; ?>" value="<?php echo @$combined_endopt[$i];?>"
                                          class="time end end_timeopt" id="s_secondendtime_<?php echo $i; ?>" /> -->
                                        </div></div>
                                        </div></div></div>


                                          <?php  }  ?>

                                            </div>                                        

                                           
                                        <div class="sep_box">                                    
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Training Date</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <div class="top"><?php echo $vieww->s_traningdate; ?>
                                                          </div>
                                                        <!-- <input type="text" class="date" name="s_traningdate" value="<?php echo $vieww->s_traningdate; ?>">  -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Training Given to Name</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->s_traninggivename; ?>
                                                          </div>
                                                         <!-- <input type="text" name="s_traninggivename" 
                                                         value="<?php echo $vieww->s_traninggivename; ?>"> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sep_box">                                     
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Training Given to Number</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->s_traninggivenno; ?>
                                                          </div>
                                                        <!--  <input type="text" name="s_traninggivenno" value="<?php echo $vieww->s_traninggivenno; ?>">  -->
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