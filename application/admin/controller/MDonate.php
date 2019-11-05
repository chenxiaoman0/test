<?php

namespace app\admin\controller;

use app\admin\controller\CommonAction;
use app\admin\model\MDonateInfo;
use think\console\command\make\Controller;
use think\facade\Session;
use think\Request;
// extends CommonAction
class MDonate extends Controller
{
   #显示处理完成预约
    public function complete(Request $request)
    {
    $donateinfo=new MDonateInfo();
    $data=$donateinfo->selectCompleteInfo();
    return view('mdonate/index',compact('data'));
    }
    #显示处理完成预约
    public function incomplete(Request $request)
    {
    $donateinfo=new MDonateInfo();
    $data=$donateinfo->selectIncompleteInfo();
    return view('mdonate/index',compact('data'));
    }
    public function modifypro(Request $request){
        dump($request->get());
    }
    public function addArc(){
        if($id=Session::get('userid')){
            return view('',compact('id'));
        }
        return view();
    }
    //添加文章
    public function addArcPro(Request $request)
    {
        $arc=new AppArc();
        $ret=$arc->addinfo($request->post());
        if($ret==1){
           return 1;
        }else{
           return 0;
        }
    }
}
