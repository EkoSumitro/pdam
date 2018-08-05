<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\T101Pegawai */

$this->title = $model->id_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'T101 Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="t101-pegawai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pegawai], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pegawai], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pegawai',
            'nip',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'id_kawin',
            'id_agama',
            'tanggal_masuk',
            'tanggal_pensiun',
            'npwp',
            'nama_bank',
            'norek',
            'bpjst',
            'foto',
            'tanda_tangan',
            'email:email',
            'no_telp',
            'username',
            'password',
            'harus_ubah_password:boolean',
            'deskripsi:ntext',
            'id_perkiraan',
            'id_role',
            'id_dashboard',
            'id_pegawai_absen',
            'status_aktif:boolean',
            'id_pegawai_buat',
            'tanggal_buat',
            'id_pegawai_ubah',
            'tanggal_ubah',
            'auth_key',
            'password_reset_token',
        ],
    ]) ?>

</div>
