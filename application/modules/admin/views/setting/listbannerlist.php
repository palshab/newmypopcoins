
<body>
    
    <div class="wrapper">
       



        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <!-- <form action="" method="post" enctype="multipart/form-data" > -->
                <div class="page_contant">
                    <div class="col-lg-12">
                            <div class="page_name">
                            <h2>Listing Page banner listing</h2>
                        </div>
                        
                            <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this Section Admin can view All Banners for Listing page.</p> 
                            </div>
                        </div>

                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl">
                                        <thead>
                                           <tr>
                                            <th>S:NO</th>
                                            <th>Title</th>
                                            <th bgcolor='red'>Images</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <?php $i=0; foreach ($data as $key => $value) {
                                          $i++;
                                       //p($value); die;
                                        ?>
                                       
                                        <tr>
                                            <td><?php echo $i ;?></td>
                                            <td><?php echo $value->title ;?></td>
                                            <td><a href="<?php echo base_url()?>admin/setting/viewbannerimages/<?php echo $value->id?>" ><button type="button"><i class="fa fa-eye"></i> View Images</button></a></td>
                                             <td> <a href="<?php echo base_url()?>admin/setting/listbannerupdate/<?php echo $value->id?>" ><i class="fa fa-pencil"></a></i>
                                            <a href="<?php echo base_url()?>admin/setting/listbannerdelete/<?php echo $value->id?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash"></i></a>
                                          <a href="<?php echo base_url(); ?>admin/setting/listbannerstatus/<?php echo $value->id.'/'.$value->banner_status; ?>"><?php if($value->banner_status==1) { ?>Inactive<?php }else { ?>Active<?php } ?></a>
 
                                            </td>
                                        </tr>
                                        <?php } ?>
                                            
                                           

                                        </tbody>
                                    </table>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</body>
   
</html>
