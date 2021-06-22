<?php
session_start();
?>

<?php include_once '../common/header.php'; ?>
<?php

if (!isset($_SESSION["teacher_email"])) {
    $path = Teacher_BASE_URL . "TLogin/";
    header("Location: $path");
} else {
    include_once "../common/Operations.php";
    $conn = new Operations();
    $parentCount = 0;
    $res = $conn->getParentsDetails();
    $parentCount = count($res);
}

?>

<?php include_once '../common/right-sidebar.php'; ?>

<?php include_once 'teachers-left-sidebar.php'; ?>

<div class="main-container">
    <div class="pd-ltr-20">
        <div class="row">
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div><span><i class="fa fa-user" style="font-size: 36px;"></i> </span></div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0"><?php echo $parentCount; ?></div>
                            <div class="weight-600 font-14">Total Parents</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once '../common/footer.php'; ?>
