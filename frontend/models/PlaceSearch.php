<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Place;

/**
 * PlaceSearch represents the model behind the search form of `frontend\models\Place`.
 */
class PlaceSearch extends Place
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_country'], 'integer'],
            [['place_id', 'lat', 'lng', 'country_code'], 'safe'],
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
        $query = Place::find();

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
            'id' => $this->id,
            'is_country' => $this->is_country,
        ]);

        $query->andFilterWhere(['like', 'place_id', $this->place_id])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'lng', $this->lng])
            ->andFilterWhere(['like', 'country_code', $this->country_code]);

        return $dataProvider;
    }
}
