<?php
namespace app\index\controller;
use think\Db;
use think\Request;
use app\index\model\User;
use app\index\model\Userinfo;
use think\console\output\driver\Console;
use think\Controller;
use think\facade\View;

class Index extends Controller
{
    public function login(Request $request){
        $user=new UserInfo();
        $ret=$user->selectInfo($request->post());
        if($ret){
            return 1;
        }else{
           return 0;
        }
    }

    public function addDonateInfo(Request $request){

    }

    public function index()
    {
        $user=new User();
        $data=$user->selectinfo();
        // dump($data);
        return view('index',compact('data'));
    }
    #显示添加页面
    public function addview(){
        return view('add');
    }
    #添加
    public function add(Request $request){
        $user=new User();
        $data=$request->post();
        if($request->post('id')){
            $ret=$user->modifyinfo($data);
            if($ret==1){
                #调用
                $this->redirect('index/index/index');
            }else{
                $this->redirect('index/index/index');
            } 
        }else{
        }

    }
    #删除
    public function delete(Request $request){
        $id=$request->get('id');
        $user=new User();
        $ret=$user->deleteinfo($id);
        if($ret==1){
           $this->redirect('index');
        }else{
            $this->redirect('index');
        }
        // dump($ret);
    }
    #修改
    public function modify(Request $request){
        $id=$request->get('id');
        $user=new User();
        $data=$user->modifyview($id);
        return view('add',compact('data'));
    }
    #上传图片
    public function upload(){
       return view();
    }
    public function uploadimg(Request $request){
		$data = $this->request->post();
		$file = request()->file('file');
         $info = $file->move( '../uploads');
		if ($info) {
	    return json($info->getSaveName());
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
