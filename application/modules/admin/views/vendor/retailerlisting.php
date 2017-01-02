<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>

<style type="text/css">
    

    #storediv{

        display: none;
    }

    #storelistingdiv{
        display: block;
    }
</style>

<!DOCTYPE html>

<html>

<body>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <form action="" id="vendorForm" method="post" enctype="multipart/form-data">
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Retailer List</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, Retailer List!
                                 
                                  <a href="<?php echo base_url(); ?>admin/adminvender/addvendor/2" style="float:right;margin-left: 10px;"><button>ADD Retailer</button></a>
                            </div>
                        </div>
                      
                      
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
 </style>

      
              
              
               
                        
               <script type="text/javascript">
                                    $(document).ready(function() {
                                    $('#example').DataTable();
                                    } );
                                </script>           
                        
                        
                
                            
      
 
        <div class="page_box" id="storelistingdiv">
             <div class="sep_box">
             
             <table class="grid_tbl" id="example">
                                    <thead>
                                        <tr>
                                            <th bgcolor="red">S.No.</th>
                                               
                                                <th bgcolor="red">Profile Pic</th>
                                                <th bgcolor="red">Enrollment Date</th>
                                                <th bgcolor="red">Retailer Id</th>
                                                <th bgcolor="red">Retailer Name</th>
                                               <!--  <th bgcolor="red">Store Name</th> -->
                                               
                                                <!-- <th bgcolor="red">Category</th> -->
                                             
                                                <th bgcolor="red">Email id</th>
                                                <th bgcolor="red">Status</th>
                                               
                                        </tr>
                                    </thead>
                                    
                                    
                                    <tbody class="append"> 
                                    <?php 
                                        $i = 1;
                                            foreach ($vieww as $key => $value) {
                                         
                                            

                                            ?>
                                            <tr class="append_wrapper">


                                        <td><?php echo $i; ?></td>
                                        <td><img height="50" width="50" src="<?php echo base_url().'assets/images/'.$value->profile_pic; ?>"> </td> 
                                        <td><?php echo $value->ratiler_enrol_date; ?></td>
                                        <td><a href="<?php echo base_url(); ?>admin/adminvender/retailerstoreview/<?php echo $value->s_admin_id?>"><?php echo $value->retailer_codeid; ?></a></td>
                                        <td><?php echo $value->s_username; ?></td> 
                                        <!-- <td><?php echo $value->s_name; ?></td> -->
                                        <!-- <td><?php echo $value->categorydeal_name; ?></td> -->
                                        <td><?php echo $value->s_loginemail; ?></td>
                                        <td>
                                        <a href="<?php echo base_url(); ?>admin/adminvender/updateretailerstatus/<?php echo $value->s_admin_id.'/'.$value->s_userstatus; ?>/<?php echo $this->uri->segment(4);?>" ><?php if($value->s_userstatus=='1'){ ?>
                                        <span class="inactive_cl" onclick="submitreasonf('<?php echo $value->s_admin_id; ?>',<?php echo $value->s_userstatus; ?>)" >Active</span> <?php } else { echo '<span style="color:red;" title="Reason : '.$value->t_reason.' Date : '.$value->inactivedate.'" >Inactive</span>'; } ?></a> |
                                        <a href="<?php echo base_url();?>admin/adminvender/reatailerlistextra/<?php echo $value->s_admin_id;?>" ><i class="fa fa-eye"></i>View </a> |

                                        <a href="<?php echo base_url();?>admin/adminvender/updatevendor/<?php echo $value->s_admin_id;?>" ><i class="fa fa-pencil"></i> </a> 
                                         

                                         </td>
                                       
                                        
                                         
                                    </tr> 
                                    <?php $i++; } ?>               
                                    </tbody>
                                    </table>
                                    
                
            </div>

             
        </div>     
              
                 
                            
                            
                            



            </div>
        </div>
    </div>





</body>
    

    <div class="overlay"></div>
        <div class="inactive_data">
            <h3>Reason for inactive</h3>
            <div class="input_data">
                <textarea id="reason" name="reason"></textarea>
                <input type="hidden" name="rowid" id="rowid" >
                 <input type="hidden" name="statusid" id="statusid">
            </div>
            <div class="input_data">
                <a id="submit_btn" onclick="submitre()" class="submit">Submit</a>
                <a href="javascript:void()" class="cancel_b">Cancel</a>
            </div>
        </div>



</html>



<script type="text/javascript">
    
      $(document).ready(function(){
    $(".inactive_cl").click(function(){
        $(".overlay").fadeIn();
        $(".inactive_data").fadeIn();
        /*$("#submit_btn").attr("href",$(this).parent('a').attr('href') );*/

        return false;
    });
    $(".cancel_b").click(function(){
    $(".overlay").fadeOut();
        $(".inactive_data").fadeOut();

    });
   });


function submitreasonf(id,status)
{
    //alert(id+'/'+status);
    $("#rowid").val(id);
    $("#statusid").val(status);
    return false ;
}

function submitre()
{
    var rowid =  $("#rowid").val();
    var status =  $("#statusid").val();
    var reason =  $("#reason").val();
   // alert(rowid+'/'+status+'/'+reason);
  
    $.ajax({
    url: '<?php echo base_url()?>admin/adminvender/updateretailerstatus/'+rowid+'/'+status,
    type: 'POST',
    data: {'reason': reason},
    success: function(data){
        window.location.href=window.location.href;

        //window.location.href = '<?php echo base_url(); ?>'+'admin/adminvender/viewretailerlist';
    }
    });
}

</script>