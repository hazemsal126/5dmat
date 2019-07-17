<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteInfoController extends Controller
{
    //
    public function privacy(Request $request)
    {
        # code...
        return view('siteinfo.privacy');
    }
    //
    public function policy(Request $request)
    {
        # code...
        return view('siteinfo.policy');
    }
    //
    public function faq(Request $request)
    {
        # code...
        return view('siteinfo.faq');
    }
    //
    public function about(Request $request)
    {
        # code...
        return view('siteinfo.about');
    }
    //
    public function contact(Request $request)
    {
        # code...
        return view('siteinfo.contact');
    }

    public function wages(Request $request)
    {
        # code...
        return view('siteinfo.wages');
    }
}
