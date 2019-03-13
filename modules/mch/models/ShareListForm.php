<?php
namespace app\modules\mch\models;



class ShareListForm extends \yii\base\Model{
    public $store_id;
    public $page;
    public $limit;
    public $status;
    public $keyword;

    public function rules()
    {
        return [
            [['keyword',], 'trim'],
            [['page','limit','status'],'integer'],
            [['status',], 'default', 'value' => -1],
            [['page'],'default','value'=>1]
        ];
    }
    public function getList(){

    }
}