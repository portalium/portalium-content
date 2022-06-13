<?php

namespace portalium\content\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use portalium\content\models\Content;

/**
 * ContentSearch represents the model behind the search form of `portalium\content\models\Content`.
 */
class ContentSearch extends Content
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_content', 'id_user', 'id_category', 'status'], 'integer'],
            [['name', 'title', 'body', 'date_create', 'date_update'], 'safe'],
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
        $query = Content::find();

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
            'id_content' => $this->id_content,
            'id_user' => $this->id_user,
            'id_category' => $this->id_category,
            'status' => $this->status,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body]);

        return $dataProvider;
    }
}
