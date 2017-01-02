<?php //p($newsview);exit;?>
<div class="wrapper">
<?php  $this->load->view('helper/nav')?> 
<div class="col-lg-10 col-lg-push-2">
        <div class="row">

            <div class="page_contant">
                <div class="col-lg-12">
                    <div class="page_name">
                             
                        <h2>Members Cart Detail List</h2>
    
                    </div>
                      <div class="page_box">
                        <div class="col-lg-12">
                            <p>  In this Section Admin can view the Members Cart Detail Listing.</p>
                        </div>
                    </div>
                    
                    <div class="page_box">
                        <div class="sep_box">
                            <div class="col-lg-12">

                               <!--  session flash message  -->
                                <div class='flashmsg'>
                                    <?php echo validation_errors(); ?> 
                                    <?php echo $this->session->flashdata('message'); ?>
                                </div>
                                <table class="grid_tbl">
                                    <thead>
                                        <tr>
                                            <th>S. NO.</th>
                                            <th>Member<br>Type</th>
                                            <th>Member<br>Name</th>
                                            <th>Shop<br>Name</th>
                                            <th>Member<br>Email</th>
                                            <th>Member<br>Contact No.</th>
                                            <th>Number of<br>Items in cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0; 
                                    if(!empty($viewallcart))
                                           {
                                            if($_GET['page'])
                                            {
                                              $page = $_GET['page']-1; 
                                              $i=$page*50; 
                                            }
                                          }
                                    foreach ($viewallcart as $key => $value) { $i++;?>
                                       
                                        <tr>
                                            <td><?php echo $i ;?></td>
                                            <td><?php echo ucwords($value->vendortype);?></td>
                                            <td><?php echo ucwords($value->firstname).' '.ucwords($value->lastname);?></td>
                                            <td><?php echo ucwords($value->companyname);?></td>
                                            <td><?php echo $value->compemailid;?></td>
                                            <td><?php echo $value->contactnumber;?></td>
                                            <td><?php echo $value->cartitem;?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="pagi_nation">
                                <ul class="pagination">
                                <?php foreach ($links as $link) {
                                //p($link); //exit();
                                echo "<li class='newli'>". $link."</li>";
                                } ?>
                                </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>