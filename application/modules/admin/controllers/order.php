<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Order extends MX_Controller {
  public $data   =   array();
  public function __construct() {
    $this->load->model("supper_admin");
    $this->load->helper('my_helper');
    $this->userfunction->loginAdminvalidation();
  }

  public function ramdeal()
  {   

     

            
      $this->load->view('helper/header');
      $this->load->view('helper/sidebar');
      $this->load->view('offer/ramdeal');

  }
  public function vieworder()
  {   

    $user = array();

    //p($this->session->all_userdata()); exit;


  if($this->session->userdata('popcoin_login')->s_admin_id==1 && $this->session->userdata('popcoin_login')->s_usertype==1)
    {

      $parameter = array(
                        'act_mode' => 'vieworder', 
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
   
       //p($response['vieww']); exit;
    }else  if($this->session->userdata('popcoin_login')->s_usertype==2){

        

      $parameter1 = array(
                        'act_mode' => 'retailerorder', 
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
      
     // p($parameter1); exit;

       $response['vieww'] = $this->supper_admin->call_procedure('proc_vendor', $parameter1);
      // p($response['vieww']); exit;

    } else if($this->session->userdata('popcoin_login')->s_usertype==4){

      $parameter1 = array(
                        'act_mode' => 'managerstoreorder', 
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

       $response['vieww'] = $this->supper_admin->call_procedure('proc_vendor', $parameter1);

    }


      

    
    

     //p($response['vieww']); exit;
     
            
      $this->load->view('helper/header');
      $this->load->view('helper/sidebar');
      $this->load->view('offer/vieworder',$response);

  }


  public function customerwishlistview()
  {   

    

      $parameter = array(
                        'act_mode' => 'customerwishlistview', 
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

     //p($response['vieww']); exit;
     
            
      $this->load->view('helper/header');
      $this->load->view('helper/sidebar');
      $this->load->view('offer/customerwishlist',$response);

  }




}