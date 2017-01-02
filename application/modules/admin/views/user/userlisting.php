<?php // p($userlisting);die; ?>
<section class="main_container">  
    <div class="container">
    <div class="heading">
    <a class="hbutton trans mrgnt5">Button</a>
    <h1>Registered User Listing</h1>                
    </div>
    <div class="gridview">
    <table id="test">
    <thead>
    <tr>
      <th bgcolor='red'>S.NO.</th>
      <th bgcolor='red'>FirstName</th>
      <th bgcolor='red'>LastName</th>
      <th bgcolor='red'>UserName</th>
      <th bgcolor='red'>Mobile</th>
      <th bgcolor='red'>Email</th>
      <th bgcolor='red'>DOB</th>
   
      <th bgcolor='red'>Action</th>       
    </tr>
    </thead>
    <tbody>
        <?php 

        if($userlisting !="Something Went Wrong"){ $i=1;
          foreach ($userlisting as $value) {
            settype($value, 'object');
          ?>
        <tr><td><?php echo $i;?>
        <td><?php echo $value->FirstName;?></td> 
        <td><?php echo $value->LastName;?></td>
        <td><?php echo $value->UserName;?></td>
        <td><?php echo $value->ContactNum;?></td>
        <td><?php echo $value->EmailId;?></td>
        <td><?php echo $value->DOB;?></td>
       
        <td>
        <?php if($value->UserStatus=='A'){  ?>
                <a href="<?php echo base_url()?>admin/user/userInactive/<?php echo $value->LoginID?>"><i class="fa fa-check"></i></a>
        	     <?php } else{?>     
                <a href="<?php echo base_url()?>admin/user/userActive/<?php echo $value->LoginID?>">Inactive</a>
        <?php } ?>
        </td>        
        </tr> 
        <?php $i++;}} else {?>
        <tr><td colspan="11">Record Not Found</td></tr>
        <?php } ?>
    </tbody>
   </table>
  </div>
</section>



