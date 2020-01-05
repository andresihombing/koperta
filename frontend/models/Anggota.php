<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "anggota".
 *
 * @property int $anggota_id
 * @property int $koperasi_id
 * @property string $name
 * @property string $dob
 * @property int $no_ktp
 * @property string $alamat_lengkap
 * @property string $status
 * @property int $perkawinan_ke
 * @property int $jumlah_anak
 *
 * @property Anggota $koperasi
 * @property Anggota[] $anggotas
 * @property Peminjaman[] $peminjamen
 */
class Anggota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anggota';
    }

    public $email;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['koperasi_id', 'user_id', 'name','surname', 'dob', 'no_ktp', 'alamat_lengkap', 'status', 'perkawinan_ke', 'jumlah_anak'], 'required'],
            [['koperasi_id', 'no_ktp', 'perkawinan_ke', 'jumlah_anak'], 'integer'],
            [['dob'], 'safe'],
            [['name', 'alamat_lengkap'], 'string', 'max' => 500],
            [['status', 'email'], 'string', 'max' => 100],
            [['kk', 'ktp'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
            [['koperasi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Anggota::className(), 'targetAttribute' => ['koperasi_id' => 'anggota_id']],
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
            'dob' => 'Tanggal Lahir',
            'no_ktp' => 'Nomor KTP',
            'email' => 'Email',
            'alamat_lengkap' => 'Alamat Lengkap',
            'status' => 'Status',
            'perkawinan_ke' => 'Perkawinan Ke',
            'jumlah_anak' => 'Jumlah Anak',
            'kk' => 'File KK',
            'ktp' => 'File KTP',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKoperasi()
    {
        return $this->hasOne(Koperasi::className(), ['koperasi_id' => 'koperasi_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['koperasi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotas()
    {
        return $this->hasMany(Anggota::className(), ['koperasi_id' => 'anggota_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeminjamen()
    {
        return $this->hasMany(Peminjaman::className(), ['anggota_id' => 'anggota_id']);
    }
}
