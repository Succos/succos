<?php

namespace app\modules\api\controllers;
use app\models\WechatApp;
use app\models\Store;

class  Controller extends \app\controllers\Controller{
    public $wechat_app;
    public $store_id;
    public $store;
    public function init()
    {
        $this->enableCsrfValidation = false;
        $this->store_id=\Yii::$app->request->get('store_id');
        if ($_acid && $_acid != -1) {
            $this->store = Store::findOne([
                'acid' => $_acid,
            ]);
        } else {
            $this->store = Store::findOne($this->store_id);
        }
        $this->wechat_app = WechatApp::findOne($this->store->wechat_app_id);
    }

}