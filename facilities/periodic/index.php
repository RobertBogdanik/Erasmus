<?php
    session_start();

    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true){
        header('Location: ./../');
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./../../css/periodic.css">
    <title>Periodic Table</title>
    <style></style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <img alt="Erasmus+ homepage" src="./../../img/logo2.jpg" width="100">
            <img alt="Erasmus+ homepage" src="./../../img/logo.png" width="200">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 500px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./../">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./../chat/">Chat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./../translator/">Translator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./../periodic/">Periodic Table</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="./../dictionary/">Dictionary</a>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href="./../../api/logout.php">Sign Out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://sway.office.com/G1DYTIZ6YuE45dH4?ref=Link" target="_blank"
                            style>E-book of the outcomes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="display">Click on a chemical element to display info about it!</div>
    <div id="periodic_table"></div>

    <script src="./../../js/bootstrap.min.js"></script>
    <script src="./../../js/periodic.js"></script>
</body>
</html>
