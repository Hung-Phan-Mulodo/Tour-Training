<!--[if lt IE 9]>
<script src="<?php echo Asset::get_file('respond.min.js', 'global', 'plugins') ?>"></script>
<script src="<?php echo Asset::get_file('excanvas.min.js', 'global', 'plugins') ?>"></script>
<script src="<?php echo Asset::get_file('ie8.fix.min.js', 'global', 'plugins') ?>"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo Asset::get_file('jquery.min.js', 'global', 'plugins') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('bootstrap.min.js', 'global', 'plugins/bootstrap/js') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('js.cookie.min.js', 'global', 'plugins') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('jquery.slimscroll.min.js', 'global', 'plugins/jquery-slimscroll') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('jquery.blockui.min.js', 'global', 'plugins') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('bootstrap-switch.min.js', 'global', 'plugins/bootstrap-switch/js') ?>" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo Asset::get_file('moment.min.js', 'global', 'plugins') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('bootstrap-fileinput.js', 'global', 'plugins/bootstrap-fileinput') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('daterangepicker.min.js', 'global', 'plugins/bootstrap-daterangepicker') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('morris.min.js', 'global', 'plugins/morris') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('raphael-min.js', 'global', 'plugins/morris') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('jquery.waypoints.min.js', 'global', 'plugins/counterup') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('jquery.counterup.min.js', 'global', 'plugins/counterup') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('fullcalendar.min.js', 'global', 'plugins/fullcalendar') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('jquery.bootstrap-growl.js', 'global', 'plugins/bootstrap-growl') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('jquery.blockui.min.js', 'global', 'plugins') ?>" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo Asset::get_file('app.min.js', 'global', '/scripts') ?>" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo Asset::get_file('dashboard.min.js', 'pages', '/scripts') ?>" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo Asset::get_file('layout.min.js', 'layouts', 'layout/scripts') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('demo.min.js', 'layouts', 'layout/scripts') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('quick-sidebar.min.js', 'layouts', 'global/scripts') ?>" type="text/javascript"></script>
<script src="<?php echo Asset::get_file('quick-nav.min.js', 'layouts', 'global/scripts') ?>" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    <?php
        foreach (array('danger', 'warning', 'success', 'info') as $mst):
            $msg = Session::get_flash($mst);
            if($msg !== null): ?>
                $.bootstrapGrowl('<?php echo $msg ?>', {
                    ele: 'body', // which element to append to
                    type: '<?php echo $mst ?>', // (null, 'info', 'danger', 'success', 'warning')
                    offset: {
                        from: 'bottom',
                        amount: 50
                    }, // 'top', or 'bottom'
                    align: 'left', // ('left', 'right', or 'center')
                    width: 'integer', // (integer, or 'auto')
                    delay: 5000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
                    allow_dismiss: true, // If true then will display a cross to close the popup.
                    stackup_spacing: 10 // spacing between consecutively stacked growls.
                });
            <?php endif;
        endforeach;?>
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if(charCode == 59 || charCode == 46)
            return true;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    $('#area').change(function () {
        getCountry();
    })
    $('#country').change(function () {
        getCity();
    })
    $('#tour_area').change(function () {
        getTourCountry();
        postTour();
    })
    $('#tour_country').change(function () {
        getTourCity();
        postTour();
    })
    $('#tour_city').change(function () {
        postTour();
    })
    $('#btn_tour').click(function () {
        postTour();
    })
    function postTour() {
        var formData = {
            tour_code : $('#tour_code').val(),
            area : $('#tour_area').val(),
            country : $('#tour_country').val(),
            city : $('#tour_city').val(),
        }
        App.blockUI({
            boxed: true
        });
        $.ajax({
            type : 'post',
            url : '<?php echo Router::get('api_tour') ?>',
            data : formData,
            success : function (response) {
                $('#table-tour').empty();
                $.each(response.data, function (i) {
                    $('#table-tour').append(
                        `
                            <tr>
                                <td>`+ (i+1) +`</td>
                                <td>`+ response.data[i].code +`</td>
                                <td>`+ response.data[i].title +`</td>
                                <td>`+ response.data[i].gross_min +`</td>
                                <td>`+ response.data[i].gross_max +`</td>
                                <td><img src="`+ location.origin + `/assets/img/`+ response.data[i].image +`" height="100" width="200"></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="`+ location.origin + `/tour/edit?id=`+ response.data[i].id +`"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-sm" href="`+ location.origin + `/tour/delete?id=`+ response.data[i].id +`"><i class="fa fa-close"></i></a>
                                </td>
                            </tr>
                        `
                    )
                })
                App.unblockUI();
            }
        });
    }
    function getCountry() {
        $('#country').empty();
        $('#city').empty();
        $('#country').append('<option value="0">-- Choose a country --</option>')
        $('#city').append('<option value="0">-- Choose a city --</option>')
        $.ajax({
            type : 'get',
            url : '<?php echo Router::get('api_country') ?>?area_id='+ $('#area').val(),
            success : function (response) {
                if(response.errcd == 0){
                    $.each(response.data, function (i) {
                        $('#country').append('<option value="'+ response.data[i].id +'">'+ response.data[i].code +'</option>')
                    })
                }
            }
        });
    }
    function getCity() {
        $('#city').empty();
        $('#city').append('<option value="0">-- Choose a city --</option>')
        $.ajax({
            type : 'get',
            url : '<?php echo Router::get('api_city') ?>?country_id='+ $('#country').val(),
            success : function (response) {
                if(response.errcd == 0){
                    $.each(response.data, function (i) {
                        $('#city').append('<option value="'+ response.data[i].id +'">'+ response.data[i].code +'</option>')
                    })
                }
            }
        });
    }
    function getTourCountry() {
        $('#tour_country').empty();
        $('#tour_city').empty();
        $('#tour_country').append('<option value="0">-- Choose a country --</option>')
        $('#tour_city').append('<option value="0">-- Choose a city --</option>')
        $.ajax({
            type : 'get',
            url : '<?php echo Router::get('api_country') ?>?area_id='+ $('#tour_area').val(),
            success : function (response) {
                if(response.errcd == 0){
                    $.each(response.data, function (i) {
                        $('#tour_country').append('<option value="'+ response.data[i].id +'">'+ response.data[i].code +'</option>')
                    })
                }
            }
        });
    }
    function getTourCity() {
        $('#tour_city').empty();
        $('#tour_city').append('<option value="0">-- Choose a city --</option>')
        $.ajax({
            type : 'get',
            url : '<?php echo Router::get('api_city') ?>?country_id='+ $('#tour_country').val(),
            success : function (response) {
                if(response.errcd == 0){
                    $.each(response.data, function (i) {
                        $('#tour_city').append('<option value="'+ response.data[i].id +'">'+ response.data[i].code +'</option>')
                    })
                }
            }
        });
    }
</script>