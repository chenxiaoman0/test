<?php
namespace app\admin\controller;
use app\admin\model\MnewsInfo;
use think\Controller;
use think\Request;
class Mnews extends Controller
{
    //新闻列表页
    public function index(){
        $newslsit=new MnewsInfo();
        $data=$newslsit->getList();
        return view('',compact('data'));
    }
    //添加新闻页
    public function addNews(){
        return view('');
    }
    //添加新闻
    public function addNewsData(Request $request){
        $goodsinfo=new MnewsInfo();
        // $res=$goodsinfo->insert($request->post());
        // return $res;
        var_dump($request->post());
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