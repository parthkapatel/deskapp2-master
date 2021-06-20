<?php include_once '../../common/header.php'; ?>

<?php include_once '../../common/right-sidebar.php'; ?>

<?php include_once '../admin-left-sidebar.php'; ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Add New Admin</h4>
                </div>
            </div>
            <form>
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
                                <input type="file" accept=".jpeg,.jpg" name="image_path" class="form-control">
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
                        <input type="submit" class="btn btn-primary" name="addadmin">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once '../../common/footer.php'; ?>
