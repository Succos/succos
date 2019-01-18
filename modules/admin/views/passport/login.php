<?php



use app\models\Option;

$this->title = '账户登录';
$logo = Option::get('logo', 0, 'admin', null);
$logo = $logo ? $logo : Yii::$app->request->baseUrl . '/statics/admin/images/logo.png';

$copyright = Option::get('copyright', 0, 'admin');
$copyright = $copyright ? $copyright : '©2017 <a href="http://www.zjhejiang.com" target="_blank">禾匠信息科技</a>';
?>
<style>
    html {
        position: relative;
        min-height: 100%;
        height: 100%;
    }

    body {
        padding-bottom: 70px;
        height: 100%;
        overflow: hidden;
    }

    .main {
        background-image: url("<?=Yii::$app->request->baseUrl?>/statics/admin/images/passport-bg.jpg");
        background-size: cover;
        background-position: center;
        height: 100%;
    }

    form {
        max-width: 320px;
        margin: 0 auto;
    }

    form.card {
        border: none;
        background: rgba(255, 255, 255, .85);
        padding: 16px 10px;
    }

    form h1 {
        font-size: 20px;
        font-weight: normal;
        text-align: center;
        margin: 0 0 32px 0;
    }

    form .custom-checkbox .custom-control-indicator {
        border: 1px solid #ccc;
        background-color: #eee;
    }

    form .custom-control-input:checked ~ .custom-control-indicator {
        border-color: transparent;
    }

    .header {
        height: 50px;
        background: rgba(255, 255, 255, .5);
        margin-bottom: 120px;
    }

    .header a {
        display: inline-block;
        height: 50px;
        padding: 8px 30px;
    }

    .logo {
        display: inline-block;
        height: 100%;
    }

    .footer {
        position: absolute;
        height: 70px;
        background: #fff;
        bottom: 0;
        left: 0;
        width: 100%;
    }

    .copyright {
        padding: 24px 0;
    }
</style>
<div class="main">
    <div class="header">
        <a href="<?= Yii::$app->request->baseUrl ?>">
            <img class="logo" src="<?= $logo ?>">
        </a>
    </div>
    <form method="post" class="auto-submit-form card" return="<?= Yii::$app->request->get('return_url') ?>">
        <div class="card-body">
            <h1>登录管理后台</h1>
            <input class="form-control mb-3" name="username" placeholder="请输入用户名">
            <input class="form-control mb-3" name="password" placeholder="请输入密码" type="password">
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">记住我，以后自动登录</span>
            </label>
            <button class="btn btn-block btn-primary submit-btn">登录</button>
        </div>
    </form>
</div>
<div class="footer">
    <div class="text-center copyright"><?= $copyright ?></div>
</div>