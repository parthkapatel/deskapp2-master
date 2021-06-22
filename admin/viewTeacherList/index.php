<?php include_once '../../common/header.php'; ?>

<?php include_once '../../common/right-sidebar.php'; ?>

<?php include_once '../admin-left-sidebar.php'; ?>
<?php

if (!isset($_SESSION["admin_email"]) || !isset($_SESSION["admin_id"])) {
    $path = BASE_URL . "admin/ADLogin/";
    header("Location: $path");
}

if(isset($_REQUEST["id"])){
    include_once "../../common/Operations.php";
    $conn = new Operations();
    $res = $conn->deleteTeacherDetails($_REQUEST["id"]);
    header("Location:/admin/viewTeacherList");
}




?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">View Teacher Details</h4>
                </div>
            </div>
            <table class="data-table table nowrap">
                <thead>
                <tr>
                    <th class="table-plus datatable-nosort">No</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Date of Birth</th>
                    <th>CPR Number</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                require_once "../../common/Operations.php";
                $conn = new Operations();
                $res = $conn->getTeachersDetails();
                $no = 1;
                foreach ($res as $val) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td class="table-plus">
                            <img src="<?php echo BASE_URL . $val["image_path"]; ?>" width="70" height="70"
                                 alt="No Profile">
                        </td>
                        <td>
                            <h5 class="font-16"><?php echo $val["name"]; ?></h5>
                        </td>
                        <td><?php echo $val["email"]; ?></td>
                        <td><?php echo $val["mobile"]; ?></td>
                        <td><?php echo $val["address"]; ?></td>
                        <td><?php echo $val["city"]; ?></td>
                        <td><?php echo date("d-m-Y", strtotime($val['date_of_birth'])); ?></td>
                        <td><?php echo $val["cpr"]; ?></td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                   role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <!--<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>-->
                                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>admin/editTeacher/?id=<?php echo $val['id']; ?>"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>admin/viewTeacherList/?key=delete&id=<?php echo $val['id']; ?>"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once '../../common/footer.php'; ?>
