<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'font-awesome/css/font-awesome.css',
        'css/plugins/toastr/toastr.min.css',
        'js/plugins/gritter/jquery.gritter.css',
        'css/site.css',
        'css/animate.css',
        'css/bootstrap.min.css',
        'css/style.min.css',
        'css/plugins/datapicker/datepicker3.css',

        //Data Tables -->
        'css/plugins/dataTables/dataTables.bootstrap.css',
        'css/plugins/dataTables/dataTables.responsive.css',
        'css/plugins/dataTables/dataTables.tableTools.min.css',
    ];
    public $js = [
        // Mainly scripts -->
        'js/jquery-2.1.1.js',
        'js/bootstrap.min.js',
        'js/plugins/metisMenu/jquery.metisMenu.js',
        'js/plugins/slimscroll/jquery.slimscroll.min.js',
        'js/plugins/jeditable/jquery.jeditable.js',

        // Flot -->
        'js/plugins/flot/jquery.flot.js',
        'js/plugins/flot/jquery.flot.tooltip.min.js',
        'js/plugins/flot/jquery.flot.spline.js',
        'js/plugins/flot/jquery.flot.resize.js',
        'js/plugins/flot/jquery.flot.pie.js',

        // Peity -->
        'js/plugins/peity/jquery.peity.min.js',
        'js/demo/peity-demo.js',

        // Custom and plugin javascript -->
        'js/inspinia.js',
        'js/plugins/pace/pace.min.js',

        // jQuery UI -->
        'js/plugins/jquery-ui/jquery-ui.min.js',

        // GITTER -->
        'js/plugins/gritter/jquery.gritter.min.js',

        // Sparkline -->
        'js/plugins/sparkline/jquery.sparkline.min.js',

        // Sparkline demo data  -->
        'js/demo/sparkline-demo.js',

        // Toastr -->
        'js/plugins/toastr/toastr.min.js',

        // Data picker -->
        'js/plugins/datapicker/bootstrap-datepicker.js',
        'js/main.js',

        // Data Tables -->
        'js/plugins/dataTables/jquery.dataTables.js',
        'js/plugins/dataTables/dataTables.bootstrap.js',
        'js/plugins/dataTables/dataTables.responsive.js',
        'js/plugins/dataTables/dataTables.tableTools.min.js',

        // Page-Level Scripts -->
        'js/dataTables-example.js',

        'js/fromCreate.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
