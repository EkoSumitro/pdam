<?php
use yii\helpers\Html;
use yii\web\View;

use app\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
/* @var $this \yii\web\View */
/* @var $content string */
if (Yii::$app->controller->action->id === 'login') {
    echo $this->render(
        'wrapper-black',
        ['content' => $content]
    );
} else {
    //dmstr\web\AdminLteAsset::register($this);
    backend\assets\AdminLTEAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@bower') . '/admin-lte';
    //$defaultUrl = $this->web;
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    
    <div class="wrapper">
 <?= $this->render(
        'header.php',
        ['directoryAsset' => $directoryAsset]
    ) ?>
    <div class="wrap">
<!-- 
    <div class="wrapper row-offcanvas row-offcanvas-left">
 -->
        <?= $this->render('left.php',['directoryAsset' => $directoryAsset, 'defaultUrl' => $defaultUrl])?>

        <?= $this->render(
            'content.php',
            // ['content' => $content, 'directoryAsset' => $directoryAsset]
['content' => $content]
        ) ?>


    </div>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
