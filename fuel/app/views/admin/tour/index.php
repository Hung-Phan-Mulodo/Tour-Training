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
                        Insert
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="fixed-table-toolbar">
                    <form class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="form-group">
                                <div class="col-md-2">
                                    <input class="form-control" type="text" placeholder="Tour Code" id="tour_code">
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" id="area">
                                        <option value="0">-- Choose a area --</option>
                                        <?php
                                        foreach ($areas as $key => $value):
                                            ?>
                                            <option value="<?php echo $value->id ?>"><?php echo $value->code ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" id="country">
                                        <option value="0">-- Choose a country --</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" id="city">
                                        <option value="0">-- Choose a city --</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn blue" id="btn-tour"><i class="fa fa-search"></i> </button type="button">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
                        <tbody id="table-tour">
                        <?php
                        foreach ($tours as $key => $value): ?>
                            <tr>
                                <td><?php echo $key ?></td>
                                <td><?php echo $value->code ?></td>
                                <td><?php echo substr($value->title,0, 49) ?></td>
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