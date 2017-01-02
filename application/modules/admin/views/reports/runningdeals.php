<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>


<!DOCTYPE html>

<html>
 <style>
    .retailer_nav {
        width:100%;
        float:left;
    }
    .retailer_nav ul {
        padding:0;
        margin:0;
    }
    .retailer_nav ul li {
        list-style:none;
        float:left;
    }
    .retailer_nav ul li a {
        display:block;
        float:left;
        padding:10px 20px;
        background:#fff;
        margin-right:5px;
        color:#333;
        text-decoration:none;   
    }
    .active_color {
        background:#2f2f2f !important;
        color:#FFF !important;
    }
    
.retailer_btn {
    outline: none;
    border: 0;
    padding: 10px 25px;
    background: #333;
    color: #FFF;
}   

 .add_btn {
    width: auto;
    height: auto;
    float: right;
    margin-right: 15px;
}
 
   .add_btn a {
       display:block;
       padding:10px 15px;
       background:#d84d28;
       color:#FFF;
       float:left;
       text-decoration:none;
       border-radius:5px;
       
   }
.add_100 {
    width:100%;
    float:left
}
 h2 {
  margin: 1.75em 0 0;
  font-size: 5vw;
}

h3 { font-size: 1.3em; }

.v-center {
  height: 100vh;
  width: 100%;
  display: table;
  position: relative;
  text-align: center;
}

.v-center > div {
  display: table-cell;
  vertical-align: middle;
  position: relative;
  top: -10%;
}

.btn {
  font-size: 12px;
  padding: 2px 5px;
  background-color: #fff;
  border: 1px solid #bbb;
  color: #333;
  text-decoration: none;
  display: inline;
  border-radius: 4px;
  -webkit-transition: background-color 1s ease;
  -moz-transition: background-color 1s ease;
  transition: background-color 1s ease;
}

.btn:hover {
  background-color: #ddd;
  -webkit-transition: background-color 1s ease;
  -moz-transition: background-color 1s ease;
  transition: background-color 1s ease;
}

.btn-small {
  padding: .1em 1em;
  font-size: 0.8em;
}

.modal-box {
  display: none;
  position: absolute;
  z-index: 1000;
  width: 98%;
  height: auto;
margin-top: 15%;
margin-left: 5%;
  background: white;
  border-bottom: 1px solid #aaa;
  border-radius: 4px;
  box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
  border: 1px solid rgba(0, 0, 0, 0.1);
  background-clip: padding-box;
}
@media (min-width: 32em) {

.modal-box { 
width: 90%;
height: auto;
margin-top: 15%;
margin-left: 5%;
 }
}

.modal-box header,
.modal-box .modal-header {
  padding: 1.25em 1.5em;
  border-bottom: 1px solid #ddd;
}

.modal-box header h3,
.modal-box header h4,
.modal-box .modal-header h3,
.modal-box .modal-header h4 { margin: 0; }

.modal-box .modal-body { padding: 2em 1.5em; }

.modal-box footer,
.modal-box .modal-footer {
  padding: 1em;
  border-top: 1px solid #ddd;
  background: rgba(0, 0, 0, 0.02);
  text-align: right;
}

.modal-overlay {
  opacity: 0;
  filter: alpha(opacity=0);
  position: absolute;
  top: 0;
  left: 0;
  z-index: 900;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.3) !important;
}

a.close {
  line-height: 1;
  font-size: 1.5em;
  position: absolute;
  top: 5%;
  right: 2%;
  text-decoration: none;
  color: #bbb;
}

a.close:hover {
  color: #222;
  -webkit-transition: color 1s ease;
  -moz-transition: color 1s ease;
  transition: color 1s ease;
}
 
 </style>

<body>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Retailer List</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, Retailer List!
                                  
                            </div>
                        </div>
                    </div>
              
 
        <div class="page_box" id="storelistingdiv">
             <div class="sep_box">
             
             <table class="grid_tbl" id="example">
                                    <thead>
                                        <tr>
                                            <th bgcolor="red">S.No.</th>
                                                <th bgcolor="red">Retailer Id</th>
                                                <th bgcolor="red">Company Name</th>
                                                <th bgcolor="red">Deal ID </th>
                                                <th bgcolor="red">Start Date</th>
                                                <th bgcolor="red">Expiry Date</th>
                                                <!-- <th bgcolor="red">Deal Time</th> -->
                                                <!-- <th bgcolor="red">Points Redeemed</th>  -->
                                                <th bgcolor="red">Commision %</th>
                                                <!-- <th bgcolor="red">Commision Amount</th>   -->
                                        </tr>
                                    </thead>
                                    
                                    
                                    <tbody class="append"> 
                                    <?php 
                                        $i = 1;
                                            foreach ($vieww as $key => $value) {
                                                
                                            ?>

                                            <tr class="append_wrapper">

                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $value->retailer_codeid; ?></td>
                                        <td><?php echo $value->s_username; ?></td>
                                        <td><?php echo $value->deal_id; ?>
                                          <a class="js-open-modal btn" href="javascript:void(0)" onclick="pop('<?php echo $value->offer_id; ?>')" data-modal-id="popup1">+</a>
                                        </td>
                                         <td><?php if($value->o_offer_type==2){echo 'Partial Deal';} else{ echo $value->o_start_date; } ?></td>
                                            <td><?php if($value->o_offer_type==2){echo 'Partial Deal';} else{ echo $value->o_end_date; } ?></td>
                                        <!-- <td><?php echo 'time' ?></td>  -->
                                        <td><?php echo $value->commission; ?></td>
                                    </tr> 
                                    <?php $i++; } ?>               
                                    </tbody>
                                    </table>
                                   
                                    
                                    
                
            </div>

           
        </div>     
              
                 
                           
                            
                            



            </div>
        </div>
    </div>
</div>




<div id="popup1" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <h3>Store Details</h3>
  </header>
  <div class="modal-body">
   
<div style="width: 100%;
height: 300px;
overflow-y: auto;">
   <table class="grid_tbl datainput" id="example">
                                        <thead>
                                            <tr>
                                                <th bgcolor='red'>S.No.</th>
                                                <th bgcolor='red'>Store ID</th>
                                                <th bgcolor='red'>Store Name</th>
                                                <th bgcolor='red'>Location</th>
                                                <!-- <th bgcolor="red">Points Redeemed</th>  -->
                                                <th bgcolor="red">Commision %</th>
                                                <!-- <th bgcolor="red">Commision Amount</th>   -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div id="datainput"></div>

                                        </tbody>
                                    </table>
                                </div>
  </div>
 
  <footer> <a href="#" class="btn btn-small js-modal-close">Close</a> </footer>
</div>




</body>
 <script type="text/javascript">
   $(document).ready(function() {
   $('#example').DataTable();
  } );
 </script>  
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script>

 function pop(ids)
    {
       $.ajax({
        url: '<?php echo base_url()?>admin/reports/dealstoreview',
        type: 'POST',
       
        data: {'id': ids},
        success: function(data){
     
        $(".datainput tbody").append(data);
           
         }

  });
    }
$(function(){

   

var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");

    $('a[data-modal-id]').click(function(e) {
        e.preventDefault();
    $("body").append(appendthis);
    $(".modal-overlay").fadeTo(500, 0.7);
    //$(".js-modalbox").fadeIn(500);
        var modalBox = $(this).attr('data-modal-id');
        $('#'+modalBox).fadeIn($(this).data());
    });  
  
  
$(".js-modal-close, .modal-overlay").click(function() {
    $(".modal-box, .modal-overlay").fadeOut(100, function() {
        $(".modal-overlay").remove();

    });
    location.reload(); 
 
});
 

 
});
</script>

</html>