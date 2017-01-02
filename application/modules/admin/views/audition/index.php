<div class="wrapper">
         <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <!-- <form action="" method="post" enctype="multipart/form-data" > -->
                <div class="page_contant">
                    <div class="col-lg-12">
                            <div class="page_name">
                            <h2>All Audition</h2>
                        </div>
                        
                            <div class="page_box">
                            <div class="col-lg-12">
                            <div class="col-lg-8">
                                <p> In this Section Admin can view All audition details.</p>
                                </div>
                                <div class="col-lg-4">
                                <a href="<?php echo site_url('admin/audition/add_audition'); ?>" class="btn btn-primary text-right" >Add Audition</a>
                                </div>
                            </div>
                        </div>

                        <div class="page_box">
                            <div class="col-lg-12">
                           <?php 

                             if(!empty($this->session->flashdata('message'))){
    echo '<div class="alert alert-success">'.$this->session->flashdata('message').'</div> '; 
  }  ?>
                                <div class="gridview">
                                    <table class="grid_tbl">
                                        <thead>
                                           <tr>
                                            <th>S:NO</th>
                                            <th>Audition Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <?php $i=0; foreach ($list as $key => $value) {
                                          $i++;
                                        ?>
                                       
                                        <tr>
                                            <td><?php echo $i ;?></td>
                                            <td><?php echo $value->ev_name ;?></td>
                                             <td><?php echo date('d/m/Y',strtotime($value->ev_st_date)).' '.date('g:iA', strtotime($value->ev_st_time)); ?></td>
                                            <td><?php echo date('d/m/Y',strtotime($value->ev_end_date)).' '.date('g:iA', strtotime($value->ev_end_time)); ?></td>
                                            <td><a href="<?php echo site_url('admin/audition/add_audition/'.$value->ev_id)?>" ><i class="fa fa-pencil"></i></a>
                                            <a href="<?php echo base_url()?>admin/geographic/countrydelete/" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash"></i></a>
                                           

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

