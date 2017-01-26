<?php include'include/header.php'?>
<section class="container-fluid" id="products-table-section">
    <table id="example" class=" table table-striped table-bordered compact " cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>itemID</th>
            <th>itemName</th>
            <th>typeID</th>
            <th>typeProduct</th>
            <th>price</th>
            <th>city</th>
            <th>description</th>
            <th>date</th>
            <th>photo1</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>itemID</th>
            <th>itemName</th>
            <th>typeID</th>
            <th>typeProduct</th>
            <th>price</th>
            <th>city</th>
            <th>description</th>
            <th>date</th>
            <th>photo1</th>
        </tr>
        </tfoot>
    </table>
</section>
<?php if($flag){
echo '<section class="container-fluid" id="add-new-product-section">';
echo  '<div class="col-md-3 col-sm-12">';
echo  '<button class="btn btn-danger form-control " type="button" style="height: 40px"  data-toggle="modal" data-target="#myModal" > New </button>';
echo  '</div>';
    include_once "add-new-product-modal.php";
echo '</section>';
} ?>


<?php include'include/footer.php'?>