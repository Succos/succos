<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Session;
class Index extends Common{
    public function index()
    {
        $this->view->engine->layout(false);
       $qq = Session::get('adminId');
       // echo Session::get('adminId');;
        return  $this->fetch();
    }
    public function main()
    {
        //$this->view->engine->layout(false);
        return  $this->fetch();
    }

}
