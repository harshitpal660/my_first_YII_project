<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Student;

/**
 * StudentSearch represents the model behind the search form of `app\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mobile'], 'integer'],
            [['name', 'category', 'email', 'gender'], 'safe'],
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

    public function getCategoryFilter()
    {
        // Fetch unique categories from the database
        $categories = Student::find()->select('category')->distinct()->column();

        // Create an associative array where keys and values are the same
        return array_combine($categories, $categories);
    }

    public function getGenderFilter()
    {
        // Fetch unique gender values from the database
        $genders = Student::find()->select('gender')->distinct()->column();

        // Convert the array into an associative array suitable for filter
        return array_combine($genders, $genders);
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
        $query = Student::find();

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
            'mobile' => $this->mobile,
            'createdAt' => $this->createdAt,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['=', 'gender', $this->gender])

        ;

        return $dataProvider;
    }
}
