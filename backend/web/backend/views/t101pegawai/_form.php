<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\T101Pegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="t101-pegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->textInput() ?>

    <?= $form->field($model, 'id_kawin')->textInput() ?>

    <?= $form->field($model, 'id_agama')->textInput() ?>

    <?= $form->field($model, 'tanggal_masuk')->textInput() ?>

    <?= $form->field($model, 'tanggal_pensiun')->textInput() ?>

    <?= $form->field($model, 'npwp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'norek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bpjst')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto')->textInput() ?>

    <?= $form->field($model, 'tanda_tangan')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harus_ubah_password')->checkbox() ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_perkiraan')->textInput() ?>

    <?= $form->field($model, 'id_role')->textInput() ?>

    <?= $form->field($model, 'id_dashboard')->textInput() ?>

    <?= $form->field($model, 'id_pegawai_absen')->textInput() ?>

    <?= $form->field($model, 'status_aktif')->checkbox() ?>

    <?= $form->field($model, 'id_pegawai_buat')->textInput() ?>

    <?= $form->field($model, 'tanggal_buat')->textInput() ?>

    <?= $form->field($model, 'id_pegawai_ubah')->textInput() ?>

    <?= $form->field($model, 'tanggal_ubah')->textInput() ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
