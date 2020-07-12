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
$data = [];
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from administrator where type='admin' and id = $id";
    $result = $conn->query($sql) or die($conn->error);
    if($result->num_rows > 0) {
       
        while($row=$result->fetch_assoc()) {
            $data[] = $row;
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = sanitize($_POST['email']);
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if(!empty($email) && !empty($password1) && !empty($password2)) {
        if($password1 == $password2) {
            $sql = "update administrator set username = '$username', email = '$email', password = '$password2' where id = $id";
            $result = $conn->query($sql) or die($conn->error);
            $_SESSION['success'] = "<p class='alert-success'>User successfully updated.</p>";
            header("Location: administrator.php");
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
                           <?php if($data): ?>
                           <?php foreach($data as $item): ?>
                            <form action="#" method="post">
                                <div class="input-items">
                                    <label for="username">Username: </label>
                                    <input type="text" id="username" name="username" placeholder="Username" required value="<?php if(isset($_POST['username'])){ echo $_POST['username'];}else{ echo $item['username']; } ?>">
                                </div>

                                <div class="input-items">
                                    <label for="username">Email: </label>
                                    <input type="email" id="username" name="email" placeholder="Email" required value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}else{ echo $item['email']; } ?>">
                                </div>
                                <div class="input-items">
                                    <label for="password">Password: </label>
                                    <input type="password" id="password1" name="password1" placeholder="Password"
                                        required value="<?php if(isset($_POST['password'])){ echo $_POST['password'];}else{ echo $item['password']; } ?>">
                                </div>

                                <div class="input-items">
                                    <label for="password">Confirm Password: </label>
                                    <input type="password" id="password2" name="password2" placeholder="Confirm Password"
                                        required value="<?php if(isset($_POST['password'])){ echo $_POST['password'];}else{ echo $item['password']; } ?>">
                                </div>
                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                <div class="submits">
                                    <button class="btn btn-green">Update</button>
                                    <!-- <a href="password-recovery.html">Forgot password?</a> -->
                                </div>
                           <?php endforeach; ?>
                           <?php endif; ?>
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