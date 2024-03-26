<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marks".
 *
 * @property int $rno
 * @property int|null $id
 * @property int|null $english
 * @property int|null $maths
 * @property int|null $hindi
 */
class Marks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marks';
    }

    /**
     * {@inheritdoc}
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'id']);
    }
    public function rules()
    {
        return [
            [['id', 'english', 'maths', 'hindi'], 'integer'],
            [['english', 'maths', 'hindi'],'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rno' => Yii::t('app', 'Rno'),
            'id' => Yii::t('app', 'ID'),
            'english' => Yii::t('app', 'English'),
            'maths' => Yii::t('app', 'Maths'),
            'hindi' => Yii::t('app', 'Hindi'),
        ];
    }
}
