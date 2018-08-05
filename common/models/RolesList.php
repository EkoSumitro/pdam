<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property int $rolesid
 * @property string $rolesname
 * @property int $isactive
 */
class RolesList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm011_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_role'], 'string'],
            [['nama_role'], 'string'],
            [['no_urut'], 'integer'],
            [['deskripsi'], 'string'],
            [['status_aktif'], 'default', 'value' => null],
            [['status_aktif'], 'integer'],
            // [['id_pegawai_buat'], 'integer'],
            // [['tanggal_buat'], 'datetime'],
            // [['id_pegawai_ubah'], 'integer'],
            // [['tanggal_ubah'], 'datetime'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_Role' => 'Id Role',
            'kode_role' => 'Kode Role',
            'nama_role' => 'Nama Role',
            'no_urut' => 'No. Urut',
            'deskripsi' => 'Deskripsi',
            'status_aktif' => 'Status Aktif',
        ];
    }
}
