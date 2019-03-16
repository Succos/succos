<?php

namespace app\modules\mch\controllers;

use app\models\Store;
use app\models\WechatApp;
use app\modules\mch\models\MchMenu;
use yii\helpers\VarDumper;

class Controller extends \app\controllers\Controller
{
    public $layout = 'main';
    public $store;
    /* @var Wechat $wechat */
    public $wechat;
    public $wechat_app;

    /** @var bool $is_admin 是否是总管理员账号登录 */
    public $is_admin = false;
    /** @var bool $is_we7 是否是微擎环境 */
    public $is_we7 = false;
    /** @var bool $is_ind 是否是独立版 */
    public $is_ind = false;
    /** @var bool $is_we7_offline 是否是微擎线下版（本地开发） */
    public $is_we7_offline = false;
    public $platform = null;
    public $we7_user_auth = null;
    public $ind_user_auth = null;
    public $version;

    public function init()
    {
        parent::init();
        $this->enableCsrfValidation=false;
        $this->store = Store::findOne([
            'id' => \Yii::$app->session->get('store_id'),

        ]);
        $this->wechat_app=WechatApp::findOne(['id'=>$this->store->wechat_app_id]);

    }
    public function getMenuList(){
        $menu_list=new MchMenu;
        $res=$menu_list->getList();
        return $res;
    }


}
