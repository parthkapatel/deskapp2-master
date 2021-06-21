<?php session_start(); ?>
<?php include_once 'config.php'; ?>
<?php include_once 'dbconfig.php'; ?>


<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Online Down Syndrome Student Application</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo BASE_URL; ?>vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_URL; ?>vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo BASE_URL; ?>vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo BASE_URL; ?>src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo BASE_URL; ?>src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>vendors/styles/style.css">
</head>
<body>
<!--<div class="pre-loader">
    <div class="pre-loader-box">
        <div class="loader-logo"><img src="<?php /*echo BASE_URL; */?>vendors/images/deskapp-logo.svg" alt=""></div>
        <div class='loader-progress' id="progress_div">
            <div class='bar' id='bar1'></div>
        </div>
        <div class='percent' id='percent1'>0%</div>
        <div class="loading-text">
            Loading...
        </div>
    </div>
</div>-->

<?php if(isset($_SESSION["admin_email"])){ ?>
<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="<?php echo BASE_URL; ?>vendors/images/photo1.jpg" alt="">
						</span>
                    <span class="user-name">Ross C. Lopez</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>admin/profile/"><i class="dw dw-user1"></i>
                        Profile</a>
                    <a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>