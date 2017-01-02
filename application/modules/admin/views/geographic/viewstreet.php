
<body>
    
    <div class="wrapper">
       



        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <!-- <form action="" method="post" enctype="multipart/form-data" > -->
                <div class="page_contant">
                    <div class="col-lg-12">
                            <div class="page_name">
                            <h2>View Location</h2>
                        </div>
                        
                            <div class="page_box">
                            <div class="col-lg-12">
                                <p>In this section, admin can see the list of all location.</p>
                            </div>
                        </div>

                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl">
                                        <thead>
                                          <tr>
                                            <th>S:NO</th>
                                            <th>City Name</th>
                                            <th>Location</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=0;
                                    if(!empty($vieww))
                                           {
                                            if(@$_GET['page'])
                                            {
                                              $page = $_GET['page']-1; 
                                              $i=$page*50; 
                                            }
                                          } 
                                     foreach ($vieww as $key => $value) {
                                          $i++;
                                        ?>
                                       
                                        <tr>
                                            <td><?php echo $i ;?></td>
                                            <td><?php echo $value->cityname ;?></td>
                                            <td><?php echo $value->location ;?></td>
                                            <td><a href="<?php echo base_url()?>admin/geographic/streetupdate/<?php echo $value->streetid?>" ><i class="fa fa-pencil"></a></i>
                                            <a href="<?php echo base_url()?>admin/geographic/streetdelete/<?php echo $value->streetid?>" onclick="return confirm('Are you sure to delete street?');"><i class="fa fa-trash fa-lg"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/geographic/streetstatus/<?php echo $value->streetid.'/'.$value->sstatus; ?>"><?php if($value->sstatus=='1') { ?>Active<?php }else { ?>Inactive<?php } ?></a>

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
