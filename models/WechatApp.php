<?php

namespace app\models;

use Yii;

class WechatApp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wechat_app}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['acid', 'user_id', 'addtime', 'is_delete'], 'integer'],
            [['user_id', 'name', 'app_id', 'app_secret'], 'required'],
            [['cert_pem', 'key_pem'], 'string'],
            [['name', 'app_id', 'app_secret', 'desc', 'mch_id', 'key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'acid' => '微擎公众号id',
            'user_id' => 'User ID',
            'name' => 'Name',
            'app_id' => 'App ID',
            'app_secret' => 'App Secret',
            'desc' => 'Desc',
            'mch_id' => 'Mch ID',
            'key' => 'Key',
            'cert_pem' => 'Cert Pem',
            'key_pem' => 'Key Pem',
            'addtime' => 'Addtime',
            'is_delete' => 'Is Delete',
        ];
    }
}
