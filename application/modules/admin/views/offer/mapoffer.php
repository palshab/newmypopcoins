<?php  $this->load->view('helper/sidebar'); ?>   
<div class="col-lg-10 col-lg-push-2">
    <div id="basicExample">
            <div class="row" >
                <div class="page_contant">
                    <form action="" method="post" id="mapForm" enctype="multipart/form-data">
                    <div class="col-lg-12">
                        <div class="page_name">
                           <h2>Map Offer</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can map offer with outlets!
                                    <a href="<?php echo base_url();?>admin/offer/viewoffers"><button type="button" style="float:right;">CANCEL</button></a></p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">                                 
                                    <div class="row">
                                        <div class="sep_box">                                            
                                            <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text" >Offer <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="hidden" name="offer_id" value="<?php echo $this->uri->segment(4); ?>" />
                                                            <select disabled>
                                                                <option value="">-- Select Offer --</option>
                                                                <?php foreach($offers as $val) { ?>
                                                                <option value="<?php echo $val->offer_id; ?>" <?php if($val->offer_id==$this->uri->segment(4)) echo "selected";?>><?php echo $val->o_name.' - '.$val->offer_title; ?></option>
                                                                <?php } ?>                                                          
                                                            </select>
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php /*foreach($restaurants as $val) { 
                                    $parameter = array(
                                                        'act_mode' => 'fetchresproducts', 
                                                        'row_id' => $val->r_restaurant_id,
                                                        'param1' => '',
                                                        'param2' => '',
                                                        'param3' => '',
                                                        'param4' => '',
                                                        'param5' => '',
                                                        'param6' => '',
                                                        'param7' => '',
                                                        'param8' => '',
                                                        'param9' => '',
                                                        'param10' => '',
                                                        'param11' => '',
                                                        'param12' => '',
                                                        'param13' => '',
                                                        'param14' => '',
                                                        'param15' => '',
                                                        'param16' => ''
                                                      );
                                    $products = $this->supper_admin->call_procedure('proc_general', $parameter);?>
                                <div class="col-lg-12">                                 
                                    <div class="row">
                                        <div class="sep_box">                                            
                                            <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-5">
                                                        <div class="tbl_text" >Map Restaurant(s)</div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="tbl_input">
                                                            <input type="checkbox" name="restaurant_id[]" value="<?php echo $val->r_restaurant_id;?>" /> <?php echo $val->r_res_name;?>
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row ">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text" >Map Product(s)</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select name="product_id_<?php echo $val->r_restaurant_id; ?>[]" multiple>
                                                                <option value="">-- Select Offer --</option>
                                                                <?php foreach($products as $val) { ?>
                                                                <option value="<?php echo $val->pro_id; ?>"><?php echo $val->pro_name; ?></option>
                                                                <?php } ?>                                                          
                                                            </select>
                                                        </div>
                                                    </div>                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <?php } */?>

                                <table class="grid_tbl" style="margin-top:25px;">
                                <thead>
                                    <tr>
                                        <th>Select Outlet</th>
                                        <th>Outlet Name</th>
                                        <th>Map Products</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                <?php foreach($restaurants as $val) { 
                                $parameter = array(
                                            'act_mode' => 'fetchresproducts', 
                                            'row_id' => $val->r_restaurant_id,
                                            'param1' => '',
                                            'param2' => '',
                                            'param3' => '',
                                            'param4' => '',
                                            'param5' => '',
                                            'param6' => '',
                                            'param7' => '',
                                            'param8' => '',
                                            'param9' => '',
                                            'param10' => '',
                                            'param11' => '',
                                            'param12' => '',
                                            'param13' => '',
                                            'param14' => '',
                                            'param15' => '',
                                            'param16' => ''
                                          );
                                $products = $this->supper_admin->call_procedure('proc_general', $parameter);?>
                                <tr>
                                    <td><input type="checkbox" name="restaurant_id[]" value="<?php echo $val->r_restaurant_id;?>" /> </td>
                                    <td><?php echo $val->r_res_name; ?></td>
                                    <td><select name="product_id_<?php echo $val->r_restaurant_id; ?>[]" multiple>
                                    <option value="">-- Select Offer --</option>
                                    <?php foreach($products as $val) { ?>
                                    <option value="<?php echo $val->pro_id; ?>"><?php echo $val->pro_name; ?></option>
                                    <?php } ?>                                                          
                                    </select>
                                    </td> 
                                </tr>
                                <?php } ?>                  
                                </tbody>
                                </table>    

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="sep_box">                                            
                                            <div class="col-lg-10">
                                                <div class="row ">
                                                    <div class="col-lg-10">
                                                        <div class="tbl_input">
                                                            <input type="submit" name="submit" value="Submit" />
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
</div>

<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#mapForm").validate({
          // Specify the validation rules
          rules: {
              "restaurant_id[]" : "required"
          },
          
          messages: {
              "restaurant_id[]" : "This field is required!"
          },
          
          submitHandler: function(form) {
            form.submit();
          }
      });
   });
</script> 