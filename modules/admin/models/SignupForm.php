<?php
namespace  app\modules\admin\models;

use yii\base\Model;
use app\modules\admin\models\User;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $created_at;
    public $updated_at;

    public function rules()
    {
        return [
            [['username'], 'trim'],
            [['username', 'password','email'], 'required'],
            [['created_at', 'updated_at'], 'default', 'value' => date('Y-m-d H:i:s')],
        ];
    }

    /**
     * Signs user up.
     *
     * @return true|false 添加成功或者添加失败
     */
    public function signup()
    {
        if (!$this->validate()) {
            echo '3';
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->created_at = $this->created_at;
        $user->updated_at = $this->updated_at;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save(false);
    }
}