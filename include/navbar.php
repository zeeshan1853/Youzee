<?php
session_start();
$flag=false;
if(isset($_SESSION['userEmail']) && isset($_SESSION['userName'])){
    $flag=true;
}
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Youzee</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="products.php">Products</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if($flag){
                    echo "<li id='temp'><a href='#' ><span class='glyphicon glyphicon-user'></span> ".$_SESSION["userName"]." </a></li>";
                    echo "<li><a href='#' id='logout'><span class='glyphicon glyphicon-log-in'></span> Logout</a></li>";
                }else{
                    echo "<li><a href='index.php' id='login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                }
                ?>

            </ul>
        </div>
    </div>
</nav>
<script>
//    $('#logout').click(function(evt) {
//
//        evt.preventDefault();
//        alert('here in');
//
//    });
</script>