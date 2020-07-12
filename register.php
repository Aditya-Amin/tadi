
<?php
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 // Load Composer's autoloader
 require 'vendor/autoload.php';



if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('crud/middleware/checks.php');
    $required = array('first_name', 'email');
    check_required($required, 'register.php'); // possible necessary redirect

    require_once('crud/middleware/database.php');
    $conn = database();

    $first_name = set_check($conn->real_escape_string($_POST['first_name']));
    $last_name = set_check($conn->real_escape_string($_POST['last_name']));
    $email = set_check($conn->real_escape_string($_POST['email']));
    $institution = set_check($conn->real_escape_string($_POST['institution']));
    $initial_training_date = set_check($conn->real_escape_string($_POST['initial_training_date']));
    $refresher_training_date = set_check($conn->real_escape_string($_POST['refresher_training_date']));
    $fibroscan_device_serial_no = set_check($conn->real_escape_string($_POST['fibroscan_device_serial_no']));
    $scan_done = set_check($conn->real_escape_string($_POST['scan_done']));
    $is_verified = 0; // By default unverified
    $inst_addr = set_check($conn->real_escape_string($_POST['inst_addr']));

    $sql = "insert into examinee (first_name, last_name, email, institution, initial_training_date, refresher_training_date, fibroscan_device_serial_no, scan_done, is_verified, inst_addr) values ($first_name, $last_name, $email, $institution, $initial_training_date, $refresher_training_date, $fibroscan_device_serial_no, $scan_done, $is_verified, $inst_addr)";

    $result = $conn->query($sql);
    if($result) {
        $id = $conn->insert_id;
        $_SESSION['examinee_id'] = $id;
        $getadmins = $conn->query("select * from administrator");
        $message = "New Registration From " . $first_name;
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'nilopsora800@gmail.com';                     // SMTP username
            $mail->Password   = '01750Rif..';                               // SMTP password
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('nilopsora800@gmail.com', 'Mailer');
            $mail->addAddress($email, $first_name);     // Add a recipient
            while($row = $getadmins->fetch_assoc()){
                $mail->addAddress($row['email']); 
            }              // Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'New Registration';
            $mail->Body    = $message . '</b>';
            $mail->send();
        } catch (Exception $e) {
            $_SESSION['msg'] = '<p class="alert-danger">Message could not be sent. Mailer Error: {' . $mail->ErrorInfo . '}</p>';
        }
        header('Location: topics.php');
    }else{
        $_SESSION['msg'] = '<p class="alert-danger">Something went wrong!. '. $conn->error.'</p>' ;
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Examinee</title>

    <!-- theme css -->
    <link rel="stylesheet" href="admin/style.css">
</head>
<body class="bg-blue" style="overflow:auto;">

    <div class="login">
        <div class="login-form register-form">
            <div class="form-banner">
                <img src="assets/img/bg/reg.jpeg" alt="">
            </div>
           
            <form action="#" method="post">
                <?php
                   if(isset($_SESSION['msg'])){
                       echo $_SESSION['msg'];
                       unset($_SESSION['msg']);
                   }
                ?>
                <h2 class="form-title" style="text-align: left; margin-top:30px">Examinee Registration</h2>
                <div class="form-row">
                    <div class="input-items">
                        <input type="text" id="username" name="first_name" required placeholder="Firstname" required value="<?php if(isset($_POST['first_name'])){ echo $_POST['first_name'] ;}else{ echo "" ;}?>">
                    </div>
                    <div class="input-items">
                        <input type="text" id="username" name="last_name" placeholder="Lastname" required value="<?php if(isset($_POST['last_name'])){ echo $_POST['last_name'] ;}else{ echo "" ;}?>">
                    </div>
                </div>
                <div class="input-items">
                    <!-- <label for="username">Email: </label> -->
                    <input type="email" id="username" name="email" placeholder="Email" required required value="<?php if(isset($_POST['email'])){ echo $_POST['email'] ;}else{ echo "" ;}?>">
                </div>
                <div class="input-items">
                    <!-- <label for="institution">Institution: </label> -->
                    <input type="text" id="username" name="institution" placeholder="Name of the Hospital/Institution/Clinic" required value="<?php if(isset($_POST['institution'])){ echo $_POST['institution'] ;}else{ echo "" ;}?>">
                </div>
                <div class="input-items">
                    <!-- <label for="institution address">Institution Address: </label> -->
                    <input type="text" id="username" name="inst_addr" placeholder="Address of the Hospital/Institution/Clinic" required value="<?php if(isset($_POST['inst_addr'])){ echo $_POST['inst_addr'] ;}else{ echo "" ;}?>">
                </div>
                <div class="form-row">
                    <div class="input-items">
                        <label for="initial_training_date">Initial Training Date (Mandatory): </label>
                        <input type="date" id="username" name="initial_training_date" placeholder="" required value="<?php if(isset($_POST['initial_training_date'])){ echo $_POST['initial_training_date'] ;}else{ echo "" ;}?>">
                    </div>
                    <div class="input-items">
                        <label for="refresher_training_date">Refresher_Training_Date: </label>
                        <input type="date" id="username" name="refresher_training_date" placeholder="" value="<?php if(isset($_POST['refresher_training_date'])){ echo $_POST['refresher_training_date'] ;}else{ echo "" ;}?>">
                    </div>
                </div>
                <div class="input-items">
                    <!-- <label for="fibroscan_device_serial_no">Fibroscan Device Serial No: </label> -->
                    <input type="text" id="username" name="fibroscan_device_serial_no" placeholder="Fibroscan Device Serial No" value="<?php if(isset($_POST['fibroscan_device_serial_no'])){ echo $_POST['fibroscan_device_serial_no'] ;}else{ echo "" ;}?>">
                </div>
                <div class="input-items">
                    <!-- <label for="scan_done">How Many Scan You Have Done?: </label> -->
                    <input type="text" id="username" name="scan_done" placeholder="The approximate number of scans done in the last 6 months" value="<?php if(isset($_POST['scan_done'])){ echo $_POST['scan_done'] ;}else{ echo "" ;}?>">
                </div>
                <div class="submits">
                    <button class="btn btn-green" style="text-transform: uppercase;">Register</button>
                    <p>Already have an Account? <a href="login.php">Click here to Login</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
</body>
</html>