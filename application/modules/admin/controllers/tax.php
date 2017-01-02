<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Tax extends MX_Controller {

  public function __construct() {    
      $this->load->model("supper_admin");
      $this->load->helper('my_helper');
      $this->userfunction->loginAdminvalidation();    
  } 

  public function addtax() {

      if($this->session->userdata('popcoin_login')->s_usertype!=1) {
        redirect(base_url().'admin/login');
      }
      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('tax_type','Tax type','trim|required');
        //$this->form_validation->set_rules('tax_name','Tax name','trim|required');
        //$this->form_validation->set_rules('tax_value','Tax value','trim|required');
        if($this->form_validation->run() != false) {
            $parameter = array(
                        'act_mode' => 'checktax', 
                        'v_id' => '',
                        'v_status' => $this->input->post('tax_type'),
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

            $res = $this->supper_admin->call_procedureRow('proc_vendor', $parameter);
            


            if($res->cou_rec>0) {
              $this->session->set_flashdata('message', 'This type of tax already exists!');
              redirect("admin/tax/addtax");
            } else { 
              $parameter = array(
                        'act_mode' => 'inserttax', 
                        'v_id' => '',
                        'v_status' => $this->input->post('tax_type'),
                        'v_mobile' => $this->input->post('tax_value'),
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
              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/tax/viewtaxes");
          }
        }
      }
      $this->load->view('helper/header');
      $this->load->view('tax/addtax');
  } 

  public function viewtaxes() {

      if($this->session->userdata('popcoin_login')->s_usertype!=1) {
        redirect(base_url().'admin/login');
      }
      $parameter = array(
                    'act_mode' => 'viewtaxes', 
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
      $this->load->view('tax/viewtaxes',$response);
  }

  public function updatetax($id) {

      if($this->session->userdata('popcoin_login')->s_usertype!=1) {
        redirect(base_url().'admin/login');
      }
      if($this->input->post('submit')) 
      {
        //$this->form_validation->set_rules('tax_type','Tax type','trim|required');
        //$this->form_validation->set_rules('tax_name','Tax name','trim|required');
        $this->form_validation->set_rules('tax_value','Tax value','trim|required');
        if($this->form_validation->run() != false) {
            /*$parameter = array(
                        'act_mode' => 'checktaxupdate', 
                        'v_id' => $id,
                        'v_status' => $this->input->post('tax_type'),
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
            $res = $this->supper_admin->call_procedureRow('proc_vendor', $parameter);
            if($res->cou_rec>0) {
              $this->session->set_flashdata('message', 'This type of tax already exists!');
              redirect("admin/tax/updatetax/".$id);
            } else {  */
              $parameter = array(
                        'act_mode' => 'updatetax', 
                        'v_id' => $id,
                        'v_status' => $this->input->post('tax_type'),
                        'v_mobile' => $this->input->post('tax_value'),
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
              $this->session->set_flashdata('message', 'Your information has been updated successfully!');
              redirect("admin/tax/viewtaxes");
          //}
        }
      }
      $parameter = array(
                        'act_mode' => 'fetchtaxdetail', 
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
     
      //p($response['vieww']); exit;

      $this->load->view('helper/header');
      $this->load->view('tax/updatetax',$response);
  } 

  public function statustax($id,$status) {

      if($this->session->userdata('popcoin_login')->s_usertype!=1) {
        redirect(base_url().'admin/login');
      }
      $act_mode = $status=='1'?'taxdeactive':'taxactive'; 
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
      redirect("admin/tax/viewtaxes");
  } 

  public function deletetax($id) {

      if($this->session->userdata('popcoin_login')->s_usertype!=1) {
        redirect(base_url().'admin/login');
      }
      $parameter = array(
                        'act_mode' => 'deletetax', 
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
      redirect("admin/tax/viewtaxes");
  } 

public function paymentcycle() {

      if($this->input->post('paysubmit'))
      {
          $this->form_validation->set_rules('payname','Payment Cycle Name','trim|required');
          $this->form_validation->set_rules('paydate','Payment Cycle Date','trim|required');
          $this->form_validation->set_rules('fdate','Transaction From Date','trim|required');
          $this->form_validation->set_rules('edate','Transaction To Date','trim|required');
          if($this->form_validation->run() != false) {

        $parameter = array(
                    'act_mode' => 'addpaymentcycle', 
                    'v_id' => '',
                    'v_status' => $this->input->post('payname'),
                    'v_mobile' => $this->input->post('paydate'),
                    'v_email' => $this->input->post('fdate'),
                    'v_pwd' => $this->input->post('edate'),
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

          $this->session->set_flashdata('message', 'Your information has been saved successfully!');
          redirect("admin/tax/paymentcycle");
        }
      }

      $parameter = array(
                    'act_mode' => 'viewpaymentcycle', 
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
     // p($response['vieww']);exit; 
      $this->load->view('helper/header');      
      $this->load->view('paymentcycle',$response);
  }

  public function paymentcycledelete() {

      $parameter = array(
                    'act_mode' => 'deletepaymentcycle', 
                    'v_id' => $this->uri->segment(4),
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
//p($parameter);exit;
          $response = $this->supper_admin->call_procedureRow('proc_vendor', $parameter);  

          $this->session->set_flashdata('message', 'Your paymentcycle has been remove successfully!');
          redirect("admin/tax/paymentcycle");
       
  }

  public function paymentprocess() {
      if($this->input->get('store_id')!="") {
        if($this->input->get('month')!="") {
          $array=explode("-",$this->input->get('month'));
          $month=$array[0];
          $year=$array[1];
        } else {
          $month="";
          $year="";
        }    
        $dateObj   = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');
        $start = date("d",strtotime('first day of '.$monthName, time()));
        $dateObj   = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');
        $end = date("d",strtotime('last day of '.$monthName, time()));
        $sdate = $year.'-'.$month.'-'.$start.' 00:00:00';
        $edate = $year.'-'.$month.'-'.$end.' 00:00:00';
        $parameter = array(
                      'act_mode' => 'retailerpaymentprocess', 
                      'v_id' => $this->session->userdata('popcoin_login')->s_admin_id,
                      'v_status' => $this->input->get('store_id'),
                      'v_mobile' => $sdate,
                      'v_email' => $edate,
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
        $response['view'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
        $parameter = array(
                    'act_mode' => 'retailerpaymentprocess1', 
                    'v_id' => $this->session->userdata('popcoin_login')->s_admin_id,
                    'v_status' => $this->input->get('store_id'),
                    'v_mobile' => $sdate,
                    'v_email' => $edate,
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
        $response['amountdetails'] = $this->supper_admin->call_procedure('proc_vendor', $parameter); 
      } else {
        $parameter = array(
                      'act_mode' => 'retailerpaymentprocess', 
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
        $response['view'] = $this->supper_admin->call_procedure('proc_vendor', $parameter); 
        $parameter = array(
                    'act_mode' => 'retailerpaymentprocess1', 
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
        $response['amountdetails'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
      }

      if(isset($_POST['save_data'])) {
          //pend($_REQUEST);
          $amount_paid=$_REQUEST['payment'];
          $amount=$_REQUEST['pay_amt'];
          $paidper=100-(($amount-$amount_paid)*100/$amount);
          $mapstatus = 'failed';
          /*if($paidper==100) {
            $mapstatus = 'success';
          } else {
            $mapstatus = 'partial';
          }*/
          $param2 = array(
                    'act_mode' => 'fetchtransdata', 
                    'row_id' => $_REQUEST['t_id'],
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
                    'param18' => ''
                  );             
          $data = $this->supper_admin->call_procedureRow('proc_procedure4', $param2);
          if($data->remaining_amt=="") {
            $remaining=$data->pay_amt-$_REQUEST['payment'];
          } else {
            $remaining=$data->remaining_amt-$_REQUEST['payment'];
          }          
          $param2 = array(
                    'act_mode' => 'updatetransmapdata', 
                    'row_id' => $_REQUEST['t_id'],
                    'param1' => $data->txn_id,
                    'param2' => $data->cycle_id,
                    'param3' => $data->retailer_id,
                    'param4' => $data->store_id,
                    'param5' => $data->from_date,
                    'param6' => $data->to_date,
                    'param7' => $data->pay_date,
                    'param8' => $data->pay_type,
                    'param9' => $remaining,
                    'param10' => $_REQUEST['txn_id'],
                    'param11' => $mapstatus,
                    'param12' => $data->pay_amt,
                    'param13' => '',
                    'param14' => '',
                    'param15' => '',
                    'param16' => '',
                    'param17' => '',
                    'param18' => ''
                  );             
            $res2 = $this->supper_admin->call_procedure('proc_procedure4', $param2);
          foreach($res2 as $val) {
            $process_amt=($val->pay_amt*$paidper)/100;
            $param = array(
                  'act_mode' => 'updatetranssuccessdata', 
                  'row_id' => $val->t_id,
                  'param1' => $val->txn_id,
                  'param2' => $val->tran_map_id,
                  'param3' => $val->cycle_id,
                  'param4' => $val->receipts_id,
                  'param5' => $val->order_id,
                  'param6' => $val->retailer_id,
                  'param7' => $val->store_id,
                  'param8' => $val->deal_id,
                  'param9' => $val->user_id,
                  'param10' => $val->user_type,
                  'param11' => $val->pay_type,
                  'param12' => $val->tax_type,
                  'param13' => $val->tax_amt,
                  'param14' => $val->total_amt,
                  'param15' => $val->pay_amt,
                  'param16' => $process_amt,
                  'param17' => $mapstatus,
                  'param18' => ''
                );             
            $res = $this->supper_admin->call_procedure('proc_procedure4', $param);
            if($val->user_type=='C') {
              $param = array(
                  'act_mode' => 'insertcustomercashback', 
                  'row_id' => '',
                  'param1' => $val->txn_id,
                  'param2' => $val->tran_map_id,
                  'param3' => $val->cycle_id,
                  'param4' => $val->receipts_id,
                  'param5' => $val->order_id,
                  'param6' => $val->retailer_id,
                  'param7' => $val->store_id,
                  'param8' => $val->deal_id,
                  'param9' => $val->user_id,
                  'param10' => $val->user_type,
                  'param11' => $val->pay_type,
                  'param12' => $val->tax_type,
                  'param13' => $val->tax_amt,
                  'param14' => $val->total_amt,
                  'param15' => $val->pay_amt,
                  'param16' => $process_amt,
                  'param17' => '',
                  'param18' => ''
                );             
              $res = $this->supper_admin->call_procedure('proc_procedure4', $param);
            }
          }         
          //$this->session->set_flashdata('message', 'Your transaction has been successful - '.$_REQUEST['txn_id'].' (TXN ID)!');
          //redirect(base_url().'admin/tax/paymentprocess');
          redirect(base_url().'admin/receipts/paymentgateway/'.$_REQUEST['txn_id']);
      }
      $param=array('country_id' => '',
                  'state_name' => '',
                  'countrycode'=> '',
                  'row_id'     => $this->session->userdata('popcoin_login')->s_admin_id,
                  'act_mode'   => 'getretailerstore');
      $response['stores'] = $this->supper_admin->call_procedure('proc_state', $param); 
      //p($response['vieww']);exit; 
      $this->load->view('helper/header');      
      $this->load->view('pay_transaction',$response);
  }

  public function viewpaymentdetails() {
      $txn_id=$this->uri->segment(4);
      $param = array(
                    'act_mode' => 'fetchpaymentdetails', 
                    'row_id' => $txn_id,
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
                    'param18' => ''
                  );             
      $response['details'] = $this->supper_admin->call_procedure('proc_procedure4', $param); 
      $this->load->view('helper/header');      
      $this->load->view('viewpaymentdetails',$response);
  }

  public function paymentprocessall() {
      if($this->input->get('store_id')!="") {
        if($this->input->get('month')!="") {
          $array=explode("-",$this->input->get('month'));
          $month=$array[0];
          $year=$array[1];
        } else {
          $month="";
          $year="";
        }    
        $dateObj   = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');
        $start = date("d",strtotime('first day of '.$monthName, time()));
        $dateObj   = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');
        $end = date("d",strtotime('last day of '.$monthName, time()));
        $sdate = $year.'-'.$month.'-'.$start.' 00:00:00';
        $edate = $year.'-'.$month.'-'.$end.' 00:00:00';
        $parameter = array(
                      'act_mode' => 'retailerpaymentprocess', 
                      'v_id' => $this->session->userdata('popcoin_login')->s_admin_id,
                      'v_status' => $this->input->get('store_id'),
                      'v_mobile' => $sdate,
                      'v_email' => $edate,
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
        $response['view'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
        $parameter = array(
                    'act_mode' => 'retailerpaymentprocess1', 
                    'v_id' => $this->session->userdata('popcoin_login')->s_admin_id,
                    'v_status' => $this->input->get('store_id'),
                    'v_mobile' => $sdate,
                    'v_email' => $edate,
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
        $response['amountdetails'] = $this->supper_admin->call_procedure('proc_vendor', $parameter); 
      } else {
        $parameter = array(
                      'act_mode' => 'retailerpaymentprocess', 
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
        $response['view'] = $this->supper_admin->call_procedure('proc_vendor', $parameter); 
        $parameter = array(
                    'act_mode' => 'retailerpaymentprocess12', 
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
        $response['amountdetails'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
      }
      $param=array('country_id' => '',
                  'state_name' => '',
                  'countrycode'=> '',
                  'row_id'     => $this->session->userdata('popcoin_login')->s_admin_id,
                  'act_mode'   => 'getretailerstore');
      $response['stores'] = $this->supper_admin->call_procedure('proc_state', $param); 
      //p($response['vieww']);exit; 
      $this->load->view('helper/header');      
      $this->load->view('pay_transaction',$response);
  }

  public function paymentprocessallview() {
      $txnid=$this->uri->segment(4);
        $parameter = array(
                      'act_mode' => 'retailerpaymentprocessview', 
                      'v_id' => '',
                      'v_status' => $txnid,
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
        $response['view'] = $this->supper_admin->call_procedure('proc_vendor', $parameter); 
        
      //p($response['vieww']);exit; 
      $this->load->view('helper/header');      
      $this->load->view('pay_transactionview',$response);
  }

}
?>