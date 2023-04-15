<?php
session_start();
if (isset($_GET["state"])) {
    switch ($_GET["state"]) {
        case 1:
            echo "<script>alert('You are not authorized yet');</script>";
            break;
        case 2:
            echo "<script>alert('You are not authorized yet');</script>";
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="homePage.css">
    <title>Home Page</title>
</head>

<body>
    <div class="body">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Home Page</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                    aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home
                                <span class="visually-hidden">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <?php
                        if (isset($_SESSION["login"]) && ($_SESSION["function"] < 3)) {
                            echo '<li class="buttons2"><a href="Redirection.php"><img class="account-icon" src="user-icon.png"></a><a href="logout.php"><img class="logout-icon" src="logout.png"></a></li>';
                        } else {
                            echo '<li class="buttons"><a href="PgLogin.php"><button type="button" class="btn btn-outline-light">Login</button></a><a href="PgRegister.php"><button type="button" class="btn btn-outline-light">Sign-in</button></a></li>';
                            session_destroy();
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <br>
        <br>
        <div class="banner">
            <h1>My Pet's Hair Salon</h1>
            <h3>The best place to cut & wash your pets.</h3>
            <a href="PgReservation.php"><button type="button" class="btn btn-outline-primary">Schedule An Appointment!</button></a>
        </div>
    </div>
    <div class="about-us">
        <h2>About us</h2>
        <div class="main-section">
            <p class="mb-0">
                We provide top-quality grooming services for your furry friends in a comfortable and calming
                environment.
                Our experienced groomers offer personalized attention and a range of services, from bathing and brushing
                to haircuts and nail trims, all aimed at making your pet look and feel their best. Come visit us and
                experience the difference our expert grooming can make for your beloved pet.
            </p>
            <img src="cats-and-dogs.jpg" class="abtUsImg">
        </div>
    </div>
    <div class="services">
        <h2>Our services</h2>
        <div class="service-section">
            <div class="service-box toast-body">
                <img src="diy-tips-to-bathe-your-cat.jpg" class="cat-wash">
                <button type="button" class="btn btn-primary">Wash</button>
            </div>
            <div class="service-box toast-body">
                <img src="dog-cut.png" class="dog-cut">
                <button type="button" class="btn btn-primary">Cut</button>
            </div>
        </div>
    </div>
</body>

</html>