<?php
session_start();
$username = $_SESSION['username'];
$conn = new mysqli("localhost", "root", "", "fasten");
$sql = "select * from posts where username = '$username' limit 8";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <script src="https://kit.fontawesome.com/4e76d3d314.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link href="../css/profile.css" rel="stylesheet">
        <title>profile</title>
    </head>

    <body>
        <?php include 'navbar.php' ?>
        <div class="rightclr">
            <div id="circleright" class="col-lg-8 col-xs-12">
                <img src="../assets/images/dog1.jpg" class="image img-circle">
            </div>
        </div>
        <div class="content ">
            <h1 class="hello">Hello welcome to my profile</h1>
            <p>Let me tell you about my self</p>
            <p>Lets Go</p>
        </div>
        <div id="circleleft">
            <h1 class="bio">About My Self</h1>
        </div>
        <div class="info shadow-lg p-3 mb-5 bg-white rounded">
            <h1>INTRO</h1>
            <h2>Bio</h2>
            <button type="button" class="btn btn-responsive btn-secondary  btn-xl">ADD YOUR BIO</button><br>
            <button type="button" class="btn btn-responsive btn-secondary  btn-xl">ADD PERSONAL DETAILS</button><br>
            <button type="button" class="btn btn-responsive btn-secondary  btn-xl">ADD YOUR Intrests</button><br>
        </div>
        <br><br>
        <div class="rightclr">
            <div id="circleright">
                <h1 class="post">MY POSTS</h1>
            </div>
        </div>
        <div class="posts shadow-lg p-3 mb-5 bg-white rounded">
            <a href="http://localhost/php/home.php" class="alert alert-link">View all posts</a><br>
            <?php
            while ($row = $result->fetch_assoc()) {
                if ($row['media_type'] == 'mp4') {
                    echo "
                <video width='100%' >
                    <source src='../assets/$username/videos/{$row['media']}'>
                </video>
                ";
                } else {
                    echo "<img src='../assets/$username/images/{$row['media']}' class='img-thumbnail'>";
                }
            }
            ?>
            <img src='../assets/images/plus.jpg' class='img-thumbnail'>
        </div>
    </body>

    </html>