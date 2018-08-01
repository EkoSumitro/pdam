<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-box">

    <!-- <div class="header"><?= Html::encode($this->title) ?></div> -->
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <div class="body">
        <p>Please fill out the following fields to login:</p>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <!-- <?= $form->field($model, 'rememberMe')->checkbox() ?> -->
    </div>
    <div class="footer">

        <?= Html::submitButton('LOGIN', ['class' => 'btn btn-block btn-login btn-lg', 'name' => 'login-button','style' => 'color:#ffffff; outline-width: 0; border-radius: 50px; -moz-border-radius: 50px;background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );']) ?>

        <!-- <p><a href="#">I forgot my password</a></p> -->

    </div>
    <?php ActiveForm::end(); ?>
</div>

<!-- <div class="margin text-center">
    <span>Sign in using social networks</span>
    <br/>
    <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
    <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
    <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>
</div> -->