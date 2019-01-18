<?php
namespace app\modules\admin\controllers;
use app\modules\admin\controllers\Controller;
use app\modules\admin\models\AppEditForm;
use app\models\Store;
use yii\data\Pagination;
class AppController extends Controller
{
        public  function actionIndex(){
            $query = Store::find()->where([
                'admin_id' => \Yii::$app->admin->id,
                'is_delete' => 0,
            ]);
            $count = $query->count();
            $pagination = new Pagination(['totalCount' => $count]);
            $list = $query->limit($pagination->limit)->offset($pagination->offset)->orderBy('id DESC')->all();
            return $this->render('index', [
                'list' => $list,
                'pagination' => $pagination,
                'app_max_count' => \Yii::$app->admin->identity->app_max_count,
                'app_count' => Store::find()->where([
                    'admin_id' => \Yii::$app->admin->id,
                    'is_delete' => 0,
                ])->count(),
            ]);
        }
        public function actionEdit(){
            $form=new AppEditForm();
            $form->attributes=\Yii::$app->request->post();
            $form->admin_id=\Yii::$app->admin->id;
            return  $this->renderJson($form->save());
        }
        public function actionEntry($id){

           $condition=[
               'id'=>$id,
               'admin_id'=>\Yii::$app->admin->id,
               'is_delete'=>0
           ];
           if (\Yii::$app->admin->id==1){
               unset($condition['admin_id']);
           }
           $store=Store::findOne($condition);
           if (!$store){
               \Yii::$app->response->redirect(\Yii::$app->request->referrer)->send();
               return;
           }
           \Yii::$app->session->set('store_id',$store->id);
           \Yii::$app->response->redirect(\Yii::$app->urlManager->createUrl(['mch/store/index']))->send();

        }


}
