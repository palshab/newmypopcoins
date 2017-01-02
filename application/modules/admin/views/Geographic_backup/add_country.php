<div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <!-- <form action="" method="post" enctype="multipart/form-data" > -->
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Country</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this Section Admin can Add All country .</p>
                           
                                  <?php echo validation_errors(); ?> 
                                  <?php  echo $this->session->flashdata('message'); ?>

                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                 <form action="" method="POST">
                                    <div class="row">
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Country Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <input id="coucode" type="text" name="coucode" />
                                                        </div>

                                                         <input type="submit" name="submit" style="margin:0 11px;" class="submitBtn" value="Submit" onclick="return validate16();">

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
                </div>
            </div>
        </div>