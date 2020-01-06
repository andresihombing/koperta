<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Peminjaman;

/**
 * PeminjamanSearch represents the model behind the search form of `frontend\models\Peminjaman`.
 */
class PeminjamanSearch extends Peminjaman
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['peminjaman_id', 'anggota_id', 'koperasi_id', 'nilai_permohonan', 'angsuran_kredit', 'total_angsuran', 'pendapatan_sampingan', 'total_pendapatan_kotor', 'biaya_pengeluaran', 'pendapatan_bersih', 'jaminan_bangunan_id', 'jaminan_kendaraan_id', 'jaminan_tanah_id', 'banyak_pinjaman', 'plafon_terakhir'], 'integer'],
            [['tujuan_kredit', 'pekerjaan_utama', 'pekerjaan_sampingan', 'biaya_lainnya', 'tanggal_pelunasan'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Peminjaman::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'peminjaman_id' => $this->peminjaman_id,
            'anggota_id' => $this->anggota_id,
            'koperasi_id' => $this->koperasi_id,
            'nilai_permohonan' => $this->nilai_permohonan,
            'angsuran_kredit' => $this->angsuran_kredit,
            'total_angsuran' => $this->total_angsuran,
            'pendapatan_sampingan' => $this->pendapatan_sampingan,
            'total_pendapatan_kotor' => $this->total_pendapatan_kotor,
            'biaya_pengeluaran' => $this->biaya_pengeluaran,
            'pendapatan_bersih' => $this->pendapatan_bersih,
            'jaminan_bangunan_id' => $this->jaminan_bangunan_id,
            'jaminan_kendaraan_id' => $this->jaminan_kendaraan_id,
            'jaminan_tanah_id' => $this->jaminan_tanah_id,
            'banyak_pinjaman' => $this->banyak_pinjaman,
            'plafon_terakhir' => $this->plafon_terakhir,
            'tanggal_pelunasan' => $this->tanggal_pelunasan,
        ]);

        $query->andFilterWhere(['like', 'tujuan_kredit', $this->tujuan_kredit])
            ->andFilterWhere(['like', 'pekerjaan_utama', $this->pekerjaan_utama])
            ->andFilterWhere(['like', 'pekerjaan_sampingan', $this->pekerjaan_sampingan])
            ->andFilterWhere(['like', 'biaya_lainnya', $this->biaya_lainnya]);

        return $dataProvider;
    }
}
