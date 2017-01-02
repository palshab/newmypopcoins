<script src="<?php echo admin_url();?>bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo admin_url();?>bootstrap/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="<?php echo admin_url();?>bootstrap/css/bootstrap-multiselect.css" type="text/css"/>

<div class="wrapper">
<?php $this->load->view('helper/nav')?> 
<div class="col-lg-10 col-lg-push-2">
 <div class="row">
  <div class="page_contant">
    <div class="col-lg-12">
    <div class="page_name">
    
    <h2>Add Brand Master</h2>
   
    </div>
        <div class="page_box">
         <div class="sep_box">
                            <div class="col-lg-12">
        <div style="text-align:right;">
            <a href="<?php echo base_url();?>admin/geographic/viewcitygroup"><button>CANCEL</button></a>
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
                <div class="tbl_text">City Group <span style="color:red;font-weight: bold;">*</span></div>
            </div>
            <div class="col-lg-8">
                <div class="tbl_input">
                <select name="citygroup" id="citygroup" >
                <option value="0">Select City Group</option>
                <?php foreach ($vieww as $key => $value) {
                 ?>
                  <option value="<?php echo $value->cmasterid ?>"><?php echo $value->mastname ?></option>
                 <?php }?>
                </select></div>
            </div>
        </div>
        </div>
        <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">Country <span style="color:red;font-weight: bold;">*</span></div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input">
                                        <select name="countryid" id="countryid" onclick="selectstates();">
                                            <option>Select Country</option>
                                            <?php foreach ($viewcountry as $key => $value) {
                                                
                                            ?>
                                             <option value="<?php echo $value->conid ?>"><?php echo $value->name ?></option>
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
                    <div class="tbl_text">State <span style="color:red;font-weight: bold;">*</span></div>
                </div>
                <div class="col-lg-8">
                    <div class="tbl_input">
                    <select name="stateid" id="stateid" onclick="statecountry();">
                        <option>Select State</option>
                    </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6" >
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">City <span style="color:red;font-weight: bold;">*</span></div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input">
                                   <select name="cityidd[]"  id="cityidd" multiple="multiple">
                                            
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
        <!-- <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-4">
                <div class="tbl_text">City</div>
            </div>
            <div class="col-lg-8">
                <div class="tbl_input">
                <select name="cityidd[]" id="cityidd" multiple="multiple">
               
                <?php foreach ($cityvieww as $key => $value) {
                 ?>
                  <option value="<?php echo $value->cityid ?>"><?php echo $value->cityname ?></option>
                 <?php }?>
                </select>
                <script id="example">
                $('#cityidd').multiselect({
                enableClickableOptGroups: true
                });
                </script>
                </div>
            </div>
        </div>
        </div>
       
        </div> -->
     
   
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
 <script type="text/javascript">
function selectstates(){
var countryid=$('#countryid').val();
$('#staterid').show();
$.ajax({
 url: '<?php echo base_url()?>admin/geographic/countrystate',
type: 'POST',
data: {'countryid': countryid},
success: function(data){
var  option_brand = '<option value="">Select State</option>';
$('#stateid').empty();
$("#stateid").append(option_brand+data);
 }
});
}
function statecountry(){
var  stid=$('#stateid').val();
$.ajax({
 url: '<?php echo base_url()?>admin/vendor/citystate',
type: 'POST',
data: {'stid': stid},
success: function(data){
$('#cityidd').empty();
$("#cityidd").append(data);
/*$('#cityidd').multiselect({ 
                enableClickableOptGroups: true,
                enableFiltering: true,
                includeSelectAllOption: true,

});*/
 }
});
}
 </script>