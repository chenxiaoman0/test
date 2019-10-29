<?php

namespace app\api\behavior;

use think\Controller;
use think\Response;

class CORS extends Controller
{
    public function appInit(&$params)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: token,Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: POST,GET');
        if (request()->isOptions()) {
            exit();
        }
    }
}
