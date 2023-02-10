<?php
namespace App\Controllers;

class c_home extends BaseController
{
    public function home()
    {
        $title = "Home";
        return view('v_home', compact('title'));
    }
}