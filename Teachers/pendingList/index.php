
<?php include_once '../../common/header.php'; ?>
<?php
require_once "../../common/Operations.php";
$conn = new Operations();
if (!isset($_SESSION["teacher_email"])) {
    $path = Teacher_BASE_URL . "TLogin/";
    header("Location: $path");
}
if (isset($_REQUEST["approve"])) {
    $res = $conn->updateParentStatus($_REQUEST["approve"],"approve");
}

if (isset($_REQUEST["reject"])) {
    $res = $conn->updateParentStatus($_REQUEST["reject"],"reject");
}
?>

<?php include_once '../../common/right-sidebar.php'; ?>

<?php include_once '../teachers-left-sidebar.php'; ?>

    <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Parents Request</h4>
                </div>
            </div>
            <table class="data-table table stripe hover nowrap">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Profile</th>
                    <th class="table-plus">Name</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>DOB</th>
                    <th>Syndrome Details</th>
                    <th>Email</th>
                    <th>status</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $res = $conn->getParentsDetails();
                $no = 1;
                foreach ($res as $val) {
                    ?>
                    <tr>
                        <td class="table-plus"><?php echo $no++; ?></td>
                        <td><img src="<?php echo $val["image_path"]; ?>" width="70" height="70" alt="No Profile"></td>
                        <td><?php echo $val["name"]; ?></td>
                        <td><?php echo $val["mobile"]; ?></td>
                        <td><?php echo $val["address"]; ?></td>
                        <td><?php echo $val["city"]; ?></td>
                        <td><?php echo $val["date_of_birth"]; ?></td>
                        <td><?php echo $val["syndrome_details"]; ?></td>
                        <td><?php echo $val["email"]; ?></td>
                        <td><?php echo $val["status"]; ?></td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                   role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <form method="post" action="">
                                        <button type="submit" class="dropdown-item" name="approve"
                                                value="<?php echo $val["id"]; ?>"><i class="dw dw-edit2"></i>Approve
                                        </button>
                                        <button type="submit" class="dropdown-item" name="reject"
                                                value="<?php echo $val["id"]; ?>"><i class="dw dw-delete-3"></i>Reject
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include_once '../../common/footer.php'; ?>