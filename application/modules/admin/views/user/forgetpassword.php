<html><body>
<?php 
    if(validation_errors()){
      echo validation_errors();
    }?>
<?php echo form_open("royadmin/user/forgetpassword"); ?>
  <p>
  <label for="email_address">Your Email:</label>
  <input type="text" id="email_address" name="email_address" value="<?php echo set_value('email_address'); ?>" />
  </p>
  <p>
  <input type="submit" name="submit" value="submit" />
  </p>
  <?php echo form_close(); ?>
</body>
</html>