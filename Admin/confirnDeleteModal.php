<div class="modal fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="frm_title">Delete Product</h4>
                <p id="product_name_label"></p>
            </div>
            <div class="modal-body" id="frm_body">

            </div>
            <div class="modal-footer">
                <form action="" method="post" id="delete_confirm_form">
                    <input type="hidden" name="id_delete" id="id_delete">
                    <input style='margin-left:10px;' type="submit" class="btn btn-primary col-sm-2 pull-right" id="frm_submit" value="Yes">
                </form>
                <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>
            </div>
        </div>
    </div>
</div>