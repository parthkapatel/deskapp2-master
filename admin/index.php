<?php
session_start();
?>

<?php include_once '../common/header.php'; ?>

<?php

if (!isset($_SESSION["admin_email"]) || !isset($_SESSION["admin_id"])) {
    $path = BASE_URL . "admin/ADLogin/";
    header("Location: $path");
}else{
    include_once "../common/Operations.php";
    $conn = new Operations();
    $teacherCount = 0;
    $adminCount = 0;
    $res = $conn->getTeachersDetails();
    $teacherCount = count($res);
    $res = $conn->getAdminsDetails();
    $adminCount = count($res);
}



?>
<?php include_once '../common/right-sidebar.php'; ?>

<?php include_once 'admin-left-sidebar.php'; ?>


<div class="main-container">
    <div class="pd-ltr-20">
        <div class="row">
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center p-0">
                        <div class="progress-data">
                            <div><span><i class="fa fa-user" style="font-size: 36px;"></i> </span></div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0" id="chartNumber"><?php echo $adminCount; ?></div>
                            <div class="weight-600 font-14">Total Admins</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div><span><i class="fa fa-group" style="font-size: 36px;"></i> </span></div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0" id="chartNumber2"><?php echo $adminCount; ?></div>
                            <div class="weight-600 font-14">Total Teachers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once '../common/footer.php'; ?>
	