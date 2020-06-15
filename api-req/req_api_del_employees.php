<?php
require_once '../config/config.php';

// kvstore API url
$url = 'http://localhost/Mamba/php-crud-api/api.php/records/employees/' . $_POST['id'];

// Initializes a new cURL session
$curl = curl_init($url);

// Set the CURLOPT_RETURNTRANSFER option to true
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set the CURLOPT_POST option to true for POST request
//set option request
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');

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
