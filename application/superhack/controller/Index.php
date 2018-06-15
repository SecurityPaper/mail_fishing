<?php
namespace app\superhack\controller;

use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{
    public function search(Request $request)
    {
        $key = $request->param("key");
        if ($key != "fcvxz657o54ewn123cvb432lg"){
            return "fuck you!!!";
        }
        $data =  Db::name('sg')->where('id','>','0')->select();

        $this->assign('data',$data);

        return $this->fetch();
    }
}
