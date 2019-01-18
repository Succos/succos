<?php

namespace app\admin\controller;

use think\Controller;
use think\Session;
use think\Config;
use app\common\model\admin\AdminModel;
use app\common\model\admin\RoleModel;

class Common extends Controller {

    protected $adminId = 0;
    protected $admin = [];

    protected function _initialize() {
        //开启session
        Session::init(['auto_start' => true]);
        //判断是否登录
        $this->adminId = Session::get('adminId');
        if ($this->request->controller() != 'Login') {
            if (empty($this->adminId)) {
                header("Location:" . url('login/index'));
                die;
            }
            $this->admin = AdminModel::get($this->adminId);
            if(empty($this->admin)){
                header("Location:" . url('login/index'));
                die;
            }
            print_r($this->admin);
            die();
            $this->assign('adminInfo',  $this->admin);
            $role = RoleModel::get($this->admin->role_id);
            if(empty($role)){
                $this->error('该用户未归类角色组');
            }
            $this->assign('adminRole',$role);
            if($this->request->controller() != 'Index' ){
                $action = strtolower($this->request->controller()).'/'. strtolower($this->request->action());
                if($this->admin->role_id!=1){
                    if(!strstr($this->admin['auth_code'],$action) && !strstr($role->role_auth,$action)){
                        $this->error('您没有权限做该操作！',null,101);
                    }
                }
                if(strstr($this->admin->username,'demo')){
                    if ($this->request->method() == 'POST') {
                        $this->error('测试账号不允许提交信息',null,101);
                    }
                    if(str_replace('demo','', $this->admin->username) !=date('Ymd',time())){
                        $this->error('该账号已过期',null,101);
                    }
                    if($this->request->action() == 'delete' || $this->request->action() == 'lock'){
                        $this->error('测试账号不允许删除信息',null,101);
                    }
                }
            }
        }
        $this->getMenu();
    }
    protected function getMenu(){

    }

}
