<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "penyimpanan".
 *
 * @property int $penyimpanan_id
 * @property int $koperasi_id
 * @property int $anggota_id
 * @property string $tgl_transaksi
 * @property int $tipe_penyimpanan_id
 * @property float $nilai_transaksi
 * @property int $petugas_id
 *
 * @property Anggota $anggota
 * @property Koperasi $koperasi
 * @property Petugas $petugas
 * @property TipePenyimpanan $tipePenyimpanan
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
            [['koperasi_id', 'anggota_id', 'tgl_transaksi', 'tipe_penyimpanan_id', 'nilai_transaksi', 'petugas_id'], 'required'],
            [['koperasi_id', 'anggota_id', 'tipe_penyimpanan_id', 'petugas_id'], 'integer'],
            [['tgl_transaksi'], 'safe'],
            [['nilai_transaksi'], 'number'],
            [['anggota_id'], 'exist', 'skipOnError' => true, 'targetClass' => Anggota::className(), 'targetAttribute' => ['anggota_id' => 'anggota_id']],
            [['koperasi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Koperasi::className(), 'targetAttribute' => ['koperasi_id' => 'koperasi_id']],
            [['petugas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Petugas::className(), 'targetAttribute' => ['petugas_id' => 'petugas_id']],
            [['tipe_penyimpanan_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipePenyimpanan::className(), 'targetAttribute' => ['tipe_penyimpanan_id' => 'tipe_penyimpanan_id']],
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
            'tgl_transaksi' => 'Tgl Transaksi',
            'tipe_penyimpanan_id' => 'Tipe Penyimpanan ID',
            'nilai_transaksi' => 'Nilai Transaksi',
            'petugas_id' => 'Petugas ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggota()
    {
        return $this->hasOne(Anggota::className(), ['anggota_id' => 'anggota_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKoperasi()
    {
        return $this->hasOne(Koperasi::className(), ['koperasi_id' => 'koperasi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetugas()
    {
        return $this->hasOne(Petugas::className(), ['petugas_id' => 'petugas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipePenyimpanan()
    {
        return $this->hasOne(TipePenyimpanan::className(), ['tipe_penyimpanan_id' => 'tipe_penyimpanan_id']);
    }
}
