<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{

    public function index()
    {
        //
        return $this->fetch();
    }

    public function input(Request $request)
    {
        $username = $request->param("username");
        $password = $request->param("password");
        $data = ['username' => $username, 'password' => $password, 'time'=> date("Y-m-d H:i:s") ];
        Db::name("sg")->insert($data);
        return "欢迎参加安全意识培训。";
    }

}
