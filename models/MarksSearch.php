<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Marks;

/**
 * MarksSearch represents the model behind the search form of `app\models\Marks`.
 */
class MarksSearch extends Marks
{
    public $name; // Adjusted property name to match the attribute used for filtering

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rno', 'id', 'english', 'maths', 'hindi'], 'integer'],
            [['name'], 'safe'], // Adjusted attribute name here
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
        $query = Marks::find()->joinWith('student'); // Ensure to join the student table

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
            'rno' => $this->rno,
            'id' => $this->id,
            'english' => $this->english,
            'maths' => $this->maths,
            'hindi' => $this->hindi,
        ]);

        // Filter by student name
        $query->andFilterWhere(['like', 'student.name', $this->name]); // Adjusted property name here

        return $dataProvider;
    }
}
