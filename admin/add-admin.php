<?php

/* Admin seassion check */
session_start();
if(!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
}

require_once('../crud/middleware/database.php');
require_once('../crud/middleware/sanitize.php');
require_once('functions.php');
$conn = database();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = sanitize($_POST['username']);
    $email = sanitize($_POST['email']);
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if(!empty($email) && !empty($password1) && !empty($password2)) {
        if($password1 == $password2) {
            $sql = "select id from administrator where email = '$email'";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $_SESSION['msg'] = "<p class='alert-danger'>User already registered with this email!</p>";
            } else {
                $sql = "insert into administrator (username, email, password, type) values('$username', '$email', '$password1', 'admin')";
                $result = $conn->query($sql) or die($conn->error);
                $_SESSION['success'] = "<p class='alert-success'>Admin successfully registered.</p>";
                header("Location: administrator.php");
            }
        } else {
            $_SESSION['msg'] = "<p class='alert-danger'>Two password does not matched!</p>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Manage User</title>

    <!-- fontawesome css -->
    <link rel="stylesheet" href="css/fontawesome.css">

    <!-- theme css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- main start -->
    <div id="main">

        <?php get_template_part('templates/top-header'); ?>



        <!-- page wrapper start -->
        <div id="page-wrapper">
            <?php get_template_part('templates/sidebar'); ?>


            <!-- dashboard area -->
            <div class="dashboard-area">
                <h3 class="section-heading">Manage User</h3>
                <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <!-- wrapper -->
                <div class="wrapper">
                    <div class="login">
                        <div class="login-form">
                          
                            <form action="#" method="post">
                                <div class="input-items">
                                    <label for="username">Username: </label>
                                    <input type="text" id="username" name="username" placeholder="Username" required value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
                                </div>

                                <div class="input-items">
                                    <label for="username">Email: </label>
                                    <input type="email" id="username" name="email" placeholder="Email" required value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                                </div>
                                <div class="input-items">
                                    <label for="password">Password: </label>
                                    <input type="password" id="password1" name="password1" placeholder="Password"
                                        required>
                                </div>

                                <div class="input-items">
                                    <label for="password">Confirm Password: </label>
                                    <input type="password" id="password2" name="password2" placeholder="Confirm Password"
                                        required>
                                </div>

                                <div class="submits">
                                    <button class="btn btn-blue">Add This User</button>
                                    <!-- <a href="password-recovery.html">Forgot password?</a> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- wrapper end -->
            </div>
            <!-- dashboard area end -->
        </div>
        <!-- page wrapper end -->
    </div>

    <!-- main end -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>