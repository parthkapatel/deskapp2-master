<?php include_once '../../common/header.php'; ?>

<?php include_once '../../common/right-sidebar.php'; ?>

<?php include_once '../teachers-left-sidebar.php'; ?>
<?php
require_once "../../common/Operations.php";
$conn = new Operations();
$res = $conn->getDataBySessionId($_SESSION["teacher_id"], "teacher_details");
$name = $res["name"];
$src = $res["image_path"];
$email = $res["email"];
$mobile = $res["mobile"];
$address = $res["address"];
$city = $res["city"];
$dob = $res["date_of_birth"];

?>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Your Profile</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="pd-20 card-box height-100-p">
                            <div class="profile-photo">
                                <img src="<?php echo BASE_URL . $src ?>" alt="No Profile" class="avatar-photo">
                            </div>
                            <h5 class="text-center h5 mb-0"><?php echo $name; ?></h5>
                            <div class="profile-info">
                                <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <ul>
                                            <li>
                                                <span>Email Address:</span>
                                                <?php echo $email; ?>
                                            </li>
                                            <li>
                                                <span>Phone Number:</span>
                                                <?php echo $mobile; ?>
                                            </li>
                                            <li>
                                                <span>City</span>
                                                <?php echo $city; ?>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col-sm-5">
                                        <ul>
                                            <li>
                                                <span>Address:</span>
                                                <?php echo $address; ?>
                                            </li>
                                            <li>
                                                <span>Date of Birth</span>
                                                <?php echo $dob; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once '../../common/footer.php'; ?>