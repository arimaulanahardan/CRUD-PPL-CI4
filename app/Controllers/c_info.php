<?php

namespace App\Controllers;

class c_info extends BaseController
{
    public function info()
    {
        $title = "Info";
        return view('v_info', compact('title'));
    }
}