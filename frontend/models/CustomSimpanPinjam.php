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
            [['bunga_penyimpanan', 'bunga_peminjaman_mingguan', 'bunga_peminjaman_bulanan',
                'mingguan', 'bulanan', 'tanah', 'bangunan', 
                'jenis_kendaraan', 'surat_keterangan', 
                'koperasi_id'], 'required'],
            
            [['mingguan', 'bulanan', 'tanah', 'bangunan', 'jenis_kendaraan', 'surat_keterangan', 'koperasi_id'], 'integer'],
            [['bunga_penyimpanan', 'bunga_peminjaman_mingguan', 'bunga_peminjaman_bulanan'], 'double']
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
            'jenis_kendaraan' => 'Kendaraan',
            'surat_keterangan' => 'Surat Keterangan',
            'koperasi_id' => 'Koperasi ID',
        ];
    }
}
