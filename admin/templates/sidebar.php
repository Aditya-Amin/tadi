<!-- sidebar -->
<div id="sidebar">
    <ul id="main-menu">
        <li style="margin-bottom: 80px; margin-top:20px">
            <a href="dashboard.php" class="dropdown menu-active">
            <i class="fas fa-home"></i>
                Dashboard
            </a>
           
        </li>
        <?php if($_SESSION['user_type'] == 'superadmin'): ?>
        <li>
            <a href="administrator.php" class="dropdown">
            <i class="far fa-user"></i>
                Custom User
            </a>
        </li>
        <?php endif; ?>
        <li>
            <a href="#" class="dropdown">
            <i class="far fa-folder"></i>
                Report Generate
            </a>
        </li>

        <li>
            <a href="#" class="dropdown">
                <i class="fas fa-cogs"></i>
                Settings
            </a>
           
        </li>
    </ul>
</div>
<!-- sidebar end -->