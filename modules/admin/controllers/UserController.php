<?php
namespace app\modules\admin\controllers;

use app\models\Admin;
use app\modules\admin\controllers\Controller;
use yii\data\Pagination;

class  UserController extends  Controller{

    public function actionMe(){

        return $this->render('me');

    }
    public function actionIndex(){
        $query=Admin::find()->where(['is_delete'=>0]);
        $count=$query->count();
        $pagination=new Pagination(['totalCount'=>$count,'pageSize' => 5]);

        $list = $query->limit($pagination->limit)->offset($pagination->offset)->orderBy('addtime DESC')->all();
        return $this->render('index',[
            'list'=>$list,
            'pagination'=>$pagination
        ]);
    }
    public function actionEdit(){
        
        return  $this->render('edit');
    }

}