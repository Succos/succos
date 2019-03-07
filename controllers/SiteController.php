<?php
/**
 * Created by IntelliJ IDEA.
 * User: luwei
 * Date: 2017/10/25
 * Time: 11:13
 */

namespace app\controllers;


class SiteController extends Controller
{
    public function actionIndex()
    {


            $this->redirect(\Yii::$app->urlManager->createUrl(['admin']))->send();

    }
}