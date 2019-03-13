<?php


namespace app\modules\mch\models;


use luweiss\wechat\Wechat;

class Model extends \app\models\Model
{

    public function getWechat()
    {
        return empty(\Yii::$app->controller->wechat) ? null : \Yii::$app->controller->wechat;
    }
}