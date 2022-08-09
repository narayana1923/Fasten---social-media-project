<?php
    $conn = new mysqli("localhost","root","","fasten");
    if(isset($_GET['user_id'])){
        session_start();
        $username = $_SESSION['username'];
        $friendname = $_GET['user_id'];
        $dt = date('Y/m/d');
        $sql = "delete from friend_requests where friendname = '$friendname'
                and username = '$username'";
        $conn->query($sql);
        $sql = "insert into friends(username,friendname,since) values('$username','$friendname','$dt')";
        $conn->query($sql);
        $sql = "insert into friends(friendname,username,since) values('$username','$friendname','$dt')";
        $conn->query($sql);
    }
    header("location: http://localhost/php/");
?>
