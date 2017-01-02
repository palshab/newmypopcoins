<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Vendor extends MX_Controller {
  public $data   =   array();
  public function __construct() {
    $this->load->model("supper_admin");
    $this->load->helper('my_helper');
    $this->userfunction->loginAdminvalidation();
  }

  public function viewvendors() {

      

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



      $response['vieww'] = $this->supper_admin->call_procedure('proc_retailerreg', $parameter);
      //p($response['vieww']); exit;

      $this->load->view('helper/header');
      $this->load->view('vendor/viewvendors', $response);
  }

  public function deletevendor($id) {

      $parameter = array(
                        'act_mode' => 'deletevendor', 
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
      redirect("admin/vendor/viewvendors");
  } 

  public function statusvendor($id,$status) {

      $act_mode = $status=='Active'?'vendordeactive':'vendoractive'; 
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
      redirect("admin/vendor/viewvendors");
  } 

  public function addvendor() {

      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('s_username','Vendor name','trim|required');
        $this->form_validation->set_rules('s_loginemail','Email','trim|required');
        $this->form_validation->set_rules('s_mobileno','Contact number','trim|required');
        $this->form_validation->set_rules('s_loginpassword','Password','trim|required');
        $this->form_validation->set_rules('outlet_name','outlet name','trim|required');

        if($this->form_validation->run() != false) {

            $parameter = array(
                        'act_mode' => 'checkvendor', 
                        'v_id' => '',
                        'v_status' => $this->input->post('s_username'),
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
                        'param2' => '',
                        // 'P_managers_name' =>'',
                        // 'p_radioOutlet' =>'',
                        // 'p_co_no_outlet' =>'',
                        // 'p_category' =>'',
                        // 'p_pincode' =>'',
                        // 'p_state' =>'',
                        // 'p_city' =>'',
                        // 'p_country' =>'',
                        // 'p_brand_name' =>'',
                        // 'p_radioPmode' =>'',
                        // 'p_acc_h_name' =>'',
                        // 'p_p_card_number'=>'',
                        // 'p_weekly_of' =>'',
                        // 'p_n_billing_month'=>'',
                        // 'p_monthly_billing'=>'',
                        // 'p_pday_week'=>'',
                        // 'p_Profileimg'=>'',
                        // 'p_logoimg' =>'',
                        // 'Param36' => '',
                        // 'Param37' => '',
                        // 'Param38' => '',
                        // 'Param39' => ''
                        // 'Param40' => '',
                        // 'Param41' => '',
                        // 'Param42' => ''
                      
                      


                      );
            $res = $this->supper_admin->call_procedureRow('proc_vendor', $parameter);

            if($res->cou_rec>0) {

              $this->session->set_flashdata('message', 'This vendor already exists!');
              redirect("admin/vendor/viewvendors");

            } else { 

              //$ltr="abcdefghijklmnopqrstwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
              //$pass=substr(str_shuffle($ltr),0,6);
              $pass = $this->input->post('s_loginpassword');

              $parameter = array(
                        'act_mode' => 'insertvendor', 
                        'v_id' => '',
                        'v_status' => $this->input->post('s_username'),
                        'v_mobile' => $this->input->post('s_mobileno'),
                        'v_email' => $this->input->post('s_loginemail'),
                        'v_pwd' => md5($pass),
                        'tin_no' => $this->input->post('s_tin_number'),
                        'tax_no' => $this->input->post('s_Taxnumber'),
                        'bank_name' => $this->input->post('s_Bankname'),
                        'bank_addr' => $this->input->post('s_Bankaddress'),
                        'ifsc_code' => $this->input->post('s_IfsoCode'),
                        'bene_accno' => $this->input->post('s_Beneficeryac_no'),
                        'param1' => $this->input->post('outlet_name'),
                        'param2' => ''
                        // 'P_managers_name' =>$this->input->post('managers_name'),
                        // 'p_radioOutlet' =>$this->input->post('radioOutlet'),
                        // 'p_co_no_outlet' =>$this->input->post('co_no_outlet'),
                        // 'p_category' =>$this->input->post('category'),
                        // 'p_pincode' =>$this->input->post('pincode'),
                        // 'p_state' =>$this->input->post('state'),
                        // 'p_city' => $this->input->post('city'),
                        // 'p_country' =>$this->input->post('country'),
                        // 'p_brand_name' => $this->input->post('brand_name'),
                        // 'p_radioPmode' => $this->input->post('radioPmode'),
                        // 'p_acc_h_name' => $this->input->post('acc_h_name'),
                        // 'p_p_card_number'=>$this->input->post('p_card_number'),
                        // 'p_weekly_of' =>$this->input->post('weekly_of'),
                        // 'p_n_billing_month'=>$this->input->post('n_billing_month'),
                        // 'p_monthly_billing'=> $this->input->post('monthly_billing'),
                        // 'p_pday_week'=>$this->input->post('pday_week'),
                        // 'p_Profileimg'=>$this->input->post('Profileimg'),
                        // 'p_logoimg' => $this->input->post('logoimg'),
                        // 'Param36' => '',
                        // 'Param37' => '',
                        // 'Param38' => '',
                        // 'Param39' => ''
                        // 'Param40' => '',
                        // 'Param41' => '',
                        // 'Param42' => ''
                      
                      );
              $response = $this->supper_admin->call_procedure('proc_vendor', $parameter);

              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/vendor/viewvendors");
 
          }
        }
      }
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
    // p($response['vieww']);exit();

      $this->load->view('helper/header');
      $this->load->view('vendor/addvendor',$response);
  } 

  public function updatevendor($id) {

      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('s_username','Vendor name','trim|required');
        $this->form_validation->set_rules('s_mobileno','Contact number','trim|required');

        if($this->form_validation->run() != false) {

              $parameter = array(
                        'act_mode' => 'updatevendor', 
                        'v_id' => $id,
                        'v_status' => $this->input->post('s_username'),
                        'v_mobile' => $this->input->post('s_mobileno'),
                        'v_email' => '',
                        'v_pwd' => '',
                        'tin_no' => $this->input->post('s_tin_number'),
                        'tax_no' => $this->input->post('s_Taxnumber'),
                        'bank_name' => $this->input->post('s_Bankname'),
                        'bank_addr' => $this->input->post('s_Bankaddress'),
                        'ifsc_code' => $this->input->post('s_IfsoCode'),
                        'bene_accno' => $this->input->post('s_Beneficeryac_no'),
                        'param1' => '',
                        'param2' => ''
                      );
              $return = $this->supper_admin->call_procedure('proc_vendor', $parameter);

              $this->session->set_flashdata('message', 'Your information has been updated successfully!');
              redirect("admin/vendor/viewvendors");
        }
      }
      $parameter = array(
                        'act_mode' => 'fetchvendordetail', 
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

      $this->load->view('helper/header');
      $this->load->view('vendor/updatevendor',$response);
  } 

public function add_deal(){
    //$this->userfunction->loginAdminvalidation();
    if($this->input->post('submit')){

     // Validation form fields.
     $this->form_validation->set_rules('typedeal_name','type deal Name','trim|required|xss_clean');

     if($this->form_validation->run() != false){
      $typedeal= $this->input->post('typedeal_name');
      //$userid          = $this->session->userdata('bizzadmin')->LoginID;
      $parameter= array(
        'act_mode'=>'dealexit',
        'row_id'=>'',
        'p_name'=>$typedeal,
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
        );
      $record['record']= $this->supper_admin->call_procedureRow('typedeal',$parameter);
      //$record['record']= $this->supper_admin->call_procedureRow('proc_attribute',$parameter);
    
      //p($record['record']); exit;
//if(empty($data['vieww']))
      if(empty($record['record'])){
         $parameter= array(
        'act_mode'=>'dealinsert',
        'row_id'=>'',
        'p_name'=>$typedeal,
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
        );
           //p($parameter); exit;

          $record['record']= $this->supper_admin->call_procedureInsert('typedeal',$parameter);
          
          $this->session->set_flashdata("message", "Your information has been saved successfully!");
          redirect("admin/vendor/view_dealtype");

      }
      else{
            
        $this->session->set_flashdata("message", "Name Already Exists");
        redirect("admin/vendor/view_dealtype");
       
      }
     }
    }//if submit
  
    $this->load->view('helper/header');
    $this->load->view('helper/sidebar');
    $this->load->view('vendor/add_deal');
    $this->load->view('helper/footer');
  }//End function.
   public function view_dealtype() {

      $parameter = array(

        'act_mode'=>'list_typedeal',
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
      $this->load->view('vendor/viewdeal', $response);
      $this->load->view('helper/footer');
  }

 public function delete_typedeal($id) {

      $parameter = array(

        'act_mode'=>'delet_typedeal',
        'row_id'=>$id,
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      );
      $response['vieww'] = $this->supper_admin->call_procedure('typedeal', $parameter);

      $this->session->set_flashdata('message', 'Record has been deleted successfully!');
      redirect("admin/vendor/view_dealtype");
  } 

public function add_category(){
    //$this->userfunction->loginAdminvalidation();
    if($this->input->post('submit')){

     // Validation form fields.
     $this->form_validation->set_rules('categorydeal_name','type deal Name','trim|required|xss_clean');

     if($this->form_validation->run() != false){
      $typedeal= $this->input->post('categorydeal_name');
      $icon= $this->input->post('catogary_Icon');
      //$userid          = $this->session->userdata('bizzadmin')->LoginID;
      $parameter= array(
        'act_mode'=>'categoryexit',
        'row_id'=>'',
        'p_name'=>$typedeal,
        'Param4'=>$icon,
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
        );
      $record['record']= $this->supper_admin->call_procedureRow('typedeal',$parameter);
      //$record['record']= $this->supper_admin->call_procedureRow('proc_attribute',$parameter);
    
      //p($record['record']); exit;
//if(empty($data['vieww']))
      if(empty($record['record'])){
         $parameter= array(
        'act_mode'=>'categoryinsert',
        'row_id'=>'',
        'p_name'=>$typedeal,
        'Param4'=>$icon,
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
        );
           //p($parameter); exit;

          $record['record']= $this->supper_admin->call_procedureInsert('typedeal',$parameter);
          
          $this->session->set_flashdata("message", "Your information has been saved successfully!");
          redirect("admin/vendor/viewcatogary");

      }
      else{
            
        $this->session->set_flashdata("message", "Catogary Name Already Exists");
        redirect("admin/vendor/viewcatogary");
       
      }
     }
    }//if submit
  
    $this->load->view('helper/header');
    $this->load->view('helper/sidebar');
    $this->load->view('vendor/add_dealcategory');
    $this->load->view('helper/footer');
  }//End function.viewcatogary
  public function viewcatogary() {

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
      //pend($response['vieww']);

      $this->load->view('helper/header');
      $this->load->view('helper/sidebar');
      $this->load->view('vendor/viewcatogary', $response);
      $this->load->view('helper/footer');
  }

 public function statuscatogery($id,$status) {

      $act_mode = $status=='Active'?'categoreydeactive':'categoreyactive'; 
      $parameter = array(
                        'act_mode' => $act_mode, 
                        'row_id' => $id,
                        'p_name' => '',
                        'Param4' => '',
                        'Param5' => '',
                        'Param6' => '',
                        'Param7' => ''
                      );
      $response = $this->supper_admin->call_procedure('typedeal', $parameter);

      $this->session->set_flashdata('message', 'Status has been changed successfully!');
      redirect("admin/vendor/viewcatogary");
  } 

  public function updatecatogeery($id) {

      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('categorydeal_name','catogery name','trim|required');
        $this->form_validation->set_rules('catogary_Icon','catogery Icon','trim|required');

        if($this->form_validation->run() != false) {

              $parameter = array(
                        'act_mode' => 'updatecatogery', 
                        'row_id' => $id,
                        'p_name' => $this->input->post('categorydeal_name'),
                        'Param4' => '',//$this->input->post('catogary_Icon'),
                        'Param5' => '',
                        'Param6'=>'',
                        'Param7'=>''
                        
                      );
              $return = $this->supper_admin->call_procedure('typedeal', $parameter);

              $this->session->set_flashdata('message', 'Your information has been updated successfully!');
              redirect("admin/vendor/add_dealcategory");
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

      $this->load->view('helper/header');
      $this->load->view('vendor/updatecategory',$response);
  }

  public function retailerdetails()
  {

    $id = $this->session->userdata('popcoin_login')->s_admin_id; 

    $parameter = array(
                        'act_mode' => 'retailerdetails', 
                        'v_id' => $id,
                        'v_status' => '',
                        'v_mobile' => '',
                        'v_email' => '',
                        'v_pwd' => '',
                        'tin_no' => '',
                        'tax_no' => '',
                        'bank_name' =>'' ,
                        'bank_addr' => '',
                        'ifsc_code' => '',
                        'bene_accno' => '',
                        'param1' => '',
                        'param2' => ''
                      );
      $response['details'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
     // p($parameter); exit;

      if($this->input->post('Submit') != '')
    {



    $parameter = array(
                        'act_mode' => 'updatedetails', 
                        'v_id' => $id,
                        'v_status' => '',
                        'v_mobile' => $this->input->post('outlet_name'),
                        'v_email' => '',
                        'v_pwd' => '',
                        'tin_no' => '',
                        'tax_no' => '',
                        'bank_name' => $this->input->post('s_username'),
                        'bank_addr' => '',
                        'ifsc_code' => '',
                        'bene_accno' => '',
                        'param1' => '',
                        'param2' => ''
                      );
      
        //p($parameter); exit;
        $response['details'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
        $this->session->set_flashdata('message', 'Details Has bee updated successfully!');
        redirect(base_url().'admin/vendor/retailerdetails');

      }



      $this->load->view('helper/header');
      $this->load->view('vendor/retailerdetailer',$response);
  }


  

}