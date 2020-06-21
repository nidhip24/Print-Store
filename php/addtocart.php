<?php 

    // Start the session
    session_start();

    include_once("database.php");

    $allowedExts = array("png","psd","jpg","jpeg","pdf","tiff","eps","ai");
    

    $id = null;
    $catid = "30";
    $colorid = "3";

    $crm1 = "3";
    $crm2 = "3";
    $crm3 = "3";

    $ctxt = null;
    $flag_file = false;
    $flag_file2 = false;
    $flag_file3 = false;

    $newname = "null";
    $newname2 = "null";
    $newname3 = "null";

    if( isset($_POST["id"]) ){
        $id = $_POST["id"];
    }
    
    if( isset($_POST["colorid"]) ){
        $colorid = $_POST["colorid"];
    }
    if( isset($_POST["ctxt"]) ){
        $ctxt = $_POST["ctxt"];
    }

    if( isset($_FILES["file"]) ){
        $flag_file = true;
    }
    if( isset($_FILES["file2"]) ){
        $flag_file2 = true;
    }
    if( isset($_FILES["file3"]) ){
        $flag_file3 = true;
    }

    if( isset($_POST["crm1"]) ){
        $crm1 = $_POST["crm1"];
    }if( isset($_POST["crm2"]) ){
        $crm2 = $_POST["crm2"];
    }if( isset($_POST["crm3"]) ){
        $crm3 = $_POST["crm3"];
    }
    
    if (isset($_SESSION["uname"])) {
        $flag = -1;    
        
        //for img1
        if($flag_file){
            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);            
            if ( ($_FILES["file"]["size"] < 1000009*999) && in_array($extension, $allowedExts)){

                $nameoffile = $_FILES["file"]["name"];
                $newname = uniqid('uploaded-', true) . '.' . strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

                if ($_FILES["file"]["error"] > 0){
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
                }else{
                    if (file_exists("../img/upload/" . $newname)){
                        $newname = uniqid('uploaded-', true) . '.' . strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
                    }else{
                        move_uploaded_file($_FILES["file"]["tmp_name"],"../img/upload/" . $newname);
                        $flag = 1;
                    }
                }
            }else{
                echo "Extension not allowed";
            }
        }else{
            $flag=1;
        }//end img1

        //for img2
        if($flag_file2){
            $extension = pathinfo($_FILES['file2']['name'], PATHINFO_EXTENSION);            
            if ( ($_FILES["file2"]["size"] < 1000009*999) && in_array($extension, $allowedExts)){

                $nameoffile = $_FILES["file2"]["name"];
                $newname2 = uniqid('uploaded-', true).'.'.strtolower(pathinfo($_FILES['file2']['name'], PATHINFO_EXTENSION));

                if ($_FILES["file2"]["error"] > 0){
                    echo "Return Code: " . $_FILES["file2"]["error"] . "<br />";
                }else{
                    if (file_exists("../img/upload/" . $newname2)){
                        $newname2 = uniqid('uploaded-', true) . '.' . strtolower(pathinfo($_FILES['file2']['name'], PATHINFO_EXTENSION));
                    }else{
                        move_uploaded_file($_FILES["file2"]["tmp_name"],"../img/upload/" . $newname2);
                        $flag = 1;
                    }
                }
            }else{
                echo "Extension not allowed";
            }
        }else{
            $flag=1;
        }//end img2

        //for img3
        if($flag_file3){
            $extension = pathinfo($_FILES['file3']['name'], PATHINFO_EXTENSION);            
            if ( ($_FILES["file3"]["size"] < 1000009*999) && in_array($extension, $allowedExts)){

                $nameoffile = $_FILES["file3"]["name"];
                $newname3 = uniqid('uploaded-', true).'.'.strtolower(pathinfo($_FILES['file3']['name'], PATHINFO_EXTENSION));

                if ($_FILES["file3"]["error"] > 0){
                    echo "Return Code: " . $_FILES["file3"]["error"] . "<br />";
                }else{
                    if (file_exists("../img/upload/" . $newname3)){
                        $newname3 = uniqid('uploaded-', true) . '.' . strtolower(pathinfo($_FILES['file3']['name'], PATHINFO_EXTENSION));
                    }else{
                        move_uploaded_file($_FILES["file3"]["tmp_name"],"../img/upload/" . $newname3);
                        $flag = 1;
                    }
                }
            }else{
                echo "Extension not allowed";
            }
        }else{
            $flag=1;
        }//end img3


        if($flag==1){
            $uname = $_SESSION['uname'];
//            echo "id $uname $id $catid , $colorid , $ctxt , $newname";
            
            if($stmt = $conn->prepare("INSERT INTO `cart`( `uid`, `ppid`, `pcolorid`, `crm1`, `crm2`, `crm3`, `qty`, `text`, `photo`, `photo2`, `photo3`) VALUES ((SELECT id FROM `userdata` WHERE email=?),?,?,?,?,?,?,?,?,?,?)" )){
                $one = "1";
                
                $stmt->bind_param("sssssssssss", $uname, $id, $colorid, $crm1, $crm2, $crm3, $one, $ctxt, $newname, $newname2, $newname3);
                $status = $stmt->execute();

               // echo "INSERT INTO `cart`( `uid`, `ppid`, `pcolorid`, `crm1`, `crm2`, `crm3`, `qty`, `text`, `photo`) VALUES ((SELECT id FROM `userdata` WHERE email=$uname), $id, $colorid, $crm1, $crm2, $crm3, $one, $ctxt, $newname)";
                
                if ($status === true) {
                    $stmt->close();
                    echo "done";
                }else{
                    echo "no";
                }
            }else{
                print_r($conn->error_list);
            }
        }
        
    }else{
        echo "login";
    }

?>