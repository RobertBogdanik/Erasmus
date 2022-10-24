<?php
    require_once 'dbconnect.php';

    session_start();

    if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true){
        header('Location: ./facilities/');
    }

    if(isset($_POST['password']) && isset($_POST['login']) && isset($_POST['role']) && isset($_POST['name'])){
        if(strlen($_POST['password']) < 8){
            header('Location: ./../?error=Password must be at least 8 characters long');
        }

        if(strlen($_POST['login']) < 3){
            header('Location: ./../?error=Login must be at least 3 characters long');
        }

        if(strlen($_POST['name']) < 3){
            header('Location: ./../?error=Name must be at least 3 characters long');
        }

        $sql = "SELECT * FROM users WHERE login = '" . $_POST['login'] . "'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1){
            header('Location: ./../?error=Login already exists');
        }

        $sql = "INSERT INTO users (login, password, name, role) VALUES ('" . $_POST['login'] . "', '" . sha1($_POST['password']) . "', '" . $_POST['name'] . "', '" . $_POST['role'] . "')";
        $result = mysqli_query($conn, $sql);

        if($result){
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['role'] = $_POST['role'];
            $_SESSION['id'] = mysqli_insert_id($conn);
            $_SESSION['isLogin'] = true;

            header('Location: ./../facilities/');
        } else {
            header('Location: ./../?error=Something went wrong');
        }
    }else{

        header('Location: ./../?error=all fields are requiredy');
    }

?>