<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Mainapi extends REST_controller {


public function search_get() {
     $param=array( 'act_mode' => 'search_listing',
                  'row_id'    => '',
                  'Param1'    => $this->get('catid'),//$subcat->catid,
                  'Param2'    => $this->get('cuisines'),//$att,
                  'Param3'    => trim($this->get('location')),//$locality,
                  'Param4'    => $this->get('price'),//$sort,
                  'Param5'    => $this->get('food_del'),//$fd,
                  'Param6'    => $this->get('live_deal'),//$ld,
                  'Param7'    => $this->get('est_type'),//$loc,
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '');  
    //p($param); die;               
    $data= $this->model_api->call_procedure('proc_search',$param);
       if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); // 200 being the HTTP response code
        }
  }

 public function sociallogin_get(){
    
   $randsocialpass=rand(111111,999999);
   $parameter=array(
                               'act_mode'=>'sociallogin',
                               'row_id'=>'',
                               'Param1'=>'',
                               'Param2'=>$this->get('mem_username'),
                               'Param3'=>$this->get('mem_useremail'),
                               'Param4'=>$randsocialpass,
                               'Param5'=>'',
                               'Param6'=>'',
                               'Param7'=>$this->get('mem_social_id'),//unique social id
                               'Param8'=>$this->get('mem_login_type'),//ios/web/android
                               'Param9'=>$this->get('mem_device_token'),//token
                               'Param10'=>$this->get('mem_social_type')//fb,gmail
                               );
                 
              $data = $this->model_api->call_procedureRow('proc_search',$parameter);
              
                 if(!empty($data)){
                      $this->response($data, 202);
                  }
                  else{
                      $response = array('error' => "Something Went Wrong");
                      $this->response($response, 400);
                  }

   }



  public function homebanner_get() {
        $parameter = array( 'act_mode'  => 'homepagebannerapp',
                            'row_id'    => '',
                            'Param1'    => '',
                            'Param2'    =>'',
                            'Param3'    =>'',
                            'Param4'    => '',
                            'Param5'    => '',
                            'Param6'    => '',
                            'Param7'    => '',
                            'Param8'    => '',
                            'Param9'    => '',
                            'Param10'    => ''
                            );  

        $data = $this->model_api->call_procedure('proc_search',$parameter);
        if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); // 200 being the HTTP response code
        }
  }

public function headerhead_get() {
        $parameter = array( 'act_mode'  => 'firstlevelcategoryapp',
                            'row_id'    => $this->get('row_id'),
                            'Param1'    => '',
                            'Param2'    =>'',
                            'Param3'    =>'',
                            'Param4'    => '',
                            'Param5'    => '',
                            'Param6'    => '',
                            'Param7'    => '',
                            'Param8'    => '',
                            'Param9'    => '',
                            'Param10'    => ''
                            );  

        $data = $this->model_api->call_procedure('proc_search',$parameter);
        if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); // 200 being the HTTP response code
        }
  }


public function headersubhead_get() {
        $parameter = array( 'act_mode'  => 'secondlevelcategoryapp',
                            'row_id'    => $this->get('row_id'),
                            'Param1'    => '',
                            'Param2'    =>'',
                            'Param3'    =>'',
                            'Param4'    => '',
                            'Param5'    => '',
                            'Param6'    => '',
                            'Param7'    => '',
                            'Param8'    => '',
                            'Param9'    => '',
                            'Param10'    => ''
                            );  

        $data = $this->model_api->call_procedure('proc_search',$parameter);
        if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); // 200 being the HTTP response code
        }
  }

  public function login_post() {
        $parameter = array( 'act_mode'  => 'userloginapp',
                      'row_id'    => '',
                      'Param1'    => '',
                      'Param2'    => trim($this->input->post('email')),
                      'Param3'    => md5(trim($this->input->post('pwd'))),
                      'Param4'    => $this->input->post('type'),
                      'Param5'    => $this->input->post('device_id'),
                      'Param6'    => '',
                      'Param7'    => '',
                      'Param8'    => '',
                      'Param9'    => '',
                      'Param10'    => '');   
        $data = $this->model_api->call_procedureRow('proc_search',$parameter);
        if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); // 200 being the HTTP response code
        }
  }

   public function forget_get(){

    $forgotpass  = (mt_rand(15,1000));
    
    $param=array( 'act_mode'  => 'forget_pwd_app',
                  'row_id'    => '',
                  'Param1'    => '',
                  'Param2'    => trim($this->get('email')),
                  'Param3'    => md5($forgotpass),
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'    => '');    
 
    $data=$this->model_api->call_procedureRow('proc_search',$param);
    
    //--------------------------------------------- start email -------------------------------------------------
      //$this->response($data->count_id, 202); exit;
   
 if($data->count_id==1) {
        
        $emailid=trim($this->get('email'));
        $mypopcoinsemail="pal@mindztechnology.com";
        $msg= $forgotpass;
        $this->load->library('email');
        $this->email->from($mypopcoinsemail,'Your new password is generated.');
        $this->email->to($emailid); 
        $this->email->subject('New password for Mypopcoins');
        $this->email->message($msg);
        $this->email->send();
        $this->response($data, 202);
        } else {
          $this->response($data, 200); // 200 being the HTTP response code
          //$this->response("Something Went Wrong", 200); // 200 being the HTTP response code
        }
//--------------------------------------------- end email ---------------------------------------------------

  }


  public function register_post() {
        $parameter = array( 
                  'act_mode'  => 'registeruserapp',
                  'row_id'    => '',
                  'Param1'    => $this->input->post('name'),
                  'Param2'    => strtolower(trim($this->input->post('email'))),
                  'Param3'    => md5($this->input->post('pwd')),
                  'Param4'    => $this->input->post('type'),
                  'Param5'    => $this->input->post('device_id'),
                  'Param6'    => $this->input->post('dob'),
                  'Param7'    => $this->input->post('gender'),
                  'Param8'    => $this->input->post('token_id'),
                  'Param9'    => '',
                  'Param10'   => $this->input->post('mobile')

                  ); 
       
        
        $data = $this->model_api->call_procedureRow('proc_search',$parameter);
        if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }
  }





 public function homecategory_get(){

   
    
    $parameter= array(
        'act_mode'=>'listcategory',
        'row_id'=>'',
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
        );  
 
    $data=$this->model_api->call_procedure('typedeal',$parameter);
    
    //--------------------------------------------- start email -------------------------------------------------
      //$this->response($data->count_id, 202); exit;
   
 if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }
//--------------------------------------------- end email ---------------------------------------------------

  }

public function categorystore_post(){

   
    
   $parameter = array(
                        'act_mode' => 'categorystore', 
                        'row_id' => $this->input->post('catid'),
                        'p_name' => '',
                        's_storecountryid' => '',//$this->input->post('s_endtime_'.$val),
                        's_statenameid' => '',//$this->input->post('s_secondstarttime_'.$val),
                        's_storecity' => '',//$this->input->post('s_secondendtime_'.$val),
                        's_storeaddress' => '',//$res->cou_rec,
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' =>'',// $this->input->post('visitingcard'),
                        'p_samplecopy' => '',//$this->input->post('samplebillcopy'),
                        'p_email' => '',//$this->input->post('emailid'),
                        'p_concatno' => '',//$this->input->post('contactno'),
                        'p_aggrementdate' => '',//$this->input->post('dateofagrement'),
                        'param0' => '',
                        'param1' => $this->input->post('userid'),
                        'p_firststarttime' => '',
                        'p_firstendtime' => '',
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        's_traninggivename' => '',//$this->input->post('trainggivennamee'),
                        's_traninggivenno' => '',//$this->input->post('trainggivenno'),
                        's_cashbackper' => '',//$this->input->post('cashbackper'),
                        's_dealcommision' => '',//$this->input->post('dealcommission'),
                        's_storeimg' => '',//$this->input->post('categoryid'),
                        'param11' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''                      
                      );
    $data = $this->model_api->call_procedure('proc_store',$parameter);
     

    $parameter1 = array(
                        'act_mode' => 'categorybanner', 
                        'row_id' => $this->input->post('catid'),
                        'p_name' => '',
                        's_storecountryid' => '',
                        's_statenameid' => '',
                        's_storecity' => '',
                        's_storeaddress' => '',
                        's_managerid' => '',
                        'p_tinno' => '',
                        'p_servicetaxno' => '',
                        'p_pancardno' => '',
                        'p_visitingcard' =>'',
                        'p_samplecopy' => '',
                        'p_email' => '',
                        'p_concatno' => '',
                        'p_aggrementdate' => '',
                        'param0' => '',
                        'param1' => '',
                        'p_firststarttime' => '',
                        'p_firstendtime' => '',
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        's_traninggivename' => '',
                        's_traninggivenno' => '',
                        's_cashbackper' => '',
                        's_dealcommision' => '',
                        's_storeimg' => '',
                        'param11' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''                      
                      );
    $data1 = $this->model_api->call_procedure('proc_store',$parameter1);

//$this->response($data['catbanner'], 202); exit;



    //--------------------------------------------- start email ------------------------------------------------- //
     
   
 if(!empty($data)) {
          $data3['store']=$data;
          $data4['catbanner']=$data1;
  $data2 =   array_merge($data3,$data4);
          $this->response($data2, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }
//--------------------------------------------- end email ---------------------------------------------------

  }


public function storedetails_post(){

   
    
   $parameter = array(
                        'act_mode' => 'storedetails', 
                        'row_id' => $this->input->post('store_id'),
                        'p_name' => '',
                        's_storecountryid' => '',//$this->input->post('s_endtime_'.$val),
                        's_statenameid' => '',//$this->input->post('s_secondstarttime_'.$val),
                        's_storecity' => '',//$this->input->post('s_secondendtime_'.$val),
                        's_storeaddress' => '',//$res->cou_rec,
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' =>'',// $this->input->post('visitingcard'),
                        'p_samplecopy' => '',//$this->input->post('samplebillcopy'),
                        'p_email' => '',//$this->input->post('emailid'),
                        'p_concatno' => '',//$this->input->post('contactno'),
                        'p_aggrementdate' => '',//$this->input->post('dateofagrement'),
                        'param0' => '',
                        'param1' => '',//$this->input->post('categoryid'),
                        'p_firststarttime' => '',
                        'p_firstendtime' => '',
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        's_traninggivename' => '',//$this->input->post('trainggivennamee'),
                        's_traninggivenno' => '',//$this->input->post('trainggivenno'),
                        's_cashbackper' => '',//$this->input->post('cashbackper'),
                        's_dealcommision' => '',//$this->input->post('dealcommission'),
                        's_storeimg' => '',//$this->input->post('categoryid'),
                        'param11' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''                      
                      );
    $data = $this->model_api->call_procedure('proc_store',$parameter);
     

   


 
    //--------------------------------------------- start email ------------------------------------------------- //
     
   
 if(!empty($data)) {
         /* $data3['store']=$data;
          $data4['catbanner']=$data1;
  $data2 =   array_merge($data3,$data4);*/
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }
//--------------------------------------------- end email ---------------------------------------------------

  }




  public function storedeal_post(){

   
    
   $parameter = array(
                        'act_mode' => 'storedeal', 
                        'row_id' => $this->input->post('store_id'),
                        'p_name' => '',
                        's_storecountryid' => '',//$this->input->post('s_endtime_'.$val),
                        's_statenameid' => '',//$this->input->post('s_secondstarttime_'.$val),
                        's_storecity' => '',//$this->input->post('s_secondendtime_'.$val),
                        's_storeaddress' => '',//$res->cou_rec,
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' =>'',// $this->input->post('visitingcard'),
                        'p_samplecopy' => '',//$this->input->post('samplebillcopy'),
                        'p_email' => '',//$this->input->post('emailid'),
                        'p_concatno' => '',//$this->input->post('contactno'),
                        'p_aggrementdate' => '',//$this->input->post('dateofagrement'),
                        'param0' => '',
                        'param1' => '',//$this->input->post('categoryid'),
                        'p_firststarttime' => '',
                        'p_firstendtime' => '',
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        's_traninggivename' => '',//$this->input->post('trainggivennamee'),
                        's_traninggivenno' => '',//$this->input->post('trainggivenno'),
                        's_cashbackper' => '',//$this->input->post('cashbackper'),
                        's_dealcommision' => '',//$this->input->post('dealcommission'),
                        's_storeimg' => '',//$this->input->post('categoryid'),
                        'param11' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''                      
                      );
    $data = $this->model_api->call_procedure('proc_store',$parameter);
     
  //--------------------------------------------- start email ------------------------------------------------- //
  
   
 if(!empty($data)) {
         
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }
//--------------------------------------------- end email ---------------------------------------------------

  }


  public function updateprofile_post() { 
      

    

    /*$data =   'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAAAoCAYAAAC7HLUcAAADtUlEQVR4Xu2aLZYqMRCFMxuAFaARg8WwAnaABQEWgwUBFoMFARaDRqAxWBBoVgAbmPcu7/Q7PX3SP0k16TTcnDNqOpXKrXykKsmXUurn7x+bvQJf9l3Z03cFEFwCIosSAZHp53VvAiIPDwGRa+itBQIiDw0BkWvorQUCIg8NAZFr6K0FAiIPDQGRa+itBQIiDw0BkWvorQUCIg8NAZFr6K0FAiIPDQGRa+itBTEg7XZb1Wo11Wg0VKVS+T/Rx+Ohzuezut1uar/feyVAp9NR8Dvaer2ejZ8ExEa1kvSxBgQLbDQaPeFIa4BkPp97AQr8XiwWWpfr9XraVHT/JyA2qpWkjxUg+AWeTqfGU5xMJmq73Rr3y6vD9/e32mw2v3a6sG0CkpfS72PHGBAsst1uZ60A0pjj8Wjd37Yj0j/AAf/jGgGxVfd9+xkDgp0DO0i0oeZYLpfqcrk8F+FgMND+UqMeGQ6HzhVdr9eq1WoljktAnIfF+wGNATmdTtqFH02fsBixKHUgNZtNp8LEQR11goA4DUspBjMCJC69wu6hW/TX6zXPYthKUF29BH/DJ26BYQJiJfFbdzICJFAinKoAGiy4aPGN063D4VDoDqIDGr7iRE13yEBA3nqtW03OCpAsI+EoVXfX4KoGAaA4TIjezXS7XVWtVrXpHwHJEtnP+uYlgCTl/C5OseJOrII6Ka4+IiCftfizzDZXQLAwcXmoO+WCM652D93uhbRqtVo9NSEgWZYGv4ECuQGClAYLM+6eAce/SG9QA7yy9fv9J6ThhvoIu0e4htKdsHEHeWVkymk7F0BQa8xms9gbalwM4u7j1XDoTqx0YHIHKediLcJrMSC6X+zwRJDWIL1x0XR3NBj/fr//Gh67nS4NDPzUncol+M+3WC6CW9AYIkCSinEssvF47PSBYty9i6m22PEMXvYSEFOBS/S9NSBJcLhKqaI6E5ASrbySuGoFSFJaFS2IXepAQFyq/RljGQOS9po3y0td5PoonvNuBCRvRWnPGJAsr2LTZH3VZWHaa93AL0AePQrG/4K6A0W9AcCsQdICXuL/GwES977KdP6vAiSrHzzmzaoUvzMCJO1IN6ucBCSrUvyuaAWMAIl7gGg6CQJiqhi/L0oBI0CKctLzcVmDeB4giXsERKLev74ERK6htxYIiDw0BESuobcWCIg8NARErqG3FgiIPDQERK6htxYIiDw0BESuobcWCIg8NARErqG3FgiIPDQERK6htxYIiDw0BESuobcW/gDZOWY4lzJl1QAAAABJRU5ErkJggg==';*/

    //$this->response($newval, 202); exit;
$data = $_POST['image']; //exit;
$data = str_replace('data:image/png;base64,', '', $data);
$data = str_replace(' ', '+', $data);
$data = base64_decode($data);
$file_name=date('Y-m-d_H:i:s').'.png';
$file =FCPATH.'public/'.$file_name;
$success = file_put_contents($file, $data);







       $param=array('act_mode'  => 'updateprofileapp',
                  'row_id'    => $this->post('userid'),
                  'Param1'    => $this->post('name'),
                  'Param2'    => $this->post('dob'),
                  'Param3'    =>  $file_name,
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'    => '');    


        
           //$this->response($param, 202);
     $data = $this->model_api->call_procedureRow('proc_search',$param);
   /* $data = $this->model_api->call_procedureRow('proc_general',$parameter);*/
        if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); // 200 being the HTTP response code
        }
  }

public function getuserprofile_post() { 
     

$param=array( 'act_mode'  => 'fetchmydetails',
                  'row_id'    => $this->post('userid'),
                  'Param1'    => '',
                  'Param2'    => '',
                  'Param3'    => '',
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'    => ''); 


     $data = $this->model_api->call_procedureRow('proc_search',$param);
       //$this->response($param, 202); exit;

        if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); // 200 being the HTTP response code
        }
  }

public function updatepwd_post() {
       


            $param=array( 'act_mode'  => 'changepwdapp',
                  'row_id'    => $this->post('userid'),
                  'Param1'    => md5($this->input->post('oldpwd')),
                  'Param2'    => md5($this->input->post('newpwd')),
                  'Param3'    => '',
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'    => ''); 
//$this->response($param, 202);  exit;

     $data = $this->model_api->call_procedureRow('proc_search',$param);

 
  
        if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); // 200 being the HTTP response code
        }
  }



public function dealdetails_post(){

   
    
   $parameter = array(
                        'act_mode' => 'dealdetails', 
                        'row_id' => $this->input->post('deal_id'),
                        'p_name' => $this->input->post('userid'),
                        's_storecountryid' => '',//$this->input->post('s_endtime_'.$val),
                        's_statenameid' => '',//$this->input->post('s_secondstarttime_'.$val),
                        's_storecity' => '',//$this->input->post('s_secondendtime_'.$val),
                        's_storeaddress' => '',//$res->cou_rec,
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' =>'',// $this->input->post('visitingcard'),
                        'p_samplecopy' => '',//$this->input->post('samplebillcopy'),
                        'p_email' => '',//$this->input->post('emailid'),
                        'p_concatno' => '',//$this->input->post('contactno'),
                        'p_aggrementdate' => '',//$this->input->post('dateofagrement'),
                        'param0' => '',
                        'param1' => '',//$this->input->post('categoryid'),
                        'p_firststarttime' => '',
                        'p_firstendtime' => '',
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        's_traninggivename' => '',//$this->input->post('trainggivennamee'),
                        's_traninggivenno' => '',//$this->input->post('trainggivenno'),
                        's_cashbackper' => '',//$this->input->post('cashbackper'),
                        's_dealcommision' => '',//$this->input->post('dealcommission'),
                        's_storeimg' => '',//$this->input->post('categoryid'),
                        'param11' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''                      
                      );
 //$this->response($parameter, 202); exit;
    $data = $this->model_api->call_procedure('proc_store',$parameter);
        //$this->response($parameter, 202); exit;
  //--------------------------------------------- start email ------------------------------------------------- //
     
   
 if(!empty($data)) {
         
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }
//--------------------------------------------- end email ---------------------------------------------------

  }


public function allretailer_get(){
 
    
  $parameter = array(

                        'act_mode' => 'viewretailer', 
                        'proc_s_username' =>'', // $this->input->post('s_username'),
                        'proc_emailid' => '', //$this->input->post('s_loginemail'),
                        'proc_alertnatemail_id' =>'', // $this->input->post('Alternateemailid'),
                        'proc_country_id' => '', //$this->input->post('countryid'),
                        'proc_state_id' =>'', //$this->input->post('stateid'),
                        'proc_city_id' => '', //$this->input->post('cityname'),
                        'proc_location' => '', //$this->input->post('location'),
                        'proc_pincode' =>      '', //$this->input->post('pincode'),
                        'proc_company_name' => '', //$this->input->post('companyname'),
                        'proc_store_type' => '', //$this->input->post('storetype'),
                        'proc_ownder_name' => '', //$this->input->post('owndername'),
                        'proc_store_name' => '', //$this->input->post('storename'),
                        'proc_Company_Address' =>'', //$this->input->post('companyaddress'),
                        'proc_pan_card_no' =>'', //$this->input->post('pancard'),
                        'proc_service_tax_no' =>'', //$this->input->post('servicetax'),
                        'proc_visiting_card' =>'',//$this->input->post('visitingcard'),
                        'proc_retailer_uniqueid'=>'',
                        'proc_retailer_login_id' =>'',
                        'proc_account_h_name' =>'', //$this->input->post('accountholder'),
                        'proc_account_h_number' =>'', //$this->input->post('accountnumber'),
                        'proc_ifsc_code'=>'', //$this->input->post('ifscode'),
                        'proc_branch_name' =>'', //$this->input->post('barnchname'),
                        'proc_bank_details' =>'', //$this->input->post('bankdetails'),
                        'proc_document_rec_date'=>'', //$this->input->post('docrecdate'),
                        'proc_ratiler_enrol_date' =>'', //$this->input->post('retailerrenroldate'),
                        'proc_aggre_sing_date'=>'', //$this->input->post('agrementsigndate'),
                        'proc_profile_pic'=>'', //$filename1,
                        'proc_password' => '', //md5($this->input->post('s_loginpassword')),
                        'p_ramemplid' =>    '', //$this->input->post('ramname'),
                        'p_rambranname' =>  '', //$this->input->post('rambranckbankname'),
                        'p_ramoffiialid' => '', //$this->input->post('ramofficialid'),
                        'p_ramcontactno' => '', //$this->input->post('ramcontactno'),
                        'row_id' => $this->get('cust_id'),
                        'contact_no' => '', //$this->input->post('s_mobileno'),
                        'Param8' => '', //$this->input->post('retailerpancard_div'),
                        'Param9' => '', //$this->input->post('retailerservice_div'),
                        'Param10' => ''
                        
                   );
    
 //$this->response($parameter, 202);

    $data = $this->model_api->call_procedure('proc_retailerreg',$parameter);
        //$this->response($parameter, 202); exit;
  //--------------------------------------------- start email ------------------------------------------------- //
      //$this->response($parameter, 202);
   
 if(!empty($data)) {
         
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }
//--------------------------------------------- end email ---------------------------------------------------

  }


/*public function transferpoint_get(){

   
    
  $parameter = array(
                        'act_mode' => 'inserttransferpoint', 
                        'row_id' => '',//$this->input->post('deal_id'),
                        'p_name' => '',
                        's_storecountryid' => '',
                        's_statenameid' => '',
                        's_storecity' => '',
                        's_storeaddress' => '',
                        's_managerid' => '',
                        'p_tinno' => '',
                        'p_servicetaxno' => '',
                        'p_pancardno' => '',
                        'p_visitingcard' =>'',
                        'p_samplecopy' => '',
                        'p_email' => '',//$this->input->post('emailid'),
                        'p_concatno' => '',//$this->input->post('contactno'),
                        'p_aggrementdate' => '',//$this->input->post('dateofagrement'),
                        'param0' => '',
                        'param1' => '',//$this->input->post('categoryid'),
                        'p_firststarttime' => '',
                        'p_firstendtime' => '',
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        's_traninggivename' => '',//$this->input->post('trainggivennamee'),
                        's_traninggivenno' => '',//$this->input->post('trainggivenno'),
                        's_cashbackper' => '',//$this->input->post('cashbackper'),
                        's_dealcommision' => '',//$this->input->post('dealcommission'),
                        's_storeimg' => '',//$this->input->post('categoryid'),
                        'param11' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''                      
                      );
   
    


    $data = $this->model_api->call_procedure('proc_store',$parameter);
       
   
 if(!empty($data)) {
         
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }
//--------------------------------------------- end email ---------------------------------------------------

  }*/




public function prefered_post(){

   
  
 

  $data1= explode(',',$this->input->post('retailerid'));

   $parameter = array(

                        'act_mode' => 'preferedretaidelete', 
                        'proc_s_username' =>'', 
                        'proc_emailid' => '',
                        'proc_alertnatemail_id' =>'', 
                        'proc_country_id' => '',  
                        'proc_state_id' =>'', 
                        'proc_city_id' => '',
                        'proc_location' => '', 
                        'proc_pincode' =>      '', 
                        'proc_company_name' => '',
                        'proc_store_type' => '', 
                        'proc_ownder_name' => '', 
                        'proc_store_name' => '', 
                        'proc_Company_Address' =>'', 
                        'proc_pan_card_no' =>'', 
                        'proc_service_tax_no' =>'', 
                        'proc_visiting_card' =>'',
                        'proc_retailer_uniqueid'=>'',
                        'proc_retailer_login_id' =>'',
                        'proc_account_h_name' =>'', 
                        'proc_account_h_number' =>'', //$this->input->post('accountnumber'),
                        'proc_ifsc_code'=>'', //$this->input->post('ifscode'),
                        'proc_branch_name' =>'', //$this->input->post('barnchname'),
                        'proc_bank_details' =>'', //$this->input->post('bankdetails'),
                        'proc_document_rec_date'=>'', //$this->input->post('docrecdate'),
                        'proc_ratiler_enrol_date' =>'', //$this->input->post('retailerrenroldate'),
                        'proc_aggre_sing_date'=>'', //$this->input->post('agrementsigndate'),
                        'proc_profile_pic'=>'', //$filename1,
                        'proc_password' => '', //md5($this->input->post('s_loginpassword')),
                        'p_ramemplid' =>    '', //$this->input->post('ramname'),
                        'p_rambranname' =>  '', //$this->input->post('rambranckbankname'),
                        'p_ramoffiialid' => '', //$this->input->post('ramofficialid'),
                        'p_ramcontactno' => '', //$this->input->post('ramcontactno'),
                        'row_id' => $this->input->post('userid'),
                        'contact_no' => '', //$this->input->post('s_mobileno'),
                        'Param8' => '', //$this->input->post('retailerpancard_div'),
                        'Param9' => '', //$this->input->post('retailerservice_div'),
                        'Param10' => ''
                        
                   );
  
    $this->model_api->call_procedure('proc_retailerreg',$parameter);


















    for ($i=0; $i < count($data1); $i++) { 
   $parameter = array(

                        'act_mode' => 'preferedretailinsert', 
                        'proc_s_username' =>'', 
                        'proc_emailid' => '',
                        'proc_alertnatemail_id' =>'', 
                        'proc_country_id' => $data1[$i],  
                        'proc_state_id' =>'', 
                        'proc_city_id' => '',
                        'proc_location' => '', 
                        'proc_pincode' =>      '', 
                        'proc_company_name' => '',
                        'proc_store_type' => '', 
                        'proc_ownder_name' => '', 
                        'proc_store_name' => '', 
                        'proc_Company_Address' =>'', 
                        'proc_pan_card_no' =>'', 
                        'proc_service_tax_no' =>'', 
                        'proc_visiting_card' =>'',
                        'proc_retailer_uniqueid'=>'',
                        'proc_retailer_login_id' =>'',
                        'proc_account_h_name' =>'', 
                        'proc_account_h_number' =>'', //$this->input->post('accountnumber'),
                        'proc_ifsc_code'=>'', //$this->input->post('ifscode'),
                        'proc_branch_name' =>'', //$this->input->post('barnchname'),
                        'proc_bank_details' =>'', //$this->input->post('bankdetails'),
                        'proc_document_rec_date'=>'', //$this->input->post('docrecdate'),
                        'proc_ratiler_enrol_date' =>'', //$this->input->post('retailerrenroldate'),
                        'proc_aggre_sing_date'=>'', //$this->input->post('agrementsigndate'),
                        'proc_profile_pic'=>'', //$filename1,
                        'proc_password' => '', //md5($this->input->post('s_loginpassword')),
                        'p_ramemplid' =>    '', //$this->input->post('ramname'),
                        'p_rambranname' =>  '', //$this->input->post('rambranckbankname'),
                        'p_ramoffiialid' => '', //$this->input->post('ramofficialid'),
                        'p_ramcontactno' => '', //$this->input->post('ramcontactno'),
                        'row_id' => $this->input->post('userid'),
                        'contact_no' => '', //$this->input->post('s_mobileno'),
                        'Param8' => '', //$this->input->post('retailerpancard_div'),
                        'Param9' => '', //$this->input->post('retailerservice_div'),
                        'Param10' => ''
                        
                   );
  
     $data = $this->model_api->call_procedure('proc_retailerreg',$parameter);
    
   

  
      
  }


if(!empty($data)) {
         
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }
//--------------------------------------------- end email ---------------------------------------------------

  }

public function preferdretailerlist_post(){

   
  
 

  

 
   
   $parameter = array(

                        'act_mode' => 'preferedretaillist', 
                        'proc_s_username' =>'', 
                        'proc_emailid' => '',
                        'proc_alertnatemail_id' =>'', 
                        'proc_country_id' => '',  
                        'proc_state_id' =>'', 
                        'proc_city_id' => '',
                        'proc_location' => '', 
                        'proc_pincode' =>      '', 
                        'proc_company_name' => '',
                        'proc_store_type' => '', 
                        'proc_ownder_name' => '', 
                        'proc_store_name' => '', 
                        'proc_Company_Address' =>'', 
                        'proc_pan_card_no' =>'', 
                        'proc_service_tax_no' =>'', 
                        'proc_visiting_card' =>'',
                        'proc_retailer_uniqueid'=>'',
                        'proc_retailer_login_id' =>'',
                        'proc_account_h_name' =>'', 
                        'proc_account_h_number' =>'', //$this->input->post('accountnumber'),
                        'proc_ifsc_code'=>'', //$this->input->post('ifscode'),
                        'proc_branch_name' =>'', //$this->input->post('barnchname'),
                        'proc_bank_details' =>'', //$this->input->post('bankdetails'),
                        'proc_document_rec_date'=>'', //$this->input->post('docrecdate'),
                        'proc_ratiler_enrol_date' =>'', //$this->input->post('retailerrenroldate'),
                        'proc_aggre_sing_date'=>'', 
                        'proc_profile_pic'=>'', 
                        'proc_password' => '', 
                        'p_ramemplid' =>    '', 
                        'p_rambranname' =>  '', 
                        'p_ramoffiialid' => '', 
                        'p_ramcontactno' => '', 
                        'row_id' => $this->input->post('userid'),
                        'contact_no' => '', 
                        'Param8' => '', 
                        'Param9' => '', 
                        'Param10' => ''
                        
                   );
  
     $data = $this->model_api->call_procedure('proc_retailerreg',$parameter);
    
   

  
      
 


if(!empty($data)) {
         
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }
//--------------------------------------------- end email ---------------------------------------------------

  }


public function deleteprefered_post(){

   
  
 

  $data1= explode(',',$this->input->post('retailerid'));

 
    for ($i=0; $i < count($data1); $i++) { 
   $parameter = array(

                        'act_mode' => 'preferedretaidelete', 
                        'proc_s_username' =>'', 
                        'proc_emailid' => '',
                        'proc_alertnatemail_id' =>'', 
                        'proc_country_id' => $data1[$i],  
                        'proc_state_id' =>'', 
                        'proc_city_id' => '',
                        'proc_location' => '', 
                        'proc_pincode' =>      '', 
                        'proc_company_name' => '',
                        'proc_store_type' => '', 
                        'proc_ownder_name' => '', 
                        'proc_store_name' => '', 
                        'proc_Company_Address' =>'', 
                        'proc_pan_card_no' =>'', 
                        'proc_service_tax_no' =>'', 
                        'proc_visiting_card' =>'',
                        'proc_retailer_uniqueid'=>'',
                        'proc_retailer_login_id' =>'',
                        'proc_account_h_name' =>'', 
                        'proc_account_h_number' =>'', //$this->input->post('accountnumber'),
                        'proc_ifsc_code'=>'', //$this->input->post('ifscode'),
                        'proc_branch_name' =>'', //$this->input->post('barnchname'),
                        'proc_bank_details' =>'', //$this->input->post('bankdetails'),
                        'proc_document_rec_date'=>'', //$this->input->post('docrecdate'),
                        'proc_ratiler_enrol_date' =>'', //$this->input->post('retailerrenroldate'),
                        'proc_aggre_sing_date'=>'', //$this->input->post('agrementsigndate'),
                        'proc_profile_pic'=>'', //$filename1,
                        'proc_password' => '', //md5($this->input->post('s_loginpassword')),
                        'p_ramemplid' =>    '', //$this->input->post('ramname'),
                        'p_rambranname' =>  '', //$this->input->post('rambranckbankname'),
                        'p_ramoffiialid' => '', //$this->input->post('ramofficialid'),
                        'p_ramcontactno' => '', //$this->input->post('ramcontactno'),
                        'row_id' => $this->input->post('userid'),
                        'contact_no' => '', //$this->input->post('s_mobileno'),
                        'Param8' => '', //$this->input->post('retailerpancard_div'),
                        'Param9' => '', //$this->input->post('retailerservice_div'),
                        'Param10' => ''
                        
                   );
  
     $data = $this->model_api->call_procedure('proc_retailerreg',$parameter);
    
   

  
      
  }


if(!empty($data)) {
         
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }
//--------------------------------------------- end email ---------------------------------------------------

  }


public function sociallogin_post() {
        
  //  generate password ,
  //  unique_id = ,
  //  social_type = fb,gmail,twiteer,linkdin
  //  type = ios,android,
  //  device_token = 
  //  
$forgotpass  = (mt_rand(15,1000));


        $parameter = array( 
                  'act_mode'  => 'socialuserlogin',
                  'row_id'    => '',
                  'Param1'    => $this->input->post('name'),
                  'Param2'    => strtolower(trim($this->input->post('email'))),
                  'Param3'    => md5($forgotpass),
                  'Param4'    => $this->input->post('type'),
                  'Param5'    => $this->input->post('device_id'),
                  'Param6'    => $this->input->post('dob'),
                  'Param7'    => $this->input->post('gender'),
                  'Param8'    => $this->input->post('token_id'),
                  'Param9'    => '',
                  'Param10'   => $this->input->post('mobile')

                  ); 
       
        
        $data = $this->model_api->call_procedureRow('proc_search',$parameter);
        if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }
  }

public function receiptstatus_post() {

$param=array( 'act_mode' => 'reciptstatus',
                  'row_id'    => $this->post('cust_id'),
                  'Param1'    => $this->post('store_id'),
                  'Param2'    => '',
                  'Param3'    => '',//$bill_uid,
                  'Param4'    => '',//$this->post('date_op'),
                  'Param5'    => '',//$this->post('billno'),
                  'Param6'    => '',//$this->post('billamt'),
                  'Param7'    => '',//$this->post('paidby'),
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '',//$file_name,
                  'Param11'    => '',
                  'Param12'    => '',
                  'Param13'    => '',
                  'Param14'    => '',
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => ''); 

 //$this->response($param, 202); exit;
 
 $data = $this->model_api->call_procedure('proc_other',$param);
        if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }

}


public function myhistory_post() {

$param=array( 'act_mode' => 'userhistory',
                  'row_id'    => $this->post('cust_id'),
                  'Param1'    => '',//$this->post('store_id'),
                  'Param2'    => '',
                  'Param3'    => '',//$bill_uid,
                  'Param4'    => '',//$this->post('date_op'),
                  'Param5'    => '',//$this->post('billno'),
                  'Param6'    => '',//$this->post('billamt'),
                  'Param7'    => '',//$this->post('paidby'),
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '',//$file_name,
                  'Param11'    => '',
                  'Param12'    => '',
                  'Param13'    => '',
                  'Param14'    => '',
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => ''); 

 //$this->response($param, 202); exit;
 
 $data = $this->model_api->call_procedure('proc_other',$param);
        if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }

}

public function transferpoint_post() {

$param=array( 'act_mode' => 'transferpoint',
                  'row_id'    => $this->post('cust_id'),
                  'Param1'    => $this->post('transfer_point'),
                  'Param2'    => $this->post('mobile_no'),
                  'Param3'    => '',//$bill_uid,
                  'Param4'    => '',//$this->post('mobile_no'),
                  'Param5'    => '',//$this->post('billno'),
                  'Param6'    => '',//$this->post('billamt'),
                  'Param7'    => '',//$this->post('paidby'),
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '',//$file_name,
                  'Param11'    => '',
                  'Param12'    => '',
                  'Param13'    => '',
                  'Param14'    => '',
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => ''); 

// $this->response($param, 202); exit;
 
 $data = $this->model_api->call_procedure('proc_other',$param);
        if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }

}


public function totalpopcoins_post() {

$param=array( 'act_mode' => 'totalpopcoins',
                  'row_id'    => $this->post('cust_id'),
                  'Param1'    => '',//$this->post('transfer_point'),
                  'Param2'    => '',//$this->post('mobile_no'),
                  'Param3'    => '',//$bill_uid,
                  'Param4'    => '',//$this->post('mobile_no'),
                  'Param5'    => '',//$this->post('billno'),
                  'Param6'    => '',//$this->post('billamt'),
                  'Param7'    => '',//$this->post('paidby'),
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '',//$file_name,
                  'Param11'    => '',
                  'Param12'    => '',
                  'Param13'    => '',
                  'Param14'    => '',
                  'Param14'    => '',
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => ''

                  ); 

 //$this->response($param, 202); exit;
 
 $data = $this->model_api->call_procedureRow('proc_other',$param);
        if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }

}



public function myorder_post() {

$param=array( 'act_mode' => 'orderinsert',
                  'row_id'    => $this->post('cust_id'),
                  'Param1'    => $this->post('store_id'),
                  'Param2'    => $this->post('deal_id'),
                  'Param3'    => $this->post('popcoins'),
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '',
                  'Param11'    => '',
                  'Param12'    => '',
                  'Param13'    => '',
                  'Param14'    => '',
                  'Param14'    => '',
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => ''

                  ); 


 
 $data = $this->model_api->call_procedureRow('proc_order',$param);
        if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }

}

public function preferedstore_post(){

   
    
   $parameter = array(
                        'act_mode' => 'storeprefered', 
                        'row_id' => $this->input->post('userid'),
                        'p_name' => '',
                        's_storecountryid' => '',//$this->input->post('s_endtime_'.$val),
                        's_statenameid' => '',//$this->input->post('s_secondstarttime_'.$val),
                        's_storecity' => '',//$this->input->post('s_secondendtime_'.$val),
                        's_storeaddress' => '',//$res->cou_rec,
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' =>'',// $this->input->post('visitingcard'),
                        'p_samplecopy' => '',//$this->input->post('samplebillcopy'),
                        'p_email' => '',//$this->input->post('emailid'),
                        'p_concatno' => '',//$this->input->post('contactno'),
                        'p_aggrementdate' => '',//$this->input->post('dateofagrement'),
                        'param0' => '',
                        'param1' => '',//$this->input->post('categoryid'),
                        'p_firststarttime' => '',
                        'p_firstendtime' => '',
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        's_traninggivename' => '',//$this->input->post('trainggivennamee'),
                        's_traninggivenno' => '',//$this->input->post('trainggivenno'),
                        's_cashbackper' => '',//$this->input->post('cashbackper'),
                        's_dealcommision' => '',//$this->input->post('dealcommission'),
                        's_storeimg' => '',//$this->input->post('categoryid'),
                        'param11' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''                      
                      );
    $data = $this->model_api->call_procedure('proc_store',$parameter);
     

   


 
    //--------------------------------------------- start email ------------------------------------------------- //
     
   
 if(!empty($data)) {
       
          $this->response($data, 202);
        } else {
          $data1=array('success'=>0);
          $this->response($data1, 202); 
        }
//--------------------------------------------- end email ---------------------------------------------------

  }



public function userwishlist_post(){

   
    
   $parameter = array(
                        'act_mode' => 'userwishlist', 
                        'row_id' => $this->input->post('userid'),
                        'p_name' => '',
                        's_storecountryid' => '',//$this->input->post('s_endtime_'.$val),
                        's_statenameid' => '',//$this->input->post('s_secondstarttime_'.$val),
                        's_storecity' => '',//$this->input->post('s_secondendtime_'.$val),
                        's_storeaddress' => '',//$res->cou_rec,
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' =>'',// $this->input->post('visitingcard'),
                        'p_samplecopy' => '',//$this->input->post('samplebillcopy'),
                        'p_email' => '',//$this->input->post('emailid'),
                        'p_concatno' => '',//$this->input->post('contactno'),
                        'p_aggrementdate' => '',//$this->input->post('dateofagrement'),
                        'param0' => '',
                        'param1' => '',//$this->input->post('categoryid'),
                        'p_firststarttime' => '',
                        'p_firstendtime' => '',
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        's_traninggivename' => '',//$this->input->post('trainggivennamee'),
                        's_traninggivenno' => '',//$this->input->post('trainggivenno'),
                        's_cashbackper' => '',//$this->input->post('cashbackper'),
                        's_dealcommision' => '',//$this->input->post('dealcommission'),
                        's_storeimg' => '',//$this->input->post('categoryid'),
                        'param11' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''                      
                      );
    $data = $this->model_api->call_procedure('proc_store',$parameter);
     
   //$this->response($data, 202);
   


 
    //--------------------------------------------- start email ------------------------------------------------- //
     
   
 if(!empty($data)) {
       
          $this->response($data, 202);
        } else {
          $data1=array('success'=>0);
          $this->response($data1, 202); 
        }
//--------------------------------------------- end email ---------------------------------------------------

  }


  public function storewishlist_post(){

   
    
   $parameter = array(
                        'act_mode' => 'userwishlist', 
                        'row_id' => $this->input->post('userid'),
                        'p_name' => '',
                        's_storecountryid' => '',//$this->input->post('s_endtime_'.$val),
                        's_statenameid' => '',//$this->input->post('s_secondstarttime_'.$val),
                        's_storecity' => '',//$this->input->post('s_secondendtime_'.$val),
                        's_storeaddress' => '',//$res->cou_rec,
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' =>'',// $this->input->post('visitingcard'),
                        'p_samplecopy' => '',//$this->input->post('samplebillcopy'),
                        'p_email' => '',//$this->input->post('emailid'),
                        'p_concatno' => '',//$this->input->post('contactno'),
                        'p_aggrementdate' => '',//$this->input->post('dateofagrement'),
                        'param0' => '',
                        'param1' => '',//$this->input->post('categoryid'),
                        'p_firststarttime' => '',
                        'p_firstendtime' => '',
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        's_traninggivename' => '',//$this->input->post('trainggivennamee'),
                        's_traninggivenno' => '',//$this->input->post('trainggivenno'),
                        's_cashbackper' => '',//$this->input->post('cashbackper'),
                        's_dealcommision' => '',//$this->input->post('dealcommission'),
                        's_storeimg' => '',//$this->input->post('categoryid'),
                        'param11' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''                      
                      );
 //$this->response($parameter, 202); exit;
    $data = $this->model_api->call_procedure('proc_store',$parameter);
        //$this->response($parameter, 202); exit;
  //--------------------------------------------- start email ------------------------------------------------- //
     
   
 if(!empty($data)) {
         
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); 
        }
//--------------------------------------------- end email ---------------------------------------------------

  }

public function userdealwishlist_post(){

   
    
   $parameter = array(
                        'act_mode' => 'userdealwishlist', 
                        'row_id' => $this->input->post('userid'),
                        'p_name' => '',
                        's_storecountryid' => '',//$this->input->post('s_endtime_'.$val),
                        's_statenameid' => '',//$this->input->post('s_secondstarttime_'.$val),
                        's_storecity' => '',//$this->input->post('s_secondendtime_'.$val),
                        's_storeaddress' => '',//$res->cou_rec,
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' =>'',// $this->input->post('visitingcard'),
                        'p_samplecopy' => '',//$this->input->post('samplebillcopy'),
                        'p_email' => '',//$this->input->post('emailid'),
                        'p_concatno' => '',//$this->input->post('contactno'),
                        'p_aggrementdate' => '',//$this->input->post('dateofagrement'),
                        'param0' => '',
                        'param1' => '',//$this->input->post('categoryid'),
                        'p_firststarttime' => '',
                        'p_firstendtime' => '',
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        's_traninggivename' => '',//$this->input->post('trainggivennamee'),
                        's_traninggivenno' => '',//$this->input->post('trainggivenno'),
                        's_cashbackper' => '',//$this->input->post('cashbackper'),
                        's_dealcommision' => '',//$this->input->post('dealcommission'),
                        's_storeimg' => '',//$this->input->post('categoryid'),
                        'param11' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''                      
                      );
    $data = $this->model_api->call_procedure('proc_store',$parameter);
     
   //$this->response($data, 202);
   


 
    //--------------------------------------------- start email ------------------------------------------------- //
     
   
 if(!empty($data)) {
       
          $this->response($data, 202);
        } else {
          $data1=array('success'=>0);
          $this->response($data1, 202); 
        }
//--------------------------------------------- end email ---------------------------------------------------

  }


}//end class
?>

