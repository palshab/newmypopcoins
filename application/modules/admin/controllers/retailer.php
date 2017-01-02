<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Retailer extends MX_Controller {

  public function __construct() {    
      $this->load->model("supper_admin");
      $this->load->helper('my_helper');   
      $this->userfunction->loginAdminvalidation(); 
  } 

  public function addmanager() {

      if(!$this->session->userdata('popcoin_login')) {
        redirect(base_url());
      }
      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('s_username','Name','trim|required');
        $this->form_validation->set_rules('s_loginemail','Email ID','trim|required');
        $this->form_validation->set_rules('s_loginpassword','Password','trim|required');
        $this->form_validation->set_rules('contact_no','Contact number','trim|required');
        if($this->form_validation->run() != false) {
            $parameter = array(
                        'act_mode' => 'checkmanager', 
                        'v_id' => '',
                        'v_status' => '',
                        'v_mobile' => '',
                        'v_email' => $this->input->post('s_loginemail'),
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
              $this->session->set_flashdata('message', 'User with this email address already exists!');
              redirect("admin/retailer/viewmanagers");
            } else { 
              $pass = $this->input->post('s_loginpassword');
              $parameter = array(
                        'act_mode' => 'insertmanager', 
                        'v_id' => '',
                        'v_status' => $this->input->post('s_username'),
                        'v_mobile' => $this->input->post('contact_no'),
                        'v_email' => $this->input->post('s_loginemail'),
                        'v_pwd' => md5($pass),
                        'tin_no' => $this->input->post('country_id'),
                        'tax_no' => $this->input->post('state_id'),
                        'bank_name' => $this->input->post('city_id'),
                        'bank_addr' => $this->input->post('location'),
                        'ifsc_code' => $this->input->post('pincode'),
                        'bene_accno' => $this->input->post('alertnatemail_id'),
                        'param1' => $this->session->userdata('popcoin_login')->s_admin_id,
                        'param2' => 4                      
                      );
              $response = $this->supper_admin->call_procedure('proc_vendor', $parameter);
              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/retailer/viewmanagers");
          }
        }
      }
      $parameter = array(
                        'act_mode' => 'fetchcountries', 
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
      $response['countries'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
      $this->load->view('helper/header');
      $this->load->view('retailer/addmanager',$response);
  } 

  public function viewmanagers() {

      $parameter = array(
                    'act_mode' => 'viewretailermanagers', 
                    'v_id' => $this->session->userdata('popcoin_login')->s_admin_id,
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
      $response['vieww'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);   
      $this->load->view('helper/header');      
      $this->load->view('retailer/viewmanagers',$response);
  }

  public function updatemanager($id) {

      if(!$this->session->userdata('popcoin_login')) {
        redirect(base_url());
      }
      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('s_username','Name','trim|required');
        $this->form_validation->set_rules('contact_no','Contact number','trim|required');
        if($this->form_validation->run() != false) {
              $parameter = array(
                        'act_mode' => 'updatemanager', 
                        'v_id' => $id,
                        'v_status' => $this->input->post('s_username'),
                        'v_mobile' => $this->input->post('contact_no'),
                        'v_email' => '',
                        'v_pwd' => '',
                        'tin_no' => $this->input->post('country_id'),
                        'tax_no' => $this->input->post('state_id'),
                        'bank_name' => $this->input->post('city_id'),
                        'bank_addr' => $this->input->post('location'),
                        'ifsc_code' => $this->input->post('pincode'),
                        'bene_accno' => $this->input->post('alertnatemail_id'),
                        'param1' => '',
                        'param2' => ''                      
                      );
              $response = $this->supper_admin->call_procedure('proc_vendor', $parameter);
              $this->session->set_flashdata('message', 'Your information has been updated successfully!');
              redirect("admin/retailer/viewmanagers");
        }
      }
      $param1 = array(
                        'act_mode' => 'fetchcountries', 
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
      $response['countries'] = $this->supper_admin->call_procedure('proc_vendor', $param1);
      $param2 = array(
                        'act_mode' => 'fetchmanagerdetail', 
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
      $this->load->view('helper/header');
      $this->load->view('retailer/updatemanager',$response);
  } 

  public function assignstore($id) {

      if(!$this->session->userdata('popcoin_login')) {
        redirect(base_url());
      }
      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('map_storeId[]','Assign store','trim|required');
        if($this->form_validation->run() != false) {
              $parameter1 = array(
                        'act_mode' => 'deleteallmappings', 
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
              $response = $this->supper_admin->call_procedure('proc_vendor', $parameter1);
              foreach($_REQUEST['map_storeId'] as $store_id) {
                $parameter2 = array(
                        'act_mode' => 'mapstorestomgr', 
                        'v_id' => $id,
                        'v_status' => $store_id,
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
                $response = $this->supper_admin->call_procedure('proc_vendor', $parameter2);
              }
              $this->session->set_flashdata('message', 'Store mapped successfully!');
              redirect("admin/retailer/viewmanagers");
        }
      }
      $parameter = array(
                  'act_mode' => 'fetchmgrstores', 
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
      $response['assignstores'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
      $parameter = array(
                  'act_mode' => 'listallstores', 
                  'v_id' => $this->session->userdata('popcoin_login')->s_admin_id,
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
      $response['stores'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
      $this->load->view('helper/header');
      $this->load->view('retailer/assignstore',$response);
  } 

  public function statusmanager($id,$status) {

      $act_mode = $status=='1'?'managerdeactive':'manageractive'; 
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
      redirect("admin/retailer/viewmanagers");
  } 

  public function deletemanager($id) {

      $parameter = array(
                        'act_mode' => 'deletemanager', 
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
      redirect("admin/retailer/viewmanagers");
  } 

  public function viewstores() {

      if($this->session->userdata('popcoin_login')->s_usertype==2) {
        $parameter = array(
                      'act_mode' => 'viewretailerstores', 
                      'v_id' => $this->session->userdata('popcoin_login')->s_admin_id,
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
        $response['vieww'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);  
      } else if($this->session->userdata('popcoin_login')->s_usertype==4) {
        $parameter = array(
                      'act_mode' => 'viewretailerstores', 
                      'v_id' => $this->session->userdata('popcoin_login')->s_admin_id,
                      'v_status' => 'manager',
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
        $response['vieww'] = $this->supper_admin->call_procedure('proc_vendor', $parameter); 
      }
      $this->load->view('helper/header');      
      $this->load->view('retailer/viewstores',$response);
  }

  public function addstore()
  {
      if(!$this->session->userdata('popcoin_login')) {
        redirect(base_url());
      }
      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('storename','Name','trim|required');
        if($this->form_validation->run() != false) {
            $parameter = array(
                        'act_mode' => 'countstore', 
                        'row_id' => '',
                        'p_name' => $this->input->post('storename'),
                        's_storecountryid' => '',//$this->input->post('storecountryid'),
                        's_statenameid' => '',//$this->input->post('storestateid'),
                        's_storecity' => '',//$this->input->post('storecityname'),
                        's_storeaddress' => '',//$this->input->post('storeaddress'),
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' => '',//$this->input->post('visitingcard'),
                        'p_samplecopy' =>'',// $this->input->post('samplebillcopy'),
                        'p_email' => '',//$this->input->post('emailid'),
                        'p_concatno' => '',//$this->input->post('contactno'),
                        'p_aggrementdate' => '',//$this->input->post('dateofagrement'),
                        'param0' => '',
                        'param1' => '',//$this->input->post('categoryid'),
                        'p_firststarttime' => '',
                        'p_firstendtime' => '',
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        's_traninggivename' => '',
                        's_traninggivenno' => '',
                        's_cashbackper' => '',
                        's_dealcommision' => '',
                        's_storeimg' => '',
                        'p_traningdate' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''
                      );     
        $res = $this->supper_admin->call_procedureRow('proc_store', $parameter);
        if($res->flag>0) {
            $this->session->set_flashdata('message', 'Store with this name already exists!');
            redirect("admin/retailer/viewstores");
        } else {


                    if(!empty($_FILES['s_storeimg']['name'])) {
                        $upload_name = time().'-'.str_replace(" ", "-", strtolower($_FILES['s_storeimg']['name']));
                        $filePath = FCPATH.'public/storelogo/'.$upload_name;
                        $tmpFilePath = $_FILES['s_storeimg']['tmp_name'];
                        if(move_uploaded_file($tmpFilePath, $filePath)) {
                          $s_storeimg = $upload_name;
                        } else {
                          $s_storeimg = "";
                        } 
                    } 
                    $parameter = array(
                        'act_mode' => 'insertretailerstore', 
                        'row_id' => '',
                        'p_name' => $this->input->post('storename'),
                        's_storecountryid' => $this->input->post('country_id'),
                        's_statenameid' => $this->input->post('stateid'),
                        's_storecity' => $this->input->post('cityname'),
                        's_storeaddress' => $this->input->post('storeaddress'),
                        's_managerid' => $this->session->userdata('popcoin_login')->s_admin_id,
                        'p_tinno' => $this->input->post('tinno'),
                        'p_servicetaxno' => $this->input->post('sservicetaxno'),
                        'p_pancardno' => $this->input->post('spancardno'),
                        'p_visitingcard' => $this->input->post('visitingcard'),
                        'p_samplecopy' => $this->input->post('samplebillcopy'),
                        'p_email' => $this->input->post('emailid'),
                        'p_concatno' => $this->input->post('contactno'),
                        'p_aggrementdate' => $this->input->post('dateofagrement'),
                        'param0' => $this->input->post('storeno'),
                        'param1' => $this->input->post('categoryid'),
                        'p_firststarttime' => '',//$this->input->post('categoryid'),
                        'p_firstendtime' => $this->input->post('bank_name'),
                        'p_sefirststarttime' => $this->input->post('ifsc_code'),
                        'p_seendttime' => $this->input->post('acc_number'),
                        'p_traninggivename' => $this->input->post('s_traninggivename'),
                        'p_traninggivenno' => $this->input->post('s_traninggivenno'),
                        'p_cashbackper' => $this->input->post('s_cashbackper'),
                        'p_dealcommision' => $this->input->post('s_dealcommision'),
                        'p_storeimg' => $s_storeimg,//$this->input->post('categoryid'),
                        'p_traningdate' =>    $this->input->post('s_traningdate'),
                        'param2' =>     $this->input->post('s_companyname'),
                        'param3' =>     '',
                        'param4' =>    $this->input->post('accholder_name'),
                        'param5' => '',
                        'param6' => $this->input->post('s_servicetaxno_val'),
                        'param7' => $this->input->post('s_visitingcard_val'),
                        'param8' => $this->input->post('s_samplecopy_val'),
                        'param9' => $this->input->post('s_tinno_val'),

                        'param01' => $this->input->post('lattitude'),
                        'param12' => $this->input->post('logitude'),
                        'param13' => $this->input->post('location'),
                        'param14' => $this->input->post('storetype'),
                        'param15' => '',
                        'param16' => '',
                        'param17' => '',
                        'param18' => '',
                        'param19' => '',
                        'param20' => '',//$this->input->post('tinnovalue')
                        'param21' => '',//$this->input->post('tinnovalue')
                        'param22' => '',//$this->input->post('tinnovalue')
                        'param23' =>'',// $this->input->post('tinnovalue')
                        'param24' =>'',// $this->input->post('tinnovalue')
                        'param25' => '',//$this->input->post('tinnovalue'),
                        
                       
                       
                      
                      );

   

          $res2 = $this->supper_admin->call_procedureRow('proc_store1', $parameter);

              //       $parameter = array(
              //           'act_mode' => 'insertretailerstore', 
              //           'row_id' => '',
              //           'p_name' => $this->input->post('storename'),
              //           's_storecountryid' => $this->input->post('country_id'),
              //           's_statenameid' => $this->input->post('state_id'),
              //           's_storecity' => $this->input->post('city_id'),
              //           's_storeaddress' => $this->input->post('storeaddress'),
              //           's_managerid' => $this->session->userdata('popcoin_login')->s_admin_id,
              //           'p_tinno' => $this->input->post('stinno'),
              //           'p_servicetaxno' => $this->input->post('sservicetaxno'),
              //           'p_pancardno' => $this->input->post('spancardno'),
              //           'p_visitingcard' => $this->input->post('visitingcard'),
              //           'p_samplecopy' => $this->input->post('samplebillcopy'),
              //           'p_email' => $this->input->post('emailid'),
              //           'p_concatno' => $this->input->post('contactno'),
              //           'p_aggrementdate' => $this->input->post('dateofagrement'),
              //           'param0' => $this->input->post('s_storeno'),
              //           'param1' => $this->input->post('categoryid'),
              //           'p_firststarttime' => '',
              //           'p_firstendtime' => $this->input->post('bank_name'),
              //           'p_sefirststarttime' => $this->input->post('ifsc_code'),
              //           'p_seendttime' => $this->input->post('acc_number'),
              //           's_traninggivename' => $this->input->post('trainggivennamee'),
              //           's_traninggivenno' => $this->input->post('trainggivenno'),
              //           's_cashbackper' => $this->input->post('cashbackper'),
              //           's_dealcommision' => $this->input->post('s_dealcommision'),
              //           's_storeimg' => $s_storeimg,
              //           'p_traningdate' => $this->input->post('s_traningdate'),
              //           'param2' => $this->input->post('s_companyname'),
              //           'param3' => '',
              //           'param4' => $this->input->post('accholder_name'),
              //           'param5' => '',
              //           'param6' => $this->input->post('s_servicetaxno_val'),
              //           'param7' => $this->input->post('s_visitingcard_val'),
              //           'param8' => $this->input->post('s_samplecopy_val'),
              //           'param9' => $this->input->post('s_tinno_val')
              //         );
              // $res2 = $this->supper_admin->call_procedureRow('proc_store', $parameter);
              foreach($_REQUEST['s_dayname'] as $val) {
                  $parameter = array(
                  'act_mode' => 'insertstoremap', 
                  'row_id' => $val,
                  'p_name' => $this->input->post('s_starttime_'.$val),
                  's_storecountryid' => $this->input->post('s_endtime_'.$val),
                  's_statenameid' => $this->input->post('s_secondstarttime_'.$val),
                  's_storecity' => $this->input->post('s_secondendtime_'.$val),
                  's_storeaddress' => $res2->cou_rec,
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
                  'p_traningdate' => '',
                  'param2' => '',
                  'param3' => '',
                  'param4' => '',
                  'param5' => '',
                  'param6' => '',
                  'param7' => '',
                  'param8' => '',
                  'param9' => ''                      
                  );
                  $res3 = $this->supper_admin->call_procedureRow('proc_store', $parameter);
              }
            $this->session->set_flashdata('message', 'Your information has been saved successfully!');
            redirect("admin/retailer/viewstores");        
          }
        }
      }

      $parameter= array(
      'act_mode'=>'allstate',
      'row_id'=>'',
      'counname'=>'',
      'coucode'=>'',
      'commid'=>''
      );
     $response['state'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);

     $parameter11 = array(
                        'act_mode' => 'liststoretype', 
                        'v_id' => '',
                        'counname' => '',
                        'coucode' => '',
                        'commid' => ''
                        
                      );
      

    
     $response['storetype'] = $this->supper_admin->call_procedure('proc_master', $parameter11);

      $parameter5 = array(
                        'act_mode' => 'selectcategory', 
                        'row_id' => '',
                        'p_name' => '',//$this->input->post('storename'),
                        's_storecountryid' => '',//$this->input->post('storecountryid'),
                        's_statenameid' => '',//$this->input->post('storestateid'),
                        's_storecity' => '',//$this->input->post('storecityname'),
                        's_storeaddress' => '',//$this->input->post('storeaddress'),
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' => '',//$this->input->post('visitingcard'),
                        'p_samplecopy' =>'',// $this->input->post('samplebillcopy'),
                        'p_email' => '',//$this->input->post('emailid'),
                        'p_concatno' => '',//$this->input->post('contactno'),
                        'p_aggrementdate' => '',//$this->input->post('dateofagrement'),
                        'param0' => '',
                        'param1' => '',//$this->input->post('categoryid'),
                        'p_firststarttime' => '',
                        'p_firstendtime' => '',
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        's_traninggivename' => '',
                        's_traninggivenno' => '',
                        's_cashbackper' => '',
                        's_dealcommision' => '',
                        's_storeimg' => '',
                        'p_traningdate' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''
                      );
      $response['category'] = $this->supper_admin->call_procedure('proc_store', $parameter5);
      $this->load->view('helper/header');      
      $this->load->view('retailer/addstore',$response);
  }

  public function updatestore($id) {

      if(!$this->session->userdata('popcoin_login')) {
        redirect(base_url());
      }
      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('storename','Name','trim|required');
        if($this->form_validation->run() != false) {
            $parameter = array(
                        'act_mode' => 'checkstore', 
                        'row_id' => $id,
                        'p_name' => $this->input->post('storename'),
                        's_storecountryid' => '',//$this->input->post('storecountryid'),
                        's_statenameid' => '',//$this->input->post('storestateid'),
                        's_storecity' => '',//$this->input->post('storecityname'),
                        's_storeaddress' => '',//$this->input->post('storeaddress'),
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' => '',//$this->input->post('visitingcard'),
                        'p_samplecopy' =>'',// $this->input->post('samplebillcopy'),
                        'p_email' => '',//$this->input->post('emailid'),
                        'p_concatno' => '',//$this->input->post('contactno'),
                        'p_aggrementdate' => '',//$this->input->post('dateofagrement'),
                        'param0' => '',
                        'param1' => '',//$this->input->post('categoryid'),
                        'p_firststarttime' => '',
                        'p_firstendtime' => '',
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        's_traninggivename' => '',
                        's_traninggivenno' => '',
                        's_cashbackper' => '',
                        's_dealcommision' => '',
                        's_storeimg' => '',
                        'p_traningdate' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''
                      );     
        $res = $this->supper_admin->call_procedureRow('proc_store', $parameter);
        if($res->flag>0) {
            $this->session->set_flashdata('message', 'Store with this name already exists!');
            redirect("admin/retailer/viewstores");
        } else {
                    if(!empty($_FILES['s_storeimg']['name'])) {
                        @unlink(FCPATH.'public/storelogo/'.$this->input->post('s_storeimg1'));
                        $upload_name = time().'-'.str_replace(" ", "-", strtolower($_FILES['s_storeimg']['name']));
                        $filePath = FCPATH.'public/storelogo/'.$upload_name;
                        $tmpFilePath = $_FILES['s_storeimg']['tmp_name'];
                        if(move_uploaded_file($tmpFilePath, $filePath)) {
                          $s_storeimg = $upload_name;
                        } else {
                          $s_storeimg = "";
                        } 
                    } else {
                      $s_storeimg = $this->input->post('s_storeimg1');
                    }
                    $parameter = array(
                        'act_mode' => 'updatestore', 
                        'row_id' => $id,
                        'p_name' => $this->input->post('storename'),
                        's_storecountryid' => $this->input->post('country_id'),
                        's_statenameid' => $this->input->post('state_id'),
                        's_storecity' => $this->input->post('city_id'),
                        's_storeaddress' => $this->input->post('storeaddress'),
                        's_managerid' => '',
                        'p_tinno' => $this->input->post('stinno'),
                        'p_servicetaxno' => $this->input->post('sservicetaxno'),
                        'p_pancardno' => $this->input->post('spancardno'),
                        'p_visitingcard' => $this->input->post('visitingcard'),
                        'p_samplecopy' => $this->input->post('samplebillcopy'),
                        'p_email' => $this->input->post('emailid'),
                        'p_concatno' => $this->input->post('contactno'),
                        'p_aggrementdate' => $this->input->post('dateofagrement'),
                        'param0' => $this->input->post('s_storeno'),
                        'param1' => $this->input->post('categoryid'),
                        'p_firststarttime' => '',
                        'p_firstendtime' => $this->input->post('bank_name'),
                        'p_sefirststarttime' => $this->input->post('ifsc_code'),
                        'p_seendttime' => $this->input->post('acc_number'),
                        's_traninggivename' => $this->input->post('trainggivennamee'),
                        's_traninggivenno' => $this->input->post('trainggivenno'),
                        's_cashbackper' => $this->input->post('cashbackper'),
                        's_dealcommision' => $this->input->post('s_dealcommision'),
                        's_storeimg' => @$s_storeimg,
                        'p_traningdate' => '',
                        'param2' => $this->input->post('s_companyname'),
                        'param3' => $this->input->post('s_traningdate'),
                        'param4' => $this->input->post('accholder_name'),
                        'param5' => '',
                        'param6' => $this->input->post('s_servicetaxno_val'),
                        'param7' => $this->input->post('s_visitingcard_val'),
                        'param8' => $this->input->post('s_samplecopy_val'),
                        'param9' => $this->input->post('s_tinno_val')
                      );
              $res2 = $this->supper_admin->call_procedureRow('proc_store', $parameter);
              foreach($_REQUEST['s_dayname'] as $val) {
                  $parameter = array(
                  'act_mode' => 'insertstoremap', 
                  'row_id' => $val,
                  'p_name' => $this->input->post('s_starttime_'.$val),
                  's_storecountryid' => $this->input->post('s_endtime_'.$val),
                  's_statenameid' => $this->input->post('s_secondstarttime_'.$val),
                  's_storecity' => $this->input->post('s_secondendtime_'.$val),
                  's_storeaddress' => $id,
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
                  'p_traningdate' => '',
                  'param2' => '',
                  'param3' => '',
                  'param4' => '',
                  'param5' => '',
                  'param6' => '',
                  'param7' => '',
                  'param8' => '',
                  'param9' => ''                      
                  );
                  $res3 = $this->supper_admin->call_procedureRow('proc_store', $parameter);
              }
            $this->session->set_flashdata('message', 'Your information has been saved successfully!');
            redirect("admin/retailer/viewstores");        
          }
        }
      }
      $parameter = array(
                        'act_mode' => 'fetchcountries', 
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
      $response['countries'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
      $parameter5 = array(
                        'act_mode' => 'selectcategory', 
                        'row_id' => '',
                        'p_name' => '',//$this->input->post('storename'),
                        's_storecountryid' => '',//$this->input->post('storecountryid'),
                        's_statenameid' => '',//$this->input->post('storestateid'),
                        's_storecity' => '',//$this->input->post('storecityname'),
                        's_storeaddress' => '',//$this->input->post('storeaddress'),
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' => '',//$this->input->post('visitingcard'),
                        'p_samplecopy' =>'',// $this->input->post('samplebillcopy'),
                        'p_email' => '',//$this->input->post('emailid'),
                        'p_concatno' => '',//$this->input->post('contactno'),
                        'p_aggrementdate' => '',//$this->input->post('dateofagrement'),
                        'param0' => '',
                        'param1' => '',//$this->input->post('categoryid'),
                        'p_firststarttime' => '',
                        'p_firstendtime' => '',
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        's_traninggivename' => '',
                        's_traninggivenno' => '',
                        's_cashbackper' => '',
                        's_dealcommision' => '',
                        's_storeimg' => '',
                        'p_traningdate' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''
                      );
    $response['category'] = $this->supper_admin->call_procedure('proc_store', $parameter5);
    $parameter = array(

                        'act_mode' => 'fetchstoredetails', 
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
    $response['vieww'] = $this->supper_admin->call_procedureRow('proc_vendor', $parameter);
    $parameter = array(

                        'act_mode' => 'fetchstoremapdetails', 
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
    $response['maps'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
    $this->load->view('helper/header');      
    $this->load->view('retailer/updatestore',$response);
  }

  public function changepassword()
  {
    //p($this->session->userdata('popcoin_login')); 
    //exit;
    $parameter = array(

                        'act_mode' => 'getpass', 
                        'v_id' => $this->session->userdata('popcoin_login')->s_admin_id,
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
    //p($parameter); exit;
    $response = $this->supper_admin->call_procedureRow('proc_vendor', $parameter);
     //p($response); exit;

 //  echo  $response->s_loginpassword; 
 //  echo "<br>";


//echo md5($this->input->post('oldpass')); exit;

    if($response->s_loginpassword==md5($this->input->post('oldpass')))
    {
    $parameter = array(

                        'act_mode' => 'changepass', 
                        'v_id' => $this->session->userdata('popcoin_login')->s_admin_id,
                        'v_status' => '',
                        'v_mobile' => md5($this->input->post('newpass')),
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
   // p($parameter); exit;
    $this->supper_admin->call_procedure('proc_vendor', $parameter);
    $this->session->set_flashdata('message', 'Your password has been changed successfully!');
    //redirect(base_url()."admin/retailer/changepassword");
  }
  else
  {
    //exit;
    $this->session->set_flashdata('message', 'Old password doesnt match!');
    //redirect(base_url()."admin/retailer/changepassword");
   
  }

    $this->load->view('helper/header');      
    $this->load->view('retailer/changepassword', $response);
  }

}
?>