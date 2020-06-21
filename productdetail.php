<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <link type="text/css" rel="stylesheet" href="css/mycss.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="img/1.png">
        <title>Product Details - The Vagad Print Store</title>

    </head>

    <body>
        
        <!-------Dropdown Structure------------------>
        <ul id='dropdown2' class='dropdown-content'>
            <li><a href="profile.php">My profile</a></li>
            <li><a onclick="logout()">Logout</a></li>
        </ul>
        
        <!-- NavBar -->
        <!-- <div class="row nomargin back-color" style="height: 20px"></div> -->
        <nav class="back-color strp" style="height: 130px;padding: 5px">
            <div class="nav-wrapper back-color">
                
<!--
                    <a href="index.html" class="brand-logo black-text"><span class="hide-on-med-and-down">The<img src="img/1.png" style="max-height: 85px; max-width: 100px; position:absolute; bottom:  0;"> <span style="margin-left: 55px">Vagad Print</span></span>
                        <span class="hide-on-large-only" style="font-size: 24px">The Vagad Print</span>
                    </a>
-->
                    <a href="index.php" class="brand-logo center black-text"><img src="img/V1LOGO.png" style="max-height: 200px; max-width: 140px;"></a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger" style="margin-top: 40px"><i class="material-icons black-text">menu</i></a>
                    
                    <ul class="left hide-on-med-and-down" style="margin-top: 30px">

                        <li><a class='dropdown-trigger black-text drop-d' style="width: 350px;font-size: 24px" href='#' data-target='dropdown1'><i class="material-icons black-text right">arrow_drop_down</i>Personilized Products</a></li>

                        
                    </ul>                   

                    <ul class="right hide-on-med-and-down" style="margin-top: 30px">
                        <li>
                            <div class="search">
                                <form action="search.php" method="get">
                                    <input type="text" name="s" placeholder=" " class="browser-default black-text" >
                                    <div style="margin-top: -45px;">
                                        <svg>
                                            <use xlink:href="#path">
                                        </svg>
                                    </div>    
                                </form>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;" >
                                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 28" id="path">
                                    <path stroke="black" d="M32.9418651,-20.6880772 C37.9418651,-20.6880772 40.9418651,-16.6880772 40.9418651,-12.6880772 C40.9418651,-8.68807717 37.9418651,-4.68807717 32.9418651,-4.68807717 C27.9418651,-4.68807717 24.9418651,-8.68807717 24.9418651,-12.6880772 C24.9418651,-16.6880772 27.9418651,-20.6880772 32.9418651,-20.6880772 L32.9418651,-29.870624 C32.9418651,-30.3676803 33.3448089,-30.770624 33.8418651,-30.770624 C34.08056,-30.770624 34.3094785,-30.6758029 34.4782612,-30.5070201 L141.371843,76.386562" transform="translate(83.156854, 22.171573) rotate(-225.000000) translate(-83.156854, -22.171573)"></path>
                                </symbol>
                            </svg>
                        </li>
                        <li><a href="login.html" id="login-id"><i class="material-icons md-dark right drop-d black-text">account_circle</i></a></li>
                        <li data-target="dropdown2" class="dropdown-trigger black-text" id="user-id"><a id="userl" href="#" class="black-text"><i class="material-icons md-dark right drop-d black-text">account_circle</i></a></li>
                        <li><a href="cart.php"><i class="material-icons md-dark right drop-d black-text">shopping_cart</i></a></li>
                    </ul>
                
            </div>
        </nav>
        <div id='dropdown1' class='dropdown-content'>
            <div class="row" style="margin: 0px !important">
                <div class="col m6" style="margin: 0px !important">
                    <div class="row">
                        <ul>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=passportcover">Passport Cover</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=travelcover">Travel Cover</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=mousepad">Personalised Mouse Pad</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=cableholder">Cable Holder</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=cardholder">Card Holder</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=menswallet">Mens Wallet</a></li> 
                            <li><a class="black-text nav-menu-p" href="product.php?cat=ladieswallet">Ladies Wallet</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=cap">Cap</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=cardholdercase">Card holder case</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=sunglasscase">Sunglass Case</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col m6" style="margin: 0px !important">
                    <div class="row">
                        <ul>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=keychain">Keychain</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=pillow">Pillow</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=mug">Mug</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=puzzle">Puzzle</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=engraveddiary">Engraved Diary</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=sublimationmousepad">Sublimation Mousepad</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=sublimationmousepad">Personalised Mousepad</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=badges">Badges</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=luggagetag">Luggage tag</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=mobilegadgetpouch">Mobile /Gadget Pouch</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
        
        <ul class="sidenav" id="mobile-demo">
            <ul class="collapsible">
                <li>
                    <div class="search" style="margin: 10px">
                        <form action="search.php" method="get">
                            <input type="text" name="s" placeholder=" " class="browser-default black-text" >
                            <div style="margin-top: -25px;">
                                <svg>
                                    <use xlink:href="#path">
                                </svg>
                            </div>    
                        </form>
                        
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;" >
                        <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 28" id="path">
                            <path stroke="black" d="M32.9418651,-20.6880772 C37.9418651,-20.6880772 40.9418651,-16.6880772 40.9418651,-12.6880772 C40.9418651,-8.68807717 37.9418651,-4.68807717 32.9418651,-4.68807717 C27.9418651,-4.68807717 24.9418651,-8.68807717 24.9418651,-12.6880772 C24.9418651,-16.6880772 27.9418651,-20.6880772 32.9418651,-20.6880772 L32.9418651,-29.870624 C32.9418651,-30.3676803 33.3448089,-30.770624 33.8418651,-30.770624 C34.08056,-30.770624 34.3094785,-30.6758029 34.4782612,-30.5070201 L141.371843,76.386562" transform="translate(83.156854, 22.171573) rotate(-225.000000) translate(-83.156854, -22.171573)"></path>
                        </symbol>
                    </svg>
                </li>
                <li>
                    <div class="collapsible-header">
                        <b>Personilized Products</b><i class="material-icons right">arrow_drop_down</i>
                    </div>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=passportcover">Passport Cover</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=travelcover">Travel Cover</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=mousepad">Personalised Mouse Pad</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=cableholder">Cable Holder</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=cardholder">Card Holder</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=menswallet">Mens Wallet</a></li> 
                            <li><a class="black-text nav-menu-p" href="product.php?cat=ladieswallet">Ladies Wallet</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=cap">Cap</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=cardholdercase">Card holder case</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=sunglasscase">Sunglass Case</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=keychain">Keychain</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=pillow">Pillow</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=mug">Mug</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=puzzle">Puzzle</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=engraveddiary">Engraved Diary</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=sublimationmousepad">Sublimation Mousepad</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=sublimationmousepad">Personalised Mousepad</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=badges">Badges</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=luggagetag">Luggage tag</a></li>
                            <li><a class="black-text nav-menu-p" href="product.php?cat=mobilegadgetpouch">Mobile /Gadget Pouch</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <li><a href="login.html" class="black-text" id="mob-log-btn">Login/Register</a></li>
            <!-- acc info  -->
            <ul class="collapsible" id="mob-acc-info">
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons right">arrow_drop_down</i><b id="mob-usr"></b>
                    </div>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="profile.php">My profile</a></li>
                            <li><a onclick="logout()">Logout</a></li>
                        </ul>
                    </div>
                </li>                
            </ul>
            <li><a href="cart.php"><i class="material-icons md-dark right black-text">shopping_cart</i>Cart</a></li>                        
        </ul>
        
        
        <?php 
        
        $id = "";
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        if( $id != ""){
            
            include_once("php/database.php");
            
            $is_discount = false;
            $discount_per = 0;
            if($stmt = $conn->prepare("SELECT `name`, `per`, `start`, `end` FROM `discount`")){
            
                $stmt->execute();
                $stmt->bind_result($name, $per, $start, $end);


                date_default_timezone_set('Asia/Kolkata');
            
                $year = date("Y");
                $month = date("m");
                $day = date("d");

                while($stmt->fetch()) {
                    $temp = explode("-", $end);
                    if( $year <= $temp[0] && $month <= $temp[1] && $day <= $temp[2]){
                        $is_discount = true;
                        $discount_per = $per;
                        // echo "dis $per";
                        break;
                    }
                }
            }else{
                //print_r($conn->error_list);
                echo "no";
            }
            $stmt->close();
            
            $sql = "SELECT pc.product, p.name, p.price, p.img1, p.img2, p.img3, p.img4, p.img5, p.img6, pc.text, p.photo, pc.charm, p.des, pt.type, pc.preview FROM productcontent as pc, product as p, product_type as pt WHERE p.id=? and p.pid=pc.id and p.ptid=pt.id and p.stat='live'";
            
            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param("s",$id);
                $stmt->execute();
                $stmt->bind_result($pcat, $pname, $price, $img1, $img2, $img3, $img4, $img5, $img6, $cuxtext, $cuxphoto, $chrm, $des, $subcat, $preview);
            }else{
                echo "no";
            }
            $i = 0;
            while($stmt->fetch()) {
                $i=$i+1;   
                $stmt->close();
            
?>
        <div class="row" style="margin-top: 20px; margin-bottom: 0px">
            <div class="col s12 m10 offset-m1">
                <p class="nomargin">Home > <?php echo $pcat; ?></p>
            </div>
        </div>
        
        
        <!--  product side images, main image and details      -->
        <div class="row" style="margin-top: 10px">
            <!--    Side images        -->
            <div class="col s3 m1 offset-m1 nomargin">
                <div class="row nomargin">
                    <div class="col s10 right">
                        <div class="row nomargin">
                            <div class="card fivemargin sidesmall" >
                                <div class="card-image">
                                    <img class="sideimg center" src="img/<?php echo $img1; ?>" style="solid 2px black">
                                </div>
                            </div>
                        </div>
                        <?php if($img2!="null" && $img2!=""){ ?>
                        <div class="row nomargin">
                            <div class="card fivemargin sidesmall">
                                <div class="card-image">
                                    <img class="sideimg center" src="img/<?php echo $img2; ?>" >
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($img3!="null" && $img3!=""){ ?>
                        <div class="row nomargin">
                            <div class="card fivemargin sidesmall">
                                <div class="card-image">
                                    <img class="sideimg center" src="img/<?php echo $img3; ?>" >
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($img4!="null" && $img4!=""){ ?>
                        <div class="row nomargin">
                            <div class="card fivemargin sidesmall">
                                <div class="card-image">
                                    <img class="sideimg center" src="img/<?php echo $img4; ?>">
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($img5!="null" && $img5!=""){ ?>
                        <div class="row nomargin">
                            <div class="card fivemargin sidesmall">
                                <div class="card-image">
                                    <img class="sideimg center" src="img/<?php echo $img5; ?>">
                                </div>
                            </div>
                        </div>
                        <?php } if($img6!="null" && $img6!=""){ ?>
                        <div class="row nomargin">
                            <div class="card fivemargin sidesmall">
                                <div class="card-image">
                                    <img class="sideimg center" src="img/<?php echo $img6; ?>">
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!--      Main image      -->
            <div class="col s8 m4 ">
                <div class="row nomargin" style="margin-left: 10px">
                    <div class="card">
                        <div class="card-image">
                            <img class="materialboxed" id="productimage" src="img/<?php echo $img1; ?>" >
                        </div>
                    </div>
                </div>
            </div>
            <!--     Right side content       -->
            <div class="col s11 m4" style="margin-left:20px">
                
                <div class="section" style="margin-left: 10px">
                    <!-- Title -->
                    <p class="nomargin" style="font-size: 24px; font-weight:600"><?php echo $pname; ?></p>
                </div>                
                <!--    Charm 1   -->
                <?php 
                //chrm 1    
                if($chrm>=1){
                    if($stmt = $conn->prepare("SELECT `id`, `name`, `price`, `img` FROM `charm` WHERE name<>'' ORDER BY name ASC")){
                        
                        $stmt->execute();
                        $stmt->bind_result($chrm_id, $chrm_name, $chrm_price, $chrm_img);
                    }else{
                        echo "no";
                    }
                    $cm = 0;
                    while($stmt->fetch()) {
                        if($cm==0){ ?>
                            <div class="divider"></div>
                            <div class="section" style="margin-left: 10px">
                                <div class="row nomargin">
                                    <div class="col s12 nomargin">
                                        <form method="post">
                                            <div class="col s12 m6">
                                                <b>Charm 1 :  <div class="chip" id="charmone_id">Select charm</div></b>
                                            </div>
                                            <div class="col s12 m6">
                                                <a class="waves-effect black waves-light btn modal-trigger black drop-d" href="#charmone">Choose charm 1</a>
                                            </div>
                                                <div id="charmone" class="modal">
                                                    <div class="modal-content">
                        <?php }
                        $cm = $cm + 1; ?>
                                                <!-- <option value="<?php //echo $chrm_id; ?>"><?php //echo $chrm_name; ?></option> -->
                                                <div class="chip charmone-chip" value="<?php echo $chrm_id; ?>">
                                                    <img data-lazysrc="img/<?php echo $chrm_img; ?>" class="chip-img" alt="Contact Person">
                                                    <?php echo $chrm_name; ?>
                                                </div>
                    <?php }
                    if($cm!=0){ ?>
                                            <!-- </select> -->
                                        <!-- <label>Choose Charm 1</label> -->
                                                    </div>
                                                </div>
                                        </form>
                                    <!-- </div> -->
                                    
                                </div>
                            </div>
                        </div>
                    <?php }
                    $stmt->close();
                    
                }
                
                
                //chrm 2
                if($chrm>=2){
                    if($stmt = $conn->prepare("SELECT `id`, `name`, `price`, `img` FROM `charm` WHERE name<>'' ORDER BY name ASC ")){
                        
                        $stmt->execute();
                        $stmt->bind_result($chrm_id, $chrm_name, $chrm_price, $chrm_img);
                    }else{
                        echo "no";
                    }
                    $cm = 0;
                    while($stmt->fetch()) {
                        if($cm==0){ ?>
                            <div class="divider"></div>
                            <div class="section" style="margin-left: 10px">
                                <div class="row nomargin">
                                    <div class="col s12 nomargin">
                                        <form method="post">
                                            <div class="col s12 m6">
                                                <b>Charm 2 :  <div class="chip" id="charmtwo_id">Select charm</div></b>
                                            </div>
                                            <div class="col s12 m6">
                                                <a class="waves-effect black waves-light btn modal-trigger black drop-d" href="#charmtwo">Choose charm 2</a>
                                            </div>
                                            <div id="charmtwo" class="modal">
                                                <div class="modal-content">
                        <?php }
                        $cm = $cm + 1; ?>
                                                    <div class="chip charmtwo-chip" value="<?php echo $chrm_id; ?>">
                                                        <img data-lazysrc="img/<?php echo $chrm_img; ?>" class="chip-img" alt="Contact Person">
                                                        <?php echo $chrm_name; ?>
                                                    </div>
                    <?php }
                    if($cm!=0){ ?>
                                                </div>
                                            </div><!-- End modal -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    $stmt->close();                    
                }
                
                //chrm extra
                if($chrm>=3){
                    if($stmt = $conn->prepare("SELECT `id`, `name`, `price`, `img` FROM `charm` WHERE name<>'' ORDER BY name ASC ")){
                        
                        $stmt->execute();
                        $stmt->bind_result($chrm_id, $chrm_name, $chrm_price, $chrm_img);
                    }else{
                        echo "no";
                    }
                    $cm = 0;
                    while($stmt->fetch()) {
                        if($cm==0){ ?>
                            <div class="divider"></div>
                            <div class="section" style="margin-left: 10px">
                                <div class="row nomargin">
                                    <div class="col s12 nomargin">
                                        <form method="post">
                                            <div class="col s12 m6">
                                                <b>Charm Extra :  <div class="chip" id="charmex_id">Select charm</div></b>
                                            </div>
                                            <div class="col s12 m6">
                                                <a class="waves-effect black waves-light btn modal-trigger black drop-d" href="#charmex">Choose charm extra</a>
                                            </div>
                                            <div id="charmex" class="modal">
                                                <div class="modal-content">
                        <?php }
                        $cm = $cm + 1; ?>
                                                    <div class="chip charmex-chip" value="<?php echo $chrm_id; ?>">
                                                        <img data-lazysrc="img/<?php echo $chrm_img; ?>" class="chip-img" alt="Contact Person">
                                                        <?php echo $chrm_name; ?>
                                                    </div>
                    <?php }
                    if($cm!=0){ ?>
                                                </div>
                                            </div>
                                            
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php }
                    $stmt->close();                    
                }
                ?>
                
                
                
                
                
                <?php 
                    //color
                    if($stmt = $conn->prepare("SELECT pc.id,pc.color,pc.cimg FROM productcolor as pc, product as p WHERE p.id=? and p.pid=pc.pid")){
                        $stmt->bind_param("s",$id);
                        $stmt->execute();
                        $stmt->bind_result($colorid, $color, $cimg);
                    }else{
                        echo "no";
                    }
                    $co = 0;
                    while($stmt->fetch()) {
                           
                        if($co==0){
                ?>
                        <div class="divider"></div>
                        <div class="section" style="margin-left: 10px">
                            <div class="row nomargin">
                                <div class="col s12 nomargin">
                                    <form method="post">
                                    <div class="input-field col s12 nomargin">
                                        <p class="nomargin" style="margin-bottom: 5px"><b class="nomargin">COLOR</b></p>
                        <?php }
                                $co=$co+1;
                                            ?>
                                            <div class="chip chip-border" value="<?php echo $colorid; ?>">
                                                <img src="img/<?php echo $cimg;?>" class="chip-img" alt="color img">
                                                <?php echo $color;?>
                                            </div>
    
                    <?php }
                                            
                            if($co!=0) {?>
                                        <!-- </select> -->
                                        <!-- <label>Color Select</label> -->
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php 
                    }
                    $stmt->close();
                //custom text input
                if($cuxtext >= 1 && $preview==1){
                ?>
                <!--Custom text Modal -->
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <div class="row normargin">
                            <h4>Customize your product</h4>
                        </div>
                        <div class="row normargin">
                            <div class="col s12 m6">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="img/mugcat1.png" >
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6">
                                <div class="row normargin">
                                    <div class="input-field col s12 m12">
                                        <input id="entee" type="text" class="validate" name="cuxtext" data-length="<?php echo $cuxtext;?>">
                                        <label for="entee">Enter text</label>
                                    </div>
                                    <div class="col s12 m6">
                                        <a class="waves-effect waves-light btn blue">Preview</a>
                                    </div>
                                    <div class="col s12">
                                        <b><i>Note : Please make sure your text is within the limit.</i></b>
                                    </div>
                                </div>    
                            </div>
                        </div>                
                    </div>            
                </div>
                <div class="divider"></div>
                <div class="section" style="margin-left: 10px">
                    <div class="row nomargin">
                        <div class="input-field col s12 nomargin">                            
                            <a class="waves-effect waves-light btn modal-trigger black drop-d" href="#modal1">Enter custom text</a>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>
                <?php }else{ ?>
                    <div class="divider"></div>
                    <div class="section" style="margin-left: 10px">
                        <div class="row nomargin">
                            <div class="input-field col s12 nomargin" style="margin-top: 10px">                            
                                <input id="entee" placeholder="custom text" type="text" data-length="<?php echo $cuxtext;?>">
                                <label for="entee">Enter custom text</label>
                            </div>
                            <div class="col s12">
                                <b><i>Note : Custom text has limit, extra text will not be considered.</i></b>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                <?php }
                if($cuxphoto != 0){
                    if ( $cuxphoto >=1 ) {
                ?>
                    <div id="modal2" class="modal">
                        <div class="modal-content">
                            <div class="row normargin">
                                <h4>Chooose custom photo 1</h4>
                            </div>
                            <div class="row normargin">
                                <form action="php/upload_photo.php" method="post" enctype="multipart/form-data">
                                    <div class="input-field col s12">
                                        <div class="file-field input-field">
                                            <div class="btn black">
                                                <span>File</span>
                                                <input type="file" name="file" id="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>            
                    </div>
                    <?php }
                    //check if 2 photo required
                    if ( $cuxphoto >= 2 ) {
                    ?>
                    <div id="modal22" class="modal">
                        <div class="modal-content">
                            <div class="row normargin">
                                <h4>Chooose custom photo 2</h4>
                            </div>
                            <div class="row normargin">
                                <form action="php/upload_photo.php" method="post" enctype="multipart/form-data">
                                    <div class="input-field col s12">
                                        <div class="file-field input-field">
                                            <div class="btn black">
                                                <span>File</span>
                                                <input type="file" name="file2" id="file2">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>            
                    </div>
                    <?php }

                    //check if 3rd photo required
                    if ( $cuxphoto >= 3 ) {
                    ?>
                    <div id="modal23" class="modal">
                        <div class="modal-content">
                            <div class="row normargin">
                                <h4>Chooose custom photo 3</h4>
                            </div>
                            <div class="row normargin">
                                <form action="php/upload_photo.php" method="post" enctype="multipart/form-data">
                                    <div class="input-field col s12">
                                        <div class="file-field input-field">
                                            <div class="btn black">
                                                <span>File</span>
                                                <input type="file" name="file3" id="file3">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>            
                    </div>
                    <?php }
                     ?>
                    <div class="divider"></div>
                    <div class="section" style="margin-left: 10px">
                        <div class="row nomargin">
                            <div class="input-field col s12 nomargin">
                                <p class="flow-text nomargin">Upload Photo</p>
                                <?php 
                                if ( $cuxphoto >= 1) { ?>
                                    <a class="waves-effect waves-light btn modal-trigger black drop-d" href="#modal2">1</a>
                                <?php }
                                if ( $cuxphoto >= 2) { ?>
                                    <a class="waves-effect waves-light btn modal-trigger black drop-d" href="#modal22">2</a>
                                <?php }
                                if ( $cuxphoto >= 3) { ?>
                                    <a class="waves-effect waves-light btn modal-trigger black drop-d" href="#modal23">3</a>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>                
                
                <?php }
                
                if( $cuxphoto != 0 ){
                ?>
                
                <div class="section" style="margin-left: 10px">
                    <div class="row nomargin">
                        <b><i>Note : The photo of the product with your image will be send within one hour of placing order.</i></b>
                    </div>
                </div>
                <div class="divider"></div>
                <?php }?>
                 <div class="section" style="margin-left: 20px">
                    <div class="row nomargin">
                        <b><p class="nomargin blue-text">Need help customising your design? <br><span class="black-text">Call us or Whatsapp us at : </span> +91 93212 25133</p></b>
                    </div>
                </div>
                <div class="divider"></div>
                
                <!--    add to cart and price    -->
                <div class="section" style="margin-left: 10px">
                    <div class="row nomargin">
                        <div class="col s12 m12 nomargin">
                            <div class="row nomargin">
                                <div class="col s14 m6">
                                    <p class="nomargin" style="font-size: 24px">
                                        <?php 
                                        if( $is_discount ){

                                        $temp_price = (int)($price-($price*($discount_per/100)));
                                        ?>
                                        <span class="orange-text">Price <strike>&#8377;<?php echo $price;?></strike><span id="aprice"><?php echo "  ".$temp_price; ?></span></span>
                                    <?php }else{ ?>
                                        <span class="orange-text">&#8377;<span id="aprice"><?php echo $price; ?></span></span>
                                    <?php }?>
                                    </p>
                                </div>
                                <div class="col s12 m6">
                                    <a class="waves-effect waves-light btn blue" style="width: 100%" id="adtocart" value="<?php echo $id;?>">Add to cart</a> 
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
        
        
        
        
        <!--   About product     -->
            <?php
                
            if($des!=null){
            ?> 
            <div class="row container">
                <p class="flow-text" style="margin-bottom: 0px">About this product</p>
                <ul class="browser-default">
                    <?php 
                    $l = explode(";",$des);

                    foreach($l as $te){
                    ?>
                    <li><?php echo $te; ?></li>
                    <?php }                
                    ?>
                </ul>
            </div>               
        <?php 
            }
                break;
            }
        }else{ ?>
            
            <div class="row container" style="margin-top:50px;height:50vh;">
                <h4 class="center-align">No product found!</h4>
            </div>
        <?php } ?>

        
        
        <!-- Footer   -->
        <footer class="page-footer black white-text">            
                <div class="row">
                    <div class="col s12 m3 offset-m1">
                        <h5 class="white-text">Products</h5>
                        <div class="row nomargin">
                            <div class="col s6">
                                <a href="product.php?cat=passportcover"><p class="nomargin grey-text text-darken-5 drop-d">Passport Cover</p></a>
                                <a href="product.php?cat=travelcover"><p class="nomargin grey-text text-darken-5 drop-d">Travel Cover</p></a>
                                <a href="product.php?cat=mousepad"><p class="nomargin grey-text text-darken-5 drop-d">Personalised Mouse Pad</p></a>
                                <a href="product.php?cat=cableholder"><p class="nomargin grey-text text-darken-5 drop-d">Cable Holder</p></a>
                                <a href="product.php?cat=cardholder"><p class="nomargin grey-text text-darken-5 drop-d">Card Holder</p></a>
                                <a href="product.php?cat=menswallet"><p class="nomargin grey-text text-darken-5 drop-d">Mens Wallet</p></a>
                                <a href="product.php?cat=ladieswallet"><p class="nomargin grey-text text-darken-5 drop-d">Ladies Wallet</p></a>
                                <a href="product.php?cat=cap"><p class="nomargin grey-text text-darken-5 drop-d">Cap</p></a>
                                <a href="product.php?cat=cardholdercase"><p class="nomargin grey-text text-darken-5 drop-d">Card holder case</p></a>
                                <a href="product.php?cat=sunglasscase"><p class="nomargin grey-text text-darken-5 drop-d">Sunglass Case</p></a>
                            </div>
                            <div class="col s6">
                                <a href="product.php?cat=keychain"><p class="nomargin grey-text text-darken-5 drop-d">Keychain</p></a>
                                <a href="product.php?cat=pillow"><p class="nomargin grey-text text-darken-5 drop-d">Pillow</p></a>
                                <a href="product.php?cat=mug"><p class="nomargin grey-text text-darken-5 drop-d">Mug</p></a>
                                <a href="product.php?cat=puzzle"><p class="nomargin grey-text text-darken-5 drop-d">Puzzle</p></a>
                                <a href="product.php?cat=engraveddiary"><p class="nomargin grey-text text-darken-5 drop-d">Engraved Diary</p></a>
                                <a href="product.php?cat=sublimationmousepad"><p class="nomargin grey-text text-darken-5 drop-d">Sublimation Mousepad</p></a>
                                <a href="product.php?cat=sublimationmousepad"><p class="nomargin grey-text text-darken-5 drop-d">Personalised Mousepad</p></a>
                                <a href="product.php?cat=badges"><p class="nomargin grey-text text-darken-5 drop-d">Badges</p></a>
                                <a href="product.php?cat=luggagetag"><p class="nomargin grey-text text-darken-5 drop-d">Luggage tag</p></a>
                                <a href="product.php?cat=mobilegadgetpouch"><p class="nomargin grey-text text-darken-5 drop-d">Mobile /Gadget Pouch</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m2">
                        <h5 class="white-text">Information</h5>
                        <div class="row" style="margin: 0px">
                            <a class="nomargin grey-text text-darken-5 modal-trigger drop-d" href="#termsncon"><p class="nomargin">Terms & Conditions</p></a>
                            <a class="nomargin grey-text text-darken-5 modal-trigger drop-d" href="#returnpolicy"><p class="nomargin">Return Policy</p></a>
                            <a href="bulkorder.html" class="nomargin grey-text text-darken-5 drop-d"><p class="nomargin">Bulk Order Inquiry</p></a>
                        </div>
                    </div>
                    <div class="col s12 m2">
                        <h5 class="white-text">Contact us</h5>
                        <div id="social">
                            <div id="container">
                                <ul>
                                    <li><a href="https://www.facebook.com/The-Vagad-Print-426933284470874/"><img src="img/addicon/face_icon.png" class="left" style="height: 30px"></a></li>
                                    <li><a href="https://www.instagram.com/thevagadprint/"><img src="img/addicon/insta_icon.png" style="height: 30px;"></a></li>
                                    <li><a href="#"><img src="img/addicon/what_icon.png" style="height: 30px;"></a></li>
                                    <!-- <li><span class="grey-text text-darken-5">Contact us +91 93212 25133</span></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m3">
                        <div class="row">
                            <div class="col s5">
                                <img src="img/V1LOGOa.png">
                            </div>
                            <div class="col s6 offset-s1">
                                <h5 class="white-text">Address</h5>                                
                                <p class="grey-text text-darken-5" style="font-size: 14px">Shop No: 1 & 2,Visa Sorathiya Vanik Niwas, Opp. McDonald’s, Kandvali Station, Kandivali(West), Mumbai-67.</p>
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="col s12">
                                
                            </div>
                            

                        </div>                        
                    </div>
                </div>
            <div class="footer-copyright">
                <div class="row">
                    <div class="white-text col s12 offset-m1">
                        © 2019 All rights reserved
                    </div>
                </div>
            </div>
        </footer>

        <!-- Modal Structure -->
        <div id="termsncon" class="modal">
            <div class="modal-content">
                <h4>Terms & Conditions</h4>
                <ol>
                    <li>Products can be replaced within 1 day of delivery, only if any defects.</li>
                    <li>Products can be replaced within 1 day of delivery, if any printing error or mistakes done by our team.</li>
                    <li>Order can be cancelled within 4 hours from the time of placement of order.</li>
                    <li>Cancellation of order will be charged.</li>                    
                </ol>                
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>

        <!-- Modal Structure -->
        <div id="returnpolicy" class="modal">
            <div class="modal-content">
                <h4>Returns & exchanges</h4>
                <ol>
                    <li>We gladly accept returns and exchanges</li>
                    <li>Contact us within: 1 days of delivery</li>
                    <li>Send items back within: 2 days of delivery</li>
                    <li>I don't accept cancellations But please contact me if you have any problems with your order.</li>
                    <li>The following items can't be returned or exchanged</li>
                </ol>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>

        <!--JavaScript at end of body for optimized loading-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/myjs.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
        
        <!-- GetButton.io widget -->
        <script type="text/javascript">
            (function () {
                var options = {
                    whatsapp: "+919321225133", // WhatsApp number
                    call_to_action: "Hi", // Call to action
                    position: "right", // Position may be 'right' or 'left'
                };
                var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
                var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
                s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
            })();
        </script>
        <!-- /GetButton.io widget -->
        
        <script type="text/javascript">
            function logout(){
                $.get("php/logout.php", function(data, status){
                    $.removeCookie('username', { path: '/' });
                    $("#user-id").hide();
                    $("#mob-acc-info").hide();
                    
                    $("#login-id").show();
                    $("#mob-log-btn").show();
                    
                    $("#userl").empty();
                    $("#mob-usr").empty();
                    M.toast({html: 'Logged out', classes: 'rounded toast-mod'});
                });
            }

            //login function
            function login(){
                if (document.cookie.indexOf('username') == -1 ) {
                    //console.log("empty");
                    $("#user-id").hide();
                    $("#mob-acc-info").hide();
                }else{
                    $("#login-id").hide();
                    $("#mob-log-btn").hide();
                    
                    $("#user-id").show();
                    $("#mob-acc-info").show();
                    
                    // $("#userl").prepend($.cookie("username"));
                    $("#mob-usr").prepend($.cookie("username"));
                }
            }
            login();


            function ReLoadImages(){
                $('img[data-lazysrc]').each( function(){
                    //* set the img src from data-src
                    $( this ).attr( 'src', $( this ).attr( 'data-lazysrc' ) );
                    }
                );
            }

            document.addEventListener('readystatechange', event => {
                if (event.target.readyState === "interactive") {  //or at "complete" if you want it to execute in the most last state of window.
                    ReLoadImages();
                }
            });
        </script>
    </body>
</html>