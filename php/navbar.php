<link rel="stylesheet" href="../css/navbar.css">
<nav class="navbar navbar shadow-lg p-3 mb-5 bg-white rounded">
    <div class="container-fluid">
        <ul class="list-group list-group-horizontal ">
            <a href="#">
                <li class="list-group-item  borderless">
                    <form action="search.php" method="post">
                        <div style="border: 1px solid #DDD;">
                            <i class="bi bi-search"></i>
                            <input name="user" type="text" style="border: none;"  placeholder="search fasten">
                        </div>
                    </form>
                </li>
            </a>
            <a href="Home.php">
                <li class="list-group-item  borderless"><i class="fas fa-home fa-lg"></i>
            </a></li>
            <a href="friends.php">
                <li class="list-group-item  borderless"><i class="fas fa-user-friends fa-lg"></i>
            </a></li>
            <a href="profile.php">
                <li class="list-group-item  borderless"><i class="fas fa-user-alt fa-lg"></i>
            </a></li>
        </ul>
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item borderless"><a href="#"><i class="fab fa-facebook-messenger fa-lg"></i></a></li>
            <li class="list-group-item borderless"><a href="../php/settings.php"><i class="bi bi-gear"></i></i></a></li>
            <li class="list-group-item borderless"><a href="logout.php"><i class="fas fa-sign-out-alt fa-lg">Log out</i></a></li>
        </ul>
    </div>
</nav>