<?php

namespace app\models;


class Model extends \yii\base\Model
{
    public function getModelError($model = null)
    {
        if (!$model)
            $model = $this;
        foreach ($model->errors as $errors)
            return [
                'code' => 1,
                'msg' => $errors[0],
            ];
    }
}