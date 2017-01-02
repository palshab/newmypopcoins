<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Customerapi extends REST_controller {


public function receipts_post() {

      $bill_uid='MPOP'.rand(1000,9999);

      $data = $_POST['billimg'];
     // print_r($data);           
      $data = str_replace('data:image/png;base64,', '', $data);
      $data = str_replace(' ', '+', $data);
      $data = base64_decode($data);
      $file_name=date('Y-m-d_H:i:s').'.png';
      $file =FCPATH.'public/'.$file_name;
      $success = file_put_contents($file, $data);
     
      if($this->post('paidby')==0)
      {
          $amt='0';
      }
      else
      {
          $amt=$this->post('billamt');
      }

     $param=array( 'act_mode' => 'customer_receipts',
                  'row_id'    => $this->post('cust_id'),
                  'Param1'    => $this->post('store_id'),
                  'Param2'    => '',
                  'Param3'    => $bill_uid,
                  'Param4'    => $this->post('date_op'),
                  'Param5'    => $this->post('billno'),
                  'Param6'    => $this->post('billamt'),
                  'Param7'    => $this->post('paidby'),
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => $file_name,
                  'Param11'    => $amt,
                  'Param12'    => '',
                  'Param13'    => '',
                  'Param14'    => '',
                  'Param15'    => '',
                  'Param16'    => '',
                  'Param17'    => '',
                  'Param18'    => '',
                  'Param19'    => '',
                  'Param20'    => '');   

  // $this->response($param, 202); die;               
    $data= $this->model_api->call_procedureRow('proc_other',$param);

    // http://192.168.1.30/mypopcoins/api/customerapi/receipts/format/json  1-cash/cart,0-mypopcoins

       if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); // 200 being the HTTP response code
        }
  }


  public function store_post() {


     $param=array( 'act_mode' => 'store',
                  'row_id'    => $this->input->post('retailer_id'),
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

   //$this->response($param, 202); die;               
    $data= $this->model_api->call_procedure('proc_other',$param);

    // http://192.168.1.30/mypopcoins/api/customerapi/store/format/json 
    // parameter : retailer_id

       if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $this->response("Something Went Wrong", 200); // 200 being the HTTP response code
        }
  }


  public function retailer_get() {


     $param=array( 'act_mode' => 'getretailer',
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

   //$this->response($param, 202); die;               
    $data= $this->model_api->call_procedure('proc_other',$param);

    //http://192.168.1.30/mypopcoins/api/customerapi/retailer/format/json 

       if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $data1=array('success'=>0);
           $this->response($data1, 200); // 200 being the HTTP response code
        }
  }


  public function dealbuy_post() {

        $orderno= 'ORMPC'.rand(1000,9999);
        $dealcoupan= 'DEALC'.rand(1000,9999);
        $cust_id=$this->post('cust_id');
        $amt=$this->post('amt');
        $deal_id=$this->post('deal_id');
        $deal_qty=$this->post('deal_qty');
        $storeid=$this->post('store_id');

        $paramsr=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $storeid,
                      'act_mode'   => 'storeretailerid');  
                  
      $store_rid = $this->model_api->call_procedureRow('proc_state', $paramsr);
      $retailer_id=$store_rid->s_managerid;
        $paramd=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $deal_id,
                      'act_mode'   => 'dealqty');  
                  
      $dealqty = $this->model_api->call_procedureRow('proc_state', $paramd);
      $de_qty=$dealqty->deal_qty;
      $deal_expirydate=$dealqty->o_end_date;
      $paramo=array('country_id' => $deal_id,
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $cust_id,
                      'act_mode'   => 'orderdealqty');  
                  
      $orderqty = $this->model_api->call_procedureRow('proc_state', $paramo);
      //p($orderqty->deal_qty);exit;
      $or_qty=$orderqty->deal_qty;
      $totalqty=$deal_qty+$or_qty;
      $check=$de_qty-$or_qty;
//p($deal_qty);exit;
      if($de_qty < $totalqty)
      {

          $data=array('success'=>'Limit Exceed','Deal'=>$check);
      }
      else
      {
         $param2=array( 'act_mode' => 'getreferaldata',
                  'row_id'    => $cust_id,
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
                  
      $referal = $this->model_api->call_procedureRow('proc_other', $param2);  

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
                  
      $res = $this->model_api->call_procedure('proc_other', $param1);

  
     
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
              $mlmtax=$value->commission_per;
         }

      }

     
      $staxamt=($amt*$taxamt)/100;
      $marginamt=($amt*$mpcamt)/100;
      $mlmamt=($amt*$mlmtax)/100;
      
      /*---------------------- Process ------------------------*/
      if(empty($referal))
      {
          $act='deal_noreferal';
          $mlmd=$mlmtax;
          $mlm_amt=($amt*$mlmd)/100;
          $retype1='M';
          $reid1='1';
          $retype2='';
          $reid2='';
          $store_amt=$amt-($staxamt+$marginamt+$mlmamt);
          
      }
      else
      {
          if($referal->referal==1)
          { 
              $act='deal_referal_m_r';
              $mlmd=$mlmtax/2;
              $mlm_amt=($amt*$mlmd)/100;
              $retype1=$referal->fromtype;
              $reid1=$referal->from_id;
              $retype2=$referal->fromtype2;
              $reid2=$referal->from_id2;
              $store_amt=$amt-($staxamt+$marginamt+$mlmamt);
          }
          else
          {
              if($referal->fromtype=='R')
              {
                  $act='deal_referal_r_c';
                  $mlmd=$mlmtax/2;
                  $mlm_amt=($amt*$mlmd)/100;
                  $retype1=$referal->fromtype;
                  $reid1=$referal->from_id;
                  $retype2=$referal->fromtype2;
                  $reid2=$referal->from_id2;
                  $store_amt=$amt-($staxamt+$marginamt+$mlmamt);
              }
              else
              {
                  $act='deal_referal_c_c';
                  $mlmd=$mlmtax/2;
                  $mlm_amt=($amt*$mlmd)/100;
                  $retype1=$referal->fromtype;
                  $reid1=$referal->from_id;
                  $retype2=$referal->fromtype2;
                  $reid2=$referal->from_id2;
                  $store_amt=$amt-($staxamt+$marginamt+$mlmamt);
      
              }
          }
      }
  
       /*----------------------Process end------------------------*/

     $param=array( 'act_mode' => 'deal_by',//$act,
                  'row_id'    => $cust_id,
                  'Param1'    => $orderno,
                  'Param2'    => $deal_id,
                  'Param3'    => $amt,
                  'Param4'    => $storeid,
                  'Param5'    => $dealcoupan,
                  'Param6'    => $taxamt,
                  'Param7'    => $mpcamt,
                  'Param8'    => $mlmd,
                  'Param9'    => $staxamt,
                  'Param10'   => $marginamt,
                  'Param11'   => $mlm_amt,
                  'Param12'   => $retype1,
                  'Param13'   => $reid1,
                  'Param14'   => $retype2,
                  'Param15'   => $reid2,
                  'Param16'   => $store_amt,
                  'Param17'   => $deal_qty,
                  'Param18'   => $deal_expirydate,
                  'Param19'   => $retailer_id,
                  'Param20'   => '');   

  // $this->response($param, 202); die;               
    $data= $this->model_api->call_procedureRow('proc_order',$param);
}
//$this->response($data, 202); die;  

       if(!empty($data)) {
          $this->response($data, 202);
        } else {
           $data1=array('success'=>0);
          $this->response($data1, 200); // 200 being the HTTP response code
        }
  }
// http://192.168.1.30/mypopcoins/api/customerapi/dealbuy/format/json  
  // parameter: cust_id,deal_id,amt,store_id,deal_qty


    public function getdealbuy_post() {

      
     $param=array( 'act_mode' => 'getdeal',
                  'row_id'    => $this->post('cust_id'),
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

   //$this->response($param, 202); die;               
    $data= $this->model_api->call_procedure('proc_order',$param);

//$this->response($data, 202); die;  

       if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $data1=array('success'=>0);
          $this->response($data1, 200); // 200 being the HTTP response code
        }
  }
// http://192.168.1.30/mypopcoins/api/customerapi/getdealbuy/format/json  
  // parameter: cust_id
public function coins_reward_reject_post() {
        $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->post('cust_id'),
                      'act_mode'   => 'coins_reward_reject');  
                  
      $data = $this->model_api->call_procedureRow('proc_state', $param);

if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $data1=array('success'=>0);
          $this->response($data1, 200); // 200 being the HTTP response code
        }
  }

  public function coins_reward_pending_post() {
        $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->post('cust_id'),
                      'act_mode'   => 'coins_reward_pending');  
                  
      $data = $this->model_api->call_procedureRow('proc_state', $param);

if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $data1=array('success'=>0);
          $this->response($data1, 200); // 200 being the HTTP response code
        }
  }

  public function coins_reward_confirm_post() {
        $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->post('cust_id'),
                      'act_mode'   => 'coins_reward_confirm');  
                  
      $data = $this->model_api->call_procedureRow('proc_state', $param);

if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $data1=array('success'=>0);
          $this->response($data1, 200); // 200 being the HTTP response code
        }
  }

  public function dealwishlist_post() {
        $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> $this->post('deal_id'),
                      'row_id'     => $this->post('cust_id'),
                      'act_mode'   => 'deal_wishlist_insert_delete');  
         //$this->response($param, 202);exit;       
      $data = $this->model_api->call_procedureRow('proc_state', $param);
//$this->response($data, 202);  
if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $data1=array('w_status'=>0);
          $this->response($data1, 200); // 200 being the HTTP response code
        }
  }

  public function alldealwishlist_post() {
        $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->post('cust_id'),
                      'act_mode'   => 'dealwishlist');  
                
      $data = $this->model_api->call_procedure('proc_state', $param);
//$this->response($data, 202);  
if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $data1=array('w_status'=>0);
          $this->response($data1, 200); // 200 being the HTTP response code
        }
  }

   public function prefered_post() {
        $param=array('country_id' => '',
                      'state_name' => 'Prefered',
                      'countrycode'=> $this->post('store_id'),
                      'row_id'     => $this->post('cust_id'),
                      'act_mode'   => 'preferedadd');  
         //$this->response($param, 202);        
      $data = $this->model_api->call_procedureRow('proc_state', $param);
//$this->response($data, 202);  
if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $data1=array('p_status'=>0);
          $this->response($data1, 200); // 200 being the HTTP response code
        }
  }

  public function transferpoint_post() {
        $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->post('cust_id'),
                      'act_mode'   => 'transferpopcoins');  
         //$this->response($param, 202);        
      $data = $this->model_api->call_procedure('proc_state', $param);
//$this->response($data, 202);  
if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $data1=array('p_status'=>0);
          $this->response($data1, 200); // 200 being the HTTP response code
        }
  }

  public function earningpoint_post() {
        $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->post('cust_id'),
                      'act_mode'   => 'earningpopcoins');  
         //$this->response($param, 202);        
      $data = $this->model_api->call_procedure('proc_state', $param);
//$this->response($data, 202);  
if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $data1=array('p_status'=>0);
          $this->response($data1, 200); // 200 being the HTTP response code
        }
  }

  public function redeemptionpoint_post() {
        $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->post('cust_id'),
                      'act_mode'   => 'redeemtionpopcoins');  
         //$this->response($param, 202);        
      $data = $this->model_api->call_procedure('proc_state', $param);
//$this->response($data, 202);  
if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $data1=array('p_status'=>0);
          $this->response($data1, 200); // 200 being the HTTP response code
        }
  }

public function storegcoupan_post() {

        $orderno= 'ORMPC'.rand(1000,9999);
        $dealcoupan= 'STRC'.rand(1000,9999);
        $cust_id=$this->post('cust_id');
        $amt=$this->post('amt');
        $storeid=$this->post('store_id');

        $paramsr=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $storeid,
                      'act_mode'   => 'storeretailerid');  
                  
      $store_rid = $this->model_api->call_procedureRow('proc_state', $paramsr);
      $retailer_id=$store_rid->s_managerid;
        
         $param2=array( 'act_mode' => 'getreferaldata',
                  'row_id'    => $cust_id,
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
                  
      $referal = $this->model_api->call_procedureRow('proc_other', $param2);  

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
                  
      $res = $this->model_api->call_procedure('proc_other', $param1);

  
     
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
              $mlmtax=$value->commission_per;
         }

      }

     
      $staxamt=($amt*$taxamt)/100;
      $marginamt=($amt*$mpcamt)/100;
      $mlmamt=($amt*$mlmtax)/100;
      
      /*---------------------- Process ------------------------*/
      if(empty($referal))
      {
          $act='storecode_noreferal';
          $mlmd=$mlmtax;
          $mlm_amt=($amt*$mlmd)/100;
          $retype1='M';
          $reid1='1';
          $retype2='';
          $reid2='';
          $store_amt=$amt-($staxamt+$marginamt+$mlmamt);
          
      }
      else
      {
          if($referal->referal==1)
          { 
              $act='storecode_referal_m_r';
              $mlmd=$mlmtax/2;
              $mlm_amt=($amt*$mlmd)/100;
              $retype1=$referal->fromtype;
              $reid1=$referal->from_id;
              $retype2=$referal->fromtype2;
              $reid2=$referal->from_id2;
              $store_amt=$amt-($staxamt+$marginamt+$mlmamt);
          }
          else
          {
              if($referal->fromtype=='R')
              {
                  $act='storecode_referal_r_c';
                  $mlmd=$mlmtax/2;
                  $mlm_amt=($amt*$mlmd)/100;
                  $retype1=$referal->fromtype;
                  $reid1=$referal->from_id;
                  $retype2=$referal->fromtype2;
                  $reid2=$referal->from_id2;
                  $store_amt=$amt-($staxamt+$marginamt+$mlmamt);
              }
              else
              {
                  $act='storecode_referal_c_c';
                  $mlmd=$mlmtax/2;
                  $mlm_amt=($amt*$mlmd)/100;
                  $retype1=$referal->fromtype;
                  $reid1=$referal->from_id;
                  $retype2=$referal->fromtype2;
                  $reid2=$referal->from_id2;
                  $store_amt=$amt-($staxamt+$marginamt+$mlmamt);
      
              }
          }
      }
  
       /*----------------------Process end------------------------*/

     $param=array( 'act_mode' => 'store_by_cgen',//$act,
                  'row_id'    => $cust_id,
                  'Param1'    => $orderno,
                  'Param2'    => '',
                  'Param3'    => $amt,
                  'Param4'    => $storeid,
                  'Param5'    => $dealcoupan,
                  'Param6'    => $taxamt,
                  'Param7'    => $mpcamt,
                  'Param8'    => $mlmd,
                  'Param9'    => $staxamt,
                  'Param10'   => $marginamt,
                  'Param11'   => $mlm_amt,
                  'Param12'   => $retype1,
                  'Param13'   => $reid1,
                  'Param14'   => $retype2,
                  'Param15'   => $reid2,
                  'Param16'   => $store_amt,
                  'Param17'   => '',
                  'Param18'   => '',
                  'Param19'   => $retailer_id,
                  'Param20'   => '');   

   //$this->response($param, 202); die;               
    $data= $this->model_api->call_procedureRow('proc_order',$param);

//$this->response($data, 202); die;  

       if(!empty($data)) {
          $this->response($data, 202);
        } else {
           $data1=array('success'=>0);
          $this->response($data1, 200); // 200 being the HTTP response code
        }
  }

 public function signupotp_post() {

        $mobile=$this->input->post('mobile');
        $otp = rand(1000,9999);

      $param=array('country_id' => '',
                      'state_name' => $mobile,
                      'countrycode'=> $otp,
                      'row_id'     => '',
                      'act_mode'   => 'signupotp');  
      //$this->response($param, 202);exit;        
      $data = $this->model_api->call_procedureRow('proc_state', $param);
      //$this->response($data, 202);  exit;

if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $data1=array('p_status'=>0);
          $this->response($data1, 200); // 200 being the HTTP response code
        }
  }

  public function receiptsmaincat_post() {

        $cust_id=$this->input->post('cust_id');
        
      $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $cust_id,
                      'act_mode'   => 'receiptsmaincat');  
      //$this->response($param, 202);exit;        
      $data = $this->model_api->call_procedure('proc_state', $param);
      //$this->response($data, 202);  exit;

if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $data1=array('p_status'=>0);
          $this->response($data1, 200); // 200 being the HTTP response code
        }
  }

public function dealbuymaincat_post() {

        $cust_id=$this->input->post('cust_id');
        
      $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $cust_id,
                      'act_mode'   => 'dealmaincat');  
      //$this->response($param, 202);exit;        
      $data = $this->model_api->call_procedure('proc_state', $param);
      //$this->response($data, 202);  exit;

if(!empty($data)) {
          $this->response($data, 202);
        } else {
          $data1=array('p_status'=>0);
          $this->response($data1, 200); // 200 being the HTTP response code
        }
  }




/*-------------------------------------------*/  
}//end class

/*
----------------------------------- All Retailer API for receipts upload---------------------------
http://192.168.1.30/mypopcoins/api/customerapi/retailer/format/json
GET Method
------------------------------ Store location by Retailer for receipts upload -------------------
http://192.168.1.30/mypopcoins/api/customerapi/store/format/json 
 parameter : retailer_id

 ------------------------------ My Rewards point Rejected -------------------
http://192.168.1.30/mypopcoins/api/customerapi/coins_reward_reject/format/json 
 parameter : cust_id
  ------------------------------ My Rewards point Pending -------------------
http://192.168.1.30/mypopcoins/api/customerapi/coins_reward_pending/format/json 
 parameter : cust_id
   ------------------------------ My Rewards point Confirmed -------------------
http://192.168.1.30/mypopcoins/api/customerapi/coins_reward_confirm/format/json 
 parameter : cust_id
    ------------------------------ My Wishlist (Deal Add/Remove) -------------------
http://192.168.1.30/mypopcoins/api/customerapi/dealwishlist/format/json 
 parameter : cust_id,deal_id   = Return Status (w_status=A,w_status=D-- A-> Add, D- Remove)
  ------------------------------ All My Wishlist (Deal) -------------------
http://192.168.1.30/mypopcoins/api/customerapi/alldealwishlist/format/json 
 parameter : cust_id
   ------------------------------ My Prefered (Like/Unlike) -------------------
http://192.168.1.30/mypopcoins/api/customerapi/prefered/format/json 
 parameter : cust_id,store_id    = Return Status (p_status=A,p_status=D-- A-> Like, D- Unlike)
--------------------------- Deal Buy API --------------------------
http://192.168.1.30/mypopcoins/api/customerapi/dealbuy/format/json  
parameter: cust_id,deal_id,amt,store_id,deal_qty
   ------------------------------ My History Transfer point -------------------
http://192.168.1.30/mypopcoins/api/customerapi/transferpoint/format/json 
 parameter : cust_id
    ------------------------------ My History earning point -------------------
http://192.168.1.30/mypopcoins/api/customerapi/earningpoint/format/json 
 parameter : cust_id
    ------------------------------ My History redemption point -------------------
http://192.168.1.30/mypopcoins/api/customerapi/redeemptionpoint/format/json 
 parameter : cust_id
 --------------------------------- Generate Store Coupan -------------------------
http://192.168.1.30/mypopcoins/api/customerapi/storegcoupan/format/json  
 parameter: cust_id,amt,store_id
 --------------------------------- Singup Generate OTP --------------------------
 http://192.168.1.30/mypopcoins/api/customerapi/signupotp/format/json 
 param : mobile
  --------------------------------- Singup Resend Generate OTP --------------------------
 http://192.168.1.30/mypopcoins/api/customerapi/signupotp/format/json 
 param : mobile
   --------------------------------- Upload Receipts Main Category list --------------------------
 http://192.168.1.30/mypopcoins/api/customerapi/receiptsmaincat/format/json 
 param : cust_id
    --------------------------------- Deal Buy Main Category list --------------------------
 http://192.168.1.30/mypopcoins/api/customerapi/dealbuymaincat/format/json 
 param : cust_id
     --------------------------------- All upload receipts list with category wise --------------------------
 http://192.168.1.30/mypopcoins/api/mainapi/receiptstatus/format/json 
 param : cust_id,store_id


*/
?>