<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        'adminlte/css/AdminLTE.css', 
        //'font-awesome/css/font-awesome.min.css',
        '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css',
        'adminlte/css/bootstrap/bootstrap.min.css',
        '//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css',
        'adminlte/css/morris/morris.css',
        'adminlte/css/jvectormap/jquery-jvectormap-1.2.2.css',
        'adminlte/css/datepicker/datepicker3.css',
        'adminlte/css/daterangepicker/daterangepicker-bs3.css',
        'adminlte/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'adminlte/css/datatables/jquery.dataTables.css'
    ];
    public $js = [
        'adminlte/js/plugins/jquery/jquery.min.js',
        'adminlte/js/plugins/bootstrap/bootstrap.min.js',
        'adminlte/js/plugins/jqueryui/jquery-ui.min.js',
        'adminlte/js/plugins/raphael/raphael-min.js',
        'adminlte/js/AdminLTE/dashboard.js',
        'adminlte/js/AdminLTE/app.js',
        'adminlte/js/plugins/morris/morris.min.js',
        'adminlte/js/plugins/sparkline/jquery.sparkline.min.js',
        'adminlte/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'adminlte/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'adminlte/js/plugins/jqueryKnob/jquery.knob.js',
        'adminlte/js/plugins/daterangepicker/daterangepicker.js',
        'adminlte/js/plugins/datepicker/bootstrap-datepicker.js',
        'adminlte/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'adminlte/js/plugins/iCheck/icheck.min.js',
        'adminlte/js/plugins/datatables/jquery.dataTables.js',
        //'adminlte/js/plugins/datatables/jquery.dataTables.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
