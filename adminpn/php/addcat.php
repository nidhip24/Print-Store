<?php 

    // Start the session
    session_start();

    if ( isset($_SESSION["adminuname"]) ) {
        include_once("../../php/database.php");

        $allowedExts = array("png","psd","jpg","jpeg");

        if(isset($_POST["name"]) && isset($_POST["cat"]) && isset($_POST["des"]) && isset($_FILES["file"]) ){
            
            $pname = $_POST["name"];
            $subcat = $_POST["cat"];
            $des = $_POST["des"];
            
            $flag = -1;
            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if ( ($_FILES["file"]["size"] < 1000009*999) && in_array($extension, $allowedExts)){

                $nameoffile = $_FILES["file"]["name"];
                $newname = uniqid('uploaded-', true) . '.' . strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
                //echo $newname;    

                if ($_FILES["file"]["error"] > 0){
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
                }else{
                    if (file_exists("../../img/upload/" . $newname)){
                        $newname = uniqid('uploaded-', true) . '.' . strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
                        $flag = -1;
                    }else{
                        move_uploaded_file($_FILES["file"]["tmp_name"],"../../img/" . $newname);
                        //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
                        $flag = 1;
                    }
                }
            }else{
                $flag=1;
            }
            
            if($flag==1){
                
                if($stmt = $conn->prepare("INSERT INTO `product_type`( `pid`, `type`, `des`, `img` ) VALUES (?,?,?,?)" )){
                    $one = "1";
                    $stmt->bind_param("ssss", $subcat, $pname, $des, $newname);
                    $status = $stmt->execute();

                    if ($status === true) {
                        $stmt->close();
                        echo "done";
                    }else{
                        echo "no";
                    }
                }else{
                    print_r($conn->error_list);
                }
                
                
            }else{
                echo "no";
            }
            
        }else{
            echo "something is missing!";
        }
    }else{
        echo "login";
    }
?>