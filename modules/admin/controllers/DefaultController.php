<?php

namespace app\modules\admin\controllers;
use Codeception\Module\Yii1;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionAlterPassword(){
        if (\Yii::$app->request->isPost){
            $admin=\Yii::$app->admin->identity;
        $old_password=\Yii::$app->request->post('old_password');
        $new_password=\Yii::$app->request->post('new_password');
        if (!$old_password||!$new_password){
            $this->renderJson([
               'code'=>1,
               'msg'=>'原密码和新密码不能为空'
            ]);
        }
        if (!\Yii::$app->security->validatePassword($old_password,$admin->password)){
            $this->renderJson([
                'code'=>1,
                'msg'=>'原密码不正确'
            ]);
        }
        $admin->password = \Yii::$app->security->generatePasswordHash($new_password);
        if ($admin->save()){
         \Yii::$app->admin->logout();
         $this->renderJson([
            'code'=>0,
            'msg'=>'密码修改成功'
         ]);
        };

        }


    }
}
