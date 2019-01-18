<?php

namespace app\modules\mch\controllers;

use app\modules\mch\controllers\Controller;
use yii\helpers\VarDumper;

class StoreController extends Controller
{
    public function actionIndex()
    {
       return $this->render('index',[
           'store' => $this->store,
       ]);
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


    public  function actionKa(){
        $curlobj=curl_init();
        curl_setopt($curlobj,CURLOPT_URL,"https://shuabao.yeahka.com/agent-new/agent/console/login");
        curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,true);
        $data='stm=1544608470126';
        date_default_timezone_set('PRC');
        curl_setopt($curlobj,CURLOPT_COOKIESESSION,TRUE);
        curl_setopt($curlobj,CURLOPT_COOKIEFILE,"cookiefile");
        curl_setopt($curlobj,CURLOPT_COOKIEJAR,'cookiefile');
        curl_setopt($curlobj,CURLOPT_COOKIE,"JSESSIONID=CF0DC33264686543C266FD21014DE5C5");
        curl_setopt($curlobj,CURLOPT_HEADER,0);
        curl_setopt($curlobj,CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($curlobj,CURLOPT_POST,1);
        curl_setopt($curlobj,CURLOPT_POSTFIELDS,$data);
        curl_setopt($curlobj,CURLOPT_HTTPHEADER,array("text/javascript, application/javascript, */*"));
        curl_setopt($curlobj,CURLOPT_URL,"https://vip.cardinfo.com.cn/agent/asyncCustomerName.action?customerNos=86231169832,86231451019&callback=getCustomerInfoBack");
        curl_setopt($curlobj,CURLOPT_POST,0);
        curl_setopt($curlobj,CURLOPT_HTTPHEADER,array("Content-type:text/xml"));
        $output=curl_exec($curlobj);
        curl_close($curlobj);
        header('Content-Type: text/html; charset=utf-8');
        return $this->render('index',[
            'output'=>$output
        ]);
    }
    public  function actionJin(){
        $curlobj=curl_init();
        curl_setopt($curlobj,CURLOPT_URL,"https://shuabao.yeahka.com/agent-new/agent/console/login");
        curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,true);
        $data='stm=1544608470126';
        date_default_timezone_set('PRC');
        curl_setopt($curlobj,CURLOPT_COOKIESESSION,TRUE);
        curl_setopt($curlobj,CURLOPT_COOKIEFILE,"cookiefile");
        curl_setopt($curlobj,CURLOPT_COOKIEJAR,'cookiefile');
        curl_setopt($curlobj,CURLOPT_COOKIE,"BIGipServerpool_SD_DaiLiShang=771837962.36895.0000; JSESSIONID=EAC8428B5E09FE06068FFAA51EF7FD61; ace_settings=%7B%22navbar-fixed%22%3A1%2C%22sidebar-fixed%22%3A1%2C%22breadcrumbs-fixed%22%3A1%7D");
        curl_setopt($curlobj,CURLOPT_HEADER,0);
        curl_setopt($curlobj,CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($curlobj,CURLOPT_POST,1);
        curl_setopt($curlobj,CURLOPT_HTTPHEADER,array("text/javascript, application/javascript, */*"));
        curl_setopt($curlobj,CURLOPT_URL,"http://119.18.194.36/employee/list.do");
        curl_setopt($curlobj,CURLOPT_POST,0);
        curl_setopt($curlobj,CURLOPT_HTTPHEADER,array("Content-type:text/xml"));
        $output=curl_exec($curlobj);
        curl_close($curlobj);
        header('Content-Type: text/html; charset=utf-8');
        return $this->render('index',[
            'output'=>$output
        ]);
    }
    public  function actionLa(){
        $curlobj=curl_init();
        curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,true);
        $data='sessionId=5ad4d078c9a747348b32032c10c487ff';
        date_default_timezone_set('PRC');
        curl_setopt($curlobj,CURLOPT_COOKIESESSION,TRUE);
        curl_setopt($curlobj,CURLOPT_COOKIEFILE,"cookiefile");
        curl_setopt($curlobj,CURLOPT_COOKIEJAR,'cookiefile');
        curl_setopt($curlobj,CURLOPT_COOKIE,"SESSION=d79acc70-6d1b-4f14-845c-6f18522221ba; sId=b770ba38d77a4e9ead24802fdc15b259; compOrgCode=273819; compOrgName=æ¶æ¬¾å®çå°åè´¸å¤§ä»£çåå¨æ³¢");
        curl_setopt($curlobj,CURLOPT_HEADER,0);
        curl_setopt($curlobj,CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($curlobj,CURLOPT_POST,1);
        curl_setopt($curlobj,CURLOPT_POSTFIELDS,$data);
        curl_setopt($curlobj,CURLOPT_HTTPHEADER,array("application/x-www-form-urlencoded;charset=utf-8","Content-length:".strlen($data)));

        curl_setopt($curlobj,CURLOPT_URL,"https://mposa.lakala.com/getSubAgentListAndDetail?page=1&pageSize=10");
        curl_setopt($curlobj,CURLOPT_POST,1);
        curl_setopt($curlobj,CURLOPT_HTTPHEADER,array("application/json, text/plain, */*"));
        $output=curl_exec($curlobj);
        curl_close($curlobj);
        header('Content-Type: text/html; charset=utf-8');
        return $this->render('index',[
            'output'=>$output
        ]);
    }
    public  function actionLeda(){
        $curlobj=curl_init();
        curl_setopt($curlobj,CURLOPT_URL,"https://shuabao.yeahka.com/agent-new/agent/console/login");
        curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,true);
        $data='stm=1544608470126';
        date_default_timezone_set('PRC');
        curl_setopt($curlobj,CURLOPT_COOKIESESSION,TRUE);
        curl_setopt($curlobj,CURLOPT_COOKIEFILE,"cookiefile");
        curl_setopt($curlobj,CURLOPT_COOKIEJAR,'cookiefile');
        curl_setopt($curlobj,CURLOPT_COOKIE,"JSESSIONID=1A84DE7B0F6C1216C8EF3F4B2F5169C7");
        curl_setopt($curlobj,CURLOPT_HEADER,0);
        curl_setopt($curlobj,CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($curlobj,CURLOPT_POST,1);
        curl_setopt($curlobj,CURLOPT_POSTFIELDS,$data);
        curl_setopt($curlobj,CURLOPT_HTTPHEADER,array("text/javascript, application/javascript, */*"));
        curl_setopt($curlobj,CURLOPT_URL,"https://ykagent.yeahka.com//ykagent/statistic/queryTradeOrderList.do?pageNum=1&pageSize=30&token=ykagent-token-2a468ce4-6698-4305-940d-e8aca78471cf&startTime=2018-12-01&endTime=2018-12-31&posCati=&panEnd=&orderId=&cardType=-1&customerNo=&customerName=&status=&agentNo=&settleStatus=-1");
        curl_setopt($curlobj,CURLOPT_POST,0);
        curl_setopt($curlobj,CURLOPT_HTTPHEADER,array("Content-type:text/xml"));
        $output=curl_exec($curlobj);
        curl_close($curlobj);
        header('Content-Type: text/html; charset=utf-8');
        return $this->render('index',[
            'output'=>$output
        ]);
    }
    public  function actionSui(){
        $curlobj=curl_init();
        curl_setopt($curlobj,CURLOPT_URL,"https://shuabao.yeahka.com/agent-new/agent/console/login");
        curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,true);
        $data='sort=id&order=desc&offset=0&max=10&hiddenGoodsNameCode=&hiddenFactShortNameCode=&hiddenModelCode=&q_goodsType=&q_goodsName=&q_factShortName=&q_model=&q_communicationType=&q_signa=';
        date_default_timezone_set('PRC');
        curl_setopt($curlobj,CURLOPT_COOKIESESSION,TRUE);
        curl_setopt($curlobj,CURLOPT_COOKIEFILE,"cookiefile");
        curl_setopt($curlobj,CURLOPT_COOKIEJAR,'cookiefile');
        curl_setopt($curlobj,CURLOPT_COOKIE,"SESSION=61eb6684-53e0-4919-9f7a-aa6a5b89a22c; MerchV1Token=8a819e3d5ca196ae015ca47678f900fc");
        curl_setopt($curlobj,CURLOPT_HEADER,0);
        curl_setopt($curlobj,CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($curlobj,CURLOPT_POST,1);
        curl_setopt($curlobj,CURLOPT_POSTFIELDS,$data);
        curl_setopt($curlobj,CURLOPT_URL,"https://sss.suixingpay.com/handBrushMerchantManagement/index");
        curl_setopt($curlobj,CURLOPT_POST,1);
        curl_setopt($curlobj, CURLOPT_REFERER, 'https://sss.suixingpay.com/inventoryManagement/index');
        curl_setopt ($curlobj, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36");
        curl_setopt($curlobj,CURLOPT_HTTPHEADER,array("text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8"));
        $output=curl_exec($curlobj);
        curl_close($curlobj);
        header('Content-Type: text/html; charset=utf-8');
        return $this->render('index',[
            'output'=>$output
        ]);
    }
}
