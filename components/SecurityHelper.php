<?php

namespace app\components;

use yii\base\Model;
use Yii;
class SecurityHelper extends Model
{
    public static function hashData($id)
    {
        if(!empty($id)){
            return Yii::$app->security->hashData($id,Yii::$app->params['secretKey']);
        }else{
            die;
        }
    }

    public static function validateData($id)
    {
        if(!empty($id)){
            return Yii::$app->security->validateData($id,Yii::$app->params['secretKey']);
        }else{
            die;
        }
    }
}