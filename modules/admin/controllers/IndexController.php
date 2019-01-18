<?php

namespace app\modules\admin\controllers;

use app\modules\admin\behaviors\LoginBehavior;
/**
 * Default controller for the `admin` module
 */
class IndexController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function actionIndex()
    {
        return $this->render('index');
    }
}
