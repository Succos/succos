<?php
namespace app\models;

class Option extends \yii\db\ActiveRecord{
    public static function tableName(){
        return '{{%option}}';
    }
    public static function get($name, $store_id = 0, $group = '', $default = null){
    $model=Option::findOne([
        'name'=>$name,
        'store_id'=>$store_id,
        'group'=>$group
    ]);
    if (!$model){
        return $default;
    }
    return unserialize($model->value);
    }

}