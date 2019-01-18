<?php
namespace app\admin\controller;

use think\Controller;
use app\common\model\admin\AdminModel;
use think\Session;
use think\Config;
use think\Request;
class Login extends Controller{
    public function index()
    {
        $this->view->engine->layout(false);

        return  $this->fetch();
    }

    public function loging(Request $request){
        $request=$this->request;
        $username=$request->param('username');
        $password=$request->param('password');
        if(empty($username)||empty($password)){
            $this->error('账号和密码不能为空',null,101);
        }
//        $admin=new AdminModel();
//        $res=$admin->where(['username'=>$username])->find();
        $admin=AdminModel::get(['username'=>$username]);
        if(empty($admin)){
            $this->error('账号或密码不正确',null,101);
        }
        if($admin->password != md5($password)){
            $this->error('账号或密码不正确',null,101);
        }
        if($admin->is_delete){
            $this->error('帐号已经锁定',null,101);
        }
       // Session::set('adminId',$admin->admin_id);
        Session::init(['auto_start'=>true]);
        session('adminId',$admin->admin_id);
        $admin->save();
        $this->success('恭喜您登录成功',  url('index/index'));
        }
    public function logout(){
        Session::delete('adminId');
        $this->success('退出成功',  url('index/index'));
    }
}