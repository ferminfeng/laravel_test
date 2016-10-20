<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    /**
     * 显示指定用户的个人数据。
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        echo $id;die;
    }
    
}