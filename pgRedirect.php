<?php

// Start the session
session_start();

include_once("php/database.php");

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$checkSum = "";
$paramList = array();

$addresss = $_POST["addr_id"];
if(isset($_SESSION["uname"])){
    $uname = $_SESSION["uname"];
}

$emailID = "";
$pn = 0;

//checking if discount is available
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
            break;
        }
    }
}else{
    //print_r($conn->error_list);
    echo "no";
} //end checking discount
$stmt->close();

$ORDER_ID         = "OD" . rand(10000,99999999);
$INDUSTRY_TYPE_ID = "Retail";
$CHANNEL_ID       = "WEB";


$cart_id = "";
//getting total amt, emailid and phone number
if($stmt = $conn->prepare("SELECT cc.id,pp.price,cc.qty, u.email, u.phonenumber, cr.price FROM cart as cc,product as pp, userdata as u, charm as cr WHERE cc.ppid=pp.id and cc.uid=(select id from userdata where email=?) and (cc.crm3=cr.id ) GROUP BY cc.id")) {
    $stmt->bind_param("s",$uname);
    $stmt->execute();
    $stmt->bind_result( $id, $price, $qty, $uemai, $pnumber, $extraprice);

    //echo "UPDATE `cart` SET `qty`= ".$_POST['qty']." WHERE id=".$_POST['cid'];
    $total=0;
    while($stmt->fetch()) {
        //echo $price;
        if($total == 0 ){
            $cart_id = $id;
            $total= $total + $extraprice;
        }else{
            $cart_id = $cart_id .":". $id;
        }
        $total= $total + ((float)$price*$qty); 
        
        $emailID = $uemai;
        $pn = $pnumber;
    }
    $stmt->close();

    //applying discount
    if( $is_discount ){                            
        $temp_price = (int)($total-($total*($discount_per/100)));
        $total = $temp_price;
        // echo $totalprice;
    }
    
    //checking if promocode has been applied
    $flago = -1;
    if ( isset($_SESSION["promocode"])) {
        $promocode = $_SESSION["promocode"];
        if($total!=0){
            if($stmt = $conn->prepare("SELECT `percent`, `upto` FROM `promocode` WHERE id=?") ) {
                $stmt->bind_param("s",$promocode);
                $stmt->execute();
                $stmt->bind_result( $per, $upto );

                while($stmt->fetch()) {
                    $dis = $total*( $per/100);
                }
                if($dis>$upto){
                    $total = $total - $upto;
                }else{
                    $total = $total - $dis;
                }
                $flago = 1;
                $stmt->close();
            }else{
                echo "no";
            }
        }
    }
    
    //setting order as pending 
    if( $flago == -1 ){
        if($stmt = $conn->prepare("INSERT INTO `order_detail`( `uid`, `arid`, `order_num`, `item_id`, `amt`) VALUES ((select id from userdata where email=?),?,?,?,?)" )){
            $stmt->bind_param("sssss", $uname, $addresss, $ORDER_ID, $cart_id, $total);
            $status = $stmt->execute();

            if ($status === true) {            
                echo "done";
            }else{
                echo "Something went wrong!";
            }
            $stmt->close();
    //                       echo "ok";
        }else{
            print_r($conn->error_list);
            echo "no errrror";
        }    
    }else{
        unset($_SESSION['promocode']);
        if($stmt = $conn->prepare("INSERT INTO `order_detail`( `uid`, `arid`, `order_num`, `item_id`, `amt` , `promocode_id`) VALUES ((select id from userdata where email=?),?,?,?,?,?)" )){
            $stmt->bind_param("ssssss", $uname, $addresss, $ORDER_ID, $cart_id, $total, $promocode);
            $status = $stmt->execute();

            if ($status === true) {            
                echo "done";
            }else{
                echo "Something went wrong!";
            }
            $stmt->close();
    //                       echo "ok";
        }else{
            print_r($conn->error_list);
            echo "no errrror";
        }
    }
    
    
}else{
    echo "no";
}
$CUST_ID          = $id;
$TXN_AMOUNT       = $total;
$MSISDN           = $pn;
$EMAIL            = $emailID;

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;


$paramList["CALLBACK_URL"] = "http://localhost/mugshop/pgResponse.php";
$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer

$paramList["VERIFIED_BY"] = $uemai; //
$paramList["IS_USER_VERIFIED"] = "YES"; //
/*
*/

//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>