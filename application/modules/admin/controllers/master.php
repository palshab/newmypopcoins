<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Master extends MX_Controller{
  public function __construct() {
    
    $this->load->model("supper_admin");
    $this->load->helper('my_helper');
    //$this->load->library('PHPExcel');
    //$this->load->library('PHPExcel_IOFactory');
    $this->userfunction->loginAdminvalidation();
  }

//---------------------- Country  -------------------------//

public function add_dealstatus(){
//---------------------- Country View  -------------------------//
  if($this->input->post('submit')){
   // Validation form fields.
   $this->form_validation->set_rules('statusname','Deal Status Name','trim|required|xss_clean');
  
     
   //if($this->form_validation->run() != false){

       $name      = $this->input->post('statusname');
    
       $parameter = array('act_mode'=>'dealstatusinsert','row_id'=>'','counname'=>strtolower($name),'coucode'=>'', 'commid'=>'');
       //---------------------- proce ----------------------------------//
        
       $response  = $this->supper_admin->call_procedure('proc_master',$parameter);
       $this->session->set_flashdata('message', 'Your information was successfully Saved.');
       //redirect(base_url().'admin/master/viewstatus');
    
  
  }

    $parameter1         = array('act_mode'=>'viewdealstatus','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
    $response['vieww'] = $this->supper_admin->call_procedure('proc_master',$parameter1);
     

     $this->load->view('helper/header');
     $this->load->view('helper/sidebar');

     $this->load->view('master/add_dealstatus',$response);
     $this->load->view('helper/footer');  

}


public function checkdealstatus()
{


  $couname   = $this->input->post('name');
  $parameter = array('act_mode'=>'checkcoun','row_id'=>'','counname'=>$couname,'coucode'=>'','commid'=>'');
 

  $data      = $this->supper_admin->call_procedure('proc_master',$parameter);
  echo json_encode($data);


}


public function dealstatusdelete($id){
    $parameter = array('act_mode'=>'dealstatusdelete','row_id'=>$id,'counname'=>'','coucode'=>'','commid'=>'');
    $response  = $this->supper_admin->call_procedure('proc_master',$parameter);
    $this->session->set_flashdata('message', 'Your information was successfully deleted.');
    redirect(base_url().'admin/master/add_dealstatus');
}



public function dealstatusupdate($id){
  if($this->input->post('submit')){

   // Validation form fields.
  $this->form_validation->set_rules('statusname','Deal Status Name','trim|required|xss_clean');
  
     
   if($this->form_validation->run() != false){
     $name      = $this->input->post('statusname');
    
     $parameter = array('act_mode'=>'countryupdate','row_id'=>$id,'counname'=>strtolower($name),'coucode'=>'','commid'=>'');
     $response  = $this->supper_admin->call_procedure('proc_master',$parameter);
     $this->session->set_flashdata('message', 'Your information was successfully Update.');
     redirect(base_url().'admin/master/add_dealstatus');
   }
  
  }

  $parameter         = array('act_mode'=>'dealstatuscounid','row_id'=>$id,'counname'=>'','coucode'=>'','commid'=>'');
  $response['vieww'] = $this->supper_admin->call_procedureRow('proc_master',$parameter);
 
 
  $this->load->view('helper/header');
  $this->load->view('master/updatedealstatus',$response);
}

public function dealstatuss(){
  $rowid         = $this->uri->segment(4);
  $status        = $this->uri->segment(5);
  $act_mode      = $status=='Active'?'activeandinactive':'inactiveandinactive';
  $parameter     = array('act_mode'=>$act_mode,'row_id'=>$rowid,'counname'=>'','coucode'=>'','commid'=>'');
    
//p($parameter); exit;
  $response      = $this->supper_admin->call_procedure('proc_master',$parameter);
  $this->session->set_flashdata('message', 'Your Status was successfully Updated.');
  redirect(base_url().'admin/master/add_dealstatus');
}

public function add_category(){
    //$this->userfunction->loginAdminvalidation();
    if($this->input->post('submit')){

     // Validation form fields.
     $this->form_validation->set_rules('categorydeal_name','type deal Name','trim|required|xss_clean');

     if($this->form_validation->run() != false){

         $myFile = $_FILES['catogary_Icon'];
         $fileCount = count($myFile["name"]); 

         for ($i = 0; $i < $fileCount; $i++) {

         if(!empty($_FILES['catogary_Icon']['name'])) {
                  $upload_name =  $_FILES['catogary_Icon']['name'][$i];
                  $filePath = FCPATH.'public/'.$upload_name;
                  $tmpFilePath = $_FILES['catogary_Icon']['tmp_name'][$i];
                  if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $o_menu = $upload_name;
                  
              } else {
                    $o_menu = "";
                  } 
              }
              }


      $typedeal= $this->input->post('categorydeal_name');
      //$icon= $this->input->post('catogary_Icon');
      //$userid          = $this->session->userdata('bizzadmin')->LoginID;
      $parameter= array(
        'act_mode'=>'categoryexit',
        'row_id'=>'',
        'p_name'=>$typedeal,
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
        );
     
     
     // $record['record']= $this->supper_admin->call_procedureRow('typedeal',$parameter);
      //$record['record']= $this->supper_admin->call_procedureRow('proc_attribute',$parameter);
    
      //p($record['record']); exit;
//if(empty($data['vieww']))
      if(empty($record['record'])){
         $parameter= array(
        'act_mode'=>'categoryinsert',
        'row_id'=>'',
        'p_name'=>$typedeal,
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
        );
          // p($parameter); exit;

          $record['record']= $this->supper_admin->call_procedureRow('typedeal',$parameter);
          //p($record['record']); exit;
           $catid = $record['record']->typeid;

          if($record['record']->typeid!='')
          {

            $myFile = $_FILES['catogary_Icon'];
            $fileCount = count($myFile["name"]);

            for ($j=0; $j < $fileCount; $j++) { 
             //echo "<pre>";
             // print_r($_FILES['catogary_Icon']['name'][$j]);
              $parameter1= array(
              'act_mode'=>'categoryinsertimage',
              'row_id'=>$catid,
              'p_name'=>$_FILES['catogary_Icon']['name'][$j],
              'Param4'=>'',
              'Param5'=>'',
              'Param6'=>'',
              'Param7'=>''
               );
               $record['record']= $this->supper_admin->call_procedure('typedeal',$parameter1);
            }

          }

          $this->session->set_flashdata("message", "Your information has been saved successfully!");
          @redirect("admin/master/add_category");

      }
      else{
            
        $this->session->set_flashdata("message", "Catogary Name Already Exists");
         @redirect("admin/master/add_category");
       
      }
     }
    }//if submit
  
     $parameter = array(

        'act_mode'=>'listcategory',
        'row_id'=>'',
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      );
     
      $response['vieww'] = $this->supper_admin->call_procedure('typedeal', $parameter);

   //p($response['vieww']); exit;

    $this->load->view('helper/header');
    $this->load->view('helper/sidebar');
    $this->load->view('vendor/add_dealcategory',$response);
    $this->load->view('helper/footer');
  }//End function.viewcatogary

public function updatecatogeery($id) {

      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('categorydeal_name','catogery name','trim|required');

        $myFile = $_FILES['catogary_Icon'];
         $fileCount = count($myFile["name"]); 

         for ($i = 0; $i < $fileCount; $i++) {
       
          if(!empty($_FILES['catogary_Icon']['name'])) {
                  $upload_name =  strtolower($_FILES['catogary_Icon']['name'][$i]);
                  $filePath = FCPATH.'public/'.$upload_name;
                  $tmpFilePath = $_FILES['catogary_Icon']['tmp_name'][$i];
                  if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $o_menu = $upload_name;
                  
              } else {
                    $o_menu = "";
                  } 
              }
              }



        if($this->form_validation->run() != false) {

              $parameter = array(
                        'act_mode' => 'updatecatogery', 
                        'row_id' => $id,
                        'p_name' => $this->input->post('categorydeal_name'),
                        'Param4' => '',
                        'Param5' => '',
                        'Param6'=>'',
                        'Param7'=>''
                        
                      );
              

            $record['record']= $this->supper_admin->call_procedure('typedeal',$parameter);
          
           //p($record['record']); exit;

            $parameter1 = array(
                        'act_mode' => 'deleteimage', 
                        'row_id' => $id,
                        'p_name' => '',
                        'Param4' => '',
                        'Param5' => '',
                        'Param6'=>'',
                        'Param7'=>''
                        
                      );
              

            $this->supper_admin->call_procedure('typedeal',$parameter1);





            $myFile = $_FILES['catogary_Icon'];
            $fileCount = count($myFile["name"]);

            for ($j=0; $j < $fileCount; $j++) { 
           
              $parameter2= array(
              'act_mode'=>'categoryinsertimage',
              'row_id'=>$id,
              'p_name'=>$_FILES['catogary_Icon']['name'][$j],
              'Param4'=>'',
              'Param5'=>'',
              'Param6'=>'',
              'Param7'=>''
               );
              
            $return = $this->supper_admin->call_procedure('typedeal', $parameter2);

            }

          

             
              //

              $this->session->set_flashdata('message', 'Your information has been updated successfully!');
              redirect("admin/master/add_category");
        }
      }
      $parameter = array(
                        'act_mode' =>'fetchcatogery', 
                        'row_id' =>$id,
                        'p_name' =>'',
                        'Param4' =>'',
                        'Param5' =>'',
                        'Param6'=>'',
                        'Param7'=>''
                      );
      $response['vieww'] = $this->supper_admin->call_procedureRow('typedeal', $parameter);
      //p($response['vieww']); exit;
      $this->load->view('helper/header');
      $this->load->view('helper/sidebar');
      $this->load->view('vendor/updatecategory',$response);
      $this->load->view('helper/footer');
  }



  public function deletcategory($id) {

      $parameter = array(

        'act_mode'=>'deletecatogary',
        'row_id'=>$id,
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      );
      $response['vieww'] = $this->supper_admin->call_procedure('typedeal', $parameter);

      $this->session->set_flashdata('message', 'Record has been deleted successfully!');
      redirect("admin/master/add_category");
  } 


  public function statuscatogery($id,$status) {

      $act_mode = $status=='1'?'categoreydeactive':'categoreyactive'; 
      $parameter = array(
                        'act_mode' => $act_mode, 
                        'row_id' => $id,
                        'p_name'=>'',
                        'Param4'=>'',
                        'Param5'=>'',
                        'Param6'=>'',
                        'Param7'=>''
                      );
      $response = $this->supper_admin->call_procedure('typedeal', $parameter);

      $this->session->set_flashdata('message', 'Status has been changed successfully!');
      redirect("admin/master/add_category");
  }
   

public function offertypeadd(){  
    //$this->userfunction->loginAdminvalidation();
    
    if($this->input->post('submit')){
   
       $name      = $this->input->post('couname');
       $parameter = array(
                       'act_mode' => 'offertypeadd',
                       'row_id'   => '',
                       'counname' => $name,
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );





       

       $record['data'] = $this->supper_admin->call_procedure('proc_setting',$parameter);
        
       
       @$this->session->set_flashdata('message', 'Your information was successfully Saved.');
       @redirect(base_url().'admin/master/offertypeadd');

  }
    
  $parameter = array(
                       'act_mode' => 'offertypelist',
                       'row_id'   => '',
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
    $record['data'] = $this->supper_admin->call_procedure('proc_setting',$parameter);


    $this->load->view('helper/header');

    $this->load->view('helper/sidebar');
    $this->load->view('setting/offertypeadd',$record);
    $this->load->view('helper/footer');
  }



public function addstoretype(){
  
    if($this->input->post('submit')){

     // Validation form fields.
     $this->form_validation->set_rules('store_name','Store Type Name','trim|required|xss_clean');

     if($this->form_validation->run() != false){
      $storename = $this->input->post('store_name');
      //$icon= $this->input->post('catogary_Icon');
      //$userid          = $this->session->userdata('bizzadmin')->LoginID;
     

       $parameter = array('act_mode'=>'countstoretype','row_id'=>'','counname'=>$storename,'coucode'=>'','commid'=>'');

     //  p($parameter); exit;
      //proc_master
      $record['record']= $this->supper_admin->call_procedureRow('proc_master',$parameter);
      //$record['record']= $this->supper_admin->call_procedureRow('proc_attribute',$parameter);
      //p($record['record']); exit;
      //p($record['record']); exit;
//if(empty($data['vieww']))
      if(!empty($record['record'])){
     

            $parameter = array('act_mode'=>'storeinsert','row_id'=>'','counname'=>$storename,'coucode'=>'','commid'=>'');
           //p($parameter); exit;

          $record['record']= $this->supper_admin->call_procedureInsert('proc_master',$parameter);
          
          $this->session->set_flashdata("message", "Your information has been saved successfully!");
          @redirect("admin/master/addstoretype");

      }
      else{
            
        $this->session->set_flashdata("message", "Store Name Already Exists");
         @redirect("admin/master/addstoretype");
       
      }
     }
    }
    
  
   
      $parameter = array('act_mode'=>'liststoretype','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
    $response['vieww'] = $this->supper_admin->call_procedure('proc_master', $parameter);
   //p($response['vieww']); exit;

    $this->load->view('helper/header');
    $this->load->view('helper/sidebar');
    $this->load->view('master/addstoretype',$response);
    $this->load->view('helper/footer');
  }//End function.viewcatogary


  public function storetypedelete($id){
    $parameter = array('act_mode'=>'storetypedelete','row_id'=>$id,'counname'=>'','coucode'=>'','commid'=>'');
    $response  = $this->supper_admin->call_procedure('proc_master',$parameter);
    $this->session->set_flashdata('message', 'Your information was successfully deleted.');
    redirect(base_url().'admin/master/addstoretype');
}


public function storetypeupdate($id){
  if($this->input->post('submit')){

   // Validation form fields.
  $this->form_validation->set_rules('storetype','Store Type','trim|required|xss_clean');
  
     
   if($this->form_validation->run() != false){
     $name      = $this->input->post('storetype');
    
     $parameter = array('act_mode'=>'storeupdate','row_id'=>$id,'counname'=>$name,'coucode'=>'','commid'=>'');
     $response  = $this->supper_admin->call_procedure('proc_master',$parameter);
     $this->session->set_flashdata('message', 'Your information was successfully Update.');
     redirect(base_url().'admin/master/addstoretype');
   }
  
  }

  $parameter         = array('act_mode'=>'storetypelisting','row_id'=>$id,'counname'=>'','coucode'=>'','commid'=>'');
  $response['vieww'] = $this->supper_admin->call_procedureRow('proc_master',$parameter);
 
  //p($response['vieww']); exit;
  $this->load->view('helper/header');
  $this->load->view('master/updatestoretype',$response);
}


public function storetypestatus(){
  $rowid         = $this->uri->segment(4);
  $status        = $this->uri->segment(5);
  $act_mode      = $status=='Active'?'activeandinactive':'inactiveandinactive';
  $parameter     = array('act_mode'=>$act_mode,'row_id'=>$rowid,'counname'=>'','coucode'=>'','commid'=>'');
    
//p($parameter); exit;
  $response      = $this->supper_admin->call_procedure('proc_master',$parameter);
  $this->session->set_flashdata('message', 'Your Status was successfully Updated.');
  redirect(base_url().'admin/master/addstoretype');
}







  public function employeetype(){
  
    if($this->input->post('submit')){

     // Validation form fields.
     $this->form_validation->set_rules('store_name','Store Type Name','trim|required|xss_clean');

     if($this->form_validation->run() != false){
      $storename = $this->input->post('store_name');
     
     

       $parameter = array('act_mode'=>'couneemptype','row_id'=>'','counname'=>$storename,'coucode'=>'','commid'=>'');

   
      $record['record']= $this->supper_admin->call_procedureRow('proc_master',$parameter);
     
     //p($record['record']->counts); exit;

      if($record['record']->counts<=0){
     

            $parameter = array('act_mode'=>'emptypeinsert','row_id'=>'','counname'=>$storename,'coucode'=>'','commid'=>'');
          
            //p($parameter); exit;
          $record['record']= $this->supper_admin->call_procedureInsert('proc_master',$parameter);
          
          $this->session->set_flashdata("message", "Your information has been saved successfully!");
          @redirect("admin/master/employeetype");

      }
      else{
            
        $this->session->set_flashdata("message", "Store Name Already Exists");
         @redirect("admin/master/employeetype");
       
      }
     }
    }
    
  
   
    $parameter = array('act_mode'=>'emptypelist','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
   

    $response['vieww'] = $this->supper_admin->call_procedure('proc_master', $parameter);
    // p($response['vieww']); exit;

    $this->load->view('helper/header');
    $this->load->view('helper/sidebar');
    $this->load->view('rollmanagement/addemployeetype',$response);
    $this->load->view('helper/footer');
  }


 public function employeetypedelete($id){
    $parameter = array('act_mode'=>'employeetypedelete','row_id'=>$id,'counname'=>'','coucode'=>'','commid'=>'');
    $response  = $this->supper_admin->call_procedure('proc_master',$parameter);
    $this->session->set_flashdata('message', 'Your information was successfully deleted.');
    redirect(base_url().'admin/master/employeetype');
}


public function employeetypeupdate($id){
  if($this->input->post('submit')){

   // Validation form fields.
  $this->form_validation->set_rules('storetype','Store Type','trim|required|xss_clean');
  
     
   if($this->form_validation->run() != false){
     $name      = $this->input->post('storetype');
    
     $parameter = array('act_mode'=>'emptypeupdate','row_id'=>$id,'counname'=>$name,'coucode'=>'','commid'=>'');
     $response  = $this->supper_admin->call_procedure('proc_master',$parameter);
     $this->session->set_flashdata('message', 'Your information was successfully Update.');
     redirect(base_url().'admin/master/employeetype');
   }
  
  }

  $parameter         = array('act_mode'=>'updateemptypelist','row_id'=>$id,'counname'=>'','coucode'=>'','commid'=>'');
  $response['vieww'] = $this->supper_admin->call_procedureRow('proc_master',$parameter);
 
  $this->load->view('helper/header');
  $this->load->view('rollmanagement/updateemptype',$response);
}



public function homebanner()
{   


   //$this->userfunction->loginAdminvalidation();
    if($this->input->post('submit')){

     // Validation form fields.
    // $this->form_validation->set_rules('title','type title Name','trim|required|xss_clean');
    // $this->form_validation->set_rules('banner_image','type banner_image Name','trim|required|xss_clean');

     //if($this->form_validation->run() != false){


         if(!empty($_FILES['banner_image']['name'])) {
                  $upload_name =  strtolower($_FILES['banner_image']['name']);
                  $filePath = FCPATH.'public/homebanner/'.$upload_name;
                  $tmpFilePath = $_FILES['banner_image']['tmp_name'];
                  if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $o_menu = $upload_name;
                  
              } else {
                    $o_menu = "";
                  } 
              }





      $title= $this->input->post('title');
      $url= $this->input->post('banner_url');
      //$icon= $this->input->post('catogary_Icon');
      //$userid          = $this->session->userdata('bizzadmin')->LoginID;
      $parameter= array(
        'act_mode'=>'counthomebanner',
        'row_id'=>'',
        'counname'=>$o_menu,
        'coucode'=>'',
        'commid'=>''
        );
     //p($parameter); exit;
     
     // $record['record']= $this->supper_admin->call_procedureRow('typedeal',$parameter);
      $record['record']= $this->supper_admin->call_procedureRow('proc_master',$parameter);
    
    
//if(empty($data['vieww']))
      if($record['record']->lastid == 0){
         $parameter= array(
        'act_mode'=>'bannerinsert',
        'row_id'=>'',
        'p_name'=>$title,
        'Param4'=>$o_menu,
        'Param5'=>$url,
        'Param6'=>'',
        'Param7'=>''
        );
      //  p($parameter); exit;

          $record['record']= $this->supper_admin->call_procedure('typedeal',$parameter);
          
          $this->session->set_flashdata("message", "Your information has been saved successfully!");
          redirect("admin/master/homebanner");

      }
      else{
            
        $this->session->set_flashdata("message", "Catogary Name Already Exists");
         redirect("admin/master/homebanner");
       
      }
     //}
    
}
   $parameter= array(
        'act_mode'=>'viewbanner',
        'row_id'=>'',
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
        );
      //  p($parameter); exit;

          $record['bannerimage']= $this->supper_admin->call_procedure('typedeal',$parameter);

    $this->load->view('helper/header');
    $this->load->view('helper/sidebar');
     $this->load->view('master/homebanner',$record);
    $this->load->view('helper/footer');

 




}


public function homebanneredit($id)
{

   $parameter= array(
        'act_mode'=>'bannereditview',
        'row_id'=>$id,
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
        );
       //p($parameter); exit;

          $record['bannerimage']= $this->supper_admin->call_procedureRow('typedeal',$parameter);

        if($this->input->post('submit')){

     
         if(!empty($_FILES['banner_image']['name'])) {
                  $upload_name =  strtolower($_FILES['banner_image']['name']);
                  $filePath = FCPATH.'public/homebanner/'.$upload_name;
                  $tmpFilePath = $_FILES['banner_image']['tmp_name'];
                  if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $o_menu = $upload_name;
                  
              } else {
                    $o_menu = "";
                  } 
              }else{
                
                
                 $o_menu = $this->input->post('o_menu2');
              }



      $title= $this->input->post('title');
      $url= $this->input->post('banner_url');  

       
      $parameter = array(
                        'act_mode' => 'banneredit', 
                        'row_id' => $id,
                        'p_name' => $title,
                        'Param4' => $o_menu,
                        'Param5' => $url,
                        'Param6'=>'',
                        'Param7'=>''
                        
                      );
              
              //p($parameter); exit;
              $return = $this->supper_admin->call_procedure('typedeal', $parameter);

              $this->session->set_flashdata('message', 'Your information has been updated successfully!');
              redirect("admin/master/homebanner"); 
      

        }

   $this->load->view('helper/header');
    $this->load->view('helper/sidebar');
     $this->load->view('master/homebanneredit', $record);
    $this->load->view('helper/footer');
}

public function deletebanner($id) {

      $parameter = array(

        'act_mode'=>'deletebanner',
        'row_id'=>$id,
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      );
      $response['vieww'] = $this->supper_admin->call_procedure('typedeal', $parameter);

      $this->session->set_flashdata('message', 'Record has been deleted successfully!');
      redirect("admin/master/homebanner");
  } 


  public function addram() {

      /*if(!$this->session->userdata('popcoin_login')) {
        redirect(base_url());
      }*/
      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('ramname','Name','trim|required');
        $this->form_validation->set_rules('ramempid','Ram Employee ID','trim|required');
        $this->form_validation->set_rules('officialid','Official Id','trim|required');
        $this->form_validation->set_rules('contact_no','Contact number','trim|required');
        if($this->form_validation->run() != false) {
            $parameter = array(
                        'act_mode' => 'checkemp', 
                        'v_id' => '',
                        'v_status' => '',
                        'v_mobile' => '',
                        'v_email' => $this->input->post('ramempid'),
                        'v_pwd' => '',
                        'tin_no' => '',
                        'tax_no' => '',
                        'bank_name' => '',
                        'bank_addr' => '',
                        'ifsc_code' => '',
                        'bene_accno' => '',
                        'param1' => '',
                        'param2' => ''
                      );
            $res = $this->supper_admin->call_procedureRow('proc_vendor', $parameter);
            if($res->cou_rec>0) {
              $this->session->set_flashdata('message', 'User with this employee id  already exists!');
              redirect("admin/master/ramdetails");
            } else { 
             
              $parameter = array(
                        'act_mode' => 'insertram', 
                        'v_id' => '',
                        'v_status' => $this->input->post('ramempid'),
                        'v_mobile' => $this->input->post('contact_no'),
                        'v_email' => $this->input->post('officialid'),
                        'v_pwd' => $this->input->post('ramname'),
                        'tin_no' => '',
                        'tax_no' => '',
                        'bank_name' => '',
                        'bank_addr' => '',
                        'ifsc_code' => '',
                        'bene_accno' => '',
                        'param1' => '',
                        'param2' => ''                     
                      );
              $response = $this->supper_admin->call_procedure('proc_vendor', $parameter);

              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/master/ramdetails");
          }
        }
      }
      
      $this->load->view('helper/header');
      $this->load->view('master/addram');
  } 

  public function ramdetails() {

      $parameter = array(
                    'act_mode' => 'ramdetails', 
                    'v_id' => '',
                    'v_status' => '',
                    'v_mobile' => '',
                    'v_email' => '',
                    'v_pwd' => '',
                    'tin_no' => '',
                    'tax_no' => '',
                    'bank_name' => '',
                    'bank_addr' => '',
                    'ifsc_code' => '',
                    'bene_accno' => '',
                    'param1' => '',
                    'param2' => ''
                  );

          //    p($parameter); exit;    
      $response['vieww'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);  
      //p($response['vieww']); exit; 
      $this->load->view('helper/header');      
      $this->load->view('master/ramdetails',$response);
  }

  public function updateram($id) {

     /* if(!$this->session->userdata('popcoin_login')) {
        redirect(base_url());
      }*/
      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('ramname','Name','trim|required');
        $this->form_validation->set_rules('contact_no','Contact number','trim|required');
        if($this->form_validation->run() != false) {
              $parameter = array(
                        'act_mode' => 'updateram', 
                        'v_id' => $id,
                        'v_status' => $this->input->post('ramname'),
                        'v_mobile' => $this->input->post('ramempid'),
                        'v_email' => $this->input->post('contact_no'),
                        'v_pwd' => $this->input->post('officialid'),
                        'tin_no' => '',
                        'tax_no' => '',
                        'bank_name' => '',
                        'bank_addr' => '',
                        'ifsc_code' => '',
                        'bene_accno' => '',
                        'param1' => '',
                        'param2' => ''                      
                      );
              $response = $this->supper_admin->call_procedure('proc_vendor', $parameter);
              $this->session->set_flashdata('message', 'Your information has been updated successfully!');
              redirect("admin/master/ramdetails");
        }
      }
      
      $param2 = array(
                        'act_mode' => 'fetchram', 
                        'v_id' => $id,
                        'v_status' => '',
                        'v_mobile' => '',
                        'v_email' => '',
                        'v_pwd' => '',
                        'tin_no' => '',
                        'tax_no' => '',
                        'bank_name' => '',
                        'bank_addr' => '',
                        'ifsc_code' => '',
                        'bene_accno' => '',
                        'param1' => '',
                        'param2' => ''
                      );
      $response['vieww'] = $this->supper_admin->call_procedureRow('proc_vendor', $param2);
        

      //p($response['vieww']); exit;  

      $this->load->view('helper/header');
      $this->load->view('master/updateram',$response);
  }

  public function statusram($id,$status) {

      $act_mode = $status=='1'?'ramdeactive':'ramactive'; 
      $parameter = array(
                        'act_mode' => $act_mode, 
                        'v_id' => $id,
                        'v_status' => '',
                        'v_mobile' => '',
                        'v_email' => '',
                        'v_pwd' => '',
                        'tin_no' => '',
                        'tax_no' => '',
                        'bank_name' => '',
                        'bank_addr' => '',
                        'ifsc_code' => '',
                        'bene_accno' => '',
                        'param1' => '',
                        'param2' => ''
                      );
      $response = $this->supper_admin->call_procedure('proc_vendor', $parameter);

      $this->session->set_flashdata('message', 'Status has been changed successfully!');
      redirect("admin/master/ramdetails");
  }

  public function deleteram($id) {

      $parameter = array(
                        'act_mode' => 'deleteram', 
                        'v_id' => $id,
                        'v_status' => '',
                        'v_mobile' => '',
                        'v_email' => '',
                        'v_pwd' => '',
                        'tin_no' => '',
                        'tax_no' => '',
                        'bank_name' => '',
                        'bank_addr' => '',
                        'ifsc_code' => '',
                        'bene_accno' => '',
                        'param1' => '',
                        'param2' => ''
                      );
      $response = $this->supper_admin->call_procedure('proc_vendor', $parameter);

      $this->session->set_flashdata('message', 'Record has been deleted successfully!');
      redirect("admin/master/ramdetails");
  }

}
?>