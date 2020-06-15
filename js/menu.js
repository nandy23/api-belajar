function gopage(nama) {
    pages = 'page|' + nama;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $('#main-content').html(this.responseText);
            tampil('page');
        }
    };
    xhttp.open("GET", "./pages/" + nama + ".html", true);
    xhttp.send();
}

function tampil(hal, id) {
    if (hal === 'page') {
        $('.table-cont').hide();
        $('.page-cont').show();
    }
    if (hal === 'tabel') {
        $('.page-cont').hide();
        $('.table-cont').show();
    }
}

var pages = '';
var columns = [];
var columnNames = [];
var datatable;
var globadata = [];

function gotable(nama) {
    $('#formModalLabel').html('Tambah Data ' + nama);
    if (nama === 'customers') {
        $('.tambah').html('<button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">Tambah Data ' + nama + '</button >');
    } else if (nama === 'employees') {
        $('.tambah').html('<button type="button" class="btn btn-primary tombolTambahDataEmployees" data-toggle="modal" data-target="#formModal">Tambah Data ' + nama + '</button >');
    } else {
        $('.tambah').html('<button type="button" class="btn btn-primary tombolTambahDataProduct" data-toggle="modal" data-target="#formModalProduk">Tambah Data ' + nama + '</button >');
    }
    pages = 'tabel|' + nama;
    $('#judul').html('Data ' + nama);
    console.log(datatable);
    $.ajax({
        url: "http://localhost/Mamba/php-crud-api/api.php/records/" + nama,
        success: function (data) {
            if (data.records.length > 0) {
                data.data = data.records;
                data.recordsTotal = data.records.length;
                delete(data.records);
                columnNames = Object.keys(data.data[0]);
                columns = [];
                columns.push({
                    data: 'detil',
                    title: 'Detil'
                });
                columns.push({
                    data: 'editdata',
                    title: 'Edit'
                });
                columns.push({
                    data: 'hapusdata',
                    title: 'Hapus'
                });
                for (var i in columnNames) {
                    columns.push({
                        data: columnNames[i],
                        title: capitalizeFirstLetter(columnNames[i])
                    });
                }
                for (i = 0; i < data.data.length; i++) {
                    data.data[i].detil = '<button type="button" class="btn btn-primary btn-sm btdetil">Detil</button>';
                }
                for (i = 0; i < data.data.length; i++) {
                    if (nama === 'customers') {
                        data.data[i].editdata = '<button type="button" class="btn btn-success btn-sm tampilModalUbah" data-toggle="modal" data-target="#formModal">Edit</button>';
                    } else if (nama === 'employees') {
                        data.data[i].editdata = '<button type="button" class="btn btn-success btn-sm tampilModalUbahEmployees" data-toggle="modal" data-target="#formModal">Edit</button>';
                    } else {
                        data.data[i].editdata = '<button type="button" class="btn btn-success btn-sm tampilModalUbahProduct" data-toggle="modal" data-target="#formModalProduk">Edit</button>';
                    }

                }
                for (i = 0; i < data.data.length; i++) {
                    if (nama === 'customers') {
                        data.data[i].hapusdata = '<button type="button" class="btn btn-danger btn-sm hapusdata">Hapus</button>';
                    } else if (nama === 'employees') {
                        data.data[i].hapusdata = '<button type="button" class="btn btn-danger btn-sm hapusdataEmployees">Hapus</button>';
                    } else {
                        data.data[i].hapusdata = '<button type="button" class="btn btn-danger btn-sm hapusdataProduct">Hapus</button>';
                    }

                }

                if (datatable) {
                    datatable.clear();
                    datatable.destroy();
                }
                datatable = $('#tabelku').DataTable({
                    data: data.data,
                    responsive: true,
                    columns: columns,
                });
                tampil('tabel');
            }
        }
    });
    if (nama === 'customers') {
        $('#tabelku').on('click', '.hapusdata', function () {
            var data = datatable.row($(this).parents('tr')).data();
            var id = data['id'];
            //console.log(id);
            $.ajax({
                url: "http://localhost/api-belajar_coba/api-req/req_api_del.php",
                type: 'post',
                data: {
                    id: id
                },
                success: function () {
                    ('.main').load('index.php');
                },
                error: function (response) {
                    console.log(response.responseText);
                }
            });
        });


        $('.tombolTambahData').on('click', function () {
            $('#formModalLabel').html('Tambah Data');
            $('.modal-footer button[type=submit]').html('Tambah Data');
            $('#company').val('');
            $('#last_name').val('');
            $('#first_name').val('');
            $('#email_address').val('');
            $('#id').val('');
            $('#job_title').val('');
            $('#business_phone').val('');
            $('#home_phone').val('');
            $('#mobile_phone').val('');
            $('#fax_number').val('');
            $('#address').val('');
            $('#city').val('');
            $('#state_province').val('');
            $('#zip_postal_code').val('');
            $('#country_region').val('');
            $('#web_page').val('');
            $('#notes').val('');
            $('#attachments').val('');
        });


        $('#tabelku').on('click', '.tampilModalUbah', function () {
            $('#formModalLabel').html('Ubah Data ');
            $('.modal-footer button[type=submit]').html('Ubah Data');
            var data = datatable.row($(this).parents('tr')).data();
            $('.modal-body form').attr('action', 'http://localhost/api-belajar_coba/api-req/req_api_put.php');

            $('#company').val(data['company']);
            $('#last_name').val(data['last_name']);
            $('#first_name').val(data['first_name']);
            $('#email_address').val(data['email_address']);
            $('#id').val(data['id']);
            $('#job_title').val(data['job_title']);
            $('#business_phone').val(data['business_phone']);
            $('#home_phone').val(data['home_phone']);
            $('#mobile_phone').val(data['mobile_phone']);
            $('#fax_number').val(data['fax_number']);
            $('#address').val(data['address']);
            $('#city').val(data['city']);
            $('#state_province').val(data['state_province']);
            $('#zip_postal_code').val(data['zip_postal_code']);
            $('#country_region').val(data['country_region']);
            $('#web_page').val(data['web_page']);
            $('#notes').val(data['notes']);
            $('#attachments').val(data['attachments']);

        });
    } else if (nama === 'employees') {
        $('#tabelku').on('click', '.hapusdataEmployees', function () {
            var data = datatable.row($(this).parents('tr')).data();
            var id = data['id'];
            //console.log(id);
            $.ajax({
                url: "http://localhost/api-belajar_coba/api-req/req_api_del_employees.php",
                type: 'post',
                data: {
                    id: id
                },
                success: function () {
                    ('.main').load('index.php');
                },
                error: function (response) {
                    console.log(response.responseText);
                }
            });
        });


        $('.tombolTambahDataEmployees').on('click', function () {
            $('#formModalLabel').html('Tambah Data Employees');
            $('.modal-body form').attr('action', 'http://localhost/api-belajar_coba/api-req/req_api_post_employees.php');
            $('.modal-footer button[type=submit]').html('Tambah Data Employees');
            $('#company').val('');
            $('#last_name').val('');
            $('#first_name').val('');
            $('#email_address').val('');
            $('#id').val('');
            $('#job_title').val('');
            $('#business_phone').val('');
            $('#home_phone').val('');
            $('#mobile_phone').val('');
            $('#fax_number').val('');
            $('#address').val('');
            $('#city').val('');
            $('#state_province').val('');
            $('#zip_postal_code').val('');
            $('#country_region').val('');
            $('#web_page').val('');
            $('#notes').val('');
            $('#attachments').val('');
        });


        $('#tabelku').on('click', '.tampilModalUbahEmployees', function () {
            $('#formModalLabel').html('Ubah Data Employees');
            $('.modal-footer button[type=submit]').html('Ubah Data Employees');
            var data = datatable.row($(this).parents('tr')).data();
            $('.modal-body form').attr('action', 'http://localhost/api-belajar_coba/api-req/req_api_put_employees.php');

            $('#company').val(data['company']);
            $('#last_name').val(data['last_name']);
            $('#first_name').val(data['first_name']);
            $('#email_address').val(data['email_address']);
            $('#id').val(data['id']);
            $('#job_title').val(data['job_title']);
            $('#business_phone').val(data['business_phone']);
            $('#home_phone').val(data['home_phone']);
            $('#mobile_phone').val(data['mobile_phone']);
            $('#fax_number').val(data['fax_number']);
            $('#address').val(data['address']);
            $('#city').val(data['city']);
            $('#state_province').val(data['state_province']);
            $('#zip_postal_code').val(data['zip_postal_code']);
            $('#country_region').val(data['country_region']);
            $('#web_page').val(data['web_page']);
            $('#notes').val(data['notes']);
            $('#attachments').val(data['attachments']);

        });
    } else {
        $('#tabelku').on('click', '.hapusdataProduct', function () {
            var data = datatable.row($(this).parents('tr')).data();
            var id = data['id'];
            //console.log(id);
            $.ajax({
                url: "http://localhost/api-belajar_coba/api-req/req_api_del_produk.php",
                type: 'post',
                data: {
                    id: id
                },
                success: function () {
                    ('.main').load('index.php');
                },
                error: function (response) {
                    console.log(response.responseText);
                }
            });
        });


        $('.tombolTambahDataProduct').on('click', function () {
            $('#formModalLabelProduct').html('Tambah Data Product');
            $('.modal-footer button[type=submit]').html('Tambah Data Product');
            $('#supplier_ids').val();
            $('#id_produk').val();
            $('#product_code').val();
            $('#product_name').val();
            $('#description').val();
            $('#standard_cost').val();
            $('#list_price').val();
            $('#home_phone').val();
            $('#reorder_level').val();
            $('#target_level').val();
            $('#quantity_per_unit').val();
            $('#discontinued').val();
            $('#minimum_reorder_quantity').val();
            $('#category').val();
            $('#attachments').val();
        });


        $('#tabelku').on('click', '.tampilModalUbahProduct', function () {
            $('#formModalLabelProduct').html('Ubah Data Product');
            $('.modal-footer button[type=submit]').html('Ubah Data Product');
            var data = datatable.row($(this).parents('tr')).data();
            //console.log(data['id']);
            $('.modal-body form').attr('action', 'http://localhost/api-belajar_coba/api-req/req_api_put_produk.php');

            $('#supplier_ids').val(data['supplier_ids']);
            $('#id_produk').val(data['id']);
            $('#product_code').val(data['product_code']);
            $('#product_name').val(data['product_name']);
            $('#description').val(data['description']);
            $('#standard_cost').val(data['standard_cost']);
            $('#list_price').val(data['list_price']);
            $('#home_phone').val(data['home_phone']);
            $('#reorder_level').val(data['reorder_level']);
            $('#target_level').val(data['target_level']);
            $('#quantity_per_unit').val(data['quantity_per_unit']);
            $('#discontinued').val(data['discontinued']);
            $('#minimum_reorder_quantity').val(data['minimum_reorder_quantity']);
            $('#category').val(data['category']);
            $('#attachments').val(data['attachments']);

        });
    }
}

$('#tabelku').on('click', '.btdetil', function () {
    var data = datatable.row($(this).parents('tr')).data();
    ///console.log(data);
    var teks = '';
    for (var i in columnNames) {
        if (data[columnNames[i]] !== null) {
            teks = teks + '<tr><td class="detlabel">' + capitalizeFirstLetter(columnNames[i]) + "</td>";
            teks = teks + '<td>' + data[columnNames[i]] + "</td></tr>";
        }
    }
    teks = '<table style="width:80%">' + teks + '</table>';
    $('#detil-body').html(teks);
    $('#modal-detil').modal('show');

});

function capitalizeFirstLetter(string) {
    string = string.replace(/_/g, ' ');
    return string.charAt(0).toUpperCase() + string.slice(1);
}