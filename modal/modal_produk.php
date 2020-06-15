<!-- Modal -->
<div class="modal fade" id="formModalProduk" tabindex="-1" role="dialog" aria-labelledby="formModalLabelProduct" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabelProduct">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/api-req/req_api_post_produk.php" method="post">
                    <input type="hidden" name="id_produk" id="id_produk">
                    <div class="form-group">
                        <label for="supplier_ids">Supplier Ids</label>
                        <input type="text" class="form-control" id="supplier_ids" name="supplier_ids" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="product_code">Product Code</label>
                        <input type="text" class="form-control" id="product_code" name="product_code" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>

                    <div class="form-group">
                        <label for="standard_cost">Standard Cost</label>
                        <input type="text" class="form-control" id="standard_cost" name="standard_cost">
                    </div>

                    <div class="form-group">
                        <label for="list_price">List Price</label>
                        <input type="text" class="form-control" id="list_price" name="list_price">
                    </div>

                    <div class="form-group">
                        <label for="reorder_level">Reorder Level</label>
                        <input type="text" class="form-control" id="reorder_level" name="reorder_level">
                    </div>

                    <div class="form-group">
                        <label for="target_level">Target Level</label>
                        <input type="text" class="form-control" id="target_level" name="target_level">
                    </div>

                    <div class="form-group">
                        <label for="quantity_per_unit">Quantity Per Unit</label>
                        <input type="text" class="form-control" id="quantity_per_unit" name="quantity_per_unit">
                    </div>

                    <div class="form-group">
                        <label for="discontinued">Discontinued</label>
                        <input type="text" class="form-control" id="discontinued" name="discontinued">
                    </div>

                    <div class="form-group">
                        <label for="minimum_reorder_quantity">Minimum Reorder Quantity</label>
                        <input type="text" class="form-control" id="minimum_reorder_quantity" name="minimum_reorder_quantity">
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="category">
                    </div>

                    <div class="form-group">
                        <label for="attachments">attachments</label>
                        <input type="text" class="form-control" id="attachments" name="attachments">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>