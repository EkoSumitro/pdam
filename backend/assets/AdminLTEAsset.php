<?php
namespace backend\assets;

use yii\web\AssetBundle;
class AdminLTEAsset extends AssetBundle {
	
    //public $sourcePath = '@app/web/static/';

    public $baseUrl = '@web/static/';
    public $css = [
		'bootstrap/css/bootstrap.min.css',
		'plugins/font-awesome-4.6.3/css/font-awesome.min.css',
		'plugins/ionicons/css/ionicons.min.css',
		'core/css/AdminLTE.min.css',
		'core/css/skins/_all-skins.min.css',
		//'core/css/morris/morris.css',
		'plugins/daterangepicker/daterangepicker-bs3.css',
		'plugins/iCheck/all.css',
		'plugins/colorpicker/bootstrap-colorpicker.min.css',
		'plugins/timepicker/bootstrap-timepicker.min.css',
		'plugins/select2/select2.min.css',
		'plugins/jvectormap/jquery-jvectormap-1.2.2.css',
		'plugins/datatables/css/jquery.dataTables.min.css',
        ];
		
    public $js = [       
		
		//'plugins/jQuery/jQuery-2.1.4.min.js',
		'core/jquery-ui/jquery-ui.js',
		'core/jquery-ui/jquery-ui.min.js',
		'bootstrap/js/bootstrap.min.js',
		'plugins/raphael/raphael.min.js',
		//'plugins/morris/morris.js',
		'plugins/select2/select2.full.min.js',
		'plugins/input-mask/jquery.inputmask.js',
		'plugins/input-mask/jquery.inputmask.date.extensions.js',
		'plugins/input-mask/jquery.inputmask.extensions.js',
		'plugins/moment/min/moment.min.js',
		'plugins/knob/jquery.knob.js',
		'plugins/daterangepicker/daterangepicker.js',
		'plugins/colorpicker/bootstrap-colorpicker.min.js',
		'plugins/timepicker/bootstrap-timepicker.min.js',
		'plugins/slimScroll/jquery.slimscroll.min.js',
		
		'plugins/iCheck/icheck.min.js',
		'plugins/fastclick/fastclick.min.js',
		'plugins/datatables/js/jquery.dataTables.min.js',
		'plugins/slimScroll/jquery.slimscroll.min.js',
		'plugins/fastclick/fastclick.min.js',
		'core/js/app.min.js',
		'plugins/sparkline/jquery.sparkline.min.js',
		'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
		'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
		'plugins/slimScroll/jquery.slimscroll.min.js',
		'plugins/chartjs/Chart.min.js',
		'plugins/ckeditor/ckeditor.js',	
		//'core/js/pages/dashboard.js',
		'core/js/adminlte.min.js',
		'core/js/demo.js',
        ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
    ];
}