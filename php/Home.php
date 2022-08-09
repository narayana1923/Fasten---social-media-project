<?php
    session_start();
    if(!isset($_SESSION['logged_in'])){
        header("location: http://localhost/php/authentication.php");
    }
    $username = $_SESSION['username'];
    $conn = new mysqli("localhost", "root", "", "fasten");
    $sql = "SELECT * from posts where username in (
            select friendname from friends where username = '$username'
            ) order by posted_on desc";
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
    <link href="../css/Home.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Home</title>
</head>
<body>
    <?php include 'navbar.php'?>
    <div class="main">
        <div class="container">
            <div class="col-sm-8">
                <div class="thumbnail shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="create">
                        <div class="col-sm-1">
                            <i class="fas fa-user-alt fa-lg"></i>
                        </div>
                        <input type="text" placeholder="What's on your mind user ?" id="whats" class="">
                        <hr>
                        <div>
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item col-sm-4 text-center"><a href="#"><i class="fas fa-video"></i> live video</a></li>
                                <li class="list-group-item col-sm-4 text-center"><a href="post.php"><i class="fas fa-photo-video"></i> photo/vidios</a></li>
                                <li class="list-group-item col-sm-4 text-center"><a href="#"><i class="fas fa-smile-beam"></i> feeling/activity</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <div class="col-sm-8">
                    <div class="thumbnail shadow-lg p-3 mb-5 bg-white rounded">
                        <div class="post1">
                            <i class="fas fa-user-alt fa-lg"><b> <?php echo $row['username']?></b></i>
                            <p><?php echo $row['post_desc'] ?></p>
                            <?php if ($row['media_type'] != 'mp4') { ?>
                                <img src="<?php echo "../assets/{$row['username']}/images/{$row['media']}" ?>" class="img-responsive">
                            <?php } else {
                            ?>
                                <video width="100%" controls>
                                    <source src="<?php echo "../assets/$username/videos/{$row['media']}" ?>">
                                </video>
                            <?php } ?>
                            <div class="imgthumb">
                                <p>BRIGHTSIDE.ME</p>
                                <b>Test:See How Attentive You ny Solving These 15 Puzzles</b>
                            </div>
                            <p class="text-left">118
                                <span class="text-right">206 Comments 9 shares
                            </p></span>
                            <hr>
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item col-sm-4 text-center"><button class="btn btn-responsive btn-default btn-lg"><i class="far fa-thumbs-up"></i>Like</button></li>
                                <li class="list-group-item col-sm-4 text-center"><button class="btn btn-responsive btn-default btn-lg"><i class="far fa-comment">Comments</i></button></li>
                                <li class="list-group-item col-sm-4 text-center"><button class="btn btn-responsive btn-default btn-lg"><i class="far fa-share ">Share</i></button></li>
                        </div>
                        </UL>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="col-sm-8">
                <div class="thumbnail shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="post1">
                        <i class="fas fa-user-alt fa-lg"><b> 5-minuts crafts play</b></i>
                        <p>Test:see how attentive you are by solving these 15 puzzles:</p>
                        <img src="../assets/images/dog.jpg" class="img-responsive">
                        <div class="imgthumb">
                            <p>BRIGHTSIDE.ME</p>
                            <b>Test:See How Attentive You ny Solving These 15 Puzzles</b>
                        </div>
                        <p class="text-left">118
                            <span class="text-right">206 Comments 9 shares
                        </p></span>
                        <hr>
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item col-sm-4 text-center"><button class="btn btn-responsive btn-default btn-lg"><i class="far fa-thumbs-up"></i>Like</button></li>
                            <li class="list-group-item col-sm-4 text-center"><button class="btn btn-responsive btn-default btn-lg"><i class="far fa-comment">Comments</i></button></li>
                            <li class="list-group-item col-sm-4 text-center"><button class="btn btn-responsive btn-default btn-lg"><i class="far fa-share ">Share</i></button></li>
                    </div>
                    </UL>
                </div>
            </div>          
        </div>
    </div>
</body>

</html>