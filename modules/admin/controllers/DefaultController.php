<?php
/**
 * Created by IntelliJ IDEA.
 * User: luwei
 * Date: 2017/10/2
 * Time: 13:43
 */

namespace app\modules\admin\controllers;


use app\models\Admin;
use app\modules\admin\behaviors\LoginBehavior;
use yii\helpers\VarDumper;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'login' => [
                'class' => LoginBehavior::className(),
                'ignore' => ['admin'],
            ],
        ]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAlterPassword()
    {
        if (\Yii::$app->request->isPost) {
            /* @var  Admin $admin */
            $admin = \Yii::$app->admin->identity;
            $old_password = \Yii::$app->request->post('old_password');
            $new_password = \Yii::$app->request->post('new_password');
            if (!$old_password || !$new_password) {
                $this->renderJson([
                    'code' => 1,
                    'msg' => '原密码和新密码不能为空',
                ]);
            }
            if (!\Yii::$app->security->validatePassword($old_password, $admin->password)) {
                $this->renderJson([
                    'code' => 1,
                    'msg' => '原密码不正确',
                ]);
            }
            $admin->password = \Yii::$app->security->generatePasswordHash($new_password);
            if ($admin->save()) {
                \Yii::$app->admin->logout();
                $this->renderJson([
                    'code' => 0,
                    'msg' => '修改成功',
                ]);
            } else {
                $this->renderJson([
                    'code' => 0,
                    'msg' => '修改失败',
                ]);
            }
        }
    }
}