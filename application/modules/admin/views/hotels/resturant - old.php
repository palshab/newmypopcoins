<!DOCTYPE html>
<html>
<body>
   

    <div class="wrapper">
        <div class="col-lg-2 col-md-2 col-sm-3 left_nav_f">
           
        </div>



        <div class="col-lg-10 col-lg-push-2">
            <div class="row">
                <!-- <form action="" method="post" enctype="multipart/form-data" > -->
                <div class="page_contant">
                    <div class="col-lg-12">
                        <div class="page_name">
                            <h2>Add Restaurant</h2>
                        </div>
                        <div class="page_box">
                            <div class="col-lg-12">
                                <p> In this Section Admin can view All order details.</p>
                            </div>
                        </div>
                        <div class="page_box">
                            <div class="sep_box">

                                <div class="col-lg-12">
                                 
                                    <div class="row">
                                        <div class="sep_box">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Brand Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <select name="brandid" id="brandid">
                                                                <option>Select Brand</option>
                                                                <option value="63">Anand</option>
                                                                <option value="36">Annie</option>
                                                                <option value="39">Applefun</option>
                                                                <option value="31">Asian</option>
                                                                <option value="72">Astrokidz</option>
                                                                <option value="75">Avis Creation</option>
                                                                <option value="40">Awals </option>
                                                                <option value="65">Bruder</option>
                                                                <option value="82">Camel</option>
                                                                <option value="81">Camlin</option>
                                                                <option value="86">Century</option>
                                                                <option value="41">Centy</option>
                                                                <option value="61">Chiccoo</option>
                                                                <option value="54">Chimps</option>
                                                                <option value="42">Dash</option>
                                                                <option value="78">DOMS</option>
                                                                <option value="44">Ekta</option>
                                                                <option value="45">Fun Ride</option>
                                                                <option value="66">Fun Zoo</option>
                                                                <option value="46">Funskool</option>
                                                                <option value="64">Girnar</option>
                                                                <option value="47">Honeybee</option>
                                                                <option value="48">Intex</option>
                                                                <option value="37">IToys</option>
                                                                <option value="59">Kids Zone</option>
                                                                <option value="83">Kokuyo</option>
                                                                <option value="85">Kores</option>
                                                                <option value="68">Little Angel</option>
                                                                <option value="62">Lovely</option>
                                                                <option value="49">Luna</option>
                                                                <option value="57">Lusa</option>
                                                                <option value="77">Luxor</option>
                                                                <option value="60">Mansa ji</option>
                                                                <option value="50">Masoom</option>
                                                                <option value="26">Mattel</option>
                                                                <option value="79">Navneet</option>
                                                                <option value="51">Novelty</option>
                                                                <option value="84">Pilot</option>
                                                                <option value="74">Prem Ratna</option>
                                                                <option value="87">Rakhi</option>
                                                                <option value="56">ShinSei</option>
                                                                <option value="80">Shrachi</option>
                                                                <option value="52">Smartivity</option>
                                                                <option value="53">Sunbaby</option>
                                                                <option value="70">ToyKraft</option>
                                                                <option value="76">Toys Box</option>
                                                                <option value="67">Toyzone</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Brand Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input id="Text1" type="text" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                        </div>



                                        <div class="sep_box">
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Property Name <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                            <input style="text-transform: uppercase" type="text" placeholder="" name="fname" value="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Country <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="country" onchange="return statek(this.value);" class="select" id="country" style="height:30px; width:150px;" >
                                                                <option value="">SELECT COUNTRY</option>
                                                                    <?php foreach ($country as $value) { ?>
                                                            <option value="<?php echo $value->a_CountryId.','. $value->t_CountryName;  ?>" ><?php echo $value->t_CountryName;  ?></option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">State <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="state" onchange="return cityk(this.value)" id="state" class="select">
                                                                <option value="">SELECT STATE</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                     


                                            <div class="sep_box">
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">City <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <select name="city" id="city" onchange="return showAddress() " class="select">
                                                            <option value="">SELECT CITY</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Check In <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <select name="checkin" id="checkin" class="select"  >
                                                            <option value="">SELECT CHECKIN TIME</option>
                                                            <?php 
                                                                for ($i=15; $i<=1440; $i+=15) { 
                                                                    $endTime = strtotime("+".$i." minutes", strtotime('00:00'));
                                                                     $st= date('G:i', $endTime); ?>
                                                                     <option value="<?php echo $st; ?>"  ><?php echo $st; ?> </option>

                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">SELECT CHECKOUT TIME<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <select name="checkout" id="checkout" class="select" style="height:30px; width:150px;" >
                                                            <option value="">SELECT CHECKOUT TIME</option>

                                                            <?php 
                                                                for ($i=15; $i<=1440; $i+=15) { 
                                                                     $endTime = strtotime("+".$i." minutes", strtotime('00:00'));
                                                                       $st= date('G:i', $endTime); ?>
                                                                    <option value="<?php echo $st; ?>" ><?php echo $st; ?> </option>

                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>






                                       <div class="sep_box">
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Address: <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <input type="text" placeholder="Land Mark" name="nearby1" id="nearby1" style="margin-bottom:3px;" onblur="fun11()">
          <input type="text" placeholder="Land Mark Address" name="nearbyaddress1" id="nearbyaddress1" onblur="fun12()" style="margin-bottom:3px;">
          <input type="hidden" placeholder="Land Mark Latitude" name="nearbylat1" id="nearbylat1" style="margin-bottom:3px;">
          <input type="hidden" placeholder="Land Mark Address longitude" name="nearbyaddresslon1" id="nearbyaddresslon1" style="margin-bottom:3px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Near By2: <span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <input type="text" placeholder="Land Mark" name="nearby2" id="nearby2" style="margin-bottom:3px;" onblur="fun21()">
          <input type="text" placeholder="Land Mark Address" name="nearbyaddress2" id="nearbyaddress2" style="margin-bottom:3px;" onblur="fun22()">
          <input type="hidden" placeholder="Land Mark Latitude" name="nearbylat2" id="nearbylat2" style="margin-bottom:3px;">
          <input type="hidden" placeholder="Land Mark Address longitude" name="nearbyaddresslon2" id="nearbyaddresslon2" style="margin-bottom:3px;">
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Near By3:<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                           <input type="text" placeholder="Land Mark" name="nearby3" id="nearby3" style="margin-bottom:3px;" onblur="fun31()">
          <input type="text" placeholder="Land Mark Address" name="nearbyaddress3" id="nearbyaddress3" style="margin-bottom:3px;" onblur="fun32()">
          <input type="hidden" placeholder="Land Mark Latitude" name="nearbylat3" id="nearbylat3" style="margin-bottom:3px;">
          <input type="hidden" placeholder="Land Mark Address longitude" name="nearbyaddresslon3" id="nearbyaddresslon3" style="margin-bottom:3px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>



                                        <Div class="sep_box">
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Restaurants Nearby:<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                        <textarea name="restaurantsnearby" placeholder="Restaurants Nearby" class="meal"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="tbl_text">Terms & Conditions<span style="color:red;font-weight: bold;">*</span></div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="tbl_input">
                                                          <textarea name="termcondition" placeholder="Term & Conditions"  class="term-tex"></textarea>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                
                                            </div>

                                        </div>




                                    </div>

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
