<?php
/**
 * Created by IntelliJ IDEA.
 * User: luwei
 * Date: 2017/10/2
 * Time: 13:43
 */

namespace app\modules\admin\controllers;


class Controller extends \app\controllers\Controller
{
    public $layout = 'main';

    public $auth_info;

    public function init()
    {
        $this->enableCsrfValidation=false;
        parent::init();
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), []);
    }
}