<?php

namespace app\admin\controller;

use app\admin\model\Arc as AppArc;
use app\admin\controller\CommonAction;
use think\facade\Session;
use think\Request;

class Arc extends CommonAction
{
   #显示新闻列表页
    public function index()
    {
    $arc=new AppArc();
    $data=$arc->selectpro();
    return view('arc/index',compact('data'));
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
        var_dump($request);
        // $ret=$arc->addinfo($request->post());
        // if($ret==1){
        //    return 1;
        // }else{
        //    return 0;
        // }
    }
}
