<?php

    require_once 'dbconnect.php';

    session_start();

    // if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sql = "INSERT INTO `chat` ( `user_id`, `message`, `image`) VALUES ('".$_SESSION['id']."', '".$_POST['message']."', NULL);";
    $conn->query($sql);
    $insertID = $conn->insert_id;

    $file_name = "upload/upl-".$insertID."-".basename($_FILES["image"]["name"]);
    $target_file =  "./../img/".$file_name;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "UPDATE `chat` SET `image` = '".$file_name."' WHERE `id` = ".$insertID.";";
        $conn->query($sql);
        echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
    }

    header('Location: ./../facilities/chat');
?>
