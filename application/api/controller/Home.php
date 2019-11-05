<?php

namespace app\api\controller;

use app\api\model\GoodsInfo;
use app\api\model\NewsInfo;
use think\Controller;
use think\Request;
use think\facade\App;
class Home extends Controller
{
    //获取主页捐赠信息
    
    public function getGoodsData(Request $request)
    {
        $type=$request->get('type');
        $goods=new GoodsInfo();
        if(!$request->get('page')){
            $page=1;
            $res= $goods->selectGoodsDate($type,$page);
        }else{
            $page=$request->get('page');
            $res= $goods->selectGoodsDate($type,$page);
        }
        $list=[];
        //获取根目录
        // $rootPath = App::url_domain_root();
        foreach($res as $item){
            $imgpath=explode(',',$item['imgpath']);
            $img=[];
            foreach($imgpath as $imgitem){
                $imgitem=config('WEB_URL').$imgitem;
               array_push( $img,$imgitem);
            }
            $item['imgpath']=$img;
           array_push($list,$item);
        }
        return json_encode(['status' =>200,'data'=>$list]);
    }
    //获取获取主页最新动态
    public function getHomeNewest(Request $request){
        $limit=$request->get('limit');
        $news=new NewsInfo();
        $res= $news->selectAllNewest($limit);
        $data=json_encode($res);
        return $data;

    }

}
