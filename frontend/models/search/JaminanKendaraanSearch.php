<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JaminanKendaraan;

/**
 * JaminanKendaraanSearch represents the model behind the search form of `frontend\models\JaminanKendaraan`.
 */
class JaminanKendaraanSearch extends JaminanKendaraan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jaminan_kendaraan_id', 'nama_pemilik', 'no_polisi', 'tahun_pembuatan', 'nilai_harga'], 'integer'],
            [['merk', 'warna'], 'safe'],
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
        $query = JaminanKendaraan::find();

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
            'jaminan_kendaraan_id' => $this->jaminan_kendaraan_id,
            'nama_pemilik' => $this->nama_pemilik,
            'no_polisi' => $this->no_polisi,
            'tahun_pembuatan' => $this->tahun_pembuatan,
            'nilai_harga' => $this->nilai_harga,
        ]);

        $query->andFilterWhere(['like', 'merk', $this->merk])
            ->andFilterWhere(['like', 'warna', $this->warna]);

        return $dataProvider;
    }
}
