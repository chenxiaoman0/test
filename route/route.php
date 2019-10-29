<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
//路由显示
//http://www.tp5.com/index.php/think

// use think\console\command\optimize\Route;

// Route::get('think', function () {
//     return 'hello,ThinkPHP5!';
// });
//路由跳转(注意参数传递)
//http://www.tp5.com/index.php/index/index/test/11
//动态路由规则（有参数）
// Route::get('hello/[:name]', 'index/index/hello');
//参数必填(参数设置默认值也不起作用)
// Route::get('test/[:name]', 'index/index/test')->pattern(["name"=>"\d+"]);
//参数可选
// Route::get('test1/[:name]', function($name='cxm'){
//     return $name;
// })->pattern(["name"=>"\d+"]);
// Route::get('test/[:name]', 'index/index/test')->pattern(['name'=>'\d+']);
// 通常，我们把这种方式的路由注册称之为静态注册，反之，使用Route类的方法注册的我们称之为动态注册。
// return [
//     'hello/[:name]'=>'index/index/hello'
// ];
//路由分组

// use think\console\command\optimize\Route;

// Route::group(['method'=>'get'],function(){
//  Route::get('test1','index/index/test');
//  Route::get('test3',function(){
//      return '我是测试三';
//  });
// });