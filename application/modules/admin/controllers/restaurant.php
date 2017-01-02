<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Restaurant extends MX_Controller {
  public $data   =   array();
  public function __construct() {
    $this->load->model("supper_admin");
    $this->load->helper('my_helper');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->userfunction->loginAdminvalidation();
  }

  public function addstore()
  {
     if($this->input->post('storename')==""){
            echo "Please enter Store name!"; exit;
          }




          $parameter = array(
                        'act_mode' => 'countstore', 
                        'row_id' => '',
                        'p_name' => $this->input->post('storename'),
                        's_storecountryid' => '',//$this->input->post('storecountryid'),
                        's_statenameid' => '',//$this->input->post('storestateid'),
                        's_storecity' => '',//$this->input->post('storecityname'),
                        's_storeaddress' => '',//$this->input->post('storeaddress'),
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' => '',//$this->input->post('visitingcard'),
                        'p_samplecopy' =>'',// $this->input->post('samplebillcopy'),
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









      


     
      $response['record'] = $this->supper_admin->call_procedureRow('proc_store', $parameter);
       //p($response['record']); exit;

       if($response['record']->flag<=0){


        if(!empty($_FILES['s_storeimg']['name'])) {
                  $upload_name =  strtolower($_FILES['s_storeimg']['name']);
                  $filePath = FCPATH.'public/'.$upload_name;
                  $tmpFilePath = $_FILES['s_storeimg']['tmp_name'];
                  if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $o_menu = $upload_name;
                  

           
                } else {
                    $o_menu = "";
                  } 
              }






    $parameter = array(
                        'act_mode' => 'insertstore', 
                        'row_id' => '',
                        'p_name' => $this->input->post('storename'),
                        's_storecountryid' => $this->input->post('storecountryid'),
                        's_statenameid' => $this->input->post('storestateid'),
                        's_storecity' => $this->input->post('storecityname'),
                        's_storeaddress' => $this->input->post('storeaddress'),
                        's_managerid' => $this->input->post('retailername'),
                        'p_tinno' => $this->input->post('stinno'),
                        'p_servicetaxno' => $this->input->post('sservicetaxno'),
                        'p_pancardno' => $this->input->post('spancardno'),
                        'p_visitingcard' => $this->input->post('visitingcard'),
                        'p_samplecopy' => $this->input->post('samplebillcopy'),
                        'p_email' => $this->input->post('emailid'),
                        'p_concatno' => $this->input->post('contactno'),
                        'p_aggrementdate' => $this->input->post('dateofagrement'),
                        'param0' => $this->input->post('storelocation'),
                        'param1' => $this->input->post('categoryid'),
                        'p_firststarttime' => $this->input->post('storeno'),
                        'p_firstendtime' => '',//$this->input->post('storeno'),
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        'p_traninggivename' => $this->input->post('s_traninggivename'),
                        's_traninggivenno' => $this->input->post('s_traninggivenno'),
                        'p_cashbackper' => $this->input->post('s_cashbackper'),
                        'p_dealcommision' => $this->input->post('s_dealcommision'),
                        's_storeimg' => $o_menu,//$this->input->post('categoryid'),
                        'p_traningdate' =>    $this->input->post('s_traningdate'),
                        'param2' =>     md5($this->input->post('password')),
                        'param3' =>     $this->input->post('username'),
                        'param4' =>    $this->input->post('storetype'),
                        'param5' => $this->input->post('lattitude'),
                        'param6' => $this->input->post('logitude'),
                        'param7' => $this->input->post('s_servicetaxno_val'),
                        'param8' => $this->input->post('samplebillcopyvalue'),
                        'param9' => $this->input->post('tinnovalue'),
                        'param01' => $this->input->post('accholder_name'),
                        'param12' => $this->input->post('acc_number'),
                        'param13' => $this->input->post('ifsc_code'),
                        'param14' =>$this->input->post('bank_name'),
                        'param15' =>$this->input->post('branch_name'),
                        'param16' =>$this->input->post('location'),
                        'param17' => '',//$this->input->post('tinnovalue')
                        'param18' => '',//$this->input->post('tinnovalue')
                        'param19' => '',//$this->input->post('tinnovalue')
                        'param20' => '',//$this->input->post('tinnovalue')
                        'param21' => '',//$this->input->post('tinnovalue')
                        'param22' => '',//$this->input->post('tinnovalue')
                        'param23' =>'',// $this->input->post('tinnovalue')
                        'param24' =>'',// $this->input->post('tinnovalue')
                        'param25' => '',//$this->input->post('tinnovalue'),
                        
                       
                       
                      
                      );

   

          $res = $this->supper_admin->call_procedureRow('proc_store1', $parameter);

          if($res->cou_rec!='')
          { 
            foreach($_REQUEST['s_dayname'] as $val) {    

                    $parameter2 = array(
                        'act_mode' => 'insertstoremap', 
                        'row_id' => $val,
                        'p_name' => $this->input->post('s_starttime_'.$val),
                        's_storecountryid' => $this->input->post('s_endtime_'.$val),
                        's_statenameid' => $this->input->post('s_secondstarttime_'.$val),
                        's_storecity' => $this->input->post('s_secondendtime_'.$val),
                        's_storeaddress' => $res->cou_rec,
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

                   $res2 = $this->supper_admin->call_procedure('proc_store', $parameter2);
            }
        
        }  
          echo 1;
      }else{
        echo 0;
      }

  }

  public function addmystore() {

    if(isset($_REQUEST['submit'])) {
      if($this->input->post('storename')==""){
            echo "Please enter Store name!"; exit;
          }

















      $parameter = array(
                        'act_mode' => 'countstore', 
                        'row_id' => '',
                        'p_name' => $this->input->post('storename'),
                        'p_emailid' => '',//$this->input->post('semailid'),
                        'p_username' => '',//$this->input->post('susername'),
                        'p_starttime' => '',//$this->input->post('sstarttime'),
                        'p_endtime' => '',//$this->input->post('sendtime'),
                        'p_password' => '',//$this->input->post('spassword'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' => '',//$this->input->post('visitingcard'),
                        'p_samplecopy' => '',//$this->input->post('samplebillcopy'),
                        'traning_givenname' => '',//$this->input->post('visitingcard'),
                        'p_traningdate' => '',//$this->input->post('traingdate'),
                        'p_cashpercentage' => '',//$this->input->post('cashbackper'),
                        'deal_commission' => '',//$this->input->post('dealcommison'),
                        'param1' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => ''
                       
                      
                      );


     
      $response['record'] = $this->supper_admin->call_procedureRow('proc_store', $parameter);
       //p($response['record']); exit;

       if($response['record']->flag<=0){



   $parameter = array(
                        'act_mode' => 'insertstore', 
                        'row_id' => '',
                        'p_name' => $this->input->post('storename'),
                        's_storecountryid' => $this->input->post('storecountryid'),
                        's_statenameid' => $this->input->post('storestateid'),
                        's_storecity' => $this->input->post('storecityname'),
                        's_storeaddress' => $this->input->post('storeaddress'),
                        's_managerid' => $this->input->post('managerid'),
                        'p_tinno' => $this->input->post('stinno'),
                        'p_servicetaxno' => $this->input->post('sservicetaxno'),
                        'p_pancardno' => $this->input->post('spancardno'),
                        'p_visitingcard' => $this->input->post('visitingcard'),
                        'p_samplecopy' => $this->input->post('samplebillcopy'),
                        'p_email' => $this->input->post('emailid'),
                        'p_concatno' => $this->input->post('contactno'),
                        'p_aggrementdate' => $this->input->post('dateofagrement'),
                        'param0' => '',
                        'param1' => $this->input->post('categoryid'),
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

     //p($parameter); exit;

          $response['vieww'] = $this->supper_admin->call_procedureRow('proc_store', $parameter);
    }
    $parameter= array(
      'act_mode'=>'viewcountry',
      'row_id'=>'',
      'counname'=>'',
      'coucode'=>'',
      'commid'=>''
      );
     $response['vieww'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);
    
    $parameter5 = array(
                        'act_mode' => 'selectcountry', 
                        'row_id' => '',
                        'p_name' => '',//$this->input->post('storename'),
                        'p_emailid' => '',//$this->input->post('semailid'),
                        'p_username' => '',//$this->input->post('susername'),
                        'p_starttime' => '',//$this->input->post('sstarttime'),
                        'p_endtime' => '',//$this->input->post('sendtime'),
                        'p_password' => '',//$this->input->post('spassword'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' => '',//$this->input->post('visitingcard'),
                        'p_samplecopy' => '',//$this->input->post('samplebillcopy'),
                        'traning_givenname' => '',//$this->input->post('visitingcard'),
                        'p_traningdate' => '',//$this->input->post('traingdate'),
                        'p_cashpercentage' => '',//$this->input->post('cashbackper'),
                        'deal_commission' => '',//$this->input->post('dealcommison'),
                        'param1' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        's_dealcommision' => '',
                        's_storeimg' => '',
                        'param1' => '',
                        'param2' => '',
                        'param3' => '',
                        'param4' => '',
                        'param5' => '',
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => ''
                       
                      
                      );

      $response['category'] = $this->supper_admin->call_procedure('proc_store', $parameter5);
      $parameter = array(
                        'act_mode' => 'viewmanager', 
                        'v_id' => 4,
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
      

    
     $response['manager'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
    $this->load->view('helper/header');
    $this->load->view('restaurant/addstore',$response);
  }

}
public function updatestorestatus($id,$status) {


//p($status);
      $act_mode = $status=='0'?'storedeactive':'storeactive'; 
     // if($status==0){
     //    $act_mode = 'storeactive';
     // } else {
     //    $act_mode = 'storedeactive';
     // }

      $parameter = array(
                        'act_mode' => $act_mode, 
                        'row_id' => $id,
                        'p_name' => '',//$this->input->post('storename'),
                        's_storecountryid' => '',//$this->input->post('storecountryid'),
                        's_statenameid' => '',//$this->input->post('storestateid'),
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
                        'param9' => $this->input->post('reason')
                       
                       
                      
                      );







            //p($parameter);exit;
      
        
      
      $response = $this->supper_admin->call_procedure('proc_store', $parameter);

      $this->session->set_flashdata('message', 'Status has been changed successfully!');
      redirect("admin/restaurant/storelisting");
  } 


public function storelisting() {




if($this->input->post('filtercat'))
{
   
   $categoryid =  $this->input->post('dealcategory');
   $active =  $this->input->post('active');





if($categoryid==0)
{
    $newcategoryid = 0;
}else{
    $newcategoryid = $categoryid;
}



   $parameter10 = array(
          'act_mode'=>'filterstorebycategoroy',
          'row_id'=>$active,
          'counname'=>'',
          'coucode'=>'',
          'commid'=>$newcategoryid
         
          );
     
         //   p($parameter10); exit;

  
      
      $response['viewstore'] = $this->supper_admin->call_procedure('proc_master', $parameter10);
      //p($response['viewstore']); exit;
}else{

     $parameter10 = array(
                        'act_mode' => 'viewstore', 
                        'row_id' => '',
                        'p_name' => '',//$this->input->post('storename'),
                        's_storecountryid' => '',//$this->input->post('storecountryid'),
                        's_statenameid' => '',//$this->input->post('storestateid'),
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
     
        

  
      
      $response['viewstore'] = $this->supper_admin->call_procedure('proc_store', $parameter10);

}
      //----------------  start pagination setting ------------------------// 

         $config['base_url']         = base_url()."admin/restaurant/storelisting?";
         $config['total_rows']       = count($response['viewstore']);
         $config['per_page']         = 10;
         $config['use_page_numbers'] = TRUE;

         $this->pagination->initialize($config);
         if(isset($_GET['page'])){
         if($_GET['page']){   
           $page         = $_GET['page']-1 ;
           $page         = ($page*10);
           $second       = $config['per_page'];
         }
         else{
           $page         = 0;
           $second       = $config['per_page'];
         }
        } else {
            $page         = 0;
           $second       = $config['per_page'];
        }
         
         $str_links = $this->pagination->create_links();
         $response["links"]  = explode('&nbsp;',$str_links );

         $parameter11 = array(
                        'act_mode' => 'viewstore', 
                        'row_id' => $page,
                        'p_name' => '',
                        's_storecountryid' => '',//$this->input->post('storecountryid'),
                        's_statenameid' => '',//$this->input->post('storestateid'),
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
                        'param1' => $second,//$this->input->post('categoryid'),
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
//p($parameter11 );
         
           //$response['viewstore'] = $this->supper_admin->call_procedure('proc_store', $parameter11);

       







        $parameter1 = array(
          'act_mode'=>'listcategory',
          'row_id'=>'',
          'p_name'=>'',
          'Param4'=>'',
          'Param5'=>'',
          'Param6'=>'',
          'Param7'=>''
          );
          $response['category'] = $this->supper_admin->call_procedure('typedeal', $parameter1);
           

          

           
         
         //----------------  end pagination setting ------------------------// 

      $this->session->set_flashdata('message', 'Status has been changed successfully!');
      $this->load->view('helper/header');
      $this->load->view('restaurant/storelisting',$response);
    } 

    public function updatestore($id)
    {

        if($this->input->post('submit')) 
        {
                
        if(!empty($_FILES['s_storeimg']['name'])) {
                  $upload_name =  strtolower($_FILES['s_storeimg']['name']);
                  $filePath = FCPATH.'public/'.$upload_name;
                  $tmpFilePath = $_FILES['s_storeimg']['tmp_name'];
                  if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $o_menu = $upload_name;
                } else {
                    $o_menu = "";
                  } 
              }else{
                
                
                 $o_menu = $this->input->post('o_menu2');
              }

                    //   $parameter = array(

                    //     'act_mode' => 'mpcupdatestore
                    //     ', 
                    //     'row_id' => $id,
                    //     'p_name' => $this->input->post('storename'),
                    //     's_storecountryid' => '',//$this->input->post('country_id'),
                    //     's_statenameid' => $this->input->post('state_id'),
                    //     'p_storecity' => $this->input->post('city_id'),
                    //     's_storeaddress' => $this->input->post('storeaddress'),
                    //     's_managerid' => $this->input->post('retailername'),
                    //     'p_tinno' => $this->input->post('stinno'),
                    //     'p_servicetaxno' => $this->input->post('sservicetaxno'),   
                    //     'p_pancardno' => $this->input->post('spancardno'),
                    //     'p_visitingcard' => $this->input->post('visitingcard'),
                    //     'p_samplecopy' => $this->input->post('samplebillcopy'),
                    //     'p_email' => $this->input->post('emailid'),
                    //     'p_concatno' => $this->input->post('contactno'),
                    //     'p_aggrementdate' => $this->input->post('dateofagrement'),
                    //     'param0' => $this->input->post('storeno'),       
                    //     'param1' => $this->input->post('categoryid'),
                    //     'p_firststarttime' => '',
                    //     'p_firstendtime' => '',
                    //     'p_sefirststarttime' => '',
                    //     'p_seendttime' => '',
                    //     's_traninggivename' => $this->input->post('s_traninggivename'),
                    //     's_traninggivenno' => $this->input->post('s_traninggivenno'),
                    //     's_cashbackper' => $this->input->post('s_cashbackper'),
                    //     's_dealcommision' => $this->input->post('s_dealcommision'),
                    //     's_storeimg' =>  @$o_menu, 
                    //     'p_traningdate' =>   $this->input->post('s_traningdate'),
                    //     'param2' =>     $this->input->post('storelocation'),
                    //     'param3' =>     $this->input->post('accholdername'),
                    //     'param4' =>     $this->input->post('acc_number'),
                    //     'param5' =>     $this->input->post('ifsc_code'),
                    //     'param6' =>     $this->input->post('accholder_name'),
                    //     'param7' => '',
                    //     'param8' => '',
                    //     'param9' => ''
                       
                       
                      
                    //   );
             
                    // $res2 = $this->supper_admin->call_procedureRow('proc_store', $parameter);

                    $parameter = array(
                        'act_mode' => 'mpcupdatestore', 
                        'row_id' => $id,
                        'p_name' => $this->input->post('storename'),
                        's_storecountryid' => '',//$this->input->post('storecountryid'),
                        's_statenameid' => $this->input->post('state_id'),
                        's_storecity' => $this->input->post('city_id'),
                        's_storeaddress' => $this->input->post('storeaddress'),
                        's_managerid' => '',
                        'p_tinno' => $this->input->post('stinno'),
                        'p_servicetaxno' => $this->input->post('sservicetaxno'),
                        'p_pancardno' => $this->input->post('spancardno'),
                        'p_visitingcard' => '',
                        'p_samplecopy' => $this->input->post('samplebillcopy'),
                        'p_email' => '',//$this->input->post('emailid'),
                        'p_concatno' => '',//$this->input->post('contactno'),
                        'p_aggrementdate' => $this->input->post('dateofagrement'),
                        'param0' => '',//$this->input->post('storelocation'),
                        'param1' => $this->input->post('categoryid'),
                        'p_firststarttime' => $this->input->post('storeno'),
                        'p_firstendtime' => '',//$this->input->post('storeno'),
                        'p_sefirststarttime' => '',
                        'p_seendttime' => '',
                        'p_traninggivename' => $this->input->post('s_traninggivename'),
                        's_traninggivenno' => $this->input->post('s_traninggivenno'),
                        'p_cashbackper' => $this->input->post('s_cashbackper'),
                        'p_dealcommision' => $this->input->post('s_dealcommision'),
                        's_storeimg' => $o_menu,//$this->input->post('categoryid'),
                        'p_traningdate' =>    $this->input->post('s_traningdate'),
                        'param2' =>     '',
                        'param3' =>     '',//$this->input->post('username'),
                        'param4' =>    $this->input->post('storetype'),
                        'param5' => '',//$this->input->post('lattitude'),
                        'param6' => '',//$this->input->post('logitude'),
                        'param7' => $this->input->post('s_servicetaxno_val'),
                        'param8' => $this->input->post('samplebillcopyvalue'),
                        'param9' => $this->input->post('tinnovalue'),
                        'param01' => $this->input->post('accholdername'),
                        'param12' => $this->input->post('acc_number'),
                        'param13' => $this->input->post('ifsc_code'),
                        'param14' =>$this->input->post('bank_name'),
                        'param15' =>$this->input->post('branch_name'),
                        'param16' =>$this->input->post('location_id'),
                        'param17' => '',//$this->input->post('tinnovalue')
                        'param18' => '',//$this->input->post('tinnovalue')
                        'param19' => '',//$this->input->post('tinnovalue')
                        'param20' => '',//$this->input->post('tinnovalue')
                        'param21' => '',//$this->input->post('tinnovalue')
                        'param22' => '',//$this->input->post('tinnovalue')
                        'param23' =>'',// $this->input->post('tinnovalue')
                        'param24' =>'',// $this->input->post('tinnovalue')
                        'param25' => '',//$this->input->post('tinnovalue'),
                        
                       
                       
                      
                      );

  // p($parameter);exit;


    //p($_REQUEST['s_dayname']); exit;


         $res = $this->supper_admin->call_procedure('proc_store1', $parameter);
                  
      
                  
              
              foreach($_REQUEST['s_dayname'] as $val) {
                  $parameter = array(
                  'act_mode' => 'insertstoremap', 
                  'row_id' => $val,
                  'p_name' => $this->input->post('s_starttime_'.$val),
                  's_storecountryid' => $this->input->post('s_endtime_'.$val),
                  's_statenameid' => $this->input->post('s_secondstarttime_'.$val),
                  's_storecity' => $this->input->post('s_secondendtime_'.$val),
                  's_storeaddress' =>$id,
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
                  $res3 = $this->supper_admin->call_procedure('proc_store', $parameter);
             
   // p( $parameter); exit;
 

              }

                //redirect("admin/restaurant/storelisting");
            //$this->session->set_flashdata('message', 'Your information has been saved successfully!');
            //redirect("admin/retailer/viewstores");        
          //}
        //}
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
      
      $parameter = array(

                        'act_mode' => 'fetchstoredetails', 
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


$parameter1 = array(

                        'act_mode' => 'storemapingdata', 
                        'v_id' => $response['vieww']->store_id,
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




      $response['storemaping'] = $this->supper_admin->call_procedure('proc_vendor', $parameter1);



      //p($response['storemaping']); exit;







     // p($response['vieww']); exit;
      //p($response['vieww'][0]['store_id']); exit;


       $parameter = array(

                        'act_mode' => 'updatestore', 
                        'row_id' => '',
                        'p_name' => '',
                        's_storecountryid' => '',//$this->input->post('storecountryid'),
                        's_statenameid' => '',//$this->input->post('storestateid'),
                        's_storecity' => '',//$this->input->post('storecityname'),
                        's_storeaddress' => '',//$this->input->post('storeaddress'),
                        's_managerid' => '',//$this->input->post('s_managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' => '',//$this->input->post('visitingcard'),
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
                        'param4' => ''
                      );









      $parameter = array(
                        'act_mode' => 'viewmanager', 
                        'v_id' => 4,
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
      

    
     $response['manager'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);


     $parameter5 = array(
                        'act_mode' => 'selectcountry', 
                        'row_id' => '',
                        'p_name' => '',//$this->input->post('storename'),
                        's_storecountryid' => '',//$this->input->post('storecountryid'),
                        's_statenameid' => '',//$this->input->post('storestateid'),
                        's_storecity' => '',//$this->input->post('storecityname'),
                        's_storeaddress' => '',//$this->input->post('storeaddress'),
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' => '',//$this->input->post('visitingcard'),
                        'p_samplecopy' =>'',// $this->input->post('samplebillcopy'),
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

        $response['category'] = $this->supper_admin->call_procedure('proc_store', $parameter5);


        $parameter6 = array(
                        'act_mode' => 'selectstate', 
                        'row_id' => '',
                        'p_name' => '',//$this->input->post('storename'),
                        's_storecountryid' => '',//$this->input->post('storecountryid'),
                        's_statenameid' => '',//$this->input->post('storestateid'),
                        's_storecity' => '',//$this->input->post('storecityname'),
                        's_storeaddress' => '',//$this->input->post('storeaddress'),
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' => '',//$this->input->post('visitingcard'),
                        'p_samplecopy' =>'',// $this->input->post('samplebillcopy'),
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

        $response['state'] = $this->supper_admin->call_procedure('proc_store', $parameter6);



        $parameter7 = array(
                        'act_mode' => 'selectcity', 
                        'row_id' => '',
                        'p_name' => '',
                        's_storecountryid' => '',
                        's_statenameid' => '',
                        's_storecity' => '',
                        's_storeaddress' => '',
                        's_managerid' => '',
                        'p_tinno' => '',
                        'p_servicetaxno' => '',
                        'p_pancardno' => '',
                        'p_visitingcard' => '',
                        'p_samplecopy' =>'',
                        'p_email' => '',
                        'p_concatno' => '',
                        'p_aggrementdate' => '',
                        'param0' => '',
                        'param1' => '',
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

        $response['city'] = $this->supper_admin->call_procedure('proc_store', $parameter7);

        $parameter8 = array(
                        'act_mode' => 'selectlocation', 
                        'row_id' => '',
                        'p_name' => '',
                        's_storecountryid' => '',
                        's_statenameid' => '',
                        's_storecity' => '',
                        's_storeaddress' => '',
                        's_managerid' => '',
                        'p_tinno' => '',
                        'p_servicetaxno' => '',
                        'p_pancardno' => '',
                        'p_visitingcard' => '',
                        'p_samplecopy' =>'',
                        'p_email' => '',
                        'p_concatno' => '',
                        'p_aggrementdate' => '',
                        'param0' => '',
                        'param1' => '',
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

        $response['location'] = $this->supper_admin->call_procedure('proc_store', $parameter8);

        $parameter10 = array(
                        'act_mode' => 'viewstore', 
                        'row_id' => '',
                        'p_name' => '',//$this->input->post('storename'),
                        's_storecountryid' => '',//$this->input->post('storecountryid'),
                        's_statenameid' => '',//$this->input->post('storestateid'),
                        's_storecity' => '',//$this->input->post('storecityname'),
                        's_storeaddress' => '',//$this->input->post('storeaddress'),
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' => '',//$this->input->post('visitingcard'),
                        'p_samplecopy' =>'',// $this->input->post('samplebillcopy'),
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




      $response['viewstore'] = $this->supper_admin->call_procedure('proc_store', $parameter10);


         $parameter = array(
                        'act_mode' => 'viewretailer', 
                        'v_id' => 2,
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
      

    
     $response['retailer'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);

       $parameter11 = array(
                        'act_mode' => 'liststoretype', 
                        'v_id' => '',
                        'counname' => '',
                        'coucode' => '',
                        'commid' => ''
                        
                      );
      

    
     $response['storetype'] = $this->supper_admin->call_procedure('proc_master', $parameter11);


      $parameter11 = array(
                        'act_mode' => 'liststoretype', 
                        'v_id' => '',
                        'counname' => '',
                        'coucode' => '',
                        'commid' => ''
                        
                      );
      

    
     $response['storetype'] = $this->supper_admin->call_procedure('proc_master', $parameter11);



        //p($response['city']); exit;
      $this->load->view('helper/header');      
      $this->load->view('restaurant/updatestore',$response);    
    }

    public function viewstore() {

                $parameter10 = array(
                        'act_mode' => 'viewstore', 
                        'row_id' => '',
                        'p_name' => '',//$this->input->post('storename'),
                        's_storecountryid' => '',//$this->input->post('storecountryid'),
                        's_statenameid' => '',//$this->input->post('storestateid'),
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
      $response['vieww'] = $this->supper_admin->call_procedure('proc_store', $parameter);
      
      //pend( $response['vieww']); exit;

      $this->load->view('helper/header');
      $this->load->view('vendor/addvendor', $response);
  }

 /* public function deleterestaurant($id) {

      $parameter = array(
                        'act_mode' => 'deleterestaurant', 
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
      redirect("admin/restaurant/viewrestaurants");
  } 
*/
  /*public function statusrestaurant($id,$status) {

      $act_mode = $status=='1'?'resdeactive':'resactive'; 
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
      redirect("admin/restaurant/viewrestaurants");
  } */

  /*public function addrestaurant() {

    if($this->input->post('submit')) 
    {
       
        $this->form_validation->set_rules('r_vendor_id','Select vendor','trim|required');
        $this->form_validation->set_rules('r_res_name','Name','trim|required');
        $this->form_validation->set_rules('r_res_desc','Description','trim|required');
      
        $this->form_validation->set_rules('country_id[]','Select country','trim|required');
        $this->form_validation->set_rules('state_id[]','Select state','trim|required');
        $this->form_validation->set_rules('city_id[]','Select city','trim|required');
        $this->form_validation->set_rules('street_id[]','Select street','trim|required');
        $this->form_validation->set_rules('res_address[]','Address','trim|required');
        $this->form_validation->set_rules('res_pin[]','PIN','trim|required');
        $this->form_validation->set_rules('res_contact[]','Contact detail','trim|required');

        if($this->form_validation->run() != false) {
            $res_slug = strtolower($this->input->post('r_res_slug'));
          

              $parameter = array(

                        'act_mode' => 'insertrestaurant', 
                        'row_id' => '',//$this->input->post('r_maintype_id'),
                        'param1' => '',
                        'param2' => $this->input->post('r_vendor_id'),
                        'param3' => $this->input->post('r_res_name'),
                        'param4' => $res_slug,
                        'param5' => $this->input->post('r_res_desc'),
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => '',
                        'param10' => $this->input->post('r_meta_title'),
                        'param11' => $this->input->post('r_meta_desc'),
                        'param12' => $this->input->post('r_meta_keywords'),
                        'param13' => '',//$this->input->post('r_costfor_id'),
                        'param14' => '',//$this->input->post('r_cost_price'),
                        'param15' => '',
                        'param16' => ''
                      );
             

              $return = $this->supper_admin->call_procedureRow('proc_general', $parameter);

              if($return->id!="")
              {
               
                for($i=0; $i<count($_FILES['r_img_name']['name']); $i++) {

                      if(!empty($_FILES['r_img_name']['name'][$i])) {
                          $upload_name = $return->id.'-'.time().'-'.str_replace(" ", "-", strtolower($_FILES['r_img_name']['name'][$i]));
                          $filePath = FCPATH.'public/res-images/'.$upload_name;
                          $tmpFilePath = $_FILES['r_img_name']['tmp_name'][$i];
                          if(move_uploaded_file($tmpFilePath, $filePath)) {
                            $r_img_name = $upload_name;
                          } else {
                            $r_img_name = "";
                          } 
                      }
                      $parameter2 = array(
                        'act_mode' => 'insertresimages', 
                        'row_id' => $return->id,
                        'param1' => '',
                        'param2' => '',
                        'param3' => @$r_img_name,
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
                      $return2 = $this->supper_admin->call_procedureRow('proc_general', $parameter2);
                }

             
              

                for($i=0; $i<count($_REQUEST['country_id']); $i++) {

                        $parameter6 = array(
                          'act_mode' => 'checklocation', 
                          'v_id' => $this->input->post('country_id')[$i],
                          'v_status' => $this->input->post('res_address')[$i],
                          'v_mobile' => $this->input->post('state_id')[$i],
                          'v_email' => $this->input->post('res_latitude')[$i],
                          'v_pwd' => $this->input->post('res_longitude')[$i],
                          'tin_no' => $return->id,
                          'tax_no' => $this->input->post('res_pin')[$i],
                          'bank_name' => '',
                          'bank_addr' => '',
                          'ifsc_code' => '',
                          'bene_accno' => '',
                          'param1' => $this->input->post('city_id')[$i],
                          'param2' => $this->input->post('street_id')[$i]
                        );
                        $res = $this->supper_admin->call_procedureRow('proc_vendor', $parameter6);
                        if($res->cou_rec<=0) {
                          $parameter7 = array(
                                    'act_mode' => 'insertlocation', 
                                    'v_id' => $this->input->post('country_id')[$i],
                                    'v_status' => $this->input->post('res_address')[$i],
                                    'v_mobile' => $this->input->post('state_id')[$i],
                                    'v_email' => $this->input->post('res_latitude')[$i],
                                    'v_pwd' => $this->input->post('res_longitude')[$i],
                                    'tin_no' => $return->id,
                                    'tax_no' => $this->input->post('res_pin')[$i],
                                    'bank_name' => '',
                                    'bank_addr' => '',
                                    'ifsc_code' => $this->input->post('res_contact')[$i],
                                    'bene_accno' => $this->input->post('res_contact2')[$i],
                                    'param1' => $this->input->post('city_id')[$i],
                                    'param2' => $this->input->post('street_id')[$i]
                                  );
                          $return7 = $this->supper_admin->call_procedure('proc_vendor', $parameter7);
                        }
                }
              }

              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/restaurant/viewrestaurants");
        }
      }
      $parameter = array(
                        'act_mode' => 'allvendorlist', 
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
      //$response['vendorlist'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
      $parameter = array(
                        'act_mode' => 'attributelist', 
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
      //$response['attributes'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
       $parameter = array(
                        'act_mode' => 'selectcountry', 
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
      $response['countries'] = $this->supper_admin->call_procedure('proc_general', $parameter);
     
      $parameter = array(
                        'act_mode' => 'viewmanager', 
                        'v_id' => 3,
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
      

  
      $response['manager'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);

      


      $this->load->view('helper/header');
      $this->load->view('restaurant/addrestaurant',$response);
  } */

 /* public function updaterestaurant($id) {

    if($this->input->post('submit')) 
    {
        //$this->form_validation->set_rules('category_id[]','Select category','trim|required');
        $this->form_validation->set_rules('r_res_name','Name','trim|required');
        $this->form_validation->set_rules('r_res_desc','Description','trim|required');
        //$this->form_validation->set_rules('r_costfor_id','Cost for type','trim|required');
        //$this->form_validation->set_rules('r_cost_price','Cost for price','trim|required');

        if($this->form_validation->run() != false) {  

              $parameter = array(
                        'act_mode' => 'updaterestaurant', 
                        'row_id' => $id,
                        'param1' => '',
                        'param2' => '',
                        'param3' => $this->input->post('r_res_name'),
                        'param4' => '',
                        'param5' => $this->input->post('r_res_desc'),
                        'param6' => '',
                        'param7' => '',
                        'param8' => '',
                        'param9' => '',
                        'param10' => $this->input->post('r_meta_title'),
                        'param11' => $this->input->post('r_meta_desc'),
                        'param12' => $this->input->post('r_meta_keywords'),
                        'param13' => '',//$this->input->post('r_costfor_id'),
                        'param14' => '',//$this->input->post('r_cost_price'),
                        'param15' => '',
                        'param16' => ''
                      );
              
              //p($parameter); exit;


              $return = $this->supper_admin->call_procedureRow('proc_general', $parameter);

              $parameter7 = array(
                      'act_mode' => 'deleteattributes', 
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
                      'param16' => ''
                    );
              $return7 = $this->supper_admin->call_procedureRow('proc_general', $parameter7);
             
              $parameter6 = array(
                      'act_mode' => 'deleterescategories', 
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
                      'param16' => ''
                    );
              $return6 = $this->supper_admin->call_procedureRow('proc_general', $parameter6);
              
              $this->session->set_flashdata('message', 'Your information has been updated successfully!');
              redirect("admin/restaurant/viewrestaurants");
        }
      }
      $parameter = array(
                        'act_mode' => 'attributelist', 
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
      $response['attributes'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
      
      $parameter = array(
                        'act_mode' => 'fetchrestaurantdetail', 
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
                        'param16' => ''
                      );
      $response['vieww'] = $this->supper_admin->call_procedureRow('proc_general', $parameter);
        


      $parameter = array(
        'act_mode' => 'firstlevelcategory', 
        'v_id' => $response['vieww']->r_maintype_id,
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
      $response['categories'] = $this->supper_admin->call_procedure('proc_vendor', $parameter); 
      $parameter = array(
        'act_mode' => 'fetchrestcats', 
        'v_id' => $response['vieww']->r_restaurant_id,
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
      $response['mappedcats'] = $this->supper_admin->call_procedure('proc_vendor', $parameter); 
      $parameter = array(
        'act_mode' => 'fetchrestattributes', 
        'v_id' => $response['vieww']->r_restaurant_id,
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
      $response['mappedattrs'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
      $parameter = array(
        'act_mode' => 'fetchresimages', 
        'v_id' => $response['vieww']->r_restaurant_id,
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
      $response['mappedimages'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
      $this->load->view('helper/header');
      $this->load->view('restaurant/updaterestaurant',$response);
  }*/ 

  public function appendsubcategories(){
      $cat_id = $this->input->post('cat_id');

      $parameter = array(
                          'act_mode' => 'secondlevelcategory', 
                          'v_id' => $cat_id,
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
      $categories = $this->supper_admin->call_procedure('proc_vendor', $parameter); 

      echo '<option value="">-- Select Sub Category --</option>';
      foreach($categories as $category)
      {
        echo '<option value="'.$category->catid.'">'.$category->catname.'</option>';
      }
  }

  public function viewlocations($id) {

      $parameter = array(
                        'act_mode' => 'viewlocations', 
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
      $response['vieww'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);

      $this->load->view('helper/header');
      $this->load->view('restaurant/viewlocations', $response);
  }

  public function deletelocation($id,$res_id) {

      $parameter = array(
                        'act_mode' => 'deletelocation', 
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
      redirect("admin/restaurant/viewlocations/".$res_id);
  } 

  public function statuslocation($id,$status,$res_id) {

      $act_mode = $status=='1'?'locationdeactive':'locationactive'; 
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
      redirect("admin/restaurant/viewlocations/".$res_id);
  }

  public function addlocation($id) {

      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('country_id','Country','trim|required');
        $this->form_validation->set_rules('state_id','State','trim|required');
        $this->form_validation->set_rules('city_id','City','trim|required');
        $this->form_validation->set_rules('street_id','Street','trim|required');
        $this->form_validation->set_rules('res_address','Restaurant address','trim|required');
        $this->form_validation->set_rules('res_pin','PIN code','trim|required');
        $this->form_validation->set_rules('res_contact','Contact detail','trim|required');

        if($this->form_validation->run() != false) {

            $parameter = array(
                        'act_mode' => 'checklocation', 
                        'v_id' => $this->input->post('country_id'),
                        'v_status' => $this->input->post('res_address'),
                        'v_mobile' => $this->input->post('state_id'),
                        'v_email' => $this->input->post('res_latitude'),
                        'v_pwd' => $this->input->post('res_longitude'),
                        'tin_no' => $id,
                        'tax_no' => $this->input->post('res_pin'),
                        'bank_name' => '',
                        'bank_addr' => '',
                        'ifsc_code' => '',
                        'bene_accno' => '',
                        'param1' => $this->input->post('city_id'),
                        'param2' => $this->input->post('street_id')
                      );
            $res = $this->supper_admin->call_procedureRow('proc_vendor', $parameter);

            if($res->cou_rec>0) {

              $this->session->set_flashdata('message', 'This location already exists!');
              redirect("admin/restaurant/viewlocations/".$id);

            } else { 

              $parameter = array(
                        'act_mode' => 'insertlocation', 
                        'v_id' => $this->input->post('country_id'),
                        'v_status' => $this->input->post('res_address'),
                        'v_mobile' => $this->input->post('state_id'),
                        'v_email' => $this->input->post('res_latitude'),
                        'v_pwd' => $this->input->post('res_longitude'),
                        'tin_no' => $id,
                        'tax_no' => $this->input->post('res_pin'),
                        'bank_name' => '',
                        'bank_addr' => '',
                        'ifsc_code' => $this->input->post('res_contact'),
                        'bene_accno' => $this->input->post('res_contact2'),
                        'param1' => $this->input->post('city_id'),
                        'param2' => $this->input->post('street_id')
                      );
              $return = $this->supper_admin->call_procedure('proc_vendor', $parameter);

              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/restaurant/viewlocations/".$id);
          }
        }
      }








      $parameter = array(
                        'act_mode' => 'selectcountry', 
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
      $response['countries'] = $this->supper_admin->call_procedure('proc_general', $parameter);

      $this->load->view('helper/header');
      $this->load->view('restaurant/addlocation',$response);
  }  

  public function updatelocation($id,$res_id) {

      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('res_address','Restaurant address','trim|required');
        $this->form_validation->set_rules('res_pin','PIN code','trim|required');
        $this->form_validation->set_rules('res_contact','Contact detail','trim|required');

        if($this->form_validation->run() != false) {

              $parameter = array(
                        'act_mode' => 'updatelocation', 
                        'v_id' => $id,
                        'v_status' => $this->input->post('res_address'),
                        'v_mobile' => '',
                        'v_email' => $this->input->post('res_latitude'),
                        'v_pwd' => $this->input->post('res_longitude'),
                        'tin_no' => '',
                        'tax_no' => $this->input->post('res_pin'),
                        'bank_name' => '',
                        'bank_addr' => '',
                        'ifsc_code' => $this->input->post('res_contact'),
                        'bene_accno' => $this->input->post('res_contact2'),
                        'param1' => '',
                        'param2' => ''
                      );
              $response = $this->supper_admin->call_procedure('proc_vendor', $parameter);

              $this->session->set_flashdata('message', 'Your information has been updated successfully!');
              redirect("admin/restaurant/viewlocations/".$res_id);
        }
      }

      $parameter = array(
                        'act_mode' => 'fetchreslocation', 
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
      $this->load->view('restaurant/updatelocation',$response);
  }  

  public function appendstates(){
      $country_id = $this->input->post('country_id');

      $parameter = array(
                        'act_mode' => 'selectstate', 
                        'row_id' => $country_id,
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
      $states = $this->supper_admin->call_procedure('proc_general', $parameter);

      echo '<option value="">-- Select State --</option>';
      foreach($states as $val)
      {
        echo '<option value="'.$val->stateid.'">'.$val->statename.'</option>';
      }
  }

  public function appendcities(){
      $state_id = $this->input->post('state_id');

      $parameter = array(
                        'act_mode' => 'selectcity', 
                        'row_id' => $state_id,
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
      $cities = $this->supper_admin->call_procedure('proc_general', $parameter);

      echo '<option value="">-- Select City --</option>';
      foreach($cities as $val)
      {
        echo '<option value="'.$val->cityid.'">'.$val->cityname.'</option>';
      }
  }

  public function appendstreets(){
      $city_id = $this->input->post('city_id');

      $parameter = array(
                        'act_mode' => 'selectstreet', 
                        'row_id' => $city_id,
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
      $streets = $this->supper_admin->call_procedure('proc_general', $parameter);

      echo '<option value="">-- Select Street --</option>';
      foreach($streets as $val)
      {
        echo '<option value="'.$val->streetid.'">'.$val->streetname.'</option>';
      }
  }

  public function appendcategories(){
      $type_id = $this->input->post('r_maintype_id');

      $parameter = array(
        'act_mode' => 'firstlevelcategory', 
        'v_id' => $type_id,
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
      $categories = $this->supper_admin->call_procedure('proc_vendor', $parameter); 
      foreach($categories as $val)
      {
        echo '<option value="'.$val->catid.'">'.$val->catname.'</option>';
      }
  }

  public function viewimages($id) {

      $parameter = array(
                        'act_mode' => 'viewimages', 
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
      $response['vieww'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);

      $this->load->view('helper/header');
      $this->load->view('setting/viewimages', $response);
  }

  public function deleteimage($id,$img_name,$res_id) {

      @unlink(FCPATH.'public/res-images/'.$img_name);
      $parameter = array(
                        'act_mode' => 'deleteimage', 
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
      redirect("admin/restaurant/viewimages/".$res_id);
  } 

  public function addimage($id) {

      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('r_img_type','Image type','trim|required');
        if($this->form_validation->run() != false) {

              if(!empty($_FILES['r_img_name']['name'])) {
                  $upload_name = $id.'-'.time().'-'.str_replace(" ", "-", strtolower($_FILES['r_img_name']['name']));
                  $filePath = FCPATH.'public/res-images/'.$upload_name;
                  $tmpFilePath = $_FILES['r_img_name']['tmp_name'];
                  if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $r_img_name = $upload_name;
                  } else {
                    $r_img_name = "";
                  } 
              } else {
                $this->session->set_flashdata('message', 'Please upload image!');
                redirect("admin/restaurant/viewimages/".$id);
              }
              $parameter = array(
                        'act_mode' => 'insertimage', 
                        'v_id' => $id,
                        'v_status' => @$r_img_name,
                        'v_mobile' => $this->input->post('r_img_type'),
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
              $return = $this->supper_admin->call_procedure('proc_vendor', $parameter);

              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/restaurant/viewimages/".$id);
        }
      }
      $this->load->view('helper/header');
      $this->load->view('restaurant/addimage');
  }

  public function statusimage($id,$status,$res_id) {

      $act_mode = $status=='1'?'imagedeactive':'imageactive'; 
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
      redirect("admin/restaurant/viewimages/".$res_id);
  }

  public function viewstoreextra($id)
  {
    $parameter10 = array(
                        'act_mode' => 'viewstoredetails', 
                        'row_id' => $id,
                        'p_name' => '',//$this->input->post('storename'),
                        's_storecountryid' => '',//$this->input->post('storecountryid'),
                        's_statenameid' => '',//$this->input->post('storestateid'),
                        's_storecity' => '',//$this->input->post('storecityname'),
                        's_storeaddress' => '',//$this->input->post('storeaddress'),
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' => '',//$this->input->post('visitingcard'),
                        'p_samplecopy' =>'',// $this->input->post('samplebillcopy'),
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


      $response['vieww'] = $this->supper_admin->call_procedureRow('proc_store', $parameter10);

      $parameter11 = array(
                        'act_mode' => 'viewstoremapping', 
                        'row_id' => $id,
                        'p_name' => '',//$this->input->post('storename'),
                        's_storecountryid' => '',//$this->input->post('storecountryid'),
                        's_statenameid' => '',//$this->input->post('storestateid'),
                        's_storecity' => '',//$this->input->post('storecityname'),
                        's_storeaddress' => '',//$this->input->post('storeaddress'),
                        's_managerid' => '',//$this->input->post('managerid'),
                        'p_tinno' => '',//$this->input->post('stinno'),
                        'p_servicetaxno' => '',//$this->input->post('sservicetaxno'),
                        'p_pancardno' => '',//$this->input->post('spancardno'),
                        'p_visitingcard' => '',//$this->input->post('visitingcard'),
                        'p_samplecopy' =>'',// $this->input->post('samplebillcopy'),
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


      $response['mappings'] = $this->supper_admin->call_procedure('proc_store', $parameter11);
      //p($response['mappings']);exit;
      $this->load->view('helper/header');
      $this->load->view('restaurant/viewstoredetails', $response);
  }

}