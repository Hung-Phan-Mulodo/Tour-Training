<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-bar x_panel">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.php">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Country</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <div class="portlet light x_panel">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase">Country</span>
                </div>
                <div class="actions">
                    <a class="btn btn-primary" href="<?php echo Router::get('country_create') ?>">
                        Insert
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Code </th>
                            <th> Name </th>
                            <th> Area </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($countries as $key => $value): ?>
                                <tr>
                                    <td><?php echo $key ?></td>
                                    <td><?php echo $value->code ?></td>
                                    <td><?php echo $value->name ?></td>
                                    <td><?php echo $value->area_code ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="<?php echo Router::get('country_edit', array('id' => $value->id)) ?>"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger btn-sm" href="<?php echo Router::get('country_delete', array('id' => $value->id)) ?>"><i class="fa fa-close"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </h1>
    </div>
    <!-- END CONTENT BODY -->
</div>