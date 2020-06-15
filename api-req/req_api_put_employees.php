<?php
require_once '../config/config.php';

// Collection object
if (isset($_POST['submit'])) {
    // var_dump($_POST);
    // die;
    // kvstore API url
    $url = 'http://localhost/Mamba/php-crud-api/api.php/records/employees/' . $_POST['id'];
    // Collection object
    $data = [
        "company" => $_POST['company'],
        "last_name" => $_POST['last_name'],
        "first_name" => $_POST['first_name'],
        "email_address" => $_POST['email_address'],
        "job_title" => $_POST['job_title'],
        "business_phone" => $_POST['business_phone'],
        "home_phone" => $_POST['home_phone'],
        "mobile_phone" => $_POST['mobile_phone'],
        "fax_number" => $_POST['fax_number'],
        "address" => $_POST['address'],
        "city" => $_POST['city'],
        "state_province" => $_POST['state_province'],
        "zip_postal_code" => $_POST['zip_postal_code'],
        "country_region" => $_POST['country_region'],
        "web_page" => $_POST['web_page'],
        "notes" => $_POST['notes'],
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
    }
}
