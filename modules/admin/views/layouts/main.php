<?php


use app\models\Option;

$version = '1.8.3';
$url_manager = Yii::$app->urlManager;
$active_nav_link = isset($this->params['active_nav_link']) ? $this->params['active_nav_link'] : null;

$logo = Option::get('logo', 0, 'admin', null);
$logo = $logo ? $logo : Yii::$app->request->baseUrl . '/statics/admin/images/logo.png';

$copyright = Option::get('copyright', 0, 'admin');
$copyright = $copyright ? $copyright : '©2017 <a href="http://www.zjhejiang.com" target="_blank">禾匠信息科技</a>';

?>
<?php $this->beginPage();?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title><?= !empty($this->title) ? $this->title . ' - ' : null ?><?= Option::get('name', 0, 'admin', '禾匠信息科技') ?></title>
    <link rel="stylesheet"
          href="<?= Yii::$app->request->baseUrl ?>/statics/admin/css/bootstrap.min.css?v=<?= $version ?>">
    <link rel="stylesheet" href="https://at.alicdn.com/t/font_353057_pv3mzjwdrk162yb9.css">
    <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/statics/admin/css/common.css?v=<?= $version ?>">
    <script>var _csrf = "<?=Yii::$app->request->csrfToken?>";</script>
    <script src="<?= Yii::$app->request->baseUrl ?>/statics/admin/js/jquery.min.js?v=<?= $version ?>"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/statics/admin/js/popper.min.js?v=<?= $version ?>"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/statics/admin/js/bootstrap.min.js?v=<?= $version ?>"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/statics/admin/js/plupload.full.min.js?v=<?= $version ?>"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/statics/admin/js/common.js?v=<?= $version ?>"></script>
</head>
<body>
<nav class="navbar navbar-expand-md  navbar-light bg-white" style="border-bottom: 1px solid #e3e3e3">
    <div class="container">
        <a class="navbar-brand p-0" href="<?= Yii::$app->request->baseUrl ?>">
            <img src="<?= $logo ?>" style="height: 30px;display: inline-block">
        </a>

        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                   href="http://example.com"
                   id="dropdown01"
                   data-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false">
                    <i class="iconfont icon-person" style="font-size: 1.5rem;line-height: 1;vertical-align: middle"></i>
                    <span><?= Yii::$app->admin->identity->username ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
                    <a class="dropdown-item alter-password" href="javascript:" data-toggle="modal"
                       data-target="#alterPassword">修改密码</a>
                    <a class="dropdown-item" href="<?= $url_manager->createUrl(['admin/passport/logout']) ?>">注销</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<main role="main" class="container">
    <div class="row">
        <div class="col main-l">
            <div class="main-l-content">
                <ul class="nav flex-column">
                    <li class="nav-item nav-group">
                        <span class="nav-title">账户管理</span>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link <?= $active_nav_link == 'admin/user/me' ? 'active' : null ?>"
                                   href="<?= $url_manager->createUrl(['admin/user/me']) ?>">
                                    <i class="iconfont icon-person"></i>
                                    <span>我的账户</span>
                                </a>
                            </li>
                            <?php if (Yii::$app->admin->id == 1): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?= $active_nav_link == 'admin/user/index' ? 'active' : null ?>"
                                       href="<?= $url_manager->createUrl(['admin/user/index']) ?>">
                                        <i class="iconfont icon-liebiao"></i>
                                        <span>账户列表</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= $active_nav_link == 'admin/user/edit' ? 'active' : null ?>"
                                       href="<?= $url_manager->createUrl(['admin/user/edit']) ?>">
                                        <i class="iconfont icon-add1"></i>
                                        <span>新增子账户</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="nav-item nav-group">
                        <span class="nav-title">小程序商城</span>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link <?= $active_nav_link == 'admin/app/index' ? 'active' : null ?>"
                                   href="<?= $url_manager->createUrl(['admin/app/index']) ?>">
                                    <i class="iconfont icon-xiaochengxu4"></i>
                                    <span>我的小程序商城</span>
                                </a>
                            </li>
                            <?php if (Yii::$app->admin->id == 1): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?= $active_nav_link == 'admin/app/other-app' ? 'active' : null ?>"
                                       href="<?= $url_manager->createUrl(['admin/app/other-app']) ?>">
                                        <i class="iconfont icon-xiaochengxu4"></i>
                                        <span>子账户的商城</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php if (Yii::$app->admin->id == 1): ?>
                        <li class="nav-item nav-group">
                            <span class="nav-title">设置</span>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link <?= $active_nav_link == 'admin/setting/index' ? 'active' : null ?>"
                                       href="<?= $url_manager->createUrl(['admin/setting/index']) ?>">
                                        <i class="iconfont icon-settings"></i>
                                        <span>系统设置</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="col main-r">
            <div class="main-r-content">
                <?= $content ?>
            </div>
        </div>
    </div>

</main><!-- /.container -->
<footer>
    <div class="text-center copyright p-4"><?= $copyright ?></div>
</footer>

<!-- Modal -->
<div class="modal fade" id="alterPassword" data-backdrop="static" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">修改密码</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="auto-submit-form alter-password-form">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">原密码</label>
                        <div class="col-sm-8">
                            <input type="password" name="old_password" class="form-control"
                                   placeholder="您当前的密码">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">新密码</label>
                        <div class="col-sm-8">
                            <input type="password" name="new_password" class="form-control new-password-1"
                                   placeholder="要设置的新密码">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">确认密码</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control new-password-2" placeholder="再次输入新密码">
                        </div>
                    </div>
                    <div class="form-error alert alert-danger" style="display: none">aaaaaa</div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary alter-password-submit">提交</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", ".alter-password-submit", function () {
        var new_password_1 = $(".alter-password-form .new-password-1").val();
        var new_password_2 = $(".alter-password-form .new-password-2").val();
        var error = $(".alter-password-form .form-error");
        var btn = $(this);
        if (new_password_1 !== new_password_2) {
            error.html("新密码与确认密码不一致，请重新输入").show();
            return false;
        }
        error.hide();
        btn.btnLoading();
        $.ajax({
            url: "<?=$url_manager->createUrl(['admin/default/alter-password'])?>",
            type: "post",
            dataType: "json",
            data: $(".alter-password-form").serialize(),
            success: function (res) {
                if (res.code == 0) {
                    $("#alterPassword").modal("hide");
                    $.myAlert({
                        content: res.msg,
                        confirm: function () {
                            location.reload();
                        }
                    });
                } else {
                    error.html(res.msg).show();
                    btn.btnReset();
                }
            }
        });
    });
</script>
</body>
</html>
<?php $this->endPage() ?>