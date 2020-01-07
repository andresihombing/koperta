<?php
namespace frontend\models;
use Yii;
/**
 * This is the model class for table "{{%peminjaman}}".
 *
 * @property int $peminjaman_id
 * @property int $anggota_id
 * @property int $koperasi_id
 * @property string $tujuan_kredit
 * @property int $nilai_permohonan
 * @property int $angsuran_kredit
 * @property int $total_angsuran
 * @property string $pekerjaan_utama
 * @property string $pekerjaan_sampingan
 * @property int $pendapatan_sampingan
 * @property int $total_pendapatan_kotor
 * @property string $biaya_lainnya
 * @property int $biaya_pengeluaran
 * @property int $pendapatan_bersih
 * @property int $jaminan_tanah_bangunan_id
 * @property int $jaminan_kendaraan_id
 * @property int $jaminan_sk_id
 * @property int $banyak_pinjaman
 * @property int $plafon_terakhir
 * @property string $tanggal_pelunasan
 */
class Peminjaman extends \yii\db\ActiveRecord
{
    //jaminan kendaraan
    public $nama_pemilik_kendaraan;
    public $no_polisi_kendaraan;
    public $merk_kendaraan;
    public $tahun_pembuatan_kendaraan;
    public $warna_kendaraan;
    public $nilai_harga_kendaraan;
    //jaminan tanah bagunan
    public $nama_pemilik_bangunan;
    public $no_bangunan;
    public $status_hak_milik_bangunan;
    public $luas_bangunan;
    //jaminan tanah
    public $nama_pemilik_tanah;
    public $no_tanah;
    public $status_hak_milik_tanah;
    public $luas_tanah;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%peminjaman}}';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['anggota_id', 'koperasi_id', 'tujuan_kredit', 'pekerjaan_utama', 'pekerjaan_sampingan', 'pendapatan_sampingan', 'total_pendapatan_kotor', 'biaya_lainnya', 'biaya_pengeluaran', 'pendapatan_bersih','banyak_pinjaman', 'plafon_terakhir', 'tanggal_pelunasan', 'tipe_angsuran', 'lama_angsuran'], 'required'],
            [['anggota_id', 'koperasi_id'   , 'pendapatan_sampingan', 'total_pendapatan_kotor', 'biaya_pengeluaran', 'pendapatan_bersih', 'jaminan_tanah_bangunan_id', 'jaminan_kendaraan_id', 'jaminan_sk_id', 'jaminan_tanah_id' ,'banyak_pinjaman', 'plafon_terakhir'], 'integer'],
            [['tujuan_kredit', 'nilai_permohonan', 'angsuran_kredit', 'total_angsuran'], 'string'],
            [['tanggal_pelunasan', 'nama_pemilik_kendaraan', 'no_polisi_kendaraan', 'merk_kendaraan', 'tahun_pembuatan_kendaraan', 'warna_kendaraan', 'nilai_harga_kendaraan', 'nama_pemilik_bangunan', 'no_bangunan', 'status_hak_milik_bangunan', 'luas_bangunan', 'nama_pemilik_tanah', 'no_tanah', 'status_hak_milik_tanah', 'luas_tanah'], 'safe'],
            [['pekerjaan_utama', 'pekerjaan_sampingan'], 'string', 'max' => 250],
            [['biaya_lainnya'], 'string', 'max' => 500],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'peminjaman_id' => 'Peminjaman ID',
            'anggota_id' => 'Anggota ID',
            'koperasi_id' => 'Koperasi ID',
            'tujuan_kredit' => 'Tujuan Kredit',
            'nilai_permohonan' => 'Nilai Permohonan',
            'angsuran_kredit' => 'Angsuran Kredit',
            'total_angsuran' => 'Total Angsuran',
            'pekerjaan_utama' => 'Pekerjaan Utama',
            'pekerjaan_sampingan' => 'Pekerjaan Sampingan',
            'pendapatan_sampingan' => 'Pendapatan Sampingan',
            'total_pendapatan_kotor' => 'Total Pendapatan Kotor',
            'biaya_lainnya' => 'Biaya Lainnya',
            'biaya_pengeluaran' => 'Biaya Pengeluaran',
            'pendapatan_bersih' => 'Pendapatan Bersih',
            'jaminan_tanah_bangunan_id' => 'Jaminan Tanah Bangunan ID',
            'jaminan_kendaraan_id' => 'Jaminan Kendaraan ID',
            'jaminan_sk_id' => 'Jaminan Sk ID',
            'banyak_pinjaman' => 'Banyak Pinjaman',
            'plafon_terakhir' => 'Plafon Terakhir',
            'tanggal_pelunasan' => 'Tanggal Pelunasan',
        ];
    }
    public function getAnggota()
    {
        return $this->hasOne(Anggota::className(), ['anggota_id' => 'anggota_id']);
    }
    public function getKoperasi()
    {
        return $this->hasOne(Koperasi::className(), ['koperasi_id' => 'koperasi_id']);
    } 

    public function getJaminanKendaraan(){
        return $this->hasOne(JaminanKendaraan::className(), ['jaminan_kendaraan_id' => 'jaminan_kendaraan_id']);
    }

    public function getJaminanBangunan(){
        return $this->hasOne(JaminanBangunan::className(), ['jaminan_bangunan_id' => 'jaminan_bangunan_id']);
    }

    public function getJaminanTanah(){
        return $this->hasOne(JaminanTanah::className(), ['jaminan_tanah_id' => 'jaminan_tanah_id']);
    }
}
