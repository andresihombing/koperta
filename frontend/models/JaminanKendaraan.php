<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%jaminan_kendaraan}}".
 *
 * @property int $jaminan_kendaraan_id
 * @property int $nama_pemilik
 * @property int $no_polisi
 * @property string $merk
 * @property int $tahun_pembuatan
 * @property string $warna
 * @property int $nilai_harga
 */
class JaminanKendaraan extends \yii\db\ActiveRecord
{
    public $choices;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%jaminan_kendaraan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jaminan_kendaraan_id', 'nama_pemilik', 'no_polisi', 'merk', 'tahun_pembuatan', 'warna', 'nilai_harga'], 'required'],
            [['jaminan_kendaraan_id', 'nama_pemilik', 'no_polisi', 'tahun_pembuatan', 'nilai_harga'], 'integer'],
            [['merk', 'warna'], 'string', 'max' => 250],
            [['jaminan_kendaraan_id'], 'unique'],
            [['koperasi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Koperasi::className(), 'targetAttribute' => ['koperasi_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jaminan_kendaraan_id' => 'Jaminan Kendaraan ID',
            'nama_pemilik' => 'Nama Pemilik',
            'no_polisi' => 'No Polisi',
            'merk' => 'Merk',
            'tahun_pembuatan' => 'Tahun Pembuatan',
            'warna' => 'Warna',
            'nilai_harga' => 'Nilai Harga',
        ];
    }
}
