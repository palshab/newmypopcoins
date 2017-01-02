<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}
class userfunction {
	public function paramiter($parameter = array()) {
		$qtag = null;
		$size = sizeof($parameter);
		if ($size > 0) {
			for ($i = 1; $i <= $size; $i++) {
				$qtag[] = '?';
			}
			return implode(',', $qtag);
		} else {
			return false;
		}
	}
	public function loginAdminvalidation($redirect = NULL) 
	{ 
		
		$CI = &get_instance();
			
		//p($CI->session->userdata('popcoin_login')->s_admin_id); exit;

		if ($CI->session->userdata('popcoin_login')->s_admin_id == '') {
			if ($redirect != NULL) {
				
				
				redirect($redirect);
			} else {
				redirect('admin/login');
			}
		}
	}
	public function loginAdminvalidationvendor($redirect = NULL) 
	{
		 $CI = &get_instance();
		if ($CI->session->userdata('ven_userlogin')[0]->s_admin_id != true) 
		{ 
			if ($redirect != NULL) 
			{
				redirect($redirect);
			} else {
				redirect('vendor/login/');
			}
		}
	}
	public function pageaccess($callcontroller) {
		$CI = &get_instance();
		if (in_array(base_url($callcontroller), $CI->session->userdata('url'))) {

			return true;
		} else {
			redirect('user');
		}
	}
	public function UserValidation($redirect = NULL){
		$CI = &get_instance();
		if ($CI->session->userdata('logindetail')->LoginID != true) {
			if ($redirect != NULL) {
				redirect($redirect);
			} else {
				redirect('');
			}
		}
	}
	 public function sendmessage($msg,$mob){
   	  $mobile=implode(',',$mob); 
	  $msgincode=urlencode($msg);
	  
      $urlmsg = "http://bulksmsindia.mobi/sendurlcomma.aspx?user=20071684&pwd=4x4rzx&senderid=ABCDEF&mobileno=$mobile&msgtext=$msgincode";
      $ch = curl_init($urlmsg);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $curl_scraped_page = curl_exec($ch);
      curl_close($ch);
      $sendmesg=$curl_scraped_page;
      return $sendmesg;
	}

}
