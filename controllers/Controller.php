<?php
namespace app\controllers;

use yii\web\Response;

class Controller extends \yii\web\Controller
{

    public function renderJson($data = [])
    {
        if (is_array($data)) {
            if (!isset($data['code']))
                $data['code'] = 0;
            if (!isset($data['msg']))
                $data['msg'] = '';
            if (!isset($data['data']))
                $data['data'] = (object)null;
            $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        if (is_object($data)) {
            if (!isset($data->code))
                $data->code = 0;
            if (!isset($data->msg))
                $data->msg = '';
            if (!isset($data->data))
                $data->data = (object)null;
            $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        header("Content-type: application/json; charset=" . \Yii::$app->charset);
        \Yii::$app->response->format = Response::FORMAT_JSON;
        echo $data;
        \Yii::$app->end();
        return null;
    }

}