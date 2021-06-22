<?php include_once '../common/header.php'; ?>

<?php

if (!isset($_SESSION["parent_email"]) || !isset($_SESSION["parent_id"])) {
    header("Location:".PARENT_BASE_URL);
}else{
    include_once "../common/Operations.php";
    $conn = new Operations();
    $teacherCount = 0;
    $adminCount = 0;
    $res = $conn->getLessonsDetails();
    $lessonCount = count($res);
    $res = $conn->getChildDetailsByParentId($_SESSION["parent_id"]);
    $kidCount = count($res);
}



?>

<?php include_once '../common/right-sidebar.php'; ?>

<?php include_once 'parents-left-sidebar.php'; ?>


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
                            <div class="h4 mb-0" id="chartNumber"><?php echo $lessonCount; ?></div>
                            <div class="weight-600 font-14">Total Lessons</div>
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
                            <div class="h4 mb-0" id="chartNumber2"><?php echo $kidCount; ?></div>
                            <div class="weight-600 font-14">Total Kids</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once '../common/footer.php'; ?>
