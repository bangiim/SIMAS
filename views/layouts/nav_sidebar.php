<?php
use yii\helpers\Html;
use app\models\User;

$model = new User();
$this->title = $model->username;
$fisrt = Yii::$app->user->identity->first_name;
$last  = Yii::$app->user->identity->last_name;
$email = Yii::$app->user->identity->email;
$id    = Yii::$app->user->identity->id;
$foto  = Yii::$app->user->identity->user_image;
?>
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" width="80" height="80" src="<?php echo $foto ?>" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> 
                                <strong class="font-bold"><?php echo "$fisrt $last"; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo "$email"; ?><b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li>
                                    <a href="index.php?r=user/view&id=<?php echo $id ?>">
                                        <div class="btn btn-link logout"><i class="fa fa-user"></i> Profile</div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <?=
                                        Yii::$app->user->isGuest ? (
                                        ['label' => 'Login', 'url' => ['/site/login']]
                                    ) : (
                                        ''
                                        . Html::beginForm(['/site/logout'], 'post')
                                        . Html::submitButton(
                                            "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-sign-out'></i> Log out",
                                            ['class' => 'btn btn-link logout']
                                        )
                                        . Html::endForm()
                                        . ''
                                    )
                                    ?>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li class="active">
                        <a href="index.php?r=site/index"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                    </li>
                    <li>
                        <a href="index.php?r=jenis-surat"><i class="fa fa-file-text-o"></i> <span class="nav-label">Manajemen Jenis Surat</span> </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-file-text"></i> <span class="nav-label">Manajemen Surat</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="index.php?r=surat-keluar"><i class="fa fa-circle-thin"></i> Surat Keluar</a></li>
                            <li><a href="index.php?r=surat-masuk"><i class="fa fa-circle-thin"></i> Surat Masuk</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Laporan Arsip</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#"><i class="fa fa-circle-thin"></i> Surat Keluar</a></li>
                            <li><a href="index.php?r=laporan-surat-masuk"><i class="fa fa-circle-thin"></i> Surat Masuk</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?r=user"><i class="fa fa-users"></i> <span class="nav-label">Manajemen Users</span> </a>
                    </li>
                    <li>
                        <a href="index.php?r=instansi"><i class="fa fa-cogs"></i> <span class="nav-label">Manajemen Instansi</span> </a>
                    </li>
                    <li>
                        <a href="index.php?r=site/exportfilesuratmasukall"><i class="fa fa-file-excel-o"></i> <span class="nav-label">Export Data to Excel</span> </a>
                    </li>
                </ul>

            </div>
        </nav>
