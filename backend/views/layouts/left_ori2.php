<?php
use yii\bootstrap\Nav;
use common\models\M002Menu;
use yii\helpers\Url;

?>
<aside class="left-side sidebar-offcanvas">

    <section class="sidebar">

        <?php if (!Yii::$app->user->isGuest) : ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>Hello, <?= @Yii::$app->user->identity->username ?></p>
                    <a href="<?= $directoryAsset ?>/#">
                        <i class="fa fa-circle text-success"></i> Online
                    </a>
                </div>
            </div>
        <?php endif ?>

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                                        class="fa fa-search"></i></button>
                            </span>
            </div>
        </form>

        <?=
        Nav::widget(
            [
                'encodeLabels' => false,
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    [
                        'label' => '<span class="fa fa-angle-down"></span><span class="text-info">Menu Yii2</span>',
                        'url' => '#'
                    ],
                    ['label' => '<span class="fa fa-file-code-o"></span> Gii', 'url' => ['/gii']],
                    ['label' => '<span class="fa fa-dashboard"></span> Debug', 'url' => ['/debug']],
                ],
            ]
        );
        ?>

        <!-- You can delete next ul.sidebar-menu. It's just demo. -->

        <?php
        
        $sql = 'SELECT * FROM "m002_Menu" WHERE "parentID" = 0 and "isActive"=true';
       $menuParent = M002Menu::findBySql($sql)->all();

       foreach ($menuParent as $value) {
                Yii::setAlias('@urlmenu', $value['urlMenu'] );

                $url = Url::to(['@urlmenu']);
                $idParent = $value['idMenu'];
        ?>
            <li class="treeview">
                <a href="<?php echo $url ?>">
                    <i class="<?= $value['icon'] ?>"></i> <span><?= $value['namaMenu'] ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
        <?php

         //$menuChild = M002Menu::find()->where('"parentID = "'.$value[4].' and "isActive"=true')->all();
        $sqlChild = 'SELECT * FROM "m002_Menu" WHERE "parentID" = '.$idParent.' and "isActive"=true';
       $menuChild = M002Menu::findBySql($sqlChild)->all();
       foreach ($menuChild as $valueChild) {
                Yii::setAlias('@urlmenuChild', $valueChild['urlMenu'] );
                $urlChild =Url::to(['@urlmenuChild']);
         ?>
                    <li><a href="<?php echo $urlChild ?>"><i
                                class="<?= $valueChild['icon'] ?>"></i><?= $valueChild['namaMenu'] ?></a>
                    </li>
        <?php
            };
           echo "</ul></li>";
        }
        ?>
         
    </section>

</aside>
