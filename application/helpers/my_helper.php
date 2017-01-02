<?php

	function p($data){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}



	function pend($data){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		die();
	}


/*
|--------------------------------------------------------------------------
| CURL FUNCTION POST METHOD THIS WILL READ THE DATA IN JSON FORMAT
|--------------------------------------------------------------------------
*/
	function curlpost($parameters, $path){
		$apiUrl = $path; 
		$curl_handle = curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, $apiUrl);
		curl_setopt($curl_handle, CURLOPT_BUFFERSIZE, 1024);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl_handle, CURLOPT_POST, true);
                curl_setopt($curl_handle, CURLOPT_PROXY, '');
                curl_setopt($ch, CURLOPT_SSLVERSION, 3);
		curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $parameters);
                $response = curl_exec($curl_handle);

               #$info=curl_getinfo($curl_handle);
               #p($response);    
               #print_R($info); 
		
		$newresponse = (object) json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response), true);	
		//$response  = json_decode($newresponse);
		curl_close($curl_handle);
		return $newresponse;
	}
	
/*
|-----------p---------------------------------------------------------------
| CURL FUNCTION GET METHOD THIS WILL READ THE DATA IN JSON FORMAT
|--------------------------------------------------------------------------
*/
	function curlget($myurl){
	/* */   $curl = curl_init();
                
                $option=array(CURLOPT_RETURNTRANSFER =>true,
                              CURLOPT_URL => $myurl,
                              CURLOPT_USERAGENT =>'Shopotox',
                              CURLOPT_SSL_VERIFYPEER => FALSE,
                              CURLOPT_SSL_VERIFYHOST => FALSE,
                              CURLOPT_PROXY => '',
                              CURLOPT_SSLVERSION => 3
                              );
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl,$option);
		// Send the request & save response to $resp
		$response = curl_exec($curl);

               #$info=curl_getinfo($curl_handle);
               #p($response);    
               #print_R($info); 
		
		$newresponse = (object) json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response), true);	
                #p($newresponse);exit;

		//$response  = json_decode($newresponse);
		curl_close($curl_handle);
		return $newresponse;
	}

function curlgetv($parameters,$path){
		$apiUrl = $path; 
		$curl_handle = curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, $apiUrl);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curl_handle, CURLOPT_POST, true);
		curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $parameters);
		$response = curl_exec($curl_handle);
		curl_close($curl_handle);
   		return $response = json_decode($response);
}
	/*
|--------------------------------------------------------------------------
| CURL FUNCTION GET METHOD THIS WILL READ THE DATA IN JSON FORMAT WITH PARAMETERS
|--------------------------------------------------------------------------
*/
	function curlgetp($myurl){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $myurl);
		curl_setopt($curl, CURLOPT_HTTPGET, 0);
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
		
	}

  function recursiveRemoveDirectory($directory) {
    foreach (glob("{$directory}/*") as $file) {
        if (is_dir($file)) {
            recursiveRemoveDirectory($file);
        } else {
            unlink($file);
        }
    }
    rmdir($directory);
}
function compressImage($ext, $uploadedfile, $path, $actual_image_name, $newwidth, $newheight) {
       
    $src = imagecreatefromjpeg($uploadedfile);
    
    list($width, $height) = getimagesize($uploadedfile);

    $tmp = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    $t = imagejpeg($tmp, $actual_image_name, 100);

    imagedestroy($tmp);
    
}


	
	function api_url(){
		
		$api_url ='http://192.168.1.30/mypopcoins/';//
		$result = $api_url."api/";
		return $result;
	}

	
if (!function_exists('fun_global')) {

    function fun_global($procname, $params = null) {
        $ci = &get_instance();
        $ci->load->model('supper_admin');
        $result = $ci->supper_admin->call_procedure("$procname", $params);
        return $result;
    }

  }

/*
|--------------------------------------------------------------------------
| ADMIN PANNEL URL CONFIGURATION
|--------------------------------------------------------------------------
|
|  function name is otherbase_url();
|  call this function any where working with admin panel
|
*/

	
	
	////CUSTOMIZE RANDOM FUNCTION/////////////// 
	function mt_rand_str($l, $c = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*-') {
       for ($s = '', $cl = strlen($c)-1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i);
       return $s;
    }


    function expatt($value,$sep){
    	$exp=explode("$sep",$value);
    	return array_filter($exp);
    }

    function logd(){
    	$CI =& get_instance();
    	$data = $CI->session->userdata('logindetail');
    	if(!empty($data)){
    		return $data;
    	}else{
    		return false;
    	}
    }


function convertToObject($array) {
        $object = new stdClass();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $value = convertToObject($value);
            }
            $object->$key=$value;
        }
        return $object;
    }




function xmlrearead(){
$doc = new DOMDocument();
$file =base_url().'category.xml';
$doc->load($file);
$category= array();
$employees = $doc->getElementsByTagName( "root" );
$i=0;
foreach( $employees as $employee )
{
$ParentNames = $employee->getElementsByTagName( "ParentName" );
  $ParentName = $ParentNames->item(0)->nodeValue;

  $catparentids = $employee->getElementsByTagName( "catparentid" );
  $catparentid = $catparentids->item(0)->nodeValue;
  $ChildNames= $employee->getElementsByTagName( "ChildName" );
  $ChildName= $ChildNames->item(0)->nodeValue;
  $childids = $employee->getElementsByTagName( "childid" );
  $childid = $childids->item(0)->nodeValue;
  $catlevels = $employee->getElementsByTagName("catlevel" );
  $catlevel = $catlevels->item(0)->nodeValue;
  $urls = $employee->getElementsByTagName( "url" );
  $url = $urls->item(0)->nodeValue;
  $productss = $employee->getElementsByTagName( "products" );
  $products = $productss->item(0)->nodeValue;
  $CatImages = $employee->getElementsByTagName( "CatImage" );
  $CatImage = $CatImages->item(0)->nodeValue;

  $category[$i]['ParentName']=$ParentName;
  $category[$i]['catparentid']=$catparentid;
  $category[$i]['CatImage']=$CatImage;
  
  $category[$i]['ChildName']=str_replace("~","&",$ChildName);
  $category[$i]['childid']=$childid;
  $category[$i]['catlevel']=$catlevel;
 
  $category[$i]['products']=$products; 
   $category[$i]['url']=$url;

  $i++;
  }

  $test= convertToObject($category);
return $test;
  }
	function randnumber(){
    srand ((double) microtime() * 1000000);
    $random5 = rand(10000,99999);
    return $random5;
  }

function seoUrl($string) 
    {
        $string = replaceAll($string);
        //return $string; exit();
        //source: http://stackoverflow.com/a/11330527/1564365
        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        //$string = preg_replace("/[\s,]/", "-", $string);
        return strtolower($string);
    }

/*--------------------------------------------------------*/

function combinestring($string) {
	$splitstring = explode(' ', $string);
	$count       = count($splitstring);

	if ($count > 1) {
		$combinestring[] = implode("", $splitstring);
		$combinestring[] = "Yes";
	} else {
		$combinestring[] = implode("", $splitstring);
		$combinestring[] = "no";
	}

	return $combinestring;

}


function intonly($cid) {
	$cid = preg_replace("/[^0-9]/", "", $cid);
	$cid = filter_var($cid, FILTER_SANITIZE_SPECIAL_CHARS);
	$cid = filter_var($cid, FILTER_SANITIZE_NUMBER_INT);
	return $cid;
}
function intonlywithcoma($value) {
	$value = preg_replace('/[^0-9,]/', '', $value);
	return $value;
}

function intwithstring($string) {
	// will not remove ' ,
	$string = str_replace(' ', '-', $string);// Replaces all spaces with hyphens.
	return preg_replace('/[^A-Za-z0-9\-\',]/', '', $string);// Removes special chars.
}

function stringonly($string) {
	$string = str_replace(' ', '-', $string);
	return preg_replace('/[^A-Za-z]/', '', $string);
}

function decimalonly($string) {
	return preg_replace('/[^0-9,.]/', '', $string);
}

function checkNull($value) {
		if ($value == null) {
			return '';
		} else {
			return $value;
		}
	}

  function chardecode($ptext){
$array_from_to=array("Z1" =>"+",
      "Z2" => "-",
      "Z3" => "&",
      "Z5" => "|",
      "Z6" => "!",
      "Z7" => "(",
      "Z8" => ")",
      'Z9' => "[",
      'Zx1' =>"]",
      'Zx2' => "^",
      'Zx3' => '"',
      'Zx4' => "*",
      'Zx5' => "~",
      'Zx6' => "?",
      'Zx7' => ":",
      "Zx8" => "'",
      "Zx9" => "<",
      "Zy1" => ">",
      "Zy2" => "=");
       $ptext = strtr($ptext,$array_from_to);
 return $ptext;

  }

function child_menu($id=null) 
{
    $ci=&get_instance();
    
   $param=array('act_mode'   => 'child_menu',
                  'row_id'    => $id,
                  'Param1'    => '',
                  'Param2'    => '',
                  'Param3'    => '');
    
    $response  = $ci->supper_admin->call_procedure('proc_procedure1',$param);
    return $response;
    
}

function mega_menu() 
{
    $ci = &get_instance();

    $param = array( 'act_mode'   => 'mega_menu',
                  'row_id'    => '',
                  'Param1'    => '',
                  'Param2'    => '',
                  'Param3'    => '');
    $response = $ci->supper_admin->call_procedure('proc_procedure1',$param);
    return $response;    
}

function fetch_offerdetail($res_id,$offer_id,$date) 
{
    $ci = &get_instance();
    if(date('D',strtotime($date))=='Mon') {
      $day = 0;
    } else if(date('D',strtotime($date))=='Tue') {
      $day = 1;
    } else if(date('D',strtotime($date))=='Wed') {
      $day = 2;
    } else if(date('D',strtotime($date))=='Thu') {
      $day = 3;
    } else if(date('D',strtotime($date))=='Fri') {
      $day = 4;
    } else if(date('D',strtotime($date))=='Sat') {
      $day = 5;
    } else if(date('D',strtotime($date))=='Sun') {
      $day = 6;
    }
    $parameter = array( 'act_mode'  => 'fetchofferdetail',
                  'row_id'    => $res_id,
                  'Param1'    => $date,
                  'Param2'    => '',
                  'Param3'    => '',
                  'Param4'    => $day,
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => $offer_id);                      
    $response = $ci->supper_admin->call_procedureRow('proc_detailpage',$parameter);
    return $response;    
}

function mysql_time($time){

$date = DateTime::createFromFormat( 'H:i A', $time);
$formatted = $date->format( 'H:i:s');
  	return $formatted;

}

function encrypt($decrypted) { 

    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'inkpotpavan';
    $secret_iv = 'inkpot123abc';
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $gid1 = openssl_encrypt($decrypted, $encrypt_method, $key, 0, $iv);
    $encrypt_id = base64_encode($gid1);

    return $encrypt_id ;
} 

function decrypt($encrypted) {

    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'inkpotpavan';
    $secret_iv = 'inkpot123abc';
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $decrypt_id = openssl_decrypt(base64_decode($encrypted), $encrypt_method, $key, 0, $iv);
    
    return $decrypt_id;
}

if ( ! function_exists('csspath'))
{
    function csspath()
    {
        return '/promon_latest/public/css';
    }
}
if ( ! function_exists('jspath'))
{
    function jspath()
    {
        return '/promon_latest/public/js';
    }
}
if ( ! function_exists('imgpath'))
{
    function imgpath()
    {
        return '/promon_latest/public/img';
    }
}
if ( ! function_exists('resimgpath'))
{
    function resimgpath()
    {
        return '/promon_latest/public/res-images';
    }
}

?>