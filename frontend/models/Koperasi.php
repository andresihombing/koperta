<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%koperasi}}".
 *
 * @property int $koperasi_id
 * @property string $name
 * @property string $tanggal_berdiri
 * @property int $tipe_koperasi_id
 * @property string $alamat
 * @property string $deskripsi
 * @property string $kode_pos
 * @property string $provinsi
 * @property string $kabupaten
 * @property string $kecamatan
 */
class Koperasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%koperasi}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'tanggal_berdiri', 'tipe_koperasi_id', 'alamat', 'deskripsi', 'kode_pos', 'provinsi', 'kabupaten', 'kecamatan'], 'required'],
            [['tanggal_berdiri'], 'safe'],
            [['tipe_koperasi_id'], 'integer'],
            [['deskripsi'], 'string'],
            [['name', 'alamat', 'kode_pos', 'provinsi', 'kabupaten', 'kecamatan'], 'string', 'max' => 45],
            [['tipe_koperasi_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipeKoperasi::className(), 'targetAttribute' => ['tipe_koperasi_id' => 'tipe_koperasi_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'koperasi_id' => 'Koperasi ID',
            'name' => 'Name',
            'tanggal_berdiri' => 'Tanggal Berdiri',
            'tipe_koperasi_id' => 'Tipe Koperasi ID',
            'alamat' => 'Alamat',
            'deskripsi' => 'Deskripsi',
            'kode_pos' => 'Kode Pos',
            'provinsi' => 'Provinsi',
            'kabupaten' => 'Kabupaten',
            'kecamatan' => 'Kecamatan',
        ];
    }
}
