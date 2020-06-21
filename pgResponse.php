<?php

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// Start the session
session_start();

include_once("php/database.php");
include_once 'php/mail.php';
include_once 'php/SMS.php';

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$uname = $_SESSION["uname"];

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

$statuss = "failed";

if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		
        //Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
        $odid = $_POST['ORDERID'];
        $amt = $_POST['TXNAMOUNT'];
        
        $conn -> autocommit(FALSE);
        
        $flag = -1;
        //charm details
        $cart_item_ids = array();
        $charmss = array();
        if($stmt = $conn->prepare("SELECT `id`, `uid`, `order_num`, `item_id`, `amt` FROM `order_detail` WHERE order_num=? and stat='pending'")){
            $stmt->bind_param("s", $odid);
            $stmt->execute();
            $stmt->bind_result( $oid, $ouid, $order_num, $item_ids, $oamt );
//            echo $odid;
            while($stmt->fetch()) {
                // echo "$order_num == $odid && $oamt ==  $amt";
                $oamt_t = number_format((float)$oamt, 2, '.', '');
                if($order_num == $odid && $oamt_t ==  $amt){
                    $flag = 1; 
                    $statuss = "sucess";
                    $cart_item_ids = explode(":", $item_ids);
//                    print_r($tp);
//                    echo "alaaaaaaaaaaaaaaaaaaaaaaaaa $item_ids";
                    break;
                }                
            }
        }else{
        //                print_r($conn->error_list);
            echo "cannot get order details";
        }
        $stmt->close();
        
        //getting address details from OrderID
        $cus_dets = array();
        if($stmt = $conn->prepare("SELECT `name`, `phonenum`, `email`, `addr` FROM `addr` as ad, `order_detail` as od WHERE ad.id=(SELECT arid FROM `order_detail` WHERE order_num=?) ")){
            $stmt->bind_param("s", $odid);
            $stmt->execute();
            $stmt->bind_result( $cus_name, $cus_phone, $cus_email, $cus_adr);
//            echo $odid;
            while($stmt->fetch()) {
                $cus_dets = array( $cus_name, $cus_phone, $cus_email, $cus_adr );
                echo "mzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz";
                break;
            }
        }else{
        //                print_r($conn->error_list);
            echo "cannot get order details";
        }
        $stmt->close();


        if($flag == 1){
            $flag = -1;
            if($stmt = $conn->prepare("UPDATE `order_detail` SET `stat`= ? WHERE order_num=?")) {
	    		$stmt->bind_param("ss", $statuss, $odid);
	            $status = $stmt->execute();

	            //echo "UPDATE `cart` SET `qty`= ".$_POST['qty']." WHERE id=".$_POST['cid'];
	            if ($status===true) {
	            	echo "done";
                    $flag = 1;
	            }else{
	            	echo "something went wrong updating";
	            }
	    	}else{
	    		echo "update failed";
	    	}
        }
        
        
        $arr1 = array();
        if($stmt = $conn->prepare("SELECT c.uid, c.crm1, c.crm2, c.crm3, p.name, p.price, c.photo, c.photo2, c.photo3, pc.product, pt.type, c.text, c.qty, pcol.color, cr.price FROM product as p, productcontent as pc, product_type as pt, productcolor as pcol, userdata as u, cart as c, charm as cr WHERE c.uid=(SELECT id from userdata WHERE email=?) and (c.ppid=p.id and p.ptid=pt.id and p.pid=pc.id) and c.pcolorid=pcol.id and (c.crm3=cr.id ) GROUP by c.id")){
            $stmt->bind_param("s",$uname);
            $stmt->execute();
            $stmt->bind_result($uid, $c1, $c2, $c3, $pname, $price, $img, $img2, $img3, $cat, $subcat, $cuxtext, $qty, $colr, $exprice);
            
            while($stmt->fetch()) {
                //img
                if($img==""){
                    $temp_img = "null"; 
                }else{
                    $temp_img = $img;
                }
                //img2
                if($img2==""){
                    $temp_img2 = "null"; 
                }else{
                    $temp_img2 = $img2;
                }
                //img3
                if($img3==""){
                    $temp_img3 = "null"; 
                }else{
                    $temp_img3 = $img3;
                }
                
                //subcat
                if($subcat==""){
                    $temp_cat = "null"; 
                }else{
                    $temp_cat = $subcat;
                }
                
                //cuxtext
                if($cuxtext==""){
                    $temp_text = "null"; 
                }else{
                    $temp_text = $cuxtext;
                }
                
                //color
                if($colr==""){
                    $temp_colo = "null"; 
                }else{
                    $temp_colo = $colr;
                }
                array_push($arr1,array( $uid, $c1, $c2, $c3, $pname, $price, $temp_img, $cat, $temp_cat, $temp_text, $qty, $temp_colo, $img2, $img3 ));
            }
        }else{
        //                print_r($conn->error_list);
            echo "no";
        }
        $stmt->close();
        
        //charm details
        $charmss = array();
        if($stmt = $conn->prepare("SELECT `id`, `name` FROM `charm` WHERE name<>''")){            
            $stmt->execute();
            $stmt->bind_result( $crid, $crname );
            
            while($stmt->fetch()) {
                array_push( $charmss, array( $crid, $crname) );
            }
        }else{
        //                print_r($conn->error_list);
            echo "no";
        }
        $stmt->close();
        
        $finalprod = array(); 
        foreach ($arr1 as $it){
            $charmone = "null";
            $charmtwo = "null";
            $charmthe = "null";
            foreach ($charmss as $csss){
                if($csss[0]==$it[1]){
                    $charmone = $csss[1];
                }
                if($csss[0]==$it[2]){
                    $charmtwo = $csss[1];
                }
                if($csss[0]==$it[3]){
                    $charmthe = $csss[1];
                }
            }
            array_push( $finalprod,array( $it[0], $charmone, $charmtwo, $charmthe, $it[4], $it[5], $it[6], $it[7], $it[8], $it[9], $it[10], $it[11], $it[12], $it[13]) );
            
            //$uid 0, $c1 1, $c2 2, $c3 3, $pname 4, $price 5, $img 6, $cat 7, $subcat 8, $cuxtext 9, $qty 10, $colr 11
        }
        
        $f = -1;
        //confirming order
        $mail_prod = array();
        foreach($finalprod as $ii){
            if($stmt = $conn->prepare("INSERT INTO `order_item`( `order_num`, `product_name`, `product_category`, `product_sub_type`, `color_name`, `qty`, `text`, `img_name`, `img_name2`, `img_name3`, `charm1`, `charm2`, `charm3`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)" )){
                $stmt->bind_param("sssssssssssss", $odid, $ii[4], $ii[7], $ii[8], $ii[11], $ii[10], $ii[9], $ii[6], $ii[12], $ii[13], $ii[1], $ii[2], $ii[3] );
                $status = $stmt->execute();                                
                
                array_push($mail_prod, array($ii[4], $ii[7], $ii[8], $ii[1], $ii[2], $ii[3], $ii[9], $ii[10]) );
                //0 pname, 1 cat, 2, subcat, 3 c1, 4 c2, 5 c3, 6 cuxtext, 7qty

                if ($status === true) {
                    $stmt->close();
                    $f = 1;
                    echo "done $f<br>";
        //            echo "done";
                }else{
                    echo "Something went wrong!1";
                }
        //                        echo "ok";
            }else{
                print_r($conn->error_list);
                echo "no errrror";
            }    
        }
        
        $cat_id = "";
        $fla = 0;
        foreach($cart_item_ids as $i){
            if( $fla==0 ){
                $cat_id = "". $i;
            }else{
                $cat_id = "$cat_id,". $i;
            }
            $fla = $fla+1;
        }
        
        
        //deleting items from cart
        $f2 = -1;
//        echo "<script>alert($cat_id);</script>";
        $sql = "DELETE FROM `cart` WHERE id IN ($cat_id)";
//        echo $sql;
        if($stmt = $conn->prepare( $sql )){
//            $stmt->bind_param("s", );
            $status = $stmt->execute();
//            echo "DELETE FROM `cart` WHERE id IN ($cat_id)";
            if ($status === true) {
                $stmt->close();
                $f2 = 1;
    //            echo "done";
            }else{
                echo "Something went wrong!2";
            }
    //                        echo "ok";
        }else{
            print_r($conn->error_list);
            echo "no errrrorsss";
        } 
        
        // Commit transaction
        if($f==1 && $f2==1){
            if (!$conn-> commit()) {
                echo "Commit transaction failed";

                $body = "<html>";
                $body .= "<body>";
                $body .= "<div class='col s12 white' style='padding-top: 20px'>";
                $body .= "<b class='tcpadding'>Order ID : $odid</b>";

                $body .= "<br><br><b class='tcpadding'>Something went weong.<br> If money is deductated from your accout please contact us with OrderID provided in the Email.</b>";
                
                $body .= "</div>";

                $body .= "</body>";
                $body .= "</html>";


                $m = new Mail($cus_dets[2], $cus_dets[0], "Order Confirmation", $body);

                $stat = $m->sendmail();
                // echo $cus_dets[2] . " ". $cus_dets[0];
                if($stat ==1){
                    header("Location: orderstat.php?status=failed");
                    die();    
                }else{
                    header("Location: orderstat.php?status=failed");
                    die();    
                }

            }else{
                
                $body = "<html>";
                $body .= "<head>";

                $body .= "<style type='text/css'>";
                $body .= ".blue{ background-color: #2196F3 !important; }";
                $body .= ".blue-text { color: #2196F3 !important; }";
                $body .= ".white-text { color: #FFFFFF !important; }";
                $body .= ".pink { background-color: #e91e63 !important; }";
                $body .= ".row .col.s12 {   width: 100%; margin-left: auto; left: auto; right: auto; }";
                $body .= ".white { background-color: #FFFFFF !important; }";
                $body .= ".white-text {color: #FFFFFF !important;   }";
                $body .= ".divider { height: 1px;   overflow: hidden; background-color: #e0e0e0; }";
                $body .= ".flow-text { font-size: 1.392rem;}";
                $body .= "</style>";

                $body .= "</head>";
                $body .= "<body>";

                $body .= "<div class='row' style='padding: 30px'>";
                $body .= "<div class='col s12 blue' style='padding: 10px'>";
                $body .= "<h2 class='white-text'>Order Summary</h2>";
                $body .= "</div>";

                $body .= "<div class='col s12 white' style='padding-top: 20px;padding:10px'>";
                $body .= "<b class='tcpadding'>Order ID : $odid</b>";
                $mmm = count($finalprod);
                $body .= "<p class='amt cpadding'>Amount : $amt | items : $mmm</p>";
                $body .= "</div>";
                foreach($mail_prod as $m){
                    //0 pname, 1 cat, 2 subcat, 3 c1, 4 c2, 5 c3, 6 cuxtext, 7qty

                    $body .= "<div class='col s12 white' style='padding: 10px'>";
                    $body .= "<b>Product Name : $m[0]</b>";
                    $body .= "<p class='blue-text' style='font-weight:bold;margin:0px'>Quantity: $m[7]</p>";
                    $body .= "<p style='margin-bottom:2px;margin:0px'>Category: $m[1]</p>";
                    if( $m[3]!= "null"){
                        $body .= "<p style='margin-bottom:2px;margin:0px'>Sub Category: $m[2]</p>";    
                    }
                    if( $m[6] != "null"){
                        $body .= "<p style='margin-bottom:2px;margin:0px'>Custom text: $m[6]</p>";    
                    }
                    if( $m[3] != "null"){
                        $body .= "<p style='margin-bottom:2px;margin:0px'>Charm 1: $m[3]</p>";    
                    }
                    if( $m[4] != "null"){
                        $body .= "<p style='margin-bottom:2px;margin:0px'>Charm 1: $m[4]</p>";    
                    }
                    if( $m[5] != "null"){
                        $body .= "<p style='margin-bottom:2px;margin:0px'>Charm 1: $m[5]</p>";    
                    }
                    
                    $body .= "</div>";
                }

                $body .= "<div class='col s12'>";
                $body .= "<div class='divider'></div>";
                $body .= "</div>";

                $body .= "<div class='col s12 white' style='padding: 10px'>";
                $body .= "<p class='flow-text' style='margin: 0px'>Total : $amt</p>";
                $body .= "</div>";
                $body .= "</div>";
                $body .= "</body>";
                $body .= "</html>";
                
                //$cus_name, $cus_phone, $cus_email, $cus_adr
                
                $m = new Mail($cus_dets[2], $cus_dets[0], "Order Confirmation", $body);

                $stat = $m->sendmail();

                //sending sms
                $tmp = new SMS($cus_dets[1],"Hey! Your order (ID : $odid) has been placed & the details have been mailed to you. Thank you for shopping with The Vagad Store.");
                $tmp->sendsms();

                // echo $cus_dets[2] . " ". $cus_dets[0];
                if($stat ==1){
                    header("Location: orderstat.php?status=conf");
                    die();    
                }else{
                    header("Location: orderstat.php?status=conf");
                    die();    
                }
            }    
        }
        

        // Close connection
        $conn->close();
        
        
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
        
        $odid = $_POST['ORDERID'];
        $conn -> autocommit(FALSE);
        if($stmt = $conn->prepare("UPDATE `order_detail` SET `stat`= ? WHERE order_num=?")) {
            $stmt->bind_param("ss", $statuss, $odid);
            $status = $stmt->execute();

            //echo "UPDATE `cart` SET `qty`= ".$_POST['qty']." WHERE id=".$_POST['cid'];
            if ($status===true) {
                echo "done";
                $flag = 1;
            }else{
                echo "something went wrong updating";
            }
        }else{
            echo "update failed";
        }

        //getting address details from OrderID
        $cus_dets = array();
        if($stmt = $conn->prepare("SELECT `name`, `phonenum`, `email`, `addr` FROM `addr` as ad, `order_detail` as od WHERE ad.id=(SELECT arid FROM `order_detail` WHERE order_num=?) ")){
            $stmt->bind_param("s", $odid);
            $stmt->execute();
            $stmt->bind_result( $cus_name, $cus_phone, $cus_email, $cus_adr);
//            echo $odid;
            while($stmt->fetch()) {
                $cus_dets = array( $cus_name, $cus_phone, $cus_email, $cus_adr );
                echo "mzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz";
                break;
            }
        }else{
        //                print_r($conn->error_list);
            echo "cannot get order details";
        }
        $stmt->close();


        // Commit transaction
        if (!$conn -> commit()) {
            echo "Commit transaction failed";
        }
            // header("Location: orderstat.php?status=failed");
            // die();
        // }else{
            // header("Location: orderstat.php?status=failed");
            // die();
        // }

        $body = "<html>";
        $body .= "<body>";
        $body .= "<div class='col s12 white' style='padding-top: 20px'>";
        $body .= "<b class='tcpadding'>Order ID : $odid</b>";

        $body .= "<br><br><b class='tcpadding'>Transaction Failed or cancelled by the user.</b>";
        
        $body .= "</div>";

        $body .= "</body>";
        $body .= "</html>";


        $m = new Mail($cus_dets[2], $cus_dets[0], "Order Transaction Failed", $body);

        $stat = $m->sendmail();

        $tmp = new SMS($cus_dets[1],"Hey unfortunately, your order (ID : $odid) could not be placed due to payment failure.");
                $tmp->sendsms();
        // echo $cus_dets[2] . " ". $cus_dets[0];
        if($stat ==1){
            header("Location: orderstat.php?status=failed");
            die();    
        }else{
            header("Location: orderstat.php?status=failed");
            die();    
        }

        // Close connection
        $conn->close();
	}	
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>