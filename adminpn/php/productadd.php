<?php 

    // Start the session
    session_start();
    if ( isset($_SESSION["adminuname"]) ) {
        include_once("../../php/database.php");

        $allowedExts = array("png","psd","jpg","jpeg");
        
        $f1 = false;
        $f2 = false;
        $f3 = false;
        $f4 = false;
        $f5 = false;
        $f6 = false;

        if(isset($_POST["des"]) && isset($_POST["name"]) && isset($_POST["cat2"]) && isset($_POST["price"]) && isset($_FILES["file1"]) ){
            
            $flag = -1;
            
            $pname = $_POST["name"];
            $cat2 = $_POST["cat2"];
            $price = $_POST["price"];
            $des = $_POST["des"];

            if (isset( $_POST["photo"] )) {
                $ph = $_POST["photo"];
            }else{
                $ph = 0;
            }
            
            $temp = explode(":",$cat2);        
            
            
            $extension1 = pathinfo($_FILES['file1']['name'], PATHINFO_EXTENSION);
            
            if( isset($_FILES["file2"]) ){
                $extension2 = pathinfo($_FILES['file2']['name'], PATHINFO_EXTENSION);
                $f2 = true;
    //            echo " f2 ";            
            }else{
    //            echo " no-f2 ";
            }
            if( isset($_FILES["file3"]) ){
                $extension3 = pathinfo($_FILES['file3']['name'], PATHINFO_EXTENSION);
                $f3 = true;
    //            echo " f3 ";
            }
            if( isset($_FILES["file4"]) ){
                $extension4 = pathinfo($_FILES['file4']['name'], PATHINFO_EXTENSION);
                $f4 = true;
    //            echo " f4 ";
            }
            if( isset($_FILES["file5"]) ){
                $extension5 = pathinfo($_FILES['file5']['name'], PATHINFO_EXTENSION);
                $f2 = true;
    //            echo " f5 ";
            }
            if( isset($_FILES["file6"]) ){
                $extension6 = pathinfo($_FILES['file6']['name'], PATHINFO_EXTENSION);
                $f6 = true;
    //            echo " f6 ";
            }
            
            $newname2 = "null";
            $newname3 = "null";
            $newname4 = "null";
            $newname5 = "null";
            $newname6 = "null";
            
            if ( (($_FILES["file1"]["size"] < 1000009*999) && in_array($extension1, $allowedExts)) ){
                
                $nameoffile = $_FILES["file1"]["name"];
                $newname1 = uniqid('p-', true) . '.' . strtolower(pathinfo($_FILES['file1']['name'], PATHINFO_EXTENSION));                        
                
                if ($_FILES["file1"]["error"] > 0 ){
                    echo "Return Code: " . $_FILES["file1"]["error"] . "<br />";
                }else{
                    //img1
                    if (file_exists("../../img/upload/" . $newname1)){
                        $newname1 = uniqid('p-', true) . '.' . strtolower(pathinfo($_FILES['file1']['name'], PATHINFO_EXTENSION));
                        $flag = -1;
                    }else{
                        move_uploaded_file($_FILES["file1"]["tmp_name"],"../../img/" . $newname1);                    
                        $flag = 1;
                        $f1 = true;
                    }
                    
                    //checking if img2 is available
                    if($f2){
                        
                        if ( (($_FILES["file2"]["size"] < 1000009*999) && in_array($extension2, $allowedExts)) ){
                
                            $nameoffile = $_FILES["file2"]["name"];
                            $newname2 = uniqid('p-', true) . '.' . strtolower(pathinfo($_FILES['file2']['name'], PATHINFO_EXTENSION));                        

                            if ($_FILES["file2"]["error"] > 0 ){
                                echo "Return Code: " . $_FILES["file2"]["error"] . "<br />";
                            }else{
                                //img2
                                if (file_exists("../../img/upload/" . $newname2)){
                                    $newname2 = uniqid('p-', true) . '.' . strtolower(pathinfo($_FILES['file2']['name'], PATHINFO_EXTENSION));
                                    $flag = -1;
                                    $f2 = false;
                                }else{
                                    move_uploaded_file($_FILES["file2"]["tmp_name"],"../../img/" . $newname2);                    
                                    $flag = 1;
                                    $f2 = true;
                                }
                            }                                        
                        }else{
                            $f2 = false;
                        }
                    }else{
                        $newname2 = "null";
                    }
                    
                    //checking if img3 is available
                    if($f3){
                        
                        if ( (($_FILES["file3"]["size"] < 1000009*999) && in_array($extension3, $allowedExts)) ){
                
                            $nameoffile = $_FILES["file3"]["name"];
                            $newname3 = uniqid('p-', true) . '.' . strtolower(pathinfo($_FILES['file3']['name'], PATHINFO_EXTENSION));                        

                            if ($_FILES["file3"]["error"] > 0 ){
                                echo "Return Code: " . $_FILES["file3"]["error"] . "<br />";
                            }else{
                                //img2
                                if (file_exists("../../img/upload/" . $newname3)){
                                    $newname3 = uniqid('p-', true) . '.' . strtolower(pathinfo($_FILES['file3']['name'], PATHINFO_EXTENSION));
                                    $flag = -1;
                                    $f3 = false;
                                }else{
                                    move_uploaded_file($_FILES["file3"]["tmp_name"],"../../img/" . $newname3);                    
                                    $flag = 1;
                                    $f3 = true;
                                }
                            }                                        
                        }else{
                            $f3 = false;
                        }
                    }else{
                        $newname3 = "null";
                    }
                    
                    //checking if img4 is available
                    if($f4){
                        
                        if ( (($_FILES["file4"]["size"] < 1000009*999) && in_array($extension4, $allowedExts)) ){
                
                            $nameoffile = $_FILES["file4"]["name"];
                            $newname4 = uniqid('p-', true) . '.' . strtolower(pathinfo($_FILES['file4']['name'], PATHINFO_EXTENSION));                        

                            if ($_FILES["file4"]["error"] > 0 ){
                                echo "Return Code: " . $_FILES["file4"]["error"] . "<br />";
                            }else{
                                //img2
                                if (file_exists("../../img/upload/" . $newname4)){
                                    $newname4 = uniqid('p-', true) . '.' . strtolower(pathinfo($_FILES['file4']['name'], PATHINFO_EXTENSION));
                                    $flag = -1;
                                    $f4 = false;
                                }else{
                                    move_uploaded_file($_FILES["file4"]["tmp_name"],"../../img/" . $newname4);                    
                                    $flag = 1;
                                    $f4 = true;
                                }
                            }                                        
                        }else{
                            $f4 = false;
                        }
                    }else{
                        $newname4 = "null";
                    }
                    
                    //checking if img5 is available
                    if($f5){
                        
                        if ( (($_FILES["file5"]["size"] < 1000009*999) && in_array($extension5, $allowedExts)) ){
                
                            $nameoffile = $_FILES["file5"]["name"];
                            $newname5 = uniqid('p-', true) . '.' . strtolower(pathinfo($_FILES['file5']['name'], PATHINFO_EXTENSION));                        

                            if ($_FILES["file5"]["error"] > 0 ){
                                echo "Return Code: " . $_FILES["file5"]["error"] . "<br />";
                            }else{
                                //img2
                                if (file_exists("../../img/upload/" . $newname5)){
                                    $newname5 = uniqid('p-', true) . '.' . strtolower(pathinfo($_FILES['file5']['name'], PATHINFO_EXTENSION));
                                    $flag = -1;
                                    $f5 = false;
                                }else{
                                    move_uploaded_file($_FILES["file5"]["tmp_name"],"../../img/" . $newname5);                    
                                    $flag = 1;
                                    $f5 = true;
                                }
                            }                                        
                        }else{
                            $f5 = false;
                        }
                    }else{
                        $newname5 = "null";
                    }
                    
                    
                    //checking if img2 is available
                    if($f6){
                        
                        if ( (($_FILES["file6"]["size"] < 1000009*999) && in_array($extension6, $allowedExts)) ){
                
                            $nameoffile = $_FILES["file6"]["name"];
                            $newname6 = uniqid('p-', true) . '.' . strtolower(pathinfo($_FILES['file6']['name'], PATHINFO_EXTENSION));                        

                            if ($_FILES["file6"]["error"] > 0 ){
                                echo "Return Code: " . $_FILES["file6"]["error"] . "<br />";
                            }else{
                                //img2
                                if (file_exists("../../img/upload/" . $newname6)){
                                    $newname6 = uniqid('p-', true) . '.' . strtolower(pathinfo($_FILES['file6']['name'], PATHINFO_EXTENSION));
                                    $flag = -1;
                                    $f6 = false;
                                }else{
                                    move_uploaded_file($_FILES["file6"]["tmp_name"],"../../img/" . $newname6);                    
                                    $flag = 1;
                                    $f6 = true;
                                }
                            }                                        
                        }else{
                            $f6 = false;
                        }
                    }else{
                        $newname6 = "null";
                    }
                    
                    
                    
                }
                if( count($temp) == 2 ){
                    $ct = $temp[0];
                    $ptid = $temp[1];
                }else{
                    $flag = -1;
                }
            }else{
                $flag=-1;
            }
            
            
            if($f1){
                
                if($stmt = $conn->prepare("INSERT INTO `product`(`pid`, `ptid`, `photo`, `name`, `price`, `des`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6` ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)" )){
    //                $sql = "INSERT INTO `product`(`pid`, `name`, `price`, `img1`, `img2`, `img3`, `img4`) VALUES ($cat, '$pname', $price, '$newname1', '$newname2', '$newname3','$newname4')";
                    $stmt->bind_param("ssssssssssss", $ct, $ptid, $ph, $pname, $price, $des, $newname1, $newname2, $newname3, $newname4, $newname5, $newname6);
                    $status = $stmt->execute();

                    if ($status === true) {
                        $stmt->close();
                        echo "done";
                    }else{
                        echo "no3";
                    }
                }else{
                    print_r($conn->error_list);
                }
                
                
            }else{
                echo "no2";
            }
            
        }else{
            echo "no1";
        }
    }else{
        echo "login";
    }

    ?>