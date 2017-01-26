<?php
    $id = $_GET['id'];
   // echo $id;
    require('connection.php');
//    $query="select * from items where itemID=$id";
    $query="SELECT itemID,itemName,items.typeID,typeName,userID,price,city,photo1,photo2,photo3,photo4,description FROM items JOIN types on items.typeID=types.typeID WHERE items.itemID=".$id;

?>

<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title></title>-->
<!---->
<!--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet">-->
<!--    <link href="css/style_products.css.css" rel="stylesheet" >-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>-->
<!--    <script src='http://masonry.desandro.com/masonry.pkgd.js'></script>-->
<!--    <script src='http://imagesloaded.desandro.com/imagesloaded.pkgd.js'></script>-->
<!---->
<!---->
<!--    <style>-->
<!---->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<?php include'include/header.php'?>
<?php
    $result=mysqli_query($connection,$query);
    if(!$result){
        echo"<h1 class='text-center white-color'>Could'nt execute query successfully. Please contact your administrator</h1>\n";
        exit;
    }
    if (mysqli_num_rows($result) == 0) {
        echo "<h1 class='text-center white-color'>No product found in database</h1>";
        exit;
    }else{
        $product = mysqli_fetch_assoc($result);
        $number=$product['itemID'];
        $userID=$product['userID'];
        $pName=$product['itemName'];
        $type=$product['typeName'];
        $price=$product['price'];
        $city=$product['city'];
        $image1=$product['photo1'];
        $image2=$product['photo2'];
        $image3=$product['photo3'];
        $image4=$product['photo4'];
        $userName=" ";
        $userEmail=" ";

        $userData=mysqli_query($connection,"Select * FROM users WHERE userID=$userID");
        if(!$userData){
            echo"<h1 class='white-color text-center'>Couldn't Execute Query to fetch user Data. Please contact your administrator</h1>";
        }
        if(mysqli_num_rows($userData)==0){
            echo "<h1 class='white-color text-center'>User data not available at this time</h1>";
        }else{
            $users=mysqli_fetch_assoc($userData);
             $userName=$users['userName'];
             $userEmail=$users['userEmail'];
        }
    }
?>
<div class="container detail-container white-color mrgn-top-50">
    <h2 class="text-center">Price per day</h2>
    <hr style="border-top: 5px solid black">
    <div class="row">
        <div class="col-md-6 col-sm-6"><h4 class="text-center">Product Name</h4></div>
        <div class="col-md-6 col-sm-6"><h4 class="text-center"><?php echo $product['itemName'];?></h4></div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6"><h4 class="text-center">Product Type</h4></div>
        <div class="col-md-6 col-sm-6"><h4 class="text-center"><?php echo $product['typeName'];?></h4></div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6"><h4 class="text-center">Product Price</h4></div>
        <div class="col-md-6 col-sm-6"><h4 class="text-center"><?php echo $product['price'];?></h4></div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6"><h4 class="text-center">Product City</h4></div>
        <div class="col-md-6 col-sm-6"><h4 class="text-center"><?php echo $product['city'];?></h4></div>
    </div>


    <div class="row">
        <div class="col-md-6 col-sm-6"><h4 class="text-center">Product Owner</h4></div>
        <div class="col-md-6 col-sm-6"><h4 class="text-center"><?php echo $userName;?></h4></div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6"><h4 class="text-center">Owner Email </h4></div>
        <div class="col-md-6 col-sm-6"><h4 class="text-center"><?php echo $userEmail?></h4></div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6"><h4 class="text-center">Description</h4></div>
        <div class="col-md-6 col-sm-6"><h4 class="text-center"><?php echo $product['description'];?></h4></div>
    </div>

    <div class="row">
        <h2 class="text-center">Product Images</h2>
    </div>
    <hr style="border-top: 5px solid black">


    <div class="grid">
        <div class="grid-sizer"></div>
        <div class="grid-item">
            <?php echo "<img src='uploads/$image1' class='img-responsive' >"; ?>
        </div>
        <div class="grid-item">
            <?php echo "<img src='uploads/$image2' class='img-responsive' >"; ?>
        </div>
        <div class="grid-item">
            <?php echo "<img src='uploads/$image3' class='img-responsive' >"; ?>
        </div>
        <div class="grid-item">
            <?php echo "<img src='uploads/$image4' class='img-responsive' >"; ?>
        </div>
    </div>

</div>

<duv class="container">

</duv>
<script>
    var $grid = $('.grid').masonry({
        itemSelector: '.grid-item',
        percentPosition: true,
        columnWidth: '.grid-sizer'
    });
    // layout Isotope after each image loads
    $grid.imagesLoaded().progress( function() {
        $grid.masonry();
    });
</script>
<!--</body>-->
<!--</html>-->
<?php include'include/footer.php'?>