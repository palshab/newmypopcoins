<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class offer extends MX_Controller {
  public $data   =   array();
  public function __construct() {
    $this->load->model("supper_admin");
    $this->load->helper('my_helper');
  }

  public function viewoffers($id) {

      $parameter = array(
                        'act_mode' => 'viewoffers', 
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
      
    
      $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter);

 

      $this->load->view('helper/header');
      $this->load->view('offer/viewoffers', $response);
  }


  public function viewdeals() {

      if($this->input->post('Search'))
      {
          $categoryid = $this->input->post('dealcategory');
          $stardate = $this->input->post('o_start_date');
          $enddate = $this->input->post('o_end_date');
          if($this->session->userdata('popcoin_login')->s_usertype==2) {
              $parameter = array(
                'act_mode' => 'fiterviewdeal', 
                'row_id' => $categoryid,
                'param1' => 'retailer',
                'param2' => $this->session->userdata('popcoin_login')->s_admin_id,
                'param3' => $stardate,
                'param4' => $enddate,
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
              $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter);
          } else if($this->session->userdata('popcoin_login')->s_usertype==4) {
            $parameter = array(
                'act_mode' => 'fiterviewdeal', 
                'row_id' => $categoryid,
                'param1' => 'manager',
                'param2' => $this->session->userdata('popcoin_login')->s_admin_id,
                'param3' => $stardate,
                'param4' => $enddate,
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
              $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter);
          } else {
              $parameter = array(
                'act_mode' => 'fiterviewdeal', 
                'row_id' => $categoryid,
                'param1' => '',
                'param2' => '',
                'param3' => $stardate,
                'param4' => $enddate,
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
              

              //p($parameter);  exit;

              $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter);
          }

          $parameter1 = array(
          'act_mode'=>'listcategory',
          'row_id'=>'',
          'p_name'=>'',
          'Param4'=>'',
          'Param5'=>'',
          'Param6'=>'',
          'Param7'=>''
          );
          $response['category'] = $this->supper_admin->call_procedure('typedeal', $parameter1);
      } else {
          if($this->session->userdata('popcoin_login')->s_usertype==2) {
          $parameter = array(
            'act_mode' => 'viewdeal', 
            'row_id' => $this->session->userdata('popcoin_login')->s_admin_id,
            'param1' => 'retailer',
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
          $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter);
        } else if($this->session->userdata('popcoin_login')->s_usertype==4) {
          $parameter = array(
            'act_mode' => 'viewdeal', 
            'row_id' => $this->session->userdata('popcoin_login')->s_admin_id,
            'param1' => 'manager',
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
          $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter);
        } else {
          $parameter = array(
            'act_mode' => 'viewdeal', 
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
          $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter);
        }
          $parameter1 = array(
          'act_mode'=>'listcategory',
          'row_id'=>'',
          'p_name'=>'',
          'Param4'=>'',
          'Param5'=>'',
          'Param6'=>'',
          'Param7'=>''
          );
          $response['category'] = $this->supper_admin->call_procedure('typedeal', $parameter1);
      }

      $parameter1 = array('act_mode'=>'viewdealstatus','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
     
      


      $response['dealstatus'] = $this->supper_admin->call_procedure('proc_master',$parameter1);


      $parameter1 = array('act_mode'=>'countdeal','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
     
      


      $response['noofdeal'] = $this->supper_admin->call_procedureRow('proc_master',$parameter1);

      //p($response['noofdeal']); exit;

      $this->load->view('helper/header');
      $this->load->view('offer/viewdeals', $response);     
  }

  public function viewmydeals() {


    if($this->input->post('Search'))
    {
       $categoryid = $this->input->post('dealcategory');

       $stardate = $this->input->post('o_start_date');

       $enddate = $this->input->post('o_end_date');


       $parameter = array(
                        
                        'act_mode' => 'filterviewmydeals', 
                        'row_id' => $categoryid,
                        'param1' => $this->session->userdata('popcoin_login')->s_admin_id,
                        'param2' => '',
                        'param3' => $stardate,
                        'param4' => $enddate,
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
      
   
      $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter);

       $parameter1 = array(

        'act_mode'=>'listcategory',
        'row_id'=>'',
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      ); 
      $response['category'] = $this->supper_admin->call_procedure('typedeal', $parameter1);

    }else{

      $parameter = array(
                        'act_mode' => 'viewmydeals', 
                        'row_id' => '',//$categoryid,
                        'param1' => $this->session->userdata('popcoin_login')->s_admin_id,
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
      
      $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter);
     $parameter1 = array(

        'act_mode'=>'listcategory',
        'row_id'=>'',
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      );
     
      $response['category'] = $this->supper_admin->call_procedure('typedeal', $parameter1);

    }

      $this->load->view('helper/header');
      $this->load->view('offer/viewmydeals', $response);     
  }

  public function deleteoffer($id,$res_id) {

      $parameter = array(
                        'act_mode' => 'deleteoffer', 
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
      $response = $this->supper_admin->call_procedure('proc_general', $parameter);

      $this->session->set_flashdata('message', 'Record has been deleted successfully!');
      redirect("admin/offer/showchangestatus/pending"); 
  } 

  public function publishdeal($id) {

      $parameter = array(
                        'act_mode' => 'publishdeal', 
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
      $response = $this->supper_admin->call_procedure('proc_general', $parameter);

      $this->session->set_flashdata('message', 'Deal has been published successfully!');
      redirect("admin/offer/draftdeals"); 
  } 

  public function statusoffer($id,$status,$res_id) {

      $act_mode = $status=='1'?'offerdeactive':'offeractive'; 
      $parameter = array(
                        'act_mode' => $act_mode, 
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
      $response = $this->supper_admin->call_procedure('proc_general', $parameter);

      $this->session->set_flashdata('message', 'Status has been changed successfully!');
      redirect("admin/offer/viewdeals/");  

      //redirect("admin/offer/showchangestatus/pending");
  } 

  public function addoffer() {

      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('offertype_id','Offer type','trim|required');
        //$this->form_validation->set_rules('o_start_date','Start date','trim|required');
        //$this->form_validation->set_rules('o_end_date','End date','trim|required');

        
        if($this->form_validation->run() != false) {
            
              if(!empty($_FILES['o_menu']['name'])) {
                  $upload_name = $this->input->post('offertype_id').'-'.time().'-'.str_replace(" ", "-", strtolower($_FILES['o_menu']['name']));
                  $filePath = FCPATH.'public/offermenu-images/'.$upload_name;
                  $tmpFilePath = $_FILES['o_menu']['tmp_name'];
                  if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $o_menu = $upload_name;
                    $imagepath = $o_menu;
                  } else {
                    $o_menu = "";
                  } 
              }
             /* if($this->input->post('submit')=='Publish') {
                $publish_status = 'pending';
              } else {
                $publish_status = 'draft';
              }*/
              if($this->session->userdata('popcoin_login')->s_usertype==2 || $this->session->userdata('popcoin_login')->s_usertype==4) { 
                $status = 0;
              } else {
                $status = 1;
              }            
              $parameter = array(
                        'act_mode' => 'insertoffer', 
                        'row_id' => $this->input->post('o_numusers'),
                        'param1' => $this->input->post('offertype_id'),
                        'param2' => $this->input->post('category'),
                        'param3' => $this->input->post('o_name'),
                        'param4' => $this->input->post('o_start_date'),
                        'param5' => $this->input->post('o_desc'),
                        'param6' => $this->input->post('o_end_date'),
                        'param7' => $this->input->post('tagline'),
                        'param8' => $this->input->post('o_offer_type'),
                        'param9' => @$o_menu,
                        'param10' => 'pending',//$publish_status,
                        'param11' => '',
                        'param12' => '',
                        'param13' => $status,
                        'param14' => $this->input->post('cosinpopcoins'),
                        'param15' => $this->input->post('commission'),
                        'param16' => '',
                        'param17' => '',
                        'param18' => '',
                        'param19' => '',
                        'param20' => '',
                        'param21' => $this->session->userdata('popcoin_login')->s_admin_id, 
                        'param22' => $this->input->post('retailer_id'),
                        'param23' => $this->input->post('o_numvouchers'),
                        'param24' => $this->input->post('s_admin_id'),
                        'param25' => ''
                      ); 

             

              $return = $this->supper_admin->call_procedureRow('proc_procedure5', $parameter);
              if($this->input->post('o_offer_type')==1) {

                  $o_start_time=$this->input->post('o_start_time');
                  $o_end_time=$this->input->post('o_end_time');
                  $o_start_timeopt=$this->input->post('o_start_timeopt');
                  $o_end_timeopt=$this->input->post('o_end_timeopt');
                  $parameter4 = array(
                                'act_mode' => 'insertoffermap', 
                                'row_id' => $return->cou_rec,
                                'param1' => '',
                                'param2' => '',
                                'param3' => '-1',
                                'param4' => $o_start_time,
                                'param5' => '',
                                'param6' => $o_end_time,
                                'param7' => $o_start_timeopt,
                                'param8' => '',
                                'param9' => $o_end_timeopt,
                                'param10' => '',
                                'param11' => '',
                                'param12' => '',
                                'param13' => '',
                                'param14' => '',
                                'param15' => '',
                                'param16' => ''
                              );
                      $return4 = $this->supper_admin->call_procedureRow('proc_general', $parameter4);

              } else {

                  if(!empty($_REQUEST['map_id'])) {
                      foreach($_REQUEST['map_id'] as $map_id) {
                        $parameter2 = array(
                                'act_mode' => 'insertoffermap', 
                                'row_id' => $return->cou_rec,
                                'param1' => '',
                                'param2' => '',
                                'param3' => $map_id,
                                'param4' => $this->input->post('om_start_time_'.$map_id),
                                'param5' => '',
                                'param6' => $this->input->post('om_end_time_'.$map_id),
                                'param7' => $this->input->post('om_start_timeopt_'.$map_id),
                                'param8' => '',
                                'param9' => $this->input->post('om_end_timeopt_'.$map_id),
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
                  }  
              }                               
              $this->session->set_flashdata('message', 'Your information has been saved successfully!');              
               redirect("admin/offer/showchangestatus/pending"); 


             /* if($publish_status=='pending') {
                redirect("admin/offer/showchangestatus/pending");
              } else {
                redirect("admin/offer/draftdeals");
              }*/
        }
      }
       $parameter5 = array(
                        'act_mode' => 'selectoffer', 
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
      $response['offers'] = $this->supper_admin->call_procedure('proc_general', $parameter5);
      $parameter6 = array(
                        'act_mode' => 'fetchrestname', 
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
      $response['resdetail'] = $this->supper_admin->call_procedureRow('proc_general', $parameter6);    
      /*$parameter7 = array(
                        'act_mode' => 'category', 
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
                      );*/
   $parameter1 = array(
          'act_mode'=>'listcategory',
          'row_id'=>'',
          'p_name'=>'',
          'Param4'=>'',
          'Param5'=>'',
          'Param6'=>'',
          'Param7'=>''
          );
          $response['category'] = $this->supper_admin->call_procedure('typedeal', $parameter1);



      //$response['category'] = $this->supper_admin->call_procedure('proc_general', $parameter7);
      $parameter = array(
                        'act_mode' => 'viewvendors', 
                        'proc_s_username' => '',
                        'proc_emailid' => '',
                        'proc_alertnatemail_id' => '',
                        'proc_country_id' => '',
                        'proc_state_id' => '',
                        'proc_city_id' => '',
                        'proc_location' => '',
                        'proc_pincode' => '',
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
                        'proc_account_h_number' =>'',
                        'proc_ifsc_code'=>'',
                        'proc_branch_name' =>'',
                        'proc_bank_details' =>'',
                        'proc_document_rec_date'=>'',
                        'proc_ratiler_enrol_date' =>'',
                        'proc_aggre_sing_date'=>'',
                        'proc_profile_pic'=>'',
                        'proc_password' => '',
                        'p_ramemplid' => '',
                        'p_rambranname' => '',
                        'p_ramoffiialid' => '',
                        'p_ramcontactno' => '',
                        'Param6' => '',
                        'Param7' => '',
                        'Param8' => '',
                        'Param9' => '',
                        'Param10' => ''                    
                      );
      $response['retailerlist'] = $this->supper_admin->call_procedure('proc_retailerreg', $parameter);
      

      //p($response['retailerlist']); exit;


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
      $this->load->view('offer/addoffer',$response);
  } 

  /*public function addoffer() {

      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('o_name','Offer name','trim|required');
        $this->form_validation->set_rules('category','category','trim|required');        
        $this->form_validation->set_rules('offertype_id','Offer type','trim|required');
        $this->form_validation->set_rules('o_start_date','Start date','trim|required');
        $this->form_validation->set_rules('o_end_date','End date','trim|required');
        
        $this->form_validation->set_rules('cosinpopcoins','cosinpopcoins','trim|required');
        $this->form_validation->set_rules('commission','commission','trim|required');
        $this->form_validation->set_rules('o_numvouchers','Number of vouchers','trim|required');
       

        if($this->form_validation->run() != false) {
           
              if(!empty($_FILES['o_menu']['name'])) {
                  $upload_name = $this->input->post('offertype_id').'-'.time().'-'.str_replace(" ", "-", strtolower($_FILES['o_menu']['name']));
                  $filePath = FCPATH.'public/offermenu-images/'.$upload_name;
                  $tmpFilePath = $_FILES['o_menu']['tmp_name'];
                  if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $o_menu = $upload_name;
                  } else {
                    $o_menu = "";
                  } 
              }
             
              $parameter = array(
                        'act_mode' => 'insertoffer', 
                        'row_id' => $this->input->post('o_numusers'),
                        'param1' => $this->input->post('offertype_id'),
                        'param2' => $this->input->post('category'),
                        'param3' => $this->input->post('o_name'),
                        'param4' => $this->input->post('o_start_date'),
                        'param5' => $this->input->post('o_desc'),
                        'param6' => $this->input->post('o_end_date'),
                        'param7' => '',//$pay_options,
                        'param8' => $this->input->post('o_offer_type'),
                        'param9' => @$o_menu,
                        'param10' => '',
                        'param11' => $this->input->post('o_termsconditions'),
                        'param12' => '',
                        'param13' =>'',
                        'param14' => $this->input->post('cosinpopcoins'),
                        'param15' => $this->input->post('commission'),
                        'param16' => '',
                        'param17' => '',
                        'param18' => '',
                        'param19' => '',
                        'param20' => '',
                        'param21' => '',
                        'param22' => '',
                        'param23' => $this->input->post('o_numvouchers'),
                        'param24' => $this->input->post('s_admin_id'),
                        'param25' => ''
                      );


           
              $return = $this->supper_admin->call_procedureRow('proc_procedure5', $parameter);

             
              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/offer/viewoffers");
        }
      }
      $parameter = array(
                        'act_mode' => 'selectoffer', 
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
      $response['offers'] = $this->supper_admin->call_procedure('proc_general', $parameter);
      $parameter = array(
                        'act_mode' => 'fetchrestname', 
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
      $response['resdetail'] = $this->supper_admin->call_procedureRow('proc_general', $parameter);
     

      $parameter = array(
                        'act_mode' => 'category', 
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
      $response['category'] = $this->supper_admin->call_procedure('proc_general', $parameter);

      $parameter = array(
                        'act_mode' => 'viewvendors', 
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
      $response['vieww'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);

      



      $this->load->view('helper/header');
      $this->load->view('offer/addoffer',$response);
  } */

  public function updateoffer($offer_id) {

 

      if($this->input->post('submit')) 
      {
       
        $this->form_validation->set_rules('o_name','Deal name','trim|required');
        $this->form_validation->set_rules('category','category','trim|required');        
      
        $this->form_validation->set_rules('o_start_date','Start date','trim|required');
        $this->form_validation->set_rules('o_end_date','End date','trim|required');
        //$this->form_validation->set_rules('Heading','Heading','trim|required');
        //$this->form_validation->set_rules('Tagline','Tagline','trim|required');
        $this->form_validation->set_rules('cosinpopcoins','cosinpopcoins','trim|required');
        $this->form_validation->set_rules('commission','commission','trim|required');
        //$this->form_validation->set_rules('o_numvouchers','Number of vouchers','trim|required');
        //$this->form_validation->set_rules('featured','featured','trim|required');

    
      if($this->form_validation->run() != false) {
        
              
                $o_start_time=$this->input->post('o_start_time');
                $o_end_time=$this->input->post('o_end_time');
                 






                 if(!empty($_FILES['o_menu1']['name'])) {

                 
                  $upload_name = $this->input->post('offertype_id').'-'.time().'-'.str_replace(" ", "-", strtolower($_FILES['o_menu1']['name']));
                  $filePath = FCPATH.'public/offermenu-images/'.$upload_name;
                  $tmpFilePath = $_FILES['o_menu1']['tmp_name'];
                  if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $o_menu = $upload_name;
                  } else {
                    $o_menu = "";
                  } 
              }else{
              	
              	
              	 $o_menu = $this->input->post('o_menu2');
              }


               



              /*$parameter = array(
                        'act_mode' => 'updateoffer', 
                        'row_id' => $offer_id,
                        'param1' => '',//$this->input->post('o_numusers'),
                        'param2' => $this->input->post('category'),
                        'param3' => $this->input->post('o_name'),
                        'param4' => $this->input->post('o_start_date'),
                        'param5' => $this->input->post('o_desc'),
                        'param6' => $this->input->post('o_end_date'),
                        'param7' => '',
                        'param8' => '',
                        'param9' => @$o_menu,
                        'param10' => '',
                        'param11' => $this->input->post('o_termsconditions'),
                        
                        'param12' =>'',
                        'param13' =>'',
                        'param14' => $this->input->post('cosinpopcoins'),
                        'param15' => $this->input->post('commission'),
                        'param16' => '',
                        
                        'param17' => '',
                        'param18' => $this->input->post('company_ad_url1'),
                        'param19' => $this->input->post('company_ad_url2'),
                        'param20' => '',
                        'param21' => '',
                        'param22' => $this->input->post('offertype_id'),
                        'param23' => '',//$this->input->post('o_numvouchers'),
                        'param24' => $this->input->post('s_admin_id'),
                        'param25' => ''
                      
                      );*/

                      $parameter = array(
                        'act_mode' => 'newupdateoffer', 
                        'row_id' => $offer_id,
                        'param1' => $this->input->post('offertype_id'),
                        'param2' => $this->input->post('category'),
                        'param3' => $this->input->post('o_name'),
                        'param4' => $this->input->post('o_start_date'),
                        'param5' => $this->input->post('o_desc'),
                        'param6' => $this->input->post('o_end_date'),
                        'param7' => $this->input->post('tagline'),
                        'param8' => $this->input->post('o_offer_type'),
                        'param9' => $o_menu,
                        'param10' => '',
                        'param11' => '',
                        'param12' => '',
                        'param13' =>'',
                        'param14' => $this->input->post('cosinpopcoins'),
                        'param15' => $this->input->post('commission'),
                        'param16' => $this->input->post('o_numusers'),
                        'param17' => $this->input->post('o_numvouchers'),
                        'param18' => '',
                        'param19' => '',
                        'param20' => '',
                        'param21' => '',
                        'param22' => $this->input->post('retailer_id'),
                        'param23' => '',//$this->input->post('o_numvouchers'),
                        'param24' => $this->input->post('s_admin_id'),
                        'param25' => ''
                      ); 

                      
              
           //p($parameter); exit;

              $return = $this->supper_admin->call_procedureRow('proc_procedure5', $parameter);
              
              //p($return); exit;

            	/*if($return->offer_id!='')
            	{
            		*/

              	//if($this->input->post('o_offer_type')==1) {

                 
                 // p(count($_REQUEST['map_id']))  ; exit();
                  $i=0;
                  foreach ($_REQUEST['map_id'] as $key => $val) {
                      
                 /* $o_start_time=$this->input->post('s_starttime_'.$val);
                  $o_end_time=$this->input->post('s_endtime_'.$val);
                  $o_start_timeopt=$this->input->post('s_secondstarttime_'.$val);
                  $o_end_timeopt=$this->input->post('s_secondendtime_'.$val);*/
                  

               

                      $parameter4 = array(
                                'act_mode' => 'insertoffermap', 
                                'row_id' => $offer_id,
                                'param1' => '',
                                'param2' => '',
                                'param3' => $val,
                                'param4' => $this->input->post('om_start_time_'.$val),
                                'param5' => '',
                                'param6' => $this->input->post('om_end_time_'.$val),
                                'param7' => $this->input->post('om_start_timeopt_'.$val),
                                'param8' => '',
                                'param9' => $this->input->post('om_end_timeopt_'.$val),
                                'param10' => '',
                                'param11' => '',
                                'param12' => '',
                                'param13' => '',
                                'param14' => '',
                                'param15' => '',
                                'param16' => ''
                              );
                   

                     // p($parameter4);

                       $return4 = $this->supper_admin->call_procedure('proc_general', $parameter4);
                  
                   






                  

}



        }
      }
     /* $parameter2 = array(
                        'act_mode' => 'fetchrestname', 
                        'row_id' => $offer_id,
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

      //p($parameter2); exit;
      $response['resdetail'] = $this->supper_admin->call_procedure('proc_general', $parameter2);*/
      //p($response['resdetail']); 
      //p($response['resdetail']); exit;


      $parameter3 = array(
                        'act_mode' => 'fetchoffer', 
                        'row_id' => $offer_id,
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
      $response['offer'] = $this->supper_admin->call_procedureRow('proc_general', $parameter3);
       //p($response['offer']->offer_id); exit;
        


$parameter11 = array(
                        'act_mode' => 'offermapingdata', 
                        'row_id' => $response['offer']->offer_id,
                        'param1' => '',
                        'param2' =>  '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',//$this->input->post('o_desc'),
                        'param6' => '',//$this->input->post('o_end_date'),
                        'param7' => '',//$this->input->post('tagline'),
                        'param8' => '',//$this->input->post('o_offer_type'),
                        'param9' => '',//@$o_menu,
                        'param10' => '',
                        'param11' => '',
                        'param12' => '',
                        'param13' =>'',
                        'param14' => '',//$this->input->post('cosinpopcoins'),
                        'param15' => '',//$this->input->post('commission'),
                        'param16' => '',
                        'param17' => '',
                        'param18' => '',
                        'param19' => '',
                        'param20' => '',
                        'param21' => '',
                        'param22' => '',//$this->input->post('retailer_id'),
                        'param23' => '',//$this->input->post('o_numvouchers'),
                        'param24' => '',//$this->input->post('s_admin_id'),
                        'param25' => ''
                      ); 




      $response['offermaping'] = $this->supper_admin->call_procedure('proc_procedure5', $parameter11);


    //  p($response['offermaping']);

        $parameter20 = array(
                        'act_mode' => 'viewvendors', 
                        'proc_s_username' => '',
                        'proc_emailid' => '',
                        'proc_alertnatemail_id' => '',
                        'proc_country_id' => '',
                        'proc_state_id' => '',
                        'proc_city_id' => '',
                        'proc_location' => '',
                        'proc_pincode' => '',
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
                        'proc_account_h_number' =>'',
                        'proc_ifsc_code'=>'',
                        'proc_branch_name' =>'',
                        'proc_bank_details' =>'',
                        'proc_document_rec_date'=>'',
                        'proc_ratiler_enrol_date' =>'',
                        'proc_aggre_sing_date'=>'',
                        'proc_profile_pic'=>'',
                        'proc_password' => '',
                        'p_ramemplid' => '',
                        'p_rambranname' => '',
                        'p_ramoffiialid' => '',
                        'p_ramcontactno' => '',
                        'Param6' => '',
                        'Param7' => '',
                        'Param8' => '',
                        'Param9' => '',
                        'Param10' => ''                    
                      );
      $response['retailerlist'] = $this->supper_admin->call_procedure('proc_retailerreg', $parameter20);

      $parameter20 = array(
                        'act_mode' => 'viewstores', 
                        'proc_s_username' => '',
                        'proc_emailid' => '',
                        'proc_alertnatemail_id' => '',
                        'proc_country_id' => '',
                        'proc_state_id' => '',
                        'proc_city_id' => '',
                        'proc_location' => '',
                        'proc_pincode' => '',
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
                        'proc_account_h_number' =>'',
                        'proc_ifsc_code'=>'',
                        'proc_branch_name' =>'',
                        'proc_bank_details' =>'',
                        'proc_document_rec_date'=>'',
                        'proc_ratiler_enrol_date' =>'',
                        'proc_aggre_sing_date'=>'',
                        'proc_profile_pic'=>'',
                        'proc_password' => '',
                        'p_ramemplid' => '',
                        'p_rambranname' => '',
                        'p_ramoffiialid' => '',
                        'p_ramcontactno' => '',
                        'Param6' => '',
                        'Param7' => '',
                        'Param8' => '',
                        'Param9' => '',
                        'Param10' => ''                    
                      );
      $response['storelist'] = $this->supper_admin->call_procedure('proc_retailerreg', $parameter20);




        $parameter5 = array(
                        'act_mode' => 'fetchvendor', 
                        'row_id' => $offer_id,
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
      $response['vendor'] = $this->supper_admin->call_procedureRow('proc_general', $parameter5);

      $parameter4 = array(
                        'act_mode' => 'fetchoffermaps', 
                        'row_id' => $offer_id,
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
      $response['offermaps'] = $this->supper_admin->call_procedure('proc_general', $parameter4);

      $parameter = array(
                        'act_mode' => 'category', 
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
      $response['category'] = $this->supper_admin->call_procedure('proc_general', $parameter);


      $parameter = array(
                        'act_mode' => 'selectoffer', 
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
      $response['offers'] = $this->supper_admin->call_procedure('proc_general', $parameter);

      //p($response['offers']); exit;

  


$parameter10 = array(
                        'act_mode' => 'viewstore', 
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

                    




      
      $response['viewstore'] = $this->supper_admin->call_procedure('proc_store', $parameter10);

      //p($response['viewstore']); exit;
      
     
     // p($response['viewstore']); exit;
      $this->load->view('helper/header');
      $this->load->view('offer/updateoffer',$response);
  } 

  public function generatevoucher() {
    $code = 'Pro';
    $num = rand(111111, 999999);
    $string = "coupon";
    $str = str_shuffle($num . $string);
    $uniqueCode = $code . $str;
    echo $uniqueCode;
  }

  public function mapoffer() {

      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('restaurant_id[]','Select restaurant','required');

        if($this->form_validation->run() != false) {

          foreach($this->input->post('restaurant_id') as $res_id) {

            $parameter = array(
                        'act_mode' => 'checkofferrestmap', 
                        'row_id' => '',
                        'param1' => $this->input->post('offer_id'),
                        'param2' => $res_id,
                        'param3' => $product_ids,
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
            $res = $this->supper_admin->call_procedureRow('proc_general', $parameter);

            if($res->cou_rec>0) {

              $product_ids = implode(",",$this->input->post('product_id_'.$res_id));
              $parameter = array(
                        'act_mode' => 'updateofferrestmap', 
                        'row_id' => $res->ro_map_id,
                        'param1' => '',
                        'param2' => '',
                        'param3' => $product_ids,
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
              $return = $this->supper_admin->call_procedureRow('proc_general', $parameter);

            } else { 

              $product_ids = implode(",",$this->input->post('product_id_'.$res_id));
              $parameter = array(
                        'act_mode' => 'insertofferrestmap', 
                        'row_id' => '',
                        'param1' => $this->input->post('offer_id'),
                        'param2' => $res_id,
                        'param3' => $product_ids,
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
              $return = $this->supper_admin->call_procedureRow('proc_general', $parameter);
            }

              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/offer/viewoffers");
          }
        }
      }
      $parameter = array(
                        'act_mode' => 'fetchalloffers', 
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
      $response['offers'] = $this->supper_admin->call_procedure('proc_general', $parameter);
      $parameter2 = array(
                        'act_mode' => 'selectrestaurant', 
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
      $response['restaurants'] = $this->supper_admin->call_procedure('proc_general', $parameter2);
      $this->load->view('helper/header');
      $this->load->view('offer/mapoffer',$response);
  } 

  public function fetchrestaurants() {
      $offertype_id = $this->input->post('offertype_id');
      /*if($offertype_id != 1) {
        echo '<div class="col-lg-12">                                 
            <div class="row">
                <div class="sep_box">
                   <div class="col-lg-12">
                        <div class="row ">
                            <div class="col-lg-2">
                                <div class="tbl_text">'; if($offertype_id==2) echo 'Commodity Price (In Rs.)'; else if($offertype_id==3) echo 'Discount Price (In %)'; echo '<span style="color:red;font-weight: bold;">*</span></div>
                            </div>
                            <div class="col-lg-10">
                                <div class="tbl_input">
                                    <input type="text" name="o_price" value="" />
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>                                  
        </div>';  
      }     */  
  }

  public function fetchresdetails() {
        $type_id = $this->input->post('type_id');    
        $parameter2 = array(
                        'act_mode' => 'fetchrestaurant', 
                        'row_id' => $type_id,
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
      $restaurants = $this->supper_admin->call_procedure('proc_general', $parameter2);



      echo '<option value="">-- Select Outlet --</option>';
      foreach($restaurants as $val) {
        echo '<option value="'.$val->store_id.'">'.$val->s_name.'</option>';
      }      
  }

  public function fetchproducts() {
        $restaurant_id = $this->input->post('restaurant_id');    
        $parameter = array(
                    'act_mode' => 'fetchresproducts', 
                    'row_id' => $restaurant_id,
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
        $products = $this->supper_admin->call_procedure('proc_general', $parameter);
        echo '<div class="col-lg-12">                                 
          <div class="row">
              <div class="sep_box">
                  <div class="col-lg-12">
                      <div class="row ">
                          <div class="col-lg-2">
                              <div class="tbl_text" >Map Products <span style="color:red;font-weight: bold;">*</span></div>
                          </div>
                          <div class="col-lg-10">
                              <div class="tbl_input">';
                                      foreach($products as $val) {
                                      echo '<input type="checkbox" name="product_id[]" value="'.$val->pro_id.'" /> '.$val->pro_name.'  -  Rs.'.$val->pro_price;
                                      echo '<br />';
                                      }                                                          
                                  echo '</div>
                          </div>                                     
                      </div>
                  </div>
              </div>
          </div>
        </div>';         
  }

   public function viewcompanyads() {

      $parameter = array(
                        'act_mode' => 'viewcompanyads', 
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
      $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter);

      $this->load->view('helper/header');
      $this->load->view('offer/viewcompanyads', $response);
  }

  public function addcompanyad() {

      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('comp_title','Company title','trim|required');
        $this->form_validation->set_rules('comp_desc','Description','trim|required');

        if($this->form_validation->run() != false) {

                $parameter = array(
                            'act_mode' => 'checkcompanyad', 
                            'row_id' => '',
                            'param1' => '',
                            'param2' => '',
                            'param3' => $this->input->post('comp_title'),
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
                $res = $this->supper_admin->call_procedureRow('proc_general', $parameter);

                if($res->cou_rec>0) {
                  $this->session->set_flashdata('message', 'This company already exists!');
                  redirect("admin/offer/viewcompanyads");
                } else {
                  $parameter = array(
                            'act_mode' => 'insertcompanyad', 
                            'row_id' => '',
                            'param1' => '',
                            'param2' => '',
                            'param3' => $this->input->post('comp_title'),
                            'param4' => $this->input->post('comp_desc'),
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
                  $return = $this->supper_admin->call_procedureRow('proc_general', $parameter);
                  $this->session->set_flashdata('message', 'Your information has been saved successfully!');
                  redirect("admin/offer/viewcompanyads");
              }              
        }
      }
      
      $this->load->view('helper/header');
      $this->load->view('offer/addcompanyad');
  } 

  public function deletecompanyad($id) {

      $parameter = array(
                        'act_mode' => 'deletecompanyad', 
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
      $response = $this->supper_admin->call_procedure('proc_general', $parameter);

      $this->session->set_flashdata('message', 'Record has been deleted successfully!');
      redirect("admin/offer/viewcompanyads");
  }

  public function statuscompanyad($id,$status) {

      $act_mode = $status=='1'?'companyadinactive':'companyadactive'; 
      $parameter = array(
                        'act_mode' => $act_mode, 
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
      $response = $this->supper_admin->call_procedure('proc_general', $parameter);

      $this->session->set_flashdata('message', 'Status has been changed successfully!');
      redirect("admin/offer/viewcompanyads");
  } 

  public function updatecompanyad($id) {

      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('comp_title','Company title','trim|required');
        $this->form_validation->set_rules('comp_desc','Description','trim|required');

        if($this->form_validation->run() != false) {

                $parameter = array(
                            'act_mode' => 'checkcompanyad2', 
                            'row_id' => $id,
                            'param1' => '',
                            'param2' => '',
                            'param3' => $this->input->post('comp_title'),
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
                $res = $this->supper_admin->call_procedureRow('proc_general', $parameter);

                if($res->cou_rec>0) {
                  $this->session->set_flashdata('message', 'This company already exists!');
                  redirect("admin/offer/viewcompanyads");
                } else {
                  $parameter = array(
                            'act_mode' => 'updatecompanyad', 
                            'row_id' => $id,
                            'param1' => '',
                            'param2' => '',
                            'param3' => $this->input->post('comp_title'),
                            'param4' => $this->input->post('comp_desc'),
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
                  $return = $this->supper_admin->call_procedureRow('proc_general', $parameter);
                  $this->session->set_flashdata('message', 'Your information has been saved successfully!');
                  redirect("admin/offer/viewcompanyads");
              }              
        }
      }
      $parameter = array(
                            'act_mode' => 'fetchcompanyad', 
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
      $response['vieww'] = $this->supper_admin->call_procedureRow('proc_general', $parameter);      
      $this->load->view('helper/header');
      $this->load->view('offer/updatecompanyad',$response);
  } 


  public function changestatus()
  {
      
      $id = $this->uri->segment(4);


    $parameter = array(
                            'act_mode' => 'changestatus', 
                            'row_id' => $id,
                            'param1' => '',
                            'param2' => '',
                            'param3' => $this->input->post('statusvalue'),
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
    

    
    $response['vieww'] = $this->supper_admin->call_procedureRow('proc_general', $parameter); 

    
      echo $this->session->set_flashdata('message','Update successfully');

  }

  public function showchangestatus()
  {
      $statvalue = $this->input->post('statusvalue');
      $statvalue1 = $this->uri->segment(4);      
      if($statvalue=='all')
      {
        if($this->session->userdata('popcoin_login')->s_usertype==2) {
          $parameter = array(
            'act_mode' => 'viewdeal', 
            'row_id' => $this->session->userdata('popcoin_login')->s_admin_id,
            'param1' => 'retailer',
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
          $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter);
        } else if($this->session->userdata('popcoin_login')->s_usertype==4) {
          $parameter = array(
            'act_mode' => 'viewdeal', 
            'row_id' => $this->session->userdata('popcoin_login')->s_admin_id,
            'param1' => 'manager',
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
          $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter);
        } else {
          $parameter = array(
            'act_mode' => 'viewdeal', 
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
          $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter);
        }


        $parameter1 = array('act_mode'=>'viewdealstatus','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
         
//p($parameter1); exit;

          $response['dealstatus'] = $this->supper_admin->call_procedure('proc_master',$parameter1);








          $this->load->view('offer/allviewdeals', $response);
      } else if($statvalue!='all' && $statvalue!='') {
        if($this->session->userdata('popcoin_login')->s_usertype==2) {
          $parameter = array(
            'act_mode' => 'showchangestatus', 
            'row_id' => $this->session->userdata('popcoin_login')->s_admin_id,
            'param1' => 'retailer',
            'param2' => '',
            'param3' => $statvalue,
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
          $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter); 
        } else if($this->session->userdata('popcoin_login')->s_usertype==4) {
          $parameter = array(
            'act_mode' => 'showchangestatus', 
            'row_id' => $this->session->userdata('popcoin_login')->s_admin_id,
            'param1' => 'manager',
            'param2' => '',
            'param3' => $statvalue,
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
          $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter); 
        } else {
          $parameter = array(
            'act_mode' => 'showchangestatus', 
            'row_id' => '',
            'param1' => '',
            'param2' => '',
            'param3' => $statvalue,
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
          $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter); 
        }

        $parameter1 = array('act_mode'=>'viewdealstatus','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
         
//p($parameter1); exit;

          $response['dealstatus'] = $this->supper_admin->call_procedure('proc_master',$parameter1);

          $this->load->view('offer/dealfilterbystatus',$response); 
      }
      if($statvalue1=='pending')
      {
        if($this->session->userdata('popcoin_login')->s_usertype==2) {
          $parameter = array(
            'act_mode' => 'showchangestatus', 
            'row_id' => $this->session->userdata('popcoin_login')->s_admin_id,
            'param1' => 'retailer',
            'param2' => '',
            'param3' => $statvalue1,
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
          $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter); 
        } else if($this->session->userdata('popcoin_login')->s_usertype==4) {
          $parameter = array(
            'act_mode' => 'showchangestatus', 
            'row_id' => $this->session->userdata('popcoin_login')->s_admin_id,
            'param1' => 'manager',
            'param2' => '',
            'param3' => $statvalue1,
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
          $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter); 
        } else {
          $parameter = array(
            'act_mode' => 'showchangestatus', 
            'row_id' => $this->session->userdata('popcoin_login')->s_admin_id,
            'param1' => '',
            'param2' => '',
            'param3' => $statvalue1,
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
          $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter); 
        }
          $parameter1 = array('act_mode'=>'viewdealstatus','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
          $response['dealstatus'] = $this->supper_admin->call_procedure('proc_master',$parameter1);
          $this->load->view('helper/header');
          $this->load->view('offer/dealstatusview', $response);  
      }
  }

  public function draftdeals()
  {    
    if($this->session->userdata('popcoin_login')->s_usertype==2) {
      $parameter = array(
        'act_mode' => 'draftdeals', 
        'row_id' => $this->session->userdata('popcoin_login')->s_admin_id,
        'param1' => 'retailer',
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
      $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter); 
    } else if($this->session->userdata('popcoin_login')->s_usertype==4) {
      $parameter = array(
        'act_mode' => 'draftdeals', 
        'row_id' => $this->session->userdata('popcoin_login')->s_admin_id,
        'param1' => 'manager',
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
      $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter); 
    } else {
      $parameter = array(
        'act_mode' => 'draftdeals', 
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
      $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter); 
      $parameter1 = array('act_mode'=>'viewdealstatus','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
      $response['dealstatus'] = $this->supper_admin->call_procedure('proc_master',$parameter1);
    }
      $this->load->view('helper/header');
      $this->load->view('offer/draftdeals', $response);  
  }

  public function showfilterstatus()
  {
      
      $statvalue = $this->input->post('statusvalue');

      $statvalue1 = $this->uri->segment(4);
      
      if($statvalue=='all')
      {


          $parameter = array(
                        'act_mode' => 'viewallmydeals', 
                        'row_id' => '',
                        'param1' => $this->session->userdata('popcoin_login')->s_admin_id,
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
      
      //p($parameter); exit;
      $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter);





      $this->load->view('offer/allviewdeals', $response);

      }else if($statvalue!='all' && $statvalue!=''){
           $parameter = array(
                            'act_mode' => 'showfilterstatus', 
                            'row_id' => '',
                            'param1' => $this->session->userdata('popcoin_login')->s_admin_id,
                            'param2' => '',
                            'param3' => $statvalue,
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

      
      //p($parameter); exit;
      $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter); 
       $this->load->view('offer/dealfilterbystatus',$response); 
      }

      if($statvalue1=='pending')
      {
        $parameter = array(
                            'act_mode' => 'showfilterstatus', 
                            'row_id' => '',
                            'param1' => $this->session->userdata('popcoin_login')->s_admin_id,
                            'param2' => '',
                            'param3' => $statvalue1,
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

      
     
      $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter); 
     
       $parameter1         = array('act_mode'=>'viewdealstatus','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
      $response['dealstatus'] = $this->supper_admin->call_procedure('proc_master',$parameter1);


 
    $this->load->view('helper/header');
    $this->load->view('offer/dealstatusview', $response);  
  }

  }
  public function add_commision(){
    //$this->userfunction->loginAdminvalidation();
    if($this->input->post('submit')){


     // Validation form fields.
     $this->form_validation->set_rules('commision','commision','trim|required|xss_clean');

     if($this->form_validation->run() != false){
      $commisioon= $this->input->post('commision');
      $cashbacck= $this->input->post('cashback');
      $retailer_name= $this->input->post('retailer_name');
      
      //$userid          = $this->session->userdata('bizzadmin')->LoginID;
      $parameter= array(
        'act_mode'=>'commissionexit',
        'row_id'=>'',
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>$commisioon
        );
      $record['record']= $this->supper_admin->call_procedureRow('typedeal',$parameter);
      //$record['record']= $this->supper_admin->call_procedureRow('proc_attribute',$parameter);
    
      //p($record['record']); exit;
//if(empty($data['vieww']))
      if(empty($record['record'])){
         $parameter= array(
        'act_mode'=>'commissinsert',
        'row_id'=>'',
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>$retailer_name,
        'Param6'=>$cashbacck,
        'Param7'=>$commisioon
        );
           //p($parameter); exit;

          $record['record']= $this->supper_admin->call_procedureInsert('typedeal',$parameter);
          
          $this->session->set_flashdata("message", "Your information has been saved successfully!");
          redirect("admin/offer/view_commission");

      }
      else{
            
        $this->session->set_flashdata("message", "commission Already Exists");
        redirect("admin/offer/view_commission");
       
      }
     }


    }
    //if submit
    $parameter = array(
                        'act_mode' => 'viewvendors', 
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
      $response['vieww'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
      //p($response['vieww']);die();
  
    $this->load->view('helper/header');
    $this->load->view('helper/sidebar');
    $this->load->view("vendor/add_commission",$response);
    $this->load->view('helper/footer');
  }//End function.viewcatogary
public function view_commission() {

      $parameter = array(

        'act_mode'=>'list_commission',
        'row_id'=>'',
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      );
      $response['vieww'] = $this->supper_admin->call_procedure('typedeal', $parameter);
      //pend($response['vieww']);

      $this->load->view('helper/header');
      $this->load->view('helper/sidebar');
      $this->load->view('vendor/viewcommission', $response);
      $this->load->view('helper/footer');
  }

  public function deletecommission($id) {

      $parameter = array(

        'act_mode'=>'deletecommission',
        'row_id'=>$id,
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      );
      $response['vieww'] = $this->supper_admin->call_procedure('typedeal', $parameter);

      $this->session->set_flashdata('message', 'Record has been deleted successfully!');
      redirect("admin/offer/view_commission");
  }
   public function updatecommission($id) {

      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('commision','commision','trim|required');
        //$this->form_validation->set_rules('catogary_Icon','catogery Icon','trim|required');

        if($this->form_validation->run() != false) {

              $parameter = array(
                        'act_mode' => 'updatecommission', 
                        'row_id' => $id,
                        'p_name' =>'',
                        'Param4' =>'',
                        'Param5' => '',
                        'Param6'=>'',
                        'Param7'=>$this->input->post('commision')
                        
                      );
              $return = $this->supper_admin->call_procedure('typedeal', $parameter);

              $this->session->set_flashdata('message', 'Your information has been updated successfully!');
              redirect("admin/offer/view_commission");
        }
      }
      $parameter = array(
                        'act_mode' =>'fetchccommission', 
                        'row_id' =>$id,
                        'p_name' =>'',
                        'Param4' =>'',
                        'Param5' =>'',
                        'Param6'=>'',
                        'Param7'=>''
                      );
      $response['vieww'] = $this->supper_admin->call_procedureRow('typedeal', $parameter);

      $this->load->view('helper/header');
      $this->load->view('vendor/update_commission',$response);
  } 

public function addoldoffer() {

      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('o_name','Offer name','trim|required');
        $this->form_validation->set_rules('category','category','trim|required');        
        $this->form_validation->set_rules('offertype_id','Offer type','trim|required');
        $this->form_validation->set_rules('o_start_date','Start date','trim|required');
        $this->form_validation->set_rules('o_end_date','End date','trim|required');
        //$this->form_validation->set_rules('Heading','Heading','trim|required');
        //$this->form_validation->set_rules('Tagline','Tagline','trim|required');
        $this->form_validation->set_rules('cosinpopcoins','cosinpopcoins','trim|required');
        $this->form_validation->set_rules('commission','commission','trim|required');
        $this->form_validation->set_rules('o_numvouchers','Number of vouchers','trim|required');
        //$this->form_validation->set_rules('featured','featured','trim|required');

        if($this->form_validation->run() != false) {
           
              if(!empty($_FILES['o_menu']['name'])) {
                  $upload_name = $this->input->post('offertype_id').'-'.time().'-'.str_replace(" ", "-", strtolower($_FILES['o_menu']['name']));
                  $filePath = FCPATH.'public/offermenu-images/'.$upload_name;
                  $tmpFilePath = $_FILES['o_menu']['tmp_name'];
                  if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $o_menu = $upload_name;
                  } else {
                    $o_menu = "";
                  } 
              }
              //$pay_options = implode(",",$this->input->post('o_pay_options'));
              $parameter = array(
                        'act_mode' => 'insertoffer', 
                        'row_id' => '',//$this->input->post('o_numusers'),
                        'param1' => $this->input->post('offertype_id'),
                        'param2' => $this->input->post('category'),
                        'param3' => $this->input->post('o_name'),
                        'param4' => $this->input->post('o_start_date'),
                        'param5' => $this->input->post('o_desc'),
                        'param6' => $this->input->post('o_end_date'),
                        'param7' => '',//$pay_options,
                        'param8' => $this->input->post('o_offer_type'),
                        'param9' => @$o_menu,
                        'param10' => '',
                        'param11' => $this->input->post('o_termsconditions'),
                        'param12' => '',
                        'param13' =>'',
                        'param14' => $this->input->post('cosinpopcoins'),
                        'param15' => $this->input->post('commission'),
                        'param16' => '',
                        'param17' => '',
                        'param18' => '',
                        'param19' => '',
                        'param20' => '',
                        'param21' => '',
                        'param22' => '',
                        'param23' => '',//$this->input->post('o_numvouchers'),
                        'param24' => $this->input->post('s_admin_id'),
                        'param25' => ''
                      );


              //p($parameter); exit;
              $return = $this->supper_admin->call_procedureRow('proc_procedure5', $parameter);

              /*if($this->input->post('o_offer_type')==1) {

                  $o_start_time=$this->input->post('o_start_time');
                  $o_end_time=$this->input->post('o_end_time');
                  $o_start_timeopt=$this->input->post('o_start_timeopt');
                  $o_end_timeopt=$this->input->post('o_end_timeopt');
                  $parameter4 = array(
                                'act_mode' => 'insertoffermap', 
                                'row_id' => $return->cou_rec,
                                'param1' => '',
                                'param2' => '',
                                'param3' => '-1',
                                'param4' => $o_start_time,
                                'param5' => '',
                                'param6' => $o_end_time,
                                'param7' => $o_start_timeopt,
                                'param8' => '',
                                'param9' => $o_end_timeopt,
                                'param10' => '',
                                'param11' => '',
                                'param12' => '',
                                'param13' => '',
                                'param14' => '',
                                'param15' => '',
                                'param16' => ''
                              );
                      $return4 = $this->supper_admin->call_procedureRow('proc_general', $parameter4);

              }*/ /*else {

                  if(!empty($_REQUEST['map_id'])) {
                      foreach($_REQUEST['map_id'] as $map_id) {
                        $parameter2 = array(
                                'act_mode' => 'insertoffermap', 
                                'row_id' => $return->cou_rec,
                                'param1' => '',
                                'param2' => '',
                                'param3' => $map_id,
                                'param4' => $this->input->post('om_start_time_'.$map_id),
                                'param5' => '',
                                'param6' => $this->input->post('om_end_time_'.$map_id),
                                'param7' => $this->input->post('om_start_timeopt_'.$map_id),
                                'param8' => '',
                                'param9' => $this->input->post('om_end_timeopt_'.$map_id),
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
                  }  
              } */                              
              /*if(!empty($_REQUEST['product_id']))
              { 
                foreach($_REQUEST['product_id'] as $pro_id) {
                  $parameter3 = array(
                          'act_mode' => 'insertrespromap', 
                          'row_id' => $return->cou_rec,
                          'param1' => $pro_id,
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
                  $return3 = $this->supper_admin->call_procedureRow('proc_general', $parameter3);
                }
              }*/
              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/offer/viewoffers");
        }
      }
      $parameter = array(
                        'act_mode' => 'selectoffer', 
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
      $response['offers'] = $this->supper_admin->call_procedure('proc_general', $parameter);
      $parameter = array(
                        'act_mode' => 'fetchrestname', 
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
      $response['resdetail'] = $this->supper_admin->call_procedureRow('proc_general', $parameter);
     

      $parameter = array(
                        'act_mode' => 'category', 
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
      $response['category'] = $this->supper_admin->call_procedure('proc_general', $parameter);

      $parameter = array(
                        'act_mode' => 'viewvendors', 
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
      $response['vieww'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);

      //p($response['category']); exit;



      $this->load->view('helper/header');
      $this->load->view('offer/offerview123',$response);
  } 


  public function storename()
  {
  		   $parameter8 = array(
                        'act_mode' => 'viewstore', 
                        'v_id' => '',
                        'v_status' => '',
                        'v_mobile' => '',
                        'v_email' => '',
                        'v_pwd' => '',
                        'tin_no' => '',
                        'tax_no' => '',
                        'bank_name' => $this->input->post('keyword'),
                        'bank_addr' => '',
                        'ifsc_code' => '',
                        'bene_accno' => '',
                        'param1' => '',
                        'param2' => ''
                      );
      $response['vieww'] = $this->supper_admin->call_procedure('proc_vendor', $parameter8);
  }



public function demoviewdeals() {

      $parameter = array(
                        'act_mode' => 'viewdeal', 
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
      
      //p($parameter); exit;
      $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter);
      //p($response['vieww']); exit;
      $this->load->view('helper/header');
      $this->load->view('offer/demoviewdeal', $response);
  }



  public function dealissue()
  {

    $parameter = array(
                        'act_mode' => 'issueindeal', 
                        'row_id' => $this->input->post('dealid'),
                        'param1' => $this->input->post('dealstatusid'),
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
                        'param13' =>'',
                        'param14' => '',
                        'param15' => '',
                        'param16' => '',
                        'param17' => '',
                        'param18' => '',
                        'param19' => '',
                        'param20' => '',
                        'param21' => $this->input->post('dealstatus'),
                        'param22' => '',
                        'param23' => '',
                        'param24' => '',
                        'param25' => $this->input->post('issuere')
                      ); 



      //p($parameter); exit;

            $return = $this->supper_admin->call_procedureRow('proc_procedure5', $parameter);

           p($return);
  }



  public function dealapprove()
  {

    $parameter = array(
                        'act_mode' => 'dealapprove', 
                        'row_id' => $this->input->post('dealid'),
                        'param1' => $this->input->post('dealstatusid'),
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
                        'param13' =>'',
                        'param14' => '',
                        'param15' => '',
                        'param16' => '',
                        'param17' => '',
                        'param18' => '',
                        'param19' => '',
                        'param20' => '',
                        'param21' => $this->input->post('dealstatus'),
                        'param22' => '',
                        'param23' => '',
                        'param24' => '',
                        'param25' => ''
                      ); 



    //p($parameter); exit;

            $return = $this->supper_admin->call_procedureRow('proc_procedure5', $parameter);

           p($return);
  }



  public function retailerstore()
  {   
      $parameter = array(
                        'act_mode' => 'retailerstore', 
                        'row_id' => $this->input->post('retailerid'),
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
                        'param13' =>'',
                        'param14' => '',
                        'param15' => '',
                        'param16' => '',
                        'param17' => '',
                        'param18' => '',
                        'param19' => '',
                        'param20' => '',
                        'param21' => '',
                        'param22' => '',
                        'param23' => '',
                        'param24' => '',
                        'param25' => ''
                      );    
      $store = $this->supper_admin->call_procedure('proc_procedure5', $parameter);
      if(!empty($store))
      {
        $str = '';
        foreach($store as $k=>$v){   
          $str .= "<option value=".$v->store_id.">".$v->s_name."</option>";
        }
        echo $str;
      }
  }

  public function fetchstorecommission()
  {   
      $parameter = array(
                        'act_mode' => 'fetchstorecommission', 
                        'row_id' => $_REQUEST['s_admin_id'],
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
                        'param13' =>'',
                        'param14' => '',
                        'param15' => '',
                        'param16' => '',
                        'param17' => '',
                        'param18' => '',
                        'param19' => '',
                        'param20' => '',
                        'param21' => '',
                        'param22' => '',
                        'param23' => '',
                        'param24' => '',
                        'param25' => ''
                      );    
      $store = $this->supper_admin->call_procedureRow('proc_procedure5', $parameter);
      echo $store->s_dealcommision;
  }


  public function dealfilter()
  {   

      $parameter = array(
                        'act_mode' => 'viewretailer', 
                        'v_id' => 2,
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
      

    
     $response['retailer'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);

            
      $this->load->view('helper/header');
      $this->load->view('helper/sidebar');
      $this->load->view('offer/dealfilter',$response);

  }

  public function fetchstore()
  {
    $parameter = array(
                        'act_mode' => 'fetchstore', 
                        'v_id' => $this->input->post('retailerid'),
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
      $response['store'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
      
      $str = '';

      foreach($response['store'] as $k=>$v){   
          $str .= "<option value=".$v->store_id.">".$v->s_name."</option>";
      }
      echo $str;
  }

  public function deal()

  {
    //p("rc"); exit();
    $parameter = array(
                        'act_mode' => 'deal', 
                        'v_id' => $this->input->post('retailerid'),
                        'v_status' => $this->input->post('storeid'),
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
    $response['vieww'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
  
    //p($response['vieww']); exit;

    $str = '';
      
      if(!empty($response['vieww']))
      {
        $i=1;
      foreach ($response['vieww'] as $value){ 

         ?>
         <tr>
          <td><?php echo $i; ?></td>
                  <td><?php echo $value->deal_id; ?></td>
                  <td><?php echo $value->retailer_codeid; ?></td>
                  <td><img width="50px" height="50px" src="<?php echo base_url().'public/offermenu-images/'.$value->o_menu; ?>"></td>                                           
                  <td><?php echo $value->categorydeal_name; ?></td>
                  <td><?php echo $value->s_name; ?></td>
                  <td><?php echo $value->offer_title; ?></td>                
                 <td><?php echo $value->o_start_date; ?></td>
                  <td><?php echo $value->o_end_date; ?></td>
                </tr> 
               <?php  $i++;
      }
    }else{
      ?>
      <tr>
        <td colspan="9" style="text-align:center; font-weight:bold;"></style>Record Not Found</td>
      </tr>
      <?php
    }
      

  }


  


}