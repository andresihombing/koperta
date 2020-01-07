<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cicilan_peminjaman".
 *
 * @property int $cicilan_peminjaman_id
 * @property int $peminjaman_id
 * @property string $tanggal_transaksi
 * @property int $angsuran_ke
 * @property string $keterangan
 * @property int $mutasi_pokok
 * @property int $mutasi_bunga
 * @property int $jumlah_angsuran
 * @property int $saldo_akhir
 *
 * @property Peminjaman $peminjaman
 */
class CicilanPeminjaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cicilan_peminjaman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['angsuran_ke', 'keterangan', 'mutasi_pokok', 'mutasi_bunga', 'jumlah_angsuran', 'saldo_akhir'], 'required'],
            [['peminjaman_id', 'angsuran_ke', 'mutasi_pokok', 'mutasi_bunga', 'jumlah_angsuran', 'saldo_akhir'], 'integer'],
            [['tanggal_transaksi', 'keterangan'], 'string', 'max' => 45],
            [['peminjaman_id'], 'exist', 'skipOnError' => true, 'targetClass' => Peminjaman::className(), 'targetAttribute' => ['peminjaman_id' => 'peminjaman_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cicilan_peminjaman_id' => 'Cicilan Peminjaman ID',
            'peminjaman_id' => 'Peminjaman ID',
            'tanggal_transaksi' => 'Tanggal Transaksi',
            'angsuran_ke' => 'Angsuran Ke',
            'keterangan' => 'Keterangan',
            'mutasi_pokok' => 'Mutasi Pokok',
            'mutasi_bunga' => 'Mutasi Bunga',
            'jumlah_angsuran' => 'Jumlah Angsuran',
            'saldo_akhir' => 'Saldo Akhir',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeminjaman()
    {
        return $this->hasOne(Peminjaman::className(), ['peminjaman_id' => 'peminjaman_id']);
    }
}
