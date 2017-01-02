<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Manager extends MX_Controller {

  public function __construct() {    
      $this->load->model("supper_admin");
      $this->load->helper('my_helper');   
      $this->userfunction->loginAdminvalidation(); 
  } 

 public function leadmanager() {

      $parameter=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => '',
                      'act_mode'   => 'leadmanager');

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

      $this->load->view('helper/header');      
      $this->load->view('rollmanagement/viewleadmanager',$response);
  }

function leadheadactive()
{
  

  $parameter=array('country_id' => '',
                      'state_name' => '',
                      'countrycode'=> '',
                      'row_id'     => $this->input->post('leadheadid'),
                      'act_mode'   => 'leadheadactive');

                  //p($parameter); exit;    
      $response = $this->supper_admin->call_procedureRow('proc_state', $parameter); 
      echo 1;//$response;

}

function leadteamleaderassign()
{
  

  $parameter=array('country_id' => '',
                      'state_name' => $this->input->post('level'),
                      'countrycode'=> $this->input->post('leadtlid'),
                      'row_id'     => $this->input->post('parentid'),
                      'act_mode'   => 'leadteamleaderassign');

                  //p($parameter); exit;    
     $response = $this->supper_admin->call_procedureRow('proc_state', $parameter); 
      //p($response);

}

  
}
?>