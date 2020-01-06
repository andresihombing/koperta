<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jaminan_tanah".
 *
 * @property int $jaminan_bangunan_id
 * @property string $nama_pemilik
 * @property int $no
 * @property string $status_hak_milik
 * @property int $luas
 *
 * @property Peminjaman[] $peminjamen
 */
class JaminanTanah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jaminan_tanah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pemilik', 'no', 'status_hak_milik', 'luas'], 'required'],
            [['no', 'luas'], 'integer'],
            [['nama_pemilik', 'status_hak_milik'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jaminan_tanah_id' => 'Jaminan Tanah ID',
            'nama_pemilik' => 'Nama Pemilik',
            'no' => 'No',
            'status_hak_milik' => 'Status Hak Milik',
            'luas' => 'Luas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeminjamen()
    {
        return $this->hasMany(Peminjaman::className(), ['jaminan_bangunan_id' => 'jaminan_bangunan_id']);
    }
}
