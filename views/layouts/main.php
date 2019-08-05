<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\web\View;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div id="wrapper">
        
        <?= $this->render('nav_sidebar.php'); ?>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to SIMAS+ Admin Theme.</span>
                    </li>
                    <li>
                        <?= 
                            /*Html::beginForm(['/site/logout'], 'post');
                            Html::submitButton('Logout', ['class' => 'btn btn-primary block full-width m-b', 'name' => 'login-button']);
                            Html::endForm();*/

                            Yii::$app->user->isGuest ? (
                                ['label' => 'Login', 'url' => ['/site/login']]
                            ) : (
                                '<li>'
                                . Html::beginForm(['/site/logout'], 'post')
                                . Html::submitButton(
                                    "<i class='fa fa-sign-out'></i> Log out (" . Yii::$app->user->identity->username . ')',
                                    ['class' => 'btn btn-link logout']
                                )
                                . Html::endForm()
                                . '</li>'
                            )
                         ?>
                        
                    </li>
                </ul>
            </nav>
        </div>
        <?= $content ?>

        <footer class="footer">
            <div class="pull-right">
                <?= Yii::powered() ?>
            </div>
            <div>
                <strong>Copyright</strong> &copy; SIMAS - Universitas Darussalam Gontor <?= date('Y') ?>
            </div>
        </footer>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
