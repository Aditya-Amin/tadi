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
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "select * from administrator where type='admin'";
    $result = $conn->query($sql) or die($conn->error);
    if($result->num_rows > 0) {
       
        while($row=$result->fetch_assoc()) {
            $data[] = $row;
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['adminid'])){
        $id = $_POST['adminid'];
        $delete = $conn->query("delete from administrator where id = $id");
        if($delete){
            header("Location: administrator.php?msg=".urldecode("<p class='alert-success'>User deleted successfully.</p>"));
        }else{
            $_SESSION['msg'] = "<p class='alert-danger'>Something went wrong! ". $conn->error ."</p>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Aministrator</title>

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
                <h3 class="section-heading">Aministrators</h3>
                <?php
                if(isset($_SESSION['success'])){
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                }
                ?>

                <?php
                if(isset($_GET['msg'])){
                    echo $_GET['msg'];
                }
                ?>
                <!-- wrapper -->
                <div class="wrapper">
                    <div class="add-admin" style="margin-bottom: 20px;">
                        <a href="add-admin.php" class="btn btn-blue">Add New User</a>
                    </div>
                    <div class="topics-table">
                    <!-- /* Displaying all admin of type admin, not superadmin. superadmin is hidden and only one account */ -->
                        <div class="tbl-head">
                            <strong>SL.</strong>
                            <strong>Username</strong>
                            <strong>Type</strong>
                            <strong style="text-align: center;">Actions</strong>
                        </div>

                        <div class="tbl-body">
                            <?php foreach($data as $item) : ?>
                            <div class="tbl-row">
                                <p>
                                    <?php echo $item['id']; ?>
                                </p>
                                <p>
                                <?php echo $item['email']?>
                                </p>
                                <p>
                                    <?php echo $item['type']; ?>
                                </p>

                                <div class="actions">
                                    <div class="actions-btn">
                                        <p><a href="edit-admin.php?id=<?php echo $item['id']; ?>" class="btn btn-green"><i class="far fa-edit"></i></a></p>
                                        <form action="administrator.php" method="post" style="margin-bottom: 15px;">
                                            <input type="hidden" name="adminid" value="<?php echo $item['id']; ?>">
                                            <button class="btn btn-red" type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
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