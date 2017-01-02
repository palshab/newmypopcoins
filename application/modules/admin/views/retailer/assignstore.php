<?php foreach(@$assignstores as $val) { 
    $assigned[] = $val->store_id;
}
?>
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
                            <h2>Assign Store</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, you can assign stores to manager!
                                    <a href="<?php echo base_url();?>admin/retailer/viewmanagers"><button type="button" style="float:right;">CANCEL</button></a></p>
                            </div>
                        </div>
                            <form action="" id="mgrForm" method="post" enctype="multipart/form-data" >
                            <div class="page_box">                        
                                        <div class="sep_box">                                        
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Assign Store(s) </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select name="map_storeId[]" multiple>
                                                                <?php foreach($stores as $val) { ?>
                                                                <option value="<?php echo $val->store_id;?>" <?php if(@in_array($val->store_id,@$assigned)) echo 'selected';?>><?php echo $val->s_name;?></option>
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
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input  type="submit" name="submit" value="Submit" />
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
    </div>
</body>
   
</html>

<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("#mgrForm").validate({
      rules: {
        "map_storeId[]": "required"
      },
      messages: {
        "map_storeId[]": "This field is required!"
      },
      submitHandler: function(form) {
        form.submit();
      }
  });
});
</script>