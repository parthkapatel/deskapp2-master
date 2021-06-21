<?php include_once '../../common/header.php'; ?>

<?php include_once '../../common/right-sidebar.php'; ?>

<?php include_once '../teachers-left-sidebar.php';?>

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
                    <th class="table-plus datatable-nosort">Name</th>
                    <th>email</th>
                    <th>mobile</th>
                    <th>address</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="table-plus">Gloria F. Mead</td>
                    <td>25</td>
                    <td>Sagittarius</td>
                    <td>2829 Trainer </td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i>Approve</a>
                                <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i>Reject</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="table-plus">Andrea J. Cagle</td>
                    <td>30</td>
                    <td>Gemini</td>
                    <td>1280 Prospect </td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i>Approve</a>
                                <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i>Reject</a>
                            </div>
                        </div>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

<?php include_once '../../common/footer.php'; ?>