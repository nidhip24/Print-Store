<?php
    // Start the session
    session_start();

    if ( isset($_SESSION["adminuname"]) ) {
?>

<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

        <link type="text/css" rel="stylesheet" href="../css/ad.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
<!--        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>-->
        
    </head>
    <body class="back-color-blak">
        
        
        <div class="row nomargin " style="min-height:450px">
            <div class="col s12 m2">                
                <div class="sidenavv">
                    <ul class="custab">
                        <a class="flow-text white-text tab" style="margin-bottom:30px">Admin</a>
                        <a class="flow-text white-text tab">Main Menu</a>
                        <div class="divider white" style="margin:5px"></div>
                        <li class="full-widthx tab"><a class="active" href="#dash">Dashboard</a></li>
                        <li class="full-widthx tab"><a href="#manage-cat">Manage Category</a></li>
                        <li class="full-widthx tab"><a href="#paymentstatus">Payment status</a></li>
                        <li class="full-widthx tab"><a href="#seeorder">See Orders</a></li>
                        <li class="full-widthx tab"><a href="#add-prod">Add Products</a></li>
                        <li class="full-widthx tab"><a href="#del-prod">Delete Products</a></li>
                        <li class="full-widthx tab"><a href="#control-cont">Control content</a></li>
                        <li class="full-widthx tab"><a href="#discount">Discount</a></li>
                        <li class="full-widthx tab"><a href="#promo">Promocode</a></li>
                        <li class="full-widthx tab" onclick="logout()"><a>Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col s12 m10 back-color-blak content-show" style="padding:0px">

                <!--        Dashboard        -->
                <div id="dash" class="col s12" style="padding:0px">
                    <nav style="background-color: #111;">
                        <div class="nav-wrapper" style="margin-left : 20px">
                            <a href="#" class="brand-logo">Dashboard</a>                     
                        </div>
                    </nav>
                    <?php 
                    
                    include_once("../php/database.php");

                    if($stmt = $conn->prepare("SELECT count(case order_stat when 'pending' then 1 else null end) as pen, count(case order_stat when 'delivered' then 1 else null end) as del, count(case order_stat when 'processing' then 1 else null end) as processing, count(case order_stat when 'instarnsit' then 1 else null end) as intransit, sum( case stat when 'sucess' then amt else null end ) as amt, count(case stat when 'sucess' then 1 else null end) as aaa FROM order_detail WHERE stat='sucess'")){                    
                        $stmt->execute();
                        $stmt->bind_result($pending, $delivered, $processing, $intransit, $totalamt, $allorders);
                    }else{
                        print_r($conn->error_list);
                        echo "no";
                    }
                    while($stmt->fetch()) {}
                    ?>

                    <div class="row" style="margin:10px">                    
                        <div class="col s3 offset-s1">
                            <div class="card-panel border-rad">
                                <p class="nomargin teal-text" style="font-weight: 600;">Total Earning<br> <span class="black-text" style="font-size: 24px">&#8377;<?php echo number_format($totalamt); ?></span></p>
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="card-panel border-rad">
                                <p class="nomargin blue-text" style="font-weight: 600;">Total Orders <br> <span class="black-text" style="font-size: 24px"><?php echo $allorders; ?></span></p>
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="card-panel border-rad">
                                <p class="nomargin green-text" style="font-weight: 600;">Pending Orders<br> <span class="black-text" style="font-size: 24px"><?php echo $pending; ?></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin:10px">
                        <div class="col s3 offset-s1">
                            <div class="card-panel border-rad">
                                <p class="nomargin blue-text" style="font-weight: 600;">Processing Orders <br> <span class="black-text" style="font-size: 24px"><?php echo $processing; ?></span></p>
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="card-panel border-rad">
                                <p class="nomargin green-text" style="font-weight: 600;">In-transit Orders<br> <span class="black-text" style="font-size: 24px"><?php echo $intransit; ?></span></p>
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="card-panel border-rad">
                                <p class="nomargin orange-text" style="font-weight: 600;">Delivered Orders<br> <span class="black-text" style="font-size: 24px"><?php echo $delivered; ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!--        Manage sub cat        -->
                <div id="manage-cat" class="col s12" style="padding:0px;height:100vh">
                    <nav style="background-color: #111;">
                        <div class="nav-wrapper" style="margin-left : 20px">
                            <a href="#" class="brand-logo">Manage Category</a>                     
                        </div>
                    </nav>
                    
                    <div class="row  " style="margin:10px">
                        <div class="col s12 m6 white z-depth-1">
                            <h4>Delete sub category</h4>
                            <div class="divider"></div>
                    <?php 
                    
                    
                    
                    if($stmt = $conn->prepare("SELECT pt.id ,p.product, pt.type, pt.img FROM productcontent as p, product_type as pt WHERE pt.pid=p.id and stat='live'")){                    
                        $stmt->execute();
                        $stmt->bind_result($id, $cat, $subtype, $img);
                    }else{
                        print_r($conn->error_list);
                        echo "no";
                    }

                    $flag = 0;

                    while($stmt->fetch()) {
                        if($flag==0){
                    ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Image name</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php }
                                    $flag+=1;
                                    if($cat!=""){
                                    ?>
                                    <tr>
                                        <td><?php echo $cat; ?></td>
                                        <td><?php echo $subtype; ?></td>
                                        <td><?php echo $img; ?></td>
                                        <td style="width: 10px" class="delete-cat"  value="<?php echo $id; ?>"><a href="#"><i class="material-icons red-text center">delete_forever</i></a></td>
                                    </tr>
                                    <?php }
                            }
                                    
                            if($flag!=0){
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        <?php }
                        
                        $stmt->close();
                            
                        ?>
                        <div class="col s12 m4 white z-depth-1" style="margin-left:10px">
                            <h4>Add sub category</h4>
                            <div class="divider"></div>
                            <form action="php/addcat.php" method="post" id="addsubcate" enctype="multipart/form-data">
                                <div class="row" style="margin:10px">
                                    <div class="input-field col s12">
                                        <input  id="cname" type="text" name="name" required>
                                        <label for="cname"> Name</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input  id="des" type="text" name="des" required>
                                        <label for="des">Description</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <select name="cat" id="cat" required>
                                            <option value="" disabled selected>Choose your category</option>
                                            
                                            <?php
                                            if($stmt = $conn->prepare("SELECT id, product FROM productcontent WHERE product<>?")){
                                                $bl = "";
                                                $stmt->bind_param("s",$bl);
                                                $stmt->execute();
                                                $stmt->bind_result($id, $cat);
                                            }else{
                                                print_r($conn->error_list);
                                                echo "no";
                                            }

                                            $flag = 0;

                                            while($stmt->fetch()) {
                                            ?>
                                            <option value="<?php echo $id; ?>"><?php echo $cat; ?></option>
                                            <?php } 
                                    $stmt->close();
                                            ?>
                                        </select>
                                        <label>Select Category</label>
                                    </div>
                                    <?php 
                                    ?>
                                    <div class="col s12 file-field input-field">
                                        <div class="btn black">
                                            <span>File</span>
                                            <input type="file" name="file" id="file" accept="image/x-png,image/gif,image/jpeg" required>
                                        </div>
                                        <div class="file-path-wrapper ">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <button class="waves-effect waves-light btn buttoncus black" id="addcat">Add sub-category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                            
                    </div>
                </div>

                <!--    Payment status     -->
                <div id="paymentstatus" class="col s12" style="padding:0px; height:100vh">
                    <nav style="background-color: #111;">
                        <div class="nav-wrapper" style="margin-left : 20px">
                            <a href="#" class="brand-logo">Check Payment Status</a>                     
                        </div>
                    </nav>

                    <div class="row" style="margin:10px">                        
                        <div class="col s12 m4 white z-depth-1">
                            <p class="flow-text">Payment Status</p>
                            <div class="divider"></div>
                            <form action="php/txnstatus.php" method="post" id="check-payment-stat">
                                <div class="row" style="margin:10px">
                                    <div class="input-field col s12">
                                        <input  id="ordernum" type="text" name="ordernum" required>
                                        <label for="ordernum">Enter order number</label>
                                    </div>
                                    <div class="input-field col s12 center">
                                        <button class="waves-effect waves-light btn black right" id="check">Check</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col s12 m5 white z-depth-1" style="margin-left: 10px">
                            <div class="row" id="stat-content">
                            </div>
                        </div>
                    </div>

                </div>

                <!--        Add productss        -->
                <div id="add-prod" class="col s12" style="padding:0px; height:100vh">
                    <nav style="background-color: #111;">
                        <div class="nav-wrapper" style="margin-left : 20px">
                            <a href="#" class="brand-logo">Add Products</a>                     
                        </div>
                    </nav>
                    
                    <div class="row" style="margin:10px">                        
                        <div class="col s12 m6 white z-depth-1">
                            <p class="flow-text">Add New Product</p>
                            <div class="divider"></div>
                            <form action="php/productadd.php" method="post" enctype="multipart/form-data" id="product-add-form">
                                <div class="row" style="margin:10px">
                                    <div class="input-field col s4">
                                        <input  id="pname" type="text" name="name" required>
                                        <label for="pname">Product Name</label>
                                    </div>
                                    <div class="input-field col s4">
                                        <input  id="price" type="number" name="price" required>
                                        <label for="price">Price</label>
                                    </div>
                                    <div class="input-field col s4">
                                        <input  id="phot" type="number" name="photo" required>
                                        <label for="phot">Photo</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input  id="ades" type="text" name="des" required>
                                        <label for="ades">Description</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <select name="cat2" id="cat2" required>
                                            <option value="" disabled selected>Choose your category</option>
                                            
                                            
                                            
                                            <?php
                                            if($stmt = $conn->prepare("SELECT id, pid, type FROM product_type")){                                                                                                
                                                $stmt->execute();
                                                $stmt->bind_result($ptid, $ppid, $ptype);
                                            }else{
                                                print_r($conn->error_list);
                                                echo "no";
                                            }

                                            $flag = 0;
                                            $typearr = array();
                                            while($stmt->fetch()) {
                                                array_push($typearr , array($ppid, $ptid, $ptype));
                                            } 
                                            
                                            $stmt->close();                                            
                                            
                                            
                                            //getting product list
                                            if($stmt = $conn->prepare("SELECT id, product FROM productcontent WHERE product<>?")){
                                                $bl = "";
                                                $stmt->bind_param("s",$bl);
                                                $stmt->execute();
                                                $stmt->bind_result($id, $cat);
                                            }else{
                                                print_r($conn->error_list);
                                                echo "no";
                                            }

                                            $flag = 0;

                                            while($stmt->fetch()) {
                                                $flag = -1;
                                                foreach($typearr as $item) {
                                                    if($item[0]==$id){
                                                        $flag = 1;
                                                ?>
                                                        <option value="<?php echo $id.":".$item[1]; ?>"><?php echo "$cat : $item[2]"; ?></option>
                                            <?php   } 
                                                        
                                               }
                                                if($flag==-1){ ?>
                                                    <option value="<?php echo $id .":30"; ?>"><?php echo $cat; ?></option>
                                            <?php }
                                            }
                                             
                                    $stmt->close();
                                            ?>
                                            
                                        
                                        </select>
                                        <label>Select Sub-category</label>
                                    </div>                                            
                                    <div class="col s12 file-field input-field">
                                        <div class="btn black">
                                            <span>First Image</span>
                                            <input type="file" name="file1" id="file1" accept="image/x-png,image/gif,image/jpeg" required>
                                        </div>
                                        <div class="file-path-wrapper ">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                    <div class="col s12 file-field input-field">
                                        <div class="btn black">
                                            <span>Second Image</span>
                                            <input type="file" name="file2" id="file2" accept="image/x-png,image/gif,image/jpeg" >
                                        </div>
                                        <div class="file-path-wrapper ">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                    <div class="col s12 file-field input-field">
                                        <div class="btn black">
                                            <span>Third Image</span>
                                            <input type="file" name="file3" id="file3" accept="image/x-png,image/gif,image/jpeg" >
                                        </div>
                                        <div class="file-path-wrapper ">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                    <div class="col s12 file-field input-field">
                                        <div class="btn black">
                                            <span>Fourth Image</span>
                                            <input type="file" name="file4" id="file4" accept="image/x-png,image/gif,image/jpeg" >
                                        </div>
                                        <div class="file-path-wrapper ">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                    <div class="col s12 file-field input-field">
                                        <div class="btn black">
                                            <span>Fifth Image</span>
                                            <input type="file" name="file5" id="file5" accept="image/x-png,image/gif,image/jpeg" >
                                        </div>
                                        <div class="file-path-wrapper ">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                    <div class="col s12 file-field input-field">
                                        <div class="btn black">
                                            <span>Six Image</span>
                                            <input type="file" name="file6" id="file6" accept="image/x-png,image/gif,image/jpeg" >
                                        </div>
                                        <div class="file-path-wrapper ">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                    
                                    <!--           submit button         -->
                                    <div class="col s12">
                                        <button class="waves-effect waves-light btn black right" id="addprod">Add Product</button>
                                    </div>
                                </div>
                            </form>                                    
                        </div>
                    </div>
                </div>


                <!--        delete Products        -->
                <div id="del-prod" class="col s12" style="padding:0px">
                    <nav style="background-color: #111;">
                        <div class="nav-wrapper" style="margin-left : 20px">
                            <a href="#" class="brand-logo">Delete Products</a>                     
                        </div>
                    </nav>
                    <div class="row  " style="margin:10px">
                        <div class="col s12 m6 white z-depth-1">
                            <h4>Delete prooducts</h4>
                            <div class="divider"></div>
                        <?php 
                    
                    if($stmt = $conn->prepare("SELECT p.id, p.name, p.price, pc.product, pt.type FROM product as p, productcontent as pc, product_type as pt WHERE p.stat='live' and p.pid=pc.id and p.ptid=pt.id and  p.name<>''")){                    
                        $stmt->execute();
                        $stmt->bind_result($id, $pname, $price, $cat, $subtype);
                    }else{
                        print_r($conn->error_list);
                        echo "no";
                    }

                    $flag = 0;

                    while($stmt->fetch()) {
                        if($flag==0){
                    ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>                                        
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php }
                                    $flag+=1;
                                    if($cat!=""){
                                    ?>
                                    <tr>
                                        <td><?php echo $pname; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $cat; ?></td>
                                        <td><?php echo $subtype; ?></td>
                                        
                                        <td style="width: 10px" class="delete-produ" value="<?php echo $id;?>"><i class="material-icons red-text center">delete_forever</i></td>
                                    </tr>
                                    <?php }
                            }
                                    
                            if($flag!=0){
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        <?php }
                        
                        $stmt->close();
                            
                        ?>
                    
                    
                    
                    </div>             
                </div>

                <!--        control Content        -->
                <div id="control-cont" class="col s12" style="padding:0px">
                    <nav style="background-color: #111;">
                        <div class="nav-wrapper" style="margin-left : 20px">
                            <a href="#" class="brand-logo">Content</a>                     
                        </div>
                    </nav>

                    <div class="row" style="margin:10px">
                        <div class="col s12 m5 white z-depth-1">
                            <p class="flow-text">Manage</p>
                            <div class="divider"></div>
                            <table class="responsive-table highlight">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Text</th>
                                        <th>charm</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                    
                            if($stmt = $conn->prepare("SELECT `id`, `product`, `text`, `charm` FROM `productcontent` ")){                    
                                $stmt->execute();
                                $stmt->bind_result($id, $name, $txt, $chrm);

                                $flag = 0;

                                while($stmt->fetch()) { ?>
                                    <tr>
                                        <form action="php/updatecontent.php" method="post" class="con-cla">
                                            <td><?php echo $name;?><input type="number" name="id" value="<?php echo $id;?>" hidden></td>
                                            <td><input type="number" value="<?php echo $txt;?>" name="text" style="width: 50px"></td>
                                            <td><input type="number" value="<?php echo $chrm;?>" name="charm" style="width: 50px"></td>
                                            <td><button class="waves-effect waves-light btn black">Update</button></td>
                                        </form>
                                    </tr>
                                <?php }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!--        Discount        -->
                <div id="discount" class="col s12" style="padding:0px">
                    <nav style="background-color: #111;">
                        <div class="nav-wrapper" style="margin-left : 10px">
                            <a href="#" class="brand-logo">Discount</a>                     
                        </div>
                    </nav>

                    <div class="row" style="margin:10px">
                        <div class="col s12 m5 white z-depth-1">
                            <p class="flow-text">Add Discount</p>
                            <div class="divider"></div>
                            <form action="php/adddiscount.php" method="post" id="discount-form">
                                <div class="input-field col s6">
                                    <input  id="dname" type="text" name="name" required>
                                    <label for="dname">Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <input  id="per" placeholder="Eg. 20" type="number" name="per" required>
                                    <label for="per">Percentage</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="text" class="datepicker" id="startdate" name="startdate" required>
                                    <label>Start Date</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="text" class="datepicker" id="enddate" name="enddate" required>
                                    <label>End Date</label>
                                </div>
                                <!--           submit button         -->
                                <div class="row col s12">
                                    <button class="waves-effect waves-light btn black center">Add</button>
                                </div>
                            </form>
                        </div><!--  end of m5 -->

                        <div class="col s12 m5 white z-depth-1" style="margin-left:10px">
                            <p class="flow-text">Manage Discount</p>
                            <div class="divider"></div>
                            <?php 
                    
                            if($stmt = $conn->prepare("SELECT `id`, `name`, `per`, `start`, `end` FROM `discount`")){                    
                                $stmt->execute();
                                $stmt->bind_result($id, $dname, $per, $start, $end);

                                $flag = 0;

                                while($stmt->fetch()) {
                                    if ($flag == 0) { ?>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Percentage</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>                                        
                                                    <th>Delete</th>
                                                </tr>
                                            </thead> 
                                            <tbody>
                                <?php }
                                    $flag += 1; ?>
                                            <tr>
                                                <td><?php echo $dname; ?></td>
                                                <td><?php echo $per; ?></td>
                                                <td><?php echo $start; ?></td>
                                                <td><?php echo $end; ?></td>
                                                
                                                <td style="width: 10px" class="delete-discount" value="<?php echo $id;?>"><i class="material-icons red-text center">delete_forever</i></td>
                                            </tr>
                            <?php   }
                                if ($flag != 0) { ?>
                                            </tbody>
                                        </table>
                                <?php }

                            }else{
                                // print_r($conn->error_list);
                                echo "Something went wrong retriving discount";
                            }
                            $stmt->close();
                            ?>
                        </div>

                    </div>
                </div>

                <!--     Promocode     -->
                <div id="promo" class="col s12" style="padding:0px">
                    <nav style="background-color: #111;">
                        <div class="nav-wrapper" style="margin-left : 20px">
                            <a href="#" class="brand-logo">Promocode</a>                     
                        </div>
                    </nav>

                    <div class="row" style="margin:10px">
                        <div class="col s12 m5 white z-depth-1">
                            <p class="flow-text">Add Promocode</p>
                            <div class="divider"></div>
                            <form action="php/addpromocode.php" method="post" id="promo-form">
                                <div class="input-field col s12">
                                    <input  id="proname" type="text" name="name" required>
                                    <label for="proname">Name</label>
                                </div>
                                <div class="input-field col s4">
                                    <input  id="per1" placeholder="Eg. 20" type="number" name="per" required>
                                    <label for="per1">Percentage</label>
                                </div>
                                <div class="input-field col s4">
                                    <input  id="upto" placeholder="Eg. 100" type="number" name="upto" required>
                                    <label for="upto">Upto</label>
                                </div>
                                <div class="input-field col s4">
                                    <input  id="minim" placeholder="Eg. 200" type="number" name="minim" required>
                                    <label for="minim">Minimum</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="text" class="datepicker" id="startdate1" name="startdate" required>
                                    <label>Start Date</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="text" class="datepicker" id="enddate1" name="enddate" required>
                                    <label>End Date</label>
                                </div>
                                <!--           submit button         -->
                                <div class="row col s12">
                                    <button class="waves-effect waves-light btn black center">Add</button>
                                </div>
                            </form>
                        </div><!--  end of m5 -->

                        <div class="col s12 m5 white z-depth-1" style="margin-left:10px">
                            <p class="flow-text">Manage Promocode</p>
                            <div class="divider"></div>

                            <?php 
                    
                            if($stmt = $conn->prepare("SELECT `id`, `promocode_name`, `starttime`, `endtime`, `percent`, `upto` FROM `promocode`")){                    
                                $stmt->execute();
                                $stmt->bind_result($id, $proname, $start, $end, $per, $upto);

                                $flag = 0;

                                while($stmt->fetch()) {
                                    if ($flag == 0) { ?>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Percentage</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>                      
                                                    <th>Upto</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                <?php }
                                    $flag += 1; ?>
                                            <tr>
                                                <td><?php echo $proname; ?></td>
                                                <td><?php echo $per; ?></td>
                                                <td><?php echo $start; ?></td>
                                                <td><?php echo $end; ?></td>
                                                <td><?php echo $upto; ?></td>
                                                
                                                <td style="width: 10px" class="delete-promocode" value="<?php echo $id;?>"><i class="material-icons red-text center">delete_forever</i></td>
                                            </tr>
                            <?php   }
                                if ($flag != 0) { ?>
                                            </tbody>
                                        </table>                                    
                                <?php }

                            }else{
                                // print_r($conn->error_list);
                                echo "Something went wrong retriving discount";
                            }
                            $stmt->close();
                            ?>

                        </div>
                    </div>
                </div>

                <!-- Orders -->
                <div id="seeorder" class="col s12" style="padding:0px">
                    <nav class="nav-extended black">
                        <div class="nav-wrapper" style="margin-left : 20px">
                            <a href="#" class="brand-logo">See Orders</a>                     
                        </div>
                        <div class="nav-content">
                            <ul class="tabs tabs-transparent">
                                <li class="tab "><a class="active " href="#test1">All order</a></li>
                                <li class="tab "><a href="#test2">Pending</a></li>
                                <li class="tab "><a href="#test21">Processing</a></li>
                                <li class="tab "><a href="#test3">In transit</a></li>
                                <li class="tab "><a href="#test4">Delivered</a></li>
                            </ul>
                        </div>
                    </nav>

                    <!-- All order -->
                    <div id="test1" class="col s12">
                        <div class="row" style="margin:10px">                        
                            <div class="col s12 m12 white z-depth-1">
                                <p class="flow-text">All orders</p>
                                
                                <div class="divider"></div>
                                
                                <?php
                                //getting all order details
                                $allorder = array();
                                if($stmt = $conn->prepare("SELECT `uid`, `arid`, `order_num`, `item_id`, `amt`, `order_stat`, `timestamp` FROM `order_detail` WHERE stat='sucess'")){
                                    // $bl = "";
                                    // $stmt->bind_param("s",$bl);
                                    $stmt->execute();
                                    $stmt->bind_result($a_uid, $a_arid, $a_ordernum, $a_itemid, $a_amt, $a_ostat, $a_time );
                                    $flaga = -1;
                                    while($stmt->fetch()) {
                                        $te1 = explode(":", $a_itemid);
                                        $te = count($te1);
                                        array_push($allorder,array($a_ordernum, $a_uid, $a_arid, $te, $a_amt, $a_ostat, $a_time));
                                    }
                                }else{
                                    // print_r($conn->error_list);
                                    echo "all dets no";
                                }
                                $stmt->close();
                                $fl = -1;
                                foreach ($allorder as $i) {
                                    //getting address details
                                    $address_dets = array();
                                    if($stmt = $conn->prepare("SELECT ad.`id`, ad.`uid`, ad.`name`, ad.`phonenum`, ad.`email`, ad.`addr` FROM `addr` as ad, `order_detail` as od WHERE od.arid=ad.id and od.uid=ad.uid and od.order_num=?")){
                                        // $bl = "";
                                        $stmt->bind_param("s",$i[0]);
                                        $stmt->execute();
                                        $stmt->bind_result( $adr_id, $adr_uid, $adr_nm, $adr_phone, $adr_mail, $adr_address );
                                        $flaga = -1;
                                        while($stmt->fetch()) {                                            
                                            array_push($address_dets ,array( $adr_id, $adr_uid, $adr_nm, $adr_phone, $adr_mail, $adr_address ));
                                            break;
                                        }
                                    }else{
                                        // print_r($conn->error_list);
                                        echo "addr no";
                                    }
                                    $stmt->close(); 
                                    if( $fl==-1){ ?>
                                        <div class="row" style="margin: 10px">
                                                                
                                    <?php }
                                    $fl += 1;
                                    //$a_ordernum 0, $a_uid 1, $a_arid 2, $te 3, $a_amt 4, $a_ostat 5, $a_time 6
                                    ?>
                                    <ul class="collapsible col s12" style="padding-top:10px; padding-left:20px; margin:0px; margin-top: 10px">
                                        <li>
                                            <div class="collapsible-header" style="width:100%; padding:0px">
                                                <div class="row nomargin" style="width:100%">
                                                    <b class="tcpadding">Order ID : <?php echo $i[0]; ?> </b>
                                                    <p class="amt cpadding">Amount : <?php echo $i[4]; ?> | items : <?php echo $i[3]; ?></p>
                                                    <div class="divider cpadding" style="width:100%"></div>
                                                    <div class="row">
                                                        <form action="php/updatestatus.php" method="post" class="update-form">
                                                            <div class="col s6">
                                                                <p class="odstat blue-grey-text cpadding">Order Status : <span class="green-text"><?php echo $i[5]; ?></span></p>
                                                                <input type="text" name="ordernum" value="<?php echo $i[0]; ?>" hidden="true">             
                                                                <div class="input-field col s6 ">
                                                                    <select name="stat">
                                                                        <option value="" disabled selected>Options</option>
                                                                        <option value="processing">Processing</option>
                                                                        <option value="intransit">in transit</option>
                                                                        <option value="delivered">Delivered</option>
                                                                        <option value="cancel">cancel</option>
                                                                    </select>
                                                                    <label>Select status</label>
                                                                    
                                                                </div>
                                                                <div class="col s6" style="margin-top: 20px">
                                                                    <button class="waves-effect waves-light btn black">Update status</button>
                                                                </div>
                                                            
                                                            </div>
                                                        </form>
                                                        <!-- $adr_id 0, $adr_uid 1, $adr_nm 2, $adr_phone 3, $adr_mail 4, $adr_address 5 -->
                                                        <div class="col s6">
                                                            <h6><b>Customer Detail</b></h6>
                                                            <b class="nomargin">Name : <?php echo $address_dets[0][2];?></b>
                                                            <p class="nomargin">Phone number : <?php echo $address_dets[0][3]; ?></p>
                                                            <p class="nomargin">Email id : <?php echo $address_dets[0][4]; ?></p>
                                                            <p class="nomargin">Address : <?php echo $address_dets[0][5]; ?></p>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col s12">
                                                        <p class="odstat cpadding back-coloor" style="margin:0px; padding-top:15px; padding-bottom:15px;">View Order Items <i class="material-icons right">keyboard_arrow_down</i></p>
                                                    </div>
                                                </div>
                                            </div>

                                    <?php
                                    //getting items
                                    $allorder = array();
                                    if($stmt = $conn->prepare("SELECT oi.`id`, oi.`order_num`, `product_name`, `product_category`, `product_sub_type`, `color_name`, `qty`, `text`, `img_name`, `charm1`, `charm2`, `charm3` FROM `order_item` as oi, order_detail as od WHERE oi.order_num=? and od.stat=(SELECT stat FROM order_detail WHERE order_num=?) GROUP BY oi.id")){
                                        // $bl = "";
                                        $stmt->bind_param("ss", $i[0], $i[0] );
                                        $stmt->execute();
                                        $stmt->bind_result( $it_id, $it_ordernum, $it_pname, $it_cat, $it_subcat, $it_color, $it_qty, $it_text, $it_imgname, $it_c1, $it_c2, $it_c3 );
                                        $flaga = -1;
                                        while($stmt->fetch()) { ?>
                                            <div class="collapsible-body">
                                                <div class="row nomargin">
                                                    <?php 
                                                    if ($it_imgname!="null") {?>
                                                        
                                                    
                                                    <div class="col s12 m3">
                                                        <a class="waves-effect waves-light btn black" href="php/downloadfile.php?file=<?php echo $it_imgname; ?>">Download File</a>
                                                    </div>
                                                    <?php }
                                                    ?>
                                                    <div class="col s12 m6" style="margin-left: 10px">
                                                        <p style="font-weight:600;margin-bottom:2px">Product name :<?php echo $it_pname;?></p>
                                                        <p class="blue-text" style="font-weight:bold;margin:0px">quantity: <?php echo $it_qty;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Product category: <?php echo $it_cat;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Sub category:<?php echo $it_subcat;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Color:<?php echo $it_color;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Text:<?php echo $it_text;?></p>
                                                        <?php if ($it_c1!="null") { ?>
                                                        <p style="margin-bottom:2px;margin:0px">Charm 1:<?php echo $it_c1;?></p>
                                                        <?php } if ($it_c2!="null") {?>
                                                        <p style="margin-bottom:2px;margin:0px">Charm 2:<?php echo $it_c2;?></p>
                                                        <?php } if ($it_c3!="null") {?>
                                                        <p style="margin-bottom:2px;margin:0px">Charm 3:<?php echo $it_c3;?></p>
                                                        <?php }?>
                                                    </div>
                                                </div>          
                                            </div>
                                <?php   }
                                    }else{
                                        print_r($conn->error_list);
                                        echo "no itm";
                                    }
                                    $stmt->close(); ?>
                                        </li>
                                    </ul>
                        <?php   }
                                ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending order -->
                    <div id="test2" class="col s12">
                        <div class="row" style="margin:10px">                        
                            <div class="col s12 m12 white z-depth-1">
                                <p class="flow-text">Pending orders</p>
                                
                                <div class="divider"></div>
                                
                                <?php
                                //getting pending order details
                                $allorder = array();
                                if($stmt = $conn->prepare("SELECT `uid`, `arid`, `order_num`, `item_id`, `amt`, `order_stat`, `timestamp` FROM `order_detail` WHERE stat='sucess' and order_stat='pending'")){
                                    // $bl = "";
                                    // $stmt->bind_param("s",$bl);
                                    $stmt->execute();
                                    $stmt->bind_result($a_uid, $a_arid, $a_ordernum, $a_itemid, $a_amt, $a_ostat, $a_time );
                                    $flaga = -1;
                                    while($stmt->fetch()) {
                                        $te1 = explode(":", $a_itemid);
                                        $te = count($te1);
                                        array_push($allorder,array($a_ordernum, $a_uid, $a_arid, $te, $a_amt, $a_ostat, $a_time));
                                    }
                                }else{
                                    // print_r($conn->error_list);
                                    echo "all dets no";
                                }
                                $stmt->close();
                                $fl = -1;
                                foreach ($allorder as $i) {
                                    //getting address details
                                    $address_dets = array();
                                    if($stmt = $conn->prepare("SELECT ad.`id`, ad.`uid`, ad.`name`, ad.`phonenum`, ad.`email`, ad.`addr` FROM `addr` as ad, `order_detail` as od WHERE od.arid=ad.id and od.uid=ad.uid and od.order_num=?")){
                                        // $bl = "";
                                        $stmt->bind_param("s",$i[0]);
                                        $stmt->execute();
                                        $stmt->bind_result( $adr_id, $adr_uid, $adr_nm, $adr_phone, $adr_mail, $adr_address );
                                        $flaga = -1;
                                        while($stmt->fetch()) {                                            
                                            array_push($address_dets ,array( $adr_id, $adr_uid, $adr_nm, $adr_phone, $adr_mail, $adr_address ));
                                            break;
                                        }
                                    }else{
                                        // print_r($conn->error_list);
                                        echo "addr no";
                                    }
                                    $stmt->close(); 
                                    if( $fl==-1){ ?>
                                        <div class="row" style="margin: 10px">
                                                                
                                    <?php }
                                    $fl += 1;
                                    //$a_ordernum 0, $a_uid 1, $a_arid 2, $te 3, $a_amt 4, $a_ostat 5, $a_time 6
                                    ?>
                                    <ul class="collapsible col s12" style="padding-top:10px; padding-left:20px; margin:0px; margin-top: 10px">
                                        <li>
                                            <div class="collapsible-header" style="width:100%; padding:0px">
                                                <div class="row nomargin" style="width:100%">
                                                    <b class="tcpadding">Order ID : <?php echo $i[0]; ?> </b>
                                                    <p class="amt cpadding">Amount : <?php echo $i[4]; ?> | items : <?php echo $i[3]; ?></p>
                                                    <div class="divider cpadding" style="width:100%"></div>
                                                    <div class="row">
                                                        <form action="php/updatestatus.php" method="post" class="update-form">
                                                            <div class="col s6">
                                                                <p class="odstat blue-grey-text cpadding">Order Status : <span class="green-text"><?php echo $i[5]; ?></span></p>
                                                                <input type="text" name="ordernum" value="<?php echo $i[0]; ?>" hidden="true">             
                                                                <div class="input-field col s6 ">
                                                                    <select name="stat">
                                                                        <option value="" disabled selected>Options</option>
                                                                        <option value="processing">Processing</option>
                                                                        <option value="intransit">in transit</option>
                                                                        <option value="delivered">Delivered</option>
                                                                        <option value="cancel">cancel</option>
                                                                    </select>
                                                                    <label>Select status</label>
                                                                    
                                                                </div>
                                                                <div class="col s6" style="margin-top: 20px">
                                                                    <button class="waves-effect waves-light btn black">Update status</button>
                                                                </div>
                                                            
                                                            </div>
                                                        </form>
                                                        <!-- $adr_id 0, $adr_uid 1, $adr_nm 2, $adr_phone 3, $adr_mail 4, $adr_address 5 -->
                                                        <div class="col s6">
                                                            <h6><b>Customer Detail</b></h6>
                                                            <b class="nomargin">Name : <?php echo $address_dets[0][2];?></b>
                                                            <p class="nomargin">Phone number : <?php echo $address_dets[0][3]; ?></p>
                                                            <p class="nomargin">Email id : <?php echo $address_dets[0][4]; ?></p>
                                                            <p class="nomargin">Address : <?php echo $address_dets[0][5]; ?></p>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col s12">
                                                        <p class="odstat cpadding back-coloor" style="margin:0px; padding-top:15px; padding-bottom:15px;">View Order Items <i class="material-icons right">keyboard_arrow_down</i></p>
                                                    </div>
                                                </div>
                                            </div>

                                    <?php
                                    //getting items
                                    $allorder = array();
                                    if($stmt = $conn->prepare("SELECT oi.`id`, oi.`order_num`, `product_name`, `product_category`, `product_sub_type`, `color_name`, `qty`, `text`, `img_name`, `charm1`, `charm2`, `charm3` FROM `order_item` as oi, order_detail as od WHERE oi.order_num=? and od.stat=(SELECT stat FROM order_detail WHERE order_num=?) GROUP BY oi.id")){
                                        // $bl = "";
                                        $stmt->bind_param("ss", $i[0], $i[0] );
                                        $stmt->execute();
                                        $stmt->bind_result( $it_id, $it_ordernum, $it_pname, $it_cat, $it_subcat, $it_color, $it_qty, $it_text, $it_imgname, $it_c1, $it_c2, $it_c3 );
                                        $flaga = -1;
                                        while($stmt->fetch()) { ?>
                                            <div class="collapsible-body">
                                                <div class="row nomargin">
                                                    <?php 
                                                    if ($it_imgname!="null") {?>
                                                        
                                                    
                                                    <div class="col s12 m3">
                                                        <a class="waves-effect waves-light btn black" href="php/downloadfile.php?file=<?php echo $it_imgname; ?>">Download File</a>
                                                    </div>
                                                    <?php }
                                                    ?>
                                                    <div class="col s12 m6" style="margin-left: 10px">
                                                        <p style="font-weight:600;margin-bottom:2px">Product name :<?php echo $it_pname;?></p>
                                                        <p class="blue-text" style="font-weight:bold;margin:0px">quantity: <?php echo $it_qty;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Product category: <?php echo $it_cat;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Sub category:<?php echo $it_subcat;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Color:<?php echo $it_color;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Text:<?php echo $it_text;?></p>
                                                        <?php if ($it_c1!="null") { ?>
                                                        <p style="margin-bottom:2px;margin:0px">Charm 1:<?php echo $it_c1;?></p>
                                                        <?php } if ($it_c2!="null") {?>
                                                        <p style="margin-bottom:2px;margin:0px">Charm 2:<?php echo $it_c2;?></p>
                                                        <?php } if ($it_c3!="null") {?>
                                                        <p style="margin-bottom:2px;margin:0px">Charm 3:<?php echo $it_c3;?></p>
                                                        <?php }?>
                                                    </div>
                                                </div>          
                                            </div>
                                <?php   }
                                    }else{
                                        print_r($conn->error_list);
                                        echo "no itm";
                                    }
                                    $stmt->close();?>
                                        </li>
                                    </ul>
                        <?php   } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Processing order -->
                    <div id="test21" class="col s12">
                        <div class="row" style="margin:10px">                        
                            <div class="col s12 m12 white z-depth-1">
                                <p class="flow-text">Processing orders</p>
                                
                                <div class="divider"></div>
                                
                                <?php
                                //getting Processing order details
                                $allorder = array();
                                if($stmt = $conn->prepare("SELECT `uid`, `arid`, `order_num`, `item_id`, `amt`, `order_stat`, `timestamp` FROM `order_detail` WHERE stat='sucess' and order_stat='processing'")){
                                    // $bl = "";
                                    // $stmt->bind_param("s",$bl);
                                    $stmt->execute();
                                    $stmt->bind_result($a_uid, $a_arid, $a_ordernum, $a_itemid, $a_amt, $a_ostat, $a_time );
                                    $flaga = -1;
                                    while($stmt->fetch()) {
                                        $te1 = explode(":", $a_itemid);
                                        $te = count($te1);
                                        array_push($allorder,array($a_ordernum, $a_uid, $a_arid, $te, $a_amt, $a_ostat, $a_time));
                                    }
                                }else{
                                    // print_r($conn->error_list);
                                    echo "all dets no";
                                }
                                $stmt->close();
                                $fl = -1;
                                foreach ($allorder as $i) {
                                    //getting address details
                                    $address_dets = array();
                                    if($stmt = $conn->prepare("SELECT ad.`id`, ad.`uid`, ad.`name`, ad.`phonenum`, ad.`email`, ad.`addr` FROM `addr` as ad, `order_detail` as od WHERE od.arid=ad.id and od.uid=ad.uid and od.order_num=?")){
                                        // $bl = "";
                                        $stmt->bind_param("s",$i[0]);
                                        $stmt->execute();
                                        $stmt->bind_result( $adr_id, $adr_uid, $adr_nm, $adr_phone, $adr_mail, $adr_address );
                                        $flaga = -1;
                                        while($stmt->fetch()) {                                            
                                            array_push($address_dets ,array( $adr_id, $adr_uid, $adr_nm, $adr_phone, $adr_mail, $adr_address ));
                                            break;
                                        }
                                    }else{
                                        // print_r($conn->error_list);
                                        echo "addr no";
                                    }
                                    $stmt->close(); 
                                    if( $fl==-1){ ?>
                                        <div class="row" style="margin: 10px">
                                                                
                                    <?php }
                                    $fl += 1;
                                    //$a_ordernum 0, $a_uid 1, $a_arid 2, $te 3, $a_amt 4, $a_ostat 5, $a_time 6
                                    ?>
                                    <ul class="collapsible col s12" style="padding-top:10px; padding-left:20px; margin:0px; margin-top: 10px">
                                        <li>
                                            <div class="collapsible-header" style="width:100%; padding:0px">
                                                <div class="row nomargin" style="width:100%">
                                                    <b class="tcpadding">Order ID : <?php echo $i[0]; ?> </b>
                                                    <p class="amt cpadding">Amount : <?php echo $i[4]; ?> | items : <?php echo $i[3]; ?></p>
                                                    <div class="divider cpadding" style="width:100%"></div>
                                                    <div class="row">
                                                        <form action="php/updatestatus.php" method="post" class="update-form">
                                                            <div class="col s6">
                                                                <p class="odstat blue-grey-text cpadding">Order Status : <span class="green-text"><?php echo $i[5]; ?></span></p>
                                                                <input type="text" name="ordernum" value="<?php echo $i[0]; ?>" hidden="true">             
                                                                <div class="input-field col s6 ">
                                                                    <select name="stat">
                                                                        <option value="" disabled selected>Options</option>
                                                                        <option value="processing">Processing</option>
                                                                        <option value="intransit">in transit</option>
                                                                        <option value="delivered">Delivered</option>
                                                                        <option value="cancel">cancel</option>
                                                                    </select>
                                                                    <label>Select status</label>
                                                                    
                                                                </div>
                                                                <div class="col s6" style="margin-top: 20px">
                                                                    <button class="waves-effect waves-light btn black">Update status</button>
                                                                </div>
                                                            
                                                            </div>
                                                        </form>
                                                        <!-- $adr_id 0, $adr_uid 1, $adr_nm 2, $adr_phone 3, $adr_mail 4, $adr_address 5 -->
                                                        <div class="col s6">
                                                            <h6><b>Customer Detail</b></h6>
                                                            <b class="nomargin">Name : <?php echo $address_dets[0][2];?></b>
                                                            <p class="nomargin">Phone number : <?php echo $address_dets[0][3]; ?></p>
                                                            <p class="nomargin">Email id : <?php echo $address_dets[0][4]; ?></p>
                                                            <p class="nomargin">Address : <?php echo $address_dets[0][5]; ?></p>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col s12">
                                                        <p class="odstat cpadding back-coloor" style="margin:0px; padding-top:15px; padding-bottom:15px;">View Order Items <i class="material-icons right">keyboard_arrow_down</i></p>
                                                    </div>
                                                </div>
                                            </div>

                                    <?php
                                    //getting items
                                    $allorder = array();
                                    if($stmt = $conn->prepare("SELECT oi.`id`, oi.`order_num`, `product_name`, `product_category`, `product_sub_type`, `color_name`, `qty`, `text`, `img_name`, `charm1`, `charm2`, `charm3` FROM `order_item` as oi, order_detail as od WHERE oi.order_num=? and od.stat=(SELECT stat FROM order_detail WHERE order_num=?) GROUP BY oi.id")){
                                        // $bl = "";
                                        $stmt->bind_param("ss", $i[0], $i[0] );
                                        $stmt->execute();
                                        $stmt->bind_result( $it_id, $it_ordernum, $it_pname, $it_cat, $it_subcat, $it_color, $it_qty, $it_text, $it_imgname, $it_c1, $it_c2, $it_c3 );
                                        $flaga = -1;
                                        while($stmt->fetch()) { ?>
                                            <div class="collapsible-body">
                                                <div class="row nomargin">
                                                    <?php 
                                                    if ($it_imgname!="null") {?>
                                                        
                                                    
                                                    <div class="col s12 m3">
                                                        <a class="waves-effect waves-light btn black" href="php/downloadfile.php?file=<?php echo $it_imgname; ?>">Download File</a>
                                                    </div>
                                                    <?php }
                                                    ?>
                                                    <div class="col s12 m6" style="margin-left: 10px">
                                                        <p style="font-weight:600;margin-bottom:2px">Product name :<?php echo $it_pname;?></p>
                                                        <p class="blue-text" style="font-weight:bold;margin:0px">quantity: <?php echo $it_qty;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Product category: <?php echo $it_cat;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Sub category:<?php echo $it_subcat;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Color:<?php echo $it_color;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Text:<?php echo $it_text;?></p>
                                                        <?php if ($it_c1!="null") { ?>
                                                        <p style="margin-bottom:2px;margin:0px">Charm 1:<?php echo $it_c1;?></p>
                                                        <?php } if ($it_c2!="null") {?>
                                                        <p style="margin-bottom:2px;margin:0px">Charm 2:<?php echo $it_c2;?></p>
                                                        <?php } if ($it_c3!="null") {?>
                                                        <p style="margin-bottom:2px;margin:0px">Charm 3:<?php echo $it_c3;?></p>
                                                        <?php }?>
                                                    </div>
                                                </div>          
                                            </div>
                                <?php   }
                                    }else{
                                        print_r($conn->error_list);
                                        echo "no itm";
                                    }
                                    $stmt->close();?>
                                        </li>
                                    </ul>
                        <?php   }?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delivered orders -->
                    <div id="test4" class="col s12">
                        <div class="row" style="margin:10px">                        
                            <div class="col s12 m12 white z-depth-1">
                                <p class="flow-text">Delivered orders</p>
                                
                                <div class="divider"></div>
                                
                                <?php
                                //getting in transit order details
                                $allorder = array();
                                if($stmt = $conn->prepare("SELECT `uid`, `arid`, `order_num`, `item_id`, `amt`, `order_stat`, `timestamp` FROM `order_detail` WHERE stat='sucess' and order_stat='delivered'")){
                                    // $bl = "";
                                    // $stmt->bind_param("s",$bl);
                                    $stmt->execute();
                                    $stmt->bind_result($a_uid, $a_arid, $a_ordernum, $a_itemid, $a_amt, $a_ostat, $a_time );
                                    $flaga = -1;
                                    while($stmt->fetch()) {
                                        $te1 = explode(":", $a_itemid);
                                        $te = count($te1);
                                        array_push($allorder,array($a_ordernum, $a_uid, $a_arid, $te, $a_amt, $a_ostat, $a_time));
                                    }
                                }else{
                                    // print_r($conn->error_list);
                                    echo "all dets no";
                                }
                                $stmt->close();
                                $fl = -1;
                                foreach ($allorder as $i) {
                                    //getting address details
                                    $address_dets = array();
                                    if($stmt = $conn->prepare("SELECT ad.`id`, ad.`uid`, ad.`name`, ad.`phonenum`, ad.`email`, ad.`addr` FROM `addr` as ad, `order_detail` as od WHERE od.arid=ad.id and od.uid=ad.uid and od.order_num=?")){
                                        // $bl = "";
                                        $stmt->bind_param("s",$i[0]);
                                        $stmt->execute();
                                        $stmt->bind_result( $adr_id, $adr_uid, $adr_nm, $adr_phone, $adr_mail, $adr_address );
                                        $flaga = -1;
                                        while($stmt->fetch()) {                                            
                                            array_push($address_dets ,array( $adr_id, $adr_uid, $adr_nm, $adr_phone, $adr_mail, $adr_address ));
                                            break;
                                        }
                                    }else{
                                        // print_r($conn->error_list);
                                        echo "addr no";
                                    }
                                    $stmt->close(); 
                                    if( $fl==-1){ ?>
                                        <div class="row" style="margin: 10px">
                                                                
                                    <?php }
                                    $fl += 1;
                                    //$a_ordernum 0, $a_uid 1, $a_arid 2, $te 3, $a_amt 4, $a_ostat 5, $a_time 6
                                    ?>
                                    <ul class="collapsible col s12" style="padding-top:10px; padding-left:20px; margin:0px; margin-top: 10px">
                                        <li>
                                            <div class="collapsible-header" style="width:100%; padding:0px">
                                                <div class="row nomargin" style="width:100%">
                                                    <b class="tcpadding">Order ID : <?php echo $i[0]; ?> </b>
                                                    <p class="amt cpadding">Amount : <?php echo $i[4]; ?> | items : <?php echo $i[3]; ?></p>
                                                    <div class="divider cpadding" style="width:100%"></div>
                                                    <div class="row">
                                                        <form action="php/updatestatus.php" method="post" class="update-form">
                                                            <div class="col s6">
                                                                <p class="odstat blue-grey-text cpadding">Order Status : <span class="green-text"><?php echo $i[5]; ?></span></p>
                                                                <input type="text" name="ordernum" value="<?php echo $i[0]; ?>" hidden="true">             
                                                                <div class="input-field col s6 ">
                                                                    <select name="stat">
                                                                        <option value="" disabled selected>Options</option>
                                                                        <option value="processing">Processing</option>
                                                                        <option value="intransit">in transit</option>
                                                                        <option value="delivered">Delivered</option>
                                                                        <option value="cancel">cancel</option>
                                                                    </select>
                                                                    <label>Select status</label>
                                                                    
                                                                </div>
                                                                <div class="col s6" style="margin-top: 20px">
                                                                    <button class="waves-effect waves-light btn black">Update status</button>
                                                                </div>
                                                            
                                                            </div>
                                                        </form>
                                                        <!-- $adr_id 0, $adr_uid 1, $adr_nm 2, $adr_phone 3, $adr_mail 4, $adr_address 5 -->
                                                        <div class="col s6">
                                                            <h6><b>Customer Detail</b></h6>
                                                            <b class="nomargin">Name : <?php echo $address_dets[0][2];?></b>
                                                            <p class="nomargin">Phone number : <?php echo $address_dets[0][3]; ?></p>
                                                            <p class="nomargin">Email id : <?php echo $address_dets[0][4]; ?></p>
                                                            <p class="nomargin">Address : <?php echo $address_dets[0][5]; ?></p>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col s12">
                                                        <p class="odstat cpadding back-coloor" style="margin:0px; padding-top:15px; padding-bottom:15px;">View Order Items <i class="material-icons right">keyboard_arrow_down</i></p>
                                                    </div>
                                                </div>
                                            </div>

                                    <?php
                                    //getting items
                                    $allorder = array();
                                    if($stmt = $conn->prepare("SELECT oi.`id`, oi.`order_num`, `product_name`, `product_category`, `product_sub_type`, `color_name`, `qty`, `text`, `img_name`, `charm1`, `charm2`, `charm3` FROM `order_item` as oi, order_detail as od WHERE oi.order_num=? and od.stat=(SELECT stat FROM order_detail WHERE order_num=?) GROUP BY oi.id")){
                                        // $bl = "";
                                        $stmt->bind_param("ss", $i[0], $i[0] );
                                        $stmt->execute();
                                        $stmt->bind_result( $it_id, $it_ordernum, $it_pname, $it_cat, $it_subcat, $it_color, $it_qty, $it_text, $it_imgname, $it_c1, $it_c2, $it_c3 );
                                        $flaga = -1;
                                        while($stmt->fetch()) { ?>
                                            <div class="collapsible-body">
                                                <div class="row nomargin">
                                                    <?php 
                                                    if ($it_imgname!="null") {?>
                                                        
                                                    
                                                    <div class="col s12 m3">
                                                        <a class="waves-effect waves-light btn black" href="php/downloadfile.php?file=<?php echo $it_imgname; ?>">Download File</a>
                                                    </div>
                                                    <?php }
                                                    ?>
                                                    <div class="col s12 m6" style="margin-left: 10px">
                                                        <p style="font-weight:600;margin-bottom:2px">Product name :<?php echo $it_pname;?></p>
                                                        <p class="blue-text" style="font-weight:bold;margin:0px">quantity: <?php echo $it_qty;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Product category: <?php echo $it_cat;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Sub category:<?php echo $it_subcat;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Color:<?php echo $it_color;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Text:<?php echo $it_text;?></p>
                                                        <?php if ($it_c1!="null") { ?>
                                                        <p style="margin-bottom:2px;margin:0px">Charm 1:<?php echo $it_c1;?></p>
                                                        <?php } if ($it_c2!="null") {?>
                                                        <p style="margin-bottom:2px;margin:0px">Charm 2:<?php echo $it_c2;?></p>
                                                        <?php } if ($it_c3!="null") {?>
                                                        <p style="margin-bottom:2px;margin:0px">Charm 3:<?php echo $it_c3;?></p>
                                                        <?php }?>
                                                    </div>
                                                </div>          
                                            </div>
                                <?php   }
                                    }else{
                                        print_r($conn->error_list);
                                        echo "no itm";
                                    }
                                    $stmt->close();?>
                                        </li>
                                    </ul>
                                    </div>
                        <?php   } 

                        ?>
                                
                            </div>
                        </div>
                    </div>

                    <!-- in transit order-->
                    <div id="test3" class="col s12">
                        <div class="row" style="margin:10px">                        
                            <div class="col s12 m12 white z-depth-1">
                                <p class="flow-text">In-transit orders</p>
                                
                                <div class="divider"></div>
                                
                                <?php
                                //getting in transit order details
                                $allorder = array();
                                if($stmt = $conn->prepare("SELECT `uid`, `arid`, `order_num`, `item_id`, `amt`, `order_stat`, `timestamp` FROM `order_detail` WHERE stat='sucess' and order_stat='intransit'")){
                                    // $bl = "";
                                    // $stmt->bind_param("s",$bl);
                                    $stmt->execute();
                                    $stmt->bind_result($a_uid, $a_arid, $a_ordernum, $a_itemid, $a_amt, $a_ostat, $a_time );
                                    $flaga = -1;
                                    while($stmt->fetch()) {
                                        $te1 = explode(":", $a_itemid);
                                        $te = count($te1);
                                        array_push($allorder,array($a_ordernum, $a_uid, $a_arid, $te, $a_amt, $a_ostat, $a_time));
                                    }
                                }else{
                                    // print_r($conn->error_list);
                                    echo "all dets no";
                                }
                                $stmt->close();
                                $fl = -1;
                                foreach ($allorder as $i) {
                                    //getting address details
                                    $address_dets = array();
                                    if($stmt = $conn->prepare("SELECT ad.`id`, ad.`uid`, ad.`name`, ad.`phonenum`, ad.`email`, ad.`addr` FROM `addr` as ad, `order_detail` as od WHERE od.arid=ad.id and od.uid=ad.uid and od.order_num=?")){
                                        // $bl = "";
                                        $stmt->bind_param("s",$i[0]);
                                        $stmt->execute();
                                        $stmt->bind_result( $adr_id, $adr_uid, $adr_nm, $adr_phone, $adr_mail, $adr_address );
                                        $flaga = -1;
                                        while($stmt->fetch()) {                                            
                                            array_push($address_dets ,array( $adr_id, $adr_uid, $adr_nm, $adr_phone, $adr_mail, $adr_address ));
                                            break;
                                        }
                                    }else{
                                        // print_r($conn->error_list);
                                        echo "addr no";
                                    }
                                    $stmt->close(); 
                                    if( $fl==-1){ ?>
                                        <div class="row" style="margin: 10px">
                                                                
                                    <?php }
                                    $fl += 1;
                                    //$a_ordernum 0, $a_uid 1, $a_arid 2, $te 3, $a_amt 4, $a_ostat 5, $a_time 6
                                    ?>
                                    <ul class="collapsible col s12" style="padding-top:10px; padding-left:20px; margin:0px; margin-top: 10px">
                                        <li>
                                            <div class="collapsible-header" style="width:100%; padding:0px">
                                                <div class="row nomargin" style="width:100%">
                                                    <b class="tcpadding">Order ID : <?php echo $i[0]; ?> </b>
                                                    <p class="amt cpadding">Amount : <?php echo $i[4]; ?> | items : <?php echo $i[3]; ?></p>
                                                    <div class="divider cpadding" style="width:100%"></div>
                                                    <div class="row">
                                                        <form action="php/updatestatus.php" method="post" class="update-form">
                                                            <div class="col s6">
                                                                <p class="odstat blue-grey-text cpadding">Order Status : <span class="green-text"><?php echo $i[5]; ?></span></p>
                                                                <input type="text" name="ordernum" value="<?php echo $i[0]; ?>" hidden="true">             
                                                                <div class="input-field col s6 ">
                                                                    <select name="stat">
                                                                        <option value="" disabled selected>Options</option>
                                                                        <option value="processing">Processing</option>
                                                                        <option value="intransit">in transit</option>
                                                                        <option value="delivered">Delivered</option>
                                                                        <option value="cancel">cancel</option>
                                                                    </select>
                                                                    <label>Select status</label>
                                                                    
                                                                </div>
                                                                <div class="col s6" style="margin-top: 20px">
                                                                    <button class="waves-effect waves-light btn black">Update status</button>
                                                                </div>
                                                            
                                                            </div>
                                                        </form>
                                                        <!-- $adr_id 0, $adr_uid 1, $adr_nm 2, $adr_phone 3, $adr_mail 4, $adr_address 5 -->
                                                        <div class="col s6">
                                                            <h6><b>Customer Detail</b></h6>
                                                            <b class="nomargin">Name : <?php echo $address_dets[0][2];?></b>
                                                            <p class="nomargin">Phone number : <?php echo $address_dets[0][3]; ?></p>
                                                            <p class="nomargin">Email id : <?php echo $address_dets[0][4]; ?></p>
                                                            <p class="nomargin">Address : <?php echo $address_dets[0][5]; ?></p>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col s12">
                                                        <p class="odstat cpadding back-coloor" style="margin:0px; padding-top:15px; padding-bottom:15px;">View Order Items <i class="material-icons right">keyboard_arrow_down</i></p>
                                                    </div>
                                                </div>
                                            </div>

                                    <?php
                                    //getting items
                                    $allorder = array();
                                    if($stmt = $conn->prepare("SELECT oi.`id`, oi.`order_num`, `product_name`, `product_category`, `product_sub_type`, `color_name`, `qty`, `text`, `img_name`, `charm1`, `charm2`, `charm3` FROM `order_item` as oi, order_detail as od WHERE oi.order_num=? and od.stat=(SELECT stat FROM order_detail WHERE order_num=?) GROUP BY oi.id")){
                                        // $bl = "";
                                        $stmt->bind_param("ss", $i[0], $i[0] );
                                        $stmt->execute();
                                        $stmt->bind_result( $it_id, $it_ordernum, $it_pname, $it_cat, $it_subcat, $it_color, $it_qty, $it_text, $it_imgname, $it_c1, $it_c2, $it_c3 );
                                        $flaga = -1;
                                        while($stmt->fetch()) { ?>
                                            <div class="collapsible-body">
                                                <div class="row nomargin">
                                                    <?php 
                                                    if ($it_imgname!="null") {?>
                                                        
                                                    
                                                    <div class="col s12 m3">
                                                        <a class="waves-effect waves-light btn black" href="php/downloadfile.php?file=<?php echo $it_imgname; ?>">Download File</a>
                                                    </div>
                                                    <?php }
                                                    ?>
                                                    <div class="col s12 m6" style="margin-left: 10px">
                                                        <p style="font-weight:600;margin-bottom:2px">Product name :<?php echo $it_pname;?></p>
                                                        <p class="blue-text" style="font-weight:bold;margin:0px">quantity: <?php echo $it_qty;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Product category: <?php echo $it_cat;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Sub category:<?php echo $it_subcat;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Color:<?php echo $it_color;?></p>
                                                        <p style="margin-bottom:2px;margin:0px">Text:<?php echo $it_text;?></p>
                                                        <?php if ($it_c1!="null") { ?>
                                                        <p style="margin-bottom:2px;margin:0px">Charm 1:<?php echo $it_c1;?></p>
                                                        <?php } if ($it_c2!="null") {?>
                                                        <p style="margin-bottom:2px;margin:0px">Charm 2:<?php echo $it_c2;?></p>
                                                        <?php } if ($it_c3!="null") {?>
                                                        <p style="margin-bottom:2px;margin:0px">Charm 3:<?php echo $it_c3;?></p>
                                                        <?php }?>
                                                    </div>
                                                </div>          
                                            </div>
                                <?php   }
                                    }else{
                                        print_r($conn->error_list);
                                        echo "no itm";
                                    }
                                    $stmt->close();?>
                                        </li>
                                    </ul>
                        <?php   }
                        if( $fl==-1){ ?>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>




            </div>
        </div>

        <!--JavaScript at end of body for optimized loading-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script type="text/javascript" src="../js/ad.js"></script>
        <script type="text/javascript" src="../js/jquery.cookie.js"></script>
        <script type="text/javascript">
            function logout(){
                $.get("php/logout.php", function(data, status){
                    location.reload();
                });
            }            
        </script>
    </body>
</html>
<?php 
    }else{
        echo "login to continue";
    }
?>