<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\modules\admin\models\SignupForm;
use Yii;

class LoginController extends Controller
{
    public function init(){
        $this->enableCsrfValidation = false;
    }



    public function actionLogin()
    {
        $this->layout=false;




        return $this->render('login');
    }
    public  function actionSign(){
        $this->layout=false;
        $form = new SignupForm();
        if(Yii::$app->request->post()){
            echo '1';
            $form->attributes = Yii::$app->request->post();
            $form->signup();
        }



        return $this->render('signup');
    }
    public function  actionTest(){
        $qq=Yii::$app->request->post();

        var_dump($qq);
    }
}
