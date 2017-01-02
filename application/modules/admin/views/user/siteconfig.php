<?php //p($viewsdata);exit(); ?>

<section class="main_container">  
<div class="container">
<div class="heading">
<!-- <a class="hbutton trans mrgnt5">Button</a> -->
<h1>Site Configuration</h1>                
</div>
<p style="margin-left: 17px; padding: 5px; color: #E72517;"><?php echo ($this->session->flashdata('message')); ?></p>
<div class="gridview">
<table id="test" style="width:50%;">
<thead>
<!-- <label>SEARCH PRODUCT </label><input type="text" name="proname" value="" id="proname" size="25" style="margin-bottom: 4px;padding: 5px;" placeholder="general search">
 -->    <tr>
      <th bgcolor='red'>S.NO.</th>
      <th bgcolor='red'>Title</th>
      <th bgcolor='red'>Data</th>
      <th bgcolor='red'>Action</th>    
    </tr>
</thead>
<tbody>
      <?php $i=1;
      foreach ($viewsdata as $value) { ?>
      <tr>
      <td><?php echo $i;?>  </td> 
      <td><?php echo $value->name;?>  </td>           
      <td><?php echo $value->confivalue;?></td>
      <td><a href="<?php echo base_url()?>admin/login/updatesiteconfig/<?php echo $value->id; ?>" title="Update"><i class="fa fa-eye"></i></a></td>
      </tr> 
      <?php $i++; } ?>
      </tbody>
   </table>
  </div>
</section>
<script>
    $("#proname").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#test tbody").find("tr"), function() {
            //console.log($(this).text());
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
               $(this).hide();
            else
               $(this).show();                
        });
    });
</script>
           


