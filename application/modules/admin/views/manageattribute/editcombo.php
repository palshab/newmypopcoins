  
 <!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> -->
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>  
  <script src="<?php echo base_url()?>assets/js/jquery-1.9.1.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.validate.min.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"> 
  <!-- jQuery Form Validation code -->
  <style>
    input.error{border:1px solid red!important;}
    select.error{border:1px solid red!important;}
    textarea.error{border:1px solid red!important;}
    .error{border:1px solid red;}
    label.error{border:0px solid red!important; color:red; font-weight: normal; display:inline; }
  </style>

  <script language='javascript'>
  
  // When the browser is ready...
  $(document).ready(function() {
  
  // Setup form validation on the #register-form element
    $("#addCont").validate({
        // Specify the validation rules
        rules: {
            cattype         : "required",
            category_name   : "required",
            cat_description : "required",
            category_url    : "required",
            meta_title      : "required",
            meta_desc       : "required",
            meta_keywords   : "required",
            cat_level       : "required",
            cbcheck         : "required",
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
            cattype         : "Choose Category type",
            category_name   : "Category Name is required",
            cat_description : "Category Description is required",
            meta_title      : "Meta title is required",
            meta_desc       : "Meta Description is required",
            meta_keywords   : "Meta Keywords is required",
            cat_level       : "Choose Sort Order",
            cbcheck         : "Required",
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
  

        $(function () { 
            $(".datepicker").datepicker({ 
                altField: "#alternate", 
                altFormat: "DD, d MM, yy", 
                dateFormat: "yy-mm-dd" 
            }); 
        }); 


</script>

<div class="wrapper">
<?php $this->load->view('helper/sidebar')?> 

 <div class="col-lg-10 col-lg-push-2">
        <div class="row">

            <div class="page_contant">
            
                <div class="col-lg-12">
                    <div class="page_name">
                        <h2>Add Combo</h2>
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

        <form id="addCont" action="" method="post" >


                        <div>
                        <div class="sep_box">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">Combo Name</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><input id="combo_name" name="combo_name" type="text" class="required" field="Name" value="<?php echo $comboinfo[0]->name ?>" /></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">Combo Quanity</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input">
                                            <input id="combo_qty" type="text" name="cQuantity" class="required" field="Quantity" 
                                            value="<?php echo $comboinfo[0]->comboqty ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="sep_box">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">Date</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><input type="text" id="from"  field="From Date"  name="from"  class="datepicker required" placeholder="Start Date" readonly='true' value="<?php echo $comboinfo[0]->start_date ?>"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">Between</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"> <input type="text" id="to" name="to" field="To Date"  class="datepicker  required" placeholder="End Date"  readonly='true' value="<?php echo $comboinfo[0]->end_date ?>"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sep_box">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">Ingridients</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><textarea name="ingridients" id="ingridients_des"><?php echo $comboinfo[0]->ingridients ?></textarea></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">About Description</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><textarea name="about" id="combo_description"><?php echo $comboinfo[0]->about ?></textarea></div>
                                    </div>
                                </div>
                            </div>


                            <div style="text-align:right;">
                                 <input type="submit" name="updatecombo" value="submit">
                            </div>
                        </div>

    </form>                    
                        <?php
 $i=1;
 ?>
                     
                        </div>

 
                    </div>
      

          <!--      
                    <div class="page_box">
    <div class="col-lg-12">
    <div class="gridview">
    <form id="submitform" >
    <table id="test" class="grid_tbl">
    <thead>
    <tr>
      <th bgcolor="red">Category</th>
      <th bgcolor="red">Sub Category</th>
      <th bgcolor="red">Product</th>
      <th bgcolor="red">Quanity</th>
      <th bgcolor="red">MRP(per Quanity)</th>
      <th bgcolor="red">Selling Price(Per Quanity)</th>
      <th bgcolor="red">Combo Price</th>
      <th bgcolor="red">Action</th>
      
    </tr>
    </thead>
    
    <tbody id="combotable">
            <tr id="combotr">
            <td>
            <select name='category' id="mcatidd" onchange="childcategory($(this));" >
            <option value="">Select Category</option>
            <?php foreach ($parentCatdata as $key => $value) {
            ?>
            <option value="<?php echo $value->catid ?>"><?php echo $value->catname ?></option>
            <?php }?>
            </select>

            </td>
            <td id="subcat">
           

            </td>
            <td id="products">
          


            </td>
            <td>

            <input type="text" name="quantity" onkeyup="updateQuantity();" value="" id="idff" class="idff" >

            </td>
            <td>
            <input type="text" class="mrp" id="mrpprice" name="mrp" value="" style="width:100px;" readonly="true">

            </td>
            <td>
            <input type="text" class="sellingprice" id="finalprice" name="sellingprice" value="" style="width:100px;" readonly="true">

            </td>
            <td>
                <input type="text" class="comboprice" name="comboprice" onkeyup="updateComboPrice();" value="">
            </td>
            <td>
                <a href="javascript:void(0);" onclick="AddRow();">Add</a> / <a href="javascript:void(0);" onclick="RemoveRow($(this));">Remove</a>
            </td>

            </tr>
      </tbody>
       


    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Total Quantity</td>
        <td><span id="tlQty"></span></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

        <td>Total Combo Price</td>
          <td id="tlcp">0</td>
        <td></td>
    </tr>



<tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

         <td>Discount(%)</td>
          <td id="discount">0</td>
        <td></td>
    </tr>







    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Total Selling Price</td>
        <td><span id="tlsp"></span></td>
        <td></td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Total Savings Price</td>
        <td id="tlsv">0</td>
        <td></td>
    </tr>
  <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><input type="button" value="Save" name="" onclick="save_combo_offer()"></td>
        <td></td>
    </tr>
  </form>

   </table>
   
     
  </div>
  </div>
  </div> -->
                </div>
              
            </div>
        

        </div>
 </div>
    </div> 
    

<script>
    var glob_id = 0;

     function childcategory(elem){

    //var catid=$('#mcatidd').val();
     //alert(catid);
     var catid = elem.val();
     //alert(catId); 
    if(mcatidd==0){
        $('#childcat').hide();
    }else{
        $('#childcat').show();
    }
     
    $.ajax({
        url: '<?php echo base_url()?>admin/attribute/get_subcat',
        type: 'POST',
        //dataType: 'json',
        data: {'catid': catid},
        success: function(data){
            
            $('#subcat', elem.parent().parent()).html(data);
            
        }
    });
    
   }

 

 function get_products(elev)
 {
    //var catid = $("#catidd").val();
    
    var catid = elev.val();
   // alert(catid); 
    $.ajax({
        url: '<?php echo base_url()?>admin/attribute/get_products',
        type: 'POST',
        //dataType: 'json',
        data: {'catid': catid},
        success: function(data){
            //alert(data); return false;
           $('#products', elev.parent().parent()).html(data); 
           //$("#productid").append(data); 
           //return false;
        }
    });
 }  


function productprice(elev)
 {
    //var productid = $("#productid").val();
     var productid = elev.val();
    //alert(productid); return false;
    $.ajax({
        url: '<?php echo base_url()?>admin/attribute/productprice',
        type: 'POST',
        dataType: 'json',
        data: {'productid': productid},
        success: function(data){
            console.log(data);
            //alert(data); return false;
            $('#mrpprice', elev.parent().parent()).val(data.productMRP); 
            $('#finalprice', elev.parent().parent()).val(data.FinalPrice); 
            //$("#mrpprice").val(data.productMRP);
            //$("#finalprice").val(data.FinalPrice); 
            
           
        }
    });
 }  
function AddRow() {
  $('#combotable').append('<tr>'+$('#combotr').html()+'</tr>');
  $('#subcat', '#combotable tr:last').html('');
  $('#products', '#combotable tr:last').html('');
}

function RemoveRow(elem) {
  var rowCount = $('#combotable tr').length;
  if(rowCount > 1) {
    elem.parent().parent().remove();
  }
}


function updateQuantity() {
   var totalQty = 0;
   //$('input[name=quantity]').each(function() {
    $('.idff').each(function() {
     
     totalQty += parseFloat($(this).val());
      
   });
    //alert(totalQty); return false;
   $('#tlQty').html(totalQty);
}

function updateComboPrice() {
  var totalCp = 0;
  var totalSp = 0;
  var qty=0;
  var totalMrp=0;
  
 

   $('.sellingprice').each(function() {
     qty = $('.idff').val();

     totalSp += (qty*(parseFloat($(this).val())));

   });

$('.comboprice').each(function() {
      qty = $('.idff').val();
     totalCp += (qty*parseFloat($(this).val()));
   });


  $('.mrp').each(function() {
     qty = $('.idff').val();
     totalMrp += (qty*(parseFloat($(this).val())));
   });

   

  var disPer = Math.round(((totalMrp-totalCp)*100)/totalSp);
    $('#discount').html(disPer);
    $('#tlcp').html(totalCp);
    $('#tlsp').html(totalSp);
    $('#tlsv').html(totalSp-totalCp);
}



function save_combo_offer()
{
  //var formData = new FormData($('#'+addCont)[0]);

   

  var baseurl = "<?php echo base_url();?>";
  var name = $('input[name=combo_name]').val();
  var img = $('input[name=image]').val();
  

  var frm = $('input[name=from]').val();
  var to = $('input[name=to]').val();
  
  var quanityv = $('input[name=cQuantity]').val();
  var about=$('textarea[name=about]').val();
  var ingri=$('textarea[name=ingridients]').val();



//alert(img); return false;


var totaqty = $('#tlQty').text();
var totocomboprice = $("#tlcp").text();
var discount = $("#discount").text();
var totalseleing = $("#tlsp").text();
var totalsaving = $("#tlsv").text();

 
  
var arr = new Array();

 $('.products').each(function() {
    
    var tempArr = new Array();
    tempArr = {'cat':    $('select[name=category]',$(this).closest('tr')).val(),
                'subcat':$('.catidd',$(this).closest('tr')).val(),
                'product':$(this).val(),
                'quantity':$('input[name=quantity]',$(this).parent().parent()).val(),
                'price':$('input[name=comboprice]',$(this).parent().parent()).val(),
                'mrp': $('input[name=mrp]',$(this).parent().parent()).val(),
                'sellingprice': $('input[name=sellingprice]',$(this).parent().parent()).val(), 
            };
    arr.push(tempArr);
  });


$.ajax({
       url: '<?php echo base_url()?>admin/attribute/formsubmit',
      type: 'POST',
      
        data: { 'fordata':arr,'name':name,'from':frm,'to':to,'cquanity':quanityv,'about':about,'ingri':ingri,'totalqty':totaqty,'totocomboprice':totocomboprice,'discount':discount,'totalseleing':totalseleing,'totalsaving':totalsaving ,'img':img  },
        success:function(data){ 
           alert(data);
           return true;
      } 

  });



}

function validation() {
    var error = false;
    $('.required').each(function() {
        if(!$(this).val()) {
            alert($(this).attr('field') + ' is Missing!');
            $(this).focus();
            error = true;
            return false;
        }
    });
    return error;
}



/*function checkproductqty()
{

    var productid = $("#productid").val();
    var inputqty = $('#idff').val();
    $.ajax({
        url: '<?php //echo base_url()?>admin/attribute/productqtycheck',
        type: 'POST',
       // dataType: 'json',
        data: {'productqtyi': inputqty,'productid':productid},
        success: function(data){
            alert(data);
           
        }
    });
  
}*/
function file_upload_ajax(fupid) {
  //console.log(fupid);
  //alert(fupid);
  var getId=fupid;
  var data1 = new FormData();
    $.each($('#'+getId)[0].files, function(i, file) {
    data1.append(i, file);
  });
    
  var baseUrl ="<?php echo base_url();?>";
  var url_cintroller = baseUrl+'admin/attribute/image_upload';
  $.ajax({
    url:url_cintroller,
    type: "POST",
    data:data1,
    enctype: 'multipart/form-data',
    processData: false,  // tell jQuery not to process the data
    contentType: false   // tell jQuery not to set contentType
   }).done(function(data) {
    alert(data); return false;
    /*var data_t_1= data.replace('"', "");
    $('#pro_img'+getId).val(data_t_1);*/
  });
}
</script>
   
