<!DOCTYPE html>
<html>

<body>
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar');?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Manage Outlet</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can view list of outlets!</p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                    <div style="text-align:right;">
                                        <a href="<?php echo base_url();?>admin/restaurant/addrestaurant"><button>ADD OUTLET</button></a>
                                    </div>
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
                                </div>

                            </div>
                        </div>

                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl" id="example">
                                        <thead>
                                            <tr>
                                                <th bgcolor='red'>S.No.</th>
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
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                             <td><?php echo $value->UserId; ?></td>
                                             <td><img width="50px;" height="50px;" src="<?php echo base_url().'public/offermenu-images/'.$value->o_menu; ?>"></td>
                                           
                                            <td><?php echo $value->categorydeal_name; ?></td>
                                            <td><?php echo $value->r_res_name; ?></td>
                                            <td><?php echo $value->offer_title; ?></td>
                                            
                                            <td><?php echo $value->o_start_date; ?></td>
                                            <td><?php echo $value->o_start_date; ?></td>
                                         
                                            <td><a href="<?php echo base_url()?>admin/offer/updateoffer/<?php echo $value->offer_id?>" ><i class="fa fa-pencil"></a></i>   
                                             <a href="<?php echo base_url()?>admin/offer/deleteoffer/<?php echo $value->offer_id?>/<?php echo $this->uri->segment(4);?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/offer/statusoffer/<?php echo $value->offer_id.'/'.$value->o_status; ?>/<?php echo $this->uri->segment(4);?>"><?php if($value->o_status=='1') echo 'Active'; else echo 'Inactive'; ?></a>
                                            </td>
                                        </tr>

                                        
                                    <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                          <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                	 <table class="grid_tbl" id="example">
                                        <thead>
                                            <tr>
                                                <th bgcolor='red'>S.No.</th>
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
                                       	<tr>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       	</tr>
                                       <tr>
                                       		<td colspan="9">
                                       			<div class="deal_detail">
                                       				<div class="deal_left"><div class="d_image"><img src="<?php echo base_url();?>/assets/images/deal.jpg"></div></div>
                                       				<div class="deal_right">
                                       					<div class="deal_row">
                                       						<div class="deal_d2"><div class="deal_text">Deal ID : <span>MY0265248</span></div></div>
                                       						<div class="deal_d2"><div class="deal_text">Store ID : <span>MY0265248</span></div></div>
                                       					</div>
                                       					<div class="deal_row">
                                       						<div class="deal_d2"><div class="deal_text">Store Name : <span>Abc Stroe</span></div></div>
                                       						<div class="deal_d2"><div class="deal_text">Company Name : <span>Abc Company</span></div></div>
                                       					</div>
                                       					<div class="deal_row">
                                       						<div class="deal_d2"><div class="deal_text">Deal Type : <span>Abc Stroe</span></div></div>
                                       						<div class="deal_d2"><div class="deal_text">Tagline : <span>Abc Company</span></div></div>
                                       					</div>
                                       					<div class="deal_row">
                                       						<div class="deal_d2"><div class="deal_text">Deal Start Date : <span>12 oct 2016</span></div></div>
                                       						<div class="deal_d2"><div class="deal_text">Deal End Date : <span>30 oct 2016</span></div></div>
                                       					</div>
                                       					<div class="deal_row">
                                       						<div class="deal_d2"><div class="deal_text">Deal Time : <span>18 Days</span></div></div>
                                       						<div class="deal_d2"><div class="deal_text">Deal Fully/Partially : <span>Partially</span></div></div>
                                       					</div>
                                       					<div class="deal_row">
                                       						<div class="deal_d2"><div class="deal_text">Category : <span>Lifestyle</span></div></div>
                                       						<div class="deal_d2"><div class="deal_text">Cost in Popcoins : <span>Rs. 3000</span></div></div>
                                       					</div>
                                       					<div class="deal_row">
                                       						<div class="deal_d1"><div class="deal_text">Deal Commission : <span>10%</span></div></div>
                                       						
                                       					</div>
                                       					<div class="deal_row">
                                       						<div class="deal_d1">
                                       						<div class="deal_text">Product description </div>
                                       						<div class="deal_text_b">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </div></div>
                                       						
                                       					</div>
                                       					<div class="deal_row">
                                       					<a href="javascript:void();" class="issue_btn">Issue</a>
                                       						<a href="javascript:void();" class="approve_btn">Approve</a>
                                       						
                                       					</div>
                                       					<div class="deal_row">
                                       					     <div class="deal_d1"><div class="deal_text" style="padding-bottom:10px;">Reason</div></div>
                                       						<div class="deal_d1"><textarea class="t_area"></textarea><a href="javascript:void();" class="sbt_btn">Submit</a></div>
                                       					</div>
                                       				</div>
                                       			</div>
                                       		</td>
                                       		
                                       	</tr>
                                       	<tr>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       	</tr>
                                       	<tr>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       		<td>erer</td>
                                       	</tr>
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
	float:left;
	padding:12px 15px;
	background: red;
	color:#fff!important;
	margin-left:8px;
}

 </style>
<script type="text/javascript">
    

function changedealstatus(id)
{
 
    
    
   var statval =  $("#changestatus"+id).val();

   
    $.ajax({
              url: '<?php echo base_url(); ?>admin/offer/changestatus/'+id,
              type: 'POST',
              data: {'statusvalue':statval},
              success: function(data){
                location.reload();
              }
              });


    
}

</script>