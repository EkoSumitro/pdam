<?php
namespace common\models;

use Yii;
use yii\base\Model;


/**
 * Roles form
 */
class RolesForm extends Model
{
	public $rolesname;
	public $isactive;
	
	public function attributeLabels()
    {
        return [
            'rolesname' => 'Nama Roles',
            'isactive' => 'Is Active',
        ];
    }

	public function rules()
	{
        return [
            // username and password are both required
           // [['rolesname','isactive'], 'required'],
            // rememberMe must be a boolean value
            //['rolesname', 'string','max'=>'50'],
            ['rolesname', 'required','message' => 'Nama Roles tidak boleh kosong'],
            ['rolesname', 'string','max'=>'50'],
            // ['country', 'required','message' => 'Negara asal tim gak boleh kosong'],
            // ['country', 'string','max'=>'25'],
            ['isactive', 'boolean'],
        ];
	}
}
?>