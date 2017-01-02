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
                                                             <input id="r_res_name" type="text" name="storename" />
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
                                                           <select name="storetype" class="selectpicker" data-live-search="true">
                                                               
                                                               <?php 
                                                               foreach ($storetype as $key => $value) {
                                                                
                                                               
                                                               ?>


                                                               <option value="<?php echo $value->store_id; ?>"><?php echo $value->store_type; ?></option>
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
                                                           <select id="stateid" onchange="selectcity()"  name="stateid" value="stateid">
                                                              <option value="">-- Select State --</option>
                                                             <?php foreach ($state as $key => $value) { ?>
                                                          <option value="<?php echo $value->stateid; ?>"><?php echo $value->statename; ?></option>
                                                           <?php } ?>
                                                               </select>
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
                                                            <select class="cityname" id="cityname" onchange="selectlocation()" name="cityname" >
                                                             <option value="">Select City</option>
                                                            <?php foreach ($vieww1 as $key => $value) { ?>
                                                            <option value="<?php echo $value->cityid; ?>"><?php echo $value->cityname; ?></option>
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
                                                        <div class="tbl_text">Location<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select class="location" id="location" name="location" >
                                                             <option value="">Select Location</option>
                                                             
                                                             </select>
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
                                                          <textarea onblur="getlongituate()" id="address" name="storeaddress"></textarea>   
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
                                                               <input id="contactno" type="text" name="contactno" />
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
                                                                <input id="emailid" style="text-transform:lowercase;" type="text" name="emailid" />            
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
                                                                 <input id="storeno" type="text" name="storeno" />
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
                                                            <input id="checkbox" value="1" type="radio" name="sservicetaxno" />

                                                            Not Collected    
                                                            <input id="checkbox" value="0" type="radio" name="sservicetaxno" />
                                                        </div>
                                                        <div class="tbl_input" id="service_div" style="display:none;">
                                                            <input type="text" name="s_servicetaxno_val" />
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
                                                           <input id="s_companyname" type="text" name="s_companyname" />
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
                                                           <input id="pancardno" type="text" name="spancardno" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sep_box">                                      
                                                                                        
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Sample Bill Copy<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         Collected
                                                            <input value="1" type="radio" name="samplebillcopy" />
                                                          Not Collected
                                                            <input value="0" type="radio" name="samplebillcopy" />
                                                        </div>
                                                        <div class="tbl_input" style="display:none;" id="sample_div">
                                                            <input type="text" name="s_samplecopy_val" />                                                              
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Tin No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            Collected 
                                                            <input value="1" type="radio" name="tinno" /> 

                                                            Not Collected
                                                            <input value="0" type="radio" name="tinno" />
                                                        </div>
                                                        <div class="tbl_input" id="tin_div" style="display:none;">
                                                            <input type="text" name="s_tinno_val" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

                                                            <input id="accholder_name"  type="text" name="accholder_name" />


                                                          
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
                                                        


                                                            
                                                            <input id="acc_number"  type="text" name="acc_number" />

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
                                                         
                                                            
                                                            <input id="ifsc_code"  type="text" name="ifsc_code" />
                                                         

                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Bank Name and Branch Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         
                                                            
                                                            <input id="bank_name"  type="text" name="bank_name" />
                                                         

                                                           
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
                                                          <div class="tbl_text">Date of Agreement <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">

                                                             <input type="text" name="dateofagrement" class="date start" readonly />

                                                        
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
                                                                    <option value="<?php echo $value->categorydeal_id ;?>"><?php echo $value->categorydeal_name; ?></option>
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


                                          <div class="col-lg-12"><div class="row"><div class="sep_box"><div class="col-lg-1"></div><div class="col-lg-1"><div class="tbl_input"><input type="checkbox" name="s_dayname[]" class="check" value="<?php echo $i;?>" /></div></div><div class="col-lg-2"><div class="tbl_input"><?php echo $day; ?></div></div><div class="col-lg-2"><div class="tbl_input"><input type="text" class="time start start_time" 
                                          name="s_starttime_<?php echo $i; ?>" /></div></div><div class="col-lg-2"><div class="tbl_input"><input type="text" name="s_endtime_<?php echo $i; ?>" class="time end end_time" /></div></div><div class="col-lg-2"><div class="tbl_input"><input type="text" class="time start start_timeopt" name="s_secondstarttime_<?php echo $i; ?>" /></div></div><div class="col-lg-2"><div class="tbl_input"><input type="text" name="s_secondendtime_<?php echo $i; ?>" class="time end end_timeopt" /></div></div></div></div></div>


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
                                                        <input type="text" class="date" name="s_traningdate" readonly /> 
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
                                                         <input type="text" name="s_traninggivename" />
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
                                                         <input type="text" name="s_traninggivenno" /> 
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
                                                         <input type="text" name="s_cashbackper" />
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
                                                         <input type="text" name="s_dealcommision" /> 
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
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <fieldset>
                                             <legend>Manager</legend>
                                            <div class="sep_box">
                                       

                                          
                                               
                                              <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Manager Number <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                               <input id="managername" style="text-transform:lowercase;" type="text" name="managername" />
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


                                             <input id="emailid" style="text-transform:lowercase;" type="text" name="emailid" />            
                                                           
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
                                                               <input id="contactno" style="text-transform:lowercase;" type="text" 
                                                               name="contactno" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">User Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">


                                             <input id="username" style="text-transform:lowercase;" type="text" name="username" />            
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            </div>



                                            <div class="sep_box">
                                       
                                                 
                                           

                                             

                                           
                                             

                                            

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Password <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                               <input id="password" style="text-transform:lowercase;" type="text" name="password" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            



                                            </div>



                                            




                                            <div class="sep_box">
                                       

                                          
                                             

                                            


                                            </div>
                                          
                                              </fieldset>

                                              <div class="sep_box">
                                                

                                              <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Lattitude <!-- <span style="color:red;font-weight: bold;">*</span> --></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                               <input id="lattitude" style="text-transform:lowercase;" type="text" name="lattitude" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                

                                                 <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Logitude<!-- <span style="color:red;font-weight: bold;">*</span> --></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                               <input id="logitude" style="text-transform:lowercase;" type="text" name="logitude" />
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

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
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
        spancardno :{required:true, maxlength:10, minlength:10} ,
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
        spancardno : {required:"pancard is required", maxlength:"10 alphanumeric only!", minlength:"pancard no must be of 10 alphanumeric characters"},
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
function selectcity(){
     var stateid = $('#stateid').val();

     //alert(stateid); return false;
     $.ajax({
        url: '<?php echo base_url()?>admin/geographic/countrycity',
        type: 'POST',
       
        data: {'stateid': stateid},
        success: function(data){
     
           // alert(data);
        var  option_brand = '<option value="">Select city</option>';
        $('#cityname').empty();
        $("#cityname").append(option_brand+data);
           
         }
  });
    
   }

   function selectlocation(){
     var cityid = $('#cityname').val();

     //alert(stateid); return false;
     $.ajax({
        url: '<?php echo base_url()?>admin/geographic/countrylocation',
        type: 'POST',
       
        data: {'cityid': cityid},
        success: function(data){
     

        var  option_brand = '<option value="">Select Location</option>';
        $('#location').empty();
        $("#location").append(option_brand+data);
           
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

function getlongituate()
{



            var geocoder =  new google.maps.Geocoder();
        geocoder.geocode( { 'address': $('#address').val()}, function(results, status) {

            $("#lattitude").val(results[0].geometry.location.lat());

            $("#logitude").val(results[0].geometry.location.lng());
        
        });


}
</script>