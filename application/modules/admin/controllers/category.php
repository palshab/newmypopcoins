<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Category extends MX_Controller{

 public function __construct() {
    $this->load->model("supper_admin");
    $this->load->helper('my_helper');
    $this->load->library('upload');
    $this->load->library('PHPExcel');
    $this->load->library('PHPExcel_IOFactory');
    $this->userfunction->loginAdminvalidation();

 }//End function


//............. Add New Category ............... //
public function add_category(){
  	
    if($this->input->post('submit')){
    
		$cat_name = $this->input->post('category_name');
		$desc     = $this->input->post('cat_description');
		$curl     = $this->input->post('category_url');
		$mtitle   = $this->input->post('meta_title');
		$mdesc    = $this->input->post('meta_desc');
		$mkey     = $this->input->post('meta_keywords');
		$cshort   = $this->input->post('cat_level');
		$ccheck   = $this->input->post('cbcheck');
		$catlevel = $this->input->post('parent_category');
    $cat_logo = $_FILES['cat_logo']['name'];
  	$categorytypenew = $this->input->post('newcattype');

    if(preg_match("/([%\$#\*-_^]+)/", $curl))
    {
      $this->session->set_flashdata("message", "Special characters are not allowed in category URL field!");
     redirect("admin/category/add_category");
    }

/*$parame = array(

	$cat_name => $this->input->post('category_name'),
		$desc     => $this->input->post('cat_description'),
		$curl     => $this->input->post('category_url'),
		$mtitle   => $this->input->post('meta_title'),
		$mdesc    => $this->input->post('meta_desc'),
		$mkey     => $this->input->post('meta_keywords'),
		$cshort   => $this->input->post('cat_level'),
		$ccheck   => $this->input->post('cbcheck'),
		$catlevel => $this->input->post('parent_category')
    	#$cat_logo => $_FILES['cat_logo']['name']




	);

p($parame); exit;*/


    /*$cat_ban1 = $_FILES['cat_ban1']['name'];
    $cat_ban2 = $_FILES['cat_ban2']['name'];
    $cat_ban3 = $_FILES['cat_ban3']['name'];*/
    //echo "logo = ".$cat_logo."<br>Catban1 = ".$cat_ban1."<br>Catban2 = ".$cat_ban2."<br>Catban3 = ".$cat_ban3;exit();

		//$userid   = $this->session->userdata('bizzadmin')->LoginID;
     //if(isset($catlevel) && ($catlevel < 1)){
     if(empty($catlevel)){
        $parentid = $catlevel;
        $level    = 0;
     } 
     else{
	     $catll     = explode("-",$catlevel);
	     $parentid  = $catll[0];
	     $level     = $catll[1]+1;
     }
     
     //if(isset($catlevel)){
     if(empty($catlevel)){

     $parameter        = array('act_mode'=>'catcheck','row_id'=>'','catparentid'=>'','cname'=>$cat_name,'cdesc'=>'','caturl'=>'','catmeta'=>'','metadesc'=>'','metakeyword'=>'','catsort'=>'','catdisplay'=>'','catlevel'=>'');
	   $record['record'] = $this->supper_admin->call_procedureRow('proc_category',$parameter);
     } else {

      $chcatll     = explode("-",$catlevel);
      $chparentid  = $chcatll[0];
      $chlevel     = $chcatll[1]+1;
      $parameter1        = array('act_mode'=>'parcatcheck','row_id'=>'','catparentid'=>'','cname'=>$chparentid,'cdesc'=>'','caturl'=>'','catmeta'=>'','metadesc'=>'','metakeyword'=>'','catsort'=>'','catdisplay'=>'','catlevel'=>'');
     $record['par_record'] = $this->supper_admin->call_procedure('proc_category',$parameter1);
     //p($record['par_record']);exit;

     foreach ($record['par_record'] as $key => $value) {
      $parameter        = array('act_mode'=>'childcatcheck','row_id'=>'','catparentid'=>$value->childid,'cname'=>$cat_name,'cdesc'=>'','caturl'=>'','catmeta'=>'','metadesc'=>'','metakeyword'=>'','catsort'=>'','catdisplay'=>'','catlevel'=>'');
     $record['record'] = $this->supper_admin->call_procedureRow('proc_category',$parameter);
     //p($record['caterecord']->attcount);
     if($record['record']->attcount>0){
     $this->session->set_flashdata("message", "Category Already Exists");
     redirect("admin/category/add_category");
     } // end if
     } //end foreach
     } //end else

    if($record['record']->attcount>0){
     $this->session->set_flashdata("message", "Category Already Exists");
     redirect("admin/category/add_category");
    }
    else{

		  $parameter     =   array(

                    		  'act_mode'   => 'catinsert',
                    		  'row_id'     => $categorytypenew,
                    		  'catparentid'=> $parentid,
                    		  'cname'      => $cat_name,
                    		  'cdesc'      => $desc,
                    		  'caturl'     => $curl,
                    		  'catmeta'    => $mtitle,
                    		  'metadesc'   => $mdesc,
                    		  'metakeyword'=> $mkey,
                    		  'catsort'    => $cshort,
                    		  'catdisplay' => $ccheck,
                    		  'catlevel'   => $level
                        );
    // p($parameter);
		
  	$record['record']  = $this->supper_admin->call_procedureRow('proc_category',$parameter);
  	//p($record['record']);exit();
    if(isset($catlevel) && ($catlevel < 1)){
      
      $field_catlogo  ='cat_logo';
      $field_catimg1  ='cat_ban1';
      $field_catimg2  ='cat_ban2';
      $field_catimg3  ='cat_ban3';
    
      $img_file1       = $this->image_upload($field_catlogo);
     /* $img_file2       = $this->image_upload($field_catimg1);
      $img_file3       = $this->image_upload($field_catimg2);
      $img_file4       = $this->image_upload($field_catimg3);*/

      $param    =    array(

                          'act_mode'      => 'catimginsert',
                          'row_id'        => '',
                          'catparentid'   => $record['record']->catlastid,
                          'catlogo'       => time().$cat_logo,
                          'catimgone'     => '',//time().$cat_ban1,
                          'catimgtwo'     => '',//time().$cat_ban2,
                          'catimgthree'   => '',//time().$cat_ban3,
                          'catstatus'     => ''
                          
                          );
      //p($param);exit;
      $record['recordimg']  = $this->supper_admin->call_procedureRow('proc_catimg',$param);
    }
    
    $this->session->set_flashdata("message", "Your information was successfully Saved.");
    redirect("admin/category/viewcategory");
  }
}	
	$parameter                 = array('act_mode'=>'catview','row_id'=>'','catparentid'=>'','cname'=>'','cdesc'=>'','caturl'=>'','catmeta'=>'','metadesc'=>'','metakeyword'=>'','catsort'=>'','catdisplay'=>'','catlevel'=>'');
	$response['parentCatdata'] = $this->supper_admin->call_procedure('proc_category',$parameter);
  
  $parameter                 = array('act_mode'=>'capview','row_id'=>'','catparentid'=>'','cname'=>'','cdesc'=>'','caturl'=>'','catmeta'=>'','metadesc'=>'','metakeyword'=>'','catsort'=>'','catdisplay'=>'','catlevel'=>'');
  $response['vie2w']         = $this->supper_admin->call_procedure('proc_category',$parameter);

  $parameter12                 = array(
                                      'act_mode'=>'categorytype',
                                      'row_id'=>'',
                                      'catparentid'=>'',
                                      'cname'=>'',
                                      'cdesc'=>'',
                                      'caturl'=>'',
                                      'catmeta'=>'',
                                      'metadesc'=>'',
                                      'metakeyword'=>'',
                                      'catsort'=>'',
                                      'catdisplay'=>'',
                                      'catlevel'=>''
                                      );
  $response['type']         = $this->supper_admin->call_procedure('proc_category',$parameter12);

//p($response['type']); exit;
	$this->load->view('helper/header');
  $this->load->view('helper/sidebar');
	$this->load->view('geographic/add_category',$response);	
  $this->load->view('helper/footer');

} //End function.


//............. Image Upload ............... //
  public function image_upload($field_name){

    $config['upload_path']    = './assets/catimages/';
    $config['allowed_types']  = 'jpg|jpeg|gif|png';
    $config['max_size']       = '10000000';
    $config['file_name']      = time().$_FILES[$field_name]['name'];
    
    $this->upload->initialize($config);

    if ( ! $this->upload->do_upload($field_name)){
        $data['error']       = array('error' => $this->upload->display_errors());
    } else {
        $data['name']        = array('upload_data' => $this->upload->data());
    }
    return $data;
  }

//............. View Category ............... //
public function viewcategory(){

	//----------------------multiple delete -------------------------------//
  $this->load->library('PHPExcel_IOFactory');
	//$this->userfunction->loginAdminvalidation();
  	if($this->input->post('submit')){
  	 foreach ($this->input->post( 'attdelete') as $key => $value) {
  	  $parameter         = array('act_mode'=>'cdelete','row_id'=>$value,'catparentid'=>'','cname'=>'','cdesc'=>'','caturl'=>'','catmeta'=>'','metadesc'=>'','metakeyword'=>'','catsort'=>'','catdisplay'=>'','catlevel'=>'');
	    $response['vieww'] = $this->supper_admin->call_procedure('proc_category',$parameter); 
  	 }
      $this->session->set_flashdata("message", "Your information was successfully delete.");
      redirect("admin/geographic/viewcategory");
  	 }

   //--------------------------multiple ststus ------------------------------//
  	if($this->input->post('submitstatus')){
     foreach ($this->input->post( 'attdelete') as $key => $value) {
       $status            = $this->input->post('attstatu')[$value];
       $act_mode          = $status=='A'?'activecat':'inactivecat';
  	   $parameter         = array('act_mode'=>$act_mode,'row_id'=>$value,'catparentid'=>'','cname'=>'','cdesc'=>'','caturl'=>'','catmeta'=>'','metadesc'=>'','metakeyword'=>'','catsort'=>'','catdisplay'=>'','catlevel'=>'');
	     $response['vieww'] = $this->supper_admin->call_procedure('proc_category',$parameter); 
  	  }
  	   $this->session->set_flashdata("message", "Your Status was successfully Updated.");
  	   redirect("admin/Geographic/viewcategory");
  	}
    
     
  	//-------------------------------end ----------------------------------------//
	  $parameter           = array('act_mode'=>'allview','row_id'=>'','catparentid'=>'','cname'=>'','cdesc'=>'','caturl'=>'','catmeta'=>'','metadesc'=>'','metakeyword'=>'','catsort'=>'','catdisplay'=>'','catlevel'=>'');
	  $response['vieww']   = $this->supper_admin->call_procedure('proc_category',$parameter); 
    
    //p($response['vieww']); exit;

    //----------------  Download Newsletter Excel ----------------------------//

      if(!empty($this->input->post('newsexcel')))
          {
           
           $finalExcelArr = array('Category Name','Parent Category','Category Description');
           $objPHPExcel = new PHPExcel();
           $objPHPExcel->setActiveSheetIndex(0);
           $objPHPExcel->getActiveSheet()->setTitle('Category Worksheet');
           $cols= array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
            $j=2;
            
         
            $objPHPExcel->getActiveSheet()->freezePane('A2');

         
            $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
                        
           for($i=0;$i<count($finalExcelArr);$i++){
            
           
            $objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setAutoSize(true);

     
            $objPHPExcel->getActiveSheet()->getStyle($cols[$i].'1')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '71B8FF')
                    ),
                      'font'  => array(
                      'bold'  => false,
                      'size'  => 15,
                      )
                )
            );

            $objPHPExcel->getActiveSheet()->setCellValue($cols[$i].'1', $finalExcelArr[$i]);

            foreach ($response['vieww'] as $key => $value) {
             
            $newvar = $j+$key;

         
            $objPHPExcel->getActiveSheet()->getRowDimension($newvar)->setRowHeight(20);
            
            $objPHPExcel->getActiveSheet()->setCellValue($cols[0].$newvar, $value->catname);
            $objPHPExcel->getActiveSheet()->setCellValue($cols[1].$newvar, $value->categoryname);
            $objPHPExcel->getActiveSheet()->setCellValue($cols[2].$newvar, $value->catdesc);
           
            }
          }

          $filename='Category.xls';
          header('Content-Type: application/vnd.ms-excel'); //mime type
          header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
          header('Cache-Control: max-age=0'); //no cache
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
          ob_end_clean();
          ob_start();  
          $objWriter->save('php://output');

         
          }
  
         // p($response['vieww']); exit;

     $config['base_url']         = base_url()."admin/category/viewcategory";
     $config['total_rows']       = count($response['vieww']);
     $config['per_page']         = 2;
     $config['use_page_numbers'] = TRUE;
    
     //p($config); exit;
    $this->pagination->initialize($config);
    
    $page = "";
     if(@$_GET['page']){
       $page         = $_GET['page']-1 ;
       $page         = ($page*50);
       $second       = $config['per_page'];
     }
     else{
       $page         = 0;
       $second       = $config['per_page'];

       // echo $page.'/'.$second; exit;
     }
     
     $str_links = $this->pagination->create_links();
    
      $response["links"]  = explode('&nbsp;',$str_links );
    
     
     $parameter           = array('act_mode'=>'allview_page','row_id'=>$page,'catparentid'=>'','cname'=>'','cdesc'=>'','caturl'=>'','catmeta'=>'','metadesc'=>'','metakeyword'=>'','catsort'=>$second,'catdisplay'=>'','catlevel'=>'');

  
     


     $response['vieww']   = $this->supper_admin->call_procedure('proc_category',$parameter);

   
    
    $this->load->view('helper/header');
    $this->load->view('helper/sidebar');
    $this->load->view('geographic/viewcategory',$response);

} //End function.

//............. Delete Category ............... //
public function categorydelete($id){
  
   $parameter           = array('act_mode'=>'cdelete','row_id'=>$id,'catparentid'=>'','cname'=>'','cdesc'=>'','caturl'=>'','catmeta'=>'','metadesc'=>'','metakeyword'=>'','catsort'=>'','catdisplay'=>'','catlevel'=>'');
	 $response['vieww']   = $this->supper_admin->call_procedure('proc_category',$parameter); 
   $this->session->set_flashdata("message", "Your information was successfully delete.");
   redirect("admin/category/viewcategory"); 	

} //End function.

//............. Change Category Status ............... //
public function categorystatus (){
	$rowid             = $this->uri->segment(4);
	$status            = $this->uri->segment(5);
	$act_mode          = $status=='A'?'activecat':'inactivecat';
	$parameter         = array('act_mode'=>$act_mode,'row_id'=>$rowid,'catparentid'=>'','cname'=>'','cdesc'=>'','caturl'=>'','catmeta'=>'','metadesc'=>'','metakeyword'=>'','catsort'=>'','catdisplay'=>'','catlevel'=>'');
	$response['vieww'] = $this->supper_admin->call_procedure('proc_category',$parameter); 
  $this->session->set_flashdata('message', 'Your Status was successfully Updated.');
	redirect(base_url().'admin/category/viewcategory');

} //End function.

//............. Category Update ............... //
public function categoryupdate($id){
  if($this->input->post('submit')){
  $cat_name  = $this->input->post('category_name');
	$desc      = $this->input->post('cat_description');
	$curl      = $this->input->post('category_url');
	$mtitle    = $this->input->post('meta_title');
	$mdesc     = $this->input->post('meta_desc');
	$mkey      = $this->input->post('meta_keywords');
	$cshort    = $this->input->post('cat_level');
	$ccheck    = $this->input->post('cbcheck');
	$catlevel  = $this->input->post('parent_category');
	$parameter = array(
              		  'act_mode'   => 'catupdate',
              		  'row_id'     => $id,
              		  'catparentid'=> '',
              		  'cname'      => $cat_name,
              		  'cdesc'      => $desc,
              		  'caturl'     => $curl,
              		  'catmeta'    => $mtitle,
              		  'metadesc'   => $mdesc,
              		  'metakeyword'=> $mkey,
              		  'catsort'    => $cshort,
              		  'catdisplay' => $ccheck,
              		  'catlevel'   => ''
                );
		
	$record['record']  = $this->supper_admin->call_procedureRow('proc_category',$parameter);
	$this->session->set_flashdata("message", "Your information was successfully Update.");
	redirect("admin/category/viewcategory");
  }	

  $parameter         = array('act_mode'=>'catupview','row_id'=>$id,'catparentid'=>'','cname'=>'','cdesc'=>'','caturl'=>'','catmeta'=>'','metadesc'=>'','metakeyword'=>'','catsort'=>'','catdisplay'=>'','catlevel'=>'');
  $response['vieww'] = $this->supper_admin->call_procedureRow('proc_category',$parameter);	
  
  $this->load->view('helper/header');
  $this->load->view('category/editcategory',$response);

}//End Function

//............. Category Level View ............... //
public function catviewlevel(){
  $catll             = explode("-",$this->input->post('catids'));
 
  $parameter         = array('act_mode'=>'childview','row_id'=>$catll[0],'catparentid'=>'','cname'=>'','cdesc'=>'','caturl'=>'','catmeta'=>'','metadesc'=>'','metakeyword'=>'','catsort'=>'','catdisplay'=>'','catlevel'=>'');
  $response['vieww'] = $this->supper_admin->call_procedure('proc_category',$parameter);  
  foreach ($response['vieww'] as $key => $value) {
    echo "<tr><td>".$value->catname."</td>
          <td>".$value->ordersort."</td></tr>";
  }
}

//............. Add Brand ............... //
public function addbrand(){
  $this->userfunction->loginAdminvalidation();	
  if($this->input->post('submit')){

    $bname        = $this->input->post('bname');
    $video_img    = $_FILES['video_img']['name'];
    $userid       = $this->session->userdata('bizzadmin')->LoginID;
    $allowedExts  = array("gif", "jpeg", "jpg", "png");
    $temp         = explode(".",$video_img);
    $extension    = end($temp);

    if ((($_FILES["video_img"]["type"]  == "image/gif")
		  || ($_FILES["video_img"]["type"]  == "image/jpeg")
		  || ($_FILES["video_img"]["type"]  == "image/jpg")
		  || ($_FILES["video_img"]["type"]  == "image/pjpeg")
		  || ($_FILES["video_img"]["type"]  == "image/x-png")
		  || ($_FILES["video_img"]["type"]  == "image/png"))
		  && ($_FILES["video_img"]["size"]  < 90000000)
		  && in_array($extension, $allowedExts)) {
        if ($_FILES["video_img"]["error"] > 0) {
              echo "Return Code: " . $_FILES["video_img"]["error"] . "<br>";
        } 
        else{
              $label    = time();
              $filename = $label.$video_img;
              $filename = preg_replace("/[^a-zA-Z0-9.]/", "", $filename);
              if (file_exists("imagefiles/brandimages/".$filename)) {
                  $this->session->set_flashdata('message', 'Image already exists');
                  redirect('admin/category/addbrand');
              }else{
                  move_uploaded_file($_FILES["video_img"]["tmp_name"],"imagefiles/brandimages/".$filename);
    		          $parameter        = array('act_mode'=>'brandcheck','row_id'=>'','brandname'=>$bname,'brandimage'=>'','');
    		          $record['record'] = $this->supper_admin->call_procedureRow('proc_brand',$parameter);
    		          
              if($record['record']->attcount>0){
		            $this->session->set_flashdata("message", "Brand Already Exists");
		            redirect("admin/category/addbrand");
		          }
		          $parameter = array(
                             'act_mode'  =>'insert',
                             'row_id'    =>$userid,
                             'brandname' =>$bname,
                             'brandimage'=>$filename,
                             'catid'     =>''
                          );
              $record    = $this->supper_admin->call_procedure('proc_brand',$parameter);
              $this->session->set_flashdata('message', 'Your information was successfully Saved.');
              redirect('admin/category/viewbrand');
          } // end else
        } // end else 2
      } // end image tag
     else{ 
     	  $parameter        = array('act_mode'=>'brandcheck','row_id'=>'','brandname'=>$bname,'brandimage'=>'','');
        $record['record'] = $this->supper_admin->call_procedureRow('proc_brand',$parameter);
        if($record['record']->attcount > 0){
            $this->session->set_flashdata("message", "Brand Already Exists");
            redirect("admin/category/addbrand");
        }
     	      $parameter = array(
                           'act_mode'  => 'insert',
                           'row_id'    => $userid,
                           'brandname' => $bname,
                           'brandimage'=> '',
                           'catid'     => ''
                         );

            $record   = $this->supper_admin->call_procedure('proc_brand',$parameter);
            $this->session->set_flashdata('message', 'Your information was successfully Saved.');
            redirect('admin/category/viewbrand');
       }
  }
  	
  $this->load->view('helper/header');
  $this->load->view('brand/addbrand',$responce);

} //End function.


//............. Add view Brand ............... //
public function viewbrand(){
   

      $brandid = $this->uri->segment('4');
      if($brandid=='')
      {
        $id = ''; 
      }else{
        $id = $brandid ;
      }

     
	//----------------------multiple delete -------------------------------//
	  	if($this->input->post('submit')){
  	 foreach ($this->input->post( 'attdelete') as $key => $value) {
  	  $parameter         = array('act_mode'=>'delete','row_id'=>$value,'brandname'=>'','brandimage'=>'','');
      $response['vieww'] = $this->supper_admin->call_procedure('proc_brand',$parameter); 
  	 }
      $this->session->set_flashdata("message", "Your information was successfully delete.");
      redirect("admin/category/viewbrand");
  	 }

   //--------------------------multiple ststus ------------------------------//
  	if($this->input->post('submitstatus')){
     foreach ($this->input->post( 'attdelete') as $key => $value) {
       $status        = $this->input->post('attstatu')[$value];
       $act_mode      = $status == 'A'?'activebrand':'inactivebrand';
	     $parameter     = array('act_mode'=>$act_mode,'row_id'=>$value,'brandname'=>'','brandimage'=>'','');

	     $response['vieww'] = $this->supper_admin->call_procedure('proc_brand',$parameter);  
  	 }
  	   $this->session->set_flashdata("message", "Your Status was successfully Updated.");
  	   redirect("admin/category/viewbrand");
  	}

  	//-------------------------------end ----------------------------------------//
	  $parameter         = array('act_mode'=>'view','row_id'=>'','brandname'=>'','brandimage'=>'','');
	  // p($parameter); exit;
    $response['vieww'] = $this->supper_admin->call_procedure('proc_brand',$parameter);
    //p($response['vieww']); exit;
    //----------------  Download Newsletter Excel ----------------------------//

      if(!empty($this->input->post('newsexcel')))
          {
           
           $finalExcelArr = array('Brand Name');
           $objPHPExcel = new PHPExcel();
           $objPHPExcel->setActiveSheetIndex(0);
           $objPHPExcel->getActiveSheet()->setTitle('Brand Worksheet');
           $cols= array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
            $j=2;
            
            //For freezing top heading row.
            $objPHPExcel->getActiveSheet()->freezePane('A2');

            //Set height for column head.
            $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
                        
           for($i=0;$i<count($finalExcelArr);$i++){
            
            //Set width for column head.
            $objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setAutoSize(true);

            //Set background color for heading column.
            $objPHPExcel->getActiveSheet()->getStyle($cols[$i].'1')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '71B8FF')
                    ),
                      'font'  => array(
                      'bold'  => false,
                      'size'  => 15,
                      )
                )
            );

            $objPHPExcel->getActiveSheet()->setCellValue($cols[$i].'1', $finalExcelArr[$i]);

            foreach ($response['vieww'] as $key => $value) {
             
            $newvar = $j+$key;

            //Set height for all rows.
            $objPHPExcel->getActiveSheet()->getRowDimension($newvar)->setRowHeight(20);
            
            $objPHPExcel->getActiveSheet()->setCellValue($cols[0].$newvar, $value->brandname);
            //$objPHPExcel->getActiveSheet()->setCellValue($cols[1].$newvar, $value->brandimages);
           
           
            }
          }

          $filename='Brand.xls';
          header('Content-Type: application/vnd.ms-excel'); //mime type
          header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
          header('Cache-Control: max-age=0'); //no cache
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
          ob_end_clean();
          ob_start();  
          $objWriter->save('php://output');

         
          }
      //----------------  End Download Newsletter Excel ------------------------// 
      
      if(!empty($_GET['brand_name']))
      {  
         $parameter         = array('act_mode'=>'view','row_id'=>'','brandname'=>$_GET['brand_name'],'brandimage'=>'','');
         $response['vieww'] = $this->supper_admin->call_procedure('proc_brand',$parameter);
          //----------------  start pagination configuration ------------------------// 

             $config['base_url']         = base_url(uri_string()).'?'.(isset($_GET['page'])?str_replace('&'.end(explode('&', $_SERVER['QUERY_STRING'])),'',$_SERVER['QUERY_STRING']):str_replace('&page=','',$_SERVER['QUERY_STRING']));
             $config['total_rows']       = count($response['vieww']);
             $config['per_page']         = 50;
             $config['use_page_numbers'] = TRUE;

             $this->pagination->initialize($config);
             if($_GET['page']){
               $page         = $_GET['page']-1 ;
               $page         = ($page*50);
               $second       = $config['per_page'];
             }
             else{
               $page         = 0;
               $second       = $config['per_page'];
             }
             
             $str_links = $this->pagination->create_links();
             $response["links"]  = explode('&nbsp;',$str_links );

             //----------------  end pagination configuration ------------------------// 

             $parameter         = array('act_mode'=>'view','row_id'=>$page,'brandname'=>$_GET['brand_name'],'brandimage'=>'',$second);
             $response['vieww'] = $this->supper_admin->call_procedure('proc_brand',$parameter);
         
      }else{
              //----------------  start pagination configuration ------------------------// 

             $config['base_url']         = base_url()."admin/category/viewbrand?";
             $config['total_rows']       = count($response['vieww']);
             $config['per_page']         = 50;
             $config['use_page_numbers'] = TRUE;

             $this->pagination->initialize($config);
             if($_GET['page']){
               $page         = $_GET['page']-1 ;
               $page         = ($page*50);
               $second       = $config['per_page'];
             }
             else{
               $page         = 0;
               $second       = $config['per_page'];
             }
             
             $str_links = $this->pagination->create_links();
             $response["links"]  = explode('&nbsp;',$str_links );

             //----------------  end pagination configuration ------------------------// 

             $parameter         = array('act_mode'=>'view','row_id'=>$page,'brandname'=>'','brandimage'=>'',$second);
             $response['vieww'] = $this->supper_admin->call_procedure('proc_brand',$parameter);

             
           }

      //p($response['links']);exit();
	  $this->load->view('helper/header');
    $this->load->view('brand/viewbrand',$response);

}

//............. Manage Brand Delete ............... //
public function branddelete($id){
   $parameter         = array('act_mode'=>'viewbid','row_id'=>$id,'brandname'=>'','brandimage'=>'','');
   $response['vieww'] = $this->supper_admin->call_procedureRow('proc_brand',$parameter); 
   $delImg1           = "imagefiles/brandimages/".$response['vieww']->brandimages;
   unlink($delImg1);
   $parameter         = array('act_mode'=>'delete','row_id'=>$id,'brandname'=>'','brandimage'=>'','');
   $response['vieww'] = $this->supper_admin->call_procedure('proc_brand',$parameter); 

   $this->session->set_flashdata("message", "Your information was successfully delete.");
   redirect("admin/category/viewbrand"); 	
} 

//............. Manage Brand Status ............... //
public function brandstatus (){
	$rowid               = $this->uri->segment(4);
	$status              = $this->uri->segment(5);
	$act_mode            = $status=='A'?'activebrand':'inactivebrand';
	$parameter           = array('act_mode'=>$act_mode,'row_id'=>$rowid,'brandname'=>'','brandimage'=>'','');
  $response['vieww']   = $this->supper_admin->call_procedure('proc_brand',$parameter);  
  $this->session->set_flashdata('message', 'Your Status was successfully Updated.');
	redirect(base_url() . 'admin/category/viewbrand');

}

//............. Manage Brand Update ............... //
public function brandupdate($id){
   if($this->input->post('submit')){
   	 $bname        = $this->input->post('bname');
   	 $video_img    = $_FILES['video_img']['name'];
     $prevideo_img = $this->input->post('oldimage');

     $allowedExts  = array("gif", "jpeg", "jpg", "png");
     $temp         = explode(".",$video_img);
     $extension    = end($temp);

    if ((($_FILES["video_img"]["type"] == "image/gif")
      || ($_FILES["video_img"]["type"] == "image/jpeg")
      || ($_FILES["video_img"]["type"] == "image/jpg")
      || ($_FILES["video_img"]["type"] == "image/pjpeg")
      || ($_FILES["video_img"]["type"] == "image/x-png")
      || ($_FILES["video_img"]["type"] == "image/png"))
      && ($_FILES["video_img"]["size"] < 90000000)
      && in_array($extension, $allowedExts)) {
       
          if ($_FILES["video_img"]["error"] > 0) {
              echo "Return Code: " . $_FILES["video_img"]["error"] . "<br>";
          } 
          else{
            $label    = time();
            $filename = $label.$video_img;
            $filename = preg_replace("/[^a-zA-Z0-9.]/", "", $filename);
            
            if (file_exists("imagefiles/brandimages/".$filename)) {
                $this->session->set_flashdata('message', 'Image already exists');
                redirect('admin/videogallery/updatedodravideo');
            }
            else{
                move_uploaded_file($_FILES["video_img"]["tmp_name"],"imagefiles/brandimages/".$filename);
                $parameter = array(
                               'act_mode'   => 'update',
                               'row_id'     => $id,
                               'brandname'  => $bname,
                               'brandimage' => $filename,
                               'catid'      => ''
                             );

                $record   = $this->supper_admin->call_procedure('proc_brand',$parameter);
                $delImg1  = "imagefiles/brandimages/".$prevideo_img;
                unlink($delImg1);
                
                $this->session->set_flashdata('message', 'Your information was successfully Updated.');
                redirect('admin/category/viewbrand');                
            }     
         }
      }
      else{
                 $parameter = array(
                             'act_mode'  =>'update',
                             'row_id'    =>$id,
                             'brandname' =>$bname,
                             'brandimage'=>$prevideo_img,
                             'catid'     =>'');
                  $record   = $this->supper_admin->call_procedure('proc_brand',$parameter);
                  $this->session->set_flashdata('message', 'Your information was successfully Updated.');
                  redirect('admin/category/viewbrand');
        
      }
   }	
   $parameter         = array('act_mode'=>'viewbid','row_id'=>$id,'brandname'=>'','brandimage'=>'','');
   $response['vieww'] = $this->supper_admin->call_procedureRow('proc_brand',$parameter); 

   $this->load->view('helper/header');
   $this->load->view('brand/editbrand',$response);

} 

//............. Add Brand Master ............... //
public function addbrandmaster(){
  
$this->userfunction->loginAdminvalidation();
if($this->input->post('submit')){
  //exit;
  foreach ($this->input->post('catidd') as $key => $value) {
	   $parameter         = array('act_mode'=>'brandmcheck','row_id'=>$this->input->post('brandid'),'brandname'=>'','brandimage'=>'','catid'=>$value);
	   $record['record']  = $this->supper_admin->call_procedureRow('proc_brand',$parameter);
     if($record['record']->attcount>0){
	     $this->session->set_flashdata("message", "Brand Category Already Exists");
	     redirect("admin/category/addbrandmaster");
     }
	
     $parameter = array(
                     'act_mode'  => 'insertmastre',
                     'row_id'    => $this->input->post('brandid'),
                     'brandname' => '',
                     'brandimage'=> '',
                     'catid'     => $value
                   );

    $record     = $this->supper_admin->call_procedure('proc_brand',$parameter);
  }

    $this->session->set_flashdata('message', 'Your information was successfully Saved.');
    redirect('admin/category/viewbrandmaster');	
}

    $parameter                 = array('act_mode'=>'brmview','row_id'=>'','brandname'=>'','brandimage'=>'','');
    $responce['vieww']         = $this->supper_admin->call_procedure('proc_brand',$parameter); 
    /*$parameterr                = array('act_mode'=>'catview','row_id'=>'','catparentid'=>'','cname'=>'','cdesc'=>'','caturl'=>'','catmeta'=>'','metadesc'=>'','metakeyword'=>'','catsort'=>'','catdisplay'=>'','catlevel'=>'');
    $responce['parentCatdata'] = $this->supper_admin->call_procedure('proc_category',$parameterr);*/
    $parameterr                = array('act_mode'=>'parecatview','row_id'=>'','catparentid'=>'','cname'=>'','cdesc'=>'','caturl'=>'','catmeta'=>'','metadesc'=>'','metakeyword'=>'','catsort'=>'','catdisplay'=>'','catlevel'=>'');
    $responce['parentCatdata'] = $this->supper_admin->call_procedure('proc_category',$parameterr); 	
    $this->load->view('helper/header');
    $this->load->view('brand/addbrandmaster',$responce);	
}




public function branddcatvalue(){
  $catiddold                    = $this->input->post('catid');
  $catidd = implode(',', $catiddold);
  $parameterr                = array('act_mode'=>'branddcatview','row_id'=>'','catparentid'=>'','cname'=>$catidd,'cdesc'=>'','caturl'=>'','catmeta'=>'','metadesc'=>'','metakeyword'=>'','catsort'=>'','catdisplay'=>'','catlevel'=>'');
  //p($parameterr);exit();
  $responce['childCatdata']  = $this->supper_admin->call_procedure('proc_category',$parameterr); 
  //p($responce['childCatdata']);exit(); 
  $str = '';
  foreach($responce['childCatdata'] as $k=>$v){   
   # $str .= "<option value=".$v->id.">".$v->attvalue."</option>";
   $str .= '<option value="'.$v->catid.'">'.$v->catname.'</option>';
  }
  echo $str;

}






//............. View Brand Master ............... //
public function viewbrandmaster(){
  if($this->input->post('submit'))
  {
    foreach ($this->input->post( 'attdelete') as $key => $value) {
      $parameter         = array('act_mode'=>'deletem','row_id'=>$value,'brandname'=>'','brandimage'=>'','');
      $response['vieww'] = $this->supper_admin->call_procedure('proc_brand',$parameter); 
    }
      $this->session->set_flashdata("message", "Your information was successfully delete.");
      redirect("admin/category/viewbrandmaster");
  }

    $parameter         = array('act_mode'=>'viewmbra', 'row_id'=>'', 'brandname'=>'', 'brandimage'=>'','');
    $responce['vieww'] = $this->supper_admin->call_procedure('proc_brand',$parameter);

    //----------------  Download Newsletter Excel ----------------------------//

      if(!empty($this->input->post('newsexcel')))
          {
           
           $finalExcelArr = array('Brand Name','Category Name');
           $objPHPExcel = new PHPExcel();
           $objPHPExcel->setActiveSheetIndex(0);
           $objPHPExcel->getActiveSheet()->setTitle('Brand Master Worksheet');
           $cols= array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
            $j=2;
            
            //For freezing top heading row.
            $objPHPExcel->getActiveSheet()->freezePane('A2');

            //Set height for column head.
            $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
                        
           for($i=0;$i<count($finalExcelArr);$i++){
            
            //Set width for column head.
            $objPHPExcel->getActiveSheet()->getColumnDimension($cols[$i])->setAutoSize(true);

            //Set background color for heading column.
            $objPHPExcel->getActiveSheet()->getStyle($cols[$i].'1')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '71B8FF')
                    ),
                      'font'  => array(
                      'bold'  => false,
                      'size'  => 15,
                      )
                )
            );

            $objPHPExcel->getActiveSheet()->setCellValue($cols[$i].'1', $finalExcelArr[$i]);

            foreach ($responce['vieww'] as $key => $value) {
             
            $newvar = $j+$key;

            //Set height for all rows.
            $objPHPExcel->getActiveSheet()->getRowDimension($newvar)->setRowHeight(20);
            
            $objPHPExcel->getActiveSheet()->setCellValue($cols[0].$newvar, $value->brandname);
            $objPHPExcel->getActiveSheet()->setCellValue($cols[1].$newvar, $value->catname);
           
           
            }
          }

          $filename='Brand Master.xls';
          header('Content-Type: application/vnd.ms-excel'); //mime type
          header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
          header('Cache-Control: max-age=0'); //no cache
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
          ob_end_clean();
          ob_start();  
          $objWriter->save('php://output');

         
          }
      //----------------  End Download Newsletter Excel ------------------------// 
    if(!empty($_GET['filter_by']))
    { 
       $parameter         = array('act_mode'=>'viewmbra', 'row_id'=>'', 'brandname'=>$_GET['searchname'], 'brandimage'=>$_GET['filter_by'],'');
       $responce['vieww'] = $this->supper_admin->call_procedure('proc_brand',$parameter);
      //----------------  start pagination configuration ------------------------// 

     $config['base_url']         = base_url(uri_string()).'?'.(isset($_GET['page'])?str_replace('&'.end(explode('&', $_SERVER['QUERY_STRING'])),'',$_SERVER['QUERY_STRING']):str_replace('&page=','',$_SERVER['QUERY_STRING']));
     $config['total_rows']       = count($responce['vieww']);
     $config['per_page']         = 20;
     $config['use_page_numbers'] = TRUE;

     $this->pagination->initialize($config);
     if($_GET['page']){
       $page         = $_GET['page']-1 ;
       $page         = ($page*20);
       $second       = $config['per_page'];
     }
     else{
       $page         = 0;
       $second       = $config['per_page'];
     }
     
     $str_links = $this->pagination->create_links();
     $responce["links"]  = explode('&nbsp;',$str_links );

      //----------------  end pagination configuration ------------------------// 
        
    $parameter         = array('viewmbra_page',$page,$_GET['searchname'],$_GET['filter_by'],$second);
    $responce['vieww'] = $this->supper_admin->call_procedure('proc_brand',$parameter);
    }else{
     //----------------  start pagination configuration ------------------------// 

     $config['base_url']         = base_url()."admin/category/viewbrandmaster?";
     $config['total_rows']       = count($responce['vieww']);
     $config['per_page']         = 20;
     $config['use_page_numbers'] = TRUE;

     $this->pagination->initialize($config);
     if($_GET['page']){
       $page         = $_GET['page']-1 ;
       $page         = ($page*20);
       $second       = $config['per_page'];
     }
     else{
       $page         = 0;
       $second       = $config['per_page'];
     }
     
     $str_links = $this->pagination->create_links();
     $responce["links"]  = explode('&nbsp;',$str_links );

      //----------------  end pagination configuration ------------------------// 
        
    $parameter         = array('viewmbra_page',$page,'','',$second);
    $responce['vieww'] = $this->supper_admin->call_procedure('proc_brand',$parameter);
  }
    
    $this->load->view('helper/header');
    $this->load->view('brand/viewbrandmaster',$responce);

}

//............. Delete Brand Master ............... //
public function brandmasterdelete($id){
  $parameter         = array('act_mode'=>'deletem','row_id'=>$id,'brandname'=>'','brandimage'=>'','');
  $responce['vieww'] = $this->supper_admin->call_procedure('proc_brand',$parameter);
  $this->session->set_flashdata("message", "Your information was successfully delete.");
  redirect("admin/category/viewbrandmaster");
}


//............. End Brand ............... //

}//End Class


?>
