<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $name
 * @property string|null $category
 * @property int $mobile
 * @property string|null $email
 * @property string $createdAt
 * @property string $gender
 * @property string|null $url
 *
 * @property Marks[] $marks
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'mobile', 'gender'], 'required'],
            [['mobile'], 'integer'],
            [['createdAt'], 'safe'],
            [['name', 'category'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 40],
            [['gender'], 'string', 'max' => 10],
            [['url'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'category' => Yii::t('app', 'Category'),
            'mobile' => Yii::t('app', 'Mobile'),
            'email' => Yii::t('app', 'Email'),
            'createdAt' => Yii::t('app', 'Created At'),
            'gender' => Yii::t('app', 'Gender'),
            'url' => Yii::t('app', 'Url'),
        ];
    }

    /**
     * Gets query for [[Marks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarks()
    {
        return $this->hasMany(Marks::class, ['id' => 'id']);
    }

}
