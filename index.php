<?php
ob_start();
session_start();
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Login </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <?php include './database/conn.php'; ?>
        <section class="ftco-section">
            <div class="container">
                <?php
                if (isset($_POST['login'])) {

                    if (!empty(trim($_POST['Username'])) && !empty(trim($_POST['password']))) {

                        $username = mysqli_real_escape_string($conn, $_POST['Username']);
                        $password = mysqli_real_escape_string($conn, $_POST['password']);


                        $sqlLogin = "SELECT * FROM  user WHERE username = '$username'  AND password = '$password'";

                        $result = mysqli_query($conn, $sqlLogin);


                        if (mysqli_num_rows($result) > 0) {

                            $_SESSION['username'] = $username;


                            header('Location: includes/sistemi.php');
                        } else {
                            echo mysqli_error($conn);
                        }
                    } else {
//                echo "<script>alert('Should complete all fields')</script>";
                    }
                }
                ?>
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Login </h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap py-5">
                            <div class="img d-flex align-items-center justify-content-center" ></div>
                            <h3 class="text-center mb-0">Welcome</h3>

                            <form method="post" >
                                <div class="form-group">
                                    <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
                                    <input type="text" class="form-control" name="Username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
                                    <input type="password" class="form-control"  name="password"  placeholder="Password" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="login" class="btn form-control btn-primary rounded submit px-3">Get Started</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>




        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>

