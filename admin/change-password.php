<?php

/* Admin seassion check */
session_start();
if(!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
}

include('../crud/middleware/database.php');
require_once('functions.php');
$conn = database();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['new'] && !empty($_POST['confirm']))){
        $new = $_POST['new'];
        $confirm = $_POST['confirm'];
        $id = $_SESSION['admin_id'];
        if($new == $confirm){
            $update = $conn->query("update administrator set password = '$confirm' where id = $id");
            if($update){
                $_SESSION['msg'] = "<p class='alert-success'>Password successfully changed.</p>";
            }else{
                $_SESSION['msg'] = "<p class='alert-danger'>Something went wrong!". $conn->error ."</p>";
            }
        }else{
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
    <title>Admin | Change Password</title>
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
                <h3 class="section-heading">Change Password</h3>
                <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <div class="wrapper">
                    <div class="password-recovery login">
                        <div class="password-recovery-form login-form">
                            <form action="change-password.php" method="post">
                                
                                <div class="input-items">
                                    <label for="new">New Passowrd: </label>
                                    <input type="password" id="new" name="new" placeholder="New Password">
                                </div>
                                <div class="input-items">
                                    <label for="confirm">Confirm Passowrd: </label>
                                    <input type="password" id="confirm" name="confirm" placeholder="Confirm Password">
                                </div>
                                <div class="submits">
                                    <button class="btn btn-blue">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>