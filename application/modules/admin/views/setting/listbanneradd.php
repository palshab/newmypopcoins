<!DOCTYPE html>
<html>

<body>
<?php  //p($city); die; ?>
    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <form action="" id="vendorForm" method="post" enctype="multipart/form-data" >
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Add Home page banners</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can banners for homepage!
                                    <a href="<?php echo base_url();?>admin/setting/homebannerlist"><button type="button" style="float:right;">CANCEL</button></a></p>
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
                                                        <div class="tbl_text">title<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="title" id="title" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Discription <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input id="discription" type="text" name="discription" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>
                                        <div class="sep_box">
                                        <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">URL <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input id="url" type="text" name="url" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>   
                                            </div>
                                     <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Select Type <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <select name="r_maintype_id" class="select" id="r_maintype_id" >
                                                            <option value="">-- Select Type --</option>
                                                            <?php foreach ($types as $value) {  ?>
                                                            <option value="<?php echo $value->type_id;  ?>" ><?php echo $value->type_title;  ?></option>
                                                                 <?php
                                                                  } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Select Category <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <select name="category_id" class="select" id="category_id">
                                                            <option value="">-- Select Category --</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                    <?php foreach($attributes as $attribute) { 
                                        $parameter = array(
                                            'act_mode' => 'attrvalueslist', 
                                            'v_id' => $attribute->id,
                                            'v_status' => '',
                                            'v_mobile' => '',
                                            'v_email' => '',
                                            'v_pwd' => '',
                                            'tin_no' => '',
                                            'tax_no' => '',
                                            'bank_name' => '',
                                            'bank_addr' => '',
                                            'ifsc_code' => '',
                                            'bene_accno' => '',
                                            'param1' => '',
                                            'param2' => ''
                                          );
                                        $attr_values = $this->supper_admin->call_procedure('proc_vendor', $parameter);?>
                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Map <?php echo $attribute->attname;?> <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                            <input type="hidden" name="attrmain_id[]" value="<?php echo $attribute->id; ?>" />
                                                            <select name="attrsub_id_<?php echo $attribute->id; ?>[]" multiple>
                                                                <?php foreach($attr_values as $val) { ?>
                                                                <option value="<?php echo $val->id;?>"><?php echo ucwords($val->attvalue);?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div> 
                                        <?php } ?> 
                                       
                                        <div class="sep_box">
                                  <div class="col-lg-12">
                                    <div class="row">
                                    <table class="grid_tbl" style="margin-top:25px;">
                                    <thead>
                                        <tr>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Street</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="append"> 
                                    <tr class="append_wrapper">
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
                                        <td><select type="text" name="city_id" id="city_id">
                                                <option value="">-- Select City --</option>
                                            </select>
                                        </td> 
                                        <td><select type="text" name="street_id" id="street_id">
                                                <option value="">-- Select Street --</option>
                                            </select>
                                        </td> 
                                        </tr>                
                                    </tbody>
                                    </table>
                                    </div>
                                  </div>
                                </div>

                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Restaurant Image (s) <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-9 field_wrapper">
                                                        <div class="tbl_input">
                                                            <input type="file" name="r_img_name[]" /><a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa fa-plus fa-lg" aria-hidden="true"></i></a>
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

<script type="text/javascript">
  $(document).ready(function(){
    $("#vendorForm").validate({
          // Specify the validation rules
          rules: {
              s_username : "required",
              s_loginemail : {required:true, email:true},
              s_mobileno :  {required:true, number:true},
              s_loginpassword : "required"
          },
          
          messages: {
              s_username : "Please enter vendor name!",
              s_loginemail : {required:"Please enter email ID!", email:"Please enter valid email ID!"},
              s_mobileno : {required:"Please enter contact number!", number:"Numbers only!"},
              s_loginpassword : "Please enter vendor password!"
          },
          
          submitHandler: function(form) {
            form.submit();
          }
      });
   });
</script>
<script type="text/javascript">      
    $(document).ready(function(){
      var maxField = 1000; //Input fields increment limitation
      var addButton = $('.add_button'); //Add button selector
      var wrapper = $('.field_wrapper'); //Input field wrapper
      var fieldHTML = '<div class="tbl_input"><input type="file" name="r_img_name[]" /><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-minus fa-lg" aria-hidden="true"></i></a></div>'; //New input field html 
      var x = 1; //Initial field counter is 1
     
      $(addButton).click(function(){ 

      //Once add button is clicked
        if(x < maxField){
          
         //Check maximum number of input fields
          x++; //Increment field counter
          $(wrapper).append(fieldHTML); // Add field html
        }
      });
      $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
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
<script type="text/javascript">
  $(document).ready(function() {
        $( "#r_maintype_id" ).change(function() {
              var r_maintype_id = $("#r_maintype_id").val();
              $.ajax({
              url: '<?php echo base_url(); ?>admin/restaurant/appendcategories',
              type: 'POST',
              data: {'r_maintype_id':r_maintype_id},
              success: function(data){
                    $('#category_id').html(data);  
              }
              });
      });
  });
</script>
