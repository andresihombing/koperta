<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "penyimpanan_tipe".
 *
 * @property int $tipe_penyimpanan_id
 * @property string $name
 *
 * @property Penyimpanan[] $penyimpanans
 */
class PenyimpananTipe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penyimpanan_tipe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tipe_penyimpanan_id' => 'Tipe Penyimpanan ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenyimpanans()
    {
        return $this->hasMany(Penyimpanan::className(), ['tipe_penyimpanan_id' => 'tipe_penyimpanan_id']);
    }
}
