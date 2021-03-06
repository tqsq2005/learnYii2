<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PopulacMapuser;

/**
 * MapuserSearch represents the model behind the search form about `app\models\PopulacMapuser`.
 */
class MapuserSearch extends PopulacMapuser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mapuser', 'pass', 'upmapuser', 'nickname', 'email', 'tel', 'auth_key', 'access_token', 'created_time', 'updated_time'], 'safe'],
            [['rights', 'id', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = PopulacMapuser::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'rights' => $this->rights,
            'id' => $this->id,
            'status' => $this->status,
            'created_time' => $this->created_time,
            'updated_time' => $this->updated_time,
        ]);

        $query->andFilterWhere(['like', 'mapuser', $this->mapuser])
            ->andFilterWhere(['like', 'pass', $this->pass])
            ->andFilterWhere(['like', 'upmapuser', $this->upmapuser])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'access_token', $this->access_token]);

        return $dataProvider;
    }
}
