<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <style>
        body {
            padding: 30px;
            background-image: url("dog-hairstyles.png");
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .account-icon {
            margin-top: -10px;
            height: 50px;
            width: auto;
            padding-left: 10px;
        }

        .logout-icon {
            margin-top: -10px;
            height: 40px;
            width: auto;
            padding-left: 10px;
        }

        .buttons{
            padding-left: 10px;
            padding-top: 15px;
            margin-left: 750px;
        }

        .buttons2{
            padding-left: 0px;
            padding-top: 15px;
            margin-left: 750px;
        }
    </style>
    <title>Home Page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
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
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <?php
                    session_start();
                    if(isset($_SESSION["login"])){
                        echo '<li class="buttons2"><a href="test.php"><img class="account-icon" src="61205.png"></a><a href="test.php"><img class="logout-icon" src="logout.png"></a></li>';
                    } else {
                        echo '<li class="buttons"><button>Login</button><button>sign-in</button></li>';
                        session_destroy();
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <br>
    <div class="banner">
        <h1>My Pet's Hair Salon</h1>
        <h3>The best place to cut and wash your pets.</h3>
        <button class="contact">Schedule An Appointment!</button>
    </div>
</body>

</html>