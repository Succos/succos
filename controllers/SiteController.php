<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\controllers\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionPase()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://vv.video.qq.com/getinfo?vids=m0180m1dsua&platform=101001&charge=0&otype=json&defn=shd");
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果把这行注释掉的话，就会直接输出
        $tencent_video_info=curl_exec($ch);
        curl_close($ch);

        //
        $tencent_video_json = substr(explode('QZOutputJson=',$tencent_video_info)[1],0,-1); // 我们把前面的QZOutputJson=跟最后的 ; 过滤掉，得到一个json字符串

        $tencent_video_array = json_decode($tencent_video_json,true); // 得到json 数组

        $fvkey = $tencent_video_array['vl']['vi'][0]['fvkey'];  // 视频的fvkey,类似于微信的access_token,会变动
        $fn = $tencent_video_array['vl']['vi'][0]['fn'];
        $url = $tencent_video_array['vl']['vi'][0]['ul']['ui'][1]['url'];
        $video_url = $url.$fn.'?vkey='.$fvkey;
        //print_r($tencent_video_array);
       echo $video_url;
        //
        //$str='QZOutputJson=';
        //$result= str_replace($str,"",$result);
        //$result = json_encode($result,true);
        //$result=json_decode($result);

        // $this->renderJson($result);
    }
}
