<?php

//p($vieww);
//exit;
?>


<!DOCTYPE html>
<html>
<body>
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
     <style type="text/css">

    .alert-close {
    background: rgba(255,255,255,0.1);
    
    color: #000000;
    cursor: pointer;
    float: right;
    font-size: 25px;
    
    
    
}
    </style>
    <script type="text/javascript">
    $(document).ready(function(c) {
        $('.alert-close').on('click', function(c){
            $(this).parent().fadeOut('slow', function(c){
                location.reload();
            });
        }); 
    });
    </script>
    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar');?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Deals Listing</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can view the list of all deals!</p>
                                <p>
                                <div class='flashmsg'>
                                    <?php echo validation_errors(); ?> 
                                    <?php
                                      if($this->session->flashdata('message')){
                                        echo $this->session->flashdata('message'); 
                                      }
                                    ?>
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                    $('#example').DataTable();
                                    } );
                                </script>
                                </p>
                            </div>
                        </div>

                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl" id="example">
                                        <thead>
                                            <tr>
                                                <th bgcolor='red'>S.No.</th>
                                                 <th bgcolor='red'>Deal Id</th>
                                                <th bgcolor='red'>Retailer Id</th>
                                                <th bgcolor='red'>Deal Image</th>
                                                <th bgcolor='red'>Category</th>
                                                <th bgcolor='red'>Store Name</th>
                                                <th bgcolor='red'>Type Of Deal</th>
                                                <th bgcolor="red">From  Date</th>
                                                <th bgcolor="red">To Date</th>
                                                <th bgcolor='red'>Action</th>                                             
                                            </tr>
                                        </thead>
                                             <tbody>

                                        <?php $i=0;
                                            foreach ($vieww as $value) {
                                            $i++;
                                        ?>
                                         <tr id="trnew<?php echo $i;?>">
                                            <td><?php echo $i; ?></td>
                                             <td ><a href="#trnew<?php echo $i-1;?>" onclick="showdealdetailstr('<?php echo $i; ?>')"><?php echo $value->deal_id; ?></a></td>
                                             <td><?php echo $value->retailer_codeid; ?></td>
                                             <td><img width="50px;" height="50px;" src="<?php echo base_url().'public/offermenu-images/'.$value->o_menu; ?>"></td>
                                           
                                            <td><?php echo $value->categorydeal_name; ?></td>
                                            <td><?php echo $value->s_name; ?></td>
                                          
                                            <td><?php echo $value->offer_title; //offer_title; ?></td>
                                            <td><?php echo $value->o_start_date; ?></td>
                                            <td><?php echo $value->o_end_date; ?></td>
                                         
                                            <td><a href="<?php echo base_url()?>admin/offer/updateoffer/<?php echo $value->offer_id?>" ><i class="fa fa-pencil"></i> </a> 
                                            <?php if($this->session->userdata('popcoin_login')->s_usertype==4) { 
                                            if($value->o_status=='1') echo '<span style="color:green;">Active</span>'; else echo '<span style="color:red;">Inactive</span>';
                                            } else { ?> 
                                             
                                            <a href="<?php echo base_url(); ?>admin/offer/statusoffer/<?php echo $value->offer_id.'/'.$value->o_status; ?>/<?php echo $this->uri->segment(4);?>"><?php if($value->o_status=='1') echo 'Active'; else echo '<span style="color:red;">Inactive</span>'; ?></a>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                      
                                        <style>.str{display:none;}</style>
                                         <div id="showdiv">
                                        <tr class="dealdetailstr str"  id="sho_<?php echo $i; ?>">
                                            <td colspan="10">
                                                <div class="alert-close">×</div>
                                                <div class="deal_detail">
                                                    <div class="deal_left"><div class="d_image"><img width="50px;" height="50px;" src="<?php echo base_url().'public/offermenu-images/'.$value->o_menu; ?>"></div></div>
                                                    <div class="deal_right">
                                                        <div class="deal_row">
                                                            <div class="deal_d2"><div class="deal_text">Deal ID : <span><?php echo $value->deal_id; ?></span></div></div>
                                                            <div class="deal_d2"><div class="deal_text">Store ID : <span>MY0265248</span></div></div>
                                                        </div>
                                                        <div class="deal_row">
                                                            <div class="deal_d2"><div class="deal_text">Store Name : <span>Abc Stroe</span></div></div>
                                                            <div class="deal_d2"><div class="deal_text">Company Name : <span><?php echo $value->s_username; ?></span></div></div>
                                                        </div>
                                                        <div class="deal_row"> 
                                                            <div class="deal_d2"><div class="deal_text">Deal Type : <span><?php echo $value->offer_title; ?></span></div></div>
                                                            <div class="deal_d2"><div class="deal_text">Tagline : <span><?php echo $value->Tagline; ?></span></div></div>
                                                        </div>
                                                        <div class="deal_row">
                                                            <div class="deal_d2"><div class="deal_text">Deal Start Date : <span><?php echo $value->o_start_date ?></span></div></div>
                                                            <div class="deal_d2"><div class="deal_text">Deal End Date : <span><?php echo $value->o_end_date ?></span></div></div>
                                                        </div>
                                                        <div class="deal_row">
                                                            <!-- <div class="deal_d2"><div class="deal_text">Deal Time : <span><?php if($value->o_offer_type==2) { echo $value->om_start_time; } else {echo '';} ?></span></div></div> -->
                                                            <div class="deal_d2"><div class="deal_text">Deal Fully/Partially : <span><?php if($value->o_offer_type==2) { echo 'Partially'; } else { echo 'Fully'; } ?></span></div></div>
                                                        </div>
                                                        <div class="deal_row"> 
                                                            <div class="deal_d2"><div class="deal_text">Category : <span><?php echo $value->categorydeal_name; ?></span></div></div>
                                                            <div class="deal_d2"><div class="deal_text">Cost in Popcoins : <span>Rs. 
                                                            <?php echo $value->cosinpopcoins; ?></span></div></div>  
                                                        </div>
                                                        <div class="deal_row">
                                                            <div class="deal_d1"><div class="deal_text">Deal Commission : <span><?php echo $value->commission; ?></span></div></div>
                                                            
                                                        </div>
                                                        <div class="deal_row">
                                                            <div class="deal_d1"> 
                                                            <div class="deal_text">Product description </div>
                                                            <div class="deal_text_b"><!-- Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. -->
                                                            <?php echo $value->o_desc; ?>
                                                            </div></div>
                                                            
                                                        </div>
                                                        <?php
                                                if($this->session->userdata('popcoin_login')->s_admin_id==$value->d_createdby)
                                                        {
                                                        ?>
                                                       
                                                        <div class="deal_row">                                       
                                                            <select name="dealstatus" id="dealstatus_<?php echo $i; ?>">
                                                            <?php foreach ($dealstatus as $key => $value1) { ?>
                                                            <option value="<?php echo $value1->dealstatus_id.'/'.$value1->deal_name; ?>"><?php echo $value1->deal_name; ?></option>
                                                            <?php } ?>
                                                            </select> 
                                                            <a href="javascript:void();" onclick="approvedeal(<?php echo $i; ?>)" class="sbt_btn">Submit</a>                                          
                                                        </div>
                                                            <?php } ?>
                                                        <div class="deal_row issuediv" style="display:none;">
                                                            <input type="hidden"  class="dealid_<?php echo $i; ?>" name="dealid" value="<?php echo $value->offer_id; ?>">
                                                             <div class="deal_d1"><div class="deal_text" style="padding-bottom:10px;">Reason of Issue: </div></div>
                                                            <div class="deal_d1">
                                                                <textarea class="t_area_<?php echo $i; ?>" cols="50" rows="4"></textarea>
                                                                <a href="javascript:void();" onclick="issuedealfun(<?php echo $i; ?>)" class="sbt_btn">Submit</a>
                                                            </div>                                                           
                                                        </div>
                                                    </div>

                                                </div>
                                            </td>
                                            
                                        </tr>
                                    </div>
                                       
                                    <?php } ?>
                                   
                                        </tbody>
                                    </table>
                                    
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
<style type="text/css">
.deal_detail{
    float:left;
    width:100%;
    height:auto;
    background:#f1f1f1;
    padding:10px 10px;
}
.deal_left{
    float:left;
    width:25%;
}
.d_image{
    float:left;
    width:100%;
    background: #fff;
    padding:6px 6px;
}
.d_image img{
    width:100%;
}
.deal_right{
    float:left;
    width: 75%;
    padding: 0px 20px;
}
.deal_row{
    float:left;
    width:100%;
    padding:7px 0px;
}
.deal_d2
{
    float:left;
    width:50%;
    padding:0px 10px;
}
.deal_d1
{
    float:left;
    width:100%;
    padding:0px 10px;
}
.deal_text
{
    float:left;
    width:100%;
    font-weight:600;
}
.deal_text_b
{
    float:left;
    width:100%;
    font-weight:400;
    padding:8px 0;
}
.deal_text span{
    font-weight:400!important;
    margin-left:15px;
}
.approve_btn
{
    float:right;
    padding:8px 12px;
    background: green;
    color:#fff!important;
}
.issue_btn
{
    float:right;
    padding:8px 12px;
    background: red;
    color:#fff!important;
    margin-left:8px;
}
.t_area{
    float:left;
    width:60%;
}
.sbt_btn{
    /*float:left;*/
    padding:6px 15px;
    background: red;
    color:#fff!important;
    margin-left:8px;
}

.d_image img {
    width: 200px;
    height: 252px;
    text-align: center;
}

 </style>
<script type="text/javascript">
    

function changedealstatus(id)
{
 
    
    
   var statval =  $("#changestatus"+id).val();

   //alert(statval); return false;
    $.ajax({
              url: '<?php echo base_url(); ?>admin/offer/changestatus/'+id,
              type: 'POST',
              data: {'statusvalue':statval},
              success: function(data){
                location.reload();
              }
              });


    
}


function showdealdetailstr(id)
{



  //$('.dealdetailstr').closest('tr').prev().addClass('str');
  //remove class from previous row
  //$('#sho_'+id).closest('tr').prev().removeClass('str');
  //add class to this row
  $('.dealdetailstr').closest('tr').addClass('str');
  //remove class from this row
  $('#sho_'+id).closest('tr').removeClass('str');





}


$('.issue_btn').click(function(event) {
    
    $('.issuediv').removeClass('issuediv');

});


function issuedealfun(newdealid)
{
    var dealid      = $(".dealid_"+newdealid).val();    
    var issuereason  =  $(".t_area_"+newdealid).val();
    var dealstatusid      = $("#dealstatus_"+newdealid).val();
    var arrdealstatusid = dealstatusid.split('/');
    $.ajax({
    url: '<?php echo base_url(); ?>admin/offer/dealissue',
    type: 'POST',
    data: {'issuere':issuereason,'dealid':dealid,'dealstatusid':arrdealstatusid[0],'dealstatus':arrdealstatusid[1]},
    success: function(data) {
        alert("Successfully Done");
        location.reload();
    }
    });
}

function approvedeal(uniqueid)
{   
    var dealid = $('.dealid_'+uniqueid).val();
    var dealstatusid = $("#dealstatus_"+uniqueid).val();
    var arrdealstatusid = dealstatusid.split('/');
    if(arrdealstatusid[0]==7)
    {
        $('.issuediv').show();
        return false;
    } else {
        $('.issuediv').hide();
    }
    $.ajax({
        url: '<?php echo base_url(); ?>admin/offer/dealapprove',
        type: 'POST',
        data: {'dealid':dealid,'dealstatusid':arrdealstatusid[0],'dealstatus':arrdealstatusid[1]},
        success: function(data){
            alert("Successfully Done");
            location.reload();
        }
    });
}


function showdealdetailstr(id)
{



  
  $('.dealdetailstr').closest('tr').addClass('str');
  $('#sho_'+id).closest('tr').removeClass('str');

      // $('#dealfilter').scrollTop(0);
      // $('html, body').animate({scrollTop: $('#showdiv').offset().top}, 1000);

//       $("#button").click(function (id) {
//       $('html, body').animate({
//         scrollTop: $('#sho_'+id).offset().top - 20
//     }, 'slow');
// });



}
</script>