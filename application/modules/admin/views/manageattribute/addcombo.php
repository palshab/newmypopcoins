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
<form id="addCont" action="<?php base_url();?>image_upload" method="post" enctype="multipart/form-data" >
         <div class='flashmsg'>
            <?php
              if($this->session->flashdata('message')){
                echo $this->session->flashdata('message'); 
              }
            ?>
        </div>
        </div></div>
                       
                        <div>
                        <div class="sep_box">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">Combo Name</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><input id="combo_name" name="combo_name" type="text" class="required" field="Name" /></div>
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
                                            <input id="combo_qty" type="text" name="cQuantity" class="required" field="Quantity" />
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
                                        <div class="tbl_input"><input type="text" id="from"  field="From Date"  name="from" value="" class="datepicker required" placeholder="Start Date" readonly='true'></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">Between</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"> <input type="text" id="to" name="to" field="To Date" value="" class="datepicker  required" placeholder="End Date"  readonly='true'></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="sep_box">
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="tbl_text">Range1</div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tbl_input"><input type="number" name="range1[]"  id="range1" class="range1" min="1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">To</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><input type="number" name="range1[]"  id="range1" class="range1" min="1"></div>
                                    </div>
                                </div>
                            </div>

                             <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">Price1 %</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><input type="number" name="price1"  id="price1" class="need" min="1"></div>
                                    </div>
                                </div>
                            </div>



                             


                        </div>




                      <div class="sep_box">
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="tbl_text">Range2</div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tbl_input"><input type="number" name="range2[]"  id="range2" class="range2" min="1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">To</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><input type="number" name="range2[]"  id="range2" class="range2" min="1"></div>
                                    </div>
                                </div>
                            </div>

                             <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">Price2 %</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><input type="number" name="price2"  id="price2" class="need" min="1"></div>
                                    </div>
                                </div>
                            </div>

                           

                        </div>
                        




                  <div class="sep_box">
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="tbl_text">Range3</div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tbl_input"><input type="number" name="range3"  id="range3" class="range3" min="1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">To</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><input type="number" name="range3"  id="range3" class="range3" min="1"></div>
                                    </div>
                                </div>
                            </div>

                             <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">Price3 %</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><input type="number" name="price3"  id="price3" class="need" min="1"></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="sep_box">


                          <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="tbl_text">City group1 </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tbl_input"><input type="number" name="city1"  id="city1" class="need" min="1"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">City group2 </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><input type="number" name="city2"  id="city2" class="need" min="1"></div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">City group3 </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><input type="number" name="city3"  id="city3" class="need" min="1"></div>
                                    </div>
                                </div>
                            </div>



                        </div>            






                        <div class="sep_box">
                           
                           <!--  <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">Ingridients</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><textarea name="ingridients" id="ingridients_des"></textarea></div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="tbl_text">About Description</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="tbl_input"><textarea name="about" id="combo_description"></textarea></div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <?php
 $i=1;
 ?>
                     
                        </div>

  <!--  ---------------------------------------------- Child category  -------------------------------->




  <!--  ---------------------------------------------- child category  -------------------------------->


<!-- 
                        <div class="sep_box">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-8">
                                        <div class="submit_tbl">
                                            <input id="submit" name="submit" type="submit" value="Submit" class="btn_button sub_btn" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> -->
                    </div>
      

                  <!--   <form method="post" action="<?php echo base_url(); ?>admin/attribute/image_upload" enctype="multipart/form-data" >
                    <input type="file" name="image" value="Upload Receipt">
                    <input type="submit" name="">
                    </form>   -->
                    <div class="page_box">
    <div class="col-lg-12">
    <div class="gridview">
    <form id="submitform" >
    <table id="test" class="grid_tbl">
    <thead>
    <tr>
      <th bgcolor="red">Brand</th>
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
            <!-- This Chaild category fuction by which we get child category of main category -->
            <!-- onchange="childcategory($(this));" -->
            <select name='brandid' class="brandid" id="mcatidd" onchange="barndcategory($(this));" >
            <option value="">Select Brand</option>
            <?php foreach ($branddata as $key => $value) {
            ?>
            <option value="<?php echo $value->id ?>"><?php echo $value->brandname; ?></option>
            <?php }?>
            </select>

            </td>

            <td id="mainsubcat" class="mainsubcat">
            <!-- <select name="catidd" id="catidd" onchange="categoryproduct();" >
            <option value="">Select Category</option>
            </select> -->


            </td>


            <td id="subcat">
            <!-- <select name="catidd" id="catidd" onchange="categoryproduct();" >
            <option value="">Select Category</option>
            </select> -->


            </td>
            <td id="products">
            <!--  <select name="productid" id="productid" onchange="productprice();" >
            <option value="">Select Category</option>
            </select> -->


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
        <td>Total MRP Price</td>
        <td id="tlmrp">0</td>
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
  </div>
                </div>
              
            </div>
            <!---------------------- view category ---------------------------------------->
     
                
<!---------------------- view category ---------------------------------------->

        </div>
 </div>
    </div> 
    

<script>

 function barndcategory(elem){

    //var catid=$('#mcatidd').val();
     //alert(catid);
     var brandid = elem.val();
    
    if(mcatidd==0){
        $('#childcat').hide();
    }else{
        $('#childcat').show();
    }
     
    $.ajax({
        url: '<?php echo base_url()?>admin/attribute/get_maincategory',
        type: 'POST',
        //dataType: 'json',
        data: {'brandids': brandid},
        success: function(data){
               // alert(data); return false;
            $('#mainsubcat', elem.parent().parent()).html(data);
            
        }
    });
    
   }













    var glob_id = 0;

     function childcategory(elem){

    //var catid=$('#mcatidd').val();
     //alert(catid);
     var catid = elem.val();
     //alert(catid);  return false;

      $('#childcat').show();
   /* if(mcatidd==0){
        $('#childcat').hide();
    }else{
        $('#childcat').show();
    }*/
     
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

    var rowCount = $('#combotable tr').length;

    if(rowCount<=14)
    {

        $('#combotable').append('<tr>'+$('#combotr').html()+'</tr>');
    }else{
        alert("You can not Add product more then 15 ");
        return false;
    }    
  
  
   


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
    qty1=parseInt(qty)+parseInt($(this).parent().prev().prev().find('.idff').val());
    
  
    totalSp += (qty1*(parseFloat($(this).val())));

   });
  
$('.comboprice').each(function() {
      //qty = $('.idff').val();
     qty1 = parseInt(qty)+$(this).parent().prev().prev().prev().find('.idff').val();
     
     totalCp += (qty1*parseFloat($(this).val()));
   });


  $('.mrp').each(function() {
     //qty = $('.idff').val();
     qty1 = parseInt(qty)+$(this).parent().prev().find('.idff').val();
     totalMrp += (qty1*(parseFloat($(this).val())));
   });

   

  //var disPer = Math.round(((totalMrp-totalCp)*100)/totalSp);
  

  var disPer = Math.round(((totalMrp-totalCp)/totalMrp)*100);
    $('#discount').html(disPer);
    $('#tlcp').html(totalCp);
    $('#tlsp').html(totalSp);
    $('#tlsv').html(totalSp-totalCp);
    $('#tlmrp').html(totalMrp);
}



function save_combo_offer()
{
  //var formData = new FormData($('#'+addCont)[0]);

   

  var baseurl = "<?php echo base_url();?>";
 
  /*var range1 =   $('input[name=range1]').val();
    
  alert(range1); return false;*/
  
  /*var range2 =
  var range3 =*/
var range = new Array();
  $('.range1').each(function(){

    var temprange = new Array();
       
        
        temprange = {
            'rangevalue': $(this).val(),

        };
        range.push(temprange);
        //console.log(range);
  });


  var range2 = new Array();
  $('.range2').each(function(){

    var temprange2 = new Array();
       
        
        temprange2 = {
            'rangevalue2': $(this).val(),

        };
        range2.push(temprange2);
        //console.log(range2);
  });


  var range3 = new Array();
 
  $('.range3').each(function(){

    var temprange3 = new Array();
       
        
        temprange3 = {
            'rangevalue3': $(this).val(),

        };
        range3.push(temprange3);
        //console.log(range3);
  });


 



var price1 = $('input[name=price1]').val();
var price2 = $('input[name=price2]').val();
var price3 = $('input[name=price3]').val();




  var name = $('input[name=combo_name]').val();
  var img = $('input[name=image]').val();
  

  var frm = $('input[name=from]').val();
  var to = $('input[name=to]').val();
  
  var quanityv = $('input[name=cQuantity]').val();
  var about=$('textarea[name=about]').val();
  var ingri=$('textarea[name=ingridients]').val();


    var city1 = $("#city1").val();
      var city2 = $("#city2").val();
        var city3 = $("#city3").val();



//alert(img); return false;


var totaqty = $('#tlQty').text();
var totocomboprice = $("#tlcp").text();
var discount = $("#discount").text();
var totalseleing = $("#tlsp").text();
var totalsaving = $("#tlsv").text();

 
  
var arr = new Array();

 $('.products').each(function() {
    
    var tempArr = new Array();
    tempArr = { 'brandname':    $('select[name=brandid]',$(this).closest('tr')).val(),
                'cat'   :       $(this).parent('td').prev('td').prev('td').find('.barndcatid').val(),
                'subcat':       $(this).parent('td').prev('td').find('.catidd').val(),
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
      
     

        data: { 'fordata':arr,'name':name,'from':frm,'to':to,'cquanity':quanityv,'about':about,'ingri':ingri,'totalqty':totaqty,'totocomboprice':totocomboprice,'discount':discount,'totalseleing':totalseleing,'totalsaving':totalsaving ,'img':img,
            'price1':price1,'price2':price2,'price3':price3,'firstrange':range,'firstrange2':range2,'firstrange3':range3,'city1':city1,'city2':city2,'city3':city3      },
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
   
