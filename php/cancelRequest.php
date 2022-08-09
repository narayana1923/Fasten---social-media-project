<?php
    $conn = new mysqli("localhost","root","","fasten");
    if(isset($_GET['user_id'])){
        session_start();
        $username = $_SESSION['username'];
        $friendname = $_GET['user_id'];
        $sql = "delete from friend_requests where username = '$friendname'
                and friendname = '$username'";
        $conn->query($sql);
    }
    header("location: http://localhost/php/");
?>
