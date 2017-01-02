<div class="wrapper">
<?php $this->load->view('helper/sidebar')?> 
<div class="col-lg-10 col-lg-push-2">
 <div class="row">
  <div class="page_contant">
    <div class="col-lg-12">
    <div class="page_name">
    
    <h2>Combo</h2>
   
    </div>
        <div class="page_box">
        <div class="sep_box">
                            <div class="col-lg-12">
        <div style="text-align:right;">
            <a href="<?php echo base_url();?>admin/attribute/combolisting"><button>CANCEL</button></a>
        </div>
         <div class='flashmsg'>
            <?php
              if($this->session->flashdata('message')){
                echo $this->session->flashdata('message'); 
              }
            ?>
        </div>
        </div></div>
        <form action="" method="post" enctype="multipart/form-data" >
        <div class="sep_box">
        <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-4">
                <div class="tbl_text">Select Name</div>
            </div>
            <div class="col-lg-8">
                <div class="tbl_input">
                    <select name="comboname" >
                    <option value="0">Select Combo</option>
                      <?php

                        foreach($imagesss as $val)
                        {
                           
                      ?> 

                            <option value="<?php echo $val->ComboId ?>"><?php echo $val->name ?></option>
                      <?php } ?> 
                      </select>

                </div>
            </div>
        </div>
        </div>
         <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-4">
                <div class="tbl_text">Main Image</div>
            </div>
            <div class="col-lg-8">
                <div class="tbl_input">
                <input id="video_img" name="image" type="file" />    
                </div>
            </div>
        </div>
 


       




        </div>
       <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-4"><div class="tbl_text">Image1</div></div>
          <div class="col-lg-8">
            <div class="tbl_input"><span><input type="file" name="img1"  id="img1"></span></div></div></div>
        </div>

        <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-4"><div class="tbl_text">Image2</div></div>
          <div class="col-lg-8">
            <div class="tbl_input"><span><input type="file" name="img2"  id="img2"></span></div></div>
            </div>
        </div>
        
        <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-4"><div class="tbl_text">Image3</div></div>
          <div class="col-lg-8">
            <div class="tbl_input">
              <span><input type="file" name="img3"  id="img3"  ></span></div>
            </div></div>
    </div> 

        </div>
          
        <div class="sep_box">
        <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-8">
                <div class="submit_tbl">
                    <input id="submitBtn" type="submit" name="submit" value="Submit" class="btn_button sub_btn" />
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
   