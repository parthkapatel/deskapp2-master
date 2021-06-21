<?php include_once '../../common/header.php'; ?>

<?php
session_start();

if (isset($_SESSION["admin_email"]) || isset($_SESSION["admin_id"])) {
    $path = BASE_URL . "admin/";
    header("Location: $path");
}

$err = "";
$success = "";
if(isset($_REQUEST["adminLogin"])){
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    include_once "../../common/Operations.php";
    $conn = new Operations();
    $res = $conn->checkEmailAndPassword($email,$password,"admin_details");
    $res = json_decode($res);
    if($res->status == "success"){
        $success = $res->message;
        $_SESSION["admin_email"] = $res->data->email;
        $_SESSION["admin_id"] = $res->data->id;
        $_SESSION["admin_name"] = $res->data->name;
        $path = BASE_URL . "admin/";
        header("Location: $path");
    }else if($res->status == "error"){
        $err = $res->message;
    }
}

?>
    <div class="container my-5">
        <div class="pd-20 card-box w-auto">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Admin Login</h4>
                </div>
            </div>
            <form action="" method="POST" autocomplete="off">
                <div class="form-group row">
                    <label class="form-control-label col-sm-12 col-md-3 col-form-label">email</label>
                    <div class="col-sm-12 col-md-9 ">
                        <input type="text" name="email" autocomplete="false" class="form-control" placeholder="email@email.com">
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
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="adminLogin" value="Login">
                    <?php if($err !== ""){ ?>
                    <div class="alert alert-danger "><?php echo $err; ?></div>
                    <?php }else if($success !== ""){ ?>
                    <div class="alert alert-success "><?php echo $success; ?></div>
                    <?php } ?>
                </div>


            </form>
        </div>
    </div>
<?php include_once '../../common/footer.php'; ?>