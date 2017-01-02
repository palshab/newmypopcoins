<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Receipts extends MX_Controller {

  public function __construct() {    
      $this->load->model("supper_admin");
      $this->load->helper('my_helper');
      $this->userfunction->loginAdminvalidation();    
  } 

  public function index() {

      if($this->session->userdata('popcoin_login')->s_usertype!=1) {
        redirect(base_url().'admin/login');
      }
      
       $parameter=array( 'act_mode' => 'receipts',
                  'row_id'    => '',
                  'Param1'    => '',
                  'Param2'    => '',
                  'Param3'    => '',
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '',
                  'Param11'    => '',
                  'Param12'    => '',
                  'Param13'    => '',
                  'Param14'    => '',
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => '');  
      $response['view'] = $this->supper_admin->call_procedure('proc_other', $parameter);
//p($response['view']);
      $this->load->view('helper/header');
      $this->load->view('receipts',$response);
  } 


public function pending() {

      if($this->session->userdata('popcoin_login')->s_usertype!=1) {
        redirect(base_url().'admin/login');
      }
      
       $parameter=array( 'act_mode' => 'receiptspending',
                  'row_id'    => '',
                  'Param1'    => '',
                  'Param2'    => '',
                  'Param3'    => '',
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '',
                  'Param11'    => '',
                  'Param12'    => '',
                  'Param13'    => '',
                  'Param14'    => '',
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => '');  
      $response['view'] = $this->supper_admin->call_procedure('proc_other', $parameter);
//p($response['view']);
      $this->load->view('helper/header');
      $this->load->view('receipts-pending',$response);
  } 

  public function updatereceipts_old() {

    $loginid=$this->session->userdata('popcoin_login')->s_admin_id;

    $param=array( 'act_mode' => 'getdata',
                  'row_id'    => $this->input->post('uid'),
                  'Param1'    => '',
                  'Param2'    => '',
                  'Param3'    => '',
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '',
                  'Param11'    => '',
                  'Param12'    => '',
                  'Param13'    => '',
                  'Param14'    => '',
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => '');   
                  
      $response1 = $this->supper_admin->call_procedureRow('proc_other', $param);
 
    if($this->input->post('ust')=='Approved by MPC' || $this->input->post('ust')=='Approved by Retailer')
    {
        $act='app_receipts';

        $param=array( 'act_mode' => 'getdatadeal',
                  'row_id'    => $response1->store_id,
                  'Param1'    => '',
                  'Param2'    => '',
                  'Param3'    => '',
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '',
                  'Param11'    => '',
                  'Param12'    => '',
                  'Param13'    => '',
                  'Param14'    => '',
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => '');  
                  
      $response2 = $this->supper_admin->call_procedureRow('proc_other', $param);
      if($response1->paid_by==1)
      {
          $deal=$response2->commission;
          $cashback=($response1->bill_amt*$deal)/100;
          $cus_status='Pending';
      }
      else
      {
          $deal='0';
          $cashback='0';
          $cus_status='Pending';
      }

    }
   
    else
    {
        $act='pere_receipts';
        $deal='';
        $cashback='';
        $cus_status='Rejected';

    }

     $parameter=array( 'act_mode' => $act,
                  'row_id'    => $this->input->post('uid'),
                  'Param1'    => $response1->bill_uid,
                  'Param2'    => $response1->cust_id,
                  'Param3'    => $response1->store_id,
                  'Param4'    => $response1->date_of_purchase,
                  'Param5'    => $response1->bill_no,
                  'Param6'    => $response1->bill_amt,
                  'Param7'    => $response1->paid_by,
                  'Param8'    => $cus_status,
                  'Param9'    => $response1->bill_img,
                  'Param10'   => $this->input->post('ust1'),
                  'Param11'    => $deal,
                  'Param12'    => $cashback,
                  'Param13'    => $this->input->post('ust'),
                  'Param14'    => $loginid,
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => '');  
                 // p($parameter);die(); 
      $response = $this->supper_admin->call_procedureRow('proc_other', $parameter);
  }

  public function updatereceipts() {

    $loginid=$this->session->userdata('popcoin_login')->s_admin_id;

    $param=array( 'act_mode' => 'getdata',
                  'row_id'    => $this->input->post('uid'),
                  'Param1'    => '',
                  'Param2'    => '',
                  'Param3'    => '',
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '',
                  'Param11'    => '',
                  'Param12'    => '',
                  'Param13'    => '',
                  'Param14'    => '',
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => '');  
                  
      $response1 = $this->supper_admin->call_procedureRow('proc_other', $param);


      $param=array( 'act_mode' => 'getdatadeal',
                  'row_id'    => $response1->store_id,
                  'Param1'    => '',
                  'Param2'    => '',
                  'Param3'    => '',
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '',
                  'Param11'    => '',
                  'Param12'    => '',
                  'Param13'    => '',
                  'Param14'    => '',
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => '');  
                  
      $store_cbper = $this->supper_admin->call_procedureRow('proc_other', $param);

      $param2=array( 'act_mode' => 'getreferaldata',
                  'row_id'    => $response1->cust_id,
                  'Param1'    => '',
                  'Param2'    => '',
                  'Param3'    => '',
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '',
                  'Param11'    => '',
                  'Param12'    => '',
                  'Param13'    => '',
                  'Param14'    => '',
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => '');  
                  
      $referal = $this->supper_admin->call_procedureRow('proc_other', $param2);  

      $param1=array( 'act_mode' => 'getalltax',
                  'row_id'    => '',
                  'Param1'    => '',
                  'Param2'    => '',
                  'Param3'    => '',
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '',
                  'Param11'    => '',
                  'Param12'    => '',
                  'Param13'    => '',
                  'Param14'    => '',
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => '');  
                  
      $res = $this->supper_admin->call_procedure('proc_other', $param1);

  
     
      foreach ($res as $key => $value) 
      {
         if($value->commision_title=='Tax')
         {
              $tax=$value->commision_title;
              $taxamt=$value->commission_per;
         }
          if($value->commision_title=='MPC Margin')
         {
              $mpc=$value->commision_title;
              $mpcamt=$value->commission_per;
         }
          if($value->commision_title=='MLM')
         {
              $mlm=$value->commision_title;
              $mlmamt=$value->commission_per;
         }

      }

      
     // p($referal);
      //p($taxamt);
      //p($mpcamt);
     // p($mlmamt);

      $tax_mpc=$taxamt+$mpcamt;
      $cbper=$store_cbper->commission;
      if($cbper==0)
      {
          //$cashback=$response1->bill_update_amt;
          $cashback=0;
      }
      else
      {
          $cashback=($response1->bill_update_amt*$cbper)/100;
      }
      
      $mpcdata=($cashback*$tax_mpc)/100;

      $st=($cashback*$taxamt)/100;
      $margintax=($cashback*$mpcamt)/100;
//p($cbper);
      /*----------------------MLM Process ------------------------*/
  if($this->input->post('ust')=='Rejected')
  {
          $act='rejected';
          $mlmd=$mlmamt;
          $retcb=($cashback*$mlmd)/100;
          $retype1='M';
          $reid1='1';
          $retype2='';
          $reid2='';
          $customer_cb=$cashback-($mpcdata+$retcb);
          $mpc_cb=$mpcdata+$retcb;    
  }
  else
  {
      if(empty($referal))
      {
          $act='noreferal';
          $mlmd=$mlmamt;
          $retcb=($cashback*$mlmd)/100;
          $retype1='M';
          $reid1='1';
          $retype2='';
          $reid2='';
          $customer_cb=$cashback-($mpcdata+$retcb);
          $mpc_cb=$mpcdata+$retcb;
      }
      else
      {
          if($referal->referal==1)
          { 
              $act='referal_m_r';
              $mlmd=$mlmamt/2;
              $retcb=($cashback*$mlmd)/100;
              $retcb1=($cashback*$mlmamt)/100;
              $retype1=$referal->fromtype;
              $reid1=$referal->from_id;
              $retype2=$referal->fromtype2;
              $reid2=$referal->from_id2;
              $customer_cb=$cashback-($mpcdata+$retcb1);
              $mpc_cb=$mpcdata+$retcb;
          }
          else
          {
              if($referal->fromtype=='R')
              {
                  $act='referal_r_c';
                  $mlmd=$mlmamt/2;
                  $retcb=($cashback*$mlmd)/100;
                  $retcb1=($cashback*$mlmamt)/100;
                  $retype1=$referal->fromtype;
                  $reid1=$referal->from_id;
                  $retype2=$referal->fromtype2;
                  $reid2=$referal->from_id2;
                  $customer_cb=$cashback-($mpcdata+$retcb1);
                  $mpc_cb=$mpcdata;
              }
              else
              {
                  $act='referal_c_c';
                  $mlmd=$mlmamt/2;
                  $retcb=($cashback*$mlmd)/100;
                  $retcb1=($cashback*$mlmamt)/100;
                  $retype1=$referal->fromtype;
                  $reid1=$referal->from_id;
                  $retype2=$referal->fromtype2;
                  $reid2=$referal->from_id2;
                  $customer_cb=$cashback-($mpcdata+$retcb1);
                  $mpc_cb=$mpcdata;


                  
              }
          }
      }
  }
       /*----------------------MLM Process end------------------------*/



 $parameter=array( 'act_mode' => $act,
                  'row_id'    => $this->input->post('uid'),
                  'Param1'    => $response1->bill_uid,
                  'Param2'    => $response1->cust_id,
                  'Param3'    => $response1->store_id,
                  'Param4'    => $response1->date_of_purchase,
                  'Param5'    => $response1->bill_no,
                  'Param6'    => $response1->bill_amt,
                  'Param7'    => $response1->paid_by,
                  'Param8'    => $response1->bill_update_amt,
                  'Param9'    => $response1->bill_img,
                  'Param10'   => $this->input->post('ust1'),
                  'Param11'    => $cbper,
                  'Param12'    => $cashback,
                  'Param13'    => $this->input->post('ust'),
                  'Param14'    => $taxamt,
                  'Param15'    => $mpcamt,
                  'Param16'    => $mlmd,
                  'Param17'    => $retype1,
                  'Param18'    => $reid1,
                  'Param19'    => $retype2,
                  'Param20'    => $reid2,
                  'Param21'    => $customer_cb,
                  'Param22'    => $mpc_cb,
                  'Param23'    => $loginid,
                  'Param24'    => $response1->re_createdon,
                  'Param25'    => $retcb,
                  'Param26'    => $st,
                  'Param27'    => $margintax);  
                // p($parameter);die(); 
     $response = $this->supper_admin->call_procedureRow('proc_other1', $parameter);
      //exit;
 
   

  }

 public function updatereceipts1() {

    $loginid=$this->session->userdata('popcoin_login')->s_admin_id;

      $param=array( 'act_mode' => 'udateretailer',
                  'row_id'    => $this->input->post('uid'),
                  'Param1'    => '',
                  'Param2'    => '',
                  'Param3'    => '',
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '',
                  'Param11'    => '',
                  'Param12'    => '',
                  'Param13'    => 'Approved by Retailer',
                  'Param14'    => $loginid,
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => '');   
                 //p($param);die(); 
      $response = $this->supper_admin->call_procedureRow('proc_other', $param);
  }


public function retailer_receipts() {

      if($this->session->userdata('popcoin_login')->s_usertype!=2) {
        redirect(base_url().'admin/login');
      }
      
       $parameter=array( 'act_mode' => 'retailer_receipts',
                  'row_id'    => '',
                  'Param1'    => '',
                  'Param2'    => '',
                  'Param3'    => '',
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '',
                  'Param11'    => '',
                  'Param12'    => '',
                  'Param13'    => '',
                  'Param14'    => '',
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => '');   
      $response['view'] = $this->supper_admin->call_procedure('proc_other', $parameter);
//p($response['view']);
      $this->load->view('helper/header');
      $this->load->view('retailer_receipts',$response);
  } 

public function transactions() {

    

      $param=array( 'act_mode' => 'transactions',
                  'row_id'    => '',
                  'Param1'    => '',
                  'Param2'    => '',
                  'Param3'    => '',
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => '',
                  'Param11'    => '',
                  'Param12'    => '',
                  'Param13'    => '',
                  'Param14'    => '',
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => '');   
                 //p($param);die(); 
       $response['view']= $this->supper_admin->call_procedure('proc_other', $param);

       //p($response['view']);die();
      $this->load->view('helper/header');
      $this->load->view('transactions',$response);
  }

  public function pendingtransactions() {

      if($this->session->userdata('popcoin_login')->s_usertype!=1) {
        redirect(base_url().'admin/login');
      }
      if($this->input->get('cycle')=="") {
        $param=array('country_id' => '',
                    'state_name' => '',
                    'countrycode'=> 'pending',
                    'row_id'     => '',
                    'act_mode'   => 'gealltransactions');
        $response['view'] = $this->supper_admin->call_procedure('proc_state', $param); 
      } else {
        if($this->input->get('cycle')!="") {
          $cycle=explode("*",$this->input->get('cycle'));
          $cycle_id=$cycle[0];
          $pay_date=$cycle[1];
          $cycledate=explode("-",$cycle[2]);
          $startdate=$cycledate[0];
          $enddate=$cycledate[1];
        } else {
          $startdate="";
          $enddate="";
        }
        if($this->input->get('month')!="") {
          $array=explode("-",$this->input->get('month'));
          $month=$array[0];
          $year=$array[1];
        } else {
          $month="";
          $year="";
        }
        if($this->input->get('store_id')!="") {
          $store_id=$this->input->get('store_id');
        } else {
          $store_id="";
        }
        if($this->input->get('pay_type')!="") {
          $pay_type=$this->input->get('pay_type');
        } else {
          $pay_type="";
        }       
        $dateObj   = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');
        $monthend = date("d",strtotime('last day of '.$monthName, time()));

        $start_date = $year.'-'.$month.'-'.$startdate.' 00:00:00';          
        $start_date1 = $year.'-'.$month.'-'.$startdate;
        if($enddate >= $startdate && $enddate <= $monthend) {
          $end_date = $year.'-'.$month.'-'.$enddate.' 00:00:00'; 
          $end_date1 = $year.'-'.$month.'-'.$enddate;   
        } else {
          $nextmonth = date('Y-m',strtotime('+1 month',strtotime($start_date1)));
          $end_date = $nextmonth.'-'.$enddate.' 00:00:00'; 
          $end_date1 = $nextmonth.'-'.$enddate;
        }
        $param=array('act_mode' => 'transaction_filter',
                    'Param'     => 'pending',
                    'Param1'    => $start_date,
                    'Param2'    => $end_date,
                    'Param3'    => '',
                    'Param4'    => '',
                    'Param5'    => '',
                    'Param6'    => '',
                    'Param7'    => $store_id,
                    'Param8'    => $pay_type,
                    'Param9'    => '',
                    'Param10'   => '');
        $response['view'] = $this->supper_admin->call_procedure('proc_transaction', $param);
        $param=array('act_mode' => 'transaction_storewisetotalprice',
                    'Param'     => 'pending',
                    'Param1'    => $start_date,
                    'Param2'    => $end_date,
                    'Param3'    => '',
                    'Param4'    => '',
                    'Param5'    => '',
                    'Param6'    => '',
                    'Param7'    => $store_id,
                    'Param8'    => $pay_type,
                    'Param9'    => '',
                    'Param10'   => '');
        $response['amount'] = $this->supper_admin->call_procedure('proc_transaction', $param);
        if($response['amount'][0]->totalamt>=0){
          $type="Receivables";
        } else {
          $type="Payables";
        }
        $response['date'] = array("start_date"=>$start_date1,"end_date"=>$end_date1,"pay_date"=>$pay_date,"pay_type"=>$type);
        //pend($response['date']);
      }

      if(isset($_POST['save_data'])) {
          $rand=rand(1111,9999);
          $txn_id='TXN-'.$rand;
          foreach($response['view'] as $val) {
            $trans_array[] = $val->t_id;
            $param1 = array(
                          'act_mode' => 'insertsuccesstransactions', 
                          'row_id' => $val->t_id,
                          'param1' => $val->receipts_id,
                          'param2' => $val->order_id,
                          'param3' => $response['amount'][0]->s_admin_id,
                          'param4' => $val->store_id,
                          'param5' => $val->deal_id,
                          'param6' => $val->user_id,
                          'param7' => $val->user_type,
                          'param8' => $val->pay_type,
                          'param9' => $val->tax_type,
                          'param10' => $val->tax_amt,
                          'param11' => $val->total_amt,
                          'param12' => $val->pay_amt,
                          'param13' => $txn_id,
                          'param14' => $cycle_id,
                          'param15' => '',
                          'param16' => '',
                          'param17' => '',
                          'param18' => ''
                        );             
            $res1 = $this->supper_admin->call_procedureRow('proc_procedure4', $param1);
          }
          $t_ids = implode(",",$trans_array);
          $param2 = array(
                          'act_mode' => 'inserttransmap', 
                          'row_id' => '',
                          'param1' => $response['date']['start_date'],
                          'param2' => $response['date']['end_date'],
                          'param3' => $response['amount'][0]->s_admin_id,
                          'param4' => $response['date']['pay_date'],
                          'param5' => $response['date']['pay_type'],
                          'param6' => $response['amount'][0]->totalamt,
                          'param7' => $response['amount'][0]->store_id,
                          'param8' => '',
                          'param9' => '',
                          'param10' => '',
                          'param11' => '',
                          'param12' => '',
                          'param13' => $txn_id,
                          'param14' => $cycle_id,
                          'param15' => '',
                          'param16' => '',
                          'param17' => '',
                          'param18' => $t_ids
                        );             
          $res2 = $this->supper_admin->call_procedureRow('proc_procedure4', $param2);
          $this->session->set_flashdata('message', 'Your transaction has been successful - '.$txn_id.' (TXN ID)!');
          redirect(base_url().'admin/receipts/successtransactions');
      }
      $param=array('country_id' => '',
                  'state_name' => '',
                  'countrycode'=> 'pending',
                  'row_id'     => '',
                  'act_mode'   => 'gettransactionsstore');
      $response['stores'] = $this->supper_admin->call_procedure('proc_state', $param);

      $param=array('country_id' => '',
                  'state_name' => '',
                  'countrycode'=> '',
                  'row_id'     => '',
                  'act_mode'   => 'fetchcycles');
      $response['cycles'] = $this->supper_admin->call_procedure('proc_state', $param);
      $this->load->view('helper/header');
      $this->load->view('transaction',$response);
  } 
  
  public function successtransactions() {

      if($this->session->userdata('popcoin_login')->s_usertype!=1) {
        redirect(base_url().'admin/login');
      }
      if($this->input->get('cycle')=="") {
        $param=array('country_id' => '',
                    'state_name' => '',
                    'countrycode'=> 'success',
                    'row_id'     => '',
                    'act_mode'   => 'gealltransactions');
        $response['view'] = $this->supper_admin->call_procedure('proc_state', $param); 
      } else {
        if($this->input->get('cycle')!="") {
          $cycle=explode("*",$this->input->get('cycle'));
          $pay_date=$cycle[1];
          $cycledate=explode("-",$cycle[2]);
          $startdate=$cycledate[0];
          $enddate=$cycledate[1];
        } else {
          $startdate="";
          $enddate="";
        }
        if($this->input->get('month')!="") {
          $array=explode("-",$this->input->get('month'));
          $month=$array[0];
          $year=$array[1];
        } else {
          $month="";
          $year="";
        }
        if($this->input->get('store_id')!="") {
          $store_id=$this->input->get('store_id');
        } else {
          $store_id="";
        }
        if($this->input->get('pay_type')!="") {
          $pay_type=$this->input->get('pay_type');
        } else {
          $pay_type="";
        }       
        $dateObj   = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');
        $monthend = date("d",strtotime('last day of '.$monthName, time()));

        $start_date = $year.'-'.$month.'-'.$startdate.' 00:00:00';          
        $start_date1 = $year.'-'.$month.'-'.$startdate;
        if($enddate >= $startdate && $enddate <= $monthend) {
          $end_date = $year.'-'.$month.'-'.$enddate.' 00:00:00'; 
          $end_date1 = $year.'-'.$month.'-'.$enddate;   
        } else {
          $nextmonth = date('Y-m',strtotime('+1 month',strtotime($start_date1)));
          $end_date = $nextmonth.'-'.$enddate.' 00:00:00'; 
          $end_date1 = $nextmonth.'-'.$enddate;
        } 
        $param=array('act_mode' => 'transaction_filter',
                    'Param'     => 'success',
                    'Param1'    => $start_date,
                    'Param2'    => $end_date,
                    'Param3'    => '',
                    'Param4'    => '',
                    'Param5'    => '',
                    'Param6'    => '',
                    'Param7'    => $store_id,
                    'Param8'    => $pay_type,
                    'Param9'    => '',
                    'Param10'   => '');
        $response['view'] = $this->supper_admin->call_procedure('proc_transaction', $param);
      } 
      
      $param=array('country_id' => '',
                  'state_name' => '',
                  'countrycode'=> 'success',
                  'row_id'     => '',
                  'act_mode'   => 'gettransactionsstore');
      $response['stores'] = $this->supper_admin->call_procedure('proc_state', $param);
      
      $param=array('country_id' => '',
                  'state_name' => '',
                  'countrycode'=> '',
                  'row_id'     => '',
                  'act_mode'   => 'fetchcycles');
      $response['cycles'] = $this->supper_admin->call_procedure('proc_state', $param);
      $this->load->view('helper/header');
      $this->load->view('transaction',$response);
  } 

  public function transactionsfetchfilter() {          
      $param=array('act_mode' => 'transaction_filter',
                  'Param'     => 'pending',
                  'Param1'    => '2016-12-20 00:00:00',
                  'Param2'    => '2016-12-22 00:00:00',
                  'Param3'    => '',
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '2',
                  'Param8'    => 'Receivables',
                  'Param9'    => '',
                  'Param10'   => '');
      $response = $this->supper_admin->call_procedure('proc_transaction', $param);
  } 

function paymentgateway()
{
    $this->load->view('helper/header');
    $this->load->view('paymentprocess');
}

function paymentgateway1()
{
    $txn_id=$this->input->post('txn_id');
    $param= array('country_id' => '',
                  'state_name'=>$txn_id,
                  'countrycode'=>'',
                  'row_id'=>'',
                  'act_mode'=>'updatepaymentstatus' );
//p($param);exit;
    $response = $this->supper_admin->call_procedure('proc_state', $param);

  $this->session->set_flashdata('message', 'Your transaction has been successful - '.$txn_id.' (TXN ID)!');
  redirect(base_url().'admin/tax/paymentprocess');
}


}
?>