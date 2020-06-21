<?php 

// Start the session
session_start();

include_once("database.php");

if (isset($_SESSION["uname"])) {
    $uname = $_SESSION["uname"];
}

if( isset($_POST['promo']) ){
    $prom = $_POST['promo'];
	
    $is_discount = false;    
    
    // echo "string";

    if($stmt = $conn->prepare("SELECT `name`, `per`, `start`, `end` FROM `discount`")){
        $stmt->execute();
        $stmt->bind_result($name, $per, $start, $end);
        date_default_timezone_set('Asia/Kolkata');
        $year = date("Y");
        $month = date("m");
        $day = date("d");

        while($stmt->fetch()) {
            $temp = explode("-", $end);
            $st = explode("-", $start);
            // echo " $st[0]=$year  $st[1]=$month $st[2]=$day <br>";
            if( ($year >= $st[0] && $month >= $st[1] && $day >= $st[2]) && ($year <= $temp[0] && $month <= $temp[1] && $day <= $temp[2]) ) {
                $is_discount = true;
                // echo "stringssss";
                break;
            }
        }
    }else{
        print_r($conn->error_list);
        echo "no";
    } //end checking discount
    $stmt->close();


    $is_promocode = false;
    if($is_discount==false){
    	if($stmt = $conn->prepare("SELECT `id`, `endtime`, `percent`, `upto`, `mininum` FROM `promocode` WHERE promocode_name=?") ) {
            $stmt->bind_param("s",$prom);
            $stmt->execute();
            $stmt->bind_result( $id, $endtime, $pr, $upto, $mini);

            date_default_timezone_set('Asia/Kolkata');
            
            $year = date("Y");
            $month = date("m");
            $day = date("d");
            while($stmt->fetch()) {
            	$temp = explode("-", $endtime);        	
            	if( $year <= $temp[0] && $month <= $temp[1] && $day <= $temp[2]){
            		// echo "done";
            		// $_SESSION["promocode"] = $id;
                    $is_promocode = true;
            		break;
            	}
            }
            $stmt->close();

            if ($is_promocode) {
                
                if($stmt = $conn->prepare("SELECT cc.id, pp.price, cc.qty, cr.price FROM cart as cc,product as pp, userdata as u, charm as cr WHERE cc.ppid=pp.id and cc.uid=(select id from userdata where email=?) and (cc.crm3=cr.id ) GROUP BY cc.id")) {
                    $stmt->bind_param("s",$uname);
                    $stmt->execute();
                    $stmt->bind_result($iid,$price,$qty, $extraprice);

                    //echo "SELECT cc.id, pp.price, cc.qty, cr.price FROM cart as cc,product as pp, userdata as u, charm as cr WHERE cc.ppid=pp.id and cc.uid=(select id from userdata where email=$uname) and (cc.crm3=cr.id ) GROUP BY cc.id";

                    $total=0;
                    $fl = 0;
                    while($stmt->fetch()) {
                        if($fl == 0){
                            $total= $total + $extraprice;
                        }
                        $fl = $fl + 1;
                        //echo $price;
                        $total= $total + ((float)$price*$qty); 

                    }
                    $stmt->close();
                }

                if ($total!=0) {
                    if ($total>=$mini) {
                        $is_promocode = true;
                    }else{
                        $is_promocode = false;
                    }
                }

                if ($is_promocode == true) {
                    echo "done";
                    $_SESSION["promocode"] = $id;
                }else{
                    echo "Looks like cart amount is less!";
                }
            }else{
                echo "no promocode found";
            }
        }else{
            echo "Something went wrong2!";
            print_r($conn->error_list);
        }
    }else{
        echo "Promocode cannot be clubbed with other offers";
    }
}else{
    echo "what";
}

?>