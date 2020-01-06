<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JaminanTanah;

/**
 * JaminanTanahSearch represents the model behind the search form of `frontend\models\JaminanTanah`.
 */
class JaminanTanahSearch extends JaminanTanah
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jaminan_bangunan_id', 'no', 'luas'], 'integer'],
            [['nama_pemilik', 'status_hak_milik'], 'safe'],
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
        $query = JaminanTanah::find();

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
            'jaminan_bangunan_id' => $this->jaminan_bangunan_id,
            'no' => $this->no,
            'luas' => $this->luas,
        ]);

        $query->andFilterWhere(['like', 'nama_pemilik', $this->nama_pemilik])
            ->andFilterWhere(['like', 'status_hak_milik', $this->status_hak_milik]);

        return $dataProvider;
    }
}
