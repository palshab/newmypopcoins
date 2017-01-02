<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class setting extends MX_Controller {
  public $data   =   array();
  public function __construct() {
    $this->load->model("supper_admin");
    $this->load->helper('my_helper');
    $this->userfunction->loginAdminvalidation();
  }
  
  public function addbannerimages($id) {
     if($this->input->post('submit')) 
      {
  //p($_FILES); die;
    if(!empty($_FILES['r_img_name']['name'])) {
                          $upload_name = $return->id.'-'.str_replace(" ", "-", strtolower($_FILES['r_img_name']['name']));
                          $filePath = FCPATH.'public/listingbanner/'.$upload_name;
                          $tmpFilePath = $_FILES['r_img_name']['tmp_name'];
                          if(move_uploaded_file($tmpFilePath, $filePath)) {
                            $r_img_name = $upload_name;
                          } else {
                            $r_img_name = "";
                          } 
                      }
                      $parameter2 = array(
                        'act_mode' => 'insertlisbanimages', 
                        'row_id' => $id,
                        'param1' => '',
                        'param2' => '',
                        'param3' => $r_img_name,
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => '',
                        'param10' => '',
                        'param11' => '',
                        'param12' => '',
                        'param13' => '',
                        'param14' => '',
                        'param15' => '',
                        'param16' => ''
                      );
                      $return2 = $this->supper_admin->call_procedureRow('proc_general', $parameter2);
                      redirect("admin/setting/viewbannerimages/".$id);
                }

   }
  public function viewbannerimages($id) {

      $parameter = array(
                        'act_mode' => 'viewbanners', 
                        'row_id' => $id,
                        'param1' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => '',
                        'param10' => '',
                        'param11' => '',
                        'param12' => '',
                        'param13' => '',
                        'param14' => '',
                        'param15' => '',
                        'param16' => ''
                      );
          
              $response['data'] = $this->supper_admin->call_procedure('proc_general', $parameter);
      
      //p($response['data']); die;
      $this->load->view('helper/header');
      $this->load->view('setting/viewbannerimages', $response);
  }

  public function deletebannerimage($id,$img_name,$res_id) {

      @unlink(FCPATH.'public/listingbanner/'.$img_name);
      $parameter = array(
                        'act_mode' => 'deletebannerimage', 
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
      redirect("admin/setting/viewbannerimages/".$res_id);
  } 
  public function listbannerupdate($id) {
    

    if($this->input->post('submit')) 
      {
        //P($_POST); die;

        $this->form_validation->set_rules('title','Title','trim|required');
        $this->form_validation->set_rules('discription','Discription','trim|required');
        
        if($this->form_validation->run() != false) {

          //==================== 

          $parameter = array(
                        'act_mode' => 'updatelistbanner', 
                        'row_id' => $id,
                        'param1' => '',
                        'param2' => '',
                        'param3' => $this->input->post('title'),
                        'param4' => '',
                        'param5' => $this->input->post('discription'),
                        'param6' => $this->input->post('url'),
                        'param7' => '',
                        'param8' => '',
                        'param9' => '',
                        'param10' => $this->input->post('r_maintype_id'),
                        'param11' => $this->input->post('category_id'),
                        'param12' => $this->input->post('city_id'),
                        'param13' => $this->input->post('street_id'),
                        'param14' => '',
                        'param15' => '',
                        'param16' => ''
                      );
          //p($parameter); die;
              $return = $this->supper_admin->call_procedureRow('proc_general', $parameter);
             //p($return); die;
              
           

               $parameter4 = array(
                        'act_mode' => 'deleteattributeslistadd', 
                        'row_id' => $id,
                        'param1' => $main_id,
                        'param2' => $sub_id,
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => '',
                        'param10' => '',
                        'param11' => '',
                        'param12' => '',
                        'param13' => '',
                        'param14' => '',
                        'param15' => '',
                        'param16' => ''
                      );
                      $return4 = $this->supper_admin->call_procedureRow('proc_general', $parameter4);
                      
                foreach($this->input->post('attrmain_id') as $main_id) {
                  foreach($this->input->post('attrsub_id_'.$main_id) as $sub_id) {
                      $parameter4 = array(
                        'act_mode' => 'deleteinsertattributeslistadd', 
                        'row_id' => $id,
                        'param1' => $main_id,
                        'param2' => $sub_id,
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => '',
                        'param10' => '',
                        'param11' => '',
                        'param12' => '',
                        'param13' => '',
                        'param14' => '',
                        'param15' => '',
                        'param16' => ''
                      );
                      $return4 = $this->supper_admin->call_procedureRow('proc_general', $parameter4);
                      //p($parameter4); 
                  }
                }
                //die;
              


          //=======================

              
              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/setting/listbannerlist");
          
        }
      }

     $parameter = array(
                        'act_mode' => 'listbannergetdata', 
                        'row_id' => $id,
                        'param1' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => '',
                        'param10' => '',
                        'param11' => '',
                        'param12' => '',
                        'param13' => '',
                        'param14' => '',
                        'param15' => '',
                        'param16' => ''
                      );
     //p($parameter); die;
    $response['listbannergetdata'] = $this->supper_admin->call_procedureRow('proc_general', $parameter);
    $parameter = array(
                        'act_mode' => 'listbannergetatt', 
                        'row_id' => $id,
                        'param1' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => '',
                        'param10' => '',
                        'param11' => '',
                        'param12' => '',
                        'param13' => '',
                        'param14' => '',
                        'param15' => '',
                        'param16' => ''
                      );
     //p($parameter); die;
    $response['listbannergetatt'] = $this->supper_admin->call_procedure('proc_general', $parameter);
    //p($response['listbannergetatt']); die;
    $parameter = array(
                        'act_mode' => 'selectcountry', 
                        'row_id' => '',
                        'param1' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => '',
                        'param10' => '',
                        'param11' => '',
                        'param12' => '',
                        'param13' => '',
                        'param14' => '',
                        'param15' => '',
                        'param16' => ''
                      );
      $response['countries'] = $this->supper_admin->call_procedure('proc_general', $parameter);
      $parameter = array(
                        'act_mode' => 'selecttypes', 
                        'row_id' => '',
                        'param1' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => '',
                        'param10' => '',
                        'param11' => '',
                        'param12' => '',
                        'param13' => '',
                        'param14' => '',
                        'param15' => '',
                        'param16' => ''
                      );
      $response['types'] = $this->supper_admin->call_procedure('proc_general', $parameter);
      $parameter = array(
                        'act_mode' => 'attributelist', 
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
      $response['attributes'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
    $this->load->view('helper/header');
    $this->load->view('setting/listbannerupdate',$response);
  }
  public function listbanneradd() {

      if($this->input->post('submit')) 
      {
        //P($_POST); die;

        $this->form_validation->set_rules('title','Title','trim|required');
        $this->form_validation->set_rules('discription','Discription','trim|required');
        
        if($this->form_validation->run() != false) {

          //==================== 

          $parameter = array(
                        'act_mode' => 'insertlistbanner', 
                        'row_id' => '',
                        'param1' => '',
                        'param2' => '',
                        'param3' => $this->input->post('title'),
                        'param4' => '',
                        'param5' => $this->input->post('discription'),
                        'param6' => $this->input->post('url'),
                        'param7' => '',
                        'param8' => '',
                        'param9' => '',
                        'param10' => $this->input->post('r_maintype_id'),
                        'param11' => $this->input->post('category_id'),
                        'param12' => $this->input->post('city_id'),
                        'param13' => $this->input->post('street_id'),
                        'param14' => '',
                        'param15' => '',
                        'param16' => ''
                      );
          
              $return = $this->supper_admin->call_procedureRow('proc_general', $parameter);
             
              if($return->id!="")
              {

for($i=0; $i<count($_FILES['r_img_name']['name']); $i++) {

                      if(!empty($_FILES['r_img_name']['name'][$i])) {
                          $upload_name = $return->id.'-'.str_replace(" ", "-", strtolower($_FILES['r_img_name']['name'][$i]));
                          $filePath = FCPATH.'public/listingbanner/'.$upload_name;
                          $tmpFilePath = $_FILES['r_img_name']['tmp_name'][$i];
                          if(move_uploaded_file($tmpFilePath, $filePath)) {
                            $r_img_name = $upload_name;
                          } else {
                            $r_img_name = "";
                          } 
                      }
                      $parameter2 = array(
                        'act_mode' => 'insertlisbanimages', 
                        'row_id' => $return->id,
                        'param1' => '',
                        'param2' => '',
                        'param3' => $r_img_name,
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => '',
                        'param10' => '',
                        'param11' => '',
                        'param12' => '',
                        'param13' => '',
                        'param14' => '',
                        'param15' => '',
                        'param16' => ''
                      );
                      $return2 = $this->supper_admin->call_procedureRow('proc_general', $parameter2);
                }

                foreach($this->input->post('attrmain_id') as $main_id) {
                  foreach($this->input->post('attrsub_id_'.$main_id) as $sub_id) {
                      $parameter4 = array(
                        'act_mode' => 'insertattributeslistadd', 
                        'row_id' => $return->id,
                        'param1' => $main_id,
                        'param2' => $sub_id,
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => '',
                        'param10' => '',
                        'param11' => '',
                        'param12' => '',
                        'param13' => '',
                        'param14' => '',
                        'param15' => '',
                        'param16' => ''
                      );
                      $return4 = $this->supper_admin->call_procedureRow('proc_general', $parameter4);
                  }
                }
              }


          //=======================

              
              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/setting/listbannerlist");
          
        }
      }
      $parameter = array(
                        'act_mode' => 'selectcountry', 
                        'row_id' => '',
                        'param1' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => '',
                        'param10' => '',
                        'param11' => '',
                        'param12' => '',
                        'param13' => '',
                        'param14' => '',
                        'param15' => '',
                        'param16' => ''
                      );
      $response['countries'] = $this->supper_admin->call_procedure('proc_general', $parameter);
      $parameter = array(
                        'act_mode' => 'selecttypes', 
                        'row_id' => '',
                        'param1' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => '',
                        'param10' => '',
                        'param11' => '',
                        'param12' => '',
                        'param13' => '',
                        'param14' => '',
                        'param15' => '',
                        'param16' => ''
                      );
      $response['types'] = $this->supper_admin->call_procedure('proc_general', $parameter);
      $parameter = array(
                        'act_mode' => 'attributelist', 
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
      $response['attributes'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
    //p($record['city']); die;
      $this->load->view('helper/header');
      $this->load->view('setting/listbanneradd',$response);
  }
  public function homebanneradd() {

      if($this->input->post('submit')) 
      {

        $this->form_validation->set_rules('title','Title','trim|required');
        $this->form_validation->set_rules('discription','Discription','trim|required');
        $this->form_validation->set_rules('bannertype','Banner type','trim|required');
        $this->form_validation->set_rules('city','City','trim|required');
        if(!empty($_FILES['image']['name'])) {
                  $upload_name = 'menu-'.str_replace(" ", "-", strtolower($_FILES['image']['name']));
                  $filePath = FCPATH.'public/homebanner/'.$upload_name;
                  $tmpFilePath = $_FILES['image']['tmp_name'];
                  if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $image = $upload_name;
                  } else {
                    $image = "";
                  }
                  //p($image); die;
              } else {
                $this->session->set_flashdata('message', 'Please select image!');
                redirect("admin/setting/homebanneradd");
              }
        if($this->form_validation->run() != false) {

              $parameter = array(
                        'act_mode' => 'homebanneradd', 
                        'v_id' => '',
                        'v_status' => $this->input->post('title'),
                        'v_mobile' => $this->input->post('discription'),
                        'v_email' => $this->input->post('bannertype'),
                        'v_pwd' => $image,
                        'tin_no' => $this->input->post('city'),
                        'tax_no' => '',
                        'bank_name' => $this->input->post('discription'),
                        'bank_addr' => $this->input->post('url'),
                        'ifsc_code' => '',
                        'bene_accno' => '',
                        'param1' => '',
                        'param2' => ''
                      );
              //p($parameter); die;
              $response = $this->supper_admin->call_procedure('proc_vendor', $parameter);

              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/setting/homebannerlist");
          
        }
      }
      $parameter = array(
                       'act_mode' => 'citylist',
                       'row_id'   => '',
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
    $record['city'] = $this->supper_admin->call_procedure('proc_setting',$parameter);
    //p($record['city']); die;
      $this->load->view('helper/header');
      $this->load->view('setting/homebanneradd',$record);
  } 

  public function homebanneredit($id) {
  
      if($this->input->post('submit')) 
      {
        //p($_POST); die;

        $this->form_validation->set_rules('title','Title','trim|required');
        $this->form_validation->set_rules('discription','Discription','trim|required');
        $this->form_validation->set_rules('bannertype','Banner type','trim|required');
        $this->form_validation->set_rules('city','City','trim|required');
        if(!empty($_FILES['image']['name'])) {
                  $upload_name = 'menu-'.str_replace(" ", "-", strtolower($_FILES['image']['name']));
                  $filePath = FCPATH.'public/homebanner/'.$upload_name;
                  $tmpFilePath = $_FILES['image']['tmp_name'];
                  if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $image = $upload_name;
                  } else {
                    $image = "";
                  }
                  //p($image); die;
              } else {
                $image=$this->input->post('oldimg');
              }
        if($this->form_validation->run() != false) {

              $parameter = array(
                        'act_mode' => 'homebannerupdate', 
                        'v_id' => $id,
                        'v_status' => $this->input->post('title'),
                        'v_mobile' => $this->input->post('discription'),
                        'v_email' => $this->input->post('bannertype'),
                        'v_pwd' => $image,
                        'tin_no' => $this->input->post('city'),
                        'tax_no' => '',
                        'bank_name' => $this->input->post('discription'),
                        'bank_addr' => $this->input->post('url'),
                        'ifsc_code' => '',
                        'bene_accno' => '',
                        'param1' => '',
                        'param2' => ''
                      );
              //p($parameter); die;
              $response = $this->supper_admin->call_procedure('proc_vendor', $parameter);

              $this->session->set_flashdata('message', 'Your information has been updated successfully!');
              redirect("admin/setting/homebannerlist");
          
        }
      }
    $parameter = array(
                       'act_mode' => 'gethomebannerdata',
                       'row_id'   => $id,
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
    $record['data'] = $this->supper_admin->call_procedureRow('proc_setting',$parameter);  
    $parameter = array(
                       'act_mode' => 'citylist',
                       'row_id'   => '',
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
    $record['city'] = $this->supper_admin->call_procedure('proc_setting',$parameter);
    //p($record['city']); die;
      $this->load->view('helper/header');
      $this->load->view('setting/homebanneredit',$record);
  } 
  public function homebannerdelete($id){  
    //$this->userfunction->loginAdminvalidation();
    
    $parameter = array(
                       'act_mode' => 'homebannerdelete',
                       'row_id'   => $id,
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
    $record['homebannerdelete'] = $this->supper_admin->call_procedure('proc_setting',$parameter);
    
    $this->session->set_flashdata('message', 'Your information was successfully Saved.');
       redirect(base_url().'admin/setting/homebannerlist');
  }
  public function listbannerdelete($id){  
    //$this->userfunction->loginAdminvalidation();
    
    $parameter = array(
                       'act_mode' => 'listbannerdelete',
                       'row_id'   => $id,
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
    $record['listbannerdelete'] = $this->supper_admin->call_procedure('proc_setting',$parameter);
    
    $this->session->set_flashdata('message', 'Your information was successfully Saved.');
       redirect(base_url().'admin/setting/listbannerlist');
  }
  
  public function listbannerlist(){  
    //$this->userfunction->loginAdminvalidation();
    
    $parameter = array(
                       'act_mode' => 'listbannerlist',
                       'row_id'   => '',
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
    $record['data'] = $this->supper_admin->call_procedure('proc_setting',$parameter);
    //p($record['data']); die;
    $this->load->view('helper/header');

    $this->load->view('helper/sidebar');
    $this->load->view('setting/listbannerlist',$record);
    $this->load->view('helper/footer');
  }
  public function homebannerlist(){  
    //$this->userfunction->loginAdminvalidation();
    
    $parameter = array(
                       'act_mode' => 'homebannerlist',
                       'row_id'   => '',
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
    $record['data'] = $this->supper_admin->call_procedure('proc_setting',$parameter);
    //p($record['data']); die;
    $this->load->view('helper/header');

    $this->load->view('helper/sidebar');
    $this->load->view('setting/homebannerlist',$record);
    $this->load->view('helper/footer');
  }
  public function homebannerstatus (){
  $rowid         = $this->uri->segment(4);
  $status        = $this->uri->segment(5);
  //p($rowid);
  //p($status); die;
  $act_mode      = $status==1?'homebinactive':'homebactive';
  $parameter = array(
                       'act_mode' => $act_mode,
                       'row_id'   => $rowid,
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
 // p($parameter); die;
  $record['data'] = $this->supper_admin->call_procedureRow('proc_setting',$parameter);
  
  $this->session->set_flashdata('message', 'Your Status was successfully Updated.');
  redirect(base_url().'admin/setting/homebannerlist');
}
public function listbannerstatus (){
  $rowid         = $this->uri->segment(4);
  $status        = $this->uri->segment(5);
  //p($rowid);
  //p($status); die;
  $act_mode      = $status==1?'listbinactive':'listbactive';
  $parameter = array(
                       'act_mode' => $act_mode,
                       'row_id'   => $rowid,
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
 // p($parameter); die;
  $record['data'] = $this->supper_admin->call_procedureRow('proc_setting',$parameter);
  
  $this->session->set_flashdata('message', 'Your Status was successfully Updated.');
  redirect(base_url().'admin/setting/listbannerlist');
}
  public function costlist(){  
    //$this->userfunction->loginAdminvalidation();
    
    $parameter = array(
                       'act_mode' => 'costlist',
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
    $this->load->view('setting/costlist',$record);
      $this->load->view('helper/footer');
  }
  public function costadd(){  
    //$this->userfunction->loginAdminvalidation();
    
    if($this->input->post('submit')){
   
       $name      = $this->input->post('couname');
       $parameter = array(
                       'act_mode' => 'costadd',
                       'row_id'   => '',
                       'counname' => $name,
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
       $record['data'] = $this->supper_admin->call_procedure('proc_setting',$parameter);
        
       
       $this->session->set_flashdata('message', 'Your information was successfully Saved.');
       redirect(base_url().'admin/setting/costlist');

  }
    
    $this->load->view('helper/header');

    $this->load->view('helper/sidebar');
    $this->load->view('setting/costadd');
    $this->load->view('helper/footer');
  }
  public function costdelete($id){  
    //$this->userfunction->loginAdminvalidation();
    
    $parameter = array(
                       'act_mode' => 'costdelete',
                       'row_id'   => $id,
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
    $record['costdelete'] = $this->supper_admin->call_procedure('proc_setting',$parameter);
    
    $this->session->set_flashdata('message', 'Your information was successfully Saved.');
       redirect(base_url().'admin/setting/costlist');
  }
    public function costupdate($id){  
    //$this->userfunction->loginAdminvalidation();

    if($this->input->post('submit')){
   
       $name      = $this->input->post('couname');
       $parameter = array(
                       'act_mode' => 'costupdate',
                       'row_id'   => $id,
                       'counname' => $name,
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
       $record['data'] = $this->supper_admin->call_procedure('proc_setting',$parameter);
        
       
       $this->session->set_flashdata('message', 'Your information was successfully Saved.');
       redirect(base_url().'admin/setting/costlist');

  }  
    
    $parameter = array(
                       'act_mode' => 'costget',
                       'row_id'   => $id,
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
    $record['data'] = $this->supper_admin->call_procedureRow('proc_setting',$parameter);
    //p($record['data']); die;
    $this->load->view('helper/header');

    $this->load->view('helper/sidebar');
    $this->load->view('setting/costedit',$record);
    $this->load->view('helper/footer');
  }
  public function coststatus (){
  $rowid         = $this->uri->segment(4);
  $status        = $this->uri->segment(5);
  //p($rowid);
  //p($status); die;
  $act_mode      = $status==1?'costinactive':'costactive';
  $parameter = array(
                       'act_mode' => $act_mode,
                       'row_id'   => $rowid,
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
 // p($parameter); die;
  $record['data'] = $this->supper_admin->call_procedureRow('proc_setting',$parameter);
  
  $this->session->set_flashdata('message', 'Your Status was successfully Updated.');
  redirect(base_url().'admin/setting/costlist');
}

  
  
  public function offertypedelete($id){  
    //$this->userfunction->loginAdminvalidation();
    
    $parameter = array(
                       'act_mode' => 'offertypedelete',
                       'row_id'   => $id,
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
    $record['offertypedelete'] = $this->supper_admin->call_procedure('proc_setting',$parameter);
    
    $this->session->set_flashdata('message', 'Your information was successfully Saved.');
       redirect(base_url().'admin/master/offertypeadd');
  }

  public function offertypeupdate($id){  
    //$this->userfunction->loginAdminvalidation();

    if($this->input->post('submit')){
   
       $name      = $this->input->post('couname');
       $parameter = array(
                       'act_mode' => 'offertypeupdate',
                       'row_id'   => $id,
                       'counname' => $name,
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
       $record['data'] = $this->supper_admin->call_procedure('proc_setting',$parameter);
        
       
       $this->session->set_flashdata('message', 'Your information was successfully Saved.');
       redirect(base_url().'admin/master/offertypeadd');

  }  
    
    $parameter = array(
                       'act_mode' => 'offertypeget',
                       'row_id'   => $id,
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
    $record['data'] = $this->supper_admin->call_procedureRow('proc_setting',$parameter);
    //p($record['data']); die;
    $this->load->view('helper/header');

    $this->load->view('helper/sidebar');
    $this->load->view('setting/offertypeupdate',$record);
    $this->load->view('helper/footer');
  }
  public function offertypestatus (){
  $rowid         = $this->uri->segment(4);
  $status        = $this->uri->segment(5);
  //p($rowid);
  //p($status); die;
  $act_mode      = $status==1?'offertypeinactive':'offertypeactive';
  $parameter = array(
                       'act_mode' => $act_mode,
                       'row_id'   => $rowid,
                       'counname' => '',
                       'coucode'  => '',
                       'commid'   => '',
                       'param1'   => '',
                       'param2'   => '',
                       'param3'   => ''
                      );
 // p($parameter); die;
  $record['data'] = $this->supper_admin->call_procedureRow('proc_setting',$parameter);
  
  $this->session->set_flashdata('message', 'Your Status was successfully Updated.');
  redirect(base_url().'admin/master/offertypeadd');
}

}