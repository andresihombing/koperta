<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CicilanPeminjaman;

/**
 * CicilanPeminjamanSearch represents the model behind the search form of `frontend\models\CicilanPeminjaman`.
 */
class CicilanPeminjamanSearch extends CicilanPeminjaman
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cicilan_peminjaman_id', 'peminjaman_id', 'angsuran_ke', 'mutasi_pokok', 'mutasi_bunga', 'jumlah_angsuran', 'saldo_akhir'], 'integer'],
            [['tanggal_transaksi', 'keterangan'], 'safe'],
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
    public function search($params, $id)
    {
        $query = CicilanPeminjaman::find()->where(['peminjaman_id' => $id]);

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
            'cicilan_peminjaman_id' => $this->cicilan_peminjaman_id,
            'peminjaman_id' => $this->peminjaman_id,
            'angsuran_ke' => $this->angsuran_ke,
            'mutasi_pokok' => $this->mutasi_pokok,
            'mutasi_bunga' => $this->mutasi_bunga,
            'jumlah_angsuran' => $this->jumlah_angsuran,
            'saldo_akhir' => $this->saldo_akhir,
        ]);

        $query->andFilterWhere(['like', 'tanggal_transaksi', $this->tanggal_transaksi])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
