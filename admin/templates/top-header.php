<?php require_once(dirname(__DIR__) . '/app/base_url.php'); ?>

<!-- top header start -->
<div id="top-header">
    <div class="container">
        <div class="header-wrapper">
            <div id="logo">
                <a href="dashboard.php"><i class="fas fa-home"></i></a>
            </div>
            <div></div>
            <div class="user-avatar">
                <div class="user">
                    <div class="avatar">
                        <img src="img/icons/user.svg" alt="admin">
                    </div>
                    <span><?php echo $_SESSION['user_type']; ?></span>
                    <span><i class="fas fa-angle-down"></i></span>
                </div>
                <div class="user-dropdown">
                    <ul>
                        <li>
                            <a href="<?php echo SITE_URL ?>admin/change-password.php">Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo SITE_URL ?>admin/logout.php"><i class="fas fa-power-off"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- top header end -->