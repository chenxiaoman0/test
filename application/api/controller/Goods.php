<?php

namespace app\api\controller;

use app\api\model\GoodsInfo;
use think\Controller;
use think\Request;
use think\facade\App;
class Goods extends Controller
{
    /**
     * 显示捐赠信息
     *
     * @return \think\Response
     */
    //获取商品分类信息
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
    //获取最新资讯
    public function getNewest(Request $request){
        $limit=$request->get('limit');
        $type=$request->get('type');
        $news=new NewsInfo();
        $res= $news->selectNewest($type,$limit);
        $data=json_encode($res);
        return $data;

    }
    //获取商品详情
    public function getDetail(Request $request){
        $news=new NewsInfo();
        $res= $news->selectInfo($request->get('g_id'));
        //处理图片
        $imgpath=explode(',',$res['imgpath']);
        $img=[];
        foreach($imgpath as $imgitem){
            $imgitem=config('WEB_URL').$imgitem;
            array_push($img,$imgitem);
        }
        $res['imgpath']=$img;
        $data=json_encode($res);
        return $data;
    }
    public function  show(){
        echo time();
    }


}
