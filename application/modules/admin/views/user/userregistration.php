<style>
.change-password{display:none;}

.btn-primary{  background: #1b75bc none repeat scroll 0 0;
    border: 1px solid #555;
    color: #fff;
    padding: 5px 11px;}
	.tab_active{background:#555;}
</style>
<script>
$(document).ready (function(){
	$("#dv_AddNew").click(function(){
		$(".change-password").show();
		$(".user-registra").hide();
	});
});
</script>
<script>
$(document).ready(function() {
    $(".tab_btn").click(function(){
		var get_tab_id = $(this).attr('data-tab');
		$('.tab_btn').removeClass('tab_active');
		$(this).addClass('tab_active');		
		$('.tab_cont').hide();
		$('#'+get_tab_id).show();		
		
	});
});
</script>
<section class="main_container">  

 <div class="container top-userrestra">
 <button class="btn-primary tab_btn tab_active" di="log" data-tab="tab1">Login</button>
 <button class="btn-primary tab_btn" id="dv_AddNew" data-tab="tab2">Change Password</button>
 <div class="user-registra tab_cont" id="tab1">
<?php 
    if(validation_errors()){
      echo validation_errors();
    }?>
<?php echo form_open("rbdadmin/user/registration"); ?>
  <p>

  <label for="email_address">Your Email:</label>
  <input type="text" id="email_address" name="email_address" value="<?php echo set_value('email_address'); ?>" />
  </p>
  <p>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" />
  </p>
  <p>
  <label for="con_password">Confirm Password:</label>
  <input type="password" id="con_password" name="con_password" value="<?php echo set_value('con_password'); ?>" />
  </p>
  <p>
  <input type="submit" name="submit" value="submit" />
  </p>
 <?php echo form_close(); ?>
</div>

<div class="change-password tab_cont" id="tab2">
<form>
 <p>

  <label for="email_address">Your Email:</label>
   <input type="text"/>
  </p>
  <p>
  <label for="password">Change Password</label>
      <input type="text"/>
  </p>
  <p>
  <label for="con_password">New Password:</label>
   <input type="text"/>
  </p>
  <p>
  <input type="submit" name="submit" value="submit"/>
  </p>
</form>

</div>
</div>
</section>