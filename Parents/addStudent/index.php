<?php include_once '../../common/header.php'; ?>

<?php include_once '../../common/right-sidebar.php'; ?>

<?php include_once '../parents-left-sidebar.php'; ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Add You Kids</h4>
                </div>
            </div>
            <form action="" enctype="multipart/form-data" method="POST">
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
                            <label class="form-control-label col-sm-12 col-md-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-12 col-md-9">
                                <input type="date" name="date_of_birth" class="form-control">
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
                        <input type="submit" class="btn btn-primary" name="addkid" value="Add kid">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once '../../common/footer.php'; ?>
