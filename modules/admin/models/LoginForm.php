<?php
namespace app\modules\admin\models;

use app\models\Admin;
use app\models\Option;
class LoginForm extends Model{
   public $username;
   public $password;
   public $captcha_code;
   public function rules(){
       return  [
         [['username'],'trim'],
         [['username','password'],'required'],
       ];
   }
   public function attributeLabels(){
       return [
           'username'=>'用户名',
           'password'=>'密码',

       ];
   }
   public function login(){
       if (!$this->validate())
           return $this->getModelError();
       $admin = Admin::findOne([
           'username' => $this->username,
           'is_delete' => 0,
       ]);

       if (!$admin)
           return [
               'code' => 1,
               'msg' => '用户名或密码错误',
           ];

       $user_ip = \Yii::$app->request->userIP;
       $cache_key = md5('ADMIN_LOGIN_ERROR_COUNT_' . date('Ymd') . '_' . $user_ip . '_' . $this->username);
       $login_error_count = \Yii::$app->cache->get($cache_key);
       $max_login_error_count = Option::get('max_login_error', 0, 'admin');
       if ($login_error_count && $max_login_error_count && $max_login_error_count > 0) {
           if ($login_error_count >= $max_login_error_count) {
               return [
                   'code' => 1,
                   'msg' => '您的密码输入错误次数过多，今日已被禁止登录',
               ];
           }
       }

       if (!\Yii::$app->security->validatePassword($this->password, $admin->password)) {
           $login_error_count = $login_error_count ? $login_error_count : 0;
           \Yii::$app->cache->set($cache_key, ($login_error_count + 1), 86400);
           return [
               'code' => 1,
               'msg' => '用户名或密码错误',
           ];
       }
       \Yii::$app->admin->login($admin);
       return [
           'code' => 0,
           'msg' => '登录成功',
       ];
   }
}