<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\Common\SystemCotroller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\CoreController;
use core\libs\view;

class Mailcc extends Controller
{

    private $core;
    private $webset;
    private $system;
    private $common;

    #初始化采集核心
    public function __construct()
    {
        $this->core = new CoreController();
        #初始化系统参数
        $this->system = new SystemCotroller();
        #初始化公共控制器
        $this->common = new CommonController();

    }

    #生成后台首页
    public function index()
    {
        return view('user.mail');
    }

   public function mailip()
    {
        return view('admin.mailip');
    }


}