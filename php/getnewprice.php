<?php
	// Start the session
	session_start();

    include_once("database.php");
	   
    if (isset($_SESSION["uname"])) {
        $uname = $_SESSION["uname"];
        $promocode = $_SESSION["promocode"];
        if($stmt = $conn->prepare("SELECT cc.id,pp.price,cc.qty, cr.price FROM cart as cc,product as pp, userdata as u, charm as cr WHERE cc.ppid=pp.id and cc.uid=(select id from userdata where email=?) and (cc.crm3=cr.id ) GROUP BY cc.id")) {
            $stmt->bind_param("s",$uname);
            $stmt->execute();
            $stmt->bind_result($id,$price,$qty,$extraprice);

            //echo "UPDATE `cart` SET `qty`= ".$_POST['qty']." WHERE id=".$_POST['cid'];
            $total=0;
            $temp_f =0;
            while($stmt->fetch()) {
                //echo $price;
                if( $temp_f==0){
                    $total = $total + $extraprice;
                }
                $temp_f = $temp_f + 1;
                $total= $total + ((float)$price*$qty); 
                
            }
            $stmt->close();

            // echo $total;
            if($total!=0){
                if($stmt = $conn->prepare("SELECT `percent`, `upto` FROM `promocode` WHERE id=?") ) {
                    $stmt->bind_param("s",$promocode);
                    $stmt->execute();
                    $stmt->bind_result( $per, $upto );

                    while($stmt->fetch()) {
                        $dis = $total*( $per/100);
                    }
                    if($dis>$upto){
                        // echo $total - $upto;
                        $temp = $total - $upto;
                        echo "<strike>$total</strike>$temp";
                    }else{
                        // $total = $total - $dis;
                        $tmp = $total - $dis;
                        echo "<strike>$total</strike>$tmp";
                        // echo $total;
                    }
                }else{
                    echo "no";
                }
            }
        }else{
            echo "no";
        }
    }else{
        echo "no";
    }