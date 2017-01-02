<div class="wrapper">
<?php  //$this->load->view('helper/nav')?> 
<div class="col-lg-10 col-lg-push-2">
        <div class="row">

            <div class="page_contant">
                <div class="col-lg-12">
                    <div class="page_name">
                             
                        <h2>Manage Attribute Map</h2>
                        <?php echo validation_errors(); ?> 
    
                    </div>
                      <div class="page_box">
                        <div class="col-lg-12">
                            <p> In this Section Admin can add various attribute value and text to the attribute name.</p>
                        </div>
                    </div>
                    
                    <div class="page_box">
                        <div class="sep_box">
                            <div class="col-lg-12">
                                <div style="text-align:right;">
                                    <a href="<?php echo base_url();?>admin/attribute/addattributemap"><button>ADD Attribute</button></a>
                                </div>
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
                                            <th>Attribute Name</th>
                                            <th>Attribute Value</th>
                                             <th>Attribute Text</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0; 
                                       
                                         foreach ($vieww as $key => $value) {
                                          $i++;
                                        ?>
                                       
                                        <tr>
                                            <td><input type='checkbox' name='attdelete[]' class='chkApp' value='<?=$value->id?>'> </td> 
                                            <td><?php echo $i ;?></td>
                                            <td><?php echo $value->attname ;?></td>
                                            <td><?php echo $value->attvalue ;?></td>
                                            <td><?php echo $value->attmapname ;?></td>
                                           <input type='hidden' name='attstatu[<?php echo $value->id;?>]'  value='<?=$value->amstatus?>'>
                                            <td><a href="<?php echo base_url()?>admin/attribute/attmapupdate/<?php echo $value->id?>" ><i class="fa fa-pencil"></a></i>
                                            <a href="<?php echo base_url()?>admin/attribute/attmapdelete/<?php echo $value->id?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/attribute/attmapstatus/<?php echo $value->id.'/'.$value->amstatus; ?>"><?php if($value->amstatus=='D') { ?>Inactive<?php }else { ?>Active<?php } ?></a>

                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="pagi_nation">
                                <ul class="pagination">
                              
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