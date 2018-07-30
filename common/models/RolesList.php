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
        return 'roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rolesname'], 'string'],
            [['isactive'], 'default', 'value' => null],
            [['isactive'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rolesid' => 'Rolesid',
            'rolesname' => 'Nama Roles',
            'isactive' => 'Is Active',
        ];
    }
}
