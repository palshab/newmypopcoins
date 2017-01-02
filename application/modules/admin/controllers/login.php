<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MX_Controller{

  public function __construct() {
    
    $this->load->model("supper_admin");
    $this->load->helper('my_helper');
    //$this->userfunction->loginAdminvalidation();
    
  }
  
//............. DEFAULT FUNCTION ............... //
  public function index() {
      $result = null;
      if($this->input->post('submit')) {
          $this->form_validation->set_rules('email', 'Email','trim|required|xss_clean|valid_email');
          $this->form_validation->set_rules('password', 'Password','trim|required|max_length[20]|xss_clean');
          if($this->form_validation->run() == true) {
              $parameter = array(
                  'useremail'    => trim($this->input->post('email')),
                  'userpassword' => md5(trim($this->input->post('password'))),
                  'act_mode'     => 'login',
                  'row_id'       => '');
              $data['result'] = $this->supper_admin->call_procedureRow('proc_Adminlogin', $parameter);
              if(isset($data['result']->s_admin_id) && $data['result']->s_admin_id>0) {
                  $this->session->set_userdata('popcoin_login',$data['result']); 
                  if($this->session->userdata('popcoin_login')->s_usertype==3) {
                    $result['result']='<span style="color:red">Invalid Login!</span>';
                  } else {
                    redirect('admin/login/dashboard');                    
                  }                  
              } else {
                  $result['result']='<span style="color:red">Wrong login credentials!</span>';
              }
          }
      }
      $this->load->view("user/login",$result);
  }

  //.............  Forgot Pass ............... //  
  public function forgetpass(){
     
     if($this->input->post('submit'))
      {  
        $pass=rand(100, 10000); 
        //p($pass); exit;
        $parameter = array(
                  'useremail'    => trim($this->input->post('email')),
                  'userpassword' => md5($pass),
                  'act_mode'     => 'forgotpass',
                  'row_id'       => '');
              $data['result'] = $this->supper_admin->call_procedureRow('proc_Adminlogin', $parameter);
        
               
        $emailid=$_REQUEST['email'];
        $mypopcoinsemail="pal@mindztechnology.com";
        $msg= "Your new pass word is ".$pass." . You can login with this password.";
        $this->load->library('email');
        $this->email->from($mypopcoinsemail,'Forgot Password');
        $this->email->to($emailid); 
        $this->email->subject('Forgot Password');
        $this->email->message($msg);
        $this->email->send();

      }
    
    $this->load->view("user/forgotpass");
  }

//.............  User Logout ............... //  
  public function logout(){
   
    $this->session->unset_userdata('promon');
    redirect('admin/login');
  }

//.............  User Dashboard ............... //  
   public function dashboard(){
    		#p($this->session->all_userdata()); exit;
		    $this->userfunction->loginAdminvalidation();

        //-- Collect data from tables
        /*$params = array("act_mode" => "total_order_count");
        $data['result']['orderCount']  = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);

        $params = array("act_mode" => "total_orders");
        $data['result']['ordersTotal'] = $this->supper_admin->call_procedure('proc_dashboard_data',$params);

        $params = array("act_mode" => "total_order_cod");
        $data['result']['orderCountCod'] = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);

        $params = array("act_mode" => "total_order_cheque");
        $data['result']['orderCountCheque'] = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);

        $params = array("act_mode" => "total_order_online");
        $data['result']['orderCountOnline'] = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);

        $params = array("act_mode" => "total_order_credit");
        $data['result']['orderCountCredit'] = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);

        $params = array("act_mode" => "manu_count");
        $data['result']['manuCount']  = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);

        $params = array("act_mode" => "manu_list");
        $data['result']['manuTotal'] = $this->supper_admin->call_procedure('proc_dashboard_data',$params);

        $params = array("act_mode" => "retail_count");
        $data['result']['retailCount']  = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);

        $params = array("act_mode" => "consumer_count");
        $data['result']['consumerCount']  = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);

        $params = array("act_mode" => "brand_count");
        $data['result']['brandCount']  = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);

 $params = array("act_mode" => "order_ofmonth");
        $data['result']['orderofmonth']  = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);

        $params = array("act_mode" => "total_ofmonth");
        $data['result']['totalofmonth']  = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);

        $params = array("act_mode" => "pending_order");
        $data['result']['pendingorder']  = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);

        $params = array("act_mode" => "dispatch_order");
        $data['result']['dispatchorder']  = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);

          $params = array("act_mode" => "product_live");
        $data['result']['productlive']  = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);
     
       $params = array("act_mode" => "brnad_live");
        $data['result']['brnadlive']  = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);
     

        $params = array("act_mode" => "pric_ofday");
        $data['result']['pricofday']  = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);


        $params = array("act_mode" => "pending_paymentof");
        $data['result']['pendingpaymentss']  = $this->supper_admin->call_procedureRow('proc_dashboard_data',$params);*/

        #p($data['result']);

        $this->load->view('helper/header'); 
        $this->load->view('helper/sidebar'); 

        $this->load->view('user/dashboard');
        $this->load->view('helper/footer'); 
	# $this->load->view('helper/footer');
    
    }
   
//.............  Website Configuration ............... //  
   public function siteconfig(){

      $this->userfunction->loginAdminvalidation();
      $parameter         = array('act_mode'=>'viewsiteconfig','row_id'=>'');
      $data['viewsdata'] = $this->supper_admin->call_procedure('proc_siteconfig', $parameter); 
      $this->load->view('helper/header');
      $this->load->view('user/siteconfig',$data);
      $this->load->view('helper/footer');
    
  }

//.............  Update Website Configuration ............... //  
  public function updatesiteconfig(){

      $this->userfunction->loginAdminvalidation();
      $rowid = $this->uri->segment(4);
      //p($_POST);exit();

      if($_POST){
        $sitevalue   = $this->input->post('sitevalue');
        $sitevalueid = $this->input->post('sitevalueid');
        $parameter1  = array('act_mode'=>'updateconfigdata','row_id'=>$sitevalueid,'qty'=>'','pay_status'=>$sitevalue);
        $response['updatesite'] = $this->supper_admin->call_procedure('proc_orderflow', $parameter1);
        $this->session->set_flashdata('message', 'Data Update Successfully');
        redirect('admin/login/siteconfig');

      }//end if.

      $parameter         = array('act_mode'=>'viewupdateconfig','row_id'=>$rowid);
      $data['viewsdata'] = $this->supper_admin->call_procedureRow('proc_siteconfig', $parameter); 
      $this->load->view('helper/header');
      $this->load->view('user/updatesiteconfig',$data);
      $this->load->view('helper/footer');
    
  }

//.............  Unique Admin Password ............... //  
  public function adminUniquepassword() {

       $this->userfunction->loginAdminvalidation();
       $allsession    = $this->session->userdata('bizzadmin');
       $userid        = $allsession->LoginID;
       $useremail     = $allsession->UserName;
       
       $valuepassword = $_POST['oldpasswod'];

       $parameter = array(
                     'act_mode'    => 'checkpassword',
                     'n_email'     => $useremail,
                     'oldpassword' => md5($valuepassword),
                     'row_id'      => $userid
                    );
        
        $result['value'] = $this->supper_admin->supper_admin->call_procedureRow('proc_adminpasswordcheck', $parameter);
        //p($result['value']); exit;
        echo json_encode($result['value']);
  }

//.............  Update Admin Password ............... //  
  public function adminupdatepassword(){
    $this->userfunction->loginAdminvalidation();
    $this->load->view('helper/header');

    //p($this->session->all_userdata()); exit;
    $allsession   = $this->session->userdata('bizzadmin');
    $userid       = $allsession->LoginID;
    $useremail    = $allsession->UserName;
    
   // echo $userid."/ ".$useremail; exit;

    if ($this->input->post('submit')) {
        //p($_POST); exit;
        $valuepassword        = $this->input->post('old_password');
        $confirmvaluepassword = $this->input->post('confirm_password');
        
        $parameter            = array(
                                  'act_mode'    => 'updatepassword',
                                  'n_email'     => $useremail,
                                  'oldpassword' => md5($confirmvaluepassword),
                                  'row_id'      => $userid
                                );

        //p($parameter); exit;

        $data = $this->supper_admin->supper_admin->call_procedureRow('proc_adminpasswordcheck', $parameter);
           
        if ($data->adminemailcount == 0) {
            $this->session->set_flashdata('message', 'Password Update Successfully!');
            redirect('admin/login/adminupdatepassword');
        }
      }  
     $this->load->view('adminupdatepassword');
     //$this->load->view('helper/footer');
  }
public function dashboardview()
    {

       $actmode =   $this->uri->segment(4); 
        


         $parameter = array('act_mode'=>$actmode,
                           'row_id'  => ''  
                          );

         $data['orderofday'] = $this->supper_admin->supper_admin->call_procedure('proc_dashboardview', $parameter);

         

        //p($data['orderofday']);
        $this->load->view('helper/header');
         $this->load->view('order/dashboard_view',$data);
    }

    public function createrole() {
      //$this->userfunction->loginAdminvalidation();
   

    $this->load->library('form_validation');
    
    $parameter2         = array('id' => '','act_mode' => 'mainmenu');
    $data['menuaccess'] = $this->supper_admin->call_procedure('proc_SubMenu', $parameter2);

    if ($this->input->post('addUserMenu')){      
      $count     = 0;         
      $userid    = $this->input->post('user');//role,user,mainmenu,div1
      //echo "sdfad".$userid; exit();
      //echo $count = sizeof($this->input->post('menuid'));
      $date      = date('Y-m-d');
      $this->form_validation->set_rules('role', 'Role ', 'trim|required|xss_clean');
      $this->form_validation->set_rules('user', 'User ', 'trim|required|xss_clean');
      if($this->form_validation->run() != FALSE) {
        
       $roles    = $this->input->post('role');
       $userid   = $this->input->post('user');
       
       //$menuid    = $this->input->post('mainmenu');
       //$submenuid = implode(",",$this->input->post('div2'));
       //p($this->input->post('div2')); exit();
        
        foreach($this->input->post('div2') as $val){
        
          $getIds     = explode("-",$val);
          $parameter  = array(
                              'roles'     => $roles,
                              'userid'    => $userid,
                              'menuid'    => $getIds[0],
                              'submenuid' => $getIds[1],
                              'act_mode'  => 'insert'
                            );

          $this->supper_admin->call_procedureRow('proc_assignrole', $parameter);        
          $this->session->set_flashdata('message','Assign Successfully Done');


        }

          
        
      }
    }
     $parameter1         = array('id' => '','act_mode' => 'type');
  
    $data['rolename'] = $this->supper_admin->call_procedure('proc_SubMenu',$parameter1);      
    //p($data['rolename']); exit;

    $this->load->view('helper/header');
    $this->load->view('rollmanagement/roles',$data);
    //$this->load->view('helper/footer');

  }
   public function getsubmenss()
  {
      $parameter2 = array('Id' => $_POST['menuid'][0],'act_mode' => 'submanu');

      //p($parameter2); exit;


      $data['result'] = $this->supper_admin->call_procedure('proc_SubMenu' ,$parameter2);

     // p($data['result']); exit();
      
      $res_opt = "";
      foreach($data['result'] as $k=>$v){
        //p($v);
        $res_opt .= "<option value='".$_POST['menuid'][0].'-'.$v->id."'>".$v->menuname."</option>";

      }
       p($res_opt);   


    }


     public function getuser() {
        foreach ($_POST as $val){           
        $parameter = array('roleid' => trim($val['roleid']));
       
        $data['combo'] = $this->supper_admin->call_procedure('proc_getuser', $parameter);
        //p($data['combo']); exit;
    }

    $this->load->view('rollmanagement/getusercombo',$data);
   
        
  }

  public function addmanager() {

      if($this->input->post('submit')) 
      {
         
        $this->form_validation->set_rules('manager_name','Retailer Type','trim|required');
        $this->form_validation->set_rules('email_id','Email ','trim|required');
        $this->form_validation->set_rules('r_password','Password','trim|required');
        $this->form_validation->set_rules('co_number','Contact No','trim|required');


      


            $parameter = array(
                        'act_mode' => 'checkmanager', 
                        'v_id' => '',
                        'v_status' =>'',
                        'v_mobile' => '',
                        'v_pwd' => '',
                        'v_email' =>$this->input->post('s_loginemail'),
                        'tin_no' => '',
                        'tax_no' => '',
                        'bank_name' => '',
                        'bank_addr' => '',
                        'ifsc_code' => '',
                        'bene_accno' => '',
                        'param1' => '',
                      
                        'P_managers_name' =>'',
                        'p_radioOutlet' =>'',
                        'p_co_no_outlet' =>'',
                        'p_category' =>'',
                        'p_pincode'=>'',
                        'p_state' =>'',
                        'p_city' =>'',
                        'p_country' =>'',
                        'p_brand_name'=>'',
                        'p_radioPmode' =>'',
                        'p_acc_h_name' =>'',
                        'p_p_card_number'=>'',
                        'p_weekly_of' =>'',
                        'p_n_billing_month'=>'',
                        'p_monthly_billing'=>'',
                        'p_pday_week'=>'',
                        'p_Profileimg'=>'',
                        'p_logoimg' =>'',
                        'Param32' => '',
                        'Param33' => '',
                        'Param34' => '',
                        'Param35' => '',
                        'Param36' => '',
                        'Param37' => ''
                        
                      
                      


                      );

            $res = $this->supper_admin->call_procedureRow('proc_adminvender', $parameter);

            $managerid = rand(0,100000);
            $manageruniqueid = 'mypop'.$managerid;

            if(empty($record['record'])){
               $pass = $this->input->post('r_password');

               






              $parameter = array(
                        'act_mode' => 'insertmanager', 
                        'v_id' => '',
                        'v_status' =>'',
                        'v_mobile' => $this->input->post('co_number'),
                        'v_email' => $this->input->post('email_id'),
                        'v_pwd' => md5($pass),
                        'tin_no' =>'',
                        'tax_no' =>'',
                        'bank_name' =>$this->input->post('manager_name'),
                        'bank_addr' =>'',
                        'ifsc_code' =>'',
                        'bene_accno' =>'',
                        'param1' =>'',
                       
                        'P_managers_name' =>'',
                        'p_radioOutlet' =>'',
                        'p_co_no_outlet' =>'',
                        'p_category' =>'',
                        'p_pincode'=>'',
                        'p_state' =>'',
                        'p_city' =>'',
                        'p_country' =>'',
                        'p_brand_name'=>'',
                        'p_radioPmode' =>'',
                        'p_acc_h_name' =>'',
                        'p_p_card_number'=>'',
                        'p_weekly_of' =>'',
                        'p_n_billing_month'=>'',
                        'p_monthly_billing'=>'',
                        'p_pday_week'=>'',
                        'p_Profileimg'=>'',
                        'p_logoimg' =>$manageruniqueid,

                        'Param32' => $this->input->post('a_number'),
                        'Param33' => $this->input->post('manager_name'),
                        'Param34' => '',
                        'Param35' =>3,
                        'Param36' => '',
                        'Param37' => ''
                      
                    );
            
              $response = $this->supper_admin->call_procedureInsert('proc_adminvender', $parameter);

              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/login/viewmanager");


            } else { 

              $this->session->set_flashdata('message', 'This vendor already exists!');
              redirect("admin/login/addmanager");
             
             
 
          }
        //}
      }
          

    
       
      $this->load->view('helper/header');
      $this->load->view('vendor/add_manager');
  } 

  public function viewmanager() {

      $row_id = $this->session->userdata('popcoin_login')->s_admin_id; 


      $parameter = array(
                        'act_mode' => 'viewmanager', 
                        'v_id' => $row_id,
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
      
      $this->load->view('vendor/managerview',$response);
  }

  public function updatemanager($id) {

      if($this->input->post('submit')) 
      {

           $row_id = $this->uri->segment(4);

         $this->form_validation->set_rules('manager_name','manager_name','trim|required');
        //$this->form_validation->set_rules('email_id','Email ','trim|required');
       
        $this->form_validation->set_rules('co_number','Contact No','trim|required');

        if($this->form_validation->run() != false) {

              $parameter = array(
                        'act_mode' => 'updatemanagerd', 
                        'v_id' => $row_id,
                        'v_status' =>'',
                        'v_mobile' => $this->input->post('co_number'),
                        'v_email' => '',//$this->input->post('email_id'),
                        'v_pwd' => '',
                        'tin_no' =>'',
                        'tax_no' =>'',
                        'bank_name' =>'',
                        'bank_addr' =>'',
                        'ifsc_code' =>'',
                        'bene_accno' =>'',
                        'param1' =>'',
                       
                        'P_managers_name' =>'',
                        'p_radioOutlet' =>'',
                        'p_co_no_outlet' =>'',
                        'p_category' =>'',
                        'p_pincode'=>'',
                        'p_state' =>'',
                        'p_city' =>'',
                        'p_country' =>'',
                        'p_brand_name'=>'',
                        'p_radioPmode' =>'',
                        'p_acc_h_name' =>'',
                        'p_p_card_number'=>'',
                        'p_weekly_of' =>'',
                        'p_n_billing_month'=>'',
                        'p_monthly_billing'=>'',
                        'p_pday_week'=>'',
                        'p_Profileimg'=>'',
                        'p_logoimg' =>'',

                        'Param32' => $this->input->post('a_number'),
                        'Param33' => $this->input->post('manager_name'),
                        'Param34' => '',
                        'Param35' =>3,
                        'Param36' => '',
                        'Param37' => ''
                      
                    );
              
              //p($parameter);  exit;

              $return = $this->supper_admin->call_procedure('proc_adminvender', $parameter);
              //p($return); exit;
              $this->session->set_flashdata('message', 'Your information has been updated successfully!');
              redirect("admin/login/viewmanager");
        }
      }
      $parameter = array(
                        'act_mode' => 'fetchvendordetaill', 
                        'v_id' => $id,
                        'v_status' =>'',
                        'v_mobile' => '',
                        'v_pwd' => '',
                        'v_email' =>'',
                        'tin_no' => '',
                        'tax_no' => '',
                        'bank_name' => '',
                        'bank_addr' => '',
                        'ifsc_code' => '',
                        'bene_accno' => '',
                        'param1' => '',
                      
                        'P_managers_name' =>'',
                        'p_radioOutlet' =>'',
                        'p_co_no_outlet' =>'',
                        'p_category' =>'',
                        'p_pincode'=>'',
                        'p_state' =>'',
                        'p_city' =>'',
                        'p_country' =>'',
                        'p_brand_name'=>'',
                        'p_radioPmode' =>'',
                        'p_acc_h_name' =>'',
                        'p_p_card_number'=>'',
                        'p_weekly_of' =>'',
                        'p_n_billing_month'=>'',
                        'p_monthly_billing'=>'',
                        'p_pday_week'=>'',
                        'p_Profileimg'=>'',
                        'p_logoimg' =>'',
                        'Param32' => '',
                        'Param33' => '',
                        'Param34' => '',
                        'Param35' => '',
                        'Param36' => '',
                        'Param37' => ''
                      );
      $response['vieww'] = $this->supper_admin->call_procedureRow('proc_adminvender', $parameter);
      ///p($parameter); exit;
   
       

      $this->load->view('helper/header');
      $this->load->view('vendor/updatemanager',$response);
  } 



  public function addemployee() {

      /*if(!$this->session->userdata('popcoin_login')) {
        redirect(base_url());
      }*/
      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('s_username','Name','trim|required');
        $this->form_validation->set_rules('empid','Employeeid','trim|required');
        //$this->form_validation->set_rules('s_loginemail','Email ID','trim|required');
        $this->form_validation->set_rules('s_loginpassword','Password','trim|required');
        $this->form_validation->set_rules('contact_no','Contact number','trim|required');
        if($this->form_validation->run() != false) {
            $parameter = array(
                        'act_mode' => 'checkemp', 
                        'v_id' => 5,
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
              
              if($this->input->post('employeetypeid')==1)
              {
                $typeid = 8;
              }else if($this->input->post('employeetypeid')==2){
                $typeid = 9;
              }
              else if($this->input->post('employeetypeid')==3){
                $typeid = 10;
              }else {
                $typeid = 5;
              }





              $parameter = array(
                        'act_mode' => 'insertmanager', 
                        'v_id' => $this->input->post('employeetypeid'),
                        'v_status' => $this->input->post('s_username'),
                        'v_mobile' => $this->input->post('contact_no'),
                        'v_email' => $this->input->post('s_loginemail'),
                        'v_pwd' => md5($pass),
                        'tin_no' => $this->input->post('empid'),
                        'tax_no' => $this->input->post('state_id'),
                        'bank_name' => $this->input->post('city_id'),
                        'bank_addr' => $this->input->post('location'),
                        'ifsc_code' => $this->input->post('pincode'),
                        'bene_accno' => $this->input->post('alertnatemail_id'),
                        'param1' => $this->session->userdata('popcoin_login')->s_admin_id,
                        'param2' => $typeid                      
                      );
              $response = $this->supper_admin->call_procedure('proc_vendor', $parameter);
              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/login/viewemployee");
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
      
      $parameter1 = array('act_mode'=>'emptypelist','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
   

      $response['vieww'] = $this->supper_admin->call_procedure('proc_master', $parameter1);
      //p($response['vieww']); exit;

      
      $this->load->view('helper/header');
      $this->load->view('rollmanagement/adminemployee',$response);
  } 
   public function viewemployee() {

      $parameter = array(
                    'act_mode' => 'viewadminemployee', 
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
      $this->load->view('rollmanagement/viewemployee',$response);
  }



  public function updateemployee($id) {

     /* if(!$this->session->userdata('popcoin_login')) {
        redirect(base_url());
      }*/
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
                        'tin_no' => $this->input->post('empid'),
                        'tax_no' => '',//$this->input->post('state_id'),
                        'bank_name' => '',//$this->input->post('city_id'),
                        'bank_addr' => $this->input->post('location'),
                        'ifsc_code' => '',//$this->input->post('pincode'),
                        'bene_accno' => $this->input->post('alertnatemail_id'),
                        'param1' => '',
                        'param2' => ''                      
                      );
              $response = $this->supper_admin->call_procedure('proc_vendor', $parameter);
              $this->session->set_flashdata('message', 'Your information has been updated successfully!');
              redirect("admin/login/viewemployee");
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
        

      //p($response['vieww']); exit;  

      $this->load->view('helper/header');
      $this->load->view('rollmanagement/updateemployee',$response);
  }

  public function statusemployee($id,$status) {

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
      redirect("admin/login/viewemployee");
  }


public function statusleadteamleader($id,$status) {

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
      redirect("admin/login/viewleadteamleader");
  }





  public function deleteemployee($id) {

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
      redirect("admin/login/viewemployee");
  }


  public function userinvitation()
  {

        //p($this->session->userdata('popcoin_login')->s_admin_id); exit;

      
      if($this->input->post('submit'))
      {  
        $user=$_REQUEST['name'];
               
        $emailid=$_REQUEST['email'];
        $mypopcoinsemail="pal@mindztechnology.com";
        $msg= "Dear ".$user."  you are invited to use our mypopcoins deal. Please <a href=".base_url()."webapp/home/userregistration/".$this->session->userdata('popcoin_login')->s_admin_id.">click here</a> to register.  ";
        $this->load->library('email');
        $this->email->from($mypopcoinsemail,'Your Invitation.');
        $this->email->to($emailid); 
        $this->email->subject('My popcoins Invitation');
        $this->email->message($msg);
        $this->email->send();

      }

      if($this->input->post('mail'))
      {
      $parameter = array( 
                  'act_mode'  => 'chkuser',
                  'row_id'    => '',
                  'Param1'    => $this->input->post('mail'),
                  'Param2'    => '',
                  'Param3'    => '',
                  'Param4'    => '',
                  'Param5'    => '',
                  'Param6'    => '',
                  'Param7'    => '',
                  'Param8'    => '',
                  'Param9'    => '',
                  'Param10'   => ''
                  ); 
      //p($parameter);
    $response = $this->supper_admin->call_procedure('proc_search', $parameter);
  
    //p($response[0]->resp); exit;
    if($response[0]->resp)
    {
      echo 1;
    }else{
      echo 0;
    }
    exit;
    }
     //  $response = $this->supper_admin->call_procedure('proc_vendor', $parameter);

    $this->load->view('helper/header');
     $this->load->view('helper/sidebar'); 

     $this->load->view('user/userinvitation');
     $this->load->view('helper/footer'); 
    
  }

  public function viewuser() {

      $parameter = array(
                    'act_mode' => 'viewuser', 
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

                  //p($parameter); exit;    
      $response['vieww'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);   
      $this->load->view('helper/header');      
      $this->load->view('user/viewuser',$response);
  }

  public function viewleadteamleader() {  

      $parameter=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => '',
                      'act_mode'   => 'leadteamleader');

                  //p($parameter); exit;    
      $response['vieww'] = $this->supper_admin->call_procedure('proc_state', $parameter); 

      $parameter=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => '',
                      'act_mode'   => 'assigngm');

                  //p($parameter); exit;    
      $response['assigngm'] = $this->supper_admin->call_procedure('proc_state', $parameter); 

      $parameter=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => '',
                      'act_mode'   => 'assignm');

                  //p($parameter); exit;    
      $response['assignm'] = $this->supper_admin->call_procedure('proc_state', $parameter); 

                  //p($parameter); exit;    
      //$response['vieww'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);   
      $this->load->view('helper/header');      
      $this->load->view('rollmanagement/viewleadteamleader',$response);
  }


}
?>