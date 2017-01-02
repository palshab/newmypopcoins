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
                            <h2>Manage Attribute</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this Section Admin can add various attribute names and can edit/delete also.</p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                    
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
                                            <th><span style='border:0px color:blue; cursor:pointer;' id='selAll'><input type="checkbox" id="selecctall"/></br>Select All</span>
                                              <!-- / <br>
                                           <span style='border:0px color:blue; cursor:pointer;' id='DeselAll'>Deselect</span> --></th>
                                            <th>S:NO</th>
                                            <th>Attribute Name</th>
                                           <!--  <th>Action</th> -->
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                    <?php $i=0; foreach ($vieww as $key => $value) {
                                          $i++;
                                        ?>
                                       
                                        <tr>
                                            <td><input type='checkbox' name='attdelete[]' class='chkApp' value='<?=$value->id?>'> </td> 
                                            <td><?php echo $i ;?></td>
                                            <td><?php echo $value->attname ;?></td>
                                           <input type='hidden' name='attstatu[<?php echo $value->id;?>]'  value='<?=$value->astatus?>'>
                                          
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    </table>
                                    <div class="pagi_nation">
                                
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
