<?php
session_start();
error_reporting(0);
if (!isset($_SESSION["user_id"])) {
    header("LOCATION: login.php?authorized=false");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="PWA for feasible solution contracting IMS. Author: Abdul Raheem (38103-6175317-7)">
    <meta name="author" content="Abdul Raheem">
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#4A90E2">
    <link rel="icon" href="/img/logo-small.png" type="image/png">


    <title>ARHEX LABS</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .custom-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            width: 100%;
        }

        .input-label {
            width: 100%;
        }

        .label-button {
            display: flex;
            justify-content: center;
            align-items: end;
            height: 70px;
        }
    </style>
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/js/service-worker.js')
                .then(() => console.log('Service Worker registered'))
                .catch((error) => console.error('Service Worker registration failed:', error));
        }
    </script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">