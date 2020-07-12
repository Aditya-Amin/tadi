<?php

/* Admin seassion check */
session_start();
if(!isset($_SESSION['examinee_id'])) {
    header('Location: login.php');
}

require_once('crud/middleware/database.php');
$conn = database();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $conn->query("select * from examinee where id = '$id'") or die($conn->error);
    $student = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Exam System</title>

    <!-- owl css -->
    <link rel="stylesheet" href="assets/css/owl.min.css">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <!-- core styles -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- banner start -->
    <div class="banner-area">
        <div class="container">
            <div class="banner-wrapper">
                <h1 class="section-title">
                    Congratulations!
                </h1>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <div class="container">
        <div class="marks-sheet" style="margin: 30px 0!important; padding-bottom:30px!important;">
            <h4 class="section-heading"><?php echo $student['first_name'] . " " . $student['last_name'];  ?></h4>
            <div class="wrapper">
                <table>
                    <tr>
                        <th>Name: </th>
                        <td><?php echo $student['first_name'] . " " . $student['last_name'];  ?></td>
                    </tr>

                    <tr>
                        <th>Email: </th>
                        <td><?php echo $student['email']; ?></td>
                    </tr>

                    <tr>
                        <th>Institution: </th>
                        <td><?php echo $student['institution']; ?></td>
                    </tr>
                    <tr>
                        <th>Institution Address: </th>
                        <td><?php echo $student['inst_addr']; ?></td>
                    </tr>
                    <tr>
                        <th>Initial Training Date: </th>
                        <td><?php echo $student['initial_training_date']; ?></td>
                    </tr>

                    <tr>
                        <th>Refesher Training Date: </th>
                        <td><?php echo $student['refresher_training_date']; ?></td>
                    </tr>

                    <tr>
                        <th>Approx scan done in last 6 months: </th>
                        <td><?php echo $student['scan_done']; ?></td>
                    </tr>


                    <tr>
                        <th>Fibroscan Device Serial No: </th>
                        <td><?php echo $student['fibroscan_device_serial_no']; ?></td>
                    </tr>


                    <tr>
                        <th>Is Verified: </th>
                        <td>
                            <?php if($student['is_verified'] == 1) : ?>
                            <?php echo "<i class='fas fa-user-check text-green'></i>"; ?>
                            <?php else : ?>
                            <?php echo "<i class='fas fa-exclamation-circle text-red'></i>"; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- wrapper end -->
    </div>

    <script src="assets/js/jquery.min.js"></script>

</body>

</html>