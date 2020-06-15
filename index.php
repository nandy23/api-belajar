<?php

require_once 'template/header.php';

?>

<!-- Isi -->
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-6 tambah">

        </div>
    </div>
</div>

<div class="container">
    <main role="main" class="table-cont">
        <h3 id="judul" class="text-center"></h3>
        <table id="tabelku" class="responsive nowrap"></table>
    </main>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal-detil">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detil Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container" id="detil-body">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm tampilModalUbah" data-toggle="modal" data-target="#formModal">Edit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end isi -->

<div class="main"></div>

<!-- Modal -->
<?php require_once 'modal/modal_customers.php' ?>
<?php require_once 'modal/modal_produk.php' ?>
<!-- end modal -->

<?php require_once 'template/footer.php' ?>