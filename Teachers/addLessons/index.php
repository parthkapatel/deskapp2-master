<?php
session_start();
?>
<?php include_once '../../common/header.php'; ?>

<?php include_once '../../common/right-sidebar.php'; ?>

<?php include_once '../teachers-left-sidebar.php'; ?>
<?php
require_once "../../common/Operations.php";
$conn = new Operations();
if (!isset($_SESSION["teacher_email"])) {
    $path = Teacher_BASE_URL . "TLogin/";
    header("Location: $path");
}
$err = "";
$success = "";

if (isset($_REQUEST["btnAddLesson"])) {
    $res = $conn->insertLessons($_REQUEST["lessons"]);
    $res = json_decode($res);
    if($res->status == "success"){
        $success = $res->message;
        $path = BASE_URL . "admin/viewAdminList/";
        // header("Location: $path");
    }else if($res->status == "error"){
        $err = $res->message;
    }
}

?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Add Lessons</h4>
                    </div>
                    <br><br>
                    <input type="file" name="lessons" id="lessons" value="">
                    <input type="submit" name="btnAddLesson" value="Add Lessons" class="btn btn-primary">
                    <?php if($err !== ""){ ?>
                        <div class="alert alert-danger "><?php echo $err; ?></div>
                    <?php }else if($success !== ""){ ?>
                        <div class="alert alert-success "><?php echo $success; ?></div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once '../../common/footer.php'; ?>
