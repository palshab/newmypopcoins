
<body>
    
    <div class="wrapper">
       



        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <!-- <form action="" method="post" enctype="multipart/form-data" > -->
                <div class="page_contant">
                    <div class="col-lg-12">
                            <div class="page_name">
                            <h2>All Deal Status</h2>
                        </div>
                        
                            <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this Section Admin can view All order details.</p>
                            </div>
                        </div>

                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl">
                                        <thead>
                                           <tr>
                                            <th>S:NO</th>
                                            <th>Country Name</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <?php $i=0; foreach ($vieww as $key => $value) {
                                          $i++;
                                        ?>
                                       
                                        <tr>
                                            <td><?php echo $i ;?></td>
                                            <td><?php echo $value->name ;?></td>
                                            <td><a href="<?php echo base_url()?>admin/geographic/countryupdate/<?php echo $value->conid?>" ><i class="fa fa-pencil"></a></i>
                                            <a href="<?php echo base_url()?>admin/geographic/countrydelete/<?php echo $value->conid?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/geographic/countrystatus/<?php echo $value->conid.'/'.$value->counstatus; ?>"><?php if($value->counstatus=='D') { ?>Inactive<?php }else { ?>Active<?php } ?></a>

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
