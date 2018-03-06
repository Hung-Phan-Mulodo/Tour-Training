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
        $.get('<?php echo Router::get('rest_country') ?>?area_id='+ $('#area').val(), function (data, status) {
            if(data.status){
                console.log(data.data);
                $('#country').empty();
                $('#city').empty();
                $('#country').append('<option value="0">-- Choose a country --</option>')
                $('#city').append('<option value="0">-- Choose a city --</option>')
                $.each(data.data, function (i) {
                    $('#country').append('<option value="'+ data.data[i].id +'">'+ data.data[i].code +'</option>')
                })
            }
        })
    })
    $('#country').change(function () {
        $.get('<?php echo Router::get('rest_city') ?>?country_id='+ $('#country').val(), function (data, status) {
            if(data.status){
                console.log(data.data);
                $('#city').empty();
                $('#city').append('<option value="0">-- Choose a city --</option>')
                $.each(data.data, function (i) {
                    $('#city').append('<option value="'+ data.data[i].id +'">'+ data.data[i].code +'</option>')
                })
            }
        })
    })
</script>