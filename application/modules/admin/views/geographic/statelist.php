
<body>
    
    <div class="wrapper">
       



        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <!-- <form action="" method="post" enctype="multipart/form-data" > -->
                <div class="page_contant">
                    <div class="col-lg-12">
                            <div class="page_name">
                            <h2>View States</h2>
                        </div>
                        
                            <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this section, admin can see the list of all states!</p>
                            </div>
                        </div>

                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl">
                                        <thead>
                                          <tr>
                                            <th>S.No.</th>
                                            <th>Country Name</th>
                                            <th>State Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <?php $i=0; foreach ($data as $key => $value) { $i++; ?>
                                       <tr>

                                            <td><?php echo $i;?></td>
                                            <td><?php echo $value->name;?></td>
                                            <td><?php echo $value->statename;?></td>
                                            <td><a href="<?php echo base_url()?>admin/geographic/stateupdate/<?php echo $value->stateid?>" ><i class="fa fa-pencil"></a></i>
                                            <a href="<?php echo base_url()?>admin/geographic/statedelete/<?php echo $value->stateid?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/geographic/statestatus/<?php echo $value->stateid.'/'.$value->isdeleted; ?>"><?php if($value->isdeleted=='D') { ?>Inactive<?php }else { ?>Active<?php } ?></a>

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
