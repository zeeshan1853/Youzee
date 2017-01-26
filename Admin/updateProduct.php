<?php require_once'../connection.php'?>
<?php
$queries=array();
$itemID= $_POST['itemID'];
$name='';
$type='';
$price='';
$city='';
$description='';

if(isset($_POST['name'])){
    $name=$_POST['name'];
    $queries[]="update items set itemName='".$name."' where itemID=".$itemID;
}
if(isset($_POST['productType'])){
    $type=$_POST['productType'];
    $queries[]="update items set typeID=".$type." where itemID=".$itemID;
}
if(isset($_POST['productPrice'])){
    $price=$_POST['productPrice'];
    $queries[]="update items set price=".$price." where itemID=".$itemID;
}
if(isset($_POST['city'])){
    $city=$_POST['city'];
    $queries[]="update items set city='".$city."' where itemID=".$itemID;
}
if(isset($_POST['description'])){
    $description=$_POST['description'];
    $queries[]="update items set description='".$description."' where itemID=".$itemID;
}

//$target_dir = "../uploads/";
//
//foreach ($_FILES["img"]["error"] as $key => $error) {
//    if ($error == UPLOAD_ERR_OK) {
//        $tmp_name = $_FILES["img"]["tmp_name"][$key];
//        // basename() may prevent filesystem traversal attacks;
//        // further validation/sanitation of the filename may be appropriate
//        $imgname = basename($_FILES["img"]["name"][$key]);
//        $newfilename = round(microtime(true)).$imgname;
//        echo $newfilename;
//        move_uploaded_file($tmp_name, "$target_dir/$newfilename");
//        array_push($image,$imgname);
//    }else{
//        echo "error in uploading file: ".$imgname;
//    }
//
//}
$targetPath='../uploads/';
if(isset($_FILES['img']['name'][0]) && $_FILES['img']['size'][0]!==0){
     $sourcePath = $_FILES['img']['tmp_name'][0];
     $imgname = basename($_FILES["img"]["name"][0]);
     $ext = pathinfo($imgname, PATHINFO_EXTENSION);
     $name_token=explode(".",$imgname);
     srand(make_seed());
     $randval = rand();
     if(strlen($name_token[0])>10){
         $name_token[0]=substr($name_token[0],'10');
     }
    $updated_name=$randval.$name_token[0].rand().".".$ext;
    move_uploaded_file($sourcePath,$targetPath.$updated_name);
    $queries[]="update items set photo1='".$updated_name."' where itemID=".$itemID;

}
if(isset($_FILES['img']['name'][1]) && $_FILES['img']['size'][1]!==0){
    $sourcePath = $_FILES['img']['tmp_name'][1];
    $imgname = basename($_FILES["img"]["name"][1]);
    $ext = pathinfo($imgname, PATHINFO_EXTENSION);
    $name_token=explode(".",$imgname);
    srand(make_seed());
    $randval = rand();
    if(strlen($name_token[0])>10){
        $name_token[0]=substr($name_token[0],'10');
    }
    $updated_name=$randval.$name_token[0].rand().".".$ext;
    move_uploaded_file($sourcePath,$targetPath.$updated_name);
    $queries[]="update items set photo2='".$updated_name."' where itemID=".$itemID;
}
if(isset($_FILES['img']['name'][2]) && $_FILES['img']['size'][2]!==0){
    $sourcePath = $_FILES['img']['tmp_name'][2];
    $imgname = basename($_FILES["img"]["name"][2]);
    $ext = pathinfo($imgname, PATHINFO_EXTENSION);
    $name_token=explode(".",$imgname);
    srand(make_seed());
    $randval = rand();
    if(strlen($name_token[0])>10){
        $name_token[0]=substr($name_token[0],'10');
    }
    $updated_name=$randval.$name_token[0].rand().".".$ext;
    move_uploaded_file($sourcePath,$targetPath.$updated_name);
    $queries[]="update items set photo3='".$updated_name."' where itemID=".$itemID;
}
if(isset($_FILES['img']['name'][3]) && $_FILES['img']['size'][3]!==0){
    $sourcePath = $_FILES['img']['tmp_name'][3];
    $imgname = basename($_FILES["img"]["name"][3]);
    $ext = pathinfo($imgname, PATHINFO_EXTENSION);
    $name_token=explode(".",$imgname);
    srand(make_seed());
    $randval = rand();
    if(strlen($name_token[0])>10){
        $name_token[0]=substr($name_token[0],'10');
    }
    $updated_name=$randval.$name_token[0].rand().".".$ext;
    move_uploaded_file($sourcePath,$targetPath.$updated_name);
    $queries[]="update items set photo4='".$updated_name."' where itemID=".$itemID;
}

$query="";
foreach($queries as $temp){
    $query=$query.$temp."; ";
}
$result=mysqli_multi_query($connection,$query);


function make_seed()
{
    list($usec, $sec) = explode(' ', microtime());
    return $sec + $usec * 1000000;
}

?>