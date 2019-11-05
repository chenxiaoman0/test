<?php
namespace app\admin\controller;
use app\admin\model\MgoodsInfo;
use think\Controller;
use think\facade\Session;
use think\Request;
class Mmarket extends Controller
{
     //订单列表
     public function getList(){
        $gooslsit=new MgoodsInfo();
        $data=$gooslsit->getList();
        return view('',compact('data'));
    }
    //商品列表
    public function goodsList(){
        $gooslsit=new MgoodsInfo();
        $data=$gooslsit->selectGoods();
        // return view('',compact('data'));
        var_dump($data);
    }
    //已完成订单
    //商品列表

    //添加商品
    public function addGoods(){
        return view();
    }
    public function addGoodsInfo(Request $request){
        $goodsinfo=new MgoodsInfo();
        $res=$goodsinfo->insert($request->post());
        return $res;
    }
    //上传图片
    public function uploadimg(Request $request){
		$file = request()->file('file');
         $info = $file->move( '../uploads');
		if ($info) {
	    return json(str_replace("\\","/",$info->getSaveName()));
		}else{
            echo '上传失败';
        }
    }
    #删除图片
    public function delimg(Request $request){
        $file=$request->get();
        if(unlink('../uploads/'.$file['id'])){
           return view('upload');
        }
    }
}