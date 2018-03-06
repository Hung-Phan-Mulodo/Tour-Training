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
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">Country Edit</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo Router::get('country_update', array('id' => $country->id)) ?>">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Code</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" placeholder="Enter text" name="code" value="<?php echo $country->code ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" placeholder="Enter text" name="name" value="<?php echo $country->name ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Area</label>
                                <div class="col-md-5">
                                    <select class="form-control" name="area_id">
                                        <option value="0">-- Choose a area --</option>
                                        <?php
                                        foreach ($areas as $key => $value):
                                            if ($value->id == $country->area_id){
                                                ?>
                                                <option value="<?php echo $value->id ?>" selected><?php echo $value->code ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $value->id ?>"><?php echo $value->code ?></option>
                                                <?php
                                            }
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Submit</button>
                                    <a class="btn default" href="<?php echo Router::get('country') ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </h1>
    </div>
    <!-- END CONTENT BODY -->
</div>