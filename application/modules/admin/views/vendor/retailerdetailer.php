<!DOCTYPE html>
<html>
<body>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
               <form action="" id="resForm" method="post" enctype="multipart/form-data" >
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Details</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, Retailer can View Details!
                                    <a href="<?php echo base_url();?>"><button type="button" style="float:right;">CANCEL</button></a></p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">
                                <div class="col-lg-12">
                                    <div class='flashmsg'>
                                        <?php echo validation_errors(); ?> 
                                        <?php
                                          if($this->session->flashdata('message')){
                                            echo $this->session->flashdata('message'); 
                                          }
                                        ?>
                                    </div>



                                    <div class="row">

                                    

                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Retailer Name </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="s_username" id="s_username" 
                                                            value="<?php echo $details[0]->s_username; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Email ID </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input id="s_loginemail" type="text" readonly name="s_loginemail" value="<?php echo $details[0]->s_loginemail; ?>"  />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>

                                         <div class="sep_box">
                                          
                                             <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Concat No</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="outlet_name" vale id="outlet_name" value="<?php echo $details[0]->s_mobileno; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                                                   
                                        </div>

                                        
                                            
                                            
                                    <div class="sep_box">

                                        
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">User Id</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" readonly name="pincode" value="<?php echo $details[0]->UserId; ?>" id="pincode"  >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                
                                            </div>
                                          
                                       

                                         <div class="sep_box">

                                        
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text"></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="submit" name="Submit" value="Update">
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
</body>
   
</html>

