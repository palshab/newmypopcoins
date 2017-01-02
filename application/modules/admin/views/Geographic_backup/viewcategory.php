<!DOCTYPE html>
<html>

<body>

    <div class="wrapper">
        



        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <!-- <form action="" method="post" enctype="multipart/form-data" > -->
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Manage Category</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this Section Admin can view All Category details.</p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                    <div style="text-align:right;">
                                       
                                            <input style="background: #1870BB;border: none;color: #fff;padding: 5px 10px;font-size: 13px;" type="submit" value="Download Excel" name="newsexcel">
                                       
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-3">
                                            <div class="tbl_input">
                                                <select >
                                                    <option value="">Filter BY</option>
                                                    <option value="order">Order NO</option>
                                                    <option value="phone">Phone No</option>
                                                    <option value="customer">Customer Name</option>
                                                    <option value="date">Date</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 hide" id="select_div">
                                            <div class="tbl_input">
                                                <select id="custm_nm" name="custm_nm">
                                                    <option value="">Select name</option>
                                                    <option value="pavan kumar ">pavan kumar </option>
                                                    <option value="pradeep singh ">pradeep singh </option>
                                                
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 hide" id="input_div">
                                            <div class="tbl_input">
                                                <input type="text" name="" value="" class="valid input_cls">
                                            </div>
                                        </div>
                                        <div class="hide" id="dt_div">
                                            <div class="col-lg-3">
                                                <div class="tbl_input">
                                                    <input name="fromdate" id="fromdate" value="" class="valid">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="tbl_input">
                                                    <input name="todate" id="todate" value="" class="valid" min="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="submit_tbl">
                                                <input id="validate_frm" type="submit" value="Search" class="btn_button sub_btn">
                                                <input type="button"  value="Reset" class="btn_button sub_btn" style="margin-left:3px;">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                        <div class="page_box">
                            <div class="col-lg-12">
                                <div class="gridview">
                                    <table class="grid_tbl">
                                    <form action="" method="">
                                        <thead>
                                            <tr>
                                                <th bgcolor='red'>S.NO.</th>
                                                <th bgcolor='red'>Order No.</th>
                                                <th bgcolor='red'>Category Name</th>
                                                <th bgcolor='red'>Parent Category</th>
                                                 <th bgcolor='red'>Category Description</th>
                                                <th bgcolor='red'>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                         <?php 
                                           $i=0;
                                          /* if(!empty($vieww))
                                           {
                                            if($_GET['page'])
                                            {
                                              $page = $_GET['page']-1; 
                                              $i=$page*50; 
                                            }
                                          }*/
                                              
                                           foreach ($vieww as $key => $value) {
                                          $i++;
                                    ?>
                                      <tr>
                                            <td><input type='checkbox' name='attdelete[]' class='chkApp' value='<?=$value->catid?>'> </td> 
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value->catname ;?></td>
                                            <td><?php echo $value->categoryname ;?></td>
                                            <td><?php echo $value->catdesc ;?></td>
                                            <input type='hidden' name='attstatu[<?php echo $value->catid;?>]'  value='<?=$value->status?>'>
                                            <td><a href="<?php echo base_url()?>admin/category/categoryupdate/<?php echo $value->catid?>" ><i class="fa fa-pencil"></a></i>
                                            <a href="<?php echo base_url()?>admin/category/categorydelete/<?php echo $value->catid?>" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash fa-lg"></i></a>
                                            <a href="<?php echo base_url(); ?>admin/category/categorystatus/<?php echo $value->catid.'/'.$value->status; ?>"><?php if($value->status=='D') { ?>Inactive<?php }else { ?>Active<?php } ?></a>

                                            </td>
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
                                    </form>
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
