<?php session_start(); ?>

<?php include_once '../../common/header.php'; ?>
<?php
require_once "../../common/Operations.php";
$conn = new Operations();
if (!isset($_SESSION["teacher_email"])) {
    $path = Teacher_BASE_URL . "TLogin/";
    header("Location: $path");
}


?>
<?php include_once '../../common/right-sidebar.php'; ?>

<?php include_once '../teachers-left-sidebar.php'; ?>


    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">

                    <div class="pull-left">
                        <h4 class="text-blue h4">View Kids Details</h4>
                    </div>
                    <br><br>

                    <form method="post" action="">
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="inputState" class="form-label">Select Parent</label>
                                <select id="inputState" name="parent" onchange="reload(this.form)"
                                        class="form-control dropdown-toggle w-auto">
                                    <option class="dropdown-item" selected>Choose...</option>
                                    <?php $res = $conn->getParentsDetails();
                                    foreach ($res as $val) {
                                        echo "<option class='dropdown-item' value='" . $val["id"] . "'>" . $val['name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="data-table table nowrap">
                    <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">No</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Date of Birth</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($_REQUEST["id"])) {
                        $res = $conn->getChildDetailsByParentId($_REQUEST["id"]);
                        $no = 1;
                        foreach ($res as $val) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $val["name"]; ?></td>
                                <td><?php echo $val["email"]; ?></td>
                                <td><?php echo $val["date_of_birth"]; ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="4">Select Parent Name</td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function reload(form) {
            const val = form.parent.options[form.parent.options.selectedIndex].value;

            self.location = "<?php echo Teacher_BASE_URL;?>/kidDetails" + '?id=' + val;
        }
    </script>
<?php include_once '../../common/footer.php'; ?>