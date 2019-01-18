<?php
namespace app\modules\admin\models;


use app\models\Admin;
use app\models\Store;
use app\models\WechatApp;
class AppEditForm extends Model{
    public $name;
    public $admin_id;

    public function rules()
    {
        return [
            [['name'], 'trim'],
            [['name'], 'required'],
            [['name'], 'string', 'length' => [0, 200]],
        ];
    }
    public function save(){
        if (!$this->validate()){
            return $this->getModelError();
        }
        $admin=Admin::findOne(['id'=>$this->admin_id]);
        $store_count=Store::find()->where([
            'admin_id'=>$this->admin_id,
            'is_delete'=>0
        ])->count();
        if ($store_count && $admin->app_max_count && $store_count >= $admin->app_max_count){
            return[
                'code'=>1,
                'msg'=>'可创建的小程序数量已达上限'
            ];
        }
        $wechat_app = new WechatApp();
        $wechat_app->acid = 0;
        $wechat_app->user_id = 0;
        $wechat_app->name = $this->name;
        $wechat_app->app_id = '0';
        $wechat_app->app_secret = '0';
        if (!$wechat_app->save()) {
            return $this->getModelError($wechat_app);
        }
        $store = new Store();
        $store->admin_id = $this->admin_id;
        $store->is_delete = 0;
        $store->name = $this->name;
        $store->acid = 0;
        $store->user_id = 0;
        $store->wechat_app_id = $wechat_app->id;
        if ($store->save())
            return [
                'code' => 0,
                'msg' => '保存成功',
            ];
        return $this->getModelError($store);
    }
}