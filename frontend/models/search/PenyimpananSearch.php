<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Penyimpanan;

/**
 * PenyimpananSearch represents the model behind the search form of `frontend\models\Penyimpanan`.
 */
class PenyimpananSearch extends Penyimpanan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['penyimpanan_id', 'koperasi_id', 'anggota_id', 'tipe_penyimpanan_id', 'petugas_id'], 'integer'],
            [['tgl_transaksi'], 'safe'],
            [['nilai_transaksi'], 'number'],
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
        $query = Penyimpanan::find();

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
            'penyimpanan_id' => $this->penyimpanan_id,
            'koperasi_id' => $this->koperasi_id,
            'anggota_id' => $this->anggota_id,
            'tgl_transaksi' => $this->tgl_transaksi,
            'tipe_penyimpanan_id' => $this->tipe_penyimpanan_id,
            'nilai_transaksi' => $this->nilai_transaksi,
            'petugas_id' => $this->petugas_id,
        ]);

        return $dataProvider;
    }
}
