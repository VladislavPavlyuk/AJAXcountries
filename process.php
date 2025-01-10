<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $country = trim($_POST['country']);
    if (!empty($country)) {
        $filename = 'countries.txt';
        $countries = file($filename, FILE_IGNORE_NEW_LINES);
        if (!in_array($country, $countries)) {
            file_put_contents($filename, $country . PHP_EOL, FILE_APPEND);
        }
    }
    header('Content-Type: application/json');
    echo json_encode(file($filename, FILE_IGNORE_NEW_LINES));
}

