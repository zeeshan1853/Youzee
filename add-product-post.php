<?php
    $name=$_POST['name'];
    $type=$_POST['productType'];
    $price=$_POST['productPrice'];
    $city=$_POST['city'];
    $description=$_POST['description'];
    $userID=$_POST['userID'];
    $image=array();

    $target_dir = "uploads/";

    foreach ($_FILES["img"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {

            $tmp_name = $_FILES['img']['tmp_name'][$key];
            $imgname = basename($_FILES["img"]["name"][$key]);
            $ext = pathinfo($imgname, PATHINFO_EXTENSION);
            $name_token=explode(".",$imgname);
            srand(make_seed());
            $randval = rand();
            if(strlen($name_token[0])>10){
                $name_token[0]=substr($name_token[0],'10');
            }
            $updated_name=$randval.$name_token[0].rand().".".$ext;

//            $tmp_name = $_FILES["img"]["tmp_name"][$key];
            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
//            $imgname = basename($_FILES["img"]["name"][$key]);
//            $newfilename = round(microtime(true)).$imgname;
//            echo $newfilename;
            move_uploaded_file($tmp_name, $target_dir.$updated_name);
            array_push($image,$updated_name);
        }else{
            echo "error in uploading file: ".$imgname;
        }

    }

    if(!isset($image[0])){
        $temp="NoImage.png";
        array_push($image,$temp);
    }
    if(!isset($image[1])){
        $temp="NoImage.png";
        array_push($image,$temp);
    }
    if(!isset($image[2])){
        $temp="NoImage.png";
        array_push($image,$temp);
    }
    if(!isset($image[3])){
        $temp="NoImage.png";
        array_push($image,$temp);
    }
require_once'connection.php';
$query="insert into items(itemName,price,userID,city,description,typeID,photo1,photo2,photo3,photo4) VALUES ('$name',$price,$userID,'$city','$description',$type,'$image[0]','$image[1]','$image[2]','$image[3]')";
echo $result=mysqli_query($connection,$query);

function make_seed()
{
    list($usec, $sec) = explode(' ', microtime());
    return $sec + $usec * 1000000;
}

//if(isset($_POST['add'])){
//   echo $name=$_POST['name'];
//    echo $type=$_POST['productType'];
//   echo $price=$_POST['productPrice'];
//   echo $city=$_POST['city'];
//   echo $description=$_POST['description'];
//   echo $user=$_POST['userName'];
//   echo $userID=$_POST['userID'];
//    $image=array();
//
////    echo $user;
//
//    $target_dir = "uploads/";
////    $target_file1 = basename($_FILES["img"]["name"][0]);
////    $target_file2 = basename($_FILES["img"]["name"][1]);
////    $target_file3 = basename($_FILES["img"]["name"][2]);
////    $target_file4 = basename($_FILES["img"]["name"][3]);
////    $uploadOk = 1;
////    $imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
////    $imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
////    $imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);
////    $imageFileType4 = pathinfo($target_file4,PATHINFO_EXTENSION);
//
//    foreach ($_FILES["img"]["error"] as $key => $error) {
//        if ($error == UPLOAD_ERR_OK) {
//            $tmp_name = $_FILES["img"]["tmp_name"][$key];
//            // basename() may prevent filesystem traversal attacks;
//            // further validation/sanitation of the filename may be appropriate
//            $imgname = basename($_FILES["img"]["name"][$key]);
//            $newfilename = round(microtime(true)).$imgname;
//            echo $newfilename;
//            move_uploaded_file($tmp_name, "$target_dir/$imgname");
//            array_push($image,$imgname);
//        }else{
////            $imgname = basename($_FILES["img"]["name"][$key]);
////            echo"<h2 class='white-color text-center'>There is an error in uploading file  $imgname</h2>";
//        }
//
//    }
//
////    if (move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file1)) {
////        echo "The file ". basename( $_FILES["img1"]["name"]). " has been uploaded.\n";
////    } else {
////        echo "Sorry, there was an error uploading your file.\n";
////    }
////    if (move_uploaded_file($_FILES["img2"]["tmp_name"], $target_file1)) {
////        echo "The file ". basename( $_FILES["img2"]["name"]). " has been uploaded.\n";
////    } else {
////        echo "Sorry, there was an error uploading your file.\n";
////    }
////    if (move_uploaded_file($_FILES["img3"]["tmp_name"], $target_file1)) {
////        echo "The file ". basename( $_FILES["img3"]["name"]). " has been uploaded.\n";
////    } else {
////        echo "Sorry, there was an error uploading your file.\n";
////    }
////    if (move_uploaded_file($_FILES["img4"]["tmp_name"], $target_file1)) {
////        echo "The file ". basename( $_FILES["img4"]["name"]). " has been uploaded.\n";
////    } else {
////        echo "Sorry, there was an error uploading your file.\n";
////    }
//
////    $image1=basename( $_FILES["img1"]["name"]);
////    $image2=basename( $_FILES["img2"]["name"]);
////    $image3=basename( $_FILES["img3"]["name"]);
////    $image4=basename( $_FILES["img4"]["name"]);
//    if(!isset($image[0])){
//        $temp="NoImage.png";
//        array_push($image,$temp);
//    }
//    if(!isset($image[1])){
//        $temp="NoImage.png";
//        array_push($image,$temp);
//    }
//    if(!isset($image[2])){
//        $temp="NoImage.png";
//        array_push($image,$temp);
//    }
//    if(!isset($image[3])){
//        $temp="NoImage.png";
//        array_push($image,$temp);
//    }
//    $query="insert into items(itemName,price,userID,city,description,typeID,photo1,photo2,photo3,photo4) VALUES ('$name',$price,$userID,'$city','$description',$type,'$image[0]','$image[1]','$image[2]','$image[3]')";
//
//
//    require("connection.php");
//    $result=$connection->query($query);
//    if($result){
//
//        echo "<h1 class='text-center white-color'>New Product has been Inserted to the database</h1>";
////        var_dump($result);
//    }
//    else
//        echo"<h1 class='text-center white-color'>Query failed to execute !! Contact your administrator</h1>";
//
//
//
//}
////header("index.php");
////echo"Hello to the future";
////echo"<script>alert('Hun sunao')</script>";
//?>
