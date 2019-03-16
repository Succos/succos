<?php


namespace app\modules\admin\behaviors;


use app\models\Admin;
use yii\base\Behavior;
use yii\helpers\VarDumper;
use yii\web\Controller;

class LoginBehavior extends Behavior
{
    public $only;
    public $ignore;

    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'beforeAction',
        ];
    }

    /**
     * @param \yii\base\ActionEvent $e
     */
    public function beforeAction($e)
    {
        if (!\Yii::$app->admin->isGuest) {
            return $this->checkExpire();
        }
        if (is_array($this->ignore) && in_array($e->action->id, $this->ignore))
            return true;
        if (is_array($this->only) && !in_array($e->action->id, $this->only))
            return true;
        if (\Yii::$app->admin->isGuest){
            echo 222;
        }
        if (\Yii::$app->request->isAjax) {
            $e->action->controller->renderJson([
                'code' => -1,
                'msg' => '请先登录',
            ]);
        } else {
            \Yii::$app->response->redirect(\Yii::$app->urlManager->createUrl([
                'admin/passport/login',
                'return_url' => \Yii::$app->request->absoluteUrl,
            ]))->send();
        }
        \Yii::$app->end();
        return false;
    }

    private function checkExpire()
    {
        /** @var Admin $admin */
        $admin = \Yii::$app->admin->identity;
        if ($admin->expire_time == 0 || time() < $admin->expire_time)
            return true;
        echo \Yii::$app->view->render('/account-expire');
        \Yii::$app->end();
        return false;
    }
}