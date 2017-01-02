<div class="wrapper">
<?php $this->load->view('helper/sidebar')?> 
<div class="col-lg-10 col-lg-push-2">
 <div class="row">
  <div class="page_contant">
    <div class="col-lg-12">
    <div class="page_name">
    
    <h2>Edit Attribute</h2>
    </div>
        <div class="page_box">
        <div style="text-align:right;">
            <a href="<?php echo base_url();?>admin/attribute/viewattribute"><button>CANCEL</button></a>
        </div>
         <div class='flashmsg'>
            <?php echo validation_errors(); ?>
            <?php
              if($this->session->flashdata('message')){
                echo $this->session->flashdata('message'); 
              }
            ?>
        </div>
        <form action="" method="post" enctype="multipart/form-data" >
        <div class="sep_box">
        <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-3">
                <div class="tbl_text">Attribute Name <span style="color:red;font-weight: bold;">*</span></div>
            </div>
            <div class="col-lg-8">
                <div class="tbl_input"><input  type="text" name="attrname" value="<?php echo $vieww->attname ?>" id="attrname"/></div>
            </div>
        </div>
        </div>
       
        </div>
        <div class="sep_box">
        <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-8">
                <div class="submit_tbl">
                    <input id="Submit1" type="submit" name="submit" value="Submit" class="btn_button sub_btn" />
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