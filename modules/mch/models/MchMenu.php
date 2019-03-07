<?php
/**
 * Created by IntelliJ IDEA.
 * User: luwei
 * Date: 2017/12/27
 * Time: 10:44
 */

namespace app\modules\mch\models;


use app\models\Option;
use yii\helpers\VarDumper;

class MchMenu
{
    public $platform;
    public $user_auth;
    public $is_admin;
    public $offline;

    public function getList()
    {
        $menu_list = [
            [
                'name' => '商城管理',
                'route' => 'mch/store/wechat-setting',
                'icon' => 'icon-setup',
                'list' => [
                    [
                        'name' => '系统设置',
                        'route' => 'mch/store/wechat-setting',
                        'list' => [
                            [
                                'name' => '微信配置',
                                'route' => 'www.baidu.com',
                            ],
                            [
                                'name' => '商城设置',
                                'route' => 'mch/store/setting',
                            ],
                            [
                                'name' => '模板消息',
                                'route' => 'mch/store/tpl-msg',
                            ],
                            [
                                'name' => '短信通知',
                                'route' => 'mch/store/sms',
                            ],
                            [
                                'name' => '邮件通知',
                                'route' => 'mch/store/mail',
                            ],
                            [
                                'name' => '运费规则',
                                'route' => 'mch/store/postage-rules',
                                'sub' => [
                                    'mch/store/postage-rules-edit'
                                ],
                            ],
                            [
                                'name' => '包邮规则',
                                'route' => 'mch/store/free-delivery-rules',
                                'sub' => [
                                    'mch/store/free-delivery-rules-edit'
                                ],
                            ],
                            [
                                'name' => '快递单打印',
                                'route' => 'mch/store/express',
                                'sub' => [
                                    'mch/store/express-edit',
                                ],
                            ],
                            [
                                'name' => '小票打印',
                                'route' => 'mch/printer/list',
                                'sub' => [
                                    'mch/printer/setting',
                                    'mch/printer/edit',
                                ],
                            ],
//                            [
//                                'name' => '模板',
//                                'route' => 'mch/test/tpl',
//                            ],
                        ],
                    ],
                    [
                        'name' => '小程序设置',
                        'route' => 'mch/store/slide',
                        'list' => [
                            [
                                'name' => '轮播图',
                                'route' => 'mch/store/slide',
                                'sub' => [
                                    'mch/store/slide-edit',
                                ],
                            ],
                            [
                                'name' => '导航图标',
                                'route' => 'mch/store/home-nav',
                                'sub' => [
                                    'mch/store/home-nav-edit',
                                ],
                            ],
                            [
                                'name' => '图片魔方',
                                'route' => 'mch/store/home-block',
                                'sub' => [
                                    'mch/store/home-block-edit',
                                ],
                            ],
                            [
                                'name' => '导航栏',
                                'route' => 'mch/store/navbar',
                            ],
                            [
                                'name' => '首页布局',
                                'route' => 'mch/store/home-page',
                            ],
                            [
                                'name' => '用户中心',
                                'route' => 'mch/store/user-center',
                            ],
                            [
                                'name' => '下单表单',
                                'route' => 'mch/store/form',
                            ],
                            [
                                'name' => '小程序发布',
                                'route' => 'mch/store/wxapp',
                            ],
                            [
                                'name' => '小程序页面',
                                'route' => 'mch/store/wxapp-pages',
                            ],
                        ],
                    ],
                    [
                        'admin' => true,
                        'name' => '上传设置',
                        'route' => 'mch/store/upload',
                    ],
                    [
                        'admin' => true,
                        'we7' => true,
                        'name' => '权限管理',
                        'route' => 'mch/we7/auth',
                    ],
                    [
                        'admin' => true,
                        //'we7'=>true,
                        'name' => '版权管理',
                        'route' => 'mch/we7/copyright-list',
                    ],
                    [
                        'id' => 'copyright',
                        //'we7'=>true,
                        'name' => '版权设置',
                        'route' => 'mch/we7/copyright',
                    ],
                    [
                        'admin' => true,
                        'name' => '补丁',
                        'route' => 'mch/patch/index',
                    ],
                    [
                        'admin' => true,
                        'name' => '缓存',
                        'route' => 'mch/cache/index',
                    ],
                ],
            ],
            [
                'name' => '商品管理',
                'route' => 'mch/goods/goods',
                'icon' => 'icon-service',
                'list' => [
                    [
                        'name' => '商品管理',
                        'route' => 'mch/goods/goods',
                        'sub' => [
                            'mch/goods/goods-edit',
                        ],
                    ],
                    [
                        'name' => '分类',
                        'route' => 'mch/store/cat',
                        'sub' => [
                            'mch/store/cat-edit',
                        ],
                    ],
                ],
            ],
            [
                'name' => '订单管理',
                'route' => 'mch/order/index',
                'icon' => 'icon-activity',
                'list' => [
                    [
                        'name' => '订单列表',
                        'route' => 'mch/order/index',
                        'sub' => [
                            'mch/order/detail'
                        ]
                    ],
                    [
                        'name' => '自提订单',
                        'route' => 'mch/order/offline',
                    ],
                    [
                        'name' => '售后订单',
                        'route' => 'mch/order/refund',
                    ],
                    [
                        'name' => '评价管理',
                        'route' => 'mch/comment/index',
                        'sub' => [
                            'mch/comment/reply',
                            'mch/comment/edit',
                        ]
                    ],
                ],
            ],
            [
                'name' => '用户管理',
                'route' => 'mch/user/index',
                'icon' => 'icon-people',
                'list' => [
                    [
                        'name' => '用户列表',
                        'route' => 'mch/user/index',
                        'sub' => [
                            'mch/user/card',
                            'mch/user/coupon',
                            'mch/user/rechange-log',
                            'mch/user/edit',
                        ],
                    ],
                    [
                        'name' => '核销员',
                        'route' => 'mch/user/clerk',
                    ],
                    [
                        'name' => '会员等级',
                        'route' => 'mch/user/level',
                        'sub' => [
                            'mch/user/level-edit',
                        ]
                    ],
                    [
                        'name' => '余额充值记录',
                        'route' => 'mch/user/recharge',
                    ],
                ],
            ],
            [
                'id' => 'share',
                'name' => '分销中心',
                'route' => 'mch/share/index',
                'icon' => 'icon-jiegou',
                'list' => [
                    [
                        'name' => '分销商',
                        'route' => 'mch/share/index',
                    ],
                    [
                        'name' => '分销订单',
                        'route' => 'mch/share/order',
                    ],
                    [
                        'name' => '分销提现',
                        'route' => 'mch/share/cash',
                    ],
                    [
                        'name' => '分销设置',
                        'route' => 'mch/share/basic',
                        'list' => [
                            [
                                'name' => '基础设置',
                                'route' => 'mch/share/basic',
                                'sub' => [
                                    'mch/share/qrcode'
                                ]
                            ],
                            [
                                'name' => '佣金设置',
                                'route' => 'mch/share/setting'
                            ],
                            [
                                'name' => '自定义设置',
                                'route' => 'mch/share/custom'
                            ],
                        ]
                    ],
                ],
            ],
            [
                'name' => '内容管理',
                'route' => 'mch/article/index',
                'icon' => 'icon-barrage',
                'list' => [
                    [
                        'name' => '文章',
                        'route' => 'mch/article/index',
                        'sub' => [
                            'mch/article/edit',
                        ],
                    ],
                    [
                        'id' => 'topic',
                        'name' => '专题分类',
                        'route' => 'mch/topic-type/index',
                        'sub' => [
                            'mch/topic-type/edit',
                        ],
                    ],
                    [
                        'id' => 'topic',
                        'name' => '专题',
                        'route' => 'mch/topic/index',
                        'sub' => [
                            'mch/topic/edit',
                        ],
                    ],
                    [
                        'id' => 'video',
                        'name' => '视频',
                        'route' => 'mch/store/video',
                        'sub' => [
                            'mch/store/video-edit',
                        ],
                    ],
                    [
                        'name' => '门店',
                        'route' => 'mch/store/shop',
                        'sub' => [
                            'mch/store/shop-edit',
                        ],
                    ],
                ],
            ],
            [
                'name' => '营销管理',
                'route' => 'mch/coupon/index',
                'icon' => 'icon-coupons',
                'list' => [
                    [
                        'id' => 'coupon',
                        'name' => '优惠券',
                        'route' => 'mch/coupon/index',
                        'sub' => [
                            'mch/coupon/send',
                            'mch/coupon/edit',
                        ],
                        'list' => [
                            [
                                'name' => '优惠券管理',
                                'route' => 'mch/coupon/index'
                            ],
                            [
                                'name' => '自动发放设置',
                                'route' => 'mch/coupon/auto-send',
                                'sub' => [
                                    'mch/coupon/auto-send-edit'
                                ]
                            ]
                        ]
                    ],
                    [
                        'name' => '卡券',
                        'route' => 'mch/card/index',
                        'sub' => [
                            'mch/card/edit',
                        ],
                    ],
                    [
                        'name' => '充值',
                        'route' => 'mch/recharge/index',
                        'sub' => [
                            'mch/recharge/edit',
                            'mch/recharge/setting',
                        ],
                    ],
                ],
            ],
            [
                'name' => '应用专区',
                'route' => 'mch/store/index',
                'icon' => 'icon-pintu-m',
                'list' => [
                    [
                        'id' => 'miaosha',
                        'name' => '整点秒杀',
                        'route' => 'mch/miaosha/index',
                        'list' => [
                            [
                                'name' => '开放时间',
                                'route' => 'mch/miaosha/index',
                            ],
                            [
                                'name' => '秒杀设置',
                                'route' => 'mch/miaosha/setting',

                            ],
                            [
                                'name' => '商品管理',
                                'route' => 'mch/miaosha/goods/index',
                                'sub' => [
                                    'mch/miaosha/goods/edit',
                                ],
                            ],
                            [

                                'name' => '商品设置',
                                'route' => 'mch/miaosha/goods',
                                'sub' => [
                                    'mch/miaosha/goods-edit',
                                    'mch/miaosha/goods-detail',
                                    'mch/miaosha/calendar',
                                ],
                            ],
                            [
                                'name' => '订单列表',
                                'route' => 'mch/miaosha/order/index',
                            ],
                            [
                                'name' => '自提订单',
                                'route' => 'mch/miaosha/order/offline',
                            ],
                            [
                                'name' => '售后订单',
                                'route' => 'mch/miaosha/order/refund',
                            ],
                            [
                                'name' => '评价管理',
                                'route' => 'mch/miaosha/comment/index',
                            ],
                        ],
                    ],
                    [
                        'id' => 'pintuan',
                        'name' => '拼团管理',
                        'route' => 'mch/group/goods/index',
                        'list' => [
                            [
                                'name' => '拼团设置',
                                'route' => 'mch/group/setting/index',
                            ],
                            [
                                'name' => '商品管理',
                                'route' => 'mch/group/goods/index',
                                'sub' => [
                                    'mch/group/goods/goods-edit',
                                    'mch/group/goods/goods-attr'
                                ]
                            ],
                            [
                                'name' => '商品分类',
                                'route' => 'mch/group/goods/cat',
                                'sub' => [
                                    'mch/group/goods/cat-edit'
                                ]
                            ],
                            [
                                'name' => '订单管理',
                                'route' => 'mch/group/order/index',
                            ],
                            [
                                'name' => '售后订单',
                                'route' => 'mch/group/order/refund',
                            ],
                            [
                                'name' => '拼团管理',
                                'route' => 'mch/group/order/group',
                                'sub' => [
                                    'mch/group/order/group-list'
                                ]
                            ],
                            [
                                'name' => '机器人管理',
                                'route' => 'mch/group/robot/index',
                                'sub' => [
                                    'mch/group/robot/edit'
                                ]
                            ],
                            [
                                'name' => '轮播图',
                                'route' => 'mch/group/pt/banner',
                                'sub' => [
                                    'mch/group/pt/slide-edit'
                                ]
                            ],
                            [
                                'name' => '模板消息',
                                'route' => 'mch/group/notice/setting',
                            ],
                            [
                                'name' => '拼团规则',
                                'route' => 'mch/group/article/edit',
                            ],
                            [
                                'name' => '评论管理',
                                'route' => 'mch/group/comment/index',
                            ],
                            [
                                'name' => '广告设置',
                                'route' => 'mch/group/ad/setting',
                            ],
                            [
                                'name' => '数据统计',
                                'route' => 'mch/group/data/goods',
                                'sub' => [
                                    'mch/group/data/user'
                                ]
                            ],
                        ],
                    ],
                    [
                        'id' => 'book',
                        'name' => '预约管理',
                        'route' => 'mch/book/goods/index',
                        'list' => [
                            [
                                'name' => '商品管理',
                                'route' => 'mch/book/goods/index',
                                'sub' => [
                                    'mch/book/goods/goods-edit'
                                ]
                            ],
                            [
                                'name' => '商品分类',
                                'route' => 'mch/book/goods/cat',
                                'sub' => [
                                    'mch/book/goods/cat-edit'
                                ]
                            ],
                            [
                                'name' => '订单管理',
                                'route' => 'mch/book/order/index',
                            ],
                            [
                                'name' => '基础设置',
                                'route' => 'mch/book/index/setting',
                            ],
                            [
                                'name' => '模板消息',
                                'route' => 'mch/book/notice/setting',
                            ],
                            [
                                'name' => '评论管理',
                                'route' => 'mch/book/comment/index',
                            ],
                        ],
                    ],
                    [
                        'id' => 'fxhb',
                        'name' => '裂变拆红包',
                        'route' => 'mch/fxhb/index/setting',
                        'list' => [
                            [
                                'name' => '红包设置',
                                'route' => 'mch/fxhb/index/setting',
                            ],
                            [
                                'name' => '红包记录',
                                'route' => 'mch/fxhb/index/list',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'admin'=>true,
                'name' => '教程管理',
                'icon' => 'icon-manage',
                'route' => 'mch/handle/index',
                'list'=>[
                    [
                        'name' => '操作教程',
                        'route' => 'mch/handle/index',
                    ],
                    [
                        'admin'=>true,
                        'name' => '教程设置',
                        'route' => 'mch/handle/setting',
                    ],
                ]
            ],


        ];
        return $menu_list;

    }

    public function resetList($list)
    {
        foreach ($list as $i => $item) {

            if (isset($item['admin']) && $item['admin'] && !$this->is_admin) {
                unset($list[$i]);
                continue;
            }
            if (isset($item['we7']) && $item['we7'] && $this->platform != 'we7') {
                unset($list[$i]);
                continue;
            }
            if (isset($item['id']) && $this->user_auth !== null && !in_array($item['id'], $this->user_auth)) {
                unset($list[$i]);
                continue;
            }
            if (isset($item['offline']) && $this->offline !== true) {
                unset($list[$i]);
                continue;
            }
            if (isset($item['list']) && is_array($item['list'])) {

                $list[$i]['list'] = $this->resetList($item['list']);
            }
        }
        $list = array_values($list);
        return $list;
    }

}