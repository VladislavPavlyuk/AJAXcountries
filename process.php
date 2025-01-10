<?php
if (isset($_POST['country'])) {
    $country = trim($_POST['country']);
    $dictionary = file('dictionary.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $countries = file('countries.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (in_array($country, $dictionary) && !in_array($country, $countries)) {
        file_put_contents('countries.txt', $country . PHP_EOL, FILE_APPEND);
    }

    $countries = file('countries.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $options = '<option value="">Select a country</option>';
    foreach ($countries as $c) {
        $options .= '<option value="' . htmlspecialchars($c) . '">' . htmlspecialchars($c) . '</option>';
    }
    echo $options;
}
?>

