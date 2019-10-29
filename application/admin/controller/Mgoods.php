<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Mgoods extends Controller
{
    /**
     * 显示物品管理页
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }
    //查询物品
    public function findGoods()
    {
        //
    }
    //显示添加物品页
    public function addGoosView()
    {
        return view();
    }


    /**
     * 添加物品
     *
     * @return \think\Response
     */
    public function createGoods(Request $request)
    {
        var_dump($request->post());
    }
    //上传图片
    public function uploadimg(Request $request){
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
    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
