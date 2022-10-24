<?php
    require_once 'dbconnect.php';
    session_start();
    
    $sql = '';
    if(isset($_GET['type'])){
        switch($_GET['type']){
            case 'since':
                $sql = 'SELECT c.id, c.message, c.sentDate, c.image, u.name, u.thumbnail, u.role FROM `chat` AS c JOIN users AS u ON c.user_id=u.id WHERE c.`sentDate`>"' . $_GET['value'] . '" ORDER BY c.`id` DESC LIMIT 30;';
                break;
            case 'before':
                $sql = 'SELECT c.id, c.message, c.sentDate, c.image, u.name, u.thumbnail, u.role FROM `chat` AS c JOIN users AS u ON c.user_id=u.id WHERE c.`id`<'. $_GET['value'] . ' ORDER BY c.`id` DESC LIMIT 30;';
                break;
            case 'add':
                $sql = 'INSERT INTO `chat` ( `user_id`, `message`) VALUES ("'.$_SESSION['id'].'", "'.$_GET['message'].'")';
                echo $sql;
                $conn->query($sql);
                $sql = 'SELECT * FROM `chat` WHERE `id`=' . $conn->insert_id . ' ;';
                break;
            default:
                $sql = 'SELECT c.id, c.message, c.sentDate, c.image, u.name, u.thumbnail, u.role FROM `chat` AS c JOIN users AS u ON c.user_id=u.id ORDER BY c.`id` DESC LIMIT 30;';
                break;
        }
        $result = $conn->query($sql);
        $messages = array();
        if($result){
            while($row = $result->fetch_assoc()){
                $messages[] = $row;
            }
        }
        echo json_encode($messages);
    }
            
?>
