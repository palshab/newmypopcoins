<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Home extends MX_Controller {
  public $data   =   array();
  public function __construct() {
    $this->load->model("supper_admin");
    $this->load->helper('my_helper');
    

  }

  public function index() {
    $this->load->view('index');
  }
  
  public function addlead() {
        $parameter = array(
                    'act_mode' => 'checklead', 
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
          echo 0;
        } else { 
          $pass = $this->input->post('s_loginpassword');
          $parameter = array(
                    'act_mode' => 'insertlead', 
                    'v_id' => '3',
                    'v_status' => $this->input->post('s_username'),
                    'v_mobile' => $this->input->post('contact_no'),
                    'v_email' => $this->input->post('s_loginemail'),
                    'v_pwd' => md5($pass),
                    'tin_no' => '',
                    'tax_no' => '',
                    'bank_name' => '',
                    'bank_addr' => '',
                    'ifsc_code' => '',
                    'bene_accno' => '',
                    'param1' => '',
                    'param2' => ''
                  );
          $response = $this->supper_admin->call_procedureRow('proc_vendor', $parameter);
          $this->session->set_userdata('popcoin_login',$response);
          // for sending mail
          $email = $this->input->post('s_loginemail');
          $message = '<!DOCTYPE html>
<html>
<head>
    <title>Order Successful</title>
    <meta charset="utf-8" />
    <style type="text/css">
        .mailer_div {
            float: left;
            width: 600px;
            height: auto;
            -moz-box-sizing: border-box;
            -o-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        .mailer_head {
            float: left;
            width: 100%;
            padding: 15px 15px;
            color: #fff;
            -moz-box-sizing: border-box;
            -o-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .bank_logo{
            float:left;
            width:auto;

        }

        .mailer_content {
            float: left;
            width: 100%;
            -moz-box-sizing: border-box;
            -o-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 15px 15px;
        }

        .title_text {
            float: left;
            width: 100%;
            padding: 0px 0 15px;
            font-weight: bold;
            font-size: 17px;
        }

        .text {
            float: left;
            width: 100%;
            padding: 0px 0px 8px;
            font-size: 14px;
        }
         .text2 {
            float: left;
            line-height:22px;
            padding: 0px 0px 5px;
            font-size: 14px;
        }
        .tbl_data {
            float: left;
            width: 100%;
            margin:18px 0;
        }
        .tbl_data table{
            margin:0;
            padding:0;
            border-collapse:collapse;
            font-size: 14px;
            width:100%;
        }
        .tbl_data table td{
            padding:12px 5px;
            border-bottom:solid 1px #e2e2e2;
        }
        .tbl_data table td:nth-child(1){
            width:10px;
        }
        .tbl_data_next {
            float: left;
            width: 100%;
            margin:18px 0;
        }
        .tbl_data_next table{
            margin:0;
            padding:0;
            border-collapse:collapse;
            font-size: 14px;
            width:100%;
        }
        .tbl_data_next table td{
            padding:12px 5px;
            border-bottom:solid 1px #e2e2e2;
        }
        .foot_cont{
            float:left;
            width:100%;
        }
        .logo_2{
            float:right;
        }
       
        .right{
            float:left;
            width:100%;
        }
    </style>
</head>
<body>
    
        <div class="mailer_div" style="border:solid 1px #ae275f">
            <div class="mailer_head" style="background-color:#ffffff;">
                <div class="bank_logo">
                    <img src="'.base_url().'assets/webapp/img/logoNew.png" />
                </div>
            </div>
            <div class="mailer_content">
                <div class="title_text">Dear '.$this->input->post('s_username').',</div>
                <div class="text" style="color:#ae275f">Greetings from Mypopcoins!</div>
                <div class="text">Your account has been registered with us. Please find below your login details:</div>
                <div class="tbl_data">
                    <table>
                        <tr>
                            <td>1.</td>
                            <td>Email ID :</td>
                            <td><b>'.$this->input->post('s_loginemail').'</b></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Password :</td>
                            <td><b>'.$this->input->post('s_loginpassword').'</b></td>
                        </tr>
                    </table>
                </div>
</body>
</html>';
    $this->email->from('info@mypopcoins.com', 'info@promon.in');
    $this->email->to($email); 
    $this->email->cc('bhawna@mindztechnology.com'); 
    $this->email->subject('Your account has been registered with Mypopcoins!');
    $this->email->message($message);  
    $this->email->send();  
          echo 1;        
        }
  } 
 
  public function leadregistration() {
      if(!$this->session->userdata('popcoin_login')) {
        redirect(base_url());
      }
      $parameter = array(
                  'act_mode' => 'fetchleaddetail', 
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
      $response['vieww'] = $this->supper_admin->call_procedureRow('proc_vendor', $parameter);
      $this->load->view('leadregistration',$response);
  }

  public function updatecompanyinfo() {

      if($_FILES['can_cheque_copy']['name'] != "") {
        $upload_name = time().str_replace(" ", "_", strtolower($_FILES['can_cheque_copy']['name']));
        $filePath = FCPATH.'public/leaddocuments/'.$upload_name;
        $tmpFilePath = $_FILES['can_cheque_copy']['tmp_name'];
        if(move_uploaded_file($tmpFilePath, $filePath)) {
          $can_cheque_copy = $upload_name;
        } else {
          $can_cheque_copy = "";
        }
      } 
      if($_FILES['pan_card_copy']['name'] != "") {
        $upload_name = time().str_replace(" ", "_", strtolower($_FILES['pan_card_copy']['name']));
        $filePath = FCPATH.'public/leaddocuments/'.$upload_name;
        $tmpFilePath = $_FILES['pan_card_copy']['tmp_name'];
        if(move_uploaded_file($tmpFilePath, $filePath)) {
          $pan_card_copy = $upload_name;
        } else {
          $pan_card_copy = "";
        }
      } 
      if($_FILES['tin_copy']['name'] != "") {
        $upload_name = time().str_replace(" ", "_", strtolower($_FILES['tin_copy']['name']));
        $filePath = FCPATH.'public/leaddocuments/'.$upload_name;
        $tmpFilePath = $_FILES['tin_copy']['tmp_name'];
        if(move_uploaded_file($tmpFilePath, $filePath)) {
          $tin_copy = $upload_name;
        } else {
          $tin_copy = "";
        }
      } 
      $parameter = array(
                        'act_mode' => 'updateleadcompanyinfo', 
                        'row_id' => $this->session->userdata('popcoin_login')->s_admin_id,
                        'param1' => $this->input->post('pincode'),
                        'param2' => '',
                        'param3' => $this->input->post('company_name'),
                        'param4' => $this->input->post('s_username'),
                        'param5' => $this->input->post('Company_Address'),
                        'param6' => '',
                        'param7' => $this->input->post('contact_no'),
                        'param8' => '',
                        'param9' => $this->input->post('pan_card_no'),
                        'param10' => $this->input->post('tin_no'),
                        'param11' => @$can_cheque_copy,
                        'param12' => @$pan_card_copy,
                        'param13' => '',
                        'param14' => @$tin_copy,
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
      $response = $this->supper_admin->call_procedure('proc_procedure5',$parameter); 
      echo 1;
  } 

  public function login() {
      $parameter = array(
                        'act_mode' => 'checklogin', 
                        'row_id' => '',
                        'param1' => '',
                        'param2' => '',
                        'param3' => trim($this->input->post('loginemail')),
                        'param4' => md5(trim($this->input->post('loginpwd'))),
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
      $response = $this->supper_admin->call_procedureRow('proc_procedure5',$parameter); 
      if($response->s_admin_id!="") {
        $this->session->set_userdata('popcoin_login',$response);
        if($this->session->userdata('popcoin_login')->s_usertype==2 && $this->session->userdata('popcoin_login')->s_isAdminStatus==1) {
          echo 1;
        } else if($this->session->userdata('popcoin_login')->s_usertype==3) {
          echo 2; 
          $otp = mt_rand(1000, 9999);
          @$this->session->set_userdata('lead_otp',$otp);
        } else {
          echo 3;
        }
      } else {
        echo 0;
      }
  } 

  public function updatebankinfo() {
      $parameter = array(
                        'act_mode' => 'updateleadbankinfo', 
                        'row_id' => $this->session->userdata('popcoin_login')->s_admin_id,
                        'param1' => '',
                        'param2' => '',
                        'param3' => $this->input->post('company_website'),
                        'param4' => $this->input->post('accholder_name'),
                        'param5' => $this->input->post('acc_number'),
                        'param6' => $this->input->post('bank_name'),
                        'param7' => $this->input->post('bank_branch'),
                        'param8' => '',
                        'param9' => $this->input->post('ifsc_code'),
                        'param10' => '',
                        'param11' => '',
                        'param12' => '',
                        'param13' => '',
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
      $response = $this->supper_admin->call_procedure('proc_procedure5',$parameter); 
      echo 1;
  } 

  public function resendotp() {      
    $this->session->set_userdata('lead_otp',mt_rand(1000, 9999));
    echo $this->session->userdata('lead_otp');
  } 

  public function checkotp() {      
      if($this->session->userdata('lead_otp')==$_REQUEST['otp']) {
        echo 1;
      } else {
        echo 0;
      }
  } 

  public function logout() {
    if(@$this->session->userdata('popcoin_login')) {
      $this->session->unset_userdata('popcoin_login');
    }
    redirect(base_url());
  }



public function userregistration($id)
{

  if($this->input->post('submit'))
      {
         if(!empty($_FILES['image']['name'])) {
                  $upload_name =  strtolower($_FILES['image']['name']);
                  $filePath = FCPATH.'public/'.$upload_name;
                  $tmpFilePath = $_FILES['image']['tmp_name'];
                  if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $o_menu = $upload_name;
                  
              } else {
                    $o_menu = "";
                  } 
              }

      $parameter = array( 
                  'act_mode'  => 'insertuser',
                  'row_id'    => $id,
                  'Param1'    => $this->input->post('u_name'),
                  'Param2'    => $this->input->post('u_email'),
                  'Param3'    => $this->input->post('password'),
                  'Param4'    => $this->input->post('phone'),
                  'Param5'    => $o_menu,
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => ''
                  ); 
     // p($parameter);
    $response = $this->supper_admin->call_procedure('proc_search', $parameter);

        $emailid=$_REQUEST['u_email'];
        $user=$_REQUEST['u_name'];
        $mypopcoinsemail="pal@mindztechnology.com";
        $msg= "Dear ".$user."  your registration is completed. ";
        $this->load->library('email');
        $this->email->from($mypopcoinsemail,'Your Invitation.');
        $this->email->to($emailid); 
        $this->email->subject('My popcoins Invitation');
        $this->email->message($msg);
        $this->email->send();
    }

  $this->load->view('user/registration');





}




}