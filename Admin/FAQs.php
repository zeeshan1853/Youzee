<?php include 'include/header.php'; require'../connection.php' ?>
<div class="container">
    <div class="alert alert-success" id="response_alert"></div>
    <form action="" method="post" id="faq_form">
        <input type="text" name="question" placeholder="Question" class="form-control margin-bottom-10">
        <textarea rows="10" name="answer" placeholder="Answer" class="form-control margin-bottom-10"></textarea>
        <input type="submit" class="btn btn-success pull-right">
    </form>
</div>
<?php
$query="select * from faqs";
 $result=mysqli_query($connection,$query);
$questions=array();
$answers=array();
while($row=mysqli_fetch_assoc($result)){
    array_push($questions,$row['question']);
    array_push($answers,$row['answer']);
}
?>
<div class="container" id="faqs">
    <?php
    for($i=0;$i<sizeof($questions);$i++){
        echo "<h3>$questions[$i]</h3>";
        echo "<p>$answers[$i]</p>";
    }
    ?>
</div>
<script src="js/users.js" type="text/javascript"></script>
</body>
</html>

