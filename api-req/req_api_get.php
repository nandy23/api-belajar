<?php
require_once '../config/config.php';

// kvstore API url
$url = 'http://localhost/Mamba/php-crud-api/api.php/records/customers';

// Initializes a new cURL session
$curl = curl_init($url);

// Set the CURLOPT_RETURNTRANSFER option to true
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);

// Execute cURL request with all previous settings
$response = curl_exec($curl);

// Close cURL session
curl_close($curl);

if ($response > 0) {
    header('Location: ' . BASEURL);
    exit;
}
