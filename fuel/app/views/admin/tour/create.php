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
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">Tour Create</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo Router::get('tour_add') ?>" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Code</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" placeholder="Enter text" name="code">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Title</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" placeholder="Enter text" name="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Gross min</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" placeholder="Enter text" name="gross_min" onkeypress="return isNumberKey(event)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Gross max</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" placeholder="Enter text" name="gross_max" onkeypress="return isNumberKey(event)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Area</label>
                                <div class="col-md-5">
                                    <select class="form-control" name="area_id" id="area">
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
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Country</label>
                                <div class="col-md-5">
                                    <select class="form-control" name="country_id" id="country">
                                        <option value="0">-- Choose a country --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">City</label>
                                <div class="col-md-5">
                                    <select class="form-control" name="city_id" id="city">
                                        <option value="0">-- Choose a city --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Image</label>
                                <div class="col-md-5">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                        <div>
                                    <span class="btn default btn-file">
                                        <span class="fileinput-new"> Select image </span>
                                        <span class="fileinput-exists"> Change </span>
                                        <input type="hidden" value="" name="...">
                                        <input type="file" name="image">
                                    </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                Remove </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Submit</button>
                                    <a class="btn default" href="<?php echo Router::get('tour') ?>">Cancel</a>
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