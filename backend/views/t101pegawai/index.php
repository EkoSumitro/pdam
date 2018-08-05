<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\T101PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'T101 Pegawais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="t101-pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create T101 Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pegawai',
            'nip',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            //'id_kawin',
            //'id_agama',
            //'tanggal_masuk',
            //'tanggal_pensiun',
            //'npwp',
            //'nama_bank',
            //'norek',
            //'bpjst',
            //'foto',
            //'tanda_tangan',
            //'email:email',
            //'no_telp',
            //'username',
            //'password',
            //'harus_ubah_password:boolean',
            //'deskripsi:ntext',
            //'id_perkiraan',
            //'id_role',
            //'id_dashboard',
            //'id_pegawai_absen',
            //'status_aktif:boolean',
            //'id_pegawai_buat',
            //'tanggal_buat',
            //'id_pegawai_ubah',
            //'tanggal_ubah',
            //'auth_key',
            //'password_reset_token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
