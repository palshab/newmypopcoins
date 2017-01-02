<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Leadmanage extends MX_Controller {
  public $data   =   array();
  public function __construct() {
    $this->load->model("supper_admin");
    $this->load->helper('my_helper');
    $this->userfunction->loginAdminvalidation();
  }

  public function viewleads() {

    $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->session->userdata('popcoin_login')->s_admin_id,
                      'act_mode'   => 'firstviewleads');
  // p($param);exit;
      $response['view'] = $this->supper_admin->call_procedure('proc_state', $param);
//p($response['view']);exit;
      $this->load->view('helper/header');
      $this->load->view('firstlead',$response);

}

public function viewleadm() {

    $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->uri->segment(4),
                      'act_mode'   => 'firstviewleads');
   // p($param);exit;
      $response['view'] = $this->supper_admin->call_procedure('proc_state', $param);
//p($response['view']);exit;
      $this->load->view('helper/header');
      
    $this->load->view('firstlead_1',$response);

}


public function viewleadm2() {

    $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->uri->segment(4),
                      'act_mode'   => 'firstviewleads');
   // p($param);exit;
      $response['view'] = $this->supper_admin->call_procedure('proc_state', $param);
//p($response['view']);exit;
      $this->load->view('helper/header');
      $this->load->view('firstlead_3',$response);

}


public function approveretailer() {

    $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->input->post('lid'),
                      'act_mode'   => 'approveretailer');
  //p($param);exit;
      $response = $this->supper_admin->call_procedureRow('proc_state', $param);
//p($response);exit;
     

}

public function assigntl() {

   
//p($this->session->all_userdata()); exit;

    $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->session->userdata('popcoin_login')->s_admin_id,
                      'act_mode'   => 'assigntl');
  //p($param);exit;
      $response['view'] = $this->supper_admin->call_procedure('proc_state', $param);
//p($response['view']);exit;



      $this->load->view('helper/header');

    if($this->session->userdata('popcoin_login')->s_usertype==8)
    {
        $this->load->view('assignmanager',$response);
    }else if($this->session->userdata('popcoin_login')->s_usertype==9)
    {
        $this->load->view('assignmanager1',$response);
    }else if($this->session->userdata('popcoin_login')->s_usertype==10)
    {
      $param1=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->session->userdata('popcoin_login')->s_admin_id,
                      'act_mode'   => 'assigntl1');
  // p($param);exit;
      $response['view'] = $this->supper_admin->call_procedure('proc_state', $param1);



        $this->load->view('assignmanager2',$response);
    }
      

}

/*public function assignt9() {

    $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->session->userdata('popcoin_login')->s_admin_id,
                      'act_mode'   => 'assigntl');
   // p($param);exit;
      $response['view'] = $this->supper_admin->call_procedure('proc_state', $param);
//p($response['view']);exit;
      $this->load->view('helper/header');
      $this->load->view('assignmanager1',$response);

}



public function assignt10() {

    $param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->session->userdata('popcoin_login')->s_admin_id,
                      'act_mode'   => 'assigntl');
   // p($param);exit;
      $response['view'] = $this->supper_admin->call_procedure('proc_state', $param);
//p($response['view']);exit;
      $this->load->view('helper/header');
      $this->load->view('assignmanager2',$response);

}*/

public function transferm()
{
	
	$id = $this->uri->segment(4);

	$param=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->session->userdata('popcoin_login')->s_admin_id,
                      'act_mode'   => 'firstviewleads');
      $response['view'] = $this->supper_admin->call_procedure('proc_state', $param);
        
      $response['leaveid'] = $id ;

      if($this->input->post('submit'))
      {

      	$leaveids = $this->input->post('leaveid');

      	$param=array('country_id' => $id,
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $leaveids ,
                      'act_mode'   => 'transferleaveid');
      
      	$response['view'] = $this->supper_admin->call_procedure('proc_state', $param);
      	redirect(base_url().'admin/lead/viewleads');


      }


        $this->load->view('helper/header');
        $this->load->view('lead/transferm', $response); 
}


}