<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/admin/js/moment.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/admin/js/ion.calendar.js"></script>
<?php $this->load->view('helper/nav')?> 
<div class="col-lg-10">
        <div class="row">

            <div class="page_contant">
                <div class="col-lg-12">
                    <div class="page_name">
                        <h2>Add Role</h2>
                      
                    </div>

                    <div class="page_box">
<?php

if(validation_errors()){ ?>
    <div class="error"><?php echo validation_errors(); ?><div class="mfix"></div></div>
  <?php } ?>
  
<?php echo form_open('admin/user/addrole')?>
<div class="form">
<span id="message"></span>
<!-- <div class="formFul">
   
<select id="state">
      <option>State</option>
      <option value="1" <?php if($State=1){echo 'selected="selectrd"';} ?> >State1</option>
      <option value="2" <?php if($State=2){echo 'selected="selectrd"';} ?>>State2</option>
      </select>
</div> -->





<div class="formCol">
    <label>Add Role</label>
    <span><input type="text" name="RName" value="" id="RName" class="required" field="name" ></span>
   
    </div> 
    
  


  

<div class="formCol">
<span><input type="submit" name="addrole" value="Submit" onclick="return validatedeliverymanager()"></span>
</div>
<!-- <a class="hbutton trans mrgnt5" onclick="">update Adress</a> -->

<?php echo form_close();?>  </div>

</div>
</div>
<script>

function validatedeliverymanager()
{
  var error = false;
  

    $('.required').each(function(){
        if($(this).val()=='')
        {
          alert($(this).attr('field') + ' is Missing!');
          $(this).css('border-color','red');
          $(this).focus();
          error = true;
          return false;
          }else{
              $(this).css('border-color','green');
              error=false;  
        }
     });
    if(error)
        {
          return false;
        }else{
          return true;
        }

}
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


