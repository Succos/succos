<?php
namespace  app\modules\api\models;

use yii\base\Model;

class LoginForm extends Model{
    public $wechat_app;
    public $code;
    public $user_info;
    public $encrypted_data;
    public $iv;
    public $signature;
    public $store_id;
    public function rules()
    {
        return [
            [['wechat_app', 'code', 'user_info', 'encrypted_data', 'iv', 'signature',], 'required'],
        ];
    }
public function Login(){

    return $this->getOpenid($this->code);

}

public  function getOpenid($code){
    $api="https://api.weixin.qq.com/sns/jscode2session?appid={$this->wechat_app->app_id}&secret={$this->wechat_app->app_secret}&js_code={$code}&grant_type=authorization_code";
    $curlobj=curl_init();
    curl_setopt($curlobj,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($curlobj,CURLOPT_URL,$api);
    curl_setopt($curlobj,CURLOPT_POST,0);
    $output=curl_exec($curlobj);
    $output=json_decode($output,false);
   return $output;
}
}