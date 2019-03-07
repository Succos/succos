<?php

/**
 * Created by IntelliJ IDEA.
 * User: luwei
 * Date: 2017/6/8
 * Time: 23:40
 */

namespace app\controllers;

use app\models\Order;
use app\models\Store;
use app\models\UploadConfig;
use app\models\UploadForm;
use app\models\User;
use yii\db\Query;

set_time_limit(0);

class UploadController extends Controller
{
    /* @var Store $store */
    public $store;

    /* @var UploadConfig $upload_config */
    public $upload_config;

    public function behaviors()
    {
        $store_id = \Yii::$app->session->get('store_id');
        if ($store_id) {
            $this->store = Store::findOne($store_id);
            $this->upload_config = UploadConfig::findOne(['store_id' => 0, 'is_delete' => 0]);
        }
        $this->enableCsrfValidation = false;
        return parent::behaviors();
    }

    public function actionFile($name = null)
    {
        $form = new UploadForm();
        $form->upload_config = $this->upload_config;
        $form->store = $this->store;
        return $this->renderJson($form->saveImage($name));
    }
}
