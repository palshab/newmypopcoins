<!DOCTYPE html>
<html>

<body>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <form action="" id="proForm" method="post" enctype="multipart/form-data" >
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Add Product</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can add product!
                                    <a href="<?php echo base_url();?>admin/product/viewproducts/<?php echo $this->uri->segment(4);?>"><button type="button" style="float:right;">CANCEL</button></a></p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">
                                <div class="col-lg-12">
                                    <div class="row">

                                        <input type="hidden" name="res_id" value="<?php echo $this->uri->segment(4);?>" />
                                        <!-- <div class="sep_box">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Product Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="pro_name" id="pro_name" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Product Price (In Rs.)<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="text" name="pro_price" id="pro_price" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Product Image <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input type="file" name="pro_image" id="pro_image" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="sep_box">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Product Description </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <textarea type="text" name="pro_desc" id="pro_desc"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </div> -->
                            <div class="sep_box">
                                <div class="col-lg-12">
                                    <a href="javascript:void(0);" class="add_row" title="Add row"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Add Row</a>
                                    <table class="grid_tbl" style="margin-top:25px;">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Is Veg?</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="append"> 
                                    <tr class="append_wrapper">
                                        <td><select type="text" name="cat_id[]" id="cat_id">
                                                <option value="">-- Select Category --</option>
                                                <?php foreach($procats as $val) { ?>
                                                <option value="<?php echo $val->cat_id;?>"><?php echo ucwords($val->cat_name);?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td><input type="text" name="pro_name[]" id="pro_name" /></td>
                                        <td><input type="text" name="pro_price[]" id="pro_price" /></td> 
                                        <td><input type="checkbox" name="pro_type[]" value="1" /> Yes</td>
                                        <td><input type="file" name="pro_image[]" id="pro_image" /></td> 
                                        <td><textarea type="text" name="pro_desc[]" id="pro_desc"></textarea></td>
                                        <td><a href="javascript:void(0);" class="remove_row" title="Remove field"><i class="fa fa-minus fa-lg" aria-hidden="true"></i></a></td>
                                    </tr>                
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                                        <div class="sep_box">
                                            <div class="col-lg-8">
                                                <div class="row">
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
    $("#proForm").validate({
          // Specify the validation rules
          rules: {
              "cat_id[]" : "required",
              "pro_name[]" : "required",
              "pro_price[]" : { required: true, number: true }
          },
          
          messages: {
              "cat_id[]" : "This field is required!",
              "pro_name[]" : "This field is required!",
              "pro_price[]" : { required: "This field is required!", number: "Numeric only!" }
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
      var addButton = $('.add_row'); //Add button selector
      var removeButton = $('.remove_row'); //Add button selector
      var x = 1; //Initial field counter is 1
     
      $(addButton).click(function(){ 
        if(x < maxField){
            x++; 
            $(".append_wrapper").clone().removeClass("append_wrapper").appendTo(".append");
        }
      });
      $(removeButton).click(function(e){ 
            e.preventDefault();
            var td_div = $(this).parent('td');
            td_div.parent('tr').remove(); //Remove field html
            x--; //Decrement field counter
      });
    });
</script>