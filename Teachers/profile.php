<?php include_once '../common/header.php';?>

<?php include_once '../common/right-sidebar.php';?>

<?php include_once 'teachers-left-sidebar.php';?>

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
                            <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
                            <img src="../vendors/images/photo1.jpg" alt="" class="avatar-photo">
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body pd-5">
                                            <div class="img-container">
                                                <img id="image" src="../vendors/images/photo2.jpg" alt="Picture">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="text-center h5 mb-0">Ross C. Lopez</h5>
                        <p class="text-center text-muted font-14">Lorem ipsum dolor sit amet</p>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                            <div class="row">
                                        <div class="col-sm-5">
                                            <ul>
                                                <li>
                                                    <span>Email Address:</span>
                                                    FerdinandMChilds@test.com
                                                </li>
                                                <li>
                                                    <span>Phone Number:</span>
                                                    619-229-0054
                                                </li>
                                                <li>
                                                    <span>City</span>
                                                    America
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="col-sm-5">
                                            <ul>
                                                <li>
                                                    <span>Address:</span>
                                                    1807 Holden Street<br>
                                                    San Diego, CA 92115
                                                </li>
                                                <li>
                                                    <span>Date of Birth</span>
                                                    619-229-0054
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

<?php include_once '../common/footer.php';?>