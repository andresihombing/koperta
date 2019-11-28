<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TipeKoperasi;

/**
 * TipeKoperasiSearch represents the model behind the search form of `frontend\models\TipeKoperasi`.
 */
class TipeKoperasiSearch extends TipeKoperasi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipe_koperasi_id'], 'integer'],
            [['tipe'], 'safe'],
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
        $query = TipeKoperasi::find();

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
            'tipe_koperasi_id' => $this->tipe_koperasi_id,
        ]);

        $query->andFilterWhere(['like', 'tipe', $this->tipe]);

        return $dataProvider;
    }
}
