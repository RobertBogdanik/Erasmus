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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./../css/style.css">
    <link href="./../css/bootstrap.min.css" rel="stylesheet">
    <title>Erasmus</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light row m-0 col-12">
        <div class="col-5">

            <img alt="Erasmus+ homepage" src="./../img/logo.jpg" height="100px">
            <img alt="Erasmus+ homepage" src="./../img/FE.jpg" height="80px">
        </div>
        <div class="container col-7">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 500px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./chat/">Chat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./translator/">Translator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./periodic/">Periodic Table</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./../api/logout.php">Sign Out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://sway.office.com/G1DYTIZ6YuE45dH4?ref=Link" target="_blank"
                            style>E-book of the outcomes</a>
                    </li>
                </ul>
            </div>


        </div>
    </nav>

    <div class="row col-11 m-auto">
        <div class="col-11 m-auto col-md-4 p-3">
            <div class="card text-center">
                <img src="./../img/chat.png" class="card-img-top m-auto mt-4" alt="..." style="width: 100px;">
                <div class="card-body">
                    <h5 class="card-title">Messanger</h5>
                    <p class="card-text">Simple application that allows you to consult the teacher in real time.</p>
                    <a href="./chat" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-11 m-auto col-md-4 p-3">
            <div class="card text-center">
                <img src="./../img/translator.png" class="card-img-top m-auto mt-4" alt="..." style="width: 100px;">
                <div class="card-body">
                    <h5 class="card-title">Translator</h5>
                    <p class="card-text">Application that enables fast and accurate translation of messages between
                        project participants.</p>
                    <a href="./translator" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-11 m-auto col-md-4 p-3">
            <div class="card text-center">
                <img src="./../img/periodic-table.png" class="card-img-top m-auto mt-4" alt="..." style="width: 100px;">
                <div class="card-body">
                    <h5 class="card-title">Periodic Table</h5>
                    <p class="card-text">Periodic table of the elements which is a must for every chemistry lesson.</p>
                    <a href="./periodic" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-11 m-auto col-md-6 p-3">
            <div class="card text-center">
                <img src="./../img/e-book.png" class="card-img-top m-auto mt-4" alt="..." style="width: 100px;">
                <div class="card-body">
                    <h5 class="card-title">E-book</h5>
                    <p class="card-text">Ebook summarizing our application.</p>
                    <a href="https://sway.office.com/G1DYTIZ6YuE45dH4?ref=Link" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-11 m-auto col-md-6 p-3">
            <div class="card text-center">
                <img src="./../img/sign-out.png" class="card-img-top m-auto mt-4" alt="..." style="width: 100px;">
                <div class="card-body">
                    <h5 class="card-title">Sign Out</h5>
                    <p class="card-text">We hope you will come back to us again.</p>
                    <a href="./../api/logout.php" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.7);">
            <a class="text-dark" href="https://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">
                <img src="./../img/cc.svg" alt="Creative Commons" style="height: 50px;">
            </a>
            <a href="https://icons8.com/" class="text-dark" target="_blank">
                <img src="./../img/icons8.png" alt="Icons8" style="height: 50px;">
            </a>
        </div>
    </footer>
    <script src="./../js/bootstrap.min.js"></script>
</body>

</html>