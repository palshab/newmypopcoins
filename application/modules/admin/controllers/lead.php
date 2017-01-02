<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Lead extends MX_Controller {
  public $data   =   array();
  public function __construct() {
    $this->load->model("supper_admin");
    $this->load->helper('my_helper');
    $this->userfunction->loginAdminvalidation();
  }

  public function viewleads() {

    //p($this->session->all_userdata()); exit;

    if($this->session->userdata('popcoin_login')->s_admin_id==1)
    {



      $parameter = array(
                        'act_mode' => 'viewleads', 
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
      $response['vieww'] = $this->supper_admin->call_procedure('proc_procedure5', $parameter);

       
     
      $parameter = array('country_id' => '','state_name' => '','countrycode'=> '','row_id' => '','act_mode' => 'leadmanager1');
      //p($parameter); exit;
      $response['vieww1'] = $this->supper_admin->call_procedure('proc_state', $parameter);
    //p($response['vieww1']); exit;
    $this->load->view('helper/header');
    $this->load->view('lead/viewleads', $response);

  }else {

      $loginid =   $this->session->userdata('popcoin_login')->s_admin_id;

      

      $this->session->userdata('popcoin_login')->s_admin_id;

      if($this->session->userdata('popcoin_login')->s_usertype==8)
      {
            
        $parameter1 = array(
                        'act_mode' => 'viewram', 
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
      $response['ram'] = $this->supper_admin->call_procedure('proc_procedure5', $parameter1);








             $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->session->userdata('popcoin_login')->s_admin_id,
                      'act_mode'   => 'firstviewleads');
   //p($param);exit;
      $response['view'] = $this->supper_admin->call_procedure('proc_state', $param);
        $this->load->view('helper/header');
        $this->load->view('firstlead', $response); 
      }else if($this->session->userdata('popcoin_login')->s_usertype==9){


         $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->session->userdata('popcoin_login')->s_admin_id,
                      'act_mode'   => 'firstviewleads');
   //p($param);exit;
      $response['view'] = $this->supper_admin->call_procedure('proc_state', $param);
        $this->load->view('helper/header');
        $this->load->view('lead/secondlead', $response);

      }else if($this->session->userdata('popcoin_login')->s_usertype==10){
    redirect(base_url().'admin/lead/viewmanagerlead/'.$this->session->userdata('popcoin_login')->s_admin_id);

         /*$param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->session->userdata('popcoin_login')->s_admin_id,
                      'act_mode'   => 'firstviewleads');
   //p($param);exit;
      $response['view'] = $this->supper_admin->call_procedure('proc_state', $param);
        $this->load->view('helper/header');
        $this->load->view('assignretailer', $response);*/

      }


       
   

  }

 





      
     
  }

  public function deletelead($id) {

       $parameter = array(
                        'act_mode' => 'deletelead', 
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
      $response = $this->supper_admin->call_procedure('proc_procedure5', $parameter);
      $this->session->set_flashdata('message', 'Record has been deleted successfully!');
      redirect("admin/lead/viewleads");
  } 

  public function statuslead($id,$status) {

      $act_mode = $status=='1'?'leaddeactive':'leadactive'; 
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
      $response = $this->supper_admin->call_procedure('proc_procedure5', $parameter);
      $this->session->set_flashdata('message', 'Status has been changed successfully!');
      redirect("admin/lead/viewleads");
  } 

  public function change_status() {
      $status = $_REQUEST['status'];
      $id = $_REQUEST['id'];
      if($status==1) {
        $type = 2;
      } else {
        $type = 3;
      }
      $parameter = array(
                        'act_mode' => 'changeleadstatus', 
                        'row_id' => $id,
                        'param1' => $status,
                        'param2' => $type,
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
      


//p($parameter); exit;


      $response = $this->supper_admin->call_procedure('proc_procedure5', $parameter);
      if($status==1) {
            // for sending mail
            $email = $this->input->post('email');
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
                            <div class="title_text">Hi,</div>
                            <div class="text" style="color:#ae275f">Greetings from Mypopcoins!</div>
                            <div class="text">Your account has been activated by mypopcoins. You can login and create your store.</div>
            </body>
            </html>';
            $this->email->from('info@mypopcoins.com', 'info@promon.in');
            $this->email->to($email); 
            $this->email->cc('bhawna@mindztechnology.com'); 
            $this->email->subject('Your account has been activated!');
            $this->email->message($message);  
            $this->email->send();  
      }
      echo 1;
  } 

  public function updatelead($id) {

      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('s_username','Vendor name','trim|required');
        $this->form_validation->set_rules('contact_no','Contact number','trim|required');
        $this->form_validation->set_rules('Company_Address','Company address','trim|required');
        $this->form_validation->set_rules('pincode','PIN code','trim|required');
        if($this->form_validation->run() != false) {
              if($_FILES['can_cheque_copy']['name'] != "") {
                @unlink(FCPATH.'public/leaddocuments/'.$this->input->post('can_cheque_copy1'));
                $upload_name = time().str_replace(" ", "_", strtolower($_FILES['can_cheque_copy']['name']));
                $filePath = FCPATH.'public/leaddocuments/'.$upload_name;
                $tmpFilePath = $_FILES['can_cheque_copy']['tmp_name'];
                if(move_uploaded_file($tmpFilePath, $filePath)) {
                  $can_cheque_copy = $upload_name;
                } else {
                  $can_cheque_copy = "";
                }
              } else {
                $can_cheque_copy = $this->input->post('can_cheque_copy1');
              } 
              if($_FILES['pan_card_copy']['name'] != "") {
                @unlink(FCPATH.'public/leaddocuments/'.$this->input->post('pan_card_copy1'));
                $upload_name = time().str_replace(" ", "_", strtolower($_FILES['pan_card_copy']['name']));
                $filePath = FCPATH.'public/leaddocuments/'.$upload_name;
                $tmpFilePath = $_FILES['pan_card_copy']['tmp_name'];
                if(move_uploaded_file($tmpFilePath, $filePath)) {
                  $pan_card_copy = $upload_name;
                } else {
                  $pan_card_copy = "";
                }
              } else {
                $pan_card_copy = $this->input->post('pan_card_copy1');
              } 
              if($_FILES['tin_copy']['name'] != "") {
                @unlink(FCPATH.'public/leaddocuments/'.$this->input->post('tin_copy1'));
                $upload_name = time().str_replace(" ", "_", strtolower($_FILES['tin_copy']['name']));
                $filePath = FCPATH.'public/leaddocuments/'.$upload_name;
                $tmpFilePath = $_FILES['tin_copy']['tmp_name'];
                if(move_uploaded_file($tmpFilePath, $filePath)) {
                  $tin_copy = $upload_name;
                } else {
                  $tin_copy = "";
                }
              } else {
                $tin_copy = $this->input->post('tin_copy1');
              } 
              $parameter = array(
                        'act_mode' => 'updateleadinformation', 
                        'row_id' => $id,
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
                        'param17' => $this->input->post('acc_number'),
                        'param18' => $this->input->post('company_website'),
                        'param19' => $this->input->post('accholder_name'),
                        'param20' => $this->input->post('bank_name'),
                        'param21' => $this->input->post('bank_branch'),
                        'param22' => '',
                        'param23' => '',
                        'param24' => '',
                        'param25' => $this->input->post('ifsc_code')
                      );
              $resp = $this->supper_admin->call_procedure('proc_procedure5',$parameter); 
              $this->session->set_flashdata('message', 'Your information has been updated successfully!');
              redirect("admin/lead/viewleads");
        }
      }
      $parameter = array(
                        'act_mode' => 'fetchleaddetail', 
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
      $this->load->view('lead/updatelead',$response);
  } 

  public function assignleadold($id) {

     
      echo "sdaf"; exit;
      if($this->input->post('submit')=='submit') 
      {
       
      	echo "hello"; exit;
        //$this->form_validation->set_rules('map_leadId[]','Assign employee','trim|required');
        //if($this->form_validation->run() != false) {
              $parameter1 = array(
                        'act_mode' => 'deletemapemployee', 
                        'v_id' => $this->input->post('empid'),
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
              //$response = $this->supper_admin->call_procedure('proc_vendor', $parameter1);
             
              p($parameter1);


              foreach($_REQUEST['map_leadId'] as $lead_id) {
                $parameter2 = array(

                        'act_mode' => 'mapemployelead', 
                        'v_id' => $id,
                        'v_status' => $lead_id,
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
                        'param2' =>  $this->input->post('employeid')                       
                      
                      );


            
                $response = $this->supper_admin->call_procedure('proc_vendor', $parameter2);
              }

              
              $this->session->set_flashdata('message', 'Lead Assign successfully!');
              redirect("admin/lead/viewleads");
        //}
      }
      $parameter = array(
                  'act_mode' => 'fetchemployee', 
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
      $response['employee'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
      
      $parameter = array(
                  'act_mode' => 'listofalllead', 
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
      $response['pendinglead'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
      
      $parameter = array(
                            'act_mode' => 'leadmap', 
                                                        'v_id' => '',//$value->s_admin_id,
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
     
    $response['leadmap']  = $this->supper_admin->call_procedure('proc_vendor', $parameter);







      //p($response['pendinglead']); exit;

      //$this->load->view('helper/header');
      //$this->load->view('lead/assignlead',$response);
  }



public function assignlead() {

      
    
      if($this->input->post('submit')=='submit') 
      {

        $parameter=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',//,$this->input->post('leadid'),
                      'row_id'     => $this->input->post('mapid'),
                      'act_mode'   => 'leadidconcat');

                    
        $response = $this->supper_admin->call_procedureRow('proc_state', $parameter);

    //p($response); exit; 
        
        if($response->lead_id=='')
        {
            $newvalue = $this->input->post('leadid');
        }
        else
        {
            $newvalue = $response->lead_id.','.$this->input->post('leadid');
        }



        $parameter1=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> $newvalue,
                      'row_id'     => $this->input->post('mapid'),
                      'act_mode'   => 'managerassignlead');
 
        $response1 = $this->supper_admin->call_procedureRow('proc_state', $parameter1);
    


        $parameter2=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',//$newvalue,
                      'row_id'     => $this->input->post('mapid'),
                      'act_mode'   => 'checkmanagerassignid');


          $response1 = $this->supper_admin->call_procedureRow('proc_state', $parameter2);
          $newarr = array();
          $newarr = explode(',',$response1->mangerleadassid);
          //p($newarr); 
          $pid=$response1->parentid;  
          if(in_array($response1->userid,$newarr)) 
            {
                //echo '2';
            }
            else
                {
                    if($response1->mangerleadassid=='')
                    {
                        $maid=$response1->userid;
                    }
                    else
                    {
                        $maid=$response1->mangerleadassid.','.$response1->userid;
                    }

                    $parameter2=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> $maid,
                      'row_id'     => $pid,
                      'act_mode'   => 'managerassignlead1');


                  $response1 = $this->supper_admin->call_procedureRow('proc_state', $parameter2);
                }//exit;

              

            
               
              }

              
             
           
    
      






  }

public function assigntoram() {

     
    
      if($this->input->post('submit')=='submit') 
      {
       
            $parameter1 = array(
                        'act_mode' => 'checkramassign', 
                        'v_id' => '',
                        'v_status' => $this->input->post('leadid'),
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
                        'param2' => $this->input->post('ramid'),                      
                      );
              
                      //p($parameter1); exit;

           $this->supper_admin->call_procedure('proc_vendor', $parameter1);




                      $parameter1 = array(
                        'act_mode' => 'mapramlead', 
                        'v_id' => '',
                        'v_status' => $this->input->post('leadid'),
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
                        'param2' => $this->input->post('ramid'),                      
                      );
              
                      //p($parameter1); exit;

             $response = $this->supper_admin->call_procedure('proc_vendor', $parameter1);
            echo $response[0]->cou_rec;


              

            
               
              }

              
             
           
    
      






  }






public function ramretailer()
  {   

        $parameter1 = array(
                        'act_mode' => 'ramretailerview', 
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
              
                      //p($parameter1); exit;

          $response['ramretailer'] = $this->supper_admin->call_procedure('proc_vendor', $parameter1);     

            
      $this->load->view('helper/header');
      $this->load->view('helper/sidebar');
      $this->load->view('lead/ramretailer' , $response);

  }



public function viewmanagerlead()
{

     $loginid =   $this->session->userdata('popcoin_login')->s_admin_id;
    
    $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->uri->segment(4),
                      'act_mode'   =>'managerleads');
  
     
    //p($param); exit; 
      $response['view'] = $this->supper_admin->call_procedure('proc_state', $param);
        //p($response['view']); exit;  

        $this->load->view('helper/header');
        $this->load->view('assignretailer', $response);



}


}