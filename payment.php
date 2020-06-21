<?php 

	// Start the session
	session_start();

?>
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
        <title>The Vagad Print Store</title>

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
        if(isset($_SESSION["uname"]) && isset($_POST['group1']) && isset($_POST['total']) ){
            unset($_SESSION['orderproc']);
            $address_id = $_POST['group1'];
            $total = $_POST['total'];
            // $_SESSION["orderproc"] = "";
            ?>
            
            <div class="row">
                <div class="col s12 m4 offset-m4 center">
                    <p style="font-weight:400;font-size:18px" class="grey-text text-darken-1">My Cart > Address > <b>Payment</b></p>
                </div>
                <div class="col s12">
                    <div class="divider"></div>
                </div>
                <div class="col s12" style="margin-top : 20px">
                    <div class="container">
                        <form action="pgRedirect.php" method="post" id="payment-form">
                            <div class="col s12 m8">
                                <p class="grey-text text-darken-1" style="font-size:20px">Wallet</p>
                                <img src="img/paytm.png" style="border : 1px blue solid">
                                
                            </div>
                            <div class="col s12 m4">
                                <p class="grey-text text-darken-1" style="font-size:20px">Billing Details</p>
                                <div class="divider"></div>
                                <p class="grey-text text-darken-1" style="font-size:14px">Cart total <span class="right">Rs. <?php echo $total;?></span></p>
                                <div class="divider"></div>
                                <p class="grey-text text-darken-1" style="font-size:14px">Shipping Charges <span class="right blue-text">Free</span></p>
                                <div class="divider"></div>
                                <p class="grey-text text-darken-1" style="font-size:16px"><b>Total Payable <span class="right blue-text">Rs. <?php echo $total;?></span></b></p>
                                <div class="divider"></div>                                
                                <input type="hidden" name="addr_id" value="<?php echo $address_id;?>">
                                <button class="waves-effect waves-light btn pink col s12" style="margin-top:10px">Place Order</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
        <?php 
        }else{ ?>
            <div class="row container center" style="min-height:350px">
                <h4>Error please try again after some time!</h4>
            </div>
        <?php }
        
        ?>
        
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
        </script>
    </body>
</html>