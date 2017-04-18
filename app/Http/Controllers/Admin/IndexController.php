<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;

class IndexController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }

    public function pass()
    {
        return view('admin.pass');
    }
    public function info()
    {
//        return 111;
        return view('admin.info');
    }
}
