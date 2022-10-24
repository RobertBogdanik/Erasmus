<?php
    require_once 'dbconnect.php';
    session_start();

    if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true){
        header('Location: ./facilities/');
    }

    if(isset($_POST['password']) && isset($_POST['login'])){
        $sql = "SELECT * FROM users WHERE login = '" . $_POST['login'] . "' AND password = '" . sha1($_POST['password']) . "'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);

            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['isLogin'] = true;

            header('Location: ./facilities/');
        }

        header('Location: ./../?error=invalid login or password');
    }

    header('Location: ./../?error=invalid login or password');
?>
