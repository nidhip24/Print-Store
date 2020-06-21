<?php

include_once 'mail.php';

if( isset($_POST["pno"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["info"]) ){
    
    $phon = $_POST["pno"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $info = $_POST["info"];
    
    $body = "<html>";
    $body .= "<body>";
    
    $body .= "<h3>Customer Information about bulk order</h3>";
    $body .= "<table>";
    $body .= "<tr> <td><b>Name</b></td> <td>$name</td> </tr>";
    $body .= "<tr> <td><b>Phone number</b></td> <td>$phon</td> </tr>";
    $body .= "<tr> <td><b>Email ID</b></td> <td>$email</td> </tr>";
    $body .= "<tr> <td><b>Information</b></td> <td>$info</td> </tr>";
    
    $body .= "</table>";
    $body .= "</body>";
    $body .= "</html>";
    
    $m = new Mail($_POST["email"],$_POST["name"], "Bulk Order - Customer Information", $body);

    $stat = $m->sendmail();
    
    echo "<script>alert('We will get in touch with you very soon!');</script>";
    
    header('Location: ../index.html');
}

?>