<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "penyimpanan_saldo".
 *
 * @property int $saldo_id
 * @property float $total_saldo
 */
class PenyimpananSaldo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penyimpanan_saldo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total_saldo'], 'required'],
            [['total_saldo'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'saldo_id' => 'Saldo ID',
            'total_saldo' => 'Total Saldo',
        ];
    }
}
