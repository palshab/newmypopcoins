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
                <form action="" id="vendorForm" method="post" enctype="multipart/form-data" >
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>View Retailer</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can view retailer details!
                                    </p>
                            </div>
                        </div>

                     

                       <div class="page_box">
                            <div class="sep_box">
                                <div class="col-lg-12">
                                    <div class="row">
                                     
                                     <div class="sep_box">
                                            

                                     

                                                <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Company Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->s_username ; ?></div>
                                                            <!-- <input type="hidden" name="s_username" value="<?php echo $vieww->s_username; ?>" id="s_username" readonly /> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                              <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Email ID <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->s_loginemail; ?></div>
                                                            <!-- <input id="s_loginemail" value="<?php echo $vieww->s_loginemail; ?>" type="text" name="s_loginemail" readonly /> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                    </div>

                            <div class="sep_box">
                                            
                                         


                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Alternate Email Id</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->alertnatemail_id; ?></div>
                                                           <!--  <input id="Alternateemailid"  value="<?php echo $vieww->alertnatemail_id; ?>" type="text" name="Alternateemailid" /> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                             <!--<div class="col-lg-6">
                                               


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Select Country <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="countryid" id="countryid" onchange="selectstates();">
                                                             <option value="">select Country</option>
                                                             <?php foreach ($vieww1 as $key => $value) { 
                                                             ?>
                                                            <option <?php if($vieww->country_id==$value->conid){ echo "selected"; } ?> value="<?php echo $value->conid; ?>"><?php echo $value->name; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                     </div>


                                                </div>
                                            </div>-->
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Contact Number <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->contact_no; ?>
                                                          </div>
                                                            <!-- <input type="text" value="<?php echo $vieww->contact_no; ?>"   name="s_mobileno" id="s_mobileno" /> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        
                                        
                                           
                                             
                                              <div class="sep_box">
                                                 <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">State Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->statename; ?>
                                                          </div>
                                                         <!--  <select id="stateid" name="stateid" onchange="selectcity()" value="stateid">
                                                             <option value="">Select State</option>
                                                             <?php
                                                             foreach ($state as $key => $statevalue) {
                                                      

                                                             ?>
                                                             <option <?php if($statevalue->stateid==$vieww->state_id){ echo "selected"; } ?>  value="<?php echo $statevalue->stateid; ?>">
                                                             <?php echo $statevalue->statename; ?></option>

                                                             <?php  } ?>
                                                             </select> -->
                                                        </div>
                                                     </div>


                                                </div>
                                            </div>
                                         <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">City Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->cityname; ?>
                                                          </div>
                                                            <!-- <select class="cityname" id="cityname" name="cityname" onchange="selectlocation()" >
                                                             
                                                            <?php
                                                            foreach ($cityview as $key => $value1) {
                                                            
                                                            

                                                            ?>
                                                             <option value="<?php echo $value1->cityid; ?>">
                                                             <?php echo $value1->cityname;?>
                                                             </option>
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
                                                        <div class="tbl_text">Location<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->location; ?>
                                                          </div>

                                                             <!-- <select class="cityname" id="cityname" name="cityname" >
                                                             
                                                            <?php
                                                            foreach ($viewlocation as $key => $value2) {
                                                            
                                                            

                                                            ?>
                                                             <option value="<?php echo $value2->streetid; ?>">
                                                             <?php echo $value2->location;?>
                                                             </option>
                                                             <?php } ?>
                                                             </select> -->


                                                           <!-- <input type="text" name="location" value="<?php echo $vieww->location; ?>" id="location" > -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Pincode <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->pincode; ?>
                                                          </div>
                                                           <!-- <input type="text" value="<?php echo $vieww->pincode; ?>" name="pincode"  id="pincode" > -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                                                             
                                            </div>


                                            <div class="sep_box">
                                            <!-- <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Company Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" readonly="readonly" name="companyname" 
                                                           value="<?php echo $vieww->company_name; ?>" id="companyname" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Owner Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->ownder_name; ?>
                                                          </div>
                                                           <!-- <input type="text" readonly="readonly" name="owndername" value="<?php echo $vieww->ownder_name; ?>" id="owndername" > -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Store Contact Number<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->store_name; ?>
                                                          </div>
                                                              <!-- <input type="text" name="storename" value="<?php echo $vieww->store_name; ?>" id="storename" > -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 

                                                
                                            </div>





                                            <div class="sep_box">
                                            <!-- <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Owner Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" readonly="readonly" name="owndername" value="<?php echo $vieww->ownder_name; ?>" id="owndername" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Company Address<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->Company_Address; ?>
                                                          </div>
                                                           <!-- <input type="text" name="companyaddress" value="<?php echo $vieww->Company_Address; ?>" id="companyaddress" > -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">PAN Card No</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php if($vieww->pan_card_no=="1"){  echo $vieww->pan_card_value; } else { echo "Not Collected"; } ?>
                                                          </div>
                                                              <!-- <input type="radio" <?php if($vieww->pan_card_no=="1"){ echo "checked"; } ?> name="pancard" value="1" id="pancard" >Collected
                                                               <input type="radio" <?php if($vieww->pan_card_no=="0"){ echo "checked"; } ?> name="pancard" value="0" id="pancard" >Not Collected  -->
                                                        </div>
                                                        <!-- <div class="tbl_input" id="retailerpancard_div" style="display:none;">
                                                            <input type="text" readonly="readonly" value="<?php echo $vieww->pan_card_value; ?>" name="retailerpancard_div" />
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>

                                                
                                            </div>


                                              <div class="sep_box">
                                            <!-- <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Company Address<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" name="companyaddress" value="<?php echo $vieww->Company_Address; ?>" id="companyaddress" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Agreement Signed Date<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->aggre_sing_date; ?>
                                                          </div>
                                                             <!-- <input type="text" readonly="readonly"  name="agrementsigndate" 
                                                             value="<?php echo $vieww->aggre_sing_date; ?>" id="agrementsigndate"> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Service Tax No</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php if($vieww->service_tax_no=="1"){  echo $vieww->service_tax_value; } else { echo "Not Collected"; } ?>
                                                          </div>
                                                             <!-- <input type="radio" <?php if($vieww->service_tax_no=="1"){ echo "checked"; } ?>  name="servicetax" value="1" id="servicetax">Collected 
                                                               <input type="radio" <?php if($vieww->service_tax_no=="0"){ echo "checked"; } ?> name="servicetax" value="0" id="servicetax" >Not Collected  -->
                                                        </div>
                                                       <!--  <div class="tbl_input" id="retailerservice_div" style="display:none;">
                                                            <input type="text" readonly="readonly" value="<?php echo $vieww->service_tax_value; ?>" name="retailerservice_div" />
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>

                                                
                                            </div>

                                            <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Document Received Date<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <div class="top"><?php echo $vieww->document_rec_date; ?>
                                                          </div>
                                                              <!--  <input type="text" readonly="readonly" value="<?php echo $vieww->document_rec_date; ?>"  name="docrecdate" /> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Retailer Enrollment Date
                                                        <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <div class="top"><?php echo $vieww->ratiler_enrol_date; ?>
                                                          </div>
                                                              <!-- <input type="text" readonly name="retailerrenroldate" 
                                                              value="<?php echo $vieww->ratiler_enrol_date; ?>" id="retailerrenroldate" > -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="sep_box">
                                            <!-- <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Agreement Signed Date<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                             <input type="text" readonly="readonly"  name="agrementsigndate" 
                                                             value="<?php echo $vieww->aggre_sing_date; ?>" id="agrementsigndate">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Profile Pic</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           
                                                           <img height="50px;" withd="50px;" src="<?php echo  base_url(); ?>assets/images/<?php echo $vieww->profile_pic;  ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             
                                            </div>



                                            <div class="sep_box">

                                                <fieldset>
                                            <legend>RAM</legend>
                                            
                                             <div class="sep_box">



                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">RAM<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                                                                                     
                                                            <!-- <input type="text" name="ramname" value="<?php if($value2->s_admin_id==$vieww->ramemp_id){ echo "$value2->s_username;"; } ?>" id="ramname"> -->
                                                            <div class="top"><?php echo $vieww->name; ?>
                                                          </div>
                                                        
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
                                                        <div class="top"><?php echo $vieww->ramempid; ?>
                                                          </div>
                                                       <!-- <input type="text" name="ramemployeeid" value="" id="ramemployid" readonly >   -->
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>



                                            <div class="sep_box">



                                             <!-- <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text"> Branch Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                       
                                                        
                                                            <input type="text" readonly name="rambranckbankname" value="<?php echo $vieww->ram_bank_name; ?>" id="accountholders"> 
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Contact No<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->contactno; ?>
                                                          </div>
                                                            <!-- <input type="text" readonly name="ramcontactno" value="<?php echo $vieww->ram_contact_no; ?>" value="" id="ramcontno">  -->
                                                        
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
                                                          <div class="top"><?php echo $vieww->officialid; ?>
                                                          </div>
                                                             <!-- <input type="text" readonly name="ramofficialid" value="<?php echo $vieww->ram_official_id; ?>" id="officialid">  -->
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            </div>
                                              <div class="sep_box">

                                            <!-- <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Contact No<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" readonly name="ramcontactno" value="<?php echo $vieww->ram_contact_no; ?>" value="" id="ramcontno"> 
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->


                                           


                                            
                                            



                                            </div>
                                            </fieldset>

                                            </div>


                                            
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
                                                          <div class="top"><?php echo $vieww->account_h_name; ?>
                                                          </div>
                                                             <!-- <input type="text" readonly="readonly" value="<?php echo $vieww->account_h_name; ?>" name="accountholder"  id="accountholder"> -->


                                                          
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
                                                        <div class="top"><?php echo $vieww->account_h_number; ?>
                                                          </div>
                                                          <!-- <input type="text" readonly="readonly" value="<?php echo $vieww->account_h_number; ?>" name="accountnumber" id="accountnumber"> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="sep_box">
                                           
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">IFSC code<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <div class="top"><?php echo $vieww->ifsc_code; ?>
                                                          </div>
                                                          <!-- <input type="text" readonly="readonly" value="<?php echo $vieww->ifsc_code; ?>" name="ifscode" id="ifscode"> --> 
                                                           
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
                                                        <div class="top"><?php echo $vieww->bank_details; ?>
                                                          </div> 
                                                            
                                                        <!--  <input type="text" readonly="readonly" value="<?php echo $vieww->bank_details; ?>" name="bankname" id="bankname"> -->
                                                         

                                                          

                                                           
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
                                                        <!--     
                                                         <input type="text" readonly="readonly" value="<?php echo $vieww->branch_name; ?>" name="branchname" id="branchname"> -->
                                                         

                                                          

                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            </div>
                                             
                                            </fieldset>



                                            </div>

                                            


                                            <!-- <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Document Received Date<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                               <input type="text" readonly="readonly" value="<?php echo $vieww->document_rec_date; ?>"  name="docrecdate" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Retailer Enrollment Date
                                                        <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                              <input type="text" readonly name="retailerrenroldate" 
                                                              value="<?php echo $vieww->ratiler_enrol_date; ?>" id="retailerrenroldate" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div> -->

                                            <!-- <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Agreement Signed Date<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                             <input type="text" readonly="readonly"  name="agrementsigndate" 
                                                             value="<?php echo $vieww->aggre_sing_date; ?>" id="agrementsigndate">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Profile Pic</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="file" name="fileToUpload" id="fileToUpload">
                                                           <img height="50px;" withd="50px;" src="<?php echo  base_url(); ?>assets/images/<?php echo $vieww->profile_pic;  ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             
                                            </div> -->



                                                                                                                

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

    $(function(){
    $("input[name=pancard]").click(function() {    

   
        var val = $("input[name=pancard]:checked").val();
        if(val==1) {
            $("#retailerpancard_div").show();
        } else {
            $("#retailerpancard_div").hide();
        }
    });
});

    $(function(){
    $("input[name=servicetax]").click(function() {    

   
        var val = $("input[name=servicetax]:checked").val();
        if(val==1) {
            $("#retailerservice_div").show();
        } else {
            $("#retailerservice_div").hide();
        }
    });
});


</script>  












<script type="text/javascript">
  $(document).ready(function(){
    $("#vendorForm").validate({
          // Specify the validation rules
          rules: {
              retailer_type: "required",
              s_username : "required",
              outlet_name : "required",
              //managers_name: "required",
              //brand_name: "required",
              //monthly_billing : "required",
              //acc_h_name : "required",
              //p_card_number : "required",
              //s_IfsoCode : "required",
              //pday_week : "required",
              //s_Beneficeryac_no : "required",
              //s_Bankname : "required",
              //s_Bankaddress : "required",
              //weekly_of : "required",
              //n_billing_month : "required",
              //s_tin_number : "required",
              //s_Taxnumber : "required",
            //pincode : {required:true,number:true},
              s_loginemail : {required:true, email:true},
              s_mobileno :  {required:true, number:true},
              //co_no_outlet : {required:true,number:true},
              s_loginpassword : "required"
          },
          
          messages: {
            retailer_type : "Please enter Type name!",
              s_username : "Please enter vendor name!",
              outlet_name : "please enter outletname!",
              //managers_name : "please enter manager name!",
              //brand_name : "please enter brand name!",
              //monthly_billing : "please enter monthly billing!",
              //acc_h_name : "please enter Account Holders name!",
              //p_card_number : "please enter pan card number!",
              //s_IfsoCode : "please enter valid Code!",
              //pday_week : "please enter Peek Days of the Week!",
              //s_Beneficeryac_no : "please enter Beneficiary Account Number!",
              //s_Bankname : "please enter bank name!",
              //s_Bankaddress : "please enter bank Address!",
              //weekly_of : "please enter weekly off!",
              //n_billing_month : "please enter Number of Billings Per Month!",
              //s_tin_number : "please enter valid TIN Number!",
              //s_Taxnumber : "please enter valid TAX Number!",
              //pincode : {required:"please enter pincode", number:"Numbers only"},
              s_loginemail : {required:"Please enter email ID!", email:"Please enter valid email ID!"},
              s_mobileno : {required:"Please enter contact number!", number:"Numbers only!"},
              //co_no_outlet : {required:"please enter contect outlet Numbers",number:"Numbers only!"},
              s_loginpassword : "Please enter vendor password!"
              
          },
          
          submitHandler: function(form) {
            form.submit();
          }
      });
   });

function checkname(){
     var name=$('#couname').val();
      $.ajax({
        url: '<?php echo base_url()?>admin/geographic/checkname',
        type: 'POST',
        dataType: 'json',
        data: {'name': name},
        success: function(data){

        if(data[0].count > 0){
          $('#submitBtn').prop('disabled', 'disabled');
          alert("Data Already Existed");
        }else{
          $('#submitBtn').removeAttr('disabled');
        }      
         }
  });
    
   }
   




    function selectstates(){
     var countryid=$('#countryid').val();
     $.ajax({
        url: '<?php echo base_url()?>admin/geographic/countrystate',
        type: 'POST',
        //dataType: 'json',
        data: {'countryid': countryid},
        success: function(data){
        var  option_brand = '<option value="">Select State</option>';
        $('#stateid').empty();
        $("#stateid").append(option_brand+data);
           
         }
  });
    
   }

   function selectcity(){
     var stateid = $('#stateid').val();

     //alert(stateid); return false;
     $.ajax({
        url: '<?php echo base_url()?>admin/geographic/countrycity',
        type: 'POST',
       
        data: {'stateid': stateid},
        success: function(data){
     

        var  option_brand = '<option value="">Select city</option>';
        $('#cityname').empty();
        $("#cityname").append(option_brand+data);
           
         }
  });
    
   }

   function selectlocation(){
     var cityid = $('#cityid').val();

     //alert(stateid); return false;
     $.ajax({
        url: '<?php echo base_url()?>admin/geographic/countrylocation',
        type: 'POST',
       
        data: {'cityid': cityid},
        success: function(data){
     

        var  option_brand = '<option value="">Select city</option>';
        $('#location').empty();
        $("#location").append(option_brand+data);
           
         }
  });
    
   }

</script>

<script type="text/javascript">

function selectstates(){
     var countryid=$('#countryid').val();
     $.ajax({
        url: '<?php echo base_url()?>admin/geographic/countrystate',
        type: 'POST',
        //dataType: 'json',
        data: {'countryid': countryid},
        success: function(data){
        var  option_brand = '<option value="">Select State</option>';
        $('#stateid').empty();
        $("#stateid").append(option_brand+data);
           
         }
  });
    
   }
</script>

<!-- <script type="text/javascript">      
    $(document).ready(function(){
      var maxField = 1000; //Input fields increment limitation
      var addButton = $('.add_row'); //Add button selector
      var wrapper = $('.append_wrapper'); //Input field wrapper
      var x = 1; //Initial field counter is 1
     
      $(addButton).click(function(){ 
        if(x < maxField){
            x++; 
            $(".append_wrapper").clone().removeClass("append_wrapper").appendTo(".append");
        }
      });
      $(wrapper).on('click', '.remove_row', function(e){ //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
      });
    });
</script> -->

<script type="text/javascript">
  $(document).ready(function() {
        $( "#state_id" ).change(function() {
              var state_id = $("#state_id").val();
              $.ajax({
              url: '<?php echo base_url(); ?>admin/restaurant/appendcities',
              type: 'POST',
              data: {'state_id':state_id},
              success: function(data){
                    $('#city_id').html(data);  
              }
              });
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
        $( "#country_id" ).change(function() {
              var country_id = $("#country_id").val();
              $.ajax({
              url: '<?php echo base_url(); ?>admin/restaurant/appendstates',
              type: 'POST',
              data: {'country_id':country_id},
              success: function(data){
                    $('#state_id').html(data);  
              }
              });
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
        $( "#city_id" ).change(function() {
              var city_id = $("#city_id").val();
              $.ajax({
              url: '<?php echo base_url(); ?>admin/restaurant/appendstreets',
              type: 'POST',
              data: {'city_id':city_id},
              success: function(data){
                    $('#street_id').html(data);  
              }
              });
      });
  });
</script>


<script type="text/javascript">
    $("#selecctall").click(function () {
      $('.chkApp').each(function() { //loop through each checkbox
        $(this).prop('checked',$('#selecctall').prop("checked"));  //select all checkboxes with class "checkbox1"               
      });
    });

$('.storeupdate').click(function(){
  var sub=false;
    $('.chkApp').each(function() { 
          if(this.checked)
           sub=true;
        });
if(sub==true)
  $('#vendorForm').submit();
else
  alert('Please select atleast one');
return false;
});

function ramemployee(){
     var ramid = $('#ramname').val();

       
        
     $.ajax({
        url: '<?php echo base_url()?>admin/adminvender/getraminfo',
        type: 'POST',
        dataType: 'json',
        data: {'ramid': ramid},
        success: function(data){
            
            $("#ramemployid").val(data.e_employeid);
            $("#rambranckbankname").val('brannname');
            $("#officialid").val(data.s_loginemail);
            $("#ramcontno").val(data.contact_no);
            //

            //
            //alert(data);
        
           
         }
  });
    
   }

</script>