<?php
require_once '../config/config.php';

// Collection object
if (isset($_POST['submit'])) {
    //var_dump($_POST);
    //die;
    // kvstore API url
    $url = 'http://localhost/Mamba/php-crud-api/api.php/records/products/' . $_POST['id_produk'];
    // Collection object
    $data = [
        "supplier_ids" => $_POST['supplier_ids'],
        "product_code" => $_POST['product_code'],
        "product_name" => $_POST['product_name'],
        "description" => $_POST['description'],
        "standard_cost" => $_POST['standard_cost'],
        "list_price" => $_POST['list_price'],
        "reorder_level" => $_POST['reorder_level'],
        "target_level" => $_POST['target_level'],
        "quantity_per_unit" => $_POST['quantity_per_unit'],
        "discontinued" => $_POST['discontinued'],
        "minimum_reorder_quantity" => $_POST['minimum_reorder_quantity'],
        "category" => $_POST['category'],
        "attachments" => $_POST['attachments']
    ];

    // Initializes a new cURL session
    $curl = curl_init($url);

    // Set the CURLOPT_RETURNTRANSFER option to true
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //set option request
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');

    // Set the CURLOPT_POST option to true for POST request
    //curl_setopt($curl, CURLOPT_POST, true);

    // Set the request data as JSON using json_encode function
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));

    // Set custom headers for RapidAPI Auth and Content-Type header
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    // Execute cURL request with all previous settings
    $response = curl_exec($curl);

    // Close cURL session
    curl_close($curl);

    if ($response > 0) {
        echo '<script>alert("Data Berhasil Dihapus");</script>';
        header('Location: ' . BASEURL);
        exit;
    } else {
        echo $response . PHP_EOL;
    }
}
