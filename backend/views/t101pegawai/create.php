<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\T101Pegawai */

$this->title = 'Create T101 Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'T101 Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="t101-pegawai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
