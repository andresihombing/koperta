<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Koperasi;

/**
 * KoperasiSearch represents the model behind the search form of `frontend\models\Koperasi`.
 */
class KoperasiSearch extends Koperasi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['koperasi_id', 'tipe_koperasi_id'], 'integer'],
            [['name', 'tanggal_berdiri', 'alamat', 'deskripsi', 'kode_pos', 'provinsi', 'kabupaten', 'kecamatan'], 'safe'],
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
        $query = Koperasi::find();

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
            'koperasi_id' => $this->koperasi_id,
            'tanggal_berdiri' => $this->tanggal_berdiri,
            'tipe_koperasi_id' => $this->tipe_koperasi_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'kode_pos', $this->kode_pos])
            ->andFilterWhere(['like', 'provinsi', $this->provinsi])
            ->andFilterWhere(['like', 'kabupaten', $this->kabupaten])
            ->andFilterWhere(['like', 'kecamatan', $this->kecamatan]);

        return $dataProvider;
    }
}
