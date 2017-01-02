<div class="wrapper">
<?php  $this->load->view('helper/sidebar')?> 

<div class="col-lg-10 col-lg-push-2">
        <div class="row">

            <div class="page_contant">
                <div class="col-lg-12">
                    <div class="page_name">
                             
                        <h2>Approve Product</h2>
                        <?php echo validation_errors(); ?> 
    
                    </div>
                      <div class="page_box">
                        <div class="col-lg-12">
                            <p>  In this Section Admin can view the approved product list.</p>
                        </div>
                    </div>
                    
                    <div class="page_box">
                        <div class="sep_box">
<!---############################# search section start #####################################################-->
                           
  <!---############################# search section end #####################################################-->
                            <div class="col-lg-12">
                             <!--    <div style="text-align:right;">
                                    <a href="<?php echo base_url();?>admin/feature/addcatfeature"><button>ADD Feature Master</button></a>
                                </div> -->
                                <form method="post" action="">
                                  <input style="background: #1870BB;border: none;color: #fff;padding: 5px 10px;font-size: 13px;" type="submit" value="Download Excel" name="newsexcel">
                                </form>
                               <div class='flashmsg'>
                                    <?php echo validation_errors(); ?> 
                                    <?php
                                      if($this->session->flashdata('message')){
                                        echo $this->session->flashdata('message'); 
                                      }
                                    ?>
                                </div>
                                 <form method="post" action="">
                                 <input type="submit"  name="submit" value="Delete">
                                <input type="submit"  name="submitstatus" value="Status">
                                <table class="grid_tbl">
                                    <thead>

                                        <tr>
                                          <th><span style='border:0px color:blue; cursor:pointer;' id='selAll'><input type="checkbox" id="selecctall"/></br>Select All</span>
                                              <!-- / <br>
                                           <span style='border:0px color:blue; cursor:pointer;' id='DeselAll'>Deselect</span> --></th>
                                            <th>S:NO</th>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Combo Qty</th>
                                            <th>Price</th>
                                            
                                            <th style="width:110px;">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0; 
                                     if(!empty($vieww))
                                           {
                                            if($_GET['page'])
                                            {
                                              $page = $_GET['page']-1; 
                                              $i=$page*50; 
                                            }
                                          }
                                    foreach ($vieww as $key => $value) {
                                        //p($value);
                                          $i++;
                                        ?>
                                       
                                        <tr>
                                            <td><input type='checkbox' name='attdelete[]' class='chkApp' value='<?=$value->ProId?>'> </td> 
                                            <td><?php echo $i ;?></td>
                                            <td><img src="<?php echo base_url(); ?>assets/comboimage/<?php echo $value->combo_img; ?>" height="75" width="50"></td>
                                           
                                           
                                            <td><?php echo $value->name ;?></td>
                                            <td><?php echo $value->start_date ;?></td>
                                            <td><?php echo $value->end_date ;?></td>
                                            <td><?php echo $value->comboqty ;?></td>
                                            <td><?php echo $value->comboprice ;?></td>
                                           
                                            <input type='hidden' name='attstatu[<?php echo $value->ProId;?>]'  value='<?=$value->ProStatus?>'>
                                            <td>
                                           <!--  <a href="<?php echo base_url()?>admin/attribute/combodelete/<?php echo $value->id?>" ><i class="fa fa-pencil"></a></i>
                                           -->  <a href="<?php echo base_url()?>admin/attribute/combodelete/<?php echo $value->ComboId?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a>
                                           <a href="<?php echo base_url()?>admin/attribute/editcombo/<?php echo $value->ComboId?>/<?php echo $value->prodtmappid?>?<?php echo $_SERVER['QUERY_STRING']; ?>"><i class="fa fa-pencil"></i></a>
                                          
                                             
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="pagi_nation">
                                <ul class="pagination">
                                <?php foreach ($links as $link) {
                                //p($link); //exit();
                                echo "<li class='newli'>". $link."</li>";
                                } ?>
                                </ul>
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
      <script type="text/javascript">
 /* $(document).ready(function(){
    $('#selAll').click(function(){   
      $('.chkApp').each(function() { //loop through each checkbox
          this.checked = true;  //select all checkboxes with class "checkbox1"               
      });
});

  });
$(document).ready(function(){
    $('#DeselAll').click(function(){   
      $('.chkApp').each(function() { //loop through each checkbox
          this.checked = false;  //select all checkboxes with class "checkbox1"               
      });
});

  });*/


</script>



 <script type="text/javascript">
        $(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.chkApp').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.chkApp').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
    </script>