<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/api-req/req_api_post.php" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Company</label>
                        <input type="text" class="form-control" id="company" name="company" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="first_name">Firts Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="email_address">Email</label>
                        <input type="email" class="form-control" id="email_address" name="email_address">
                    </div>

                    <div class="form-group">
                        <label for="job_title">Job</label>
                        <input type="text" class="form-control" id="job_title" name="job_title">
                    </div>

                    <div class="form-group">
                        <label for="business_phone">Business Phone</label>
                        <input type="text" class="form-control" id="business_phone" name="business_phone">
                    </div>

                    <div class="form-group">
                        <label for="home_phone">Home Phone</label>
                        <input type="text" class="form-control" id="home_phone" name="home_phone">
                    </div>

                    <div class="form-group">
                        <label for="mobile_phone">Mobile Phone</label>
                        <input type="text" class="form-control" id="mobile_phone" name="mobile_phone">
                    </div>

                    <div class="form-group">
                        <label for="fax_number">Fax Number</label>
                        <input type="text" class="form-control" id="fax_number" name="fax_number">
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>

                    <div class="form-group">
                        <label for="city">Kota</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>

                    <div class="form-group">
                        <label for="state_province">Provinsi</label>
                        <input type="text" class="form-control" id="state_province" name="state_province">
                    </div>

                    <div class="form-group">
                        <label for="zip_postal_code">Kode Pos</label>
                        <input type="text" class="form-control" id="zip_postal_code" name="zip_postal_code">
                    </div>

                    <div class="form-group">
                        <label for="country_region">Negara</label>
                        <input type="text" class="form-control" id="country_region" name="country_region">
                    </div>

                    <div class="form-group">
                        <label for="web_page">Alamat Web</label>
                        <input type="text" class="form-control" id="web_page" name="web_page">
                    </div>

                    <div class="form-group">
                        <label for="notes">Catatan</label>
                        <input type="text" class="form-control" id="notes" name="notes">
                    </div>

                    <div class="form-group">
                        <label for="attachments">Lampiran</label>
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