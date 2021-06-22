<?php
session_start();
include_once "common/config.php";
if (isset($_SESSION["parent_email"]) || isset($_SESSION["parent_id"])) {
    header("Location:".PARENT_BASE_URL);
}
error_reporting(E_ALL);
ini_set('display_errors', '1');
$err = "";
$success = "";

if (isset($_REQUEST["register"])) {
    if(empty($_REQUEST["name"]) || empty($_REQUEST["mobile"]) || empty($_REQUEST["address"]) || empty($_REQUEST["city"]) || empty($_REQUEST["date_of_birth"])  || empty($_REQUEST["email"]) || empty($_REQUEST["password"]))
    {
        $err = "all fields are required";
    }else{
        include_once "common/Operations.php";
        $conn = new Operations();
        $res = $conn->insertParentDetails($_REQUEST["name"], $_REQUEST["mobile"], $_REQUEST["address"], $_REQUEST["city"], $_REQUEST["date_of_birth"], $_REQUEST["email"], $_REQUEST["password"]);
        $res = json_decode($res);
        if ($res->status == "success") {
            $success = $res->message;
            header("Location: index.php");
        } else if ($res->status == "error") {
            $err = $res->message;
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="index.php">
					<img src="vendors/images/deskapp-logo.svg" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="index.php">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="vendors/images/register-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="register-box bg-white box-shadow border-radius-10">
						<div class="container">
							<form class="p-2" action="" method="post" enctype="multipart/form-data">
								<h4>Basic Information</h4>
								<section>
									<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Name</label>
											<div class="col-sm-8">
												<input type="text" name="name" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Mobile</label>
											<div class="col-sm-8">
												<input type="number" name="mobile" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Address</label>
											<div class="col-sm-8">
												<input type="text" name="address" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">City</label>
											<div class="col-sm-8">
												<input type="text" name="city" class="form-control">
											</div>
										</div>
									</div>
								</section>
								<!-- Step 2 -->
								<h5>Personal Information</h5>
								<section>
									<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Date of Birth</label>
											<div class="col-sm-8">
												<input type="date" name="date_of_birth" class="form-control">

											</div>
										</div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Profile</label>
                                            <div class="col-sm-8">
                                                <input type="file" name="image_path" id="image_path" class="form-control">
                                            </div>
                                        </div>
									</div>
								</section>
								<!-- Step 3 -->
								<h5>Account Credentials</h5>
								<section>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
								</section>
                                <input type="submit" class="btn btn-primary" name="register" value="Register">
                                <?php if ($err !== "") { ?>
                                    <div class="alert alert-danger "><?php echo $err; ?></div>
                                <?php } else if ($success !== "") { ?>
                                    <div class="alert alert-success "><?php echo $success; ?></div>
                                <?php } ?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- success Popup html Start -->
	<button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal" data-backdrop="static">Launch modal</button>
	<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered max-width-400" role="document">
			<div class="modal-content">
				<div class="modal-body text-center font-18">
					<h3 class="mb-20">Form Submitted!</h3>
					<div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				</div>
				<div class="modal-footer justify-content-center">
					<a href="index.php" class="btn btn-primary">Done</a>
				</div>
			</div>
		</div>
	</div>
	<!-- success Popup html End -->
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="vendors/scripts/steps-setting.js"></script>
</body>

</html>