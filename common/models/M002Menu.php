<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;

/**
 * This is the model class for table "m002_Menu".
 *
 * @property int $idMenu
 * @property string $namaMenu
 * @property string $urlMenu
 * @property bool $isActive
 */
class M002Menu extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm002_Menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['urlMenu'], 'string'],
            [['isActive'], 'boolean'],
            [['namaMenu'], 'string', 'max' => 25],
            [['icon'], 'string', 'max' => 25],
            [['parentID'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idMenu' => 'Id Menu',
            'namaMenu' => 'Nama Menu',
            'urlMenu' => 'Url Menu',
            'isActive' => 'Is Active',
        ];
    }
}
