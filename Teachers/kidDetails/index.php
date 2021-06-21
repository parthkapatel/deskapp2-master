<?php include_once '../../common/header.php'; ?>

<?php include_once '../../common/right-sidebar.php'; ?>

<?php include_once '../teachers-left-sidebar.php';?>


    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">

                    <div class="pull-left">
                        <h4 class="text-blue h4">View Kids Details</h4>
                    </div><br><br>

                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                           Select Parents
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Parth</a>
                            <a class="dropdown-item" href="#">Aman</a>
                            <a class="dropdown-item" href="#">darshan</a>
                        </div>
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            Select Kids
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Parth</a>
                            <a class="dropdown-item" href="#">Aman</a>
                            <a class="dropdown-item" href="#">darshan</a>
                        </div>
                    </div>
                </div>
                <table class="data-table table nowrap">
                    <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Date of Birth</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <h5 class="font-16">Shirt</h5>
                            by John Doe
                        </td>
                        <td>Black</td>
                        <td>M</td>
                        <td>$1000</td>
                        <td>1</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include_once '../../common/footer.php'; ?>