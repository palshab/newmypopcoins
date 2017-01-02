<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Geographic extends MX_Controller{
  public function __construct() {
    
    $this->load->model("supper_admin");
    $this->load->helper('my_helper');
    //$this->userfunction->loginAdminvalidation();

    //$this->load->library('PHPExcel');
    //$this->load->library('PHPExcel_IOFactory');
    $this->userfunction->loginAdminvalidation();
  }

//---------------------- Country  -------------------------//

public function add_country(){
  
  //$this->userfunction->loginAdminvalidation();
  if($this->input->post('submit')){
   // Validation form fields.
   $this->form_validation->set_rules('couname','Country Name','trim|required|xss_clean');
   $this->form_validation->set_rules('coucode','Country Code','trim|required|xss_clean');
     
   //if($this->form_validation->run() != false){

       $name      = $this->input->post('couname');
     	 $code      = $this->input->post('coucode');
     	 $parameter = array('act_mode'=>'countryinsert','row_id'=>'','counname'=>$name,'coucode'=>$code, 'commid'=>'');
     	 //---------------------- proce ----------------------------------//
     	  
       $response  = $this->supper_admin->call_procedure('proc_geographic',$parameter);
     	 $this->session->set_flashdata('message', 'Your information was successfully Saved.');
     	 redirect(base_url().'admin/geographic/add_country');
     	 //----------------------end proce ----------------------------------//
   // }//end if
  }//end if

    $parameter         = array('act_mode'=>'viewcountry','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
    $response['vieww'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);


     $this->load->view('helper/header');
     $this->load->view('helper/sidebar');

     $this->load->view('geographic/addcountry',$response);
     $this->load->view('helper/footer');     

}

//---------------------- Country View  -------------------------//
  public function viewcountry(){
    $this->load->library('pagination'); // load pagination library.
    //$this->userfunction->loginAdminvalidation();

  	$parameter         = array('act_mode'=>'viewcountry','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
  	$response['vieww'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);
    
  	$this->load->view('helper/header');
     $this->load->view('helper/sidebar');
    $this->load->view('geographic/viewcountry',$response);
     $this->load->view('helper/footer');

  }

//---------------------- Country Update -------------------------//
public function countryupdate($id){
	if($this->input->post('submit')){

   // Validation form fields.
   $this->form_validation->set_rules('couname','State Name','trim|required|xss_clean');
   //$this->form_validation->set_rules('coucode','State Code','trim|required|xss_clean');
	   
   if($this->form_validation->run() != false){
     $name      = $this->input->post('couname');
   	 $code      = $this->input->post('coucode');
   	 $parameter = array('act_mode'=>'countryupdate','row_id'=>$id,'counname'=>$name,'coucode'=>$code,'commid'=>'');
   	 $response  = $this->supper_admin->call_procedure('proc_geographic',$parameter);
   	 $this->session->set_flashdata('message', 'Your information was successfully Update.');
   	 redirect(base_url().'admin/geographic/add_country');
   }
	}// if submit

	$parameter         = array('act_mode'=>'viewcounid','row_id'=>$id,'counname'=>'','coucode'=>'','commid'=>'');
  $response['vieww'] = $this->supper_admin->call_procedureRow('proc_geographic',$parameter);
	$this->load->view('helper/header');
	$this->load->view('geographic/editcountry',$response);
}

//---------------------- Country Delete  -------------------------//
public function countrydelete($id){
	  $parameter = array('act_mode'=>'countrydelete','row_id'=>$id,'counname'=>'','coucode'=>'','commid'=>'');
   	$response  = $this->supper_admin->call_procedure('proc_geographic',$parameter);
    $this->session->set_flashdata('message', 'Your information was successfully deleted.');
   	redirect(base_url().'admin/geographic/add_country');
}

//---------------------- Country Status  -------------------------//
public function countrystatus (){
	$rowid         = $this->uri->segment(4);
	$status        = $this->uri->segment(5);
	$act_mode      = $status=='A'?'activeandinactive':'inactiveandinactive';
	$parameter     = array('act_mode'=>$act_mode,'row_id'=>$rowid,'counname'=>'','coucode'=>'','commid'=>'');
	$response      = $this->supper_admin->call_procedure('proc_geographic',$parameter);
  $this->session->set_flashdata('message', 'Your Status was successfully Updated.');
	redirect(base_url().'admin/geographic/add_country');
}

//---------------------- Country Name Check  -------------------------//
public function checkname(){
	$couname   = $this->input->post('name');
	$parameter = array('act_mode'=>'checkcoun','row_id'=>'','counname'=>$couname,'coucode'=>'','commid'=>'');
	$data      = $this->supper_admin->call_procedure('proc_geographic',$parameter);
	echo json_encode($data);
}
//---------------------- End Country  ----------------------------------//

//----------------------  City Add  ----------------------------------//
public function add_city(){
  // $this->userfunction->loginAdminvalidation();
  $parameter = array('act_mode'=>'viewcountry','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
    $response['vieww1'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);

   if($this->input->post('submit')){
   	 $stateid   = $this->input->post('stateid');
     $cityname  = $this->input->post('cityname');
   	 $parameter = array('act_mode'=>'cityinsert','row_id'=>$stateid,'counname'=>$cityname,'coucode'=>'','commid'=>'');
   	 $response  = $this->supper_admin->call_procedure('proc_geographic',$parameter);
   	 $this->session->set_flashdata('message', 'Your information was successfully Saved.');
   	 redirect('admin/geographic/add_city');
   }

    $parameter         = array('act_mode'=>'viewcity','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
    $response['vieww'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);

    //----------------  start pagination ------------------------// 

      $config['base_url']         = base_url()."admin/geographic/viewcity?";
      $config['total_rows']       = count($response['vieww']);
      $config['per_page']         = 50;
      $config['use_page_numbers'] = TRUE;

     $this->pagination->initialize($config);
     if(@$_GET['page']){
       $page         = $_GET['page']-1 ;
       $page         = ($page*50);
       $second       = $config['per_page'];
     }
     else{
       $page         = 0;
       $second       = $config['per_page'];
     }
     
     $str_links = $this->pagination->create_links();
     $response["links"]  = explode('&nbsp;',$str_links );

    $parameter         = array('act_mode'=>'viewcity','row_id'=>$page,'counname'=>'','coucode'=>'','commid'=>$second);
    $response['vieww'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);
    
    $this->load->view('helper/header');
    $this->load->view('helper/sidebar');
    $this->load->view('geographic/addcity',$response);
    $this->load->view('helper/footer');

  }

//---------------------- Country State  -------------------------//
 public function countrystate(){
 	$countryid          = $this->input->post('countryid');
 	$parameter          = array('act_mode'=>'countrystate','row_id'=>$countryid,'counname'=>'','coucode'=>'','commid'=>'');
 	$response['vieww']  = $this->supper_admin->call_procedure('proc_geographic',$parameter);
 	//p($response['vieww']);exit();
  $str = '';

  foreach($response['vieww'] as $k=>$v){   
      $str .= "<option value=".$v->stateid.">".$v->statename."</option>";
  }
  echo $str;
 } 

  public function countrycity(){
  $stateid          = $this->input->post('stateid');
  $parameter          = array('act_mode'=>'countrycity','row_id'=>$stateid,'counname'=>'','coucode'=>'','commid'=>'');
  $response['vieww1']  = $this->supper_admin->call_procedure('proc_geographic',$parameter);
  $str = '';
  foreach($response['vieww1'] as $k=>$v){   
      $str .= "<option value=".$v->cityid.">".$v->cityname."</option>";
  }
  echo $str;
 } 

 public function countrylocation(){
  $cityid          = $this->input->post('cityid');
  $parameter          = array('act_mode'=>'countrylocation','row_id'=>$cityid,'counname'=>'','coucode'=>'','commid'=>'');
  $response['vieww']  = $this->supper_admin->call_procedure('proc_geographic',$parameter);
  $str = '';
  foreach($response['vieww'] as $k=>$v){   
      $str .= "<option value=".$v->streetid.">".$v->location."</option>";
  }
  echo $str;
 } 
//---------------------- View City  -------------------------//
 public function viewcity(){
    //$this->userfunction->loginAdminvalidation();
    $parameter         = array('act_mode'=>'viewcity','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
    $response['vieww'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);

    //----------------  start pagination ------------------------// 

      $config['base_url']         = base_url()."admin/geographic/add_city?";
      $config['total_rows']       = count($response['vieww']);
      $config['per_page']         = 50;
      $config['use_page_numbers'] = TRUE;

     $this->pagination->initialize($config);
     if(@$_GET['page']){
       $page         = $_GET['page']-1 ;
       $page         = ($page*50);
       $second       = $config['per_page'];
     }
     else{
       $page         = 0;
       $second       = $config['per_page'];
     }
     
     $str_links = $this->pagination->create_links();
     $response["links"]  = explode('&nbsp;',$str_links );

    $parameter         = array('act_mode'=>'viewcity','row_id'=>$page,'counname'=>'','coucode'=>'','commid'=>$second);
    $response['vieww'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);

    //----------------  end pagination ------------------------//  

    $this->load->view('helper/header');
     $this->load->view('helper/sidebar');
    $this->load->view('geographic/viewcity',$response);
     $this->load->view('helper/footer');
  }

//---------------------- City Delete  -------------------------//
 public function citydelete($id){
  $parameter  = array('act_mode'=>'citydelete','row_id'=>$id,'counname'=>'','coucode'=>'','commid'=>'');
  $response   = $this->supper_admin->call_procedure('proc_geographic',$parameter);
  $this->session->set_flashdata('message', 'Your information was successfully deleted.');
  redirect('admin/geographic/add_city');
} 

//---------------------- City Status  -------------------------//
public function citystatus (){
  $rowid         = $this->uri->segment(4);
  $status        = $this->uri->segment(5);
  $act_mode      = $status=='A'?'activecity':'inactivecity';
  $parameter     = array('act_mode'=>$act_mode,'row_id'=>$rowid,'counname'=>'','coucode'=>'','commid'=>'');
  $response      = $this->supper_admin->call_procedure('proc_geographic',$parameter);
  $this->session->set_flashdata('message', 'Your Status was successfully Updated.');
  redirect('admin/geographic/add_city');
}

//---------------------- City Update -------------------------//
public function cityupdate($id){
  if($this->input->post('submit')){
   $name      = $this->input->post('couname');
   $parameter = array('act_mode'=>'cityupdate','row_id'=>$id,'counname'=>$name,'coucode'=>'','commid'=>'');
   $response  = $this->supper_admin->call_procedure('proc_geographic',$parameter);
   $this->session->set_flashdata('message', 'Your information was successfully Update.');
   redirect('admin/geographic/add_city');
  }

  $parameter         = array('act_mode'=>'viewcityid','row_id'=>$id,'counname'=>'','coucode'=>'','commid'=>'');
  $response['vieww'] = $this->supper_admin->call_procedureRow('proc_geographic',$parameter);
  $this->load->view('helper/header');
  $this->load->view('geographic/editcity',$response);
}

//---------------------- City Name Check  -------------------------//
public function checkcityname(){
  $couname   = $this->input->post('name');
  $parameter = array('act_mode'=>'checkcitycoun','row_id'=>'','counname'=>$couname,'coucode'=>'','commid'=>'');
  $data      = $this->supper_admin->call_procedure('proc_geographic',$parameter);
  echo json_encode($data);
}

//---------------------- State Add  -------------------------//
public function addstate(){

    //$this->userfunction->loginAdminvalidation();
    if($this->input->post('submit')){
        // Validation form fields.
        $this->form_validation->set_rules('statename','State Name','trim|required|xss_clean');
        $this->form_validation->set_rules('statecode','State Code','trim|required|xss_clean');
        $this->form_validation->set_rules('countryid','Country ','trim|required|xss_clean');

        //if($this->form_validation->run() != false){
          $parameter = array(
                            'act_mode' => 'stateexist',
                            'row_id'   => $this->input->post('countryid'),
                            'counname' => $this->input->post('statename'),
                            'coucode'  => '',
                            'commid'   => ''
                       );
         
          $record['record'] = $this->supper_admin->call_procedureRow('proc_geographic',$parameter);
          if($record['record']->statecount>0){
            $this->session->set_flashdata("message", "State Already Exists");
            redirect("admin/geographic/addstate");
          }else{
          
              $parameter = array(
                             'act_mode' => 'stateinsert',
                             'row_id'   => $this->input->post('countryid'),
                             'counname' => $this->input->post('statename'),
                             'coucode'  => '',
                             'commid'   => ''
                           );

              $record    = $this->supper_admin->call_procedure('proc_geographic',$parameter);
              $this->session->set_flashdata('message', 'Your information was successfully Saved.');
              //redirect("admin/geographic/statelist");
          }
       // }
    }

    $parameter             = array('act_mode'=>'viewcountry', 'row_id'=>'', 'counname'=>'', 'coucode'=>'', 'commid'=>'');
    $record['viewcountry'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);

      $parameter = array(
                       'act_mode' => 'viewstate',
                       'row_id'   => '',
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => ''
                      );
    $record['data'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);



    $this->load->view('helper/header');
    $this->load->view('helper/sidebar');

    $this->load->view('geographic/addstate', $record);
    $this->load->view('helper/footer');    

}

//---------------------- State List  -------------------------//
  public function statelist(){  
    //$this->userfunction->loginAdminvalidation();
    
    $parameter = array(
                       'act_mode' => 'viewstate',
                       'row_id'   => '',
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => ''
                      );
    $record['data'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);
    
    $this->load->view('helper/header');

    $this->load->view('helper/sidebar');
    $this->load->view('geographic/statelist',$record);
      $this->load->view('helper/footer');
  }

//---------------------- State Delete  -------------------------//
  public function statedelete($id){
    $parameter = array('act_mode'=>'statedelete','row_id'=>$id,'counname'=>'','coucode'=>'','commid'=>'');
    $response  = $this->supper_admin->call_procedure('proc_geographic',$parameter);
    $this->session->set_flashdata('message', 'Your information was successfully deleted.');
    redirect('admin/geographic/statelist');
  }

//---------------------- State Status  -------------------------//
  public function statestatus(){
  $rowid         = $this->uri->segment(4);
  $status        = $this->uri->segment(5);
  $act_mode      = $status=='A'?'stateactiveandinactive':'stateinactiveandinactive';
  $parameter     = array('act_mode'=>$act_mode,'row_id'=>$rowid,'counname'=>'','coucode'=>'','commid'=>'');
  $response      = $this->supper_admin->call_procedure('proc_geographic',$parameter);
  $this->session->set_flashdata('message', 'Your Status was successfully Updated.');
  redirect(base_url().'admin/geographic/statelist');
  }

//---------------------- State Update  -------------------------//
  public function stateupdate($id){
  if($this->input->post('submit')){
        // Validation form fields.
        $this->form_validation->set_rules('statename','State Name','trim|required|xss_clean');
        //$this->form_validation->set_rules('statecode','State Code','trim|required|xss_clean');
        $this->form_validation->set_rules('countryid','Country ','trim|required|xss_clean');

        if($this->form_validation->run() != false){
                $parameter=array(
                             'act_mode' => 'stateupdate',
                             'row_id'   => $id,
                             'counname' => $this->input->post('statename'),
                             'coucode'  => $this->input->post('statecode'),
                             'commid'   => ''
                            ); 

          $record = $this->supper_admin->call_procedure('proc_geographic',$parameter);
          $this->session->set_flashdata('message', 'Your information was successfully Updated.');
          redirect("admin/geographic/statelist");
        }
    }
  $parameter         = array('act_mode'=>'vieweditstate','row_id'=>$id,'counname'=>'','coucode'=>'','commid'=>'');
  $response['vieww'] = $this->supper_admin->call_procedureRow('proc_geographic',$parameter);
  $this->load->view('helper/header');
  $this->load->view('geographic/editstate',$response);
  
}
//---------------------- end state ----------------------------//


//............. Add city group Master ............... //
public function addcitygroup(){
//$this->userfunction->loginAdminvalidation();
if($this->input->post('submit')){
 foreach ($this->input->post('cityidd') as $key => $value) {
  $parameter            = array('act_mode'=>'citygcheck','row_id'=>'','counname'=>$this->input->post('stateid'),'coucode'=>'','commid'=>$value);
  $record['record']    = $this->supper_admin->call_procedureRow('proc_geographic',$parameter);
 if($record['record']->citycount>0){
  $this->session->set_flashdata("message", "City Already Exists");
  redirect("admin/geographic/addcitygroup");
}
  $parameter            = array('act_mode'=>'cityginsert','row_id'=>$this->input->post('citygroup'),'counname'=>$this->input->post('stateid'),'coucode'=>'','commid'=>$value);
 
  $record['record']    = $this->supper_admin->call_procedure('proc_geographic',$parameter);
  }

  $this->session->set_flashdata('message', 'Your information was successfully Updated.');
  redirect('admin/geographic/viewcitygroup');	
}

$parameter            = array('act_mode'=>'citymasterview','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
$responce['vieww']    = $this->supper_admin->call_procedure('proc_geographic',$parameter);
$parameter            = array('act_mode'=>'citygview','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
$responce['cityvieww']= $this->supper_admin->call_procedure('proc_geographic',$parameter);
$parameter               = array('act_mode'=>'viewcountry','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
$responce['viewcountry']   = $this->supper_admin->call_procedure('proc_geographic',$parameter);
$this->load->view('helper/header');
$this->load->view('geographic/addcitygroup',$responce);	
}

//............. View Brand Master ............... //
public function viewcitygroup(){
$this->userfunction->loginAdminvalidation(); 
if($this->input->post('submit')){
 foreach ($this->input->post( 'attdelete') as $key => $value) {
  $parameter         = array('act_mode'=>'cgdelete','row_id'=>$value,'counname'=>'','coucode'=>'','commid'=>'');
  $response['vieww'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);	
  
}
  $this->session->set_flashdata("message", "Your information was successfully delete.");
  redirect("admin/geographic/viewcitygroup");
}
  $parameter         = array('act_mode'=>'citgview','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
  $responce['cityview'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);

  //----------------  start pagination ------------------------// 

      $config['base_url']         = base_url()."admin/geographic/viewcitygroup?";
      $config['total_rows']       = count($responce['cityview']);
      $config['per_page']         = 50;
      $config['use_page_numbers'] = TRUE;

     $this->pagination->initialize($config);
     if($_GET['page']){
       $page         = $_GET['page']-1 ;
       $page         = ($page*50);
       $second       = $config['per_page'];
     }
     else{
       $page         = 0;
       $second       = $config['per_page'];
     }
     
     $str_links = $this->pagination->create_links();
     $responce["links"]  = explode('&nbsp;',$str_links );

    $parameter         = array('act_mode'=>'citgview','row_id'=>$page,'counname'=>'','coucode'=>'','commid'=>$second);
    $responce['cityview'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);

    //----------------  end pagination ------------------------//  
  $this->load->view('helper/header');
  $this->load->view('geographic/viewcitygroup',$responce);

}

//............. Delete Brand Master ............... //
public function citygroupdelete($id){
  $parameter         = array('act_mode'=>'cgdelete','row_id'=>$id,'counname'=>'','coucode'=>'','commid'=>'');
  $response['vieww'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);
  $this->session->set_flashdata("message", "Your information was successfully delete.");
  redirect("admin/geographic/viewcitygroup");
}


//............. End Brand ............... //


public function getlocation(){
      

     //$this->load->view('helper/header');
     $this->load->view('geographic/getlocation');

}

public function userlocation(){

  if(!empty($_POST['latitude']) && !empty($_POST['longitude'])){
    //Send request and receive json data by latitude and longitude
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($_POST['latitude']).','.trim($_POST['longitude']).'&sensor=falsekey=AIzaSyDULV7j6QbDAPEpmQd76P-lFkHwwARmAQ4';
    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;
    if($status=="OK"){
        //Get address from json data
        $location = $data->results[0]->formatted_address;
    }else{
        $location =  '';
    }
    //Print address 
    echo $location;
}

}

  public function addlocation(){

    if($this->input->post('submit')){
      $cityid   = $this->input->post('cityid');
      $streetname  = $this->input->post('streetname');
      $parameter = array('act_mode'=>'streetinsert','row_id'=>$cityid,'counname'=>$streetname,'coucode'=>'','commid'=>'');
      $response  = $this->supper_admin->call_procedure('proc_geographic',$parameter);
      $this->session->set_flashdata('message', 'Your information was successfully Saved.');
      redirect('admin/geographic/viewstreet');
    }

    $parameter         = array('act_mode'=>'viewcountry','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
    $response['country'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);
    


    $parameter         = array('act_mode'=>'viewstreet','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
    $response['vieww'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);

    //----------------  start pagination ------------------------// 

      $config['base_url']         = base_url()."admin/geographic/viewstreet?";
      $config['total_rows']       = count($response['vieww']);
      $config['per_page']         = 50;
      $config['use_page_numbers'] = TRUE;

     $this->pagination->initialize($config);
     if(@$_GET['page']){
       $page         = $_GET['page']-1 ;
       $page         = ($page*50);
       $second       = $config['per_page'];
     }
     else{
       $page         = 0;
       $second       = $config['per_page'];
     }
     
     $str_links = $this->pagination->create_links();
     $response["links"]  = explode('&nbsp;',$str_links );

    $parameter         = array('act_mode'=>'viewstreet','row_id'=>$page,'counname'=>'','coucode'=>'','commid'=>$second);
    $response['vieww'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);









    $this->load->view('helper/header');
    $this->load->view('helper/sidebar');
    $this->load->view('geographic/addstreet',$response);
    $this->load->view('helper/footer');
  }

  public function viewstreet(){
    $parameter         = array('act_mode'=>'viewstreet','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
    $response['vieww'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);

    //----------------  start pagination ------------------------// 

      $config['base_url']         = base_url()."admin/geographic/viewstreet?";
      $config['total_rows']       = count($response['vieww']);
      $config['per_page']         = 50;
      $config['use_page_numbers'] = TRUE;

     $this->pagination->initialize($config);
     if(@$_GET['page']){
       $page         = $_GET['page']-1 ;
       $page         = ($page*50);
       $second       = $config['per_page'];
     }
     else{
       $page         = 0;
       $second       = $config['per_page'];
     }
     
     $str_links = $this->pagination->create_links();
     $response["links"]  = explode('&nbsp;',$str_links );

    $parameter         = array('act_mode'=>'viewstreet','row_id'=>$page,'counname'=>'','coucode'=>'','commid'=>$second);
    $response['vieww'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);

    //----------------  end pagination ------------------------//  

    $this->load->view('helper/header');
     $this->load->view('helper/sidebar');
    $this->load->view('geographic/viewstreet',$response);
     $this->load->view('helper/footer');
  }

  //---------------------- Street Delete  -------------------------//
   public function streetdelete($id){
    $parameter  = array('act_mode'=>'streetdelete','row_id'=>$id,'counname'=>'','coucode'=>'','commid'=>'');
    $response   = $this->supper_admin->call_procedure('proc_geographic',$parameter);
    $this->session->set_flashdata('message', 'Your information was successfully deleted.');
    redirect('admin/geographic/viewstreet');
  } 

  //---------------------- Street Status  -------------------------//
  public function streetstatus (){
    $rowid         = $this->uri->segment(4);
    $status        = $this->uri->segment(5);
    $act_mode      = $status=='1'?'activestreet':'inactivestreet';
    $parameter     = array('act_mode'=>$act_mode,'row_id'=>$rowid,'counname'=>'','coucode'=>'','commid'=>'');
    $response      = $this->supper_admin->call_procedure('proc_geographic',$parameter);
    $this->session->set_flashdata('message', 'Your Status was successfully Updated.');
    redirect('admin/geographic/viewstreet');
  }

  //---------------------- Street Update -------------------------//
  public function streetupdate($id){
    if($this->input->post('submit')){
     $streetname      = $this->input->post('streetname');
     $parameter = array('act_mode'=>'streetupdate','row_id'=>$id,'counname'=>$streetname,'coucode'=>'','commid'=>'');
     $response  = $this->supper_admin->call_procedure('proc_geographic',$parameter);
     $this->session->set_flashdata('message', 'Your information has been Updated successfully!');
     redirect('admin/geographic/viewstreet');
    }

    $parameter         = array('act_mode'=>'viewstreet','row_id'=>$id,'counname'=>'','coucode'=>'','commid'=>'');
    


    $response['vieww'] = $this->supper_admin->call_procedureRow('proc_geographic',$parameter);

    
    $this->load->view('helper/header');
    $this->load->view('helper/sidebar');
    $this->load->view('geographic/editstreet',$response);
    $this->load->view('helper/footer');
  }

}// end class

?>