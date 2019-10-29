<?php

namespace app\api\controller;

use app\api\model\NewsInfo;
use think\Controller;
use think\Request;

class News extends Controller
{
    /**
     * 显示捐赠信息
     *
     * @return \think\Response
     */
    //获取新闻分类信息
    public function getNews(Request $request)
    {
        $type=$request->get('type');
        $news=new NewsInfo();
        if(!$request->get('page')){
            $page=1;
            $res= $news->showInfo($type,$page);
        }else{
            $page=$request->get('page');
            $res= $news->showInfo($type,$page);
        }
        $data=json_encode($res);
        return $data;
    }
    //获取最新资讯
    public function getNewest(Request $request){
        $limit=$request->get('limit');
        $type=$request->get('type');
        $news=new NewsInfo();
        $res= $news->selectNewest($type,$limit);
        $data=json_encode($res);
        return $data;

    }
    //获取新闻详情
    public function getDetail(Request $request){
        $news=new NewsInfo();
        $res= $news->selectInfo($request->get('id'));
        $data=json_encode($res);
        return $data;
    }
    public function  show(){
        echo time();
    }


}
