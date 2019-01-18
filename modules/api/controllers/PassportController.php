<?php

namespace app\modules\api\controllers;

use app\modules\api\controllers\Controller;
use app\modules\api\models\LoginForm;
use yii\helpers\VarDumper;

class PassportController extends Controller
{

    public function actionLogin()

    {
        $form=new LoginForm();
        $form->attributes=\Yii::$app->request->post();
        $form->wechat_app=$this->wechat_app;
        $form->store_id=$this->store_id;
        return $this->renderJson($form->login());
    }
}
