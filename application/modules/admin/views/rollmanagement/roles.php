<!DOCTYPE html>
<html>

<body>

    <div class="wrapper">
    <?php  $this->load->view('helper/sidebar'); ?>   

        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Create Role</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can  Assign Menu!
                                    <a href="<?php echo base_url();?>"><button type="button" style="float:right;">CANCEL</button></a></p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">
                                <div class="col-lg-12">
                                    <div class='flashmsg'>
                                        <?php echo validation_errors(); ?> 
                                        <?php
                                          if($this->session->flashdata('message')){
                                            echo $this->session->flashdata('message'); 
                                          }
                                        ?>
                                    </div>
                                    <form method="post" action="" onsubmit="return validation();">
                                    <div class="row">
                                        
                                       <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Select Role</div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                           <select name="role" id="rolename">
  														<option value="">Select </option>
         												 <?php foreach($rolename as $value){?>
          												<option value="<?php echo $value->n_Id ?>"><?php echo $value->t_typeName?></option>
          													<?php } ?>
        														</select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>    

                                         <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Login  Type</div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                           <select name="user" id="userid">
         														<option value="">Select Employee</option>
        													</select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>    

                                         <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Modules</div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                          	<select name="mainmenu" id="mainmenu" multiple="multiple">
   																<?php
   															foreach($menuaccess as $mainmenu)
   																{
   													 ?>
   												 	<option value="<?php echo $mainmenu->id;  ?>"><?php echo $mainmenu->menuname;  ?></option>
   															 <?php } ?>
   													 </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>    

                                         <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text">Select Submenu</div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                          	<select  id="div1" name="div1[]" multiple="multiple" style="height:150px; width:200px;">
	

															</select>
															<select id="div2" name="div2[]" multiple="multiple" style="height:150px; width:200px;">
	

														</select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>    

                                         <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="tbl_text"></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                          	<input type="button" class="btn_add" id="rightmove" value=">>" />
															<input type="button" class="btn_add" id="leftmove" value="<<" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </div>    




                                        <div class="sep_box">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tbl_input">
                                                           <input type="submit" value="Submit" name="addUserMenu" class="button_S" id="buttonshow"  />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
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
</body>
   
</html>

<style type="text/css">
input[type="text"]{vertical-align:top; width: 90% !important;}
.field_wrapper div{ margin-bottom:10px;}
.add_button{ line-height: 38px; margin-left:10px;}
.remove_button{ line-height: 38px; margin-left:10px;}
</style>


<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>




<script>
	
	$(document).on("change","#mainmenu",function(){


			
			var menuid = $(this).val();
			
			

			var baseurl = "<?php  echo base_url(); ?>";

			//fileter = {'menuid' : menuid };
			$.ajax({

				url: baseurl + "admin/login/getsubmenss",
				type: "POST",
				data:{ 'menuid':menuid},
				success : function(data){
					
					$("#div1").html(data);
					
				}
			});
	});






	$(document).on("change", "#rolename", function(){
		

        var roleid = $(this).val();
		//alert(roleid);return false;

        var baseurl='<?php echo base_url();?>';
		filter = {'roleid': roleid};
        $.ajax({
            url: baseurl + "admin/login/getuser",
            type: "POST",
            data: {'data': filter},
            success: function (data) {
                //alert(data);  return false;
                $('#userid').html(data);
            }
        });
	});
	$(document).on("change", "#module", function(){
		var mainmenu = $(this).val();
		var baseurl='<?php echo base_url();?>';
		$.ajax({
				url: baseurl+'admin/login/getSubMenu/'+mainmenu,
				type:"GET",
			   error: function (data) {},
				success: function (data) {
					//alert(data);
					$("#dikhana_hai").html(data);
				}
			});
	});

	$(document.body).on('click', '#rightmove' ,function(){		
			var foo = [];
			$('#div1 :selected').each(function(i, selected){ 
			  foo[i] = $(this); 
			});			
			$("#div2").append(foo);
	});
	
	$(document.body).on('click', '#leftmove' ,function(){		
			var foo2 = [];
			$('#div2 :selected').each(function(i, selected){ 
			  foo2[i] = $(this); 
			});			
			$("#div1").append(foo2);
	});


	$(document.body).on('click', '#leftmove' ,function(){
			$(".newdiv1 span").each(function(index, element) {        
			   var valid,got=0;
		valid=$(this).find("input").last().val();
		//alert(valid);
		$(".newdiv span").each(function(index, element) {
			//console.log($(this).find("input").last().val(),"==",valid);
			//alert($(this).attr("id"));
			if($(this).attr("id")==valid)
			got=1;
		});
		if(got==0)
		{	
				$(".newdiv").append("<span id='"+$(this).find("input").last().val()+"'>"+$(this).text()+"<input type='hidden' name='menuid[]' value='"+$(this).find("input").first().val()+"'/><input type='hidden' name='submenuid[]' value='"+$(this).find("input").last().val()+"'/><br/></span>");
			$(this).remove();
		}
		else
		{
			$(this).remove();
		}
		});
	});

	$(document.body).on('click','#buttonshow',function(){
				$('.newdiv').html('');
				
	});

	function validation()
	{
		var role=document.getElementById('rolename');
		var user=document.getElementById('user');
		var module=document.getElementById('module');
		if(role.value=='')
		{
			role.style.border="1px solid #000";
			//alert('ok');
			document.getElementById('rolemsg').innerHTML='Select Role';
			return false;
		}
		else
		{
			role.style.border="";
		}
		if(user.value=='')
		{
			user.style.border="1px solid #000";
			document.getElementById('empmsg').innerHTML='Emaployee Name';
			return false;
		}
		else
		{	
			user.style.border="";
		}
		if(module.value=='')
		{
			module.style.border="1px solid #000";
			return false;
		}
		else
		{
			module.style.border="";
		}
	}
</script>