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
                    <span>Tour</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <div class="portlet light x_panel">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase">Tour</span>
                </div>
                <div class="actions">
                    <a class="btn btn-primary" href="<?php echo Router::get('tour_create') ?>">
                        Thêm
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
                            <th> Title </th>
                            <th> Gross min </th>
                            <th> Gross max </th>
                            <th> Image </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($tours as $key => $value): ?>
                            <tr>
                                <td><?php echo $key ?></td>
                                <td><?php echo $value->code ?></td>
                                <td><?php echo substr($value->title,0, 50) ?></td>
                                <td><?php echo $value->gross_min ?></td>
                                <td><?php echo $value->gross_max ?></td>
                                <td><?php echo Asset::img($value->image, array('width' => '200px', 'height' => '100px')) ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="<?php echo Router::get('tour_edit', array('id' => $value->id)) ?>"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-sm" href="<?php echo Router::get('tour_delete', array('id' => $value->id)) ?>"><i class="fa fa-close"></i></a>
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