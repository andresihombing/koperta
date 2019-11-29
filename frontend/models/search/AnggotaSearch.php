<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Anggota;

/**
 * AnggotaSearch represents the model behind the search form of `frontend\models\Anggota`.
 */
class AnggotaSearch extends Anggota
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['anggota_id', 'koperasi_id', 'no_ktp', 'perkawinan_ke', 'jumlah_anak'], 'integer'],
            [['name', 'dob', 'alamat_lengkap', 'status'], 'safe'],
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
        $query = Anggota::find();

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
            'anggota_id' => $this->anggota_id,
            'koperasi_id' => $this->koperasi_id,
            'dob' => $this->dob,
            'no_ktp' => $this->no_ktp,
            'perkawinan_ke' => $this->perkawinan_ke,
            'jumlah_anak' => $this->jumlah_anak,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'alamat_lengkap', $this->alamat_lengkap])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
