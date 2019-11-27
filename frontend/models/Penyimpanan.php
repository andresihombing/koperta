<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "penyimpanan".
 *
 * @property int $penyimpanan_id
 * @property int $koperasi_id
 * @property int $anggota_id
 * @property int $nilai_simpanan
 * @property string $tgl_penyimpanan
 * @property int $petugas_id
 */
class Penyimpanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penyimpanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['koperasi_id', 'anggota_id', 'nilai_simpanan', 'tgl_penyimpanan', 'petugas_id'], 'required'],
            [['koperasi_id', 'anggota_id', 'nilai_simpanan', 'petugas_id'], 'integer'],
            [['tgl_penyimpanan'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'penyimpanan_id' => 'Penyimpanan ID',
            'koperasi_id' => 'Koperasi ID',
            'anggota_id' => 'Anggota ID',
            'nilai_simpanan' => 'Nilai Simpanan',
            'tgl_penyimpanan' => 'Tgl Penyimpanan',
            'petugas_id' => 'Petugas ID',
        ];
    }
}
