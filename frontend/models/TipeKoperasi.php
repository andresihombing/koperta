<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%tipe_koperasi}}".
 *
 * @property int $tipe_koperasi_id
 * @property string $tipe
 */
class TipeKoperasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tipe_koperasi}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipe'], 'required'],
            [['tipe'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tipe_koperasi_id' => 'Tipe Koperasi ID',
            'tipe' => 'Tipe',
        ];
    }
}
