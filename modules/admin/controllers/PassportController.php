<?php


namespace app\modules\admin\controllers;


use app\modules\admin\models\LoginForm;
use yii\helpers\VarDumper;

class PassportController extends Controller
{
    public $layout = 'passport';

    public function behaviors()
    {
        return array_merge(parent::behaviors(), []);
    }

    public function actionLogin()
    {
        if (\Yii::$app->request->isPost) {
            $form = new LoginForm();
            $form->attributes = \Yii::$app->request->post();
         return $this->renderJson($form->login());
        } else {
            return $this->render('login');
        }
    }

    public function actionLogout()
    {
        \Yii::$app->admin->logout();
        \Yii::$app->response->redirect(\Yii::$app->urlManager->createUrl(['admin']))->send();
    }
}