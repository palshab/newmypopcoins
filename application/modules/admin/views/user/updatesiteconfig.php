<?php //p($viewsdata);exit();?>
<div class="main_container">
<div class="gridview">
  <div class="errorMsg msg">
              <p><i class="fa fa-ban fa-3x"></i>.</p>
            <a class="closeMsg"><i class="fa fa-times"></i></a>
        </div>
        <div class="successMsg msg">
            <p><i class="fa fa-check-circle"></i></p>
            <a class="closeMsg"><i class="fa fa-times"></i>tyrtyrty</a>
        </div>
        <div class="warningMsg msg">
            <p><i class="fa fa-exclamation-triangle war"></i>.rrr</p>
            <a class="closeMsg"><i class="fa fa-times"></i>dxfgdfgdfg</a>
        </div>
        <!-- emage update  start  -->
<?php

$attributes = array('class' => 'form', 'id' => 'myform');
echo form_open_multipart('admin/login/updatesiteconfig/');?>

<div class="formCol">
<label>Update Site Configuration</label>
<span><input type="text" name="sitevalue" id="sitevalue" value="<?php echo $viewsdata->confivalue;?>"></span>
<input type="hidden" name="sitevalueid" id="sitevalueid" value="<?php echo $viewsdata->id;?>">
<input type="submit" class="hbutton trans mrgnt5" name="file" value="Save" >
</div>
</form>
</div></div>
</div>
</div>


