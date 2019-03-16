<?php

namespace app\modules\admin\controllers;

use app\modules\admin\behaviors\LoginBehavior;

class IndexController extends Controller
{


    public function actionIndex()
    {
        return $this->render('index');
    }
}
