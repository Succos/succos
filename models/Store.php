<?php

namespace app\models;

use Yii;
class Store extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%store}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_id', 'is_delete', 'acid', 'user_id', 'wechat_platform_id', 'wechat_app_id', 'show_customer_service', 'delivery_time', 'after_sale_time', 'use_wechat_platform_pay', 'cat_style','cut_thread', 'cat_goods_cols', 'over_day', 'is_offline', 'is_coupon', 'cat_goods_count', 'send_type', 'nav_count', 'integral','dial', 'purchase_frame'], 'integer'],
            [['user_id', 'name'], 'required'],
            [['home_page_module', 'address', 'member_content', 'integration','dial_pic'], 'string'],
            [['name', 'order_send_tpl', 'contact_tel', 'copyright', 'kdniao_mch_id', 'kdniao_api_key'], 'string', 'max' => 255],
            [['copyright_pic_url', 'copyright_url'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_id' => 'Admin ID',
            'is_delete' => 'Is Delete',
            'acid' => '微擎公众号id',
            'user_id' => '用户id',
            'wechat_platform_id' => '微信公众号id',
            'wechat_app_id' => '微信小程序id',
            'name' => '店铺名称',
            'order_send_tpl' => '发货通知模板消息id',
            'contact_tel' => '联系电话',
            'show_customer_service' => '是否显示在线客服：0=否，1=是',
            'dial'=>'一键拨号  0关闭，1开启',
            'dial_pic'=>'一键拨号图标',
            'copyright' => 'Copyright',
            'copyright_pic_url' => 'Copyright Pic Url',
            'copyright_url' => '版权的超链接',
            'delivery_time' => '收货时间',
            'after_sale_time' => '售后时间',
            'use_wechat_platform_pay' => '是否使用公众号支付：0=否，1=是',
            'kdniao_mch_id' => '快递鸟商户号',
            'kdniao_api_key' => '快递鸟api key',
            'cat_style' => '分类页面样式：1=无侧栏，2=有侧栏',
            'cut_thread' => '商品分类分隔符：0=关闭，1=开启',
            'home_page_module' => '首页模块布局',
            'address' => '店铺地址',
            'cat_goods_cols' => '首页分类商品列数',
            'over_day' => '未支付订单超时时间',
            'is_offline' => '是否开启自提',
            'is_coupon' => '是否开启优惠券',
            'cat_goods_count' => '首页分类的商品个数',
            'send_type' => '发货方式：0=快递或自提，1=仅快递，2=仅自提',
            'member_content' => '会员等级说明',
            'nav_count' => '首页导航栏个数 0--4个 1--5个',
            'integral' => '抵扣积分',
            'integration' => '积分使用规则',
            'purchase_frame' => '购买记录',
        ];
    }
}
