<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%anggota}}".
 *
 * @property int $anggota_id
 * @property int $koperasi_id
 * @property string $name
 * @property string $dob
 * @property int $no_ktp
 * @property string $alamat_lengkap
 * @property string $status
 * @property string $penjamin
 * @property int $perkawinan_ke
 * @property int $jumlah_anak
 */
class Anggota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%anggota}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['koperasi_id', 'name', 'dob', 'no_ktp', 'alamat_lengkap', 'status', 'penjamin', 'perkawinan_ke', 'jumlah_anak'], 'required'],
            [['koperasi_id', 'no_ktp', 'perkawinan_ke', 'jumlah_anak'], 'integer'],
            [['dob'], 'safe'],
            [['name', 'alamat_lengkap'], 'string', 'max' => 500],
            [['status', 'penjamin'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'anggota_id' => 'Anggota ID',
            'koperasi_id' => 'Koperasi ID',
            'name' => 'Name',
            'dob' => 'Dob',
            'no_ktp' => 'No Ktp',
            'alamat_lengkap' => 'Alamat Lengkap',
            'status' => 'Status',
            'penjamin' => 'Penjamin',
            'perkawinan_ke' => 'Perkawinan Ke',
            'jumlah_anak' => 'Jumlah Anak',
        ];
    }
}
