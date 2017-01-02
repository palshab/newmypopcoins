<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Adminvender extends MX_Controller {
  public $data   =   array();
  public function __construct() {
    $this->load->model("supper_admin");
    $this->load->helper('my_helper');
    $this->userfunction->loginAdminvalidation();
  }

  public function viewvendors() {

      $parameter = array(
                        'act_mode' => 'viewvendors', 
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
      //pend($response['vieww']);

      $this->load->view('helper/header');
      $this->load->view('vendor/viewvendors', $response);
  }




  public function deletevendor($id) {

      $parameter = array(
                        'act_mode' => 'deletevendor', 
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
      redirect("admin/vendor/viewvendors");
  } 

  public function statusvendor($id,$status) {

      $act_mode = $status=='Active'?'vendordeactive':'vendoractive'; 
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
      redirect("admin/vendor/viewvendors");
  } 

  public function addvendor() {

      /*if($this->input->post('retailersubmit')) 
      {
         

          $filename1 = $_FILES['fileToUpload']['name']; 
         

          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],
                                 "assets/images/".$filename1);
       
      
        $this->form_validation->set_rules('s_username','Vendor name','trim|required');
        
	        $this->form_validation->set_rules('s_loginemail','Email','trim|required');
	      	$this->form_validation->set_rules('countryid','Country','trim|required');
	       	  $this->form_validation->set_rules('stateid','State','trim|required');
	      $this->form_validation->set_rules('cityname','City ','trim|required');
	        

	       $this->form_validation->set_rules('s_loginpassword','Password','trim|required');
	       $this->form_validation->set_rules('s_mobileno','Contact','trim|required');
	       
	      
			   $this->form_validation->set_rules('companyname','Compant Name','trim|required');
	           
	       $this->form_validation->set_rules('owndername','Owner Name','trim|required');
	     
	        
	       $this->form_validation->set_rules('accountholder','monthly billing','required');
	       $this->form_validation->set_rules('accountnumber','account holer name','trim|required');
	       $this->form_validation->set_rules('ifscode','pan card number','trim|required');
	       


	      $this->form_validation->set_rules('barnchname','ifso code','trim|required');
	  
        
	     


	       
	        
	       $this->form_validation->set_rules('retailerrenroldate','Bank name','trim|required');
	        

	      $this->form_validation->set_rules('agrementsigndate','bank address','trim|required');
        





       // echo "sdfasdf"; exit;








        if($this->form_validation->run() != false) {

              //echo "sdfasdf"; exit;       
    //echo  "7".$filename1; exit;

            $parameter = array(
                        'act_mode' => 'checkvendor', 
                        'proc_s_username' => $this->input->post('s_username'),
                        'proc_emailid' => $this->input->post('s_loginemail'),
                        'proc_alertnatemail_id' => '',
                        'proc_country_id' => '',
                        'proc_state_id' => '',
                        'proc_city_id' => '',
                        'proc_location' => '',
                        'proc_pincode' => '',
                        'proc_company_name' => '',
                        'proc_store_type' => '',
                        'proc_ownder_name' => '',
                        'proc_store_name' => '',
                      
                        'proc_Company_Address' =>'',
                        'proc_pan_card_no' =>'',
                        'proc_service_tax_no' =>'',
                        'proc_visiting_card' =>'',
                        'proc_retailer_uniqueid'=>'',
                        'proc_retailer_login_id' =>'',
                        'proc_account_h_name' =>'',
                        'proc_account_h_number' =>'',
                        'proc_ifsc_code'=>'',
                        'proc_branch_name' =>'',
                        'proc_bank_details' =>'',
                        'proc_document_rec_date'=>'',
                        'proc_ratiler_enrol_date' =>'',
                        'proc_aggre_sing_date'=>'',
                        'proc_profile_pic'=>'',
                        'proc_password' => '',
                        'p_ramemplid' => '',
                        'p_rambranname' => '',
                        'p_ramoffiialid' => '',
                        'p_ramcontactno' => '',
                        'Param6' => '',
                        'Param7' => '',
                        'Param8' => '',
                        'Param9' => '',
                        'Param10' => ''
                        
                      
                      


                      );


             $record['record'] = $this->supper_admin->call_procedureRow('proc_retailerreg', $parameter);

          
            if(!empty($record['record'])){
              

              $parameter = array(

                        'act_mode' => 'retaileradd', 
                        'proc_s_username' => $this->input->post('s_username'),
                        'proc_emailid' => $this->input->post('s_loginemail'),
                        'proc_alertnatemail_id' => $this->input->post('Alternateemailid'),
                        'proc_country_id' => $this->input->post('countryid'),
                        'proc_state_id' =>$this->input->post('stateid'),
                        'proc_city_id' => $this->input->post('cityname'),
                        'proc_location' => '',//$this->input->post('s_username'),
                        'proc_pincode' =>      $this->input->post('pincode'),
                        'proc_company_name' => $this->input->post('companyname'),
                        'proc_store_type' => $this->input->post('s_username'),
                        'proc_ownder_name' => $this->input->post('owndername'),
                        'proc_store_name' => $this->input->post('storename'),
                      
                        'proc_Company_Address' =>$this->input->post('companyaddress'),
                        'proc_pan_card_no' =>$this->input->post('pancard'),
                        'proc_service_tax_no' =>$this->input->post('servicetax'),
                        'proc_visiting_card' =>$this->input->post('visitingcard'),
                        'proc_retailer_uniqueid'=>'',
                        'proc_retailer_login_id' =>'',
                        'proc_account_h_name' =>$this->input->post('accountholder'),
                        'proc_account_h_number' =>$this->input->post('accountnumber'),
                        'proc_ifsc_code'=>$this->input->post('ifscode'),
                        'proc_branch_name' =>$this->input->post('barnchname'),
                        'proc_bank_details' =>$this->input->post('bankdetails'),
                        'proc_document_rec_date'=>$this->input->post('docrecdate'),
                        'proc_ratiler_enrol_date' =>$this->input->post('retailerrenroldate'),
                        'proc_aggre_sing_date'=>$this->input->post('agrementsigndate'),
                        'proc_profile_pic'=>$filename1,
                       	'proc_password' => md5($this->input->post('s_loginpassword')),
                        'p_ramemplid' => $this->input->post('ramemployeeid'),
                        'p_rambranname' => $this->input->post('rambranckbankname'),
                        'p_ramoffiialid' => $this->input->post('ramofficialid'),
                        'p_ramcontactno' => $this->input->post('ramcontactno'),
                        'row_id' => '',
                        'contact_no' => $this->input->post('s_mobileno'),
                        'Param8' => '',
                        'Param9' => '',
                        'Param10' => ''
                        
                   );


              //p($parameter); exit;

             $response = $this->supper_admin->call_procedureInsert('proc_retailerreg', $parameter);
              
              p($response); exit;

              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/vendor/viewvendors");


            } else { 

              $this->session->set_flashdata('message', 'This vendor already exists!');
              redirect("admin/vendor/viewvendors");
             
          }
        }
      }*/
          

    
       $stateid   = $this->input->post('stateid');
     $cityname  = $this->input->post('cityname');
     $parameter = array(
      'act_mode'=>'cityinsert',
      'row_id'=>$stateid,
      'counname'=>$cityname,
      'coucode'=>'',
      'commid'=>''
      );
     $response  = $this->supper_admin->call_procedure('proc_geographic',$parameter);
  
     $parameter= array(
      'act_mode'=>'allstate',
      'row_id'=>'',
      'counname'=>'',
      'coucode'=>'',
      'commid'=>''
      );
     $response['vieww'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);
    
   

       $parameter = array(
        'act_mode'=>'select_usertype',
        'row_id'=>'',
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      );
      $response['vieww2'] = $this->supper_admin->call_procedure('typedeal', $parameter);


      $rowid1 =  $this->session->userdata('popcoin_login')->s_admin_id; 
      if($rowid1!='')
      {
          $rowid = $this->session->userdata('popcoin_login')->s_admin_id;
      }else{
          $rowid = 0;
      }

       $parameter1 = array(
        'act_mode'=>'select_usertypevalue',
        'row_id'=>$rowid,
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      );

      //p($parameter1); exit;
      //$response['vieww3'] = $this->supper_admin->call_procedure('typedeal', $parameter1);
      //p($response['vieww3']);
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
   
     //p($response['manager']); exit;
   
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

      //p($response['category']); exit;
      
     



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

   // $ram = array(
   //                      'act_mode' => 'viewram', 
   //                      'v_id' => 5,
   //                      'v_status' => '',
   //                      'v_mobile' => '',
   //                      'v_email' => '',
   //                      'v_pwd' => '',
   //                      'tin_no' => '',
   //                      'tax_no' => '',
   //                      'bank_name' => '',
   //                      'bank_addr' => '',
   //                      'ifsc_code' => '',
   //                      'bene_accno' => '',
   //                      'param1' => '',
   //                      'param2' => ''
   //                    );
      

    
   //   $response['ram'] = $this->supper_admin->call_procedure('proc_vendor', $ram);




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

    
      

    
     //$response['storetype'] = $this->supper_admin->call_procedure('proc_master', $parameter12);

     $parameter21 = array(
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
      $response['ram'] = $this->supper_admin->call_procedure('proc_procedure5', $parameter21);

     //p($response['storetype']); exit;
      //$response['countries'] = $this->supper_admin->call_procedure('proc_general', $parameter);
      $parameter = array('country_id' => '','state_name' => '','countrycode'=> '','row_id' => '','act_mode' => 'leadmanager1');

      $response['operationmanager'] = $this->supper_admin->call_procedure('proc_state', $parameter);


      $this->load->view('helper/header');
      $this->load->view('vendor/addvendor',$response);
  } 

  public function insertvendor() {

          if($this->input->post('s_username')==""){
            echo "Please enter your name!"; exit;
          }
          $filename1 = $_FILES['fileToUpload']['name']; 
          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],
                           "assets/images/".$filename1);

          $filename2 = $_FILES['doc']['name']; 
          move_uploaded_file($_FILES["doc"]["tmp_name"],
                           "assets/files/".$filename2);

            $parameter = array(
                        'act_mode' => 'checkvendor', 
                        'proc_s_username' => $this->input->post('s_username'),
                        'proc_emailid' => $this->input->post('s_loginemail'),
                        'proc_alertnatemail_id' => '',
                        'proc_country_id' => '',
                        'proc_state_id' => '',
                        'proc_city_id' => '',
                        'proc_location' => '',
                        'proc_pincode' => '',
                        'proc_company_name' => '',
                        'proc_store_type' => '',
                        'proc_ownder_name' => '',
                        'proc_store_name' => '',                      
                        'proc_Company_Address' =>'',
                        'proc_pan_card_no' =>'',
                        'proc_service_tax_no' =>'',
                        'proc_visiting_card' =>'',
                        'proc_retailer_uniqueid'=>'',
                        'proc_retailer_login_id' =>'',
                        'proc_account_h_name' =>'',
                        'proc_account_h_number' =>'',
                        'proc_ifsc_code'=>'',
                        'proc_branch_name' =>'',
                        'proc_bank_details' =>'',
                        'proc_document_rec_date'=>'',
                        'proc_ratiler_enrol_date' =>'',
                        'proc_aggre_sing_date'=>'',
                        'proc_profile_pic'=>'',
                        'proc_password' => '',
                        'p_ramemplid' => '',
                        'p_rambranname' => '',
                        'p_ramoffiialid' => '',
                        'p_ramcontactno' => '',
                        'Param6' => '',
                        'Param7' => '',
                        'Param8' => '',
                        'Param9' => '',
                        'Param10' => ''
                        
                      
                      


                      );


             $record['record'] = $this->supper_admin->call_procedureRow('proc_retailerreg', $parameter);
          
            if($record['record']->flag<=0){
              

              $parameter = array(

                        'act_mode' => 'retaileradd', 
                        'proc_s_username' => $this->input->post('s_username'),
                        'proc_emailid' => $this->input->post('s_loginemail'),
                        'proc_alertnatemail_id' => $this->input->post('Alternateemailid'),
                        'proc_country_id' => $this->input->post('countryid'),
                        'proc_state_id' =>$this->input->post('stateid'),
                        'proc_city_id' => $this->input->post('cityname'),
                        'proc_location' => $this->input->post('location'),
                        'proc_pincode' =>      $this->input->post('pincode'),
                        'proc_company_name' => $this->input->post('companyname'),
                        'proc_store_type' => $this->input->post('storetype'),
                        'proc_ownder_name' => $this->input->post('owndername'),
                        'proc_store_name' => $this->input->post('storename'),
                        'proc_Company_Address' =>$this->input->post('companyaddress'),
                        'proc_pan_card_no' =>$this->input->post('pancard'),
                        'proc_service_tax_no' =>$this->input->post('servicetax'),
                        'proc_visiting_card' =>$filename2,
                        'proc_retailer_uniqueid'=>$this->input->post('operation'),
                        'proc_retailer_login_id' =>'',
                        'proc_account_h_name' =>$this->input->post('accountholder'),
                        'proc_account_h_number' =>$this->input->post('accountnumber'),
                        'proc_ifsc_code'=>$this->input->post('ifscode'),
                        'proc_branch_name' =>$this->input->post('branchname'),
                        'proc_bank_details' =>$this->input->post('bankname'),
                        'proc_document_rec_date'=>$this->input->post('docrecdate'),
                        'proc_ratiler_enrol_date' =>$this->input->post('retailerrenroldate'),
                        'proc_aggre_sing_date'=>$this->input->post('agrementsigndate'),
                        'proc_profile_pic'=>$filename1,
                        'proc_password' => md5($this->input->post('s_loginpassword')),
                        'p_ramemplid' =>    $this->input->post('ramname'),
                        'p_rambranname' =>  $this->input->post('rambranckbankname'),
                        'p_ramoffiialid' => $this->input->post('ramofficialid'),
                        'p_ramcontactno' => $this->input->post('ramcontactno'),
                        'row_id' => '',
                        'contact_no' => $this->input->post('s_mobileno'),
                        'Param8' => $this->input->post('retailerpancard_div'),
                        'Param9' => $this->input->post('retailerservice_div'),
                        'Param10' => $this->input->post('r_username')
                        
                   );


              $response = $this->supper_admin->call_procedure('proc_retailerreg', $parameter);
            
             
              echo '<option value="">select retailer</option>';
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
                $retailers = $this->supper_admin->call_procedure('proc_vendor', $parameter);
                foreach ($retailers as $key => $value) {
                 echo '<option value="'.$value->s_admin_id.'"'; if($response[0]->last_id==$value->s_admin_id) echo 'selected'; echo '>'.$value->s_username.'</option>';
                }
            } else {
              echo 0;
            }       
       
  }

  public function viewretailer()
  {
    echo '<option value="">select retailer</option>';
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
                $retailers = $this->supper_admin->call_procedure('proc_vendor', $parameter);
                foreach ($retailers as $key => $value) {
                 echo '<option value="'.$value->s_admin_id.'"'; echo '>'.$value->s_username.'</option>';
                }
  } 

  public function updatevendor($id) {

      if($this->input->post('retailersubmit')) 
      {

         if($_FILES['fileToUpload']['name']!="")
        
    {
      
      $filename = $_FILES['fileToUpload']['name']; 


       move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],
                                 "assets/images/".$filename);
    }else{
      
     $filename= $this->input->post('fileToUploadhidden');
    }



        //$this->form_validation->set_rules('s_username','Vendor name','trim|required');
        //$this->form_validation->set_rules('s_mobileno','Contact number','trim|required');

        //if($this->form_validation->run() != false) {

               $parameter = array(

                        'act_mode' => 'updateretailer', 
                        'proc_s_username' => $this->input->post('s_username'),
                        'proc_emailid' => $this->input->post('s_loginemail'),
                        'proc_alertnatemail_id' => $this->input->post('Alternateemailid'),
                        'proc_country_id' => $this->input->post('countryid'),
                        'proc_state_id' =>$this->input->post('stateid'),
                        'proc_city_id' => $this->input->post('cityname'),
                        'proc_location' => $this->input->post('location'),
                        'proc_pincode' =>      $this->input->post('pincode'),
                        'proc_company_name' => $this->input->post('companyname'),
                        'proc_store_type' => $this->input->post('storetype'),
                        'proc_ownder_name' => $this->input->post('owndername'),
                        'proc_store_name' => $this->input->post('storename'),
                      
                        'proc_Company_Address' =>$this->input->post('companyaddress'),
                        'proc_pan_card_no' =>$this->input->post('pancard'),
                        'proc_service_tax_no' =>$this->input->post('servicetax'),
                        'proc_visiting_card' =>'',//$this->input->post('visitingcard'),
                        'proc_retailer_uniqueid'=>'',
                        'proc_retailer_login_id' =>'',
                        'proc_account_h_name' =>$this->input->post('accountholder'),
                        'proc_account_h_number' =>$this->input->post('accountnumber'),
                        'proc_ifsc_code'=>$this->input->post('ifscode'),
                        'proc_branch_name' =>$this->input->post('branchname'),
                        'proc_bank_details' =>$this->input->post('bankname'),
                        'proc_document_rec_date'=>$this->input->post('docrecdate'),
                        'proc_ratiler_enrol_date' =>$this->input->post('retailerrenroldate'),
                        'proc_aggre_sing_date'=>$this->input->post('agrementsigndate'),
                        'proc_profile_pic'=>$filename,
                        'proc_password' => md5($this->input->post('s_loginpassword')),
                        'p_ramemplid' => $this->input->post('ramname'),
                        'p_rambranname' => $this->input->post('rambranckbankname'),
                        'p_ramoffiialid' => $this->input->post('ramofficialid'),
                        'p_ramcontactno' => $this->input->post('ramcontactno'),
                        'row_id' => $id,
                        'contact_no' => $this->input->post('s_mobileno'),
                        'Param8' => '',
                        'Param9' => '',
                        'Param10' => ''
                        
                   );



               //p($parameter); exit;

              $response = $this->supper_admin->call_procedure('proc_retailerreg', $parameter);
              
            

        
            





              $this->session->set_flashdata('message', 'Your information has been updated successfully!');
              redirect("admin/adminvender/viewretailerlist");
        //}
      }


      if($this->input->post('storeupdate')) 
      { 

        foreach ($this->input->post( 'storeupdatess') as $key => $value) {  

           //for ($i=count($this->input->post( 'storeupdatess')); $i <= count($this->input->post( 'storeupdatess')); $i++) { 
             # code...
           
            

               $parameter1 = array(

                        'act_mode' => 'updaterestaurant', 
                        'row_id' => $value,
                        'param1' => '',
                        'param2' => $this->input->post('manager_'.$value),
                        'param3' => $this->input->post('r_res_name_'.$value),
                        'param4' => 2,
                        'param5' => $this->input->post('r_res_desc_'.$value)  ,
                        'param6' => '',
                        'param7' => '',
                        'param8' => $this->input->post('country_id_'.$value),
                        'param9' => $this->input->post('res_address_'.$value),
                        'param10' => $this->input->post('state_id_'.$value),
                        'param11' => $this->input->post('res_latitude_'.$value),
                        'param12' => $this->input->post('res_longitude_'.$value),
                        'param13' => $this->input->post('locationid_'.$value),
                        'param14' => $this->input->post('res_pin_'.$value),
                        'param15' => $this->input->post('city_id_'.$value),
                        'param16' => $this->input->post('street_id_'.$value)
                      );

              
               $return1 = $this->supper_admin->call_procedureRow('proc_general', $parameter1);

                


        }

        /*foreach ($this->input->post( 'storeupdatess') as $key => $value) {
          //p($value1);

          $parameter2 = array(
                                    'act_mode' => 'updatelocation', 
                                    'v_id' => $this->input->post('country_id_'.$value),
                                    'v_status' => $this->input->post('res_address_'.$value),
                                    'v_mobile' => $this->input->post('state_id_'.$value),
                                    'v_email' => $this->input->post('res_latitude_'.$value),
                                    'v_pwd' => $this->input->post('res_longitude_'.$value),
                                    'tin_no' => $this->input->post('locationid_'.$value),
                                    'tax_no' => $this->input->post('res_pin_'.$value),
                                    'bank_name' => '',
                                    'bank_addr' => '',
                                    'ifsc_code' => 0,
                                    'bene_accno' => 0,
                                    'param1' => $this->input->post('city_id_'.$value),
                                    'param2' => $this->input->post('street_id_'.$value)
                                  );
                $return2 = $this->supper_admin->call_procedureRow('proc_vendor', $parameter2);
                          
                  

        }
*/
          //redirect(base_url().'admin/vendor/viewvendors');
exit;


          
           


      }

       $parameter = array(
                        'act_mode' => 'fetchvendordetaill', 
                        'proc_s_username' => '',
                        'proc_emailid' => '',
                        'proc_alertnatemail_id' => '',
                        'proc_country_id' => '',
                        'proc_state_id' => '',
                        'proc_city_id' => '',
                        'proc_location' => '',
                        'proc_pincode' => '',
                        'proc_company_name' => '',
                        'proc_store_type' => '',
                        'proc_ownder_name' => '',
                        'proc_store_name' => '',
                        'proc_Company_Address' =>'',
                        'proc_pan_card_no' =>'',
                        'proc_service_tax_no' =>'',
                        'proc_visiting_card' =>'',
                        'proc_retailer_uniqueid'=>'',
                        'proc_retailer_login_id' =>'',
                        'proc_account_h_name' =>'',
                        'proc_account_h_number' =>'',
                        'proc_ifsc_code'=>'',
                        'proc_branch_name' =>'',
                        'proc_bank_details' =>'',
                        'proc_document_rec_date'=>'',
                        'proc_ratiler_enrol_date' =>'',
                        'proc_aggre_sing_date'=>'',
                        'proc_profile_pic'=>'',
                        'proc_password' => '',
                        'p_ramemplid' => '',
                        'p_rambranname' => '',
                        'p_ramoffiialid' => '',
                        'p_ramcontactno' => '',
                        'row_id' => $id,
                        'contact_no' => '',
                        'Param8' => '',
                        'Param9' => '',
                        'Param10' => ''
                        
                      
                      


                      );




      //p($parameter); exit;
      $response['vieww'] = $this->supper_admin->call_procedureRow('proc_retailerreg', $parameter);
      
       //p($response['vieww']);

      $parameter1 = array('act_mode'=>'viewcountry','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
      $response['vieww1'] = $this->supper_admin->call_procedure('proc_geographic',$parameter1);
    


      $parameter2 = array('act_mode'=>'viewstate','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
      $response['state'] = $this->supper_admin->call_procedure('proc_geographic',$parameter2);

      $parameter3 = array('act_mode'=>'citygview','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
      $response['cityview'] = $this->supper_admin->call_procedure('proc_geographic',$parameter3);

      $parameter3 = array('act_mode'=>'viewlocation','row_id'=>'','counname'=>'','coucode'=>'','commid'=>'');
      $response['viewlocation'] = $this->supper_admin->call_procedure('proc_geographic',$parameter3);


     //p($response['viewlocation']); exit;

      $parameter11 = array(
                        'act_mode' => 'liststoretype', 
                        'v_id' => '',
                        'counname' => '',
                        'coucode' => '',
                        'commid' => ''
                        
                      );
      

    
     $response['storetype'] = $this->supper_admin->call_procedure('proc_master', $parameter11);

     // $ram = array(
     //                    'act_mode' => 'viewram', 
     //                    'v_id' => 5,
     //                    'v_status' => '',
     //                    'v_mobile' => '',
     //                    'v_email' => '',
     //                    'v_pwd' => '',
     //                    'tin_no' => '',
     //                    'tax_no' => '',
     //                    'bank_name' => '',
     //                    'bank_addr' => '',
     //                    'ifsc_code' => '',
     //                    'bene_accno' => '',
     //                    'param1' => '',
     //                    'param2' => ''
     //                  );
      

    
     // $response['ram'] = $this->supper_admin->call_procedure('proc_vendor', $ram);

     $parameter21 = array(
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
      $response['ram'] = $this->supper_admin->call_procedure('proc_procedure5', $parameter21);




   

      $this->load->view('helper/header');
      $this->load->view('vendor/updatevendor',$response);
  } 

public function add_deal(){
    //$this->userfunction->loginAdminvalidation();
    if($this->input->post('submit')){

     // Validation form fields.
     $this->form_validation->set_rules('typedeal_name','type deal Name','trim|required|xss_clean');

     if($this->form_validation->run() != false){
      $typedeal= $this->input->post('typedeal_name');
      //$userid          = $this->session->userdata('bizzadmin')->LoginID;
      $parameter= array(
        'act_mode'=>'dealexit',
        'row_id'=>'',
        'p_name'=>$typedeal,
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
        );
      $record['record']= $this->supper_admin->call_procedureRow('typedeal',$parameter);
      //$record['record']= $this->supper_admin->call_procedureRow('proc_attribute',$parameter);
    
      //p($record['record']); exit;
//if(empty($data['vieww']))
      if(empty($record['record'])){
         $parameter= array(
        'act_mode'=>'dealinsert',
        'row_id'=>'',
        'p_name'=>$typedeal,
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
        );
           //p($parameter); exit;

          $record['record']= $this->supper_admin->call_procedureInsert('typedeal',$parameter);
          
          $this->session->set_flashdata("message", "Your information has been saved successfully!");
          redirect("admin/vendor/view_dealtype");

      }
      else{
            
        $this->session->set_flashdata("message", "Name Already Exists");
        redirect("admin/vendor/view_dealtype");
       
      }
     }
    }//if submit
  
    $this->load->view('helper/header');
    $this->load->view('helper/sidebar');
    $this->load->view('vendor/add_deal');
    $this->load->view('helper/footer');
  }//End function.
   public function view_dealtype() {

      $parameter = array(

        'act_mode'=>'list_typedeal',
        'row_id'=>'',
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      );
      $response['vieww'] = $this->supper_admin->call_procedure('typedeal', $parameter);
      //pend($response['vieww']);

      $this->load->view('helper/header');
      $this->load->view('helper/sidebar');
      $this->load->view('vendor/viewdeal', $response);
      $this->load->view('helper/footer');
  }

 public function delete_typedeal($id) {

      $parameter = array(

        'act_mode'=>'delet_typedeal',
        'row_id'=>$id,
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      );
      $response['vieww'] = $this->supper_admin->call_procedure('typedeal', $parameter);

      $this->session->set_flashdata('message', 'Record has been deleted successfully!');
      redirect("admin/vendor/view_dealtype");
  } 

public function add_category(){
    //$this->userfunction->loginAdminvalidation();
    if($this->input->post('submit')){

     // Validation form fields.
     $this->form_validation->set_rules('categorydeal_name','type deal Name','trim|required|xss_clean');

     if($this->form_validation->run() != false){
      $typedeal= $this->input->post('categorydeal_name');
      $icon= $this->input->post('catogary_Icon');
      //$userid          = $this->session->userdata('bizzadmin')->LoginID;
      $parameter= array(
        'act_mode'=>'categoryexit',
        'row_id'=>'',
        'p_name'=>$typedeal,
        'Param4'=>$icon,
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
        );
      $record['record']= $this->supper_admin->call_procedureRow('typedeal',$parameter);
      //$record['record']= $this->supper_admin->call_procedureRow('proc_attribute',$parameter);
    
      //p($record['record']); exit;
//if(empty($data['vieww']))
      if(empty($record['record'])){
         $parameter= array(
        'act_mode'=>'categoryinsert',
        'row_id'=>'',
        'p_name'=>$typedeal,
        'Param4'=>$icon,
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
        );
           //p($parameter); exit;

          $record['record']= $this->supper_admin->call_procedureInsert('typedeal',$parameter);
          
          $this->session->set_flashdata("message", "Your information has been saved successfully!");
          redirect("admin/vendor/viewcatogary");

      }
      else{
            
        $this->session->set_flashdata("message", "Catogary Name Already Exists");
        redirect("admin/vendor/viewcatogary");
       
      }
     }
    }//if submit
  
    $this->load->view('helper/header');
    $this->load->view('helper/sidebar');
    $this->load->view('vendor/add_dealcategory');
    $this->load->view('helper/footer');
  }//End function.viewcatogary
  public function viewcatogary() {

      $parameter = array(

        'act_mode'=>'listcategory',
        'row_id'=>'',
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      );
      $response['vieww'] = $this->supper_admin->call_procedure('typedeal', $parameter);
      //pend($response['vieww']);

      $this->load->view('helper/header');
      $this->load->view('helper/sidebar');
      $this->load->view('vendor/viewcatogary', $response);
      $this->load->view('helper/footer');
  }

 public function statuscatogery($id,$status) {

      $act_mode = $status=='Active'?'categoreydeactive':'categoreyactive'; 
      $parameter = array(
                        'act_mode' => $act_mode, 
                        'row_id' => $id,
                        'p_name' => '',
                        'Param4' => '',
                        'Param5' => '',
                        'Param6' => '',
                        'Param7' => ''
                      );
      $response = $this->supper_admin->call_procedure('typedeal', $parameter);

      $this->session->set_flashdata('message', 'Status has been changed successfully!');
      redirect("admin/vendor/viewcatogary");
  } 
public function deletcategory($id) {

      $parameter = array(

        'act_mode'=>'deletecatogary',
        'row_id'=>$id,
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      );
      $response['vieww'] = $this->supper_admin->call_procedure('typedeal', $parameter);

      $this->session->set_flashdata('message', 'Record has been deleted successfully!');
      redirect("admin/vendor/viewcatogary");
  } 
  public function updatecatogeery($id) {

      if($this->input->post('submit')) 
      {
        $this->form_validation->set_rules('categorydeal_name','catogery name','trim|required');
        $this->form_validation->set_rules('catogary_Icon','catogery Icon','trim|required');

        if($this->form_validation->run() != false) {

              $parameter = array(
                        'act_mode' => 'updatecatogery', 
                        'row_id' => $id,
                        'p_name' => $this->input->post('categorydeal_name'),
                        'Param4' => $this->input->post('catogary_Icon'),
                        'Param5' => '',
                        'Param6'=>'',
                        'Param7'=>''
                        
                      );
              $return = $this->supper_admin->call_procedure('typedeal', $parameter);

              $this->session->set_flashdata('message', 'Your information has been updated successfully!');
              redirect("admin/vendor/viewcatogary");
        }
      }
      $parameter = array(
                        'act_mode' =>'fetchcatogery', 
                        'row_id' =>$id,
                        'p_name' =>'',
                        'Param4' =>'',
                        'Param5' =>'',
                        'Param6'=>'',
                        'Param7'=>''
                      );
      $response['vieww'] = $this->supper_admin->call_procedureRow('typedeal', $parameter);

      $this->load->view('helper/header');
      $this->load->view('vendor/updatecategory',$response);
  }
   

   public function demoaddvendor()
   {
     

      if($this->input->post('retailersubmit')) 
      {
         

          $filename1 = $_FILES['fileToUpload']['name']; 


          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],
                                 "assets/images/".$filename1);
       
     
           $this->form_validation->set_rules('s_username','Vendor name','trim|required');
        
            $this->form_validation->set_rules('s_loginemail','Email','trim|required');
            $this->form_validation->set_rules('countryid','Country','trim|required');
            $this->form_validation->set_rules('stateid','State','trim|required');
           $this->form_validation->set_rules('cityname','City ','trim|required');
          

         $this->form_validation->set_rules('s_loginpassword','Password','trim|required');
         $this->form_validation->set_rules('s_mobileno','Contact','trim|required');
         
        
          $this->form_validation->set_rules('companyname','Compant Name','trim|required');
         
           $this->form_validation->set_rules('owndername','Owner Name','trim|required');
          $this->form_validation->set_rules('storename','Store Name','trim|required');
         $this->form_validation->set_rules('companyaddress','Company Address','trim|required');
            
          $this->form_validation->set_rules('accountholder','monthly billing','required');
          $this->form_validation->set_rules('accountnumber','account holer name','trim|required');
          $this->form_validation->set_rules('ifscode','pan card number','trim|required');
         


        $this->form_validation->set_rules('barnchname','ifso code','trim|required');
     // $this->form_validation->set_rules('bankdetails','pick day week','trim|required');
       


         
               
       $this->form_validation->set_rules('retailerrenroldate','Bank name','trim|required');
          

        $this->form_validation->set_rules('agrementsigndate','bank address','trim|required');
        














        if($this->form_validation->run() != false) {


    //echo  "7".$filename1; exit;

            $parameter = array(
                        'act_mode' => 'checkvendor', 
                        'proc_s_username' => $this->input->post('s_username'),
                        'proc_emailid' => $this->input->post('s_loginemail'),
                        'proc_alertnatemail_id' => '',
                        'proc_country_id' => '',
                        'proc_state_id' => '',
                        'proc_city_id' => '',
                        'proc_location' => '',
                        'proc_pincode' => '',
                        'proc_company_name' => '',
                        'proc_store_type' => '',
                        'proc_ownder_name' => '',
                        'proc_store_name' => '',
                      
                        'proc_Company_Address' =>'',
                        'proc_pan_card_no' =>'',
                        'proc_service_tax_no' =>'',
                        'proc_visiting_card' =>'',
                        'proc_retailer_uniqueid'=>'',
                        'proc_retailer_login_id' =>'',
                        'proc_account_h_name' =>'',
                        'proc_account_h_number' =>'',
                        'proc_ifsc_code'=>'',
                        'proc_branch_name' =>'',
                        'proc_bank_details' =>'',
                        'proc_document_rec_date'=>'',
                        'proc_ratiler_enrol_date' =>'',
                        'proc_aggre_sing_date'=>'',
                        'proc_profile_pic'=>'',
                        'proc_password' => '',
                        'p_ramemplid' => '',
                        'p_rambranname' => '',
                        'p_ramoffiialid' => '',
                        'p_ramcontactno' => '',
                        'Param6' => '',
                        'Param7' => '',
                        'Param8' => '',
                        'Param9' => '',
                        'Param10' => ''
                        
                      
                      


                      );


             $record['record'] = $this->supper_admin->call_procedureRow('proc_retailerreg', $parameter);

          
            if(!empty($record['record'])){
              

              $parameter = array(

                        'act_mode' => 'retaileradd', 
                        'proc_s_username' => $this->input->post('s_username'),
                        'proc_emailid' => $this->input->post('s_loginemail'),
                        'proc_alertnatemail_id' => $this->input->post('Alternateemailid'),
                        'proc_country_id' => $this->input->post('countryid'),
                        'proc_state_id' =>$this->input->post('stateid'),
                        'proc_city_id' => $this->input->post('cityname'),
                        'proc_location' => '',//$this->input->post('s_username'),
                        'proc_pincode' =>      $this->input->post('pincode'),
                        'proc_company_name' => $this->input->post('companyname'),
                        'proc_store_type' => $this->input->post('s_username'),
                        'proc_ownder_name' => $this->input->post('owndername'),
                        'proc_store_name' => $this->input->post('storename'),
                      
                        'proc_Company_Address' =>$this->input->post('companyaddress'),
                        'proc_pan_card_no' =>$this->input->post('pancard'),
                        'proc_service_tax_no' =>$this->input->post('servicetax'),
                        'proc_visiting_card' =>'',//$this->input->post('visitingcard'),
                        'proc_retailer_uniqueid'=>'',
                        'proc_retailer_login_id' =>'',
                        'proc_account_h_name' =>$this->input->post('accountholder'),
                        'proc_account_h_number' =>$this->input->post('accountnumber'),
                        'proc_ifsc_code'=>$this->input->post('ifscode'),
                        'proc_branch_name' =>$this->input->post('barnchname'),
                        'proc_bank_details' =>$this->input->post('bankdetails'),
                        'proc_document_rec_date'=>$this->input->post('docrecdate'),
                        'proc_ratiler_enrol_date' =>$this->input->post('retailerrenroldate'),
                        'proc_aggre_sing_date'=>$this->input->post('agrementsigndate'),
                        'proc_profile_pic'=>$filename1,
                        'proc_password' => md5($this->input->post('s_loginpassword')),
                        'p_ramemplid' => $this->input->post('ramemployeeid'),
                        'p_rambranname' => $this->input->post('rambranckbankname'),
                        'p_ramoffiialid' => $this->input->post('ramofficialid'),
                        'p_ramcontactno' => $this->input->post('ramcontactno'),
                        'row_id' => '',
                        'contact_no' => $this->input->post('s_mobileno'),
                        'Param8' => '',
                        'Param9' => '',
                        'Param10' => ''
                        
                   );


              //p($parameter); exit;

             $response = $this->supper_admin->call_procedureInsert('proc_retailerreg', $parameter);
              $this->session->set_flashdata('message', 'Your information has been saved successfully!');
              redirect("admin/vendor/viewvendors");


            } else { 

              $this->session->set_flashdata('message', 'This vendor already exists!');
              redirect("admin/vendor/viewvendors");
             
          }
        }
      }
          

    
       $stateid   = $this->input->post('stateid');
     $cityname  = $this->input->post('cityname');
     $parameter = array(
      'act_mode'=>'cityinsert',
      'row_id'=>$stateid,
      'counname'=>$cityname,
      'coucode'=>'',
      'commid'=>''
      );
     $response  = $this->supper_admin->call_procedure('proc_geographic',$parameter);
  
     $parameter= array(
      'act_mode'=>'viewcountry',
      'row_id'=>'',
      'counname'=>'',
      'coucode'=>'',
      'commid'=>''
      );
     $response['vieww'] = $this->supper_admin->call_procedure('proc_geographic',$parameter);
    
    $parameter = array(
        'act_mode'=>'listcategory',
        'row_id'=>'',
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      );
      $response['viewww'] = $this->supper_admin->call_procedure('typedeal', $parameter);

       $parameter = array(
        'act_mode'=>'select_usertype',
        'row_id'=>'',
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      );
      $response['vieww2'] = $this->supper_admin->call_procedure('typedeal', $parameter);


      $rowid1 =  $this->session->userdata('popcoin_login')->s_admin_id; 
      if($rowid1!='')
      {
          $rowid = $this->session->userdata('popcoin_login')->s_admin_id;
      }else{
          $rowid = 0;
      }

       $parameter1 = array(
        'act_mode'=>'select_usertypevalue',
        'row_id'=>$rowid,
        'p_name'=>'',
        'Param4'=>'',
        'Param5'=>'',
        'Param6'=>'',
        'Param7'=>''
                      );

      //p($parameter1); exit;
      //$response['vieww3'] = $this->supper_admin->call_procedure('typedeal', $parameter1);
      //p($response['vieww3']);
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
      

  
     // $response['manager'] = $this->supper_admin->call_procedure('proc_vendor', $parameter);
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
      //$response['countries'] = $this->supper_admin->call_procedure('proc_general', $parameter);

      $this->load->view('helper/header');
      $this->load->view('vendor/addnewvendor',$response);
  

   }


   public function viewretailerlist()
   {

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


      p($response['vieww']); exit;

      } 

     
      $this->load->view('helper/header');
      $this->load->view('vendor/retailerlisting', $response);


   }

    public function sretailerlist()
   {


       $parameter = array(
                        'act_mode' => 'onlyretailerlist', 
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

      //p($response['vieww']); exit;

      $this->load->view('helper/header');
      $this->load->view('vendor/retailerlisting', $response);


   }



   public function updateretailerstatus($id,$status) {

     //p($_POST); exit;

      $act_mode = $status=='1'?'retailerdeactive':'retaileractive'; 
     

      $parameter = array(
                        'act_mode' => $act_mode, 
                        'row_id' => $id,
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

      //p($parameter); exit;
      
      $response = $this->supper_admin->call_procedure('proc_store', $parameter);

      $this->session->set_flashdata('message', 'Status has been changed successfully!');
      redirect("admin/adminvender/viewretailerlist");
  } 



  public function retailerstoreview($id)
  {

     


     $parameter = array(
                        'act_mode' => 'viewretailerstore', 
                        'row_id' => $id,
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






        


     
      $response['vieww'] = $this->supper_admin->call_procedure('proc_store ', $parameter);
      

      //p($response['vieww']); exit;
       $this->load->view('helper/header');
       $this->load->view('vendor/viewstores',$response);

  }


public function getraminfo()
  {

     


     $parameter = array(
                        'act_mode' => 'viewram', 
                        'proc_s_username' => '',
                        'proc_emailid' => '',
                        'proc_alertnatemail_id' => '',
                        'proc_country_id' => $this->input->post('ramid'),
                        'proc_state_id' => '',
                        'proc_city_id' => '',
                        'proc_location' => '',
                        'proc_pincode' => '',
                        'proc_company_name' => '',
                        'proc_store_type' => '',
                        'proc_ownder_name' => '',
                        'proc_store_name' => '',                      
                        'proc_Company_Address' =>'',
                        'proc_pan_card_no' =>'',
                        'proc_service_tax_no' =>'',
                        'proc_visiting_card' =>'',
                        'proc_retailer_uniqueid'=>'',
                        'proc_retailer_login_id' =>'',
                        'proc_account_h_name' =>'',
                        'proc_account_h_number' =>'',
                        'proc_ifsc_code'=>'',
                        'proc_branch_name' =>'',
                        'proc_bank_details' =>'',
                        'proc_document_rec_date'=>'',
                        'proc_ratiler_enrol_date' =>'',
                        'proc_aggre_sing_date'=>'',
                        'proc_profile_pic'=>'',
                        'proc_password' => '',
                        'p_ramemplid' => '',
                        'p_rambranname' => '',
                        'p_ramoffiialid' => '',
                        'p_ramcontactno' => '',
                        'Param6' => '',
                        'Param7' => '',
                        'Param8' => '',
                        'Param9' => '',
                        'Param10' => ''


                      );

     
      $response['vieww'] = $this->supper_admin->call_procedureRow('proc_retailerreg ', $parameter);

   echo json_encode($response['vieww']); 

  }

  public function reatailerlistextra($id)
  {
    $parameter = array(
                        'act_mode' => 'fetchvendordetaillextra', 
                        'proc_s_username' => '',
                        'proc_emailid' => '',
                        'proc_alertnatemail_id' => '',
                        'proc_country_id' => '',
                        'proc_state_id' => '',
                        'proc_city_id' => '',
                        'proc_location' => '',
                        'proc_pincode' => '',
                        'proc_company_name' => '',
                        'proc_store_type' => '',
                        'proc_ownder_name' => '',
                        'proc_store_name' => '',
                        'proc_Company_Address' =>'',
                        'proc_pan_card_no' =>'',
                        'proc_service_tax_no' =>'',
                        'proc_visiting_card' =>'',
                        'proc_retailer_uniqueid'=>'',
                        'proc_retailer_login_id' =>'',
                        'proc_account_h_name' =>'',
                        'proc_account_h_number' =>'',
                        'proc_ifsc_code'=>'',
                        'proc_branch_name' =>'',
                        'proc_bank_details' =>'',
                        'proc_document_rec_date'=>'',
                        'proc_ratiler_enrol_date' =>'',
                        'proc_aggre_sing_date'=>'',
                        'proc_profile_pic'=>'',
                        'proc_password' => '',
                        'p_ramemplid' => '',
                        'p_rambranname' => '',
                        'p_ramoffiialid' => '',
                        'p_ramcontactno' => '',
                        'row_id' => $id,
                        'contact_no' => '',
                        'Param8' => '',
                        'Param9' => '',
                        'Param10' => ''
                      );

      //p($parameter); exit;
      $response['vieww'] = $this->supper_admin->call_procedureRow('proc_retailerreg', $parameter);
      $this->load->view('helper/header');
       $this->load->view('vendor/viewretailer',$response);
  }



}