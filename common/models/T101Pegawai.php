<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "t101_pegawai".
 *
 * @property int $id_pegawai
 * @property string $nip
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property int $id_kawin
 * @property int $id_agama
 * @property string $tanggal_masuk
 * @property string $tanggal_pensiun
 * @property string $npwp
 * @property string $nama_bank
 * @property string $norek
 * @property string $bpjst
 * @property resource $foto
 * @property resource $tanda_tangan
 * @property string $email
 * @property string $no_telp
 * @property string $username
 * @property string $password
 * @property bool $harus_ubah_password
 * @property string $deskripsi
 * @property int $id_perkiraan
 * @property int $id_role
 * @property int $id_dashboard
 * @property string $id_pegawai_absen
 * @property bool $status_aktif
 * @property int $id_pegawai_buat
 * @property string $tanggal_buat
 * @property int $id_pegawai_ubah
 * @property string $tanggal_ubah
 * @property string $auth_key
 * @property string $password_reset_token
 */
class T101Pegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't101_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_lahir', 'tanggal_masuk', 'tanggal_pensiun', 'tanggal_buat', 'tanggal_ubah'], 'safe'],
            [['id_kawin', 'id_agama', 'id_perkiraan', 'id_role', 'id_dashboard', 'id_pegawai_absen', 'id_pegawai_buat', 'id_pegawai_ubah'], 'default', 'value' => null],
            [['id_kawin', 'id_agama', 'id_perkiraan', 'id_role', 'id_dashboard', 'id_pegawai_absen', 'id_pegawai_buat', 'id_pegawai_ubah'], 'integer'],
            [['foto', 'tanda_tangan', 'deskripsi'], 'string'],
            [['harus_ubah_password', 'status_aktif'], 'boolean'],
            [['nip', 'npwp', 'nama_bank', 'norek', 'bpjst', 'username'], 'string', 'max' => 20],
            [['nama'], 'string', 'max' => 100],
            [['tempat_lahir', 'email', 'no_telp'], 'string', 'max' => 50],
            [['password', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pegawai' => 'Id Pegawai',
            'nip' => 'Nip',
            'nama' => 'Nama',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'id_kawin' => 'Id Kawin',
            'id_agama' => 'Id Agama',
            'tanggal_masuk' => 'Tanggal Masuk',
            'tanggal_pensiun' => 'Tanggal Pensiun',
            'npwp' => 'Npwp',
            'nama_bank' => 'Nama Bank',
            'norek' => 'Norek',
            'bpjst' => 'Bpjst',
            'foto' => 'Foto',
            'tanda_tangan' => 'Tanda Tangan',
            'email' => 'Email',
            'no_telp' => 'No Telp',
            'username' => 'Username',
            'password' => 'Password',
            'harus_ubah_password' => 'Harus Ubah Password',
            'deskripsi' => 'Deskripsi',
            'id_perkiraan' => 'Id Perkiraan',
            'id_role' => 'Id Role',
            'id_dashboard' => 'Id Dashboard',
            'id_pegawai_absen' => 'Id Pegawai Absen',
            'status_aktif' => 'Status Aktif',
            'id_pegawai_buat' => 'Id Pegawai Buat',
            'tanggal_buat' => 'Tanggal Buat',
            'id_pegawai_ubah' => 'Id Pegawai Ubah',
            'tanggal_ubah' => 'Tanggal Ubah',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
        ];
    }
}
