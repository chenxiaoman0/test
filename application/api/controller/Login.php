<?php

namespace app\api\controller;
use app\api\model\UserInfo;
use think\captcha\Captcha;
use think\Controller;
use think\facade\Cookie;
use think\facade\Session;
use think\Request;
class Login extends Controller
{
    //登录
    public function loginin(Request $request)
    {
        $user=new UserInfo();
        $res=$user->selectInfo($request->post());
        if($res){
            //设置登录标识
            Cookie::set('Flag','isLogin');
            echo  Cookie::get('Flag','isLogin');
            //存取用户id
            Session::set('userId',$res);
            return 1;//登录成功
        }else{
            return 0;//登录失败
        }
    }
    //验证验证码是否正确方法
    public function check_verify($code, $id = ''){
        $captcha = new Captcha();
        return $captcha->check($code, $id);
    }

    public function register(Request $request)
    {
        $user=new UserInfo();
        $code=$request->post('code');
        if(!captcha_check($code)){
        //验证失败
            return 2;
        };
        $flag=$user->selectInfo($request->post());
        if($flag){
            return 0;//该用户存在
        }else{
            $res=$user->addInfo($request->post());
            if($res){
                return 1;//注册成功
            }
        }

    }
    public function show_captcha($id=''){
        ob_clean();
        $captcha = new Captcha();
        $captcha->imageW=121;
        $captcha->imageH = 32;  //图片高
        $captcha->fontSize =14;  //字体大小
        $captcha->length   = 4;  //字符数
        $captcha->fontttf = '5.ttf';  //字体
        $captcha->expire = 1800;  //有效期
        $captcha->useNoise = false;  //不添加杂点
        $captcha->reset = true;  //成功后重置
        return $captcha->entry($id);
    }


    public function createCode()
    {

    }

    /**
     * 短信登录
     *
     */
    public function SendSMSCode(Request $request)
    {
        //
    }
}
