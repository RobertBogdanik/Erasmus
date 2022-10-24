<?php
    session_start();

    if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true){
        header('Location: ./facilities/');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/style.css">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <title>Erasmus</title>
    <style>
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <img alt="Erasmus+ homepage" src="./img/logo.png" style="max-width: 300px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"></ul>
                <a class="nav-link" href="https://sway.office.com/G1DYTIZ6YuE45dH4?ref=Link" target="_blank">E-book of the outcomes</a>
            </div>
        </div>
    </nav>
    <div>
        <?php
            if(isset($_GET['error'])){
                echo '<div class="alert alert-danger mt-3" role="alert">
                ' . $_GET['error'] . '
                </div>';
            }
        ?>
    </div>
    <div class="acces col-12 row mt-3">
        <div class="box col-12 col-md-5 m-auto">
            <form  action="./api/login.php" method="post">
                <h1 class="mb-5">Login</h1>
                <input type="text" name="login" placeholder="Login" autocomplete="off" /><br />
                <input type="password" name="password" placeholder="Password" autocomplete="off" class="mt-3" /><br />
                <input type="submit" value="Login" class="" />
            </form>
        </div>

        <div class="box col-12 col-md-5 m-auto mt-3 mt-md-0">
            <form action="./api/register.php" method="post">
                <h1 class="mb-3">Register</h1>
                <input type="text" name="name" class="mt-2" placeholder="User Name" autocomplete="off" />
                <input type="text" name="login" class="mt-2" placeholder="Login" autocomplete="off" />
                <input type="password" name="password" class="mt-2" placeholder="Password" autocomplete="off" />
                <select name="role" class="role mt-2">
                    <option value="0">student</option>
                    <option value="1">teacher</option>
                </select>
                <input type="submit" value="Login" />
            </form>
        </div>
    </div>

    <script src="./js/bootstrap.min.js"></script>
</body>
</html>
