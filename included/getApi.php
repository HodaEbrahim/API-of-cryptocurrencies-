<?php
    $selectedCurrency = isset($_POST['selectedCurrency']) == true ? $_POST['selectedCurrency'] : "USD";
    $start = isset($_POST['start']) == true ? $_POST['start'] : 1;
    $entries = isset($_POST['entries']) == true ? $_POST['entries'] : 10;
    $sortingBy = isset($_POST['sortingBy']) == true ? $_POST['sortingBy'] : "name";
    $sortingType = isset($_POST['sortingType']) == true ? $_POST['sortingType'] : "asc";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //echo $start . "----" . $end;
        $data = file_get_contents('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?CMC_PRO_API_KEY=0229d626-8132-4715-9e26-c02ad1159863&start=' . $start . '&limit=' . $entries .'&convert=' . $selectedCurrency . '&sort=' . $sortingBy . '&sort_dir=' . $sortingType);
        echo $data;
    }

    $tick = file_get_contents('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?CMC_PRO_API_KEY=0229d626-8132-4715-9e26-c02ad1159863&start=' . $start . '&limit=' . $entries .'&convert=' . $selectedCurrency . '&sort=' . $sortingBy . '&sort_dir=' . $sortingType);
    $data = json_decode($tick, TRUE);
?>