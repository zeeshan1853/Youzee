<?php include'include/header.php';?>
<div class="container-fluid">
<section id="table_section">

       <label>From </label> <input type="text" name="dateFrom" id="dateFrom" placeholder="Date From" class="-control">
        <label>To </label><input type="text" name="dateTo" id="dateTo"  placeholder="Date To " class="ontrol">

    <table id="example" class="table table-striped table-bordered compact display" cellspacing="0" width="100%">
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
            <th>Action</th>
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
            <th>Action</th>
        </tr>
        </tfoot>
    </table>
</section>
</div>
<section id="model-section">
<?php include_once'add-new-product-modal.php'?>
</section>
<?php include_once'confirnDeleteModal.php'?>
<?php include'include/footer.php';?>