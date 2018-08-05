<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box-body">
    <!-- <div class="header">
                        </div> -->
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <div class="card">
        <div class="card-body login-card-body" style="
    padding-top: 4px;
    padding-bottom: 40px;
    padding-left: 30px;
    padding-right: 30px;
">
<!-- <div style="color:#000000;font-style: bold;text-align: center;font-size: 14px; width: 160px;height: 93px;position: center;border: 3px;"> -->
    <div >
            <img src="http://localhost:8080/pdam/backend/web/static/photo/PDAM.png" class="logo" style="position: center;"/> 
</div>
            <br>
            <!-- <p style="color:#DE6125;font-style: bold;text-align: center;font-size: 16px; padding-top: 20px;"> -->
                <p>
                    <b>Sistem Informasi Managemen</b><br>
            <b>Kepegawaian</b></p>
            <br>
            <?= $form->field($model, 'username', [
               'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']
         ])->textInput()->input('username', ['placeholder' => "NIP atau username"]); ?>
            
            <br>
            <?= $form->field($model, 'password', [
            'addon' => [
                        'append' => [
                            'content' => '<span toggle="#password" class="pull-right fa fa-fw fa-eye field-icon  toggle-password"></span>'
                        ]
                    ],
               'inputOptions' => ['id' =>'password','data-toggle' =>'password','class' => 'form-control pwd']
         ])->passwordInput()->input('password', ['placeholder' => "Password"]); ?>
            <br>
            <br>
            <br>
            <?= Html::submitButton('LOGIN', ['class' => 'btn btn-block btn-login', 'name' => 'login-button','style' => 'color:#ffffff; outline-width: 0; width:30vh; border-radius: 60px; -moz-border-radius: 50px;background: linear-gradient(to right, #0E74BC, #0B85CB, #04A7EB);']) ?> 
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<link href="<?= Yii::$app->request->baseUrl?>/static/alt/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="<?= Yii::$app->request->baseUrl?>/static/alt/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<!-- 
<script type="text/javascript">
$(".reveal").on('click',function() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
</script> -->
   <!--  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>

<script type="text/javascript">
    $("#password").password('toggle');
</script> -->
<!-- <div class="margin text-center">
    <span>Sign in using social networks</span>
    <br/>
    <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
    <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
    <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>
</div> -->