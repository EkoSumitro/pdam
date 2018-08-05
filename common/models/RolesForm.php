<?php
namespace common\models;

use Yii;
use yii\base\Model;


/**
 * Roles form
 */
class RolesForm extends Model
{
	public $kode_role;
	public $nama_role;
    public $no_urut;
    public $deskripsi;
    public $status_aktif;
	
	public function attributeLabels()
    {
        return [
            'kode_role' => 'Kode Role',
            'nama_role' => 'Nama Role',
            'no_urut' => 'Nomor Urut',
            'deskripsi' => 'Deskripsi',
            'status_aktif' => 'Status Aktif',
        ];
    }

	public function rules()
	{
        return [
            // username and password are both required
           // [['rolesname','isactive'], 'required'],
            // rememberMe must be a boolean value
            //['rolesname', 'string','max'=>'50'],
            ['kode_role', 'required','message' => 'Kode Roles tidak boleh kosong'],
            ['rolesname', 'string','max'=>'10'],
            ['nama_role', 'required','message' => 'Nama Roles tidak boleh kosong'],
            ['rolesname', 'string','max'=>'50'],
            ['no_urut', 'required','message' => 'No. Urut tidak boleh kosong'],
            ['deskripsi', 'required','message' => 'Deskripsi tidak boleh kosong'],
            ['rolesname', 'string','max'=>'100'],
            // ['country', 'required','message' => 'Negara asal tim gak boleh kosong'],
            // ['country', 'string','max'=>'25'],
            ['status_aktif', 'boolean'],
        ];
	}
}
?>