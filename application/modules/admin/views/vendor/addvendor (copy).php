
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/i18n/defaults-*.min.js"></script>

<style type="text/css">
 
    #storediv{

        display: none;
    }

    #storelistingdiv{
        display: none;
    }
</style>
<script language='javascript'>
  
 
  $(document).ready(function() {
  
  
    $("#addCont").validate({
        
        rules: {
            statename : "required",
            statecode : "required",
            countryid : "required",
           /* email:{
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            agree: "required" */
        },
        // Specify the validation error messages
        messages: {
            statename: "State name required",
            statecode: "State code required",
            countryid: "Country Id required"
            /*password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Please enter a valid email address",
            agree: "Please accept our policy"*/
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
<!DOCTYPE html>

<html>

<body>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <form action="" id="vendorForm" method="post" enctype="multipart/form-data">
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Add Retailer</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can add Retailer!
                                    <a href="<?php echo base_url();?>admin/vendor/viewvendors"><button type="button" style="float:right;">CANCEL</button></a></p>
                            </div>
                        </div>
                      
                      
 <style>
    .retailer_nav {
        width:100%;
        float:left;
    }
    .retailer_nav ul {
        padding:0;
        margin:0;
    }
    .retailer_nav ul li {
        list-style:none;
        float:left;
    }
    .retailer_nav ul li a {
        display:block;
        float:left;
        padding:10px 20px;
        background:#fff;
        margin-right:5px;
        color:#333;
        text-decoration:none;   
    }
    .active_color {
        background:#2f2f2f !important;
        color:#FFF !important;
    }
    
.retailer_btn {
    outline: none;
    border: 0;
    padding: 10px 25px;
    background: #333;
    color: #FFF;
}   

 .add_btn {
    width: auto;
    height: auto;
    float: right;
    margin-right: 15px;
}
 
   .add_btn a {
       display:block;
       padding:10px 15px;
       background:#d84d28;
       color:#FFF;
       float:left;
       text-decoration:none;
       border-radius:5px;
       
   }
.add_100 {
    width:100%;
    float:left
}
 </style>
 
         
<div class="retailer_nav">
      <ul>
      <?php if($this->uri->segment(4)!='') {
        echo '<style>#storediv{display:block;}#retailerdiv{display:none;}</style>';
            echo '<li><a id="addstorehead" onclick="addretailer()" href="" class="active_color">Add Store</a></li>';
        }else{?>
        <li><a href="#" onclick="backretailer()" id="retailerhead" class="active_color">Retailer</a></li>
        <li><a id="addstorehead" onclick="addretailer()" href="#" >Add Store</a></li>
        <li><a id="addstorelist" href="#" >Listing</a></li>
<?php } ?>
      </ul>
</div>
      
              
              
               
                        <div class="page_box" id="retailerdiv">
                            <div class="sep_box">
                                <div class="col-lg-12">
                                    <div class="row">
                                     
                                     <div class="sep_box">
                                            

                                     

                                                <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text"><!-- Retailer -->Company Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="s_username" id="s_username" />
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
                                                            <input id="s_loginemail" onblur="fillusernamee()" type="text" name="s_loginemail" />
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
                                                            <input id="Alternateemailid" type="text" name="Alternateemailid" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Contact Number <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="s_mobileno" id="s_mobileno" />
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
                                                            <option value="">Select State</option>
                                                            <?php foreach ($vieww as $key => $value) { ?>
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
                                                        <div class="tbl_text">Pincode <!-- <span style="color:red;font-weight: bold;">*</span> --></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" name="pincode"  id="pincode" >
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
                                                           <input type="text" name="companyname" value="" id="companyname" >
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
                                                           <input type="text" name="owndername" value="" id="owndername" >
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
                                                              <input type="text" name="storename" value="" id="storename" >
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
                                                           <input type="text" name="owndername" value="" id="owndername" >
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
                                                           <input type="text" name="companyaddress" value="" id="companyaddress" >
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
                                                              <input type="radio" name="pancard" value="1" id="pancard" >Collected 
                                                               <input type="radio" name="pancard" value="0" id="pancard" >Not Collected 
                                                        </div>
                                                         <div class="tbl_input" id="retailerpancard_div" style="display:none;">
                                                            <input type="text" name="retailerpancard_div" />
                                                        </div>
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
                                                           <input type="text" name="companyaddress" value="" id="companyaddress" >
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
                                                             <input type="text" class="date" name="agrementsigndate" value="" id="agrementsigndate">
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
                                                             <input type="radio" name="servicetax" value="1" id="servicetax">Collected 
                                                               <input type="radio" name="servicetax" value="0" id="servicetax" >Not Collected 
                                                        </div>

                                                        <div class="tbl_input" id="retailerservice_div" style="display:none;">
                                                            <input type="text" name="retailerservice_div" />
                                                        </div>
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
                                                               <input type="text" name="docrecdate" class="date start" />
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
                                                              <input type="text" name="retailerrenroldate" 
                                                              value="" id="retailerrenroldate" class="date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>



                                            


                                            <div class="sep_box">
                                            

                                                    <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Profile Pic</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="file" name="fileToUpload" id="fileToUpload">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">RAM Name</div>
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
                                                       
                                                        
                                                       RAM Employee ID
                                                                     

                                                       
                                                           


                                                        
                                                                
                                                        
                                                         
                                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->










                                            <!--  <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Visiting Card</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                              <input type="radio" name="visitingcard" value="1" id="visitingcard" >Collected 
                                                               <input type="radio" name="visitingcard" value="NotCollected" id="0" >Not Collected 
                                                        </div>
                                                        <div class="tbl_input" id="retailervisiting_div" style="display:none;">
                                                            <input type="text" name="retailervisiting_div" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                           
                                            </div>

                                            <fieldset>
                                            <legend>RAM</legend>
                                            
                                             <div class="sep_box">



                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Select RAM<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                       
                                                        
                                                            <select id="ramname" onchange="ramemployee()"  
                                                            name="ramname">
                                                                <?php
                                                                foreach ($ram as $key => $value2) {
                                                                   
                                                                

                                                                ?>
                                                 <option value="<?php echo $value2->s_admin_id; ?>">
                                                 <?php echo $value2->s_username; ?></option>
                                                               <!--  <option value="0">Select Ram</option>
                                                                <option value="1">ram1 </option>
                                                                <option value="2">ram2 </option>
                                                                <option value="3">ram3 </option>
                                                                <option value="4">ram4 </option> -->

                                                                <?php } ?>
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



                                             <!-- <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text"> Branch Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                       
                                                        
                                                            <input type="text" id="rambranckbankname" name="rambranckbankname" value="" id="accountholders"> 
                                                        
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
                                                            <input type="text" name="ramcontactno" value="" id="ramcontno"> 
                                                        
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

                                            <!-- <div class="col-lg-6">
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
                                            </div> -->


                                           


                                            
                                            



                                            </div>
                                            </fieldset>






                                            <fieldset>
                                            <legend>Bank Details</legend>
                                            <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Account Holder Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <input type="text" name="accountholder" value="" id="accountholder">
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        


                                               <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Account No<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                       
                                                        
                                                             <input type="text" name="accountnumber" value="" id="accountnumber">
                                                        
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
                                                       
                                                        
                                                             <input type="text" name="ifscode" value="" id="ifscode">
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Bank Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <input type="text" name="bankname" value="" id="bankname">
                                                          
                                                        
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
                                                        <input type="text" name="branchname" value="" id="branchname">
                                                          
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                           
                                            



                                            </div>
                                            </fieldset>

                                            <!-- <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Document Received Date<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                               <input type="text" name="docrecdate" class="date start" />
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
                                                              <input type="text" name="retailerrenroldate" 
                                                              value="" id="retailerrenroldate" class="date">
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
                                                             <input type="text" class="date" name="agrementsigndate" value="" id="agrementsigndate">
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            </div> -->

                                           

                                             <div class="sep_box">
                                       

                                           <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">User Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" name="r_username" id="r_username" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>     



                                           

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Retailer Password <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <span style="display:none" id="tooltipmsg">Password Should Be 7 digit</span>
                                                           <input type="password"  name="s_loginpassword" id="s_loginpassword" maxlength="7" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            
                                             
                                            </div>


                                            <div id="vendor_msg"></div>
                                             <div class="sep_box">











                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="submit" name="retailersubmit" value="Submit" class="retailer_btn"/>
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
                   
               
                <!--<div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, Retailer Can Add Store!</p>
                            </div>
                        </div>-->
                        
                        
                        
                 <form action="" id="storeForm" method="post" enctype="multipart/form-data">             
                   

                        <div class="page_box" id="storediv">

                                <div class="sep_box">
                                       

                                           

                                        


                                         
                                             <div class="col-lg-6">
                                               


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Retailer <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="retailername" onchange="getdealcommission()" id="retailernameid" class="selectpicker" data-live-search="true">
                                                              <option value="">-- Select Retailer --</option>
                                                             <?php foreach ($retailer as $key => $value) { ?>
                                                          <option value="<?php echo $value->s_admin_id; ?>"><?php echo $value->s_username; ?></option>
                                                          <!-- <option data-tokens="<?php echo $value->s_username; ?>" value="<?php echo $value->s_admin_id; ?>"><?php echo $value->s_username; ?></option> -->
                                                           <?php } ?>
                                                               </select>
                                                        </div>

                                                      
                                                  

                                                    </div>


                                                </div>
                                            </div>



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

                                             
                                            </div>







                            <div class="sep_box">
                                       

                                             <!--<div class="col-lg-6">
                                               
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Select Country <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="storecountryid" id="storecountryid" onchange="storeselectstates();">
                                                              <option value="">select Country</option>
                                                             <?php foreach ($vieww as $key => $value) { ?>
                                                          <option value="<?php echo $value->conid; ?>"><?php echo $value->name; ?></option>
                                                           <?php } ?>
                                                               </select>
                                                        </div>


                                                    </div>

                                                </div>
                                            </div>-->
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
                                            

                                            <div class="col-lg-6">
                                               
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Select State <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select id="storestateid" onchange="storeselectcity()"  name="storestateid" value="">
                                                              <option value="">Select State</option>
                                                             <?php foreach ($vieww as $key => $value) { ?>
                                                          <option value="<?php echo $value->stateid; ?>"><?php echo $value->statename; ?></option>
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
                                                        <div class="tbl_text">City Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          
                                                          <select id="storecityname" name="storecityname" onchange="storeselectlocation()" >
                                                            <option value="">Select City</option>
                                                            <?php foreach ($vieww1 as $key => $value) { ?>
                                                            <option value="<?php echo $value->cityid; ?>"><?php echo $value->cityname; ?></option>
                                                            <?php } ?>
                                                             </select>


                                                          <!-- <input  type="text" name="cityname"  id="cityname" onblur="checkname();" /> -->
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
                                                           <select class="location" id="storelocation" name="storelocation" >
                                                             <option value="<?php //echo $value->s_location; ?>">Select Location</option>
                                                             
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
                                                          <textarea onblur="getlongituate()" id="address" name="storeaddress"></textarea>  
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
                                                           <input id="pancardno"  type="text" name="spancardno" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                           
                                             
                                            </div>



                                            

                                            <div class="sep_box">
                                       
                                              <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Service Tax No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                             Collected 
                                                            <input id="checkbox" value="1" style="text-transform:lowercase;" type="radio" name="sservicetaxno" />

                                                            Not Collected    
                                                            <input id="checkbox" value="0" style="text-transform:lowercase;" type="radio" name="sservicetaxno" />



                                                        </div>
                                                        <div class="tbl_input" id="service_div" style="display:none;">
                                                            <input type="text" name="s_servicetaxno_val" />
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
                                                            <input id="samplebillcopy"  value="1" style="text-transform:lowercase;" type="radio" name="samplebillcopy" />
                                                          Not Collected
                                                            <input id="samplebillcopy" value="0" style="text-transform:lowercase;" type="radio" name="samplebillcopy" />
                                                        </div>

                                                        <!-- <div class="tbl_input" id="sample_bill_copy" style="display:none;">
                                                            <input type="text" name="samplebillcopyvalue" />
                                                        </div> -->
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
                                                            <input id="tinno" value="1" style="text-transform:lowercase;" 
                                                            type="radio" name="stinno" /> 

                                                               Not Collected
                                                            <input id="tinno" value="0" style="text-transform:lowercase;" type="radio" name="stinno" />
                                                        </div>

                                                         <div class="tbl_input" id="tin_div" style="display:none;">
                                                            <input type="text" name="tinnovalue" />
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>






                                           <!--  <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Visiting Card<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         Collected
                                                            <input id="visitingcard" style="text-transform:lowercase;" type="radio" name="visitingcard" value="collected" />


                                                        Not Collected
                                                            <input id="visitingcard" style="text-transform:lowercase;" type="radio" name="visitingcard" value="notcollected" />  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                             

                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Store Contact Number <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                                 <input id="storeno" style="text-transform:lowercase;" type="text" 
                                                                 name="storeno" />
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

                                                             <input type="text" name="dateofagrement" class="date start" />

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Cashback %</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         <input type="text" name="s_cashbackper" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div> 


                                            <div class="sep_box">
                                       

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Deal Commission % <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         <input type="text" name="s_dealcommision" value=""> 
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

                                             <div class="sep_box">
                                       


                                             

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
                                                       
                                                        
                                                            <select  name="ramname" >
                                                                
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

                                                            <input id="accholder_name" style="text-transform:lowercase;" type="text" name="accholder_name" />


                                                          
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
                                                        


                                                            
                                                            <input id="acc_number" style="text-transform:lowercase;" type="text" name="acc_number" />

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
                                                            <input id="ifsc_code" style="text-transform:lowercase;" type="text" name="ifsc_code" />
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
                                                         
                                                            
                                                            <input id="bank_name" style="text-transform:lowercase;" type="text" name="bank_name" />
                                                         

                                                           
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
                                                            <input id="branch_name" style="text-transform:lowercase;" type="text" name="branch_name" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                             
                                            </fieldset>

                                               <div class="sep_box">
                                       

                                            
                                             

                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Category <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">

                                                             <select name="categoryid" class="selectpicker" data-live-search="true">
                                                                 <?php 
                                                                 foreach ($category as $key => $value) {
                                                                     # code...
                                                                 

                                                                 ?>
                                                                    <option value="<?php echo $value->categorydeal_id ;?>"><?php echo $value->categorydeal_name; ?></option>
                                                                 <?php } ?>
                                                             </select>

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                          <div class="col-lg-12"><div class="row"><div class="sep_box"><div class="col-lg-1"></div><div class="col-lg-1"><div class="tbl_input"><input type="checkbox" id="checkall" name="checkall" /></div></div><div class="col-lg-2"><div class="tbl_input"><strong>Store Day</strong></div></div><div class="col-lg-2"><div class="tbl_input"><strong>Start Time</strong></div></div><div class="col-lg-2"><div class="tbl_input"><strong>End Time</strong></div></div><div class="col-lg-2"><div class="tbl_input"><strong>Start Time (Slot 2)</strong></div></div><div class="col-lg-2"><div class="tbl_input"><strong>End Time (Slot 2)</strong>&nbsp;&nbsp;<div onclick="return copyAll();"><button type="button">copy first row in all</button></div>&nbsp;</div></div></div></div></div>
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
                                          name="s_starttime_<?php echo $i; ?>" id="s_starttime_<?php echo $i; ?>" /></div></div><div class="col-lg-2"><div class="tbl_input">
                                          <input type="text" name="s_endtime_<?php echo $i; ?>" id="s_endtime_<?php echo $i; ?>" class="time end end_time" /></div></div><div class="col-lg-2">
                                          <div class="tbl_input">
                                          <input type="text" class="time start start_timeopt" name="s_secondstarttime_<?php echo $i; ?>" id="s_secondstarttime_<?php echo $i; ?>" /></div></div><div class="col-lg-2"><div class="tbl_input">
                                          <input type="text" name="s_secondendtime_<?php echo $i; ?>" class="time end end_timeopt" id="s_secondendtime_<?php echo $i; ?>" /></div></div></div></div></div>


                                          <?php } ?>

                                            </div>
                                           

                                           
                                             <div class="sep_box">
                                       

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Training Date</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <input type="text" class="date" name="s_traningdate" value=""> 
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
                                                         <input type="text" name="s_traninggivename" value="">
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
                                                         <input type="text" name="s_traninggivenno" value=""> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             

                                             <!-- <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Cashback %</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         <input type="text" name="s_cashbackper" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->


                                            </div>

                                            <!-- <div class="sep_box">
                                       

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Deal Commission % <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         <input type="text" name="s_dealcommision" value=""> 
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



                                            </div> -->



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
                                        
                                        
                                    
                                    
<div class="sep_box">
   
    
    
        <!-- <div class="add_100" style="display:none;">
            <div class="sep_box">
                                       

                                           

               <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                         <div class="tbl_text">Store Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                             <input id="r_res_name" type="text" name="r_res_name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

 <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                         <div class="tbl_text">Email Id <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input id="emailid" style="text-transform:lowercase;" type="text" name="emailid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
 </div>
 
 
 </div> -->
        
 
        
</div>  
                                          
 </div>
                            
                            
 
 

                            
      
 
        <div class="page_box" id="storelistingdiv">
             <div class="sep_box">
             
             <table class="grid_tbl">
                                    <thead>
                                        <tr>
                                            <th bgcolor="red">S.No.</th>
                                               
                                                <th bgcolor="red">Store Id</th>
                                               
                                                <th bgcolor="red">Enrollment Date</th>
                                              
                                                <th bgcolor="red">Store Name</th>
                                                <th bgcolor="red">Store Address.</th>
                                                <th bgcolor="red">Category</th>
                                                <th bgcolor="red">Manager Name</th>

                                                <th bgcolor="red">Contact No.</th>
                                                <th bgcolor="red">Email id</th>
                                                <th bgcolor="red">Action</th>
                                               
                                        </tr>
                                    </thead>
                                    
                                    
                                    <tbody class="append"> 
                                    <?php 
                                        $i = 1;
                                            foreach ($viewstore as $key => $value) {
                                         
                                           

                                            ?>
                                            <tr class="append_wrapper">


                                             <td><?php echo $i; ?></td>
                                      
                                         <td><?php echo $value->s_storeunid; ?></td> 
                                         <td><?php echo $value->s_createdon; ?></td>
                                         <td><?php echo $value->s_name; ?></td>
                                         <td><?php echo $value->s_storeaddress; ?></td> 
                                         <td><?php echo $value->categorydeal_name; ?></td>
                                         <td><?php echo $value->s_username; ?></td>
                                         <td><?php echo $value->s_contactno; ?></td>
                                         <td><?php echo $value->s_emailid; ?></td>
                                         <td><a href="<?php echo base_url(); ?>admin/restaurant/updatestorestatus/<?php echo $value->store_id.'/'.$value->s_status; ?>/<?php echo $this->uri->segment(4);?>"><?php if($value->s_status=='0') echo 'Active'; else echo 'Inactive'; ?></a></td>
                                       
                                        
                                         
                                    </tr> 
                                    <?php $i++; } ?>               
                                    </tbody>
                                    </table>
                                    
                
            </div>

             <div class="add_btn"><a href="javascript:void(0)"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add Botton</a>
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
    $("#vendorForm").validate({
          // Specify the validation rules
          rules: {
              retailer_type: "required",
              s_username : "required",
             
              countryid : "required",
              stateid : "required",
              cityname: "required",
              //pincode : "required",
              companyname : "required",
              owndername : "required",
              storename : "required",
              companyaddress : "required",
              accountholder : "required",
              accountnumber : "required",
              ifscode : "required",
              branchname : "required",
              bankname : "required",
              //bankdetails : "required",
              docrecdate : "required",
              retailerrenroldate : "required",
              retailerpancard_div : {required:true, maxlength:10, minlength:10},
            agrementsigndate : "required",
              s_loginemail : {required:true, email:true},
              s_mobileno :  {required:true, number:true},
              //co_no_outlet : {required:true,number:true},
              s_loginpassword : "required",

          },
          
          messages: {
            
            retailer_type : "Please enter Type name!",
              s_username : "Please enter retailer name!",
              countryid : "please Select Country!",
              stateid : "please Select State!",
              cityname : "please Select City !",
              //pincode : "please enter Pin Code!",
              companyname : "please enter company name!",
              owndername : "please enter ownder name!",
              storename : "please enter store name!",
              companyaddress : "please enter company address!",
              accountholder : "please enter account holder name!",
              accountnumber : "please enter account numer!",
              ifscode : "please enter ifsc code!",
              branchname : "please enter branch name!",
              bankname : "please enter bank name!",
              //bankdetails : "please enter bank details!",
              docrecdate : "please enter document received date!",
              retailerrenroldateagrementsigndate : "please enter retailer enrolement date!",
              agrementsigndate : "please enter aggrement singed date!",
              retailerpancard_div : {required:"pancard is required", maxlength:"10 alphanumeric only!", minlength:"pancard no must be of 10 alphanumeric characters"},
              s_loginemail : {required:"Please enter email ID!", email:"Please enter valid email ID!"},
              s_mobileno : {required:"Please enter contact number!", number:"Numbers only!"},
              //co_no_outlet : {required:"please enter contect outlet Numbers",number:"Numbers only!"},
              s_loginpassword : "Please enter vendor password!"
              
          },
          
          submitHandler: function(form) {
            var formData = new FormData($("#vendorForm")[0]);
            $.ajax({
            url: '<?php echo base_url(); ?>admin/adminvender/insertvendor',
            type: 'POST',
            cache: false,
            data: formData,
            async: false,
            processData: false,
            contentType: false,
            beforeSend: function () {
            $("#vendor_msg").html("Saving, please wait....");
            $('#vendor_msg').css('color','green');
            },
            success: function(data){ 
                //alert(data);
                if(data==0){
                    $('#vendor_msg').html("There is some problem, please try again!");
                    $('#vendor_msg').css('color','red');
                } else {
                    $('#vendor_msg').html("Saved.");
                    $('#vendor_msg').css('color','green');
                    $("#storediv").css('display', 'block');
                    $("#retailerdiv").css('display', 'none');
                    $(".active_color").removeClass('active_color');
                    $("#addstorehead").addClass('active_color'); 
                    $('#retailernameid').html(data);
                } 
            }
            });
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
      //alert(data); 

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










    function storeselectstates(){
     var countryid=$('#storecountryid').val();
     //alert(countryid); return false;

     $.ajax({
        url: '<?php echo base_url()?>admin/geographic/countrystate',
        type: 'POST',
        //dataType: 'json',
        data: {'countryid': countryid},
        success: function(data){
      //alert(data); 

        var  option_brand = '<option value="">Select State</option>';
        $('#storestateid').empty();
        $("#storestateid").append(option_brand+data);
           
         }
  });
    
   }

function storeselectcity(){
    var stateid = $('#storestateid').val();

     //alert(stateid); return false;
     $.ajax({
        url: '<?php echo base_url()?>admin/geographic/countrycity',
        type: 'POST',
       
        data: {'stateid': stateid},
        success: function(data){
     
           // alert(data);
        var  option_brand = '<option value="">Select city</option>';
        $('#storecityname').empty();
        $("#storecityname").append(option_brand+data);
           
         }
  });
    
   }

function storeselectlocation(){
    var cityid = $('#storecityname').val();

     //alert(stateid); return false;
     $.ajax({
        url: '<?php echo base_url()?>admin/geographic/countrylocation',
        type: 'POST',
       
        data: {'cityid': cityid},
        success: function(data){
     

        var  option_brand = '<option value="">Select city</option>';
        $('#storelocation').empty();
        $("#storelocation").append(option_brand+data);
           
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


 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>


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

 <script>
$(document).ready(function(){
    $(".add_btn a").click(function(){
        $("#storediv").toggle();
        $("#storelistingdiv").css('display', 'none');

         $(".active_color").removeClass('active_color');
         $("#addstorehead").addClass('active_color');
         $("#addstorelist").removeClass('active_color');

    });
});


function addretailer()
{
    

    $("#storediv").css('display', 'block');
    $("#retailerdiv").css('display', 'none');
    $(".active_color").removeClass('active_color');
    $("#addstorehead").addClass('active_color');
    return false;
}
$(document).ready(function() {
    $(document).on('click','#checkall',function(){
        if($('#checkall').prop('checked')==true) {
            $('.check').prop('checked',true);
        } else {
            $('.check').prop('checked',false);
        } 
    });
});


function backretailer()
{
    $("#storediv").css('display', 'none');
    $("#retailerdiv").css('display', 'block');
    $("#retailerhead").addClass('active_color');
    $("#addstorehead").removeClass('active_color');
    return false;
    
}








$(document).ready(function(){
    $("#storeForm").validate({
          // Specify the validation rules
          rules: {
              
            retailername : "required",
            storename : "required",
            storecountryid : "required",
            storestateid : "required",
            storecityname : "required",
            storelocation : "required",
            storeaddress : "required",
            storeno : "required",
            sservicetaxno : "required",
            spancardno :{required:true, maxlength:10, minlength:10} ,
            //visitingcard : "required",
            samplebillcopy : "required",
            stinno : "required",
            accholder_name : "required",
            acc_number : "required",
            ifsc_code : "required",
            bank_name : "required",
            branch_name : "required",
            //dateofagrement : "required",
           
            //s_traningdate : "required",
            //s_traninggivenno : "required",
            //s_cashbackper : "required",
            s_dealcommision : "required",
            managername : "required",
            emailid : "required",
            contactno : "required",
            username : "required",
            password : "required",
            s_storeimg : "required",
            //s_traninggivename : "required"
       

            

          },
          
          messages: {
            

            retailername : "retailer name required",
            storename : "Store name required",
            storecountryid : "Country required",
            storestateid : "state required",
            storecityname : "categor required",
            storelocation : "location required",
            storeaddress : "address required",
            storeno : " store no required",
            sservicetaxno : "service tax required",
            spancardno : {required:"pancard is required", maxlength:"10 alphanumeric only!", minlength:"pancard no must be of 10 alphanumeric characters"},
            //visitingcard : "visiting card required",
            samplebillcopy : "sample bill copy required",
            stinno : "tin no required",
            accholder_name : " account holder required",
            acc_number : "account number required",
            ifsc_code : "ifsc code required",
            bank_name : "bank name required",
            branch_name : "branch name required",
            //dateofagrement : "date of aggrement required",
            //s_traningdate : "traning date required",
            //s_traninggivenno : "traning given no required",
            //s_cashbackper : "cashback required",
            s_dealcommision : "deal commission required",
            managername : "manager name required",
            emailid : "email id required",
            contactno : "contact no required",
            username : "user name required",
            password : "password required",
            s_storeimg : "store image required",
            //s_traninggivename : "traning given name required"
           




          
          },
          
          submitHandler: function(form) {
            var formData = new FormData($("#storeForm")[0]);

           
            $.ajax({
            url: '<?php echo base_url(); ?>admin/restaurant/addstore',
            type: 'POST',
            cache: false,
            data: formData,
            async: false,
            processData: false,
            contentType: false,
            beforeSend: function () {
            $("#store_msg").html("Saving, please wait....");
            $('#store_msg').css('color','green');
            },
            success: function(data){ 
                //alert(data);  
                //console.log(data);
                //return false;
                if(data==0){
                    $('#store_msg').html("There is some problem, please try again!");
                    $('#store_msg').css('color','red');
                } else if(data==1){

                    window.location.href = "<?php echo base_url(); ?>"+'admin/restaurant/storelisting';

                   /* $("#storediv").css('display', 'none');
                    $("#retailerdiv").css('display', 'none');
                    $("#storelistingdiv").css('display', 'block');
                    $(".active_color").removeClass('active_color');
                    $("#addstorehead").removeClass('active_color');
                    $("#addstorelist").addClass('active_color'); */
                } else {
                    $('#store_msg').html(data);
                    $('#store_msg').css('color','red');
                }






            }
            });
          }
      });
   });

    function getdealcommission()
    {

        
            $.ajax({
              url: '<?php echo base_url(); ?>admin/restaurant/appendstreets',
              type: 'POST',
              data: {'city_id':city_id},
              success: function(data){
                    $('#street_id').html(data);  
              }
              });
    }


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
    $("input[name=visitingcard]").click(function() {    

   
        var val = $("input[name=visitingcard]:checked").val();
        if(val==1) {
            $("#retailervisiting_div").show();
        } else {
            $("#retailervisiting_div").hide();
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




$(function(){
    $("input[name=stinno]").click(function() {    

   
        var val = $("input[name=stinno]:checked").val();
        if(val==1) {
            $("#tin_div").show();
        } else {
            $("#tin_div").hide();
        }
    });
});



// $(function(){
//     $("input[name=samplebillcopy]").click(function() {    

   
//         var val = $("input[name=samplebillcopy]:checked").val();
//         if(val==1) {
//             $("#sample_bill_copy").show();
//         } else {
//             $("#sample_bill_copy").hide();
//         }
//     });
// });





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




function copyAll() {
    var start_time = $("#s_starttime_0").val();
    var end_time = $("#s_endtime_0").val();
    var start_timeopt = $("#s_secondstarttime_0").val();
    var end_timeopt = $("#s_secondstarttime_0").val();
    $(".start_time").val(start_time);
    $(".end_time").val(end_time);
    $(".start_timeopt").val(start_timeopt);
    $(".end_timeopt").val(end_timeopt);

}

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

function fillusernamee()
{
    var email = $("#s_loginemail").val();
    $('#r_username').val(email);
}




$("#s_loginpassword").hover(function() {
   $("#tooltipmsg").fadeIn( 500 );
}, function() {
    
     $("#tooltipmsg").fadeOut( 100 );
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

