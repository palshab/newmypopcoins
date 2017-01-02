<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Reports extends MX_Controller {
  public $data   =   array();
  public function __construct() {
    $this->load->model("supper_admin");
    $this->load->helper('my_helper');
    //$this->userfunction->loginAdminvalidation();
  }

  public function viewretailerlist()
   {

    //p('hjkjklk');exit;
       if($this->session->userdata('popcoin_login')->s_admin_id==1)
       {


       $parameter = array(
                        'act_mode' => 'viewretailer', 
                        'row_id' => '',//$val,
                        'p_name' => '',//$this->input->post('s_starttime_'.$val),
                        's_storecountryid' => '',//$this->input->post('s_endtime_'.$val),
                        's_statenameid' => '',//$this->input->post('s_secondstarttime_'.$val),
                        's_storecity' => '',//$this->input->post('s_secondendtime_'.$val),
                        's_storeaddress' => '',//$res->cou_rec,
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' =>'',// $this->input->post('visitingcard'),
                        'p_samplecopy' => '',//$this->input->post('samplebillcopy'),
                        'p_email' => '',//$this->input->post('emailid'),
                        'p_concatno' => '',//$this->input->post('contactno'),
                        'p_aggrementdate' => '',//$this->input->post('dateofagrement'),
                        'param0' => '',
                        'param1' => '',//$this->input->post('categoryid'),
                        'p_firststarttime' => '',
                        'p_firstendtime' => '',
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        's_traninggivename' => '',//$this->input->post('trainggivennamee'),
                        's_traninggivenno' => '',//$this->input->post('trainggivenno'),
                        's_cashbackper' => '',//$this->input->post('cashbackper'),
                        's_dealcommision' => '',//$this->input->post('dealcommission'),
                        's_storeimg' => '',//$this->input->post('categoryid'),
                        'param11' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''                      
                      );
                 


      $response['vieww'] = $this->supper_admin->call_procedure('proc_store', $parameter);

        }else{

         $loginid =   $this->session->userdata('popcoin_login')->s_admin_id;

          $parameter = array(
                           'act_mode' => 'viewretailerextra', 
                           'row_id' => $loginid,//$val,
                           'p_name' => '',//$this->input->post('s_starttime_'.$val),
                           's_storecountryid' => '',//$this->input->post('s_endtime_'.$val),
                           's_statenameid' => '',//$this->input->post('s_secondstarttime_'.$val),
                           's_storecity' => '',//$this->input->post('s_secondendtime_'.$val),
                           's_storeaddress' => '',//$res->cou_rec,
                           's_managerid' => '',//$this->input->post('managerid'),
                           'p_tinno' => '',//$this->input->post('stinno'),
                           'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                           'p_pancardno' => '',//$this->input->post('spancardno'),
                           'p_visitingcard' =>'',// $this->input->post('visitingcard'),
                           'p_samplecopy' => '',//$this->input->post('samplebillcopy'),
                          'p_email' => '',//$this->input->post('emailid'),
                           'p_concatno' => '',//$this->input->post('contactno'),
                           'p_aggrementdate' => '',//$this->input->post('dateofagrement'),
                           'param0' => '',
                           'param1' => '',//$this->input->post('categoryid'),
                           'p_firststarttime' => '',
                           'p_firstendtime' => '',
                           'p_sefirststarttime' => '',
                           'p_seendttime' => '',
                           's_traninggivename' => '',//$this->input->post('trainggivennamee'),
                           's_traninggivenno' => '',//$this->input->post('trainggivenno'),
                           's_cashbackper' => '',//$this->input->post('cashbackper'),
                           's_dealcommision' => '',//$this->input->post('dealcommission'),
                          's_storeimg' => '',//$this->input->post('categoryid'),
                          'param11' => '',
                          'param2' => '',
                          'param3' => '',
                          'param4' => '',
                          'param5' => '',
                          'param6' => '',
                         'param7' => '',
                           'param8' => '',
                          'param9' => ''                      
                      );
                 


      $response['vieww'] = $this->supper_admin->call_procedure('proc_store', $parameter);


      //p($response['vieww']); exit;

      } 

     
      $this->load->view('helper/header');
      $this->load->view('reports/viewretailerlist', $response);

   
   }

   public function retailerstoreview()
  {

     $parameter = array(
                        'act_mode' => 'viewretailerstore1', 
                        'row_id' => $this->input->post('id'),
                        'p_name' => '',
                        's_storecountryid' => '',
                        's_statenameid' => '',
                        's_storecity' => '',//$this->input->post('storecityname'),
                        's_storeaddress' => '',//$this->input->post('storeaddress'),
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' =>'',// $this->input->post('visitingcard'),
                        'p_samplecopy' => '',//$this->input->post('samplebillcopy'),
                        'p_email' => '',//$this->input->post('emailid'),
                        'p_concatno' => '',//$this->input->post('contactno'),
                        'p_aggrementdate' => '',//$this->input->post('dateofagrement'),
                        'param0' => '',
                        'param1' => '',//$this->input->post('categoryid'),
                        'p_firststarttime' => '',
                        'p_firstendtime' => '',
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        's_traninggivename' => '',
                        's_traninggivenno' => '',
                        's_cashbackper' => '',
                        's_dealcommision' => '',
                        's_storeimg' => '',
                        'param11' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''
                       
                      );

      $store = $this->supper_admin->call_procedure('proc_store ', $parameter);
      //redirect("admin/reports/viewretailerlist");
      $str = '';
      $i=0;
     foreach($store as $k=>$value1){   $i++;
      // $str .= "<option value=".$v->cityid.">".$v->cityname."</option>";
      
      ?>
      <tr>
                 <td><?php echo $i; ?></td>
                 <td><?php echo  $value1->s_name; ?></td>
                 <td><?php echo $value1->s_storeunid; ?></td>
                 <td><?php echo $value1->location; ?></td>
                  <td><?php echo $value1->s_storeaddress; ?></td> 
                  <td><?php echo  $value1->categorydeal_name; ?></td> 
                 <td><?php echo $value1->s_cashbackper; ?></td> 
                  <td><?php if($value1->s_status==0){ echo 'Active'; } else { echo 'Inactive'; } ?></td> 
                  <td>Ram</td>
                 <td><?php echo $value1->s_traningdate ;?></td>  
                 <td><?php echo $value1->s_traninggivename; ?></td>
                 <td><?php echo $value1->s_dateaggrement; ?></td>
                                            
              </tr>
     <?php }
    
      
  }

  public function runningdeals()
  {
     $parameter = array(
            'act_mode' => 'runningdeals', 
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
            'param16' => ''
            );
          $response['vieww'] = $this->supper_admin->call_procedure('proc_general', $parameter);


          $this->load->view('helper/header');
          $this->load->view('reports/runningdeals', $response);
  }
  
  public function dealstoreview()
  {
    //p($this->input->post('id')); exit;

     $parameter = array(
                        'act_mode' => 'viewdealstore', 
                        'row_id' => $this->input->post('id'),
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
                        'param16' => ''
                                   
                                  );

     // p($parameter); exit;
      $store = $this->supper_admin->call_procedure('proc_general ', $parameter);
      //redirect("admin/reports/viewretailerlist");
      $str = '';
      $i=0;
     foreach($store as $k=>$value1){   $i++;
      // $str .= "<option value=".$v->cityid.">".$v->cityname."</option>";
      
      ?>
      <tr>
                 <td><?php echo $i; ?></td>
                 <td><?php echo $value1->s_storeunid; ?></td>
                 <td><?php echo  $value1->s_name; ?></td>
                 <td><?php echo $value1->location; ?></td>
                 <td><?php echo $value1->s_dealcommision; ?></td>  
                                            
              </tr>
     <?php }
    
      
  }



}