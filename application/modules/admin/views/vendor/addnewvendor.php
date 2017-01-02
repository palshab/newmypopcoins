
<?php //p($viewww);exit();?>
<script language='javascript'>
  
  // When the browser is ready...
  $(document).ready(function() {
  
  // Setup form validation on the #register-form element
    $("#addCont").validate({
        // Specify the validation rules
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
        <li><a href="#" class="active_color">Retailer</a></li>
        <li><a href="#">Add Store</a></li>
        <li><a href="#">Listing</a></li>

      </ul>
</div>
      
              
              
               
                        <div class="page_box">
                            <div class="sep_box">
                                <div class="col-lg-12">
                                    <div class="row">
                                     
                                     <div class="sep_box">
                                            

                                     

                                                <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Retailer Name <span style="color:red;font-weight: bold;">*</span></div>
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
                                                            <input id="s_loginemail" type="text" name="s_loginemail" />
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
                                                        <div class="tbl_text">Select Country <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="countryid" id="countryid" onchange="selectstates();">
                <option value="">select Country</option>
                <?php foreach ($vieww as $key => $value) { ?>
                    <option value="<?php echo $value->conid; ?>"><?php echo $value->name; ?></option>
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
                                                        <div class="tbl_text">State Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <select id="stateid" name="stateid" value="stateid">
                                                             <option value="">Select State</option>
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
                                                          <input  type="text" name="cityname"  id="cityname" onblur="checkname();" />
                                                        </div>

                                                      
                                                  

                                                    </div>


                                                </div>
                                            </div>
                                            <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Pincode <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" name="pincode"  id="pincode" >
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
                                                        <div class="tbl_text">Company Name<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" name="companyname" value="" id="companyname" >
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
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                
                                            </div>





                                            <div class="sep_box">
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
                                                        <div class="tbl_text">Store Number<span style="color:red;font-weight: bold;">*</span></div>
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
                                                              <input type="radio" name="pancard" value="Collected" id="pancard" >Collected Check Box
                                                               <input type="radio" name="pancard" value="NotCollected" id="pancard" >Not Collected 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                
                                            </div>



                                            


                                            <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Service Tax No</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                             <input type="radio" name="servicetax" value="Collected" id="servicetax">Collected 
                                                               <input type="radio" name="servicetax" value="NotCollected" id="servicetax" >Not Collected 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Visiting Card</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                              <input type="radio" name="visitingcard" value="Collected" id="visitingcard" >Collected 
                                                               <input type="radio" name="visitingcard" value="NotCollected" id="visitingcard" >Not Collected 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>



                                            <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Bank Details<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <div class="tbl_text">Account Holder Name<span style="color:red;font-weight: bold;">*</span></div>
                                                        
                                                             <input type="text" name="accountholder" value="" id="accountholder">
                                                        
                                                        <div class="tbl_text">Account Number<span style="color:red;font-weight: bold;">*</span></div>
                                                             <input type="text" name="accountnumber" value="" id="accountnumber">
                                                       <div class="tbl_text">IFSC Code<span style="color:red;font-weight: bold;">*</span></div> 
                                                        
                                                             <input type="text" name="ifscode" value="" id="ifscode">          
                                                         <div class="tbl_text">Branch n Bank Name<span style="color:red;font-weight: bold;">*</span></div>     
                                                        
                                                             <input type="text" name="barnchname" value="" id="barnchname">
                                                         <div class="tbl_text">Text Box for the bank details<span style="color:red;font-weight: bold;">*</span></div>      

                                                        
                                                             <input type="text" name="bankdetails" value="" id="bankdetails">     
                                                                  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                             <div class="col-lg-6">
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
                                                             <input type="text" name="ramemployeeid" value="" id="ramemployid">          

                                                        Branch  Bank Name
                                                             <input type="text" name="rambranckbankname" value="" id="accountholders">


                                                        Official ID
                                                             <input type="text" name="ramofficialid" value="" id="officialid">     
                                                        
                                                         Contact No
                                                             <input type="text" name="ramcontactno" value="" id="ramcontno">                
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
                                                        <div class="tbl_text">Agreement Signed Date<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                             <input type="text" class="date" name="agrementsigndate" value="" id="agrementsigndate">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             
                                            </div>

                                           

                                             <div class="sep_box">
                                       

                                           

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Retailer Password <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="password" name="s_loginpassword" id="s_loginpassword" />
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
                                             
                                            </div>



                                             <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input id="submitBtn" type="submit" name="retailersubmit" value="Submit" class="retailer_btn"/>
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
                   
               
                <!--<div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, Retailer Can Add Store!</p>
                            </div>
                        </div>-->
                        
                        
                        
                        
                   

                        <div class="page_box">
                            <div class="sep_box">
                                       

                                           

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                         <div class="tbl_text">Store Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                             <input id="r_res_name" type="text" name="r_res_name" />
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
                                                         <div class="tbl_text">User Name  <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                             <input id="username" style="text-transform:lowercase;" type="text" name="username" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                         <div class="tbl_text">Store Start Time <span style="color:red;font-weight: bold;">*</span></div>
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
                                                         <div class="tbl_text">Store Start Time <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                             <input id="username" style="text-transform:lowercase;" type="text" name="username" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             

                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                         <div class="tbl_text">Store Start Time <span style="color:red;font-weight: bold;">*</span></div>
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
                                                              <input id="password" style="text-transform:lowercase;" type="text" name="password" />   <input id="password" style="text-transform:lowercase;" type="text" name="password" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             

                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">TIN No <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            Collected 
                                                            <input id="tinno" style="text-transform:lowercase;" type="radio" name="tinno" />


                                                        Not Collected
                                                            <input id="tinno" style="text-transform:lowercase;" type="radio" name="tinno" />
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
                                                            <input id="checkbox" style="text-transform:lowercase;" type="radio" name="servicetaxno" />

                                                        Not Collected    
                                                            <input id="checkbox" style="text-transform:lowercase;" type="radio" name="servicetaxno" />
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
                                                           <input id="pancardno" style="text-transform:lowercase;" type="text" name="pancardno" />
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
                                                            <input id="visitingcard" style="text-transform:lowercase;" type="radio" name="visitingcard" />


                                                        Not Collected
                                                            <input id="visitingcard" style="text-transform:lowercase;" type="radio" name="visitingcard" />  
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
                                                            <input id="samplebillcopy" style="text-transform:lowercase;" type="checkbox" name="samplebillcopy" />
                                                          Not Collected
                                                            <input id="samplebillcopy" style="text-transform:lowercase;" type="checkbox" name="samplebillcopy" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            </div>

                                             <div class="sep_box">
                                       

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Bank Details<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         Account Holder Name

                                                            <input id="bankdetails" style="text-transform:lowercase;" type="text" name="bankdetails" />


                                                            Account Number
                                                            <input id="bankdetails" style="text-transform:lowercase;" type="text" name="bankdetails" />

                                                            IFSC Code
                                                            <input id="bankdetails" style="text-transform:lowercase;" type="text" name="bankdetails" />
                                                         

                                                            Branch n Bank Name

                                                            <input id="bankdetails" style="text-transform:lowercase;" type="text" name="bankdetails" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             

                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Date of Agreement <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <input id="r_res_slug" style="text-transform:lowercase;" type="text" name="dateofagrement" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            </div>


                                            <div class="sep_box">
                                       

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Select Store Manager<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select>
                                                                    <?php 
                                               foreach ($manager as $key => $value) {
                                                   # code...
                                               
                                               ?>
                                                <option value="<?php echo $value->s_admin_id; ?>"><?php echo $value->s_username; ?></option>
 <?php } ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             

                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Training Date <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <input id="traingdate" style="text-transform:lowercase;" type="text" name="traingdate" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            </div>

                                            <div class="sep_box">
                                       

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                          <div class="tbl_text">Training Given to Name & No<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         Collected
                                                            <input id="visitingcard" style="text-transform:lowercase;" type="checkbox" name="visitingcard" />


                                                        Not Collected
                                                            <input id="visitingcard" style="text-transform:lowercase;" type="checkbox" name="visitingcard" />  
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
                                                            <input id="samplebillcopy" style="text-transform:lowercase;" type="checkbox" name="samplebillcopy" />
                                                          Not Collected
                                                            <input id="samplebillcopy" style="text-transform:lowercase;" type="checkbox" name="samplebillcopy" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            </div>

                                            <div class="sep_box">
                                       

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                         <div class="tbl_text">Cashback Percentage<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <input id="cashbackper" style="text-transform:lowercase;" type="text" name="cashbackper" /> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             

                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                           <div class="tbl_text">Deal Commission<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                         <input id="dealcommison" style="text-transform:lowercase;" type="text" name="dealcommison" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            </div>






                             <div class="sep_box">
                                  <div class="col-lg-12">
                                    <div class="row">
                                   <!--  <a href="javascript:void(0);" class="add_row" title="Add row"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Add Row</a> -->
                                    <table class="grid_tbl" style="margin-top:25px;">
                                    <thead>
                                        <tr>
                                            <th>Store Name</th>
                                            <th>Store Description</th>
                                            <th>Manager</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Street</th>
                                            <th>Address</th>
                                            <th>PIN</th>
                                           
                                            
                                           
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                        </tr>
                                    </thead>
                                    <tbody class="append"> 
                                    <tr class="append_wrapper">
                                         <td><input type="text" name="r_res_name[]" id="r_res_name" /></td>
                                         <td><textarea type="text" name="r_res_desc[]" id="r_res_desc"></textarea></td>
                                         <td><select name="manager[]">
                                                <option value="0">Select Manager</option>
                                               <?php 
                                               foreach ($manager as $key => $value) {
                                                   # code...
                                               
                                               ?>
                                                <option value="<?php echo $value->s_admin_id; ?>"><?php echo $value->s_username; ?></option>
                                               <?php } ?>

                                        </select></td> 

                                        <td><select type="text" name="country_id[]" id="country_id">
                                                <option value="">-- Select Country --</option>
                                                <?php foreach($countries as $val) { ?>
                                                <option value="<?php echo $val->conid;?>"><?php echo $val->name;?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td><select type="text" name="state_id[]" id="state_id">
                                                <option value="">-- Select State --</option>
                                            </select>
                                        </td>
                                        <td><select type="text" name="city_id[]" id="city_id">
                                                <option value="">-- Select City --</option>
                                            </select>
                                        </td> 
                                        <td><select type="text" name="street_id[]" id="street_id">
                                                <option value="">-- Select Street --</option>
                                            </select>
                                        </td> 
                                        <td><textarea type="text" name="res_address[]" id="res_address"></textarea></td>
                                        <td><input type="text" name="res_pin[]" id="res_pin" /></td>

                                       
                                       
                                       
                                        <td><input type="text" name="res_latitude[]" id="res_latitude" /></td>
                                        <td><input type="text" name="res_longitude[]" id="res_longitude" /></td>
                                    </tr>                
                                    </tbody>
                                    </table>
                                    </div>
                                  </div>
                                </div>
                                

                                <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input id="submitBtn" type="submit" name="submit" value="Submit" class="retailer_btn"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        
                                        
                                    
                                    
<div class="sep_box">
	<div class="add_btn"><a href="javascript:void(0)"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add Botton</a></div>
    
    
    	<div class="add_100" style="display:none;">
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
 
 
 </div>
        
 
        
</div>  
                                          
 </div>
                            
                            
 
 

                            
      
 
  	    <div class="page_box">
             <div class="sep_box">
             
             <table class="grid_tbl">
                                    <thead>
                                        <tr>
                                            <th bgcolor="red">S.No.</th>
                                                <th bgcolor="red">Enrollment Date</th>
                                                <th bgcolor="red">Store Id</th>
                                                <th bgcolor="red">Company Name</th>
                                                <th bgcolor="red">Store Name</th>
                                                <th bgcolor="red">Store Location</th>
                                                <th bgcolor="red">Category</th>
                                                <th bgcolor="red">Manager Name</th>
                                                <th bgcolor="red">Contact No.</th>
                                                <th bgcolor="red">Email id</th>
                                                <th bgcolor="red">Training Date</th>
                                                <th bgcolor="red">Status</th>

                                        </tr>
                                    </thead>
                                    
                                    
                                    <tbody class="append"> 
                                    <tr class="append_wrapper">
                                         <td>1</td>
                                         <td>6-Jun-16</td>
                                         <td>MPC226</td> 
                                         <td>HHH</td>
                                         <td>Trance</td>
                                         <td>5</td> 
                                         <td>F B</td>
                                         <td>ABC</td>
                                         <td>999999999</td>
                                         <td>abc@gmail.com</td>
                                         <td>11/3/2016</td>
                                         <td>Active</td>
                                         
                                    </tr>                
                                    </tbody>
                                    </table>
                                    
             	
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
              pincode : "required",
              companyname : "required",
              owndername : "required",
              storename : "required",
              companyaddress : "required",
              accountholder : "required",
              accountnumber : "required",
              ifscode : "required",
              barnchname : "required",
              bankdetails : "required",
              docrecdate : "required",
              retailerrenroldate : "required",
            agrementsigndate : "required",
              s_loginemail : {required:true, email:true},
              s_mobileno :  {required:true, number:true},
              //co_no_outlet : {required:true,number:true},
              s_loginpassword : "required",

          },
          
          messages: {
            
            retailer_type : "Please enter Type name!",
              s_username : "Please enter vendor name!",
              countryid : "please Select Country!",
              stateid : "please Select State!",
              cityname : "please Select City !",
              pincode : "please enter Pin Code!",
              companyname : "please enter company name!",
              owndername : "please enter ownder name!",
              storename : "please enter store name!",
              companyaddress : "please enter company address!",
              accountholder : "please enter account holder name!",
              accountnumber : "please enter account numer!",
              ifscode : "please enter ifsc code!",
              barnchname : "please enter branch name!",
              bankdetails : "please enter bank details!",
              docrecdate : "please enter document received date!",
              retailerrenroldateagrementsigndate : "please enter retailer enrolement date!",
              agrementsigndate : "please enter aggrement singed date!",
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

 <script>
$(document).ready(function(){
    $(".add_btn a").click(function(){
        $(".add_100").toggle();
    });
});
</script>

