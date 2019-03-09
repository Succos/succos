<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/7
 * Time: 21:55
 */
namespace  app\modules\mch\models;


use app\models\Model;

class  WechatSettingForm extends  Model{

    public $model;
    public $app_id;
    public $app_secret;
    public $mch_id;
    public $key;
    public $cert_pem;
    public $key_pem;
    public function rules()
    {
       return [
         [['app_id','app_secret','mch_id','key','cert_pem','key_pem'],'trim'],
           [['app_id','app_secret','mch_id','key','model'],'required'],
       ];
    }
    public function attributeLabels()
    {
       return [
         'app_id'=>'小程序appid',

           'app_secret'=>'小程序appsecret',
           'mch_id'=>'支付商户号',
           'key'=>'支付秘钥'
       ];
    }
    public function save(){

        if(!$this->validate()){
            return $this->getModelError();

        }
        $this->model->attributes=$this->attributes;
        if ($this->model->save()){
            return [
                'code'=>0,
                'msg'=>'保存成功'
            ];
        }
        return $this->getModelError($this->model);
    }
}