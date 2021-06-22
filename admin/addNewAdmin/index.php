<?php include_once '../../common/header.php'; ?>

<?php include_once '../../common/right-sidebar.php'; ?>

<?php include_once '../admin-left-sidebar.php'; ?>
<?php


if (!isset($_SESSION["admin_email"]) || !isset($_SESSION["admin_id"])) {
    $path = BASE_URL . "admin/ADLogin/";
    header("Location: $path");
}
$err = "";
$success = "";

if(isset($_REQUEST["addAdmin"])){
    /*if(empty($_REQUEST["name"]) || empty($_REQUEST["mobile"]) || empty($_REQUEST["address"]) || empty($_REQUEST["city"]) || empty($_REQUEST["date_of_birth"])  || $_REQUEST["email"] || empty($_REQUEST["password"]))
    {
        $err = "all fields are required";
    }else{*/
        include_once "../../common/Operations.php";
        $conn = new Operations();
        $res = $conn->insertAdminDetails($_REQUEST["name"],$_REQUEST["mobile"],$_REQUEST["address"],$_REQUEST["city"],$_REQUEST["date_of_birth"],$_REQUEST["image_path"],$_REQUEST["email"],$_REQUEST["password"]);
        $res = json_decode($res);
        if($res->status == "success"){
            $success = $res->message;
            $path = BASE_URL . "admin/viewAdminList/";
            // header("Location: $path");
        }else if($res->status == "error"){
            $err = $res->message;
        }
    //}
}
?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Add New Admin</h4>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 col-sm-12 p-2">
                        <div class="form-group row">
                            <label class="form-control-label col-sm-12 col-md-3 col-form-label">Name</label>
                            <div class="col-sm-12 col-md-9">
                                <input type="text" name="name" class="form-control" placeholder="John Doe">
                                <div class="form-control-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-control-label col-sm-12 col-md-3 col-form-label">Mobile</label>
                            <div class="col-sm-12 col-md-9">
                                <input type="number" name="mobile" class="form-control" placeholder="785412369">
                                <div class="form-control-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-control-label col-sm-12 col-md-3 col-form-label">Address</label>
                            <div class="col-sm-12 col-md-9">
                                <input type="text" name="address" class="form-control" placeholder="Swastik compex">
                                <div class="form-control-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-control-label col-sm-12 col-md-3 col-form-label">City</label>
                            <div class="col-sm-12 col-md-9">
                                <input type="text" name="city" class="form-control" placeholder="Mumbai">
                                <div class="form-control-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-control-label col-sm-12 col-md-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-12 col-md-9">
                                <input type="date" name="date_of_birth" class="form-control">
                                <div class="form-control-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-control-label col-sm-12 col-md-3 col-form-label">Image</label>
                            <div class="col-sm-12 col-md-9">
                                <input type="file" accept=".jpeg,.jpg" name="image_path" id="image_path" class="form-control">
                                <div class="form-control-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-control-label col-sm-12 col-md-3 col-form-label">email</label>
                            <div class="col-sm-12 col-md-9">
                                <input type="text" name="email" class="form-control" placeholder="email@email.com">
                                <div class="form-control-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-control-label col-sm-12 col-md-3 col-form-label">Password</label>
                            <div class="col-sm-12 col-md-9">
                                <input type="password" name="password" class="form-control" placeholder="abc@123">
                                <div class="form-control-feedback"></div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="addAdmin" value="Add Admin">
                        <?php if($err !== ""){ ?>
                            <div class="alert alert-danger "><?php echo $err; ?></div>
                        <?php }else if($success !== ""){ ?>
                            <div class="alert alert-success "><?php echo $success; ?></div>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once '../../common/footer.php'; ?>
