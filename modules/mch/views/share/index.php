<?php
use yii\widgets\LinkPager;
$urlManager = Yii::$app->urlManager;
$this->title = '分销商列表';
$this->params['active_nav_group'] = 5;
$status = Yii::$app->request->get('status');
if ($status === '' || $status === null || $status == -1)
    $status = -1;
?>
<div class="panel mb-3" id="app">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        <div class="mb-3 clearfix">
            <div class="p-4 bg-shaixuan">
                <form method="get">
                    <?php $_s = ['keyword'] ?>
                    <?php foreach ($_GET as $_gi => $_gv):if (in_array($_gi, $_s)) continue; ?>
                        <input type="hidden" name="<?= $_gi ?>" value="<?= $_gv ?>">
                    <?php endforeach; ?>
                    <div flex="dir:left">
                        <div>
                            <div class="input-group">
                                <input class="form-control"
                                       placeholder="姓名/微信昵称"
                                       name="keyword"
                                       autocomplete="off"
                                       value="<?= isset($_GET['keyword']) ? trim($_GET['keyword']) : null ?>">
                                <span class="input-group-btn">
                                        <button class="btn btn-primary">筛选</button>
                                    </span>
                                <span style="padding-left:20px" class="input-group-btn">
                                        <a class="btn btn-primary batch" href="javascript:void(0)" data-url="<?= $urlManager->createUrl(['mch/share/batch']) ?>" data-content="是否批量通过" data-type="0">批量通过</a>
                                    </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="mb-4">
            <ul class="nav nav-tabs status">
                <li class="nav-item">
                    <a class="status-item nav-link <?= $status == -1 ? 'active' : null ?>"
                       href="<?= $urlManager->createUrl(['mch/share/index']) ?>">全部</a>
                </li>
                <li class="nav-item">
                    <a class="status-item nav-link <?= $status == 0 ? 'active' : null ?>"
                       href="<?= $urlManager->createUrl(['mch/share/index', 'status' => 0]) ?>">未审核<?= $count['count_1'] ? '(' . $count['count_1'] . ')' : "(0)" ?></a>
                </li>
                <li class="nav-item">
                    <a class="status-item nav-link <?= $status == 1 ? 'active' : null ?>"
                       href="<?= $urlManager->createUrl(['mch/share/index', 'status' => 1]) ?>">已审核<?= $count['count_2'] ? '(' . $count['count_2'] . ')' : "(0)" ?></a>
                </li>
            </ul>
        </div>
        <table class="table table-bordered bg-white">
            <tr>
                <td style="text-align: left;">
                    <label class="checkbox-label">
                        <input type="checkbox" class="goods-all">
                        <span class="label-icon"></span>
                        <span class="label-text">ID</span>
                    </label>
                </td>
                <td width="200px">微信信息</td>
                <td>
                    <div>姓名</div>
                    <div>手机号</div>
                </td>
                <td>
                    <div>累计佣金</div>
                    <div>打款佣金</div>
                </td>
                <td>下级分销商</td>
                <td>状态</td>
                <td>申请时间</td>
                <td>审核时间</td>
                <td>操作</td>
            </tr>
            <?php foreach ($list as $index => $value): ?>
                <tr>
                    <td class="nowrap" style="text-align: left;" data-toggle="tooltip"
                        data-placement="top" title="<?=$value['user_id']?>">
                        <label class="checkbox-label">
                            <input data-user_id="<?= $value['user_id'] ?>" type="checkbox"
                                   class="goods-one"
                                   value="<?= $value['id'] ?>">
                            <span class="label-icon"></span>
                            <span class="label-text"><?= $value['user_id'] ?></span>
                        </label>
                    </td>
                    <td data-toggle="tooltip" data-placement="top" title="<?= $value['nickname'] ?>">
                        <span
                            style="width: 150px;display:block;white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"><img
                                src="<?= $value['avatar_url'] ?>"
                                style="width: 30px;height: 30px;margin-right: 10px"><?= $value['nickname'] ?></span>
                    </td>
                    <td>
                        <div><?= $value['name'] ?></div>
                        <div><?= $value['mobile'] ?></div>
                    </td>
                    <td>
                        <div><?= $value['total_price'] ?></div>
                        <div><?= $value['price'] ?></div>
                    </td>
                    <td>
                        <?php if ($value['status'] == 1): ?>
                            <?php if ($setting->level == 0): ?>
                                <span>0</span>
                            <?php else: ?>
                                <?php if ($setting->level >= 1): ?>
                                    <div><a class="team" data-index="<?= $value['id'] ?>" data-level="1"
                                            href="javascript:" data-toggle="modal"
                                            data-target="#exampleModal"><?= $setting->first_name ? $setting->first_name : "一级" ?>
                                            ：<?= $value['first'] ?></a></div>
                                <?php endif; ?>
                                <?php if ($setting->level >= 2): ?>
                                    <div><a class="team" data-index="<?= $value['id'] ?>" data-level="2"
                                            href="javascript:" data-toggle="modal"
                                            data-target="#exampleModal"><?= $setting->second_name ? $setting->second_name : "二级" ?>
                                            ：<?= $value['second'] ?></a></div>
                                <?php endif; ?>
                                <?php if ($setting->level == 3): ?>
                                    <div><a class="team" data-index="<?= $value['id'] ?>" data-level="3"
                                            href="javascript:" data-toggle="modal"
                                            data-target="#exampleModal"><?= $setting->third_name ? $setting->third_name : "三级" ?>
                                            ：<?= $value['third'] ?></a></div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td><?= ($value['status'] == 0) ? "未审核" : (($value['status'] == 1) ? "通过" : "不通过") ?></td>
                    <td><?= date('Y-m-d H:i', $value['addtime']); ?></td>
                    <td><?= ($value['time'] != 0) ? date('Y-m-d H:i', $value['time']) : ""; ?></td>
                    <td>
                        <div class="btn btn-group" role="group">
                            <a class="btn btn-secondary dropdown-toggle" href="javascript:" type="button"
                               id="dropdownMenuButton"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                操作
                            </a>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
                                <?php if ($value['status'] == 0): ?>
                                    <a class="dropdown-item del" href="javascript:"
                                       data-url="<?= $urlManager->createUrl(['mch/share/status', 'status' => 1, 'id' => $value['id']]) ?>"
                                       data-content="是否审核通过？">审核通过</a>
                                    <a class="dropdown-item del" href="javascript:"
                                       data-url="<?= $urlManager->createUrl(['mch/share/status', 'status' => 2, 'id' => $value['id']]) ?>"
                                       data-content="是否审核不通过？">不通过</a>
                                <?php elseif ($value['status'] == 1): ?>
                                    <a class="dropdown-item"
                                       href="<?= $urlManager->createUrl(['mch/order/index', 'keyword' => $value['nickname'],'keyword_1'=>2]) ?>">会员订单</a>
                                    <a class="dropdown-item"
                                       href="<?= $urlManager->createUrl(['mch/share/order', 'parent_id' => $value['user_id']]) ?>">分销订单</a>
                                    <a class="dropdown-item"
                                       href="<?= $urlManager->createUrl(['mch/share/cash', 'id' => $value['id']]) ?>">提现明细</a>
                                    <a class="dropdown-item del" href="javascript:"
                                       data-url="<?= $urlManager->createUrl(['mch/share/del', 'id' => $value['id']]) ?>"
                                       data-content="是否删除分销商？">删除分销商</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="text-center">
            <?= LinkPager::widget(['pagination' => $pagination,]) ?>
            <div class="text-muted"><?= $count['total'] ? $count['total'] : 0 ?>条数据</div>
        </div>

        <!-- 下线 -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">下线情况</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered ">
                            <tr>
                                <td>序号</td>
                                <td>分销商</td>
                                <td>下线等级</td>
                                <td>昵称</td>
                                <td>加入时间</td>
                            </tr>
                            <tr v-for="(item,index) in list">
                                <td>{{index+1}}</td>
                                <td>{{name}}</td>
                                <td>{{level}}</td>
                                <td>{{item.nickname}}</td>
                                <td>{{item.time}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->render('/layouts/ss'); ?>
<script>
    var app = new Vue({
        el: "#app",
        data: {
            team:<?=$team?>,
            list: [],
            name: "",
            level: ""
        }
    });
    $(document).on('click', '.team', function () {
        var index = $(this).data('index');
        var level = $(this).data('level');
        var team = app.team;
        app.list = [];
        app.name = '';
        app.level = '';
        $.each(team, function (i) {
            if (team[i].id == index) {
                if (level == 1) {
                    app.list = team[i].firstChildren;
                    app.level = "<?=$setting->first_name?>" || "一级";
                }
                if (level == 2) {
                    app.list = team[i].secondChildren;
                    app.level = "<?=$setting->second_name?>" || "二级";
                }
                if (level == 3) {
                    app.list = team[i].thirdChildren;
                    app.level = "<?=$setting->third_name?>" || "三级";
                }
                app.name = team[i].nickname;
            }
        })
    });
</script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script>
    $(document).on('click', '.del', function () {
        var a = $(this);
        $.myConfirm({
            content: a.data('content'),
            confirm: function () {
                $.ajax({
                    url: a.data('url'),
                    type: 'get',
                    dataType: 'json',
                    success: function (res) {
                        if (res.code == 0) {
                            window.location.reload();
                        } else {
                            $.myAlert({
                                title: res.msg
                            });
                        }
                    }
                });
            }
        });
        return false;
    });

    $(document).on('click', '.goods-all', function () {
        var checked = $(this).prop('checked');
        $('.goods-one').prop('checked', checked);
        if (checked) {
            $('.batch').addClass('is_use');
        } else {
            $('.batch').removeClass('is_use');
        }
    });
    $(document).on('click', '.goods-one', function () {
        var checked = $(this).prop('checked');
        var all = $('.goods-one');
        var is_all = true;//只要有一个没选中，全选按钮就不选中
        var is_use = false;//只要有一个选中，批量按妞就可以使用
        all.each(function (i) {
            if ($(all[i]).prop('checked')) {
                is_use = true;
            } else {
                is_all = false;
            }
        });
        if (is_all) {
            $('.goods-all').prop('checked', true);
        } else {
            $('.goods-all').prop('checked', false);
        }
        if (is_use) {
            $('.batch').addClass('is_use');
        } else {
            $('.batch').removeClass('is_use');
        }
    });
    $(document).on('click', '.batch', function () {
        var all = $('.goods-one');
        var is_all = true;//只要有一个没选中，全选按钮就不选中
        all.each(function (i) {
            if ($(all[i]).prop('checked')) {
                is_all = false;
            }
        });
        if (is_all) {
            $.myAlert({
                content: "请先勾选商品"
            });
        }
    });
    $(document).on('click', '.is_use', function () {
        var a = $(this);
        var goods_group = [];
        var all = $('.goods-one');

        all.each(function (i) {
            if ($(all[i]).prop('checked')) {
                var goods = {};
                goods.id = $(all[i]).val();
                goods.user_id = $(all[i]).data('user_id');
                goods_group.push(goods);
            }
        });
        $.myConfirm({
            content: a.data('content'),
            confirm: function () {
                $.myLoading();
                $.ajax({
                    url: a.data('url'),
                    type: 'get',
                    dataType: 'json',
                    data: {
                        goods_group: goods_group,
                        type: a.data('type'),
                    },
                    success: function (res) {
                        if (res.code == 0) {
                            window.location.reload();
                        } else {

                        }
                    },
                    complete: function () {
                        $.myLoadingHide();
                    }
                });
            }
        })
    });
</script>
