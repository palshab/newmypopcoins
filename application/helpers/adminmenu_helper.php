<?php
function admin_mainmenu()
{

	
	$CI = & get_instance();  //get instance, access the CI superobject
  	
	

  	$isLoggedIn = $CI->session->all_userdata();
	
	//p($isLoggedIn); exit;
  	//p($isLoggedIn['popcoin_login']['admin_id']); exit;
	$memId = $isLoggedIn['popcoin_login']->s_admin_id;
	$userType = $isLoggedIn['popcoin_login']->s_usertype;
		//echo $memId; exit;
	//$param = array('empid'=>$memId);

	$param = array('empid'=>$memId);
	

	//p($param); exit();
	

	$assignRole = fun_global('proc_getAssignRole',$param);

	

	if(!empty($assignRole))
	{
		foreach($assignRole as $k=>$v){

		$uMainMenu1[] = $v->main_menu;
		$uSubMenu1[] = $v->sub_menu;
	}
	$uMainMenu 	=	 	array_unique($uMainMenu1);
	$uSubMenu 	= 		array_unique($uSubMenu1);

}

	

	$parameter = array( 'login' => '' );
	

	
	$data['result'] = fun_global('proc_getAdminMenu',$parameter);

	//p($data['result']); exit();

	//$msg = '<nav class="main_nav">';


	if($memId==1){
		$msg = '<ul>';
			foreach($data['result'] as $values){
			 
			//if(in_array($values->id,$uMainMenu)){
				$msg .=' <li><a>'.$values->menuname.'</a>';
                       $msg .= '<ul class="sub_menu">';
                        
                        $parameter = array(

                        'userid' => '',
						'moduleid'	=>	$values->id);

                        $data1['submenu'] = fun_global('proc_leftMenu',$parameter);	

                    	foreach($data1['submenu'] as $submenu1){
                    		//if(in_array($submenu1->id,$uSubMenu)){
                        		$msg.='<li><a href='.base_url().$submenu1->url.'>'.$submenu1->menuname.'</a></li>';
                          //}
                        } 

                        $msg.='</ul>

                    </li>';
                   

			//}
     
     
	   } 
	   $msg .= '</ul>'; 

	} else if($userType==2) {
		$msg = '<ul>
			<li>
	            <a href="javascript:void(0);"><i class="fa fa-file-word-o"></i>Deals</a>
	            <ul class="sub_menu">
	                <li><a href="'.site_url('admin/offer/addoffer').'">Create Deal</a></li>
	               
	                <li><a href="'.site_url('admin/offer/showchangestatus/pending').'">Approved Deals</a></li>
	                <li><a href="'.site_url('admin/offer/viewdeals').'">View Deals</a></li>
	            </ul>
	        </li>
	        <li>
	            <a href="javascript:void(0);"><i class="fa fa-file-word-o"></i>Manage Managers</a>
	            <ul class="sub_menu">
	                <li><a href="'.site_url('admin/retailer/addmanager').'">Add Manager</a></li>
	                <li><a href="'.site_url('admin/retailer/viewmanagers').'">View Managers</a></li>
	            </ul>
	        </li>
	        <li>
	            <a href="javascript:void(0);"><i class="fa fa-file-word-o"></i>My Receipts</a>
	            <ul class="sub_menu">
	                <li><a href="'.site_url('admin/receipts/retailer_receipts').'">View Receipts</a></li>
	            </ul>
	        </li>
	        <li>
	            <a href="javascript:void(0);"><i class="fa fa-file-word-o"></i>Manage Store</a>
	            <ul class="sub_menu">
	            	<li><a href="'.site_url('admin/retailer/addstore').'">Create Store</a></li>
	                <li><a href="'.site_url('admin/retailer/viewstores').'">Store List</a></li>
	            </ul>
	        </li>
	        <li>
	            <a href="javascript:void(0);"><i class="fa fa-file-word-o"></i>Redemption</a>
	            <ul class="sub_menu">
	                <li><a href="'.site_url('admin/vendor/add_category').'">Redemption History</a></li>
	            </ul>
	        </li>
	        <li>
	            <a href="javascript:void(0);"><i class="fa fa-file-word-o"></i>Payments</a>
	            <ul class="sub_menu">
	                <li><a href="'.site_url('admin/tax/paymentprocess').'">Payment Details</a></li>
	            </ul>
	        </li>

	         <li>
	            <a href="javascript:void(0);"><i class="fa fa-file-word-o"></i>Order</a>
	            <ul class="sub_menu">
	                <li><a href="'.site_url('admin/order/vieworder').'">Order List</a></li>
	            </ul>
	        </li>



	    </ul>';

	} else if($userType==4) {
		$msg = '<ul>
			<li>
	            <a href="javascript:void(0);"><i class="fa fa-file-word-o"></i>Deals</a>
	            <ul class="sub_menu">
	            	<li><a href="'.site_url('admin/offer/addoffer').'">Create Deal</a></li>
	                <li><a href="'.site_url('admin/offer/draftdeals').'">Draft Deals</a></li>
	                <li><a href="'.site_url('admin/offer/showchangestatus/pending').'">Approved Deals</a></li>
	                <li><a href="'.site_url('admin/offer/viewdeals').'">View Deals</a></li>
	            </ul>
	        </li>
	        <li>
	            <a href="javascript:void(0);"><i class="fa fa-file-word-o"></i>My Receipts</a>
	            <ul class="sub_menu">
	                <li><a href="'.site_url('admin/vendor/add_category').'">View Receipts</a></li>
	            </ul>
	        </li>
	        <li>
	            <a href="javascript:void(0);"><i class="fa fa-file-word-o"></i>Manage Store</a>
	            <ul class="sub_menu">
	                <li><a href="'.site_url('admin/retailer/viewstores').'">Store List</a></li>
	            </ul>
	        </li>
	        <li>
	            <a href="javascript:void(0);"><i class="fa fa-file-word-o"></i>Redemption</a>
	            <ul class="sub_menu">
	                <li><a href="'.site_url('admin/vendor/add_category').'">Redemption History</a></li>
	            </ul>
	        </li>
	        <li>
	            <a href="javascript:void(0);"><i class="fa fa-file-word-o"></i>Transactions</a>
	            <ul class="sub_menu">
	                <li><a href="'.site_url('admin/vendor/add_category').'">View Transactions</a></li>
	            </ul>
	        </li>
	        <li>
	            <a href="javascript:void(0);"><i class="fa fa-file-word-o"></i>Order</a>
	            <ul class="sub_menu">
	                <li><a href="'.site_url('admin/order/vieworder').'">Order List</a></li>
	            </ul>
	        </li>
	    </ul>';

	} else {	
			

			$msg = '<ul>';
	foreach($data['result'] as $values){
			 
			if(@in_array(@$values->id,$uMainMenu)){
				$msg .='<li><a>'.$values->menuname.'</a>';
                         $msg .= '<ul class="sub_menu">';
                        
                        $parameter = array(

                        'userid' => '',
						'moduleid'	=>	$values->id);

                        $data1['submenu'] = fun_global('proc_leftMenu',$parameter);	

                    	foreach($data1['submenu'] as $submenu1){
                    		if(in_array($submenu1->id,$uSubMenu)){
                        		$msg.='<li><a href='.base_url().$submenu1->url.'>'.$submenu1->menuname.'</a></li>';
                          }
                        } 

                        $msg.='</ul>

                    </li>';

			}
     
     
   } 

	}

               
     
     echo $msg ;

}


