<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

require_once '../resources/org/code/Code.class.php';

class LoginController extends CommonController
{
    //
    public function login(Request $request)
    {
        if(!$request->isMethod('post')) {
            return view('admin.login');
        }
        $user_name = $request->get('user_name');
        $user_pass = $request->get('user_pass');
        $rcode = strtoupper($request->get('code'));

        // 获取验证码
        $code = new \Code();
        $scode = $code->get();

        if(empty($code) || $rcode != $scode) {
            return back()->with('msg', '验证码错误');
        }
        $user = User::find(1);
//        dd($user);
        if($user_name!=$user->user_name || $user_pass != decrypt($user->user_pass)) {
            return back()->with('msg', '用户名或密码错误');
        }

        session(['user'=>$user]);

        return redirect('admin/index');
    }

    public function code()
    {
        $code = new \Code();
        return $code->make();
    }

    public function getcode()
    {
        $code = new \Code();
        echo $code->get();
        return 'get-code';
    }

    public function test()
    {
        dd($_SERVER);exit;
        $str = '123456';
        $str1 = 'adfdsfdfdsf123123dsfdsfsdf1dsfsd';
        echo encrypt($str);
        echo '<br>';
        echo encrypt($str);
        echo '<br>';
    }
}
