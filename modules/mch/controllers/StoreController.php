<?php

namespace app\modules\mch\controllers;

use app\models\Model;
use app\models\WechatTemplateMessage;
use app\modules\mch\controllers\Controller;
use app\modules\mch\models\StoreSettingForm;
use app\modules\mch\models\WechatSettingForm;
use yii\helpers\VarDumper;

class StoreController extends Controller
{
    public function actionIndex()
    {
       if (\Yii::$app->request->isPost) {
        echo "15445";
         die();
       }
       return $this->render('index',[
           'store' => $this->store,
       ]);
    }
    public function actionSms(){


    }
    public function actionTplMsg(){
        $model = WechatTemplateMessage::findOne(['store_id' => $this->store->id]);
        if (!$model) {
            $model = new WechatTemplateMessage();
            $model->store_id = $this->store->id;
        }
        if (\Yii::$app->request->isPost) {
            $model->attributes = \Yii::$app->request->post();
            $model->store_id = $this->store->id;
            if ($model->save()) {
                return $this->renderJson([
                    'code' => 0,
                    'msg' => '保存成功',
                ]);
            } else {
                return $this->renderJson((new Model())->getModelError($model));
            }
        } else {
            return $this->render('tpl-msg', [
                'model' => $model,
            ]);
        }
    }

    public function actionSetting()
    {
        if (\Yii::$app->request->post()){
            $form=new StoreSettingForm();
            $form->attributes=\Yii::$app->request->post();
            $form->store_id=$this->store->id;
            $this->renderJson($form->save());
        }
        return $this->render('setting');

    }

    public function actionWechatSetting(){
        if (\Yii::$app->request->isPost){
            $form=new WechatSettingForm();
            $form->attributes=\Yii::$app->request->post();
            $form->model=$this->wechat_app;
            return $this->renderJson($form->save());
        };
        return $this->render('wechat-seting');
    }
    public  function actionPapa(){
        $curlobj=curl_init();
        curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,true);
        $data='usercode=lijunhua&password=Qq123321...';
        date_default_timezone_set('PRC');
        curl_setopt($curlobj,CURLOPT_COOKIESESSION,TRUE);
        curl_setopt($curlobj,CURLOPT_COOKIEFILE,"cookiefile");
        curl_setopt($curlobj,CURLOPT_COOKIEJAR,'cookiefile');
        curl_setopt($curlobj,CURLOPT_COOKIE,"WEBID=a3b71a0f-62a1-47c8-94d6-dbd293c516cb");
        curl_setopt($curlobj,CURLOPT_HEADER,0);
        curl_setopt($curlobj,CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($curlobj,CURLOPT_URL,"https://shuabao.yeahka.com/agent-new/agent/trade/info/list");
        curl_setopt($curlobj,CURLOPT_POST,1);
        curl_setopt($curlobj,CURLOPT_HTTPHEADER,array("Content-type:text/xml"));
        $output=curl_exec($curlobj);
        $output=json_decode($output);
        curl_close($curlobj);
        header('Content-Type: text/html; charset=utf-8');
        $output=$output->data;
        return $this->render('papa',[
            'output'=>$output
        ]);

    }




}
