<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%custom_simpan_pinjam}}".
 *
 * @property int $simpan_pinjam_id
 * @property int $tanah_bangunan
 * @property int $jenis_kendaraan
 * @property int $surat_keterangan
 * @property int $koperasi_id
 */
class CustomSimpanPinjam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%custom_simpan_pinjam}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanah_bangunan', 'jenis_kendaraan', 'surat_keterangan', 'tanah', 'koperasi_id'], 'required'],
            [['tanah_bangunan', 'jenis_kendaraan', 'surat_keterangan', 'tanah', 'koperasi_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'simpan_pinjam_id' => 'Simpan Pinjam ID',
            'tanah_bangunan' => 'Tanah Bangunan',
            'jenis_kendaraan' => 'Jenis Kendaraan',
            'surat_keterangan' => 'Surat Keterangan',
            'koperasi_id' => 'Koperasi ID',
        ];
    }
}
